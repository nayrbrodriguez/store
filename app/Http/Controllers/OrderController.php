<?php

namespace App\Http\Controllers;
use App\Http\Requests\OrderRequests;

use App;
use Carbon\Carbon;
use Illuminate\Http\Request;


use Illuminate\Validation\Validator;

use User;
use DB;
use Auth;
use App\Deductions;

class OrderController extends Controller
{
    public function index()
    {
    	$customers 	= DB::table('tb_customer')->where('admin_id', Auth::user()->id)->paginate(10);

    	return view('admin.pages.order.vgen_info',compact('customers'));
    }


    public function orders($id)
    {
        $customers  = DB::table('tb_customer')->where('admin_id', Auth::user()->id )->paginate(10);
    	
    	$customer	= DB::table('tb_customer')->where('id', $id)->first();

    	$products 	= DB::table('tb_product')->where('prod_qty', '<>','0' )->where('admin_id', Auth::user()->id)->get();

    	$orders 	= DB::table('tb_order')
    					->join('tb_product', 'tb_order.prod_id','=','tb_product.id')
    					->select('tb_product.*','tb_order.*')
    					->where('cust_id',$id)
    					->get();

        $deduction  = Deductions::select('total_amount')->where('user_id', $id)->sum('total_amount');
        $deductionLogs = Deductions::whereUserId($id)->get();

	    $credit 	= DB::table('tb_order')
					->select('total_amt')
					->where('cust_id',$id)
					->where('status','pending')
					->sum('total_amt');

        $total      = $credit - $deduction;

        if ($customer->admin_id == Auth::user()->id) {
            return view('admin.pages.order.rgen_info', compact('customers','customer', 'orders', 'total', 'products', 'deductionLogs'));
        } else {
            return view('errors.404');
        }
        
    	

    }

   


    public function insert(OrderRequests $request){
        if ($request['created_at'] == null) {
            $request['created_at'] = Carbon::now()->format('Y-m-d');
        }

    	$productID	= $request->prod_id;
    	$customerID	= $request->cust_id;
        $customers  = DB::table('tb_customer')->where('admin_id',Auth::user()->id)->paginate(10);
    	$total 		= DB::table('tb_product')->where('id', $productID)->first();
    	$mess 		= DB::table('tb_customer')->where('id', $customerID)->first();
        
        $order = DB::table('tb_order')->insert([
            'prod_id'=>$request['prod_id'],
            'cust_id'=>$request['cust_id'],
            'qty'=>$request['qty'],
            'created_at'=>$request['created_at'],
            'price'=>$total->price_for_sale,
            'total_amt'=>$total->price_for_sale * $request['qty']
            
            ]);
        

        return redirect('orders/'.$request->cust_id.'?page='.$request->currentPage)->with('message', $total->prod_name .' has been added to the ' . $mess->name.' list');

        
    }

     public function edit($id, $ord_id)
    {
    	
    	//getting order to be update	
    	$orderID	= DB::table('tb_order')->where('id', $ord_id)->first(); 
    	
    	//lists of all customers
		$customers 	= DB::table('tb_customer')->where('admin_id',Auth::user()->id)->paginate(10); 

		//input for creating orders for customer ID
    	$customer	= DB::table('tb_customer')->where('id', $id)->first(); 

    	//getting all the products in tb_product that prod_qty has stocks
    	$products 	= DB::table('tb_product')->where('prod_qty', '<>','0' )->get(); 

    	//getting the editing details
    	$edit 		= DB::table('tb_order')
    					->join('tb_product','tb_order.prod_id','=', 'tb_product.id')
    					->select('tb_order.*','tb_product.*')
    					->where('tb_order.id',$ord_id)
    					->first();

    	//getting all details in specific customer
    	$orders 	= DB::table('tb_order')
    					->join('tb_product', 'tb_order.prod_id','=','tb_product.id')
    					->select('tb_product.*','tb_order.*')
    					->where('cust_id',$id)
    					->get(); 

    	//getting all total
    	$total 		= DB::table('tb_order')
    					->select('total_amt')
    					->where('cust_id',$id)
    					->where('status','pending')
    					->sum('total_amt');  

        if ($customer->admin_id == Auth::user()->id){
                return view('admin.pages.order.egen_info',compact('customers','customer', 'orders', 'total', 'products','orderID', 'edit'));
        } else {
            return view('errors.404');
        }
        




    }

    public function update(Request $request)
    {   
        //getting customer
        $customer = DB::table('tb_customer')->where('id',$request->cust_id)->first();

        //getting product name 
        $product = DB::table('tb_product')->where('id',$request->prod_id)->first();


    	$this->validate($request,[
                'prod_id'   =>  'required||max:255',
                'cust_id'   =>  'required||max:255',
                'qty'       =>  'required',
                'price'     =>  'required',
        ]);

        DB::table('tb_order')->where('id',$request['id'])->update([
                'prod_id'   =>  $request['prod_id'],
                'cust_id'   =>  $request['cust_id'],
                'qty'       =>  $request['qty'],
                'price'     =>  $request['price'],
                'total_amt' =>  $request['price'] * $request['qty']
                
            ]);
        
        return redirect('/orders/'.$request->cust_id.'?page='.$request['currentPage'])->with('message','You have successfully update the '.$product->prod_name.' to '.$customer->name);
    }

    public function destroy($id, $ord_id, $currentPage){
        //getting the details to destroy
        $destroy       = DB::table('tb_order')
                        ->join('tb_product','tb_order.prod_id','=', 'tb_product.id')
                        ->select('tb_order.*','tb_product.*')
                        ->where('tb_order.id',$ord_id)
                        ->delete();
        

        return redirect('/orders/'.$id.'?page='.$currentPage)->with('message','You have been successfully deleted an item');
    }

    public function changeStatus(Request $request, $id, $ord_id, $currentPage)
    {   
        //getting customer
        $customer   = DB::table('tb_customer')->where('id', $id)->first();

        //getting order
        $order      = DB::table('tb_order')->where('id', $ord_id)->first();

        $product    = DB::table('tb_product')->where('id', $order->prod_id)->first();

        if ($order->status == 'pending') {

            DB::table('tb_order')->where('id',$ord_id)->update([
                'status' => 'paid'
                
            ]);

            return redirect('/orders/'.$order->cust_id.'?page='.$currentPage)->with('message','You have successfully paid the '.$product->prod_name.' to '.$customer->name);

        } else {
            DB::table('tb_order')->where('id',$ord_id)->update([
                'status' => 'pending'
                
            ]);

            return redirect('/orders/'.$order->cust_id.'?page='.$currentPage)->with('message','You have successfully pending the '.$product->prod_name.' to '.$customer->name);
        }
    }

    public function payment(Request $request, $id)
    {
        $payload = $request->only('total_amount', 'date_of_payment');
        $payload['user_id'] = $id;

        $payment = Deductions::create($payload);

        $message = 'Minus with the amount of '.$payment->total_amount;

        return redirect('/orders/'.$request->cust_id.'?page='.$request['currentPage'])->with('message', $message);
    }

}

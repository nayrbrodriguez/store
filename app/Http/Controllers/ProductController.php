<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use User;
use DB;
use Auth;

class ProductController extends Controller
{
    public function index(){
        $length = 6;
        $randomString = substr(str_shuffle("abcdef0123456"), 0, $length);

        return view('admin.pages.product.agen_info',compact('randomString'));
    } 

    // public function backup(){
    //  return view('admin.pages.backup.agen_info');
    // }

    public function insert(Request $request){
        $this->validate($request,[

        'prod_name'=>'required||max:255',
        'prod_qty'=>'required||max:255',
        'orig_price'=>'required||max:255',
        'price_for_sale'=>'required||max:255',
        'price_for_credit'=>'required||max:255',
        // 'status'=>'required||max:255',
        // 'description'=>'required',
        
        ]);
        
        DB::table('tb_product')->insert([
            'color'=>$request['color'],
            'prod_name'=>$request['prod_name'],
            'admin_id'=>$request['admin_id'],
            'prod_qty'=>$request['prod_qty'],
            'orig_price'=>$request['orig_price'],
            'price_for_sale'=>$request['price_for_sale'],
            'price_for_credit'=>$request['price_for_credit']
            // 'status'=>$request['status']

            
            ]);


        
        return redirect('product')->with('message', 'Successfully added!');
        // return redirect('about');
        
    }


    public function search(Request $request){
        if ($request->ajax()) {
            $output="";
            $url="/view_product/";
            $department=DB::table('tb_product')->where('prod_name','LIKE','%'.$request->search.'%')->get();
            if ($department) {
                foreach ($department as $key => $depart) {
                    $output.='<tr id="result">'.
                             '<td>'.'<a href="'.$url.$depart->id.'">'.$depart->prod_name.'</a>'.'</td>'.
                             '</tr>';

                }
                    return Response($output);
            }
        }
        
    }

    public function view(){
         $data = DB::table('tb_product')->where('admin_id', Auth::user()->id)->paginate(10);
        // $title=DB::table('tb_customer')->where('id',$id)->first();
        return view('admin.pages.product.vgen_info', compact('data'));
        // return $data;

   
    }

    public function read($id){
        $data = DB::table('tb_product')->where('admin_id', Auth::user()->id)->paginate(10);
        $title=DB::table('tb_product')->where('id',$id)->first();

        if ($title->admin_id == Auth::user()->id) {

            return view('admin.pages.product.rgen_info', compact('data','title'));

        } else {

            return view('errors.404');

        }
        

    }

    public function delete($id){
        DB::table('tb_product')->where('id',$id)->delete();
        return redirect('product')->with('message', 'Successfully deleted!');
    }

    public function edit($id){
        $data = DB::table('tb_product')->where('admin_id', Auth::user()->id)->paginate(10);
        $title=DB::table('tb_product')->where('id',$id)->first();

        if ($title->admin_id == Auth::user()->id) {

            return view('admin.pages.product.egen_info', compact('data','title'));

        } else {

            return view('errors.404');

        }
        

    }

    public function update(Request $request){
        $this->validate($request,[
        'prod_name'=>'required||max:255',
        'prod_qty'=>'required||max:255',
        'orig_price'=>'required||max:255',
        'price_for_sale'=>'required||max:255',

        'price_for_credit'=>'required||max:255'
        ]);

        DB::table('tb_product')->where('id',$request['id'])->update([
                'prod_name'=>$request['prod_name'],
                'prod_qty'=>$request['prod_qty'],
                'orig_price'=>$request['orig_price'],
                'price_for_sale'=>$request['price_for_sale'],
                // 'status'=>$request['status'],
                'price_for_credit'=>$request['price_for_credit']
                
            ]);
        
        $data = DB::table('tb_product')->where('admin_id', Auth::user()->id)->paginate(10);
        $title = DB::table('tb_product')->where('id',$request['id'])->first();

        // Session::flash('message', 'This is a message!');
        return view('admin.pages.product.rgen_info', compact('data','title'));
    }


  
    
}

<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use User;
use DB;
use Auth;

class CustomerController extends Controller
{
    public function index(){
        return view('admin.pages.customer.agen_info');
    } 

    public function sample()
    {
         $display   =   DB::table('tb_customer')->last();

        return redirect('view_customer/'.$display->id)->with('message', 'Successfully added '.$display->name.'!');
    }

    public function insert(Request $request){

        $this->validate($request,[
        'name' => 'required||max:255',
        'address' => 'required||max:255',
        'contact' => 'required||max:255',
        'gender' => 'required||max:255',
        'status' => 'required||max:255',
        ]);
        
        $display = DB::table('tb_customer')->insertGetId([
        'name' => $request['name'],
        'address' => $request['address'],
        'contact' => $request['contact'],
        'gender' => $request['gender'],
        'admin_id' => $request['admin_id'],
        'status' => $request['status'] 
        ]);

        $customer   =   DB::table('tb_customer')->where('id',$display)->first();
        $last       =   DB::table('tb_customer')->where('admin_id', Auth::user()->id)->paginate(10);

        return redirect('view_customer/'. $customer->id . '?page=' . $last->lastPage() )->with('message', 'Successfully added '.$customer->name.'!');
    }

    public function search(Request $request){
        $result = DB::table('tb_customer')->where('name',$request->name)->get();
        
        return $result;
    }

    public function view(){
        $data = DB::table('tb_customer')->where( 'admin_id', Auth::user()->id )->paginate(10);

        return view('admin.pages.customer.vgen_info', compact('data'));
    }

    public function read($id){
        $title=DB::table('tb_customer')->where('id',$id)->first();
        $data = DB::table('tb_customer')->where( 'admin_id', Auth::user()->id )->paginate(10);
        if ($title->admin_id == Auth::user()->id) {
            return view('admin.pages.customer.rgen_info', compact('data','title'));
        }
        else {
            return view('errors.404');
        }
        
    }
 
    public function delete($id){
        DB::table('tb_customer')->where('id',$id)->delete();
        return redirect('customer')->with('message', 'Successfully delete!');
    }

    public function edit($id){
        $data = DB::table('tb_customer')->where('admin_id', Auth::user()->id)->paginate(10);
        $title = DB::table('tb_customer')->where('id',$id)->first();
        
        if ($title->admin_id == Auth::user()->id) {
            return view('admin.pages.customer.egen_info', compact('data','title'));
        }
        else {
            return view('errors.404');
        }
        
    }

    public function update(Request $request, $currentPage){
        $this->validate($request,[
        'name'=>'required||max:255',
        'address'=>'required||max:255',
        'contact'=>'required||max:255',
        'gender'=>'required||max:255',
        'status'=>'required||max:255',
        ]);

        DB::table('tb_customer')->where('id',$request['id'])->update([
        'name'=>$request['name'],
        'address'=>$request['address'],
        'contact'=>$request['contact'],
        'gender'=>$request['gender'],
        'status'=>$request['status']
        ]);
        
        $data = DB::table('tb_customer')->where('admin_id', Auth::user()->id)->paginate(10);
        $title=DB::table('tb_customer')->where('id',$request['id'])->first();

        return redirect('view_customer/'.$title->id.'?page='.$currentPage)->with('message','You have been successfully update the profile of '.$title->name);
    }


  
    
}

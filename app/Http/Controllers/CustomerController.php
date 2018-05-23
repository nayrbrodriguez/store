<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use User;
use DB;

class CustomerController extends Controller
{
    public function index(){
        return view('admin.pages.customer.agen_info');
    } 

    // public function backup(){
    //  return view('admin.pages.backup.agen_info');
    // }
    // 
    public function sample()
    {
         $display   =   DB::table('tb_customer')->last();

        return redirect('view_customer/'. $display->id)->with('message', 'Successfully added '.$display->name.'!');
    }

    public function insert(Request $request){

        $this->validate($request,[
        'name'=>'required||max:255',
        'address'=>'required||max:255',
        'contact'=>'required||max:255',
        'gender'=>'required||max:255',
        'status'=>'required||max:255',
        // 'description'=>'required',
        
        ]);
        
        $display = DB::table('tb_customer')->insertGetId([
            'name'=>$request['name'],
            'address'=>$request['address'],
            'contact'=>$request['contact'],
            'gender'=>$request['gender'],
            'status'=>$request['status']

            
            ]);

        $customer   =   DB::table('tb_customer')->where('id',$display)->first();
        $last       =   DB::table('tb_customer')->paginate(10);


        return redirect('view_customer/'. $customer->id . '?page=' . $last->lastPage() )->with('message', 'Successfully added '.$customer->name.'!');

        
        
        // $this->sample();

        
    }


    public function search(Request $request){
        if ($request->ajax()) {
            $output = "";
            $url = "/view_customer/";
            $result = DB::table('tb_customer')->where('name','LIKE','%'.$request->search.'%')->get();
            if ($result) {
                foreach ($result as $res => $results) {
                    $output.='<tr>'.
                             '<td>'.'<a href="'.$url.$results->id.'">'.$results->name.'</a>'.'</td>'.
                             '</tr>';

                }
                    return Response($output);
            }
        }
        
    }

    public function view(){
        $data = DB::table('tb_customer')->paginate(10);
        // $title=DB::table('tb_customer')->where('id',$id)->first();
        return view('admin.pages.customer.vgen_info', compact('data'));
   
    }

    public function read($id){
        $data = DB::table('tb_customer')->paginate(10);
        $title=DB::table('tb_customer')->where('id',$id)->first();
        return view('admin.pages.customer.rgen_info', compact('data','title'));
    }
 
    public function delete($id){
        DB::table('tb_customer')->where('id',$id)->delete();
        return redirect('customer')->with('message', 'Successfully delete!');
    }

    public function edit($id){
        $data = DB::table('tb_customer')->paginate(10);
        $title=DB::table('tb_customer')->where('id',$id)->first();
        return view('admin.pages.customer.egen_info', compact('data','title'));
    }

    public function update(Request $request,$currentPage){
        $this->validate($request,[
        'name'=>'required||max:255',
        'address'=>'required||max:255',
        'contact'=>'required||max:255',
        'gender'=>'required||max:255',
        'status'=>'required||max:255',
        // 'description'=>'required',
        
        ]);
        DB::table('tb_customer')->where('id',$request['id'])->update([
            'name'=>$request['name'],
            'address'=>$request['address'],
            'contact'=>$request['contact'],
            'gender'=>$request['gender'],
            'status'=>$request['status']
            ]);
        
         $data = DB::table('tb_customer')->paginate(10);
        $title=DB::table('tb_customer')->where('id',$request['id'])->first();

        // Session::flash('message', 'This is a message!');
        // return view('admin.pages.customer.rgen_info', compact('data','title'))->with('message','You have been successfully update the profile of '.$title->name);
        return redirect('view_customer/'.$title->id.'?page='.$currentPage)->with('message','You have been successfully update the profile of '.$title->name);
    }


  
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $products   =   DB::table('products')->where('admin_id', Auth::user()->id)->get();

        // $barGraph   =   DB::table('tb_order')->get();
        // $distinct   =   distinct($barGraph);
        // 
        // $year = $barGraph->created_at->year;
 
        // return $barGraph;
        return view('admin.pages.banner.vgen_info',compact('products'));
    }
}
 
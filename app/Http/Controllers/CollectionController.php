<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function pending()
    {
    	$pendings	=	DB::table('tb_order')
    					->where('status', 'pending')
    					->select('total_amt')
    					->sum('total_amt');

    	$collections	=	DB::table('tb_order')
    						->where('status', 'paid')
    						->select('total_amt')
    						->sum('total_amt');

    	return view('admin.pages.collection.vgen_info',compact('pendings','collections'));
 

    }

    public function collected()
    {
    	

    	return $collections;
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accounts;

class AccountsController extends Controller
{
    public function index(Request $request)
    {
    	$accounts = $request->user()->accounts()->get();
    	// return $accounts;
    	return view('admin.pages.accounts.vgen_info', compact('accounts'));
    }

    public function add(Request $request)
    {
    	return view('admin.pages.accounts.agen_info');
    }

    public function create(Request $request)
    {
    	$password = encrypt($request['password']);
    	Accounts::create([
    		'admin_id' => $request->user()->id,
    		'account' => $request['account'],
    		'username' => $request['username'],
    		'password' => $password
    	]);

    	return redirect('/accounts');
    }

    public function view(Request $request, $id)
    {
    	$accounts = $request->user()->accounts()->get();
    	$account = Accounts::findOrFail($id);
    	return view('admin.pages.accounts.rgen_info', compact('account', 'accounts'));
    }

    public function edit(Request $request, $id)
    {
    	$accounts = $request->user()->accounts()->get();
    	$account = Accounts::findOrFail($id);
    	return view('admin.pages.accounts.egen_info', compact('account', 'accounts'));
    }

    public function update(Request $request, $id)
    {
    	$account = Accounts::findOrFail($id);
    	$password = encrypt($request['password']);
    	$account->update([
    		'admin_id' => $request->user()->id,
    		'account' => $request['account'],
    		'username' => $request['username'],
    		'password' => $password
    	]);
    	return redirect('/accounts');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accounts;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    public function index(Request $request)
    {
    	$parameter = $request->only('account');
    	$accounts = $request->user()->accounts()->filter($parameter)->paginate(10);
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

    	$message = 'You have successfully added '.$request['account'];
    	return redirect('/accounts')->with('message', $message);
    }

    public function view(Request $request, $id)
    {
    	$accounts = $request->user()->accounts()->paginate(10);
    	$account = Accounts::findOrFail($id);
    	return view('admin.pages.accounts.rgen_info', compact('account', 'accounts'));
    }

    public function edit(Request $request, $id)
    {
    	$accounts = $request->user()->accounts()->paginate(10);
    	$account = Accounts::findOrFail($id);
    	return view('admin.pages.accounts.egen_info', compact('account', 'accounts'));
    }

    public function update(Request $request)
    {
    	$account = Accounts::findOrFail($request['id']);
    	$password = encrypt($request['password']);
    	
    	$account->update([
    		'admin_id' => $request->user()->id,
    		'account' => $request['account'],
    		'username' => $request['username'],
    		'password' => $password
    	]);
    	$message = 'You have successfully updated '.$account->account;
    	return redirect('/accounts')->with('message', $message);
    }

    public function destroy(Request $request, $id)
    {
    	if (Hash::check($request['password'], $request->user()->password) ) {
	    	$account = Accounts::findOrFail($id);
	    	$account->delete();
	    	$message = 'You have successfully deleted '.$account->account;
	    	return redirect('/accounts')->with('message', $message);
    	}
    }

    public function showPassword(Request $request)
    {	
    	$accounts = $request->user()->accounts()->paginate(10);
    	$account = Accounts::findOrFail($request['id']);
    	
    	if (Hash::check( $request['password'], $request->user()->password)) {
    		$password = decrypt($account->password);
	    	return view('admin.pages.accounts.rgen_info', compact('account', 'accounts', 'password'));
		}
		$password = 'Incorrect Password';
		return view('admin.pages.accounts.rgen_info', compact('account', 'accounts', 'password'));
    }

}

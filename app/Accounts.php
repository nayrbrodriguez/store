<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
    	'admin_id',
    	'account',
    	'username',
    	'password'
    ];	
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accounts extends Model
{
	use SoftDeletes;

    protected $table = 'accounts';

    protected $fillable = [
    	'admin_id',
    	'account',
    	'username',
    	'password'
    ];	

    public function scopeFilter($query, $filter)
    {
    	if (isset($filter['account']) && !is_null($filter['account'])) {
    		$query = $query->where('account', 'LIKE', '%'.$filter['account'].'%');
    	}

    	return $query;
    }
}

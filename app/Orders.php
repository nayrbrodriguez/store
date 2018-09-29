<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use SoftDeletes;

    protected $table = 'tb_order';

    protected $fillable = [
    	'prod_id',
    	'cust_id',
    	'status',
    	'total_amy',
    	'qty',
    	'price',
    	'admin_id'
    ];	

   
}

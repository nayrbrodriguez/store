<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deductions extends Model
{
    protected $table = 'tb_deductions';

    protected $fillable = [
    	'user_id',
    	'total_amount',
    	'date_of_payment'
    ];
}

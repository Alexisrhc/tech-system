<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    protected $primaryKey = 'id_provider';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id_provider',
    	'rif',
    	'business_name',
    	'contact',
    	'name',
    	'address',
    	'phone',
    	'email',
    	'bank',
    	'bank_account',
    	'name_bank_account',
    	'id_bank_account'
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $primaryKey = 'id_bill_detail';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_bill_detail', 'id_bill', 'id_product', 'quantity'];
}

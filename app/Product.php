<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id_product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_product', 'code_product', 'serial_product', 'smart_card', 'model', 'name', 'description', 'quantity', 'price', 'status'];

}

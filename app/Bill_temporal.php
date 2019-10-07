<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_temporal extends Model
{
    protected $primaryKey = 'id_bill_temporal';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_bill_temporal', 'status'];
}

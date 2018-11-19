<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "product_types";

    public $timestamp = false;

    protected $fillable = [
    		'name_id',
    		'type',
    		'name',
    		'description',
    		'image',
    		'created_at',
    		'updated_at'
    ];

    public function product()
    {
        return $this->hasMany('app/Products', 'type_id','id');
    }
}

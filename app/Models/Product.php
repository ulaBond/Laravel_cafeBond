<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Model Product: to work with a DB table PRODUCTS. 
 * @author Yuliia Bondarenko JKTV21 Year - 2023
 * 
 * @copyright Copyright 2023
 */
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'created_at',
        'description',
        'image',        
        'price',
        'title',
        'units'
    ];
    /**
     * Для связи с категориями по полю category_id - много-к-одному
     * */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');//WARNING: attansion to SLASH: / or \
    }
}

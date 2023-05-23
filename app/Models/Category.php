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
class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'created_at'
    ];
    /**
     * Для связи с моделью  Product - один-ко-многим
     */
    public function product()
    {
        return $this->hasMany('App\Models\Product');//WARNING: attansion to SLASH: / or \
    }
}

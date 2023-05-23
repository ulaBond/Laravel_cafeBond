<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Model Order: to work with a DB table ORDERS. 
 * @author Yuliia Bondarenko JKTV21 Year - 2023
 * 
 * @copyright Copyright 2023
 */
class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'order_date',
        'name',
        'email',
        'phone',
        'adress',
        'total_price',
        'created_at'
    ];
    /**
     * Для связи с таблицей orders_detail по полю order_id - много-к-одному
     * */
    public function orderD()
    {
        return $this->hasMany('App\Models\Order_detail','order_id');//WARNING: attansion to SLASH: / or \
    }
}

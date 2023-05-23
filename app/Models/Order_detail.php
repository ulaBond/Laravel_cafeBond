<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Model Order_detail: to work with a DB table ORDERS_DETAILS. 
 * @author Yuliia Bondarenko JKTV21 Year - 2023
 * 
 * @copyright Copyright 2023
 */
class Order_detail extends Model
{
    use HasFactory;
    protected $table = 'orders_detail';
    public $timestamps = true;

    protected $fillable = [
        'order_id',
        'products_id',
        'product_name',
        'amount',
        'price',
        'summ_prod',
        'created_at'        
    ];
    /** 
     * Для связи с order по полю order_id - много-к-одному
    */
    public function orders()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');//WARNING: attansion to SLASH: / or \
    }
}

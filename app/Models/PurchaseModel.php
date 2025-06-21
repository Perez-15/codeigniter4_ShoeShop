<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseModel extends Model
{
    protected $table = 'purchases';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_id', 'product_name', 'product_price',
        'customer_name', 'address', 'phone', 'payment_method', 'image'
    ];
}

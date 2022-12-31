<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartOrder extends Model
{
    protected $table;
    public function __construct()
    {
        $this->table = 'cartorder';
    }

    protected $primaryKey = 'cartorderId';

    protected $fillable = [
        'order_id',
        'cart_id',
        'review',
        'productnote'
    ];
}

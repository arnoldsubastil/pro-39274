<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table;
    public function __construct()
    {
        $this->table = 'Cart';
    }

    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'user_id',
        'status',
        'product_id',
        'qty',
        'product_note',
        'date_added'
    ];
}

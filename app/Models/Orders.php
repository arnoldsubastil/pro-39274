<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table;
    public function __construct()
    {
        $this->table = 'orders';
    }

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'full_name',
        'status',
        'email',
        'mailing_address',
        'delivery_address',
        'contact_number',
        'mode_of_payment',
        'reference_no',
        'amount',
        'voucher_id',
        'voucher_proof',
        'notes',
        'date_receive',
        'shippingId'
    ];
}

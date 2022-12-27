<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table;
    public function __construct()
    {
        $this->table = 'voucher';
    }

    protected $primaryKey = 'voucher_id';

    protected $fillable = [
        'voucher_code',
        'valid_date_start',
        'valid_date_end',
        'required_items',
        'discount_type',
        'discount',
        'specific_user',
        'proof_needed',
        'updated_at',
        'created_at'
    ];
}

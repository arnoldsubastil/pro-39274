<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table;
    public function __construct()
    {
        $this->table = 'reviews';
    }

    protected $primaryKey = 'review_id';

    protected $fillable = [
        'customer_id',
        'product_id',
        'review',
        'approval',
        'updated_at',
        'created_at'
    ];
}

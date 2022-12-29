<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table;
    public function __construct()
    {
        $this->table = 'contactus';
    }

    protected $primaryKey = 'contactId';

    protected $fillable = [
        'email',
        'message',
        'read_done',
        'updated_at',
        'created_at'
    ];
}

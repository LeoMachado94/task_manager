<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_addresses';

    protected $fillable = [
        'address',
        'address_number',
        'address_district',
        'address_complement',
        'address_city',
        'address_state',
        'address_type'
    ];
}

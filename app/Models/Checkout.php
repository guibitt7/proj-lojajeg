<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'card_name',
        'card_number',
        'card_expiry',
        'card_cvc',
    ];
}
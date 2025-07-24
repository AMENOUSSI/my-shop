<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditSale extends Model
{
    protected $fillable = [
        'client_name',
        'client_phone',
        'description',
        'amount',
        'date',
        'is_paid',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

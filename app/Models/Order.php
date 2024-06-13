<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Address;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function userAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}

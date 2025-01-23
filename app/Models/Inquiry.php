<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message', 'car_id'];

    /**
     * Get the car associated with the inquiry.
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand_id']; // Add 'name' and 'brand_id' to the fillable fields

    // A model belongs to a brand
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    // A model has many cars
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}

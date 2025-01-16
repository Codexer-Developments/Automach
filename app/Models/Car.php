<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'miles',
        'fuel_type',
        'transmission',
        'owners',
        'price',
        'description',
        'condition',
        'cylinders',
        'chassis_number',
        'doors',
        'year',
        'color',
        'seats',
        'city_mpg',
        'highway_mpg',
        'engine_size',
        'drive_type',
        'brand_id',
        'car_model_id',
        'user_id',
    ];

    // A car belongs to a brand
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    // A car belongs to a car model
    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    // A car belongs to a user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // A car has many images
    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class);
    }

    // A car belongs to many features
    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'car_feature');
    }
}

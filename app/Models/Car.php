<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

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
        'image_urls',
        'user_id',
    ];

    protected $casts = [
        'image_urls' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        // Delete associated images when a car is deleted
        static::deleting(function ($car) {
            foreach ($car->image_urls as $image) {
                Storage::disk('public')->delete($image['url']);
            }
        });
    }
    // A car belongs to a brand
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function BodyType(): BelongsTo
    {
        return $this->belongsTo(BodyType::class);
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

    // A car belongs to many features
    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'car_feature');
    }

    public function getImageUrlsAttribute($value)
    {
        return json_decode($value, true);
    }

    // Mutator: Automatically encode array to JSON string
    public function setImageUrlsAttribute($value)
    {
        $this->attributes['image_urls'] = json_encode($value);
    }
}

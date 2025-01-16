<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo']; // Add 'logo' to the fillable fields

    // A brand has many models
    // public function models(): HasMany
    // {
    //     return $this->hasMany(CarModel::class);
    // }
}

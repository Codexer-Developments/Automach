<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    protected $fillable = [
        'name',
        'image_path',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}

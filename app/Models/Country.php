<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function announcement()
    {
        return $this->hasMany(Announcement::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}

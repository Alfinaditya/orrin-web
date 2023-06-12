<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mens()
    {
        return $this->hasMany(MensParfume::class);
    }

    public function womens()
    {
        return $this->hasMany(WomensParfume::class);
    }

    public function sweets()
    {
        return $this->hasMany(SweetsParfume::class);
    }

    public function casuals()
    {
        return $this->hasMany(CasualsParfume::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

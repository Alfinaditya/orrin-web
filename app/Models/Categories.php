<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categories extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function category_product()
    {
        return $this->hasMany(CategoryProduct::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

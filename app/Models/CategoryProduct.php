<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'category_product';

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class,  'category_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

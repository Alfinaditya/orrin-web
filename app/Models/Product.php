<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category_product()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class,'category_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}





<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    public function subcatalog()
    {
        return $this->belongsTo(Subcatalog::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function characteristic()
    {
        return $this->hasMany(Characteristic::class);
    }
}

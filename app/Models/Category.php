<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Get the phone associated with the user.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subcatalog()
    {
        return $this->belongsTo(Subcatalog::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    /**
     * Get the phone associated with the user.
     */
    public function subcatalogs()
    {
        return $this->hasMany(Subcatalog::class);
    }
}

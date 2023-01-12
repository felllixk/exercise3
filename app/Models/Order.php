<?php

namespace App\Models;

use App\Http\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => OrderStatus::class
    ];

    public function setStatus(OrderStatus $status)
    {
        $this->status = $status;
    }
}

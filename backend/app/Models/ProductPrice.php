<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductPrice extends Pivot
{
    use HasFactory;

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }
}

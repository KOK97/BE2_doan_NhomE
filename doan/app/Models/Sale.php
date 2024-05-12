<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount',
        'sale_content',
    ];
    public function products():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'reduced_price'.
        'image',
        'publishing_year',
        'sale_id',
        'author_id',
        'category_id',
    ];

    public function sales():HasMany
    {
        return $this->hasMany(Sale::class);
    }
    public function author():BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}

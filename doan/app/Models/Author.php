<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_name',
        'pseudonym',
        'year_of_birth',
    ];
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

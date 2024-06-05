<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Wishlist extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'wishlist';
    protected $primaryKey = 'wishlist_id';

    protected $fillable = [
        'product_id',
        'user_id',
    ];
}

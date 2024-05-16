<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'userID', 'productID','soluong'];
    public function product()
    {
      return $this->belongsTo(Product::class);
    }
    public function order(){
      return $this->hasOne(Order::class);
    }
}

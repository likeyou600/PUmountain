<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

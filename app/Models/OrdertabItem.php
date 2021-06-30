<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdertabItem extends Model
{
    protected $table = 'ordertab_items';
    public $timestamps = false;
    use HasFactory;
}

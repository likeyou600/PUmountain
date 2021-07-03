<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    protected $table = 'regulations';
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;
}

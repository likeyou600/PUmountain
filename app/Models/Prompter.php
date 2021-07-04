<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prompter extends Model
{
    protected $table = 'prompters';
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;

}

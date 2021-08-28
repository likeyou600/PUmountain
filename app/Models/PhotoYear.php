<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoYear extends Model
{
    protected $table = 'photo_years';
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;

    public function activityphotos()
    {
        return $this->hasMany(ActivityPhoto::class);
    }
}

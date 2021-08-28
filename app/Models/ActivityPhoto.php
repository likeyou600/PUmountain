<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityPhoto extends Model
{
    protected $table = 'activity_photos';
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;

    public function photoyear()
    {
        return $this->belongsTo(PhotoYear::class);
    }
}

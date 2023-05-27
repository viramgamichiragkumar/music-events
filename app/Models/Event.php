<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $guarded = [];
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}

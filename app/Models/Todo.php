<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

    protected $touches = [
        'recording',
    ];

    public $timestamps = false;

    public function recording()
    {
        return $this->belongsTo(Recording::class);
    }
}

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
        return $this->morphOne(Recording::class, 'recordable')->withTrashed();
    }

    public function feedName()
    {
        return __('Todo ":title""', ['title' => $this->title]);
    }

    public function showRoute()
    {
        return $this->recording->showTodoRoute();
    }
}

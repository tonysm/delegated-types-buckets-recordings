<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recording extends Model
{
    use HasFactory, SoftDeletes;

    protected $touches = [
        'bucket',
        'parent',
        'creator',
    ];

    public function bucket()
    {
        return $this->belongsTo(Bucket::class);
    }

    public function recordable()
    {
        return $this->morphTo();
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Recording::class);
    }

    public function setRecordableAttribute($recordable)
    {
        $this->recordable()->associate($recordable);
    }

    public function setCreatorAttribute($creator)
    {
        $this->creator()->associate($creator);
    }

    public function setParentAttribute($parent)
    {
        $this->parent()->associate($parent);
    }
}

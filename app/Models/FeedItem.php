<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeedItem extends Model
{
    use HasFactory;

    public function bucket()
    {
        return $this->belongsTo(Bucket::class);
    }

    public function recording()
    {
        return $this->belongsTo(Recording::class)->withTrashed();
    }

    public function recordable()
    {
        return $this->morphTo();
    }

    public function setBucketAttribute($bucket)
    {
        $this->bucket()->associate($bucket);
    }

    public function setRecordingAttribute($recording)
    {
        $this->recording()->associate($recording);
    }

    public function setRecordableAttribute($recordable)
    {
        $this->recordable()->associate($recordable);
    }
}

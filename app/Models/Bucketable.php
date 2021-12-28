<?php

namespace App\Models;

trait Bucketable
{
    public static function booted()
    {
        static::created(function ($model) {
            $model->bucket()->create();
        });
    }

    public function bucket()
    {
        return $this->morphOne(Bucket::class, 'bucketable');
    }
}

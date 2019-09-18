<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function qustion()
    {
        return $this->belongsTo(Qustion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function($answer){
            $answer->qustion->increment('answers_count');
            $answer->qustion->save();
        });

    }
}

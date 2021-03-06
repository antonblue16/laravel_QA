<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Answer extends Model
{
    protected $fillable = ['body', 'user_id'];

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

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public function getCreatedDateAttribute() //membuat format waktu
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        return $this->isBest() ? 'vote-accepted' : '';
    }

    public function getIsBestAttribute()
    {
        return $this->isBest();
    }

    public function isBest()
    {
        return $this->id === $this->qustion->best_answer_id;
    }

    public static function boot()
    {
        parent::boot();

        static::created(function($answer){
            $answer->qustion->increment('answers_count');
            //$answer->qustion->save();
        });

        static::deleted(function($answer){
            $answer->qustion->decrement('answers_count');
        });
    }
}

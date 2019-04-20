<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'id','answer', 'description',
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::Class, 'answer_question', 'question_id', 'answer_id');
    }
}

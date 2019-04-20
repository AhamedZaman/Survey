<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerQuestion extends Model
{
    protected $table = 'answer_question';

    protected $fillable = [
        'answer_id', 'question_id',
    ];

    public function take_suveys()
    {
        return $this->belongsToMany(TakeSurvey::Class, 'answer_question_survey', 'answer_question_id', 'take_survey_id');
    }
}

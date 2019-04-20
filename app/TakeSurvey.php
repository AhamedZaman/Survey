<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Address;
use App\Survey;
use App\User;
use App\AnswerQuestion;

class TakeSurvey extends Model
{
    protected $table = 'take_survey';

    protected $fillable = [
        'type', 'address_id', 'survey_id', 'user_id', 'comment',
    ];

    public function addresses()
    {
        return $this->belongsTo(Address::Class, 'address_id');
    }

    public function users()
    {
        return $this->belongsTo(User::Class, 'user_id');
    }

    public function surveys()
    {
        return $this->belongsTo(Survey::Class, 'survey_id');
    }

    public function answer_questions()
    {
        return $this->belongsToMany(AnswerQuestion::Class, 'answer_question_survey', 'take_survey_id', 'answer_question_id');
    }
}

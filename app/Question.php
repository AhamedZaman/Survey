<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Answer;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'id','question', 'is_optional', 'status', 'priority','category_id',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::Class, 'category_id');
    }

    public function answers()
    {
        return $this->belongsToMany(Answer::Class, 'answer_question', 'question_id',  'answer_id');
    }
}

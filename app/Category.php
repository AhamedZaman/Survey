<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Survey;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'description', 'status',
    ];

    public function questions()
    {
        return $this->hasMany(Question::Class, 'category_id');
    }
    public function surveys()
    {
        return $this->belongToMany(Survey::Class, 'category_survey', 'category_id', 'survey_id');
    }
}

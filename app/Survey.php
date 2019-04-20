<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
use App\Address;
use App\Zone;
use App\TakeSurvey;

class Survey extends Model
{
    protected $table = 'surveys';

    protected $fillable = [
        'name', 'status',
    ];

    public function categories()
    {
        return $this->belongToMany(Category::Class, 'category_survey', 'category_id', 'survey_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::Class, 'take_survey', 'survey_id', 'user_id', 'address_id' )->withPivot('type', 'comment');
    }
    public function addresses()
    {
        return $this->belongsToMany(Address::Class, 'take_survey', 'survey_id', 'address_id', 'user_id' )->withPivot('type', 'comment');
    }

    public function take_surveys()
    {
        return $this->hasMany(TakeSurvey::Class, 'survey_id');
    }

    public function zones()
    {
        return $this->belongsToMany(Zone::Class, 'survey_zone', 'survey_id', 'zone_id');
    }
}

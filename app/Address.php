<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Zone;
use App\Survey;
use App\User;
use App\TakeSurvey;


class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'house_no', 'road', 'village', 'union_word', 'zone_id'
    ];

    public function zones()
    {
        return $this->belongsTo(Zone::Class, 'zone_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::Class, 'take_survey', 'address_id', 'user_id', 'survey_id')->withPivot('type', 'comment');
    }
    public function surveys()
    {
        return $this->belongsToMany(Survey::Class, 'take_survey', 'address_id', 'survey_id', 'user_id' )->withPivot('type', 'comment');
    }

    public function take_surveys()
    {
        return $this->hasMany(TakeSurvey::Class, 'address_id');
    }
}

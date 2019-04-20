<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\TakeSurvey;
use App\Address;
use App\Survey;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function take_surveys()
    {
        return $this->hasMany(TakeSurvey::Class, 'user_id');
    }

    public function addresses()
    {
        return $this->belongToMany(Address::Class, 'take_survey', 'user_id', 'address_id', 'survey_id')->withPivot('type', 'comment');
    }

    public function surveys()
    {
        return $this->belongToMany(Survey::Class, 'take_survey', 'user_id', 'survey_id', 'address_id')->withPivot('type', 'comment');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

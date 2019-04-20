<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Upazila;
use App\Address;
use App\Survey;

class Zone extends Model
{
    protected $table = 'zones';

    protected $fillable = [
        'name', 'postal_code', 'police_station', 'upazila_id'
    ];

    public function upazilas()
    {
        return $this->belongsTo(Upazila::Class, 'upazila_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::Class, 'zone_id');
    }

    public function surveys()
    {
        return $this->belongsToMany(Survey::Class, 'survey_zone', 'zone_id', 'survey_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\District;
use App\Zone;

class Upazila extends Model
{
    protected $table = 'upazilas';

    protected $fillable = [
        'name', 'description', 'district_id'
    ];

    public function districts()
    {
        return $this->belongsTo(District::Class, 'district_id');
    }

    public function zones()
    {
        return $this->hasMany(Zone::Class, 'upazila_id');
    }
}

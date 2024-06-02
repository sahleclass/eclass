<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attandance extends Model
{
    protected $table = 'attandance';  

    protected $fillable = [
        'user_id',
        'course_id',
        'instructor_id',
<<<<<<< HEAD
        'location_id',
=======
>>>>>>> 940b9d16321bebf5adc1d38a5dc08635c58266c7
        'order_id',
        'date',
        'end_date',
        'status',
        'zoom_id',
        'bbl_id',
        'googlemeet_id',
        'jitsi_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->withDefault();
    }

    public function zoom()
    {
        return $this->belongsTo('App\Meeting','zoom_id','id')->withDefault();
    }

    public function google()
    {
        return $this->belongsTo('App\Googlemeet','googlemeet_id','id')->withDefault();
    }

    public function jitsi()
    {
        return $this->belongsTo('App\JitsiMeeting','jitsi_id','id')->withDefault();
    }

    public function bbl()
    {
        return $this->belongsTo('App\BBL','bbl_id','id')->withDefault();
    }
    public function course()
    {
        return $this->belongsTo('App\Course','course_id','id')->withDefault();
    }
}

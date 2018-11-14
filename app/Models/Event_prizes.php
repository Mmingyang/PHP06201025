<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event_prizes extends Model
{
    //
    protected $fillable=['activity_id','name','description','user_id'];


    public function users()
    {
        return $this->belongsTo(User::class,  'user_id');
    }

    public function event()
    {
        return $this->belongsTo(Activity::class,  'activity_id');
    }


}

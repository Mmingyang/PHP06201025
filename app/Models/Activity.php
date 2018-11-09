<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable=['title','content','start_time','end_time','prize_time','num','is_prize'];

    public function users()
    {
        return $this->belongsToMany(User::class,"event_users",'activity_id','user_id');
    }

}

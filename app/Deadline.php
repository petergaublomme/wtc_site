<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    public function getDates()
    {
        return ['created_at', 'updated_at', 'due_timestamp'];
    }

    public function event() {

        return $this->belongsTo('App\Event');
    }

    public function userdeadlines() {

        return $this->hasMany('App\UserDeadline');
    }

}

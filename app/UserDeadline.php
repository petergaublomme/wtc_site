<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDeadline extends Model
{
    public function getDates()
    {
        return ['created_at', 'updated_at', 'completed_on'];
    }

    public function deadline() {

        return $this->belongsTo('App\Deadline');
    }

    public function user() {

        return $this->belongsTo('App\User');
    }

    public function getDescriptionAttribute() {

        return Deadline::find($this->deadline_id)->description;
    }

    public function getTypeAttribute() {

        return Deadline::find($this->deadline_id)->type;
    }

    public function getDueTimestampAttribute() {

        return Deadline::find($this->deadline_id)->due_timestamp;
    }

}

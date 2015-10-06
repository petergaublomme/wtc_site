<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = [ 'start_timestamp', 'end_timestamp', 'created_at', 'updated_at' ];
}

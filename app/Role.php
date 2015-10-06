<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = array('role');

    public function users() {

        return $this->belongsToMany('App\User', 'roles_users');
    }

}

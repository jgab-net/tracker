<?php
/**
 * User: jgab
 * Date: 19/07/14
 * Time: 12:55 PM
 */

class Role extends Eloquent{

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany('User', 'users_roles')->withPivot('status');
    }

} 
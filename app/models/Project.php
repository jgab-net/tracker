<?php
/**
 * User: jgab
 * Date: 16/07/14
 * Time: 12:28 PM
 */

class Project extends Eloquent{

    public $timestamps = false;

    protected $fillable = array('pivotal_id');

    public function user(){
        return $this->belongsTo('User');
    }

    public function stories(){
        return $this->hasMany('Story');
    }
} 
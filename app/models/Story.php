<?php
/**
 * User: jgab
 * Date: 16/07/14
 * Time: 12:28 PM
 */

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Story extends Eloquent{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public $timestamps = false;

    protected $fillable = array('pivotal_id');

    public function paused(){
        return $this->status == 'DEFAULT' || $this->status == 'PAUSE';
    }

    public function scopeRejected($query,$value){
        return $query->where('type',$value)->where('current_state','rejected');
    }

    public function started(){
        return $this->status == 'START';
    }

    public function closed(){
        return $this->status == 'CLOSE';
    }

    public function is($type){
        return $this->type == $type;
    }

    public function user(){
        return $this->belongsTo('User');
    }

    public function project(){
        return $this->belongsTo('Project');
    }
}
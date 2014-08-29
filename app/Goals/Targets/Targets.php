<?php namespace Goals\Targets;

class Targets extends \Eloquent {
	protected $fillable = ['target','time'];
    protected $table = 'targets';

    public static function addTarget($target,$time){

        return   new static(compact('target','time'));

    }
}
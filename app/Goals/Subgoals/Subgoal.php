<?php namespace Goals\Subgoals;


class Subgoal extends \Eloquent {
    public $table='subgoals';
	protected $fillable = ['goal_id','progress_type','measure_type',
        'start_val','end_val','start_date','end_date','progress_time',
        'frequency','auto_deadline'];

    public function goal(){

        return $this->belongsTo('Goals\Goal\Goal');

    }
    public static function addSubgoal($fields=[]){
        $subgoal = new static($fields);

        return $subgoal;
    }
}
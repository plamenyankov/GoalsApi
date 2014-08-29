<?php namespace Goals\Goal;

use Goals\Goal\Events\GoalWasAdded;
use Laracasts\Commander\Events\EventGenerator;

class Goal extends \Eloquent {
    use EventGenerator;
	protected $fillable = ['name','description'];

    protected $table = 'goals';

    public function subgoal(){

        return $this->hasMany('Goals\Subgoals\Subgoal','goal_id');
    }

    public function addGoal($name, $description){
        $goal = new static(compact('name','description'));

        $goal->raise(new GoalWasAdded($goal));
        return $goal;
    }
}
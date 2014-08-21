<?php namespace Goals\Goal;

class GoalTypeCommand {

    public $goal_type;

    /**
     */
    public function __construct($goal_type)
    {
        $this->goal_type = $goal_type;
    }

}
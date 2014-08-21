<?php namespace Goals\Goal;

class GoalMeasureCommand {

    public $name;
    public $desc;

    /**
     */
    public function __construct($name, $desc)
    {
        $this->name = $name;
        $this->desc = $desc;
    }

}
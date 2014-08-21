<?php namespace Goals\Goal;

class AddNewGoalCommand {

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @param string name
     * @param string description
     */
    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

}
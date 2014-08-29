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
    public $start_date;
    public $deadline;
    public $measureType;
    public $progress_type;
    public $progress_time;
    public $frequency;
    public $startValue;
    public $endValue;
    public $auto_deadline;

    /**
     * @param string name
     * @param string description
     */
    public function __construct($name, $description, $start_date, $deadline, $measureType, $progress_type, $progressTime, $frequency, $startValue, $endValue, $auto_deadline)


    {
        $this->name = $name;
        $this->description = $description;
        $this->start_date = $start_date;
        $this->deadline = $deadline;
        $this->measureType = $measureType;
        $this->progress_type = $progress_type;
        $this->progress_time = $progressTime;
        $this->frequency = $frequency;
        $this->startValue = $startValue;
        $this->endValue = $endValue;
        $this->auto_deadline = $auto_deadline;
    }

}
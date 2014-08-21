<?php namespace Goals\Targets;

class AddTargetCommand {

    /**
     * @var string
     */
    public $target;

    /**
     * @var string
     */
    public $time;
    public $id;

    /**
     * @param string target
     * @param string time
     */
    public function __construct($target, $time,$id)
    {
        $this->target = $target;
        $this->time = $time;
        $this->id = $id;
    }

}
<?php

use Laracasts\Commander\CommanderTrait;

class BaseController extends Controller {
use CommanderTrait;
    public $goal=[];

    /**
     * @param array $goal
     */
    public function setGoal($key,$val)
    {
        $this->goal[$key]=$val;
        View::share('goal',$this->goal);
    }

    /**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
        View::share('goal',$this->goal);
    }
}

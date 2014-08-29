<?php namespace Goals\Goal;

use Illuminate\Support\Facades\Session;
use Laracasts\Commander\CommandHandler;

class GoalTypeCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        Session::put('type',$command->goal_type);
    return $view = 'goals.'.$command->goal_type;

    }

}
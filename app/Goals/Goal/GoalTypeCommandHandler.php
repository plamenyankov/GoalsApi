<?php namespace Goals\Goal;

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
    return $view = 'goals.'.$command->goal_type;

    }

}
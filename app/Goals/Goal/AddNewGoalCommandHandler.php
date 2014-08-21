<?php namespace Goals\Goal;

use Illuminate\Support\Facades\Redirect;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class AddNewGoalCommandHandler implements CommandHandler {
    use DispatchableTrait;
    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $goal = Goal::addGoal($command->name, $command->description);
        $goal->save();
        $this->dispatchEventsFor($goal);

        return Redirect::back();
    }

}
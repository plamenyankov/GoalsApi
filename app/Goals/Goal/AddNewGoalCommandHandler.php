<?php namespace Goals\Goal;

use Goals\Subgoals\Subgoal;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Subgoals;

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
//        print_r($command);
return $command;
        $goal = Goal::addGoal($command->name, $command->description);
        $goal->save();
        $fields=['goal_id'=>$goal['id'],'progress_type'=>$command->progress_type,
            'progress_time'=>$command->progress_time,'frequency'=>$command->frequency,
        'auto_deadline'=>$command->auto_deadline,'start_val'=>$command->startValue,
        'end_val'=>$command->endValue,'start_date'=>$command->start_date,'end_date'=>$command->deadline,
        'measure_type'=>$command->measureType];
        $subgoal = Subgoal::addSubgoal($fields);
        $subgoal->save();
        $this->dispatchEventsFor($goal);

        return Redirect::back();
    }

}
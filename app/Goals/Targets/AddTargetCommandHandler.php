<?php namespace Goals\Targets;

use Laracasts\Commander\CommandHandler;
use Goals\Goal\Goal;
class AddTargetCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $tar = Targets::addTarget($command->target,$command->time);
      return  Goal::find($command->id)->targets()->save($tar);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: vipbs
 * Date: 13/08/14
 * Time: 08:02
 */

namespace Goals\Goal\Events;

use Goals\Goal\Goal;
class GoalWasAdded {

    /**
     * @var Goal
     */
    private $goal;

    function __construct(Goal $goal)
    {
        $this->goal = $goal;
    }
}
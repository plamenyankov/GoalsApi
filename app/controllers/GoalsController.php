<?php

use Goals\Form\GoalValidation;
use Goals\Goal\Goal;
use Goals\Goal\AddNewGoalCommand;
use Goals\Goal\GoalTypeCommand;
use Goals\Goal\GoalMeasureCommand;
class GoalsController extends \BaseController {

    /**
     * @var Goals\Form\GoalValidation
     */
    private $validation;

    function __construct(GoalValidation $validation)
    {
        $this->validation = $validation;
    }

    /**
	 * Display a listing of the resource.
	 * GET /goals
	 *
	 * @return Response
	 */
	public function index()
	{

        $goals = Goal::paginate(5);
//        return ['goals'=>$goals];
        return View::make('goals.index')->with(['goals'=>$goals, 'count'=>Goal::count()]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /goals/create
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('goals.create');
	}

    /**
     * @return mixed
     */
    public function type(){
    $view = $this->execute(GoalTypeCommand::class);
    return View::make($view);
}

    /**
     * @return mixed
     */
    public function measure(){
        $view = $this->execute(GoalMeasureCommand::class);
        return View::make($view);
    }
	/**
	 * Store a newly created resource in storage.
	 * POST /goals
	 *
	 * @return Response
	 */
	public function store()
	{
        $goal =Input::get('goal-type');

//        $goal = Input::get();

        $this->validation->validate($goal);
        $this->execute(AddNewGoalCommand::class);
//        Goal::create([
//        'name'=>$goal['name'],
//        'description'=>$goal['description']
//      ]);
        Flash::success('Welcome abroad!');
return 1;
	}

	/**
	 * Display the specified resource.
	 * GET /goals/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $goals = Goal::find($id);
        $goals['date'] = $goals['created_at']->diffForHumans();
        $targets = Goal::find($id)->targets;
        return ['goals'=>$goals,'targets'=>$targets];
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /goals/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return $id;
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /goals/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return Input::all();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /goals/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
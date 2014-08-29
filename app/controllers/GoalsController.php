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

        $goals = Goal::with('subgoal')->paginate(5);
//return $goals[2]['subgoal'][0]['end_date'];
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
        $type=Input::get('goal_type');
        $this->setGoal('type',$type);
//       array_add($this->goal,'type',$type);
//    $view = $this->execute(GoalTypeCommand::class);
    return View::make('goals.partials.description');
}

    /**
     * @return mixed
     */
    public function measure(){
//        $view = $this->execute(GoalMeasureCommand::class);
        $mt =  Input::get('measure_type');
        $pt = Input::get('progression_type');
        Session::put('measureType',$mt);
        Session::put('progress_type',$pt);

        return View::make('goals.partials.measure-details');
    }
    public function description(){
        $name = Input::get('name');
        $descr = Input::get('descr');
        $sd = Input::get('start_date');
        $deadline = Input::get('deadline');
        Session::put('name',$name);
        Session::put('description',$descr);
        Session::put('start_date',$sd);
        Session::put('deadline',$deadline);

        return View::make('goals.partials.measure');
    }
	/**
	 * Store a newly created resource in storage.
	 * POST /goals
	 *
	 * @return Response
	 */
	public function store()
	{
        $session = Session::all();
//        $goal =Input::get('goal-type');

//        $goal = Input::get();

//        $this->validation->validate($goal);
        $this->execute(AddNewGoalCommand::class,$session);
//        Goal::create([
//        'name'=>$goal['name'],
//        'description'=>$goal['description']
//      ]);
        Flash::success('Welcome abroad!');
return 1;
	}
public function progression(){
    $setTime =  Input::get('progress_type');
    $f =  Input::get('frequency');
    $pv =  Input::get('prog_val');
    $sv =  Input::get('start_val');
    $ev =  Input::get('end_val');
    $auto =  Input::get('auto');
    Session::put('progress_time',$setTime);
    Session::put('progressValue',$pv);
    Session::put('frequency',$f);
    Session::put('startValue',$sv);
    Session::put('endValue',$ev);
    Session::put('auto_deadline',$auto);
    return View::make('goals.simple');
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

       return Goal::find($id)->subgoal()->get();
//        $goals['date'] = $goals['created_at']->diffForHumans();


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
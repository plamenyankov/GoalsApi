<?php
use Goals\Targets\Targets;
use Goals\Targets\AddTargetCommand;
class TargetsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /targets
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /targets/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /targets
	 *
	 * @return Response
	 */
	public function store()
	{

        $tar = $this->execute(AddTargetCommand::class);
        return  $tar;
	}

	/**
	 * Display the specified resource.
	 * GET /targets/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /targets/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /targets/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /targets/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
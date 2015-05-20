<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;

class EventsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$timelines = \App\Timeline::all();
		$events = \App\Event::all()->sortBy('start_time');

		return view('index', compact('timelines', 'events'));
	}

	public function processView()
	{
		$events = \App\Event::all()->sortBy('start_time');
		foreach($events as $event)
			$event->timeline = \App\Timeline::find($event->timeline_id)->name;

		return view('process', compact('events'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeTimeline()
	{
		//dd("!");
		$input = Request::all();
		\App\Timeline::create($input);

		return redirect('/');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeEvent()
	{
		//dd("!");
		$input = Request::all();
		\App\Event::create($input);

		return redirect('/');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyTimeline($id)
	{
		$timeline = \App\Timeline::find($id);
		$timeline->delete();
		return redirect('/');
	}

	public function destroyEvent($id)
	{
		$event = \App\Event::find($id);
		$event->delete();
		return redirect('/');
	}

}

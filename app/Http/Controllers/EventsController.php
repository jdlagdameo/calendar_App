<?php

/**
 * Events Controller 
 * 
 * @author: John Dave Lagdameo <jdlagdameo@gmail.com>
 * @since: 2021/01/08
 * @internal revisions: 
 * + 
 * 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 

        return view('index');

        $events = Event::all();
        $success = $events? true: false;
        $message = "Event list successfully retrieved"; 
        $data = $events;

        return response()->json(compact("success", "message", "data"));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $event = Event::create($request->all());

        $success = $event ? true : false;
        $message = $success ? "Event successfully saved." : "Error occured while trying to save record. Please try again.";
        $data = Event::get()->last();

        return response()->json(compact("success", "message", "data"));

    }


}

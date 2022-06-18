<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performance;
use App\Models\Performer;
use App\Models\Timeslot;
use App\Models\Like;

class PerformanceController extends Controller
{
    //

    public function getAll()
    {
        $performances = Performance::orderBy(Timeslot::select('start_datetime')->whereColumn('timeslots.id', 'timeslot_id')->orderBy('timeslots.start_datetime', 'asc'))->get();
        
        return view('performances', ['performances' => $performances]);
    }

    public function get($id)
    {
        $performance = Performance::find($id);
        return view('performance')->with('performance', $performance);
    }

    public function getAllLikes()
    {
        $performances = Performance::orderBy(Timeslot::select('start_datetime')->whereColumn('timeslots.id', 'timeslot_id')->orderBy('timeslots.start_datetime', 'asc'))->get();

        
        return view('likes', ['performances' => $performances]);
    }

    
    
}

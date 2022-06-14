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

    public function getLikes()
    {
        $likes = Performance::find(1)->likes;
        foreach ($likes as $like)
        {
            echo($like->user_id);
        }
    }

    public function getAll()
    {
        $performances = Performance::all();
        
        return view('performances', ['performances' => $performances]);
    }

    public function get($id)
    {
        $performance = Performance::find($id);
        return view('performance')->with('performance', $performance);
    }

    public function getAllLikes()
    {
        $performances = Performance::all();
        
        return view('likes', ['performances' => $performances]);
    }
    
}

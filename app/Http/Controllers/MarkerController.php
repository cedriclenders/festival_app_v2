<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marker;
use App\Models\User;

use Auth;


class MarkerController extends Controller
{
    //
    public function getMarkerData()
    {
        $markers = auth()->user()->markers;
        $markers->push(Marker::all()->where('is_admin', true));
        return json_encode($markers);
    }

    public function add(Request $request)
    {
       $marker = new Marker;
       $marker->name = $request['name'];
       $marker->user_id = Auth::user()->id;
       $marker->emoji_path = $request['icon'];
       $marker->long = $request['long'];
       $marker->lat = $request['lat'];
       $marker->save();

       return redirect('/markers');
    }
}

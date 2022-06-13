<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;

class FestivalController extends Controller
{
    //
    public function getAll()
    {
        $festivals = Festival::all();
        return view('festivals', ['festivals' => $festivals]);
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;

class StageController extends Controller
{
    //

   public function getAll()
   {
       $stages = Stage::all();
       return view('stages')->with('stages', $stages);
   }

   public function get($id)
   {
       $stage = Stage::find($id);
       return view('stage')->with('stage', $stage);
   }

   public function getStages()
   {
        $stages = Stage::all();
        return json_encode($stages);
   }

   
}

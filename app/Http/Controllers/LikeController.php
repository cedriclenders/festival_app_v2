<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performance;
use App\Models\Like;
use Auth;

class LikeController extends Controller
{
    //

    public function likePerformance($id)
    {
        $like = new Like;
        $like->performance_id = $id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return response()->json(array('success' => true, 'like' => $like));
        //return redirect('/performances')->with('message','Post Like successfully!');
    }

    public function unlikePerformance($id)
    {
        $like = Like::where('user_id','=',Auth::user()->id)->where('performance_id', '=', $id);
        $like->delete();
        
        return redirect('/performances')->with('message','Post Like undo successfully!');
    }
}

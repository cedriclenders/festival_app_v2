<?php

namespace App\Http\Controllers;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function getAll()
    {
        $faqs = FrequentlyAskedQuestion::all();
        return view('faqs')->with('faqs', $faqs);
    }
 
    public function get($id)
    {
        $faq = FrequentlyAskedQuestion::find($id);
        return view('faq')->with('faq', $faq);
    }
 
}

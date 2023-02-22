<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AshAllenDesign\ShortURL\Models\ShortURL;

class report extends Controller
{
    public function index($id)

    {
            $allcompains =ShortURL::where('user_id',$id)->get();
            return view('reportpage',get_defined_vars());
    }
    public function index2()
    {
            $allcompains =ShortURL::get();
            return view('reportpage',get_defined_vars());
    }
}

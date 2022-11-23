<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    //

    public function index(){
        $list_fac = DB::table('faculty_models')->get();
        return view('user.index')->with('list_fac', $list_fac);
    }
}

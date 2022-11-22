<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index()
    {
        $list_source = DB::table('research_sources')->get();
        return view('user.index')->with('list_source', $list_source);
    }

    public function insertResearch()
    {

    }
}

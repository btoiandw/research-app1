<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function index()
    {
        $list_fac = DB::table('faculty_models')->get();
        $list_source = DB::table('research_sources')->get();
        return view('user.index',['list_source'=>$list_source,'list_fac'=>$list_fac]);
    }

    public function insertResearch(Request $request)
    {
        /* $validateData = $request->validate([
            'year_research' => 'required|max:4',
            'research_nameTH' => 'required|unique:research,research_th',
            'research_nameEN' => 'required|unique:research,research_en',
            'researcher' => 'required',
            'researcher.*' => 'required',
            'faculty' => 'required',
            'faculty.*' => 'required',
            'role-research' => 'required',
            'role-research.*' => 'required',
            'pc' => 'required',
            'pc.*' => 'required',
            'source_id' => 'required',
            'type' => 'required',
            'keyword' => 'required',
            'area_research' => 'required',
            'sdate' => 'required',
            'edate' => 'required',
            'budage' => 'required',
            'word' => 'required',
            'pdf' => 'required'
        ], [
            'year_research.required' => 'ข้อมูลปีงบประมาณห้ามเกิน 4 ตัว',
            'research_nameTH.required' => 'โปรดระบุชื่อโครงร่างภาษาไทย',
            'research_nameEN.required' => 'โปรดระบุชื่อโครงร่างภาษาอังกฤษ',
            'researcher.required' => 'โปรดระบุรายชื่อนักวิจัย',
            'faculty.required' => 'โปรดระบุสังกัด/คณะ',
            'role-research.required' => 'โปรดระบุบทบาทในการวิจัย',
            'pc.required' => 'โปรดระบุร้อยละในการวิจัย',
            'source_id.required' => 'โปรดระบุแหล่งทุนวิจัย',
            'type.required' => 'โปรดระบุประเภทงานวิจัย',
            'keyword.required' => 'โปรดระบุคำสำคัญ',
            'area_research.required' => 'โปรดระบุพื้นที่ในการวิจัย',
            'sdate.required' => 'โปรดระบุวันที่เริ่มต้นการวิจัย',
            'edate.required' => 'โปรดระบุวันที่สิ้นสุดการวิจัย',
            'budage.required' => 'โปรดระบุงบประมาณการวิจัย',
            'word.required' => 'โปรดระบุไฟล์ word ',
            'pdf.required' => 'โปรดระบุไฟล์ pdf '
        ]); */

        dd($request->all());
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class StrandSurveyController extends Controller
{
    public function strand_survey()
    {
        $questions1 = DB::table('clone_survey')->join('clone_strand_category', 'clone_survey.category_id', '=', 'clone_strand_category.clone_strand_id')
            ->where('survey_type', 1)
            ->get();
        $questions2 = DB::table('clone_survey')->join('clone_strand_category', 'clone_survey.category_id', '=', 'clone_strand_category.clone_strand_id')
            ->where('survey_type', 0)
            ->get();
        return view('strand_survey', ['questions1' => $questions1, 'questions2' => $questions2]);
    }

    public function submit_survey(Request $request)
    {
        DB::table('total_test')->insert(['total' => $request->total_one, 'user_id' => session()->get('userid'), 'category_id' => $request->category_id1]);
        DB::table('total_test')->insert(['total' => $request->total_two, 'user_id' => session()->get('userid'), 'category_id' => $request->category_id2]);
        DB::table('total_test')->insert(['total' => $request->total_three, 'user_id' => session()->get('userid'), 'category_id' => $request->category_id3]);
        DB::table('total_test')->insert(['total' => $request->total_four, 'user_id' => session()->get('userid'), 'category_id' => $request->category_id4]);
        DB::table('userlogin')->where('id', session()->get('userid'))->update(['take_survey_exam' => 1]);
        Alert::success('Success', 'Survey submitted successfully!');
        return redirect("/landingpage");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class CouncelorController extends Controller
{
    public function coucelorhomepage(){
        $studentlist = DB::select("SELECT * FROM `userlogin` WHERE usertype = 'student'");
        return view('councelor.homepage',['studentlist'=>$studentlist]);
    }
    public function surveylist(){
        $take_survey = DB::select("SELECT * FROM `take_survey`");
        return view('councelor.survey',['take_survey'=>$take_survey]);
    }
    public function addsurvey(Request $request){
        $Survey_Question = $request->input('Survey_Question');
        $request->validate([
            'Survey_Question' => 'required'
        ]);
        $insertsurvey = DB::insert("INSERT INTO `take_survey` (`id`, `survey_question`) VALUES (NULL, '$Survey_Question')");
        Alert::success('Success!','New Survey Added Successfuly!');
        return redirect('surveylist');
    }
    public function deletesurvey($id){
        $deletesurvey = DB::delete("DELETE FROM `take_survey` WHERE id = $id");
        Alert::success('Success!','Survey Item Deleted Successfuly!');
        return redirect('surveylist');
    }
    public function editsurvey($id,$survey){
        return redirect('surveylist')->with(['id'=>$id, 'survey'=>$survey]);
    }
    public function savechanges(Request $request){
        $Survey_Question = $request->input('Survey_Question');
        $surveyid = $request->input('surveyid');
        $updatechanges = DB::update("UPDATE `take_survey` SET `survey_question` = '$Survey_Question' WHERE `take_survey`.`id` = $surveyid");
        Alert::success('Success!','Survey Item Updated Successfuly!');
        return redirect('surveylist');
    }
    public function viewsurvey($lrn){
        $survey  = DB::SELECT("SELECT * FROM `list_survey` WHERE `lrn` = '$lrn'");
        return redirect('coucelorhomepage')->with(['survey'=>$survey]);
    }
}

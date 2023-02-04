<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class SurveyController extends Controller
{
    public function takesurvey(Request $request){
        $email = Session('email');
        // $request->validate([
        //     's1' =>'required',
        //     's2' =>'required',
        //     's3' =>'required',
        //     's4' =>'required',
        //     's5' =>'required',
        //     's6' =>'required',
        //     's7' =>'required',
        //     's8' =>'required',
        //     's9' =>'required',
        //     's10' =>'required',
        //     's10' =>'required',
        //     's11' =>'required',
        //     's12' =>'required',
        //     's13' =>'required',
        //     's14' =>'required',
        //     's15' =>'required',
        //     's16' =>'required',
        //     's17' =>'required',
        //     's18' =>'required',
        //     's19' =>'required'
        // ]);
        // $s1 = $request->input('s1');
        // $s2 = $request->input('s2');
        // $s3 = $request->input('s3');
        // $s4 = $request->input('s4');
        // $s5 = $request->input('s5');
        // $s6 = $request->input('s6');
        // $s7 = $request->input('s7');
        // $s8 = $request->input('s8');
        // $s9 = $request->input('s9');
        // $s10 = $request->input('s10');
        // $s11 = $request->input('s11');
        // $s12 = $request->input('s12');
        // $s13 = $request->input('s13');
        // $s14 = $request->input('s14');
        // $s15 = $request->input('s15');
        // $s16 = $request->input('s16');
        // $s17 = $request->input('s17');
        // $s18 = $request->input('s18');
        // $s19 = $request->input('s19');

        $listsurvey = DB::select("SELECT * FROM `take_survey`");

        foreach($listsurvey as $item){
            $myanswer = $request->input($item -> id);
            $survey_question = $item ->survey_question;
            DB::insert("INSERT INTO `list_survey` (`id`, `lrn`, `question`, `answer`) VALUES (NULL, '$email', '$survey_question', '$myanswer')");
        }

        // $surveyinsert = DB::insert("INSERT INTO `survey` (`id`, `surveyer_email`, `survey_1`, `survey_2`, `survey_3`, `survey_4`, `survey_5`, `survey_6`, `survey_7`, `survey_8`, `survey_9`, `survey_10`, `survey_11`, `survey_12`, `survey_13`, `survey_14`, `survey_15`, `survey_16`, `survey_17`, `survey_18`, `survey_19`)
        //  VALUES (NULL, '$email', '$s1', '$s2', '$s3', '$s4', '$s5', '$s6', '$s7', '$s8', '$s9', '$s10', '$s11', '$s12', '$s13', '$s14', '$s15', '$s16', '$s17', '$s18', '$s19')");

        $updatesurvey = DB::update("UPDATE `userlogin` SET `take_survey` = '1' WHERE `userlogin`.`lrn` = '$email'");

        // if($surveyinsert){
            Alert::success('Success', 'Your Survey is Submitted!');
            return redirect('landingpage');
        // }
        return("survey");
    }
    public function surveytaken(){
        Alert::warning('Warning!', 'You Already Submit Your Survey!');
        return redirect('landingpage');
    }
}

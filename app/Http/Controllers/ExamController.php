<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class ExamController extends Controller
{
    public function exam()
    {
        $exam = DB::SELECT("SELECT * FROM `exam` ");
        $lrn = Session('email');
        $date = date('Y-m-d / h : i a');
        $update_exam = DB::update("UPDATE `userlogin` SET `examtime` = '$date', `take_exam` = '1' WHERE `userlogin`.`lrn` = '$lrn'");
        return view('Exam.exam', ['exam' => $exam]);
    }
    public function pass_exam(Request $request)
    {
        $lrn = Session('email');
        $exam = DB::SELECT("SELECT * FROM `exam` ORDER BY `examcode` ASC");
        $stem = 0;
        $abm = 0;
        $humss = 0;
        $cookery = 0;
        foreach ($exam as $index => $item) {
            if (($request->input($item->id) == $item->answer) && ($item->examcode == 1)) {
                $stem++;
            } else if (($request->input($item->id) == $item->answer) && ($item->examcode == 2)) {
                $abm++;
            } else if (($request->input($item->id) == $item->answer) && ($item->examcode == 3)) {
                $humss++;
            } else if (($request->input($item->id) == $item->answer) && ($item->examcode == 4)) {
                $cookery++;
            }
        }

        $stem /= 25;
        $stem *= 100;
        $abm /= 25;
        $abm *= 100;
        $humss /= 25;
        $humss *= 100;
        $cookery /= 25;
        $cookery *= 100;

        $updatesurvey = DB::update("UPDATE `userlogin` SET  `abm` = '$abm', `stem` = '$stem', `cookery` = '$cookery', `humss` = '$humss', `take_exam` = '1' WHERE `userlogin`.`lrn` = '$lrn'");

        Alert::success('Success!', 'You Exam is Submitted Successfully!');
        return redirect('landingpage');
    }
    public function examtaken()
    {
        Alert::warning('Warning!', 'You Already Submit Your Exam!');
        return redirect('landingpage');
    }
}

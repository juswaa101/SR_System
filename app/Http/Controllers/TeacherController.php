<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class TeacherController extends Controller
{
    public function teacherhomepage()
    {
        $examList = DB::SELECT("SELECT * FROM `exam`");
        return view('teacher.homepage', ['examList' => $examList]);
    }
    public function studentlist()
    {
        if (session()->get('usertype') == 'teacher') {
            $studentlist = DB::select("SELECT * FROM `userlogin` WHERE usertype = 'student' AND section = '" . session()->get('section') . "'");
        } else {
            $studentlist = DB::select("SELECT * FROM `userlogin` WHERE usertype = 'student'");
        }
        $stem = 0;
        return view('teacher.student', ['stem' => $stem, 'studentlist' => $studentlist]);
    }
    public function addexam(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'examcode' => 'required',
            'Answer' => 'required',
            'choice_A' => 'required',
            'choice_B' => 'required',
            'choice_C' => 'required',
            'choice_D' => 'required'
        ]);

        $question = $request->input('question');
        $examcode = $request->input('examcode');
        $Answer = $request->input('Answer');
        $choice_A = $request->input('choice_A');
        $choice_B = $request->input('choice_B');
        $choice_C = $request->input('choice_C');
        $choice_D = $request->input('choice_D');

        $InsertExam = DB::INSERT("INSERT INTO `exam` (
                `id`, 
                `question`, 
                `choice_a`, 
                `choice_b`, 
                `choice_c`, 
                `choice_d`, 
                `answer`, 
                `examcode`
            )
            VALUES (
                NULL, 
                '$question', 
                '$choice_A', 
                '$choice_B', 
                '$choice_C', 
                '$choice_D', 
                '$Answer', 
                '$examcode'
            )");

        if ($InsertExam) {
            Alert::success('Success', 'New Exam Added Successfuly! ');
            return redirect('teacherhomepage');
        }
    }
    public function delexam($id)
    {
        $deleteExxam = DB::delete("DELETE  FROM `exam` WHERE id = $id");
        if ($deleteExxam) {
            Alert::success('Success', 'Exam Deleted Successfuly! ');
            return redirect('teacherhomepage');
        }
    }
    public function edituser($id)
    {
        $myexamitem = DB::SELECT("SELECT * FROM `exam` WHERE id = $id");
        $lrn = session('email');
        $userlogin = DB::SELECT("SELECT * FROM `userlogin` where id =$id ");
        $stem = 0;
        $abm = 0;
        $humss = 0;
        $cookery = 0;
        $lrn = "";
        $fullname = "";
        $lname = "";
        $mname = "";
        $math = "";
        $science = "";
        $section = "";
        $recomended = "";
        $date = "";

        foreach ($userlogin as $item) {
            $stem += $item->stem;
            $abm += $item->abm;
            $humss += $item->humss;
            $cookery += $item->cookery;
            $lrn = $item->lrn;
            $fullname = $item->fname;
            $lname = $item->lname;
            $mname = $item->mname;
            $math = $item->math;
            $science = $item->science;
            $section = $item->section;
            $math = $item->math;
            $science = $item->science;
            $date = $item->examtime;
        }

        if (($stem > $abm) && ($stem > $humss) && ($stem > $cookery) && ($math >= 85) && ($science >= 85)) {
            $recomended = "STEM";
        } else if (($abm > $stem) && ($abm > $humss) && ($abm > $cookery) && ($science >= 85)) {
            $recomended = "ABM";
        } else if (($humss >= $cookery)) {
            $recomended = "HUMMS";
        } else if (($cookery > $humss)) {
            $recomended = "COOKERY";
        } else {
            $recomended = "TAKE THE EXAM FIRST";
        }
        return redirect('/studentlist')->with([
            'date' => $date,
            'lname' => $lname,
            'mname' => $mname,
            'id' => $id,
            'stem' => $stem,
            'abm' => $abm,
            'humss' => $humss,
            'cookery' => $cookery,
            'lrn' => $lrn,
            'fullname' => $fullname,
            'math' => $math,
            'science' => $science,
            'section' => $section,
            'recomended' => $recomended,
        ]);
    }
    public function edit($id)
    {
        $myexamitem = DB::SELECT("SELECT * FROM `exam` WHERE id = $id");
        return redirect('/teacherhomepage')->with([
            'id' => $id,
            'question' => $myexamitem[0]->question,
            'a' => $myexamitem[0]->choice_a,
            'b' => $myexamitem[0]->choice_b,
            'c' => $myexamitem[0]->choice_c,
            'd' => $myexamitem[0]->choice_d,
            'answer' => $myexamitem[0]->answer,
            'code' => $myexamitem[0]->examcode,
        ]);
    }
    public function usersaveedit(Request $request)
    {
        $request->validate([
            'Fullname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'lrn' => 'required'
        ]);

        $Fullname = $request->input('Fullname');
        $lname = $request->input('lname');
        $mname = $request->input('mname');
        $lrn = $request->input('lrn');
        $math = $request->input('math');
        $science = $request->input('science');
        $myid = $request->input('myid');
        $section = $request->input("section");
        $mypassword = md5($lrn);
        $saveChanges = DB::UPDATE("UPDATE `userlogin` SET 
        `fname` = '$Fullname', 
        `lname` = '$lname', 
        `mname` = '$mname', 
        `lrn` = '$lrn', 
        `password` = '$mypassword', 
        `math` = '$math', 
        `science` = '$science',
        `section` = '$section' 
        WHERE 
        `userlogin`.`id` = $myid");

        if ($saveChanges) {
            Alert::success('Success', 'User Info Updated Successfuly! ');
            return redirect('studentlist');
        }
    }
    public function saveedit(Request $request)
    {

        $request->validate([
            'question' => 'required',
            'examcode' => 'required',
            'Answer' => 'required',
            'choice_A' => 'required',
            'choice_B' => 'required',
            'choice_C' => 'required',
            'choice_D' => 'required'
        ]);

        $question = $request->input('question');
        $examcode = $request->input('examcode');
        $Answer = $request->input('Answer');
        $choice_A = $request->input('choice_A');
        $choice_B = $request->input('choice_B');
        $choice_C = $request->input('choice_C');
        $choice_D = $request->input('choice_D');
        $myid = $request->input('id');

        $saveChanges = DB::UPDATE("UPDATE `exam` SET 
        `question` = '$question', 
        `choice_a` = '$choice_A', 
        `choice_b` = '$choice_B', 
        `choice_c` = '$choice_C', 
        `choice_d` = '$choice_D', 
        `answer` = '$Answer', 
        `examcode` = '$examcode' 
        WHERE 
        `exam`.`id` = $myid");

        if ($saveChanges) {
            Alert::success('Exam Item Updated Successfuly! ');
            return redirect('teacherhomepage');
        }
    }
    public function addstudents(Request $request)
    {
        $request->validate([
            'Fullname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'lrn' => 'required|numeric|min:12|unique:userlogin,lrn',
        ]);

        $fname = $request->input("Fullname");
        $lname = $request->input("lname");
        $mname = $request->input("mname");
        $lrn = $request->input("lrn");
        $section = $request->input("section");
        $password = md5($lrn);

        $registring = DB::INSERT("INSERT INTO `userlogin` (`id`, `fname`,`lname`,`mname`, `lrn`, `password`, `usertype`, `section`) VALUES (NULL, '$fname', '$lname','$mname', '$lrn', '$password', 'student','$section')");

        if ($registring) {
            Alert::success('Success', 'Account Created Successfuly!');
            return redirect('studentlist');
        }
    }
    public function deluser($id)
    {
        $DeleteUser = DB::DELETE("DELETE FROM `userlogin` WHERE id = $id");
        if ($DeleteUser) {
            Alert::success('Success', 'Account DELETED Successfuly!');
            return redirect('studentlist');
        }
    }
}

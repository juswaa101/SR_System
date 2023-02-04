<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function landingpage()
    {
        $lrn = session('email');
        $myid = session('userid');
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
        $taken_survey = "";
        $taken_exam = "";
        $taken_forum = "";
        $userlogin = DB::SELECT("SELECT * FROM `userlogin` where id = $myid ");
        $forums = DB::SELECT("SELECT * FROM `forum` ORDER BY id DESC");
        $take_survey = DB::SELECT("SELECT * FROM `take_survey`");

        foreach ($userlogin as $item) {
            $taken_forum = $item->take_forum;
            $taken_exam = $item->take_exam;
            $taken_survey = $item->take_survey;
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
        }

        if (($stem > $abm) && ($stem > $humss) && ($stem > $cookery)) {
            $recomended = "STEM";
        } else if (($abm > $stem) && ($abm > $humss) && ($abm > $cookery)) {
            $recomended = "ABM";
        } else if (($humss > $stem) && ($humss > $abm) && ($humss > $cookery)) {
            $recomended = "HUMMS";
        } else if (($cookery > $stem) && ($cookery > $abm) && ($cookery > $humss)) {
            $recomended = "COOKERY";
        } else {
            $recomended = "TAKE THE EXAM FIRST";
        }

        return view("userpage.landingpage", [
            'lname' => $lname,
            'mname' => $mname,
            'take_survey' => $take_survey,
            'taken_forum' => $taken_forum,
            'forums' => $forums,
            'taken_exam' => $taken_exam,
            'taken_survey' => $taken_survey,
            'id' => $myid,
            'stem' => $stem,
            'abm' => $abm,
            'humss' => $humss,
            'cookery' => $cookery,
            'lrn' => $lrn,
            'fullname' => $fullname,
            'math' => $math,
            'science' => $science,
            'section' => $section,
            'recomended' => $recomended
        ]);
    }
    public function guidelines()
    {
        $lrn = session('email');
        $myid = session('userid');
        $stem = 0;
        $abm = 0;
        $humss = 0;
        $cookery = 0;
        $lrn = "";
        $fullname = "";
        $math = "";
        $science = "";
        $recomended = "";
        $section = "";
        $userlogin = DB::SELECT("SELECT * FROM `userlogin` where id = $myid ");

        foreach ($userlogin as $item) {
            $stem += $item->stem;
            $abm += $item->abm;
            $humss += $item->humss;
            $cookery += $item->cookery;
            $lrn = $item->lrn;
            $fullname = $item->fname;
            $math = $item->math;
            $science = $item->science;
            $section = $item->section;
        }

        if (($stem > $abm) && ($stem > $humss) && ($stem > $cookery)) {
            $recomended = "STEM";
        } else if (($abm > $stem) && ($abm > $humss) && ($abm > $cookery)) {
            $recomended = "ABM";
        } else if (($humss > $stem) && ($humss > $abm) && ($humss > $cookery)) {
            $recomended = "HUMMS";
        } else if (($cookery > $stem) && ($cookery > $abm) && ($cookery > $humss)) {
            $recomended = "COOKERY";
        } else {
            $recomended = "TAKE THE EXAM FIRST";
        }


        return view("userpage.guidelines", [
            'id' => $myid,
            'stem' => $stem,
            'abm' => $abm,
            'humss' => $humss,
            'cookery' => $cookery,
            'lrn' => $lrn,
            'fullname' => $fullname,
            'math' => $math,
            'science' => $science,
            'recomended' => $recomended,
            'section' => $section
        ]);
    }
}

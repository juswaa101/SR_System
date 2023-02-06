<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Users;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {   
        return view('reports.reports');
    }

    public function student_base()
    {

        if (session()->get('usertype') == 'teacher') {
            $users = Users::where('usertype', '=', 'student')->where('section', session()->get('section'))->get();
        } else {
            $users = Users::where('usertype', '=', 'student')->get();
        }

        $StudentData = [];

        foreach ($users as $user) {
            $recommended_strand = $this->determineHighScore($user->abm, $user->stem, $user->humss, $user->cookery);
            $StudentData[] = [
                $lrn = $user->lrn,
                $firstname = $user->fname,
                $middlename = $user->mname,
                $lastname = $user->lname,
                $section = $user->section,
                $abm = $user->abm,
                $humms = $user->humss,
                $cookery = $user->cookery,
                $stem = $user->stem,
                $recommended_strand = $recommended_strand
            ];

            // dd($StudentData);
        }

        $pdf = Pdf::loadView('reports.student_qualified', compact('StudentData'))->setPaper('a4', 'landscape');
        return $pdf->download('student_base.pdf');
    }

    public function determineHighScore($abm, $stem, $humss, $cookery)
    {
        $highestScore = max($abm, $stem, $humss, $cookery);

        if ($highestScore == $abm) {
            return "ABM";
        } else if ($highestScore == $stem) {
            return "STEM";
        } else if ($highestScore == $humss) {
            return "HUMSS";
        } else if ($highestScore == $cookery) {
            return "COOKERY";
        }

        return "Unknown Field";
    }

    public function student_qualified()
    {
        if (session()->get('usertype') == 'teacher') {
            $users = Users::where('usertype', '=', 'student')->where('section', session()->get('section'))->get();
        } else {
            $users = Users::where('usertype', '=', 'student')->get();
        }

        $StudentData = [];

        foreach ($users as $user) {
            $recommended_strand = $this->determineHighScore($user->abm, $user->stem, $user->humss, $user->cookery);
            $StudentData[] = [
                $lrn = $user->lrn,
                $firstname = $user->fname,
                $middlename = $user->mname,
                $lastname = $user->lname,
                $section = $user->section,
                $abm = $user->abm,
                $humms = $user->humss,
                $cookery = $user->cookery,
                $stem = $user->stem,
                $recommended_strand = $recommended_strand
            ];

            // dd($StudentData);
        }
        $pdf = PDF::loadView('reports.student_qualified', compact('StudentData'))->setPaper('a4', 'portrait');
        return $pdf->download('student_qualified.pdf');
    }

    public function student_assesment()
    {
        if (session()->get('usertype') == 'teacher') {
            $student_assessment = Users::where('take_exam', '>', '0')->where('section', session()->get('section'))->get();
        } else {
            $student_assessment = Users::where('take_exam', '>', '0')->get();
        }

        // dd($student_assessment)
        $pdf = PDF::loadView('reports.student_assesment', compact('student_assessment'));
        return $pdf->download('student_assessment.pdf');
    }

    public function student_accounts()
    {

        if (session()->get('usertype') == 'teacher') {
            $students = Users::where('usertype', '=', 'student')->where('section', session()->get('section'))->get();
        } else {
            $students = Users::where('usertype', '=', 'student')->get();
        }
        $pdf = PDF::loadView('reports.student_accounts', compact('students'));
        return $pdf->download('student_accounts.pdf');
    }
}

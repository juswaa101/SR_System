<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Users;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        return view('teacher.reports');
    }

    public function student_base()
    {

        $users = Users::where('usertype', '=', 'student')->get();

        $StudentData = [];

        foreach ($users as $user) {
            $recommended_strand = $this->determineHighScore($user->abm, $user->stem, $user->humss, $user->cookery);
            $StudentData[] = [
                $firstname = $user->fname,
                $lastname = $user->lname,
                $middlename = $user->mname,
                $lrn = $user->lrn,
                $recommended_strand = $recommended_strand
            ];

            // dd($StudentData);
        }

        $pdf = Pdf::loadView('teacher.reports.student_qualified', compact('StudentData'));
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
        $pdf = PDF::loadView('teacher.reports.student_qualified');
        return $pdf->download('student_qualified.pdf');
    }

    public function student_assesment()
    {
        $student_assessment = Users::where('take_exam', '>', '0')->get();
        // dd($student_assessment)
        $pdf = PDF::loadView('teacher.reports.student_assesment', compact('student_assessment'));
        return $pdf->download('student_assessment.pdf');
    }

    public function student_accounts()
    {
        $students = Users::where('usertype', '=', 'student')->get();
        $pdf = PDF::loadView('teacher.reports.student_accounts', compact('students'));
        return $pdf->download('student_accounts.pdf');
    }
}

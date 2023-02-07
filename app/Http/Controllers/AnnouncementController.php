<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    public function announcement()
    {
        $announcements = Announcement::where('account_id', '=', session()->get('userid'))->get();
        $pendingComments = Comments::join('userlogin', 'comments.account_id', '=', 'userlogin.id')
            ->orderBy('comments.created_at', 'desc')
            ->where('comments.status', 0)->get();
        $approvedComments = Comments::join('userlogin', 'comments.account_id', '=', 'userlogin.id')
            ->orderBy('comments.created_at', 'desc')->where('status', 1)->get();
        $declinedComments = Comments::join('userlogin', 'comments.account_id', '=', 'userlogin.id')
            ->orderBy('comments.created_at', 'desc')->where('status', 2)->get();

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
        return view('councelor.guidelines_announcements', [
            'announcements' => $announcements,
            'pendingComments' => $pendingComments,
            'approvedComments' => $approvedComments,
            'declinedComments' => $declinedComments,
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

    public function user_page_announcement()
    {
        $announcements = Announcement::join('userlogin', 'announcements.account_id', '=', 'userlogin.id')
            ->orderBy('announcements.created_at', 'asc')->get();
        $approvedComments = Comments::join('userlogin', 'comments.account_id', '=', 'userlogin.id')
            ->orderBy('comments.created_at', 'asc')->where('status', 1)->get();

        return view('userpage.announcement', [
            'announcements' => $announcements,
            'approvedComments' => $approvedComments

        ]);
        // return view('userpage.announcement');
    }

    public function createAnnouncement(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'announcement' => 'required|max:255'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        } else {
            $announcement = new Announcement;
            $announcement->account_id = session()->get('userid');
            $announcement->posts = $request->announcement;
            $announcement->save();

            return redirect()->back()->with('success', 'Announcement created successfully!');
        }
    }

    public function editAnnouncement($id)
    {
        $announcement = Announcement::firstWhere('ann_id', $id);
        return response()->json($announcement);
    }

    public function updateAnnouncement(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'announcement' => 'required|max:255'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        } else {
            $announcement = DB::table('announcements')->where('ann_id', $request->announcement_id);
            $announcement->update(['posts' => $request->announcement]);
            return redirect()->back()->with('success', 'Announcement updated successfully!');
        }
    }

    public function deleteAnnouncement(Request $request)
    {
        $announcement = DB::table('announcements')->where('ann_id', $request->announcement_id)->delete();
        return redirect()->back()->with('success', 'Announcement deleted successfully!');
    }

    public function approveComment(Request $request)
    {
        $comment = DB::table('comments')->where('com_id', $request->comment_id);
        $comment->update([
            'status' => 1
        ]);
        return redirect()->back()->with('success', 'Comment approved!');
    }

    public function declineComment(Request $request)
    {
        $comment = DB::table('comments')->where('com_id', $request->comment_id);
        $comment->update([
            'status' => 2
        ]);
        return redirect()->back()->with('success', 'Comment declined!');
    }

    public function addComment(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'comment' => 'required|max:255'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        } else {
            $message = '';
            $status = 0;
            if (session('usertype') == 'teacher') {
                $message = 'Comment is already approved';
                $status = 1;
            }
            if (session('usertype') == 'counselor') {
                $message = 'Comment successfully posted';
                $status = 1;
            }
            if (session('usertype') == 'student') {
                $message = 'Comment Successfully Created, Please wait for approval of counselor';
                $status = 0;
            }

            $comment = new Comments();
            $comment->comments = $request->comment;
            $comment->account_id = session()->get('userid');
            $comment->ann_id = $request->announcement_id;
            $comment->status = $status;
            $comment->save();
            return redirect()->back()->with('success', $message);
        }
    }
}

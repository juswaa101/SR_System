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
        return view('councelor.guidelines_announcements', [
            'announcements' => $announcements,
            'pendingComments' => $pendingComments,
            'approvedComments' => $approvedComments,
            'declinedComments' => $declinedComments
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

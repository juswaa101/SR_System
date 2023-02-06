<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class ForumController extends Controller
{
    public function addforum(Request $request)
    {
        $lrn = session('email');
        $date = date('Y-m-d');
        $time = date('h:i a');
        $mycomment = $request->input('mycomment');

        $insertForum = DB::INSERT("INSERT INTO `forum` (`id`,`lrn`, `date`, `time`, `youcomment`)
         VALUES (NULL, '$lrn', '$date', '$time', '$mycomment')");

        $updateforum = DB::update("UPDATE `userlogin` SET `take_forum` = '1' WHERE `userlogin`.`lrn` = $lrn");

        Alert::success('Success', 'Your Comment is Added Successfully!');
        return redirect('landingpage');
    }
}

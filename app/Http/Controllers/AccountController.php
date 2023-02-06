<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class AccountController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    public function signup()
    {
        return view('login.signup');
    }
    public function register(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'email_guardian' => 'required|email|unique:userlogin,email_guardian',
            'lrn' => 'required|numeric|min:12|unique:userlogin,lrn',
            'password' => 'required|confirmed|min:8'
        ]);

        $lname = $request->input("lname");
        $fname = $request->input("fname");
        $mname = $request->input("mname");
        $guardian_email = $request->email_guardian;
        $lrn = $request->input("lrn");
        $password = $request->input("password");
        $section = $request->input("section");
        $password = md5($password);

        $registring = DB::INSERT("INSERT INTO `userlogin` (`id`, `fname`,`lname`,`mname`, `email_guardian` ,`lrn`, `password`, `usertype`, `section`) VALUES (NULL, '$fname', '$lname','$mname', '$guardian_email', '$lrn', '$password', 'student','$section')");
        if ($registring) {
            Alert::success('Success', 'Account Created Successfuly!');
            return redirect('/');
        }
    }
    public function signin(Request $request)
    {
        $request->validate([
            'lrn' => 'required',
            'password' => 'required'
        ]);
        $lrn = $request->input('lrn');
        $password = $request->input('password');
        $password = md5($password);

        $auth = DB::SELECT("SELECT * FROM `userlogin` WHERE `lrn` = '$lrn' AND `password` = '$password'");
        foreach ($auth as $item) {
            if ($item->usertype == 'student') {
                session()->put('email', $lrn);
                session()->put('fname', $item->fname);
                session()->put('mname', $item->mname);
                session()->put('lname', $item->lname);
                session()->put('userid', $item->id);
                session()->put('usertype', $item->usertype);
                return redirect('/landingpage');
            } else if ($item->usertype == 'teacher') {
                session()->put('email', $lrn);
                session()->put('fname', $item->fname);
                session()->put('mname', $item->mname);
                session()->put('lname', $item->lname);
                session()->put('userid', $item->id);
                session()->put('usertype', $item->usertype);
                session()->put('section', $item->section);
                return redirect('/teacherhomepage');
            } else if ($item->usertype == 'counselor') {
                session()->put('email', $lrn);
                session()->put('fname', $item->fname);
                session()->put('mname', $item->mname);
                session()->put('lname', $item->lname);
                session()->put('userid', $item->id);
                session()->put('usertype', $item->usertype);
                return redirect('/coucelorhomepage');
            } else {
                return ("ok");
            }
        }
        return redirect("/")->with('failed', 'Check Username And Password');
    }
    public function logout()
    {
        if (session()->has('email')) {
            session()->pull('email');
            session()->pull('section');
            session()->pull('usertype');
        }
        if (session()->has('userid')) {
            session()->pull('userid');
            session()->pull('section');
            session()->pull('usertype');
        }
        Alert::success('Success', 'Logged out');
        return redirect("/");
    }
}

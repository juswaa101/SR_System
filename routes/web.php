<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CouncelorController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ReportsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Account
Route::get('/', [AccountController::class, 'index']);
Route::get('/signup', [AccountController::class, 'signup']);
Route::post('/register', [AccountController::class, 'register']);
Route::post('/signin', [AccountController::class, 'signin']);

//userpage
Route::get('/landingpage', [UserController::class, 'landingpage']);
Route::get('/surveytaken', [SurveyController::class, 'surveytaken']);

//user exam
Route::get('/exam', [ExamController::class, 'exam']);
Route::get('/examtaken', [ExamController::class, 'examtaken']);
Route::post('/pass_exam', [ExamController::class, 'pass_exam']);

//user take survey
Route::post('/takesurvey', [SurveyController::class, 'takesurvey']);

//user guidelines
Route::get('/guidelines', [UserController::class, 'guidelines']);

//user Forum
Route::post('/addforum', [ForumController::class, 'addforum']);



//councelor
Route::get('/viewsurvey/{lrn}', [CouncelorController::class, 'viewsurvey']);
Route::get('/surveylist', [CouncelorController::class, 'surveylist']);
Route::get('/deletesurvey/{id}', [CouncelorController::class, 'deletesurvey']);
Route::get('/editsurvey/{id}/{survey}', [CouncelorController::class, 'editsurvey']);
Route::post('/addsurvey', [CouncelorController::class, 'addsurvey']);
Route::post('/savechanges', [CouncelorController::class, 'savechanges']);

// teacher part
Route::get('/teacherhomepage', [TeacherController::class, 'teacherhomepage']);
Route::get('/delexam/{id}', [TeacherController::class, 'delexam']);
Route::get('/deluser/{id}', [TeacherController::class, 'deluser']);
Route::get('/edit/{id}', [TeacherController::class, 'edit']);
Route::get('/edituser/{id}', [TeacherController::class, 'edituser']);
Route::get('studentlist', [TeacherController::class, 'studentlist']);
Route::post('/addexam', [TeacherController::class, 'addexam']);
Route::post('/saveedit', [TeacherController::class, 'saveedit']);
Route::post('/addstudents', [TeacherController::class, 'addstudents']);
Route::post('/usersaveedit', [TeacherController::class, 'usersaveedit']);

Route::get('/reports', [ReportsController::class, 'index']);
Route::get('/reports/student_base', [ReportsController::class, 'student_base']);
Route::get('/reports/student_qualified', [ReportsController::class, 'student_base']);
Route::get('/reports/student_assesment', [ReportsController::class, 'student_assesment']);
Route::get('/reports/student_accounts', [ReportsController::class, 'student_accounts']);

//concelor page
Route::get('/coucelorhomepage', [CouncelorController::class, 'coucelorhomepage']);

//logout
Route::get('/logout', [AccountController::class, 'logout']);

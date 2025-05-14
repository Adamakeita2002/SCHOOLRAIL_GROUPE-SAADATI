<?php

/*
|--------------------------------------------------------------------------
| Web Routes   sciuniversity12345@gmail.com / sciu12345
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\InsertController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
/* START ACCOUNT */
Route::get('/', 'HomesController@index');
Route::get('/logins', 'HomesController@logins');
Route::get('/account', 'HomesController@account');
Route::get('/account/profile', 'HomesController@profile');
Route::get('/account/edit/profile', 'HomesController@editProfile');
Route::get('/account/note', 'HomesController@note');
Route::get('/account/test', 'HomesController@test');

Route::get('/getuser', 'HomesController@show');
Route::get('/gethint', 'HomesController@showhint');

Route::get('/account/schoolNews', 'HomesController@schoolNews');
Route::get('/account/schoolBde', 'HomesController@schoolBde');
Route::get('/account/adTeam', 'HomesController@adTeam');
Route::get('/account/standard', 'HomesController@standard');
Route::get('/account/materiel', 'HomesController@materiel');
Route::get('/account/forum', 'HomesController@forum');
Route::get('/account/specForum', 'HomesController@specForum');
Route::get('/account/setForum', 'HomesController@setForum');
Route::get('/account/test', 'HomesController@test');


/* START STUDENT */

Route::get('/insertstudents', [InsertController::class, 'insertform']);
Route::post('/insertstudents', [InsertController::class, 'store'])->name('store');

Route::get('/insertteacher', [InsertController::class, 'teacherinsterform']);
Route::post('/insertteacher', [InsertController::class, 'teacherstore'])->name('teacherstore');

Route::get("/insertmanager", [InsertController::class, 'managerinsterform']);
Route::post("/insertmanager", [InsertController::class, 'managerstore'])->name('managerstore');

Route::get("/inserttuteur", [InsertController::class, 'tuteurinsterform']);
Route::post("/inserttuteur", [InsertController::class, 'tuteurstore'])->name('tuteurstore');





Route::prefix('student')->group(function () {
    Route::get('/login', 'Auth\StudentLoginsController@showLoginForm')->name('student.login');
    Route::post('/login', 'Auth\StudentLoginsController@login')->name('student.login.submit');
    Route::get('/logout', 'Auth\StudentLoginsController@logout')->name('student.logout');
    Route::get('/', 'StudentController@index')->name('student.dashboard');

    Route::get('/tactileo', 'StudentController@tactileo');

    Route::get('/profile', 'StudentController@profile');
    Route::post('/editStudent', 'StudentController@editStudent');
    Route::get('/EditProfile', 'StudentController@EditProfile');

    Route::get('/homework', 'StudentController@homework');
    Route::post('/CreateAhomework', 'StudentController@CreateAhomework');
    Route::post('/DeleteHomework', 'StudentController@DeleteHomework');

    Route::get('/mark', 'StudentController@mark');

    Route::get('/standard', 'StudentController@standard');
    Route::get('/materiel', 'StudentController@materiel');

    Route::get('/forum', 'StudentController@forum');
    Route::post('/CreateForum', 'StudentController@CreateForum');
    Route::post('/CreateCommentfrm', 'StudentController@CreateCommentfrm');
    Route::get('/specForum/{ftheme}', 'StudentController@specForum');
    Route::get('/setForum', 'StudentController@setForum');
    Route::post('/BestComment', 'StudentController@BestComment');
    Route::post('/UnBestComment', 'StudentController@UnBestComment');

    Route::get('/quiz', 'StudentController@quiz');
    Route::post('/CreateQuiz', 'StudentController@CreateQuiz');
    Route::post('/CreateQcomment', 'StudentController@CreateQcomment');
    Route::get('/specQuiz/{subject}', 'StudentController@specQuiz');
    Route::get('/setQuiz', 'StudentController@setQuiz');


    Route::get('/schoolNews', 'StudentController@schoolNews');
    Route::get('/schoolBde', 'StudentController@schoolBde');
    Route::post('/CreateBDE', 'StudentController@CreateBDE');

    Route::get('/calendar', 'StudentController@calendar');

    Route::get('/adTeam', 'StudentController@adTeam');

    Route::get('/findTimetable', 'StudentController@findTimetable');

    Route::get('/notification', 'StudentController@notification');
    Route::get('/specnotif', 'StudentController@specnotif');

    Route::get('/message', 'StudentController@message');
    Route::get('/quest', 'StudentController@quest');
    Route::post('/CreateQuest', 'StudentController@CreateQuest');




    // Password reset routes
    Route::post('/password/email', 'Auth\StudentForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
    Route::get('/password/reset', 'Auth\StudentForgotPasswordController@showLinkRequestForm')->name('student.password.request');
    Route::post('/password/reset', 'Auth\StudentResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\StudentResetPasswordController@showResetForm')->name('student.password.reset');
});
/* END student */



Route::get('/teamator/login', 'Auth\TeacherLoginsController@showLoginForm')->name('teamator.login');
/* START teacher */

Route::prefix('teacher')->group(function () {
    Route::get('/teamator/login', 'Auth\TeacherLoginsController@showLoginForm')->name('teacher.login');

    Route::post('/login', 'Auth\TeacherLoginsController@login')->name('teacher.login.submit');
    Route::get('/logout', 'Auth\TeacherLoginsController@logout')->name('teacher.logout');
    Route::get('/', 'TeacherController@index')->name('teacher.dashboard');

    Route::get('/profile', 'TeacherController@profile');
    Route::post('/EditProfile', 'TeacherController@EditProfile');

    Route::get('/classroom', 'TeacherController@classroom');

    Route::get('/ressource', 'TeacherController@ressource');
    Route::post('/CreateRessourceDocument', 'TeacherController@CreateRessourceDocument');

    Route::get('/Sressource', 'TeacherController@Sressource');
    Route::get('/SressourceStudent', 'TeacherController@SressourceStudent');
    Route::post('/CreateRessourceDocumentStudent', 'TeacherController@CreateRessourceDocumentStudent');

    Route::post('/CreateRessourceLien', 'TeacherController@CreateRessourceLien');
    Route::post('/DeleteRessource', 'TeacherController@DeleteRessource');

    Route::get('/cahier', 'TeacherController@cahier');
    Route::post('/CreateCahier', 'TeacherController@CreateCahier');
    Route::post('/DeleteCahier', 'TeacherController@DeleteCahier');

    Route::get('/AbsenceStudentClas', 'TeacherController@AbsenceStudentClas');
    Route::get('/VoirAbsenceStudentClas', 'TeacherController@VoirAbsenceStudentClas');
    Route::get('/absence', 'TeacherController@absence');
    Route::post('/CreateAbsenceStudent', 'TeacherController@CreateAbsenceStudent');
    Route::post('/DeleteAbsence', 'TeacherController@DeleteAbsence');
    Route::get('/ListeStudent', 'TeacherController@ListeStudent');
    Route::get('/ListeStudentInfo', 'TeacherController@ListeStudentInfo');

    Route::get('/mark', 'TeacherController@mark');
    Route::post('/CreateMark', 'TeacherController@CreateMark');
    Route::post('/CreateAbsMark', 'TeacherController@CreateAbsMark');
    Route::post('/EditMark', 'TeacherController@EditMark');
    Route::post('/DeleteMark', 'TeacherController@DeleteMark');

    Route::post('/CreateSubjectAvg', 'TeacherController@CreateSubjectAvg');


    Route::post('/CreateTest', 'TeacherController@CreateTest');
    Route::post('/DeleteTest', 'TeacherController@DeleteTest');

    Route::get('/homework', 'TeacherController@homework');
    Route::post('/CreateHomework', 'TeacherController@CreateHomework');
    Route::post('/DeleteHomework', 'TeacherController@DeleteHomework');

    Route::get('/Ahomework', 'TeacherController@Ahomework');

    Route::get('/quiz', 'TeacherController@quiz');
    Route::post('/CreateQuiz', 'TeacherController@CreateQuiz');
    Route::post('/CreateQcomment', 'TeacherController@CreateQcomment');
    Route::get('/specQuiz/{subject}', 'TeacherController@specQuiz');

    Route::get('/calendar', 'TeacherController@calendar');
    Route::post('/CreateCalendar', 'TeacherController@CreateCalendar');
    Route::post('/DeleteCalendar', 'TeacherController@DeleteCalendar');

    Route::get('/findTimetable', 'TeacherController@findTimetable');
    //HINT TIMETABLE
    Route::get('/getTimetable', 'TeacherController@getTimetable');
    //END HINT TIMETABLE

    Route::get('/message', 'TeacherController@message');


    Route::get('/fix_test_date', 'TeacherController@fix_test_date');
    Route::get('/schoolNews', 'TeacherController@schoolNews');
    Route::get('/schoolBde', 'TeacherController@schoolBde');
    Route::get('/adTeam', 'TeacherController@adTeam');

    Route::get('/notification', 'TeacherController@notification');
    Route::get('/specnotif', 'TeacherController@specnotif');



    // TEACHER Password reset routes
    Route::post('/password/email', 'Auth\TeacherForgotPasswordController@sendResetLinkEmail')->name('teacher.password.email');
    Route::get('/password/reset', 'Auth\TeacherForgotPasswordController@showLinkRequestForm')->name('teacher.password.request');
    Route::post('/password/reset', 'Auth\TeacherResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\TeacherResetPasswordController@showResetForm')->name('teacher.password.reset');
});
/* END teacher */



/* START tutor */

Route::prefix('tutor')->group(function () {

    Route::get('/teamator/login', 'Auth\TutorLoginsController@showLoginForm')->name('tutor.login');
    Route::post('/login', 'Auth\TutorLoginsController@login')->name('tutor.login.submit');
    Route::get('/logout', 'Auth\TutorLoginsController@logout')->name('tutor.logout');
    Route::get('/', 'TutorController@index')->name('tutor.dashboard');


    Route::get('/schoolNews', 'TutorController@schoolNews');
    Route::get('/schoolBde', 'TutorController@schoolBde');
    Route::get('/adTeam', 'TutorController@adTeam');
    Route::get('/child/{student}', 'TutorController@child');
    Route::get('/child/mark/{student}', 'TutorController@mark');
    Route::get('/child/timetable/{student}', 'TutorController@timetable');


    // Password reset routes
    Route::post('/password/email', 'Auth\TutorForgotPasswordController@sendResetLinkEmail')->name('tutor.password.email');
    Route::get('/password/reset', 'Auth\TutorForgotPasswordController@showLinkRequestForm')->name('tutor.password.request');
    Route::post('/password/reset', 'Auth\TutorResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\TutorResetPasswordController@showResetForm')->name('tutor.password.reset');
});

/* END tutor */

/* START manager */

Route::prefix('manager')->group(function () {

    Route::get('/teamator/login', 'Auth\ManagerLoginsController@showLoginForm')->name('manager.login');

    Route::post('/login', 'Auth\ManagerLoginsController@login')->name('manager.login.submit');
    Route::get('/logout', 'Auth\ManagerLoginsController@logout')->name('manager.logout');
    Route::get('/', 'ManagerController@index')->name('manager.dashboard');

    Route::get('/profile', 'ManagerController@profile');
    Route::get('/modiFprofile', 'ManagerController@modiFprofile');
    Route::post('/EditProfile', 'ManagerController@EditProfile');

    Route::get('/program', 'ManagerController@program');
    Route::post('/CreateProgram', 'ManagerController@CreateProgram');
    Route::get('/editProgram', 'ManagerController@editProgram');
    Route::post('/modifyProgram', 'ManagerController@modifyProgram');
    Route::post('/deleteProgram', 'ManagerController@deleteProgram');

    Route::get('/classroom', 'ManagerController@classroom');
    Route::post('/CreateClassroom', 'ManagerController@CreateClassroom');
    Route::get('/classroom/timetable', 'ManagerController@timetable');
    Route::post('/CreateTimetable', 'ManagerController@CreateTimetable');
    Route::get('/findClassroom', 'ManagerController@findClassroom');
    Route::get('/editClassroom', 'ManagerController@editClassroom');
    Route::post('/modifyClassroom', 'ManagerController@modifyClassroom');
    Route::post('/deleteClassroom', 'ManagerController@deleteClassroom');
    Route::post('/modifyClassroom1', 'ManagerController@modifyClassroom1');
    Route::post('/deleteClassroom1', 'ManagerController@deleteClassroom1');
    //HINT CLASSROOM
    Route::get('/getClassroom2', 'ManagerController@getClassroom2');
    //END HINT CLASSROOM


    Route::get('/findMark', 'ManagerController@findMark');
    //HINT CLASSROOM
    Route::get('/getClassroom7', 'ManagerController@getClassroom7');
    //END HINT CLASSROOM

    Route::get('/teacher', 'ManagerController@teacher');
    Route::post('/CreateTeacher', 'ManagerController@CreateTeacher');
    Route::get('/findTeacher', 'ManagerController@findTeacher');
    Route::get('/editTeacher', 'ManagerController@editTeacher');
    Route::post('/modifyTeacher', 'ManagerController@modifyTeacher');
    Route::post('/deleteTeacher', 'ManagerController@deleteTeacher');
    Route::post('/modifyTeacher1', 'ManagerController@modifyTeacher1');
    Route::post('/deleteTeacher1', 'ManagerController@deleteTeacher1');

    Route::get('/teacher/many', 'ManagerController@teacherMany');
    Route::post('/CreateManyTeacher', 'ImportExcelController@CreateManyTeacher');

    //HINT TEACHER
    Route::get('/getTeacher1', 'ManagerController@getTeacher1');
    Route::get('/getTeacher2', 'ManagerController@getTeacher2');
    Route::get('/getTeacher3', 'ManagerController@getTeacher3');
    //END HINT TEACHER

    Route::get('/subject', 'ManagerController@subject');
    Route::get('/affectSubject', 'ManagerController@affectSubject');
    Route::get('/findSubject', 'ManagerController@findSubject');
    Route::post('/affectationSubject', 'ManagerController@affectationSubject');
    Route::post('/CreateSubject', 'ManagerController@CreateSubject');
    Route::get('/editSubject', 'ManagerController@editSubject');
    Route::post('/modifySubject', 'ManagerController@modifySubject');
    Route::post('/modifySubject1', 'ManagerController@modifySubject1');
    Route::post('/deleteSubject', 'ManagerController@deleteSubject');
    Route::post('/deleteSubject1', 'ManagerController@deleteSubject1');

    Route::get('/subject/many', 'ManagerController@subjectMany');
    Route::post('/CreateManySubject', 'ImportExcelController@CreateManySubject');

    //HINT SUBJECT
    Route::get('/getSubject1', 'ManagerController@getSubject1');
    Route::get('/getSubject2', 'ManagerController@getSubject2');
    Route::get('/getSubject3', 'ManagerController@getSubject3');
    //END HINT SUBJECT


    Route::get('/student', 'ManagerController@student');

    Route::get('/student/many', 'ManagerController@studentMany');
    Route::post('/CreateManyStudent', 'ImportExcelController@CreateManyStudent');



    Route::get('/findStudent', 'ManagerController@findStudent');
    Route::get('/affectStudent', 'ManagerController@affectStudent');
    Route::post('/affectationStudent', 'ManagerController@affectationStudent');
    Route::post('/CreateStudent', 'ManagerController@CreateStudent');
    Route::get('/editStudent', 'ManagerController@editStudent');
    Route::post('/modifyStudent', 'ManagerController@modifyStudent');
    Route::post('/deleteStudent', 'ManagerController@deleteStudent');
    //HINT STUDENT
    Route::get('/getStudent1', 'ManagerController@getStudent1');
    Route::get('/getStudent2', 'ManagerController@getStudent2');
    Route::get('/getStudent3', 'ManagerController@getStudent3');
    //END HINT STUDENT


    Route::get('/tutor', 'ManagerController@tutor');
    Route::get('/findTutor', 'ManagerController@findTutor');
    Route::get('/affectTutor', 'ManagerController@affectTutor');
    Route::post('/affectationTutor1', 'ManagerController@affectationTutor1');
    Route::post('/affectationTutor', 'ManagerController@affectationTutor');
    Route::post('/CreateTutor', 'ManagerController@CreateTutor');
    Route::get('/editTutor', 'ManagerController@editTutor');
    Route::post('/modifyTutor', 'ManagerController@modifyTutor');
    Route::post('/modifyTutor1', 'ManagerController@modifyTutor1');
    Route::post('/deleteTutor', 'ManagerController@deleteTutor');
    //HINT TUTOR
    Route::get('/getTutor1', 'ManagerController@getTutor1');
    Route::get('/getTutor2', 'ManagerController@getTutor2');
    Route::get('/getTutor3', 'ManagerController@getTutor3');
    //END HINT TUTOR


    Route::get('/schoolNews', 'ManagerController@schoolNews');
    Route::post('/CreateSchoolNews', 'ManagerController@CreateSchoolNews');
    Route::get('/schoolBde', 'ManagerController@schoolBde');
    Route::get('/adTeam', 'ManagerController@adTeam');

    Route::get('/ressource', 'ManagerController@ressource');
    Route::get('/Rstandard', 'ManagerController@Rstandard');
    Route::get('/Rteacher', 'ManagerController@Rteacher');
    Route::post('/CreateRessourceDocument', 'ManagerController@CreateRessourceDocument');
    Route::post('/CreateRessourceLien', 'ManagerController@CreateRessourceLien');
    Route::post('/DeleteRessource', 'ManagerController@DeleteRessource');

    Route::get('/findRessource', 'ManagerController@findRessource');
    //HINT RESSOURCE
    Route::get('/getRessource1', 'ManagerController@getRessource1');
    Route::get('/getRessource2', 'ManagerController@getRessource2');
    Route::get('/getRessource3', 'ManagerController@getRessource3');
    //END HINT RESSOURCE

    Route::get('/findTimetable', 'ManagerController@findTimetable');
    //HINT TIMETABLE
    Route::get('/getTimetable', 'ManagerController@getTimetable');
    //END HINT TIMETABLE

    Route::get('/findCalendar', 'ManagerController@findCalendar');
    //HINT TIMETABLE
    Route::get('/getCalendar', 'ManagerController@getCalendar');
    //END HINT TIMETABLE

    //MESSAGE
    Route::get('/message', 'ManagerController@message');

    Route::get('/message/student', 'ManagerController@msgStudent');
    Route::get('/message/teacher', 'ManagerController@msgTeacher');
    Route::get('/message/parent', 'ManagerController@msgParent');

    Route::post('/CreateSmsg', 'ManagerController@CreateSmsg');
    Route::post('/CreateTmsg', 'ManagerController@CreateTmsg');
    Route::post('/CreatePmsg', 'ManagerController@CreatePmsg');
    //END MESSAGE

    //COMPTABILITE
    Route::get('/versement', 'ManagerController@versement');
    Route::post('/versement/modifyVersement', 'ManagerController@modifyVersement');
    Route::post('/versement/deleteVersement', 'ManagerController@deleteVersement');
    Route::get('/versement/conVerse', 'ManagerController@conVerse');


    Route::get('/versement/many', 'ManagerController@versementMany');
    Route::post('/CreateManyVersement', 'ImportExcelController@CreateManyVersement');

    Route::get('/versement/scolarite', 'ManagerController@scolarite');
    //HINT SCO
    Route::get('/getSco1', 'ManagerController@getSco1');
    Route::get('/getSco2', 'ManagerController@getSco2');

    //END HINT SCO


    Route::get('/versement/cantine', 'ManagerController@cantine');
    //HINT CAN
    Route::get('/getCan1', 'ManagerController@getCan1');
    Route::get('/getCan2', 'ManagerController@getCan2');
    //END HINT CAN


    Route::get('/versement/bus', 'ManagerController@bus');
    //HINT BUS
    Route::get('/getBus1', 'ManagerController@getBus1');
    Route::get('/getBus2', 'ManagerController@getBus2');
    //END HINT BUS


    Route::get('/versement/findExtra', 'ManagerController@findExtra');
    //HINT BUS
    Route::get('/getExtra1', 'ManagerController@getExtra1');
    Route::get('/getExtra2', 'ManagerController@getExtra2');
    //END HINT BUS

    Route::get('/recette', 'ManagerController@recette');

    Route::get('/depense', 'ManagerController@depense');
    Route::post('/CreateDepense', 'ManagerController@CreateDepense');


    Route::post('/CreateScolarite', 'ManagerController@CreateScolarite');
    Route::post('/CreateScolaritePrint', 'ManagerController@CreateScolaritePrint');

    Route::post('/CreateCantine', 'ManagerController@CreateCantine');
    Route::post('/CreateCantinePrint', 'ManagerController@CreateCantinePrint');

    Route::post('/CreateBus', 'ManagerController@CreateBus');
    Route::post('/CreateBusPrint', 'ManagerController@CreateBusPrint');

    Route::post('/CreateTenuClasse', 'ManagerController@CreateTenuClasse');
    Route::post('/CreateTenuClassePrint', 'ManagerController@CreateTenuClassePrint');

    Route::post('/CreateTenuSport', 'ManagerController@CreateTenuSport');
    Route::post('/CreateTenuSportPrint', 'ManagerController@CreateTenuSportPrint');

    Route::post('/CreateBasket', 'ManagerController@CreateBasket');
    Route::post('/CreateBasketPrint', 'ManagerController@CreateBasketPrint');

    Route::post('/CreateNatation', 'ManagerController@CreateNatation');
    Route::post('/CreateNatationPrint', 'ManagerController@CreateNatationPrint');

    Route::post('/CreateTaekwondo', 'ManagerController@CreateTaekwondo');
    Route::post('/CreateTaekwondoPrint', 'ManagerController@CreateTaekwondoPrint');

    Route::post('/CreateFourniture', 'ManagerController@CreateFourniture');
    Route::post('/CreateFourniturePrint', 'ManagerController@CreateFourniturePrint');

    Route::post('/CreateDepense', 'ManagerController@CreateDepense');
    Route::post('/CreateDepensePrint', 'ManagerController@CreateDepensePrint');

    Route::get('/operation', 'ManagerController@operation');
    Route::get('/getOperation1', 'ManagerController@getOperation1');




    //END COMPTABILITE



    //SETTINGS
    Route::get('/stop/mark', 'ManagerController@stopMark');
    Route::post('/STOPNOTE', 'ManagerController@stopNote');
    //END SETTINGS

    Route::get('/transcript', 'ManagerController@transcript');
    //HINT TRANSCRIPT
    Route::get('/getClassroom8', 'ManagerController@getClassroom8');
    //END HINT TRANSCRIPT

    Route::get('/archive', 'ManagerController@archive');
    //HINT ARCHIVE
    Route::get('/getBulletin1', 'ManagerController@getBulletin1');
    Route::get('/getBulletin2', 'ManagerController@getBulletin2');
    //END HINT ARCHIVE

    Route::post('/printBulletin1', 'ManagerController@printBulletin1');
    Route::post('/printBulletin2', 'ManagerController@printBulletin2');


    Route::get('/NewRegStudent', 'ManagerController@Newregstudent');
    Route::post('/deleteNewStudent', 'ManagerController@deleteNewStudent');
    Route::post('/CreateNewRegStudent', 'ManagerController@CreateNewregstudent');




    Route::get('/school/year', 'ManagerController@schoolYear');
    //HINT STOPMARK
    Route::get('/getStopMark', 'ManagerController@getStopMark');
    //END STOPMARK

    Route::post('/buildSemesterMoy', 'ManagerController@buildSemesterMoy');

    Route::post('/pdf', 'ManagerController@generateBull');







    //QUEST
    Route::get('/quest', 'ManagerController@quest');
    Route::get('/confirm/quest', 'ManagerController@confirmQ');
    Route::get('/abort/quest', 'ManagerController@abortQ');

    //END QUEST


    // Password reset routesS Route::post('/password/email', 'Auth\ManagerForgotPasswordController@sendResetLinkEmail')->name('teacher.password.email');
    Route::get('/password/reset', 'Auth\ManagerForgotPasswordController@showLinkRequestForm')->name('manager.password.request');
    Route::post('/password/reset', 'Auth\ManagerResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\ManagerResetPasswordController@showResetForm')->name('manager.password.reset');
});

/* END manager */


/* START ADMINISTRATEUR */

Route::prefix('/kuro/admin')->group(function () {

    Route::get('/login', 'Auth\AdminLoginsController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginsController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginsController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/profile', 'AdminController@profile');
    Route::get('/modiFprofile', 'AdminController@modiFprofile');
    Route::post('/EditProfile', 'AdminController@EditProfile');

    Route::get('/manager', 'AdminController@manager');
    Route::post('/CreateManager', 'AdminController@CreateManager');
    Route::get('/affectManager', 'AdminController@affectManager');
    Route::post('/affect/role', 'AdminController@affectRole');
    Route::post('/DeleteManager', 'AdminController@DeleteManager');


    Route::get('/program', 'AdminController@program');
    Route::post('/CreateProgram', 'AdminController@CreateProgram');
    Route::get('/editProgram', 'AdminController@editProgram');
    Route::post('/modifyProgram', 'AdminController@modifyProgram');
    Route::post('/deleteProgram', 'AdminController@deleteProgram');

    Route::get('/classroom', 'AdminController@classroom');
    Route::post('/CreateClassroom', 'AdminController@CreateClassroom');
    Route::get('/findClassroom', 'AdminController@findClassroom');
    Route::get('/editClassroom', 'AdminController@editClassroom');
    Route::post('/modifyClassroom', 'AdminController@modifyClassroom');
    Route::post('/deleteClassroom', 'AdminController@deleteClassroom');
    Route::post('/modifyClassroom1', 'AdminController@modifyClassroom1');
    Route::post('/deleteClassroom1', 'AdminController@deleteClassroom1');
    //HINT CLASSROOM
    Route::get('/getClassroom2', 'AdminController@getClassroom2');
    //END HINT CLASSROOM


    Route::get('/findMark', 'AdminController@findMark');
    //HINT CLASSROOM
    Route::get('/getClassroom7', 'AdminController@getClassroom7');
    //END HINT CLASSROOM

    Route::get('/teacher', 'AdminController@teacher');
    Route::post('/CreateTeacher', 'AdminController@CreateTeacher');
    Route::get('/findTeacher', 'AdminController@findTeacher');
    Route::get('/editTeacher', 'AdminController@editTeacher');
    Route::post('/modifyTeacher', 'AdminController@modifyTeacher');
    Route::post('/deleteTeacher', 'AdminController@deleteTeacher');
    Route::post('/modifyTeacher1', 'AdminController@modifyTeacher1');
    Route::post('/deleteTeacher1', 'AdminController@deleteTeacher1');

    Route::get('/teacher/many', 'AdminController@teacherMany');
    Route::post('/CreateManyTeacher', 'AImportExcelController@CreateManyTeacher');

    //HINT TEACHER
    Route::get('/getTeacher1', 'AdminController@getTeacher1');
    Route::get('/getTeacher2', 'AdminController@getTeacher2');
    Route::get('/getTeacher3', 'AdminController@getTeacher3');
    //END HINT TEACHER

    Route::get('/subject', 'AdminController@subject');
    Route::get('/affectSubject', 'AdminController@affectSubject');
    Route::get('/findSubject', 'AdminController@findSubject');
    Route::post('/affectationSubject', 'AdminController@affectationSubject');
    Route::post('/CreateSubject', 'AdminController@CreateSubject');
    Route::get('/editSubject', 'AdminController@editSubject');
    Route::post('/modifySubject', 'AdminController@modifySubject');
    Route::post('/modifySubject1', 'AdminController@modifySubject1');
    Route::post('/deleteSubject', 'AdminController@deleteSubject');
    Route::post('/deleteSubject1', 'AdminController@deleteSubject1');

    Route::get('/subject/many', 'AdminController@subjectMany');
    Route::post('/CreateManySubject', 'AImportExcelController@CreateManySubject');

    //HINT SUBJECT
    Route::get('/getSubject1', 'AdminController@getSubject1');
    Route::get('/getSubject2', 'AdminController@getSubject2');
    Route::get('/getSubject3', 'AdminController@getSubject3');
    //END HINT SUBJECT


    Route::get('/student', 'AdminController@student');

    Route::get('/student/many', 'AdminController@studentMany');
    Route::post('/CreateManyStudent', 'AImportExcelController@CreateManyStudent');



    Route::get('/findStudent', 'AdminController@findStudent');
    Route::get('/affectStudent', 'AdminController@affectStudent');
    Route::post('/affectationStudent', 'AdminController@affectationStudent');
    Route::post('/CreateStudent', 'AdminController@CreateStudent');
    Route::get('/editStudent', 'AdminController@editStudent');
    Route::post('/modifyStudent', 'AdminController@modifyStudent');
    Route::post('/deleteStudent', 'AdminController@deleteStudent');
    Route::post('/deleteNewStudent', 'AdminController@deleteNewStudent');

    //HINT STUDENT
    Route::get('/getStudent1', 'AdminController@getStudent1');
    Route::get('/getStudent2', 'AdminController@getStudent2');
    Route::get('/getStudent3', 'AdminController@getStudent3');
    //END HINT STUDENT


    Route::get('/tutor', 'AdminController@tutor');
    Route::get('/findTutor', 'AdminController@findTutor');
    Route::get('/affectTutor', 'AdminController@affectTutor');
    Route::post('/affectationTutor1', 'AdminController@affectationTutor1');
    Route::post('/affectationTutor', 'AdminController@affectationTutor');
    Route::post('/CreateTutor', 'AdminController@CreateTutor');
    Route::get('/editTutor', 'AdminController@editTutor');
    Route::post('/modifyTutor', 'AdminController@modifyTutor');
    Route::post('/modifyTutor1', 'AdminController@modifyTutor1');
    Route::post('/deleteTutor', 'AdminController@deleteTutor');
    //HINT TUTOR
    Route::get('/getTutor1', 'AdminController@getTutor1');
    Route::get('/getTutor2', 'AdminController@getTutor2');
    Route::get('/getTutor3', 'AdminController@getTutor3');
    //END HINT TUTOR


    Route::get('/schoolNews', 'AdminController@schoolNews');
    Route::post('/CreateSchoolNews', 'AdminController@CreateSchoolNews');
    Route::get('/schoolBde', 'AdminController@schoolBde');
    Route::get('/adTeam', 'AdminController@adTeam');

    Route::get('/ressource', 'AdminController@ressource');
    Route::get('/Rstandard', 'AdminController@Rstandard');
    Route::get('/Rteacher', 'AdminController@Rteacher');
    Route::post('/CreateRessourceDocument', 'AdminController@CreateRessourceDocument');
    Route::post('/CreateRessourceLien', 'AdminController@CreateRessourceLien');
    Route::post('/DeleteRessource', 'AdminController@DeleteRessource');

    Route::get('/findRessource', 'AdminController@findRessource');
    //HINT RESSOURCE
    Route::get('/getRessource1', 'AdminController@getRessource1');
    Route::get('/getRessource2', 'AdminController@getRessource2');
    Route::get('/getRessource3', 'AdminController@getRessource3');
    //END HINT RESSOURCE

    Route::get('/findTimetable', 'AdminController@findTimetable');
    //HINT TIMETABLE
    Route::get('/getTimetable', 'AdminController@getTimetable');
    //END HINT TIMETABLE

    Route::get('/findCalendar', 'AdminController@findCalendar');
    //HINT TIMETABLE
    Route::get('/getCalendar', 'AdminController@getCalendar');
    //END HINT TIMETABLE

    //MESSAGE
    Route::get('/message', 'AdminController@message');

    Route::get('/message/student', 'AdminController@msgStudent');
    Route::get('/message/teacher', 'AdminController@msgTeacher');
    Route::get('/message/parent', 'AdminController@msgParent');

    Route::post('/CreateSmsg', 'AdminController@CreateSmsg');
    Route::post('/CreateTmsg', 'AdminController@CreateTmsg');
    Route::post('/CreatePmsg', 'AdminController@CreatePmsg');
    //END MESSAGE


    //SETTINGS
    Route::get('/stop/mark', 'AdminController@stopMark');
    Route::post('/STOPNOTE', 'AdminController@stopNote');
    //END SETTINGS

    Route::get('/transcript', 'AdminController@transcript');
    //HINT TRANSCRIPT
    Route::get('/getClassroom8', 'AdminController@getClassroom8');
    //END HINT TRANSCRIPT

    Route::get('/archive', 'AdminController@archive');
    //HINT ARCHIVE
    Route::get('/getBulletin1', 'AdminController@getBulletin1');
    Route::get('/getBulletin2', 'AdminController@getBulletin2');
    //END HINT ARCHIVE

    Route::post('/printBulletin1', 'AdminController@printBulletin1');
    Route::post('/printBulletin2', 'AdminController@printBulletin2');


    Route::get('/school/semester', 'AdminController@schoolSemester');
    Route::post('/CreateSS', 'AdminController@CreateSS');
    Route::get('/school/year', 'AdminController@schoolYear');
    Route::post('/CreateSY', 'AdminController@CreateSY');

    //HINT STOPMARK
    Route::get('/getStopMark', 'AdminController@getStopMark');
    //END STOPMARK

    Route::post('/buildSemesterMoy', 'AdminController@buildSemesterMoy');

    Route::post('/pdf', 'AdminController@generateBull');


    //QUEST
    Route::get('/quest', 'AdminController@quest');
    Route::get('/confirm/quest', 'AdminController@confirmQ');
    Route::get('/abort/quest', 'AdminController@abortQ');

    //END QUEST


    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

/* END ADMINISTRATEUR */









/* TEST PURPOSE */

Route::get('/xit', 'HomesController@xit');

Route::get('/pdf', 'HomesController@downloadPDF');

Route::get('/pdf3', 'HomesController@downloadPDF3');

Route::get('/pdf4', 'HomesController@downloadPDF4');

Route::get('/pdf5', 'HomesController@downloadPDF5');

Route::get('/pdf7', 'HomesController@downloadPDF7');

Route::get('/bull', 'HomesController@bull');

Route::get('/home', 'HomeController@index')->name('home');

<?php

use App\Student;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/insert', function () {
    DB::insert('insert into student(name, date_of_birth, gpa, advisor) value("Diana", "2002-05-23", 3.48, "Marzhan")');
});
Route::get('/insert1', function () {
    DB::insert('insert into student(name, date_of_birth, gpa, advisor) value("Altynay", "2002-09-21", 3.00, "Kurmangazy")');
});
Route::get('/update', function () {
    DB::update('update student set date_of_birth="2001-05-23" where id=1');
});
Route::get('/delete', function () {
    DB::delete('delete from student where id=1');
});
Route::get('/select', function () {
    $results=DB::select('select * from student where id=2');
    foreach ($results as $student) {
    	echo "Name: " .$student->name;
    	echo "<br>";
    	echo "Date of birth: " .$student->date_of_birth;
    	echo "<br>";
    	echo "GPA: " .$student->gpa;
    	echo "<br>";
    	echo "Advisor: " .$student->advisor;
    }
});


Route::get('/insert2', function () {
    $student = new Student;
    $student->name="Yelnaz";
    $student->date_of_birth="2002-02-08";
    $student->gpa=3.56;
    $student->advisor="Ualikhan";
    $student->save();
});

Route::get('/update2', function () {
    $student = Student::find(3);
    $student->name="Aliya";
    $student->date_of_birth="2002-05-23";
    $student->gpa=3.48;
    $student->advisor="Arman";
    $student->save();
});

Route::get('/delete2', function () {
    $student = Student::find(3);
    $student->delete();
});

Route::get('/select2', function () {
    $students = Student::all();
    foreach ($students as $student) {
 		echo "Name: " .$student->name;
    	echo "<br>";
    	echo "Date of birth: " .$student->date_of_birth;
    	echo "<br>";
    	echo "GPA: " .$student->gpa;
    	echo "<br>";
    	echo "Advisor: " .$student->advisor;

   }
});

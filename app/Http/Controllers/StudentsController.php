<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\Classroom;
use App\Course;
use App\Attendance;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::lists('classroom_num');
        $all_courses  = Course::lists('name', 'id');

        return view('students.create', compact('classrooms', 'all_courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $student = Student::create($request->all());

        // I must write a loop to save the courses for this particular student

        foreach ($request->get('courses') as $course)
        {
            for ($i=1; $i <= 18; $i++)
            {
                $attendance = new Attendance;
                $attendance->student_id = $student->id;
                $attendance->course_id  = $course;
                $attendance->week_id    = $i;
                
                $attendance->save();
            }
        }

        // Now go ahead and attach courses to that damn student!, just kidding!
        if (count($request->get('courses')) > 0) {
            $student->courses()->attach($request->get('courses'));
        }

        // return redirect('students')->withSuccess('تمت اضافة الطالب ' . $student->name .' بنجاح');
        return \Redirect::route('students.create')->withSuccess('تمت اضافة الطالب ' . $student->name .' بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        // $courses  = Course::lists('name', 'id');
        $courses = $student->courses()->get()->lists('name', 'id');
        $all_courses = Course::lists('name', 'id');

        return view('students.edit', compact('student', 'courses', 'all_courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        

        $student->update($request->all());

        // I must write a loop to save the courses for this particular student

        // dd($request->get('courses'));
        foreach ($request->get('courses') as $course)
        {
            for ($i=1; $i = 18; $i++)
            {
                $attendance = Attendance::findOrFail($course);
            }
        }

        if (count($request->get('courses')) > 0) {
            $student->courses()->attach($request->get('courses'));
        }

        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect('students');
    }
}

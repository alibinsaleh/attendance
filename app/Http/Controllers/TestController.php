<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\Attendance;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();

        foreach ($students as $student)
        {

            foreach ($student->courses as $course)
            {
                for ($i = 1; $i <= 18; $i++)
                {
                    $attendance = Attendance::where('student_id', '=', $student->id)
                                            ->where('course_id', '=', $course->id)
                                            ->where('week_id', '=', $i)
                                            ->get();
                    if (count($attendance) == 0)
                    {
                        Attendance::create([
                            'student_id' => $student->id,
                            'course_id'  => $course->id,
                            'week_id'    => $i

                        ]);
                    }
                    
                }
                


            }

        }

        return redirect('attendance');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $student = Student::findOrFail($id);

        return view('students.test2', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

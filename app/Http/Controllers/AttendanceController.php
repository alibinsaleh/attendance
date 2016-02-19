<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Course;
use App\Teacher;
use App\Classroom;
use App\Attendance;
use App\Week;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        $weeks = Week::all();

        return view('attendance.index', compact('courses', 'teachers', 'classrooms', 'weeks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $attendances = Attendance::all();
        return view('attendance.create');
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
        $attendances = Attendance::where('course_id', '=', $id)->get();

        return view('attendance.show', compact('attendances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendances = Attendance::where('course_id', '=', $id)
                                    ->where('week_id', '=', 1)
                                    ->get();
        $course_id = $id;
        



        if (count($attendances) < 1)
        {
            return redirect('attendance')->withErrors('لا يوجد طلاب مسجلين في هذه المادة');
        } else 
        {
            return view('attendance.edit', compact('attendances', 'course_id'));
        }

        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showAttendance($id, $week_id)
    {
        $attendances = Attendance::where('course_id', '=', $id)
                                    ->where('week_id', '=', $week_id)
                                    ->get();
        $course_id = $id;


        //dd($attendances);

        if (count($attendances) < 1)
        {
            return redirect('attendance')->withErrors('لا يوجد طلاب مسجلين في هذه المادة');
        } else 
        {
            return view('attendance.showAttendance', compact('attendances', 'course_id', 'week_id'));
        }

        
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
        $attendances = Attendance::where('course_id', '=', $id)
                                    ->where('week_id', '=', 1)
                                    ->get();

        
        
        
        foreach ($attendances as $key => $attendance)
        {
            $atts = Attendance::findOrFail($request->input('id.'.$key));

           

            $temp['sunday'] = $request->input('sunday.' .$key);
            $temp['monday'] = $request->input('monday.' .$key);
            $temp['tuesday'] = $request->input('tuesday.' .$key);
            $temp['wednesday'] = $request->input('wednesday.' .$key);
            $temp['thursday'] = $request->input('thursday.' .$key);

            $atts->update($temp);
            
             

        }

        

        return redirect('attendance')->withSuccess('تم ادخال الغياب بنجاح');
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

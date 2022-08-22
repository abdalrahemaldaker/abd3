<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Sclass;
use App\Models\Student;
use Illuminate\Http\Request;

/**
 * Class AttendanceController
 * @package App\Http\Controllers
 */
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $sclasses = Sclass::paginate();

        return view('admin.attendance.index', compact('sclasses'))
            ->with('i', (request()->input('page', 1) - 1) * $sclasses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attendance = new Attendance();
        return view('admin.attendance.create', compact('attendance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Attendance::$rules);

        $attendance = Attendance::create($request->all());

        return redirect()->route('admin.attendances.index')
            ->with('success', 'Attendance created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance = Attendance::find($id);

        return view('admin.attendance.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Sclass  $sclass
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $validated= $request->validate([
            'date'      =>  'required|date',
            'sclass'    =>  'required|exists:sclasses,id'
        ]);
        // dd($request);
        $date=$validated['date'];
        $sclass=Sclass::find($validated['sclass']);
        // foreach ($sclass->students as $student)
        // {
        //     if($student->attendances()->wherehas()) dd($student);
        //     $attendance=$student->attendances()->where('date',$date)->get();
        //     if(!$attendance->first)
        //     dd($attendance);
        //     dd($student);

        // }

        return view('admin.attendance.edit', compact('sclass','date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sclass $sclass, $date)
    {

        // $attendances=$sclass->attendances()->where('date',$date)->get();
        // $students=$sclass->students();
        // dd($students);
        // $attendances=$students->attendances()->where('date',$date);
        foreach($sclass->students as $student)
        {
            $attendances=$student->attendances()->where('date',$date)->delete();


            // $student->attendances()->where('date',$date)->delete();
            // $attendance= new Attendance(['date'         =>  $date ,
            //                              'student_id'   =>  $student->id ,
            //                              'status'       =>  $request[$student->id]]);
            // $attendance->save
            $student->attendances()->create([   'date'         =>  $date ,
                                                'status'       =>  $request[$student->id]]);
        }

        // $attendance->update($request->all());

        return redirect()->route('admin.attendances.index')
            ->with('success', 'Attendance updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $attendance = Attendance::find($id)->delete();

        return redirect()->route('admin.attendances.index')
            ->with('success', 'Attendance deleted successfully');
    }

    public function fill(Request $request, Sclass $sclass)
    {
        // dd($sclass);
        $validated= $request->validate([
            'date'      =>  'required|date'
        ]);
        $attendances = $sclass->attendances()->where('date',$validated['date']);
        $date=$validated['date'];
        // dd($attendances);
        return view('admin.attendance.edit', compact('date','sclass'));
    }

}

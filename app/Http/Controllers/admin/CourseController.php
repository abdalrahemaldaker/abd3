<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Sclass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class CourseController
 * @package App\Http\Controllers
 */
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sclass)
    {
        $courses =Course::where('sclass_id',$sclass)->paginate();
        // dd($courses);

        return view('admin.course.index', compact('sclass','courses'))
            ->with('i', (request()->input('page', 1) - 1) * $courses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sclass)
    {
        $teachers=DB::table('teachers')->select(DB::raw('id,CONCAT(fname ," ",lname) as name'))->get();
        $subjects=Subject::all();
        $course = new Course();
        return view('admin.course.create', compact('sclass','course','teachers','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Sclass $sclass)
    {
        $validated=request()->validate(Course::$rules);
        $validated['sclass_id']=$sclass->id;
        // array_push($validated,'sclass_id' => $sclass->id );
        // dd($validated);
        $course = Course::create($validated);

        return redirect()->route('admin.courses.index',$sclass)
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($sclass,$id)
    {
        $course = Course::find($id);
        $courses =Course::where('sclass_id',$sclass)->where('id',$id);
        return view('admin.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sclass,$id)
    {
        $teachers=DB::table('teachers')->select(DB::raw('id,CONCAT(fname ," ",lname) as name'))->get();
        $subjects=Subject::all();
        $course = Course::find($id);

        return view('admin.course.edit', compact('course','sclass','teachers','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        request()->validate(Course::$rules);

        $course->update($request->all());

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id,$sclass)
    {
        dd($sclass);
        $course = Course::latest()
        ->where('id',$id)->where('sclass_id',$sclass)->delete();
         dd($course);
        return redirect()->route('admin.courses.index',$sclass)
            ->with('success', 'Course deleted successfully');
    }
}

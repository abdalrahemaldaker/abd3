<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Sclass;
use App\Models\Stage;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class SclassController
 * @package App\Http\Controllers
 */
class SclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sclasses = Sclass::paginate();

        return view('admin.sclass.index', compact('sclasses'))
            ->with('i', (request()->input('page', 1) - 1) * $sclasses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages=Stage::all();
        $years=Year::all();
        $sclass = new Sclass();
        return view('admin.sclass.create', compact('sclass','stages','years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Sclass::$rules);

        $sclass = Sclass::create($request->all());
        $stage=Stage::find($sclass->stage_id);
        foreach($stage->subjects as $subject)
        {
            $course= new Course();
            $course->name=$subject->name;
            $course->subject_id=$subject->id;
            // $course->teacher_id=100000;
            $course->sclass_id=$sclass->id;
            $course->save();

        }
        return redirect()->route('admin.sclasses.index')
            ->with('success', 'Sclass created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sclass = Sclass::find($id);

        return view('admin.sclass.show', compact('sclass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $stages=Stage::all();
        $years=Year::all();

        $sclass = Sclass::find($id);

        return view('admin.sclass.edit', compact('sclass','stages','years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sclass $sclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sclass $sclass)
    {
        request()->validate(Sclass::$rules);

        $sclass->update($request->all());

        return redirect()->route('admin.sclasses.index')
            ->with('success', 'Sclass updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Sclass::find($id)->students()->detach();
        $sclass = Sclass::find($id)->delete();

        return redirect()->route('admin.sclasses.index')
            ->with('success', 'Sclass deleted successfully');
    }






}

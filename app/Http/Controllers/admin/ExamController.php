<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamType;
use App\Models\Sclass;
use App\Models\Stage;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class ExamController
 * @package App\Http\Controllers
 */
class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::paginate();

        return view('admin.exam.index', compact('exams'))
            ->with('i', (request()->input('page', 1) - 1) * $exams->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years=Year::all();
        $examtypes=ExamType::all();
        $stages=Stage::all();
        $exam = new Exam();
        return view('admin.exam.create', compact('exam','years','examtypes','stages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Exam::$rules);

        // if($exam = Exam::create($request->all()))
        // {
        //     // dd($request->year_id) ;

        //     $sclasses=Sclass::where('year_id',$request->year_id)->where('stage_id',$request->stage_id)->get();
        //     dd($sclasses);
        // }
        $exam = Exam::create($request->all());

        return redirect()->route('admin.exams.index')
            ->with('success', 'Exam created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::find($id);

        return view('admin.exam.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $years=Year::all();
        $examtypes=ExamType::all();
        $stages=Stage::all();
        $exam = Exam::find($id);
        return view('admin.exam.edit', compact('exam','years','examtypes','stages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        request()->validate(Exam::$rules);

        $exam->update($request->all());

        return redirect()->route('admin.exams.index')
            ->with('success', 'Exam updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $exam = Exam::find($id)->delete();

        return redirect()->route('admin.exams.index')
            ->with('success', 'Exam deleted successfully');
    }
}

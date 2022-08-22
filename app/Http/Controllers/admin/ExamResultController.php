<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamResultsCourseRequest;
use App\Http\Requests\ExamResultsCourseRequest2;
use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\Sclass;
use Illuminate\Http\Request;

/**
 * Class ExamResultController
 * @package App\Http\Controllers
 */
class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::latest()->paginate();

        return view('admin.exam-result.index', compact('exams'))
            ->with('i', (request()->input('page', 1) - 1) * $exams->perPage());
    }

    public function exam(Exam $exam)
    {
        $sclasses = Sclass::latest()->where('year_id',$exam->year_id)->where('stage_id',$exam->stage_id)->paginate(5);

        return view('admin.exam-result.exam', compact('exam','sclasses'))
            ->with('i', (request()->input('page', 1) - 1) * $sclasses->perPage());
    }


    public function results(ExamResultsCourseRequest $request,Exam $exam , Sclass $sclass)
    {
        $course=$request->validated('course_id');

        $students= $sclass->students();
        return view('admin.exam-result.results', compact('exam','sclass','students','course'));

    }
    public function results2(ExamResultsCourseRequest2 $request)
    {
        $course=$request->validated('course');
        $sclass=Sclass::find($request->validated('sclass'));
        $exam=$request->validated('exam');

        $students= $sclass->students();
        return view('admin.exam-result.results', compact('exam','sclass','students','course'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examResult = new ExamResult();
        return view('admin.exam-result.create', compact('examResult'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ExamResult::$rules);

        $examResult = ExamResult::create($request->all());

        return redirect()->route('admin.exam-results.index')
            ->with('success', 'ExamResult created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examResult = ExamResult::find($id);

        return view('admin.exam-result.show', compact('examResult'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examResult = ExamResult::find($id);

        return view('admin.exam-result.edit', compact('examResult'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ExamResult $examResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Exam $exam ,Sclass $sclass , Course $course)
    {

        $max=$course->subject->max;
        // dd($sclass->students()->get());
        // dd($course);
        // dd($request);
        foreach($sclass->students()->get() as $student)
        {
            $marks=$student->examResults()->where('exam_id',$exam->id)->where('course_id',$course->id)->delete();
            if($request[$student->id]<=$max){
                $student->examResults()->create([
                    'exam_id'   => $exam->id,
                    'course_id' => $course->id,
                    'mark'      => $request[$student->id],
                ]);

            }
        }

        // request()->validate(ExamResult::$rules);

        // $examResult->update($request->all());

        return redirect()->route('admin.exam-results.index')
            ->with('success', 'ExamResult updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $examResult = ExamResult::find($id)->delete();

        return redirect()->route('admin.exam-results.index')
            ->with('success', 'ExamResult deleted successfully');
    }
}

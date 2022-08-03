<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExamResult;
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
        $examResults = ExamResult::paginate();

        return view('admin.exam-result.index', compact('examResults'))
            ->with('i', (request()->input('page', 1) - 1) * $examResults->perPage());
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
    public function update(Request $request, ExamResult $examResult)
    {
        request()->validate(ExamResult::$rules);

        $examResult->update($request->all());

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

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

/**
 * Class ExamTypeController
 * @package App\Http\Controllers
 */
class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examTypes = ExamType::paginate();

        return view('admin.exam-type.index', compact('examTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $examTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examType = new ExamType();
        return view('admin.exam-type.create', compact('examType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ExamType::$rules);

        $examType = ExamType::create($request->all());

        return redirect()->route('admin.exam-types.index')
            ->with('success', 'ExamType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examType = ExamType::find($id);

        return view('admin.exam-type.show', compact('examType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examType = ExamType::find($id);

        return view('admin.exam-type.edit', compact('examType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ExamType $examType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamType $examType)
    {
        request()->validate(ExamType::$rules);

        $examType->update($request->all());

        return redirect()->route('admin.exam-types.index')
            ->with('success', 'ExamType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $examType = ExamType::find($id)->delete();

        return redirect()->route('admin.exam-types.index')
            ->with('success', 'ExamType deleted successfully');
    }
}

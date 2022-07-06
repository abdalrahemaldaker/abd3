<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use Illuminate\Http\Request;

/**
 * Class StageController
 * @package App\Http\Controllers
 */
class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::paginate();

        return view('admin.stage.index', compact('stages'))
            ->with('i', (request()->input('page', 1) - 1) * $stages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stage = new Stage();
        return view('admin.stage.create', compact('stage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Stage::$rules);

        $stage = Stage::create($request->all());

        return redirect()->route('admin.stages.index')
            ->with('success', 'Stage created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stage = Stage::find($id);

        return view('admin.stage.show', compact('stage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stage = Stage::find($id);

        return view('admin.stage.edit', compact('stage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Stage $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stage $stage)
    {
        request()->validate(Stage::$rules);

        $stage->update($request->all());

        return redirect()->route('admin.stages.index')
            ->with('success', 'Stage updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $stage = Stage::find($id)->delete();

        return redirect()->route('admin.stages.index')
            ->with('success', 'Stage deleted successfully');
    }
}

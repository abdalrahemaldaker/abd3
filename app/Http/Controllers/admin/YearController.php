<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;

/**
 * Class YearController
 * @package App\Http\Controllers
 */
class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::paginate();

        return view('admin.year.index', compact('years'))
            ->with('i', (request()->input('page', 1) - 1) * $years->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = new Year();
        return view('admin.year.create', compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Year::$rules);

        $year = Year::create($request->all());

        return redirect()->route('admin.years.index')
            ->with('success', 'Year created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $year = Year::find($id);

        return view('admin.year.show', compact('year'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $year = Year::find($id);

        return view('admin.year.edit', compact('year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Year $year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Year $year)
    {
        request()->validate(Year::$rules);

        $year->update($request->all());

        return redirect()->route('admin.years.index')
            ->with('success', 'Year updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $year = Year::find($id)->delete();

        return redirect()->route('admin.years.index')
            ->with('success', 'Year deleted successfully');
    }
}

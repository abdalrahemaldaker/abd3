<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreYearRequest;
use App\Http\Requests\UpdateYearRequest;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years=Year::paginate(3);
        $years->withquerystring();
        return view('admin.years.index',compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.years.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreYearRequest $request)
    {
        $year=Year::create($request->validated());

        session()->flash('message' , 'year added');
        session()->flash('message-color' , 'success');
        return redirect()->route('admin.years.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit(Year $year)
    {
        return view('admin.years.edit',compact('year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYearRequest $request, Year $year)
    {
        if($request->validated('name')!=$year['name'])
        {
            $year->update($request->validated());
            session()->flash('message' , 'updated succesfuly');
            session()->flash('message-color' , 'success');

        }
        else {
            session()->flash('message' , 'No changes');
            session()->flash('message-color' , 'warning');

        }
        return redirect()->route('admin.years.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Year  $yeard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Year $year)
    {
        $year->delete();
        session()->flash('message' , 'Deleted succesfuly');
        session()->flash('message-color' , 'warning');
        return redirect()->route('admin.years.index');
    }
}

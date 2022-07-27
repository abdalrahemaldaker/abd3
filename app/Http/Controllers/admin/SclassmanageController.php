<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSclassesStudentsRequest;
use App\Models\Sclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SclassmanageController extends Controller
{

    public function manage($id)
    {
        $sclass = Sclass::find($id);

        return view('admin.sclass.manage', compact('sclass'));
    }

    public function autocompleteSearch(Request $request)
    {
        // $users = DB::table('users')
        //      ->select(DB::raw('count(*) as user_count, status'))
        //      ->where('status', '<>', 1)
        //      ->groupBy('status')
        //      ->get();



                $query = $request->get('term');


                $data = DB::table("students")
                ->select(DB::raw('CONCAT (fname ," ",lname,":",id) as value'))
                ->where("fname","LIKE","%{$query}%")
                ->orWhere("lname","LIKE","%{$query}%")
                ->get();

        return response()->json($data);

    }

    public function fill(Request $request ,$sclass)
    {
        $students=explode(',',$request->students);

        // $student=explode(':',$students[0]);
        // dd($sclass);
        $sclass=Sclass::find($sclass);
        if($sclass->isEmpty)
        {return redirect()->back()->with('warning', 'sclass is invalid');}
        $added=0;
        $failed=0;

        foreach($students as $student)
        {
        $student=explode(':',$student);
        if(count($student)>1){
            $student=$student[1];
            $q=DB::table('sclass_student')
            ->where('student_id','=',$student)
            ->where('sclass_id','=',$sclass->id)->get();
            // echo $q->tosql();
            // dd($q);
            if($q->isEmpty())
            {


                // dd($student);
                 $sclass->students()->attach($student);
                 $added++;
                }else
                $failed++;}

        }
            if ($added>0)
             return redirect()->route('admin.sclasses.manage',$sclass)
            ->with('success', "$added students added successfully, $failed students not added");
             return redirect()->route('admin.sclasses.manage',$sclass)
            ->with('warning', "already in class.");
    }
    public function destroy($sclass ,Request $request)
    {
        $student=$request->student;
        $sclass=Sclass::find($sclass);
        $sclass->students()->detach($student);
        return redirect()->route('admin.sclasses.manage',$sclass)
        ->with('warning', 'student removed successfuly from class');
    }
}

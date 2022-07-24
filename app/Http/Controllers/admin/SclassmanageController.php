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



                $query = $request->get('query');


                $data = DB::table("students")
                ->select(DB::raw('CONCAT (fname ," ",lname,":",id) as name'))
                ->where("fname","LIKE","%{$query}%")
                ->orWhere("lname","LIKE","%{$query}%")
                ->get();

        return response()->json($data);

    }

    public function fill(Request $request ,$sclass)
    {
        //  dd($sclass);
        $student=explode(':',$request->student);
        $student=$student[1];
        $q=DB::table('sclass_student')
        ->where('student_id','=',$student)
        ->where('sclass_id','=',$sclass)->get();
        // echo $q->tosql();
         //dd($q);
        if($q->isEmpty())
        {
            $sclass=Sclass::find($sclass);

            echo 'hello';
             $sclass->students()->attach($student);
             return redirect()->route('admin.sclasses.manage',$sclass)
            ->with('success', 'student added successfully.');
        }
        return redirect()->route('admin.sclasses.manage',$sclass)
        ->with('warning', 'the student already inside the class');
    }
    public function destroy($sclass ,$student)
    {

        $sclass->students()->detach($student);
        return redirect()->route('admin.sclasses.manage',$sclass)
        ->with('warning', 'the student already inside the class');
    }
}

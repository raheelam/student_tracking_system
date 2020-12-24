<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$dayAfter = datetime('2020-12-20')->modify('+1 day')->format('Y-m-d');
        $students = Student::latest()->paginate(8);
     // $students = Student::where('roomnumber', '7')->whereDate('created_at','2020-12-21')->latest()->paginate(10);
    //  $students = Student::where('roomnumber', '7')->where('created_at','<=','2020-12-20'.' 23:59:59')->where('created_at','<', $dayAfter)->latest()->paginate(10);  
      return view('view_students_irbd', compact('students'))
      ->with('i', (request()->input('page', 1)-1)* 8);
        //
    }

    public function getStudentsByroomDate(Request $request){
        
        $students = Student::where('roomnumber', $request->input('roomnumber'))->whereDate('created_at',$request->input('date'))->latest()->paginate(8);
        //$students = Student::where('roomno',$roomno)and('created_date',$date)->latest()->paginate(10);
        return view('view_students_irbd', compact('students'))
      ->with('i', (request()->input('page', 1)-1)* 8);
    }

    public function getStudentsByDates(Request $request){
        if($request->input('date1') > $request->input('date2')){
            $students = Student::whereDate('created_at',"<=",$request->input('date1'))->whereDate('created_at',">=",$request->input('date2'))->latest()->paginate(8);
        }else{
            $students = Student::whereDate('created_at',"<=",$request->input('date2'))->whereDate('created_at',">=",$request->input('date1'))->latest()->paginate(8);
        }

       
        //$students = Student::where('roomno',$roomno)and('created_date',$date)->latest()->paginate(10);
        return view('view_students_irbd', compact('students'))
      ->with('i', (request()->input('page', 1)-1)* 8);
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'roomnumber' => 'required',
            'telephone' => 'required',
            'studentid' => 'required',
            //'cost' => 'required'
        ]);

        Student::create($request->all());

        

       return redirect()->route('students.index')
            ->with('success', 'Student record created successfully.');
           // ->with('alert', 'Student record created successfully.');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'roomnumber' => 'required',
            'telephone' => 'required',
            'studentid' => 'required',
            //'cost' => 'required'
        ]);
        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student record updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student record deleted successfully');
        //
    }
}

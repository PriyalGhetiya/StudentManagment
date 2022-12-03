<?php

namespace App\Http\Controllers;

use App\Marks;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public $table = 'students';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.student.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->fun_validation($request);
          try{
            $input = $request->all();
            $brand = Student::create($input);
            $id = $brand->id;
        }catch (Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }

        return redirect()->route('home')->with('success','Student add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Student::findOrFail($id);
        return view('layouts.student.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->fun_validation($request,$id);
        try{
            $input = $request->all();
            // dd($input);
            $brand = Student::findOrFail($id,'id');
            $brand->update($input);
        }catch (Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }

        return redirect()->route('home')
        ->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Student::findOrFail($id);
        try{
            Student::destroy($id);
        } catch (Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }

        return redirect()->route('home')->with('success','Student delete successfully');

    }

    public function fun_validation($request,$id=''){
    $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'enrollment_no' => 'required|unique:'.$this->table.',enrollment_no,'.$id,
        );
    $this->validate($request,$rules);
    }

    public function add_mark(Request $request, $id)
    {
        $input= $request->all();
        $input['student_id'] = $id;
           unset($input['_token']);
           $mark = Marks::where('student_id', $id)->first();
           if(empty($mark)){
               $mark = Marks::create($input);
           }
           else{
                $mark->update($input);
           }

            return redirect()->route('home')->with('success','Marks add successfully');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('course');
    }

	public function show($id)
    {
    	$course = Course::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();
        return view('show', compact('course', 'id'));
    }

	public function index()
    {
        $courses = Course::where('user_id', auth()->user()->id)->get();
        
        return view('index',compact('courses'));
    }

    public function store(Request $request)
    {
        $course = new Course();
        $data = $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
       
        $course->saveCourse($data);
        return redirect('/home')->with('success', 'New course has been created!');
    }

    public function edit($id)
    {
        $course = Course::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('edit', compact('course', 'id'));
    }

    public function update(Request $request, $id)
    {
        $course = new Course();
        $data = $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
        $data['id'] = $id;
        $course ->updateCourse($data);

        return redirect('/home')->with('success', 'New course has been updated!!');
    }

	public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect('/home')->with('success', 'Course has been deleted!!');
    }
}

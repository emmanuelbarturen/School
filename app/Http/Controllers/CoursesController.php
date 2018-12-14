<?php namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;

/**
 * Class CoursesController
 * @package App\Http\Controllers
 */
class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course = Course::create($request->except(['_token', '_method']));
        if ($course) {
            flash(trans('flash.stored_success'))->success();
        } else {
            flash(trans('flash.stored_fail'))->error();
        }
        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        if (!$course) {
            abort(404);
        }

        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        if (!$course) {
            abort(404);
        }
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::find($id);
        if (!$course) {
            abort(404);
        }
        $course->fill($request->except(['_token', '_method']));
        $updated = $course->save();
        if ($updated) {
            flash(trans('flash.updated_success'))->success();
        } else {
            flash(trans('flash.updated_fail'))->error();
        }

        return redirect()->route('cursos.show', $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if (!$course) {
            abort(404);
        }
        $deleted = $course->delete();
        if ($deleted) {
            flash(trans('flash.delete_success'))->success();
        } else {
            flash(trans('flash.delete_fail'))->error();
        }

        return redirect()->route('cursos.index');
    }
}

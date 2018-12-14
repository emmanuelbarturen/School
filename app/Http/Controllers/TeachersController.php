<?php namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Teacher;
use Illuminate\Http\Request;

/**
 * Class TeachersController
 * @package App\Http\Controllers
 */
class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeacherRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $teacher = Teacher::create($request->except(['_token', '_method']));
        if ($teacher) {
            flash(trans('flash.stored_success'))->success();
        } else {
            flash(trans('flash.stored_fail'))->error();
        }
        return redirect()->to('/profesores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            abort(404);
        }

        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            abort(404);
        }
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeacherRequest $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TeacherRequest $request, $id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            abort(404);
        }
        $teacher->fill($request->except(['_token', '_method']));
        $updated = $teacher->save();
        if ($updated) {
            flash(trans('flash.updated_success'))->success();
        } else {
            flash(trans('flash.updated_fail'))->error();
        }

        return redirect()->route('profesores.show', $teacher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            abort(404);
        }
        $deleted = $teacher->delete();
        if ($deleted) {
            flash(trans('flash.delete_success'))->success();
        } else {
            flash(trans('flash.delete_fail'))->error();
        }

        return redirect()->route('profesores.index');
    }
}

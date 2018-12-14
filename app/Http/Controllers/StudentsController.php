<?php namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Student;

/**
 * Class StudentsController
 * @package App\Http\Controllers
 */
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create($request->except(['_token', '_method']));
        if ($student) {
            flash(trans('flash.stored_success'))->success();
        } else {
            flash(trans('flash.stored_fail'))->error();
        }
        return redirect()->to('/alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            abort(404);
        }

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $student = Student::find($id);
        if (!$student) {
            abort(404);
        }
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentRequest $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StudentRequest $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            abort(404);
        }
        $student->fill($request->except(['_token', '_method']));
        $updated = $student->save();
        if ($updated) {
            flash(trans('flash.updated_success'))->success();
        } else {
            flash(trans('flash.updated_fail'))->error();
        }

        return redirect()->route('alumnos.show', $student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            abort(404);
        }
        $deleted = $student->delete();
        if ($deleted) {
            flash(trans('flash.delete_success'))->success();
        } else {
            flash(trans('flash.delete_fail'))->error();
        }

        return redirect()->route('alumnos.index');
    }
}

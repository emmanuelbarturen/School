@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear nuevo alumno</div>
                    <div class="card-body">
                        <form action="{{ url('/alumnos') }}" method="POST">
                            @csrf
                            @include('students.form',['student'=>new \App\Student()])
                            <br>
                            <h5>Asignar Cursos</h5>
                            @forelse($courses as $course)
                            <!-- Default inline 1-->
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input"
                                           value="{{$course->id}}" id="chk-{{$course->id}}" name="courses[]">
                                    <label class="custom-control-label" dusk="c-{{$course->id}}"
                                           for="chk-{{$course->id}}">{{$course->name}}</label>
                                </div>
                            @empty
                                <p>No hay cursos agregados.</p>
                            @endforelse
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary" dusk="save-student">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

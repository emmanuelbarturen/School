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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

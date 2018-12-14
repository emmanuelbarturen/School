@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar alumno</div>
                    <div class="card-body">
                        <form action="{{ route('alumnos.update',$student) }}" method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                            @include('students.form',['student'=>$student])
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" dusk="update-student">Guardar</button>
                                <a href="{{ url('alumnos') }}" class="btn btn-secondary">Volver</a>
                            </div><!-- /form-group -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar nuevo curso</div>
                    <div class="card-body">
                        <form action="{{  route('cursos.store') }}" method="POST">
                            @csrf
                            @include('courses.form',['course'=>new \App\Course()])
                            <button type="submit" class="btn btn-primary" dusk="save-course">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

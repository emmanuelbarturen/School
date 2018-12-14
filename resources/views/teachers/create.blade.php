@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar nuevo profesor</div>
                    <div class="card-body">
                        <form action="{{  route('profesores.store') }}" method="POST">
                            @csrf
                            @include('teachers.form',['teacher'=>new \App\Teacher()])
                            <button type="submit" class="btn btn-primary" dusk="save-teacher">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

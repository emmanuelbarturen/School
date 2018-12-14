@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar profesor</div>
                    <div class="card-body">
                        <form action="{{ route('profesores.update',$teacher) }}" method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                            @include('teachers.form',['teacher'=>$teacher])
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" dusk="update-teacher">Guardar</button>
                                <a href="{{ route('profesores.index')}}" class="btn btn-secondary">Volver</a>
                            </div><!-- /form-group -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

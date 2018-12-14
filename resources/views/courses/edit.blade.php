@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar curso</div>
                    <div class="card-body">
                        <form action="{{ route('cursos.update',$course) }}" method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                            @include('courses.form',['course'=>$course])
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" dusk="update-teacher">Guardar</button>
                                <a href="{{ route('cursos.index')}}" class="btn btn-secondary">Volver</a>
                            </div><!-- /form-group -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

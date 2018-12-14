@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><h3>Detalle del curso</h3></div>
                            <div class="col-md-6">
                                <form action="{{ route('cursos.destroy',$course) }}" method="POST"
                                      onsubmit="return confirm('Seguro que desea eliminar este curso?')">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-right" dusk="delete-course">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <p>Nombres:{{$course->name}} </p>
                        <p>Semestre al que pertenece: {{$course->semester}}</p>
                        <a href="{{ route('cursos.edit',$course) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

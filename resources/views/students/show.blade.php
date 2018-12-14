@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><h3>Detalle del Alumno</h3></div>
                            <div class="col-md-6">
                                <form action="{{ route('alumnos.destroy',$student) }}" method="POST"
                                      onsubmit="return confirm('Seguro que desea eliminar a este estudiante?')">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-right">Eliminar</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <p>Nombres:{{$student->names}} </p>
                        <p>Email: {{$student->email}}</p>
                        <a href="{{ route('alumnos.edit',$student) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ url('alumnos') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

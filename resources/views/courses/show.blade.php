@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><h3>Detalle del profesor</h3></div>
                            <div class="col-md-6">
                                <form action="{{ route('profesores.destroy',$teacher) }}" method="POST"
                                      onsubmit="return confirm('Seguro que desea eliminar a este profesor?')">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-right" dusk="delete-teacher">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <p>Nombres:{{$teacher->names}} </p>
                        <p>Teléfono: {{$teacher->phone}}</p>
                        <a href="{{ route('profesores.edit',$teacher) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('profesores.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

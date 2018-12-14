@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><h3>Todos los profesores</h3></div>
                            <div class="col-md-6">
                                <a href="{{ route('profesores.create') }}" class="btn btn-primary float-right">Nuevo</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Teléfono </th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->names }}</td>
                                    <td>{{$teacher->phone}}</td>
                                    <td><a href="{{ route('profesores.edit',$teacher) }}">Editar</a></td>
                                    <td><a href="{{ route('profesores.show',$teacher) }}">Ver</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

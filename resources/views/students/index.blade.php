@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><h3>Todos los alumnos</h3></div>
                            <div class="col-md-6">
                                <a href="{{ route('alumnos.create') }}" class="btn btn-primary float-right">Nuevo</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Correo</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->names }}</td>
                                    <td>{{$student->email}}</td>
                                    <td><a href="{{ route('alumnos.edit',$student) }}">Editar</a></td>
                                    <td><a href="{{ route('alumnos.show',$student) }}">Ver</a></td>
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

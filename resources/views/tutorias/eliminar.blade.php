@extends('adminlte::page')

@section('title', 'TutoLine')

@section('content_header')
<h1><b>Tutorías Activas</b></h1>
@stop

@section('content')
<h4><b>Seleccione la tutoría que desea eliminar</b></h4>
<a href="tutorias" class="btn btn-secondary">Regresar</a>

<table class="table table-dark table-striper mt-4">
    <thead>
        <tr>
            <th scope="col">Alumno</th>
            <th scope="col">Tutor</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tutorias as $tutoria)
        <tr>
        <td>
                @foreach ($alumnos as $alumno)
                @if($tutoria->alumno_id_alumno == $alumno->id_alumno)
                {{$alumno->nombre_alumno}} {{$alumno->apellido_alumno}}
                @endif
                @endforeach
            </td>
            <td>
                @foreach ($tutors as $tutor)
                @if($tutoria->tutor_id_tutor == $tutor->id_tutor)
                {{$tutor->nombre_tutor}} {{$tutor->apellido_tutor}}
                @endif
                @endforeach
            </td>
            <td>
                <form action="{{ route('tutorias.destroy',$tutoria->id )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
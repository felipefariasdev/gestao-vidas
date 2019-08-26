@extends('layouts.app')
@section('content')

    <h1>Upload Pacientes</h1>
    
    <form enctype="multipart/form-data" action="{{ route('pacientes.enviar') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        Enviar esse arquivo: <input name="file" type="file" />
        <input type="submit" value="Enviar arquivo" />
    </form>
    
@endsection

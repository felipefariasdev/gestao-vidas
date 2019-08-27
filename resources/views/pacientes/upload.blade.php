@extends('layouts.app')
@section('content')

    <h3>Upload Pacientes</h3>
    
    <form enctype="multipart/form-data" action="{{ route('pacientes.enviar') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <input name="file" type="file" class="form-control-file" />
        </div>    
        <input type="submit" value="Enviar arquivo" class="btn btn-primary" />
    </form>
    
@endsection

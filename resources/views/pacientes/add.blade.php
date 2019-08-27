@extends('layouts.app')
@section('content')

    <h2>Novo Paciente</h2>
    
    <form action="{{ route('pacientes.save') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label>Nome</label>
            <input name="nome" type="text" class="form-control" required />
        </div>

        <div class="form-group">
            <label>Idade</label>
            <input name="idade" type="number" class="form-control" required />
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input name="telefone" type="tel" class="form-control" required />
        </div>

        <div class="form-group">
            <label>Matricula</label>
            <input name="matricula" type="text" class="form-control" required />
        </div>

        <input type="submit" class="btn btn-primary" value="Salvar" />
    </form>
    
@endsection

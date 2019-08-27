@extends('layouts.app')
@section('content')

    <h3>Atualizar Paciente</h3>
    
    <form action="{{ route('pacientes.put') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{$paciente->id}}">
        <div class="form-group">
            <label>Nome</label>
            <input name="nome" type="text" class="form-control" value="{{$paciente->nome}}" required />
        </div>

        <div class="form-group">
            <label>Idade</label>
            <input name="idade" type="number" value="{{$paciente->idade}}" class="form-control" required />
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input name="telefone" type="tel" value="{{$paciente->telefone}}" class="form-control" required />
        </div>

        <div class="form-group">
            <label>Matricula</label>
            <input name="matricula" type="text" value="{{$paciente->matricula}}" class="form-control" required />
        </div>

        <input type="submit" class="btn btn-primary" value="Salvar" />
    </form>
    
@endsection

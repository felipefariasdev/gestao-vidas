@extends('layouts.app')
@section('content')

    <h1>Listar Pacientes</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Idade</th>
            <th scope="col">Telefone</th>
            <th scope="col">Matricula</th>
            <th scope="col">Data de cadastro</th>
            <th scope="col">Data de atualização</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($pacientes as $paciente)
        <tr>
            <th scope="row">{{$paciente->id}}</th>
            <td>{{$paciente->nome}}</td>
            <td>{{$paciente->idade}}</td>
            <td>{{$paciente->telefone}}</td>
            <td>{{$paciente->matricula}}</td>
            <td>{{$paciente->created_at}}</td>
            <td>{{$paciente->updated_at}}</td>

        </tr>
        @empty
            <p>Nenhum registro encontrado!</p>
        @endforelse
        </tbody>
    </table>
    {!! $pacientes->links() !!}
@endsection

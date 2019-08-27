@extends('layouts.app')
@section('content')

    <h2>Listar Pacientes <a href="{{ route('pacientes.add') }}"><button type="button" class="btn btn-info"><i class="material-icons">add</i></button></a></h2>
     
        

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
            <th scope="col"></th>
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
            <td>{{date('d/m/Y H:m:s', strtotime($paciente->created_at))}}</td>
            <td>{{date('d/m/Y H:m:s', strtotime($paciente->updated_at))}}</td>
            <td>
                <a href="pacientes/update/{{$paciente->id}}" class="btn-info"><button type="button" class="btn btn-info"><i class="material-icons">
                    edit
                    </i></button></a>
                <a href="pacientes/delete/{{$paciente->id}}" onClick="return confirm('Tem certeza?')"><button type="button" class="btn btn-danger"><i class="material-icons">
                    delete
                    </i></button></a>
            </td>

        </tr>
        @empty
            <p>Nenhum registro encontrado!</p>
        @endforelse
        </tbody>
    </table>
    {!! $pacientes->links() !!}
@endsection

@extends('layouts.app')
@section('content')

    <h3>Pacientes <a href="{{ route('pacientes.add') }}"><button type="button" class="btn btn-info"><i class="material-icons">add</i></button></a></h3>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NOME</th>
            <th scope="col">IDADE</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">MATRICULA</th>
            <th scope="col">DATA DO CADASTRO</th>
            <th scope="col">DATA DA ATUALIZAÇÃO</th>
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

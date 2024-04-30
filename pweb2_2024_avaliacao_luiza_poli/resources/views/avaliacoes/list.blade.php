@extends('base')
@section('conteudo')
@section('titulo', 'Listagem de Avaliações')


<h3>Listagem de Avaliações</h3>
<form action="{{ route('avaliacoes.search') }}" method="post">

    @csrf

    <label for="">Nome</label><br>
    <input type="text" name="nome" class="form-control"><br>

    <button type="submit" >Buscar</button>
    <button><a href="{{ url('avaliacoes/create') }}" class="btn btn-secondary">Novo</a></button>

</form>

<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Música</th>
            <th>Confira</th>
            <th>Avaliação</th>
            <th>Estilo Musical</th>
            <th colspan="2">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nNome }}</td>
                <td>{{ $item->nMusica }}</td>
                <td><a href="{{ $item->nLink }}" target="_blank">{{ $item->nLink }}</a></td>
                <td>{{ $item->nAvaliacao }}</td>
                <td>{{ $item->categoria->nome }}</td>
                <td><a href="{{ route('avaliacoes.edit', $item->id) }}" class="btn btn-secondary"> Editar</a></td>

                <td>
                    <form action="{{ route('avaliacoes.destroy', $item) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Deletar" class="btn btn-secondary">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop

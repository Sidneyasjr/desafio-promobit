@extends('adminlte::page')

@section('title', 'Lista de Tags')

@section('content_header')
    <h1>Lista de Tags</h1>
@stop

@section('content')
    @include('_messages')
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Nome</th>
                <th>Açoes</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('tags.destroy', $tag) }}" method="post" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td>Nenhum registro foi encontrado</td>
                    <td></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $tags->links() }}
    </div>

    <div>
        <a href="{{ route('tags.create') }}" class="btn btn-primary">Nova Tag</a>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Lista de Produtos')

@section('content_header')
    <h1>Lista de Produtos</h1>
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
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('products.destroy', $product) }}" method="post" style="display: inline">
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
        {{ $products->links() }}
    </div>

    <div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Novo Produto</a>
    </div>
@stop

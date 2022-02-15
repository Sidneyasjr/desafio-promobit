@extends('adminlte::page')

@section('title', 'Relevancia de Produtos')

@section('content_header')
    <h1>Relevancia de Produtos</h1>
@stop

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Nome</th>
                <th class="text-center">Quantidade de Produtos</th>
                <th>Produtos</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productsRelevance as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td class="text-center">{{ $tag->qtde_products }}</td>
                    <td>
                        @forelse ($tag->products as $key => $product)
                            {{ $product->name }} 
                            @if ($key + 1 < count($tag->products))
                                -
                            @endif
                        @empty
                            
                        @endforelse
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
@stop
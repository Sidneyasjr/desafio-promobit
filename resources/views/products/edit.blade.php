@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')
    <h1>Editar Produto #{{ $product->id }}</h1>
@stop

@section('content')

    @include('_messages')
    <div class="card card-primary">
        <form action="{{ route('products.update', $product) }}" method="POST">
            @method('PUT')
            @include('products._form')
        </form>
    </div>

@stop

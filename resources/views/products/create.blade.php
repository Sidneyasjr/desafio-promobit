@extends('adminlte::page')

@section('title', 'Novo Produto')

@section('content_header')
    <h1>Novo Produto</h1>
@stop

@section('content')

    <div class="card card-primary">
        @include('_messages')
        <form action="{{ route('products.store') }}" method="POST">
            @include('products._form')
        </form>
    </div>

@stop

@extends('adminlte::page')

@section('title', 'Editar Tag')

@section('content_header')
    <h1>Editar Tag #{{ $tag->id }}</h1>
@stop

@section('content')

    @include('_messages')
    <div class="card card-primary">
        <form action="{{ route('tags.update', $tag) }}" method="POST">
            @method('PUT')
            @include('tags._form')
        </form>
    </div>

@stop
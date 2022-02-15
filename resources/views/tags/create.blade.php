@extends('adminlte::page')

@section('title', 'Nova Tag')

@section('content_header')
    <h1>Nova Tag</h1>
@stop

@section('content')

    <div class="card card-primary">
        @include('_messages')
        <form action="{{ route('tags.store') }}" method="POST">
            @include('tags._form')
        </form>
    </div>

@stop

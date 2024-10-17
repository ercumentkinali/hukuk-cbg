@extends('master.default')

@section('title', 'CBG Hukuk')

@section('content')
    @include('master.parts.header')
    @include('create.main')
    @include('create.genres')
    @include('create.authors')

@endsection

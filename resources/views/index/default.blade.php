@extends('master.default')

@section('title', 'CBG Hukuk')

@section('content')
    @include('master.parts.header')
    @include('index.main')
    @if(session('success'))
        <div id="" class="flash-message fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-4 py-2 rounded shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

@endsection

@extends('dashboard.base')
@section('content')
    {{ $nbrUser = count(User::get());}}
@endsection
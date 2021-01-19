@extends('layouts.dashboard')

@section('content')

<Clientes-component :user="{{ Auth::user() }}"></Clientes-component>

@endsection
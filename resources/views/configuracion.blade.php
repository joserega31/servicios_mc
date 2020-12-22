@extends('layouts.dashboard')

@section('content')
    <configuracion-component :user="{{ Auth::user() }}"><configuracion-component>
@endsection
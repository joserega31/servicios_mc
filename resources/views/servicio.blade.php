@extends('layouts.dashboard')

@section('content')

<Servicio-component :user="{{ Auth::user() }}"></Servicio-component>

@endsection
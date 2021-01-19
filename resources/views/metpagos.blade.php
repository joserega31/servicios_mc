@extends('layouts.dashboard')

@section('content')

<metpagos-component :user="{{ Auth::user() }}"></metpagos-component>

@endsection
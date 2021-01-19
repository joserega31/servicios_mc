@extends('layouts.dashboard')

@section('content')

<supervisores-component :user="{{ Auth::user() }}"><supervisores-component>

@endsection
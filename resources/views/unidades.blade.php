@extends('layouts.dashboard')

@section('content')

<unidades-component :user="{{ Auth::user() }}"></unidades-component>

@endsection
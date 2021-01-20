@extends('layouts.dashboard')

@section('content')
<designaciones-component :user="{{ Auth::user() }}"><designaciones-component>
@endsection
@extends('layouts.dashboard')

@section('content')
<tarifarios-component :user="{{ Auth::user() }}"><tarifarios-component>
@endsection
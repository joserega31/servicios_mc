@extends('layouts.dashboard')

@section('content')
<funcionrol-component :user="{{ Auth::user() }}"></funcionrol-component>
@endsection
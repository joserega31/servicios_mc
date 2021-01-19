@extends('layouts.dashboard')

@section('content')
<usuarios-component :user="{{ Auth::user() }}"></usuarios-component>
@endsection
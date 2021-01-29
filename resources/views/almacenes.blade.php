@extends('layouts.dashboard')

@section('content')

<almacenes-component :user="{{ Auth::user() }}"></almacenes-component>

@endsection
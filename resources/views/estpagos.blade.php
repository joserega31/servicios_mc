@extends('layouts.dashboard')

@section('content')
<estpagos-component :user="{{ Auth::user() }}"><estpagos-component>
@endsection
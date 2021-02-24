@extends('layouts.dashboard')

@section('content')
<reportes-component :user="{{ Auth::user() }}"><reportes-component>
@endsection 
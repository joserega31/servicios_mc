@extends('layouts.dashboard')

@section('content')
<tiposserv-component :user="{{ Auth::user() }}"><tiposserv-component>
@endsection
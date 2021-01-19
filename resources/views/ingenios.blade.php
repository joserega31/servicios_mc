@extends('layouts.dashboard')

@section('content')
<ingenios-component :user="{{ Auth::user() }}"><ingenios-component>
@endsection
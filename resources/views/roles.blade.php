@extends('layouts.dashboard')

@section('content')
<Roles-component :user="{{ Auth::user() }}"></Roles-component>
@endsection
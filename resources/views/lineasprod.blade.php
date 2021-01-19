@extends('layouts.dashboard')

@section('content')
<lineasprod-component :user="{{ Auth::user() }}"></lineasprod-component>
@endsection
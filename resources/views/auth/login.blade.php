@extends('layouts.app')

@section('content')
<div id="app">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <login-component></login-component>
</div>
@endsection

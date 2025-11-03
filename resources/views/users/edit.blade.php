@extends('layouts.default')

@section('page-title', 'Edit User')

@section('content')
    
    @include('users.parts.basic-details')

    <p></p>

    @include('users.parts.interests')

    <p></p>

    @include('users.parts.profile')

@endsection
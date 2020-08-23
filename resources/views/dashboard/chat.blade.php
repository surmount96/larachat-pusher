@extends('layouts.app')

@section('content')
    <h3 class=" text-h4 my-6">Select a user to chat with</h3>
    <chat :users="{{ $users }}" />
@endsection

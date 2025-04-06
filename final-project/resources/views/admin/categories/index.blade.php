
@extends('layouts.app')

@section('content')<h1>Category List</h1>
    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
    @endsection
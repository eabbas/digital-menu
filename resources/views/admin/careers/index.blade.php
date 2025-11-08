@extends('admin.user.panel')
    @section('title', ' همه کسب وکارها')
    @section('content')
    @foreach($careers as $career)
    {{$career->title}}
    {{$career->title}}
    {{$career->title}}
    {{$career->title}}
    {{$career->title}}
    @endforeach
    @endsection
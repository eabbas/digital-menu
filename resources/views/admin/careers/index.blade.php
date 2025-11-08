@extends('admin.user.panel')
    @section('title', ' همه کسب وکارها')
    @section('content')
    @foreach($careers as $career)
    {{$career->title}}</br>
    {{$career->province}}</br>
    {{$career->city}}</br>
    {{$career->address}}</br>
    {{$career->description}}</br>
    @endforeach
    @endsection
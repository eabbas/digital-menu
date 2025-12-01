@extends('admin.app.panel')
@section('title', 'ثبت محصول شخصی سازی شده')
@section('content')
    <form action="{{ route('cp.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$career -> id}}">
        <lable for="title">Title:</lable>
        <input type="text" name="title">
        <br><br>
        <lable for="description">Description:</lable>
        <input type="textarea" name="description">
        <br><br>
        <label for="image">Image:</label>
        <input type="file" name="customProductImage">
        <br><br>
        <label for="material_limit">material_limit:</label>
        <input type="text" name="material_limit">

        <button>ثبت</button>
    </form>

@endsection

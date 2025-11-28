@extends('admin.app.panel')
@section('title', 'ثبت محصول شخصی سازی شده')
@section('content')
    <form action="{{ route('cp.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <lable for="title">Title:</lable>
        <input type="text" name="title">
        <br><br>
        <lable for="description">Description:</lable>
        <input type="textarea" name="description">
        <br><br>
        <label for="duration">Duration:</label>
        <input type="text" name="duration">
        <br><br>
        <label for="image">Image:</label>
        <input type="file" name="customProductImage">
        <br><br>
        <label for="material_limit">material_limit:</label>
        <input type="text" name="material_limit">
        <br><br>
        <label for="min_amount_unit">min_amount_unit:</label>
        <input type="text" name="min_amount_unit">

        <button>ثبت</button>
    </form>

@endsection

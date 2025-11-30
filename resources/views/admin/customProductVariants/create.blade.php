@extends('admin.app.panel')
@section('title', 'ثبت انواع محصول شخصی سازی شده')
@section('content')
    <form action="{{ route('cpv.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <lable for="title">Title:</lable>
        <input type="text" name="title">
        <br><br>
        <lable for="description">Description:</lable>
        <input type="textarea" name="description">
        <br><br>
        <label for="min_amount_unit">min_amount_unit:</label>
        <input type="text" name="min_amount_unit">
        <br><br>
        <label for="duration">duration:</label>
        <input type="text" name="duration">
        <br><br>
        <label for="image">image:</label>
        <input type="file" name="image">
        <select name="custom_product_id">
            @foreach($customProducts as $customProduct)
                <option value="{{ $customProduct->id }}">{{ $customProduct->title }}</option>
            @endforeach
        </select>
        <button>ثبت</button>
    </form>
@endsection
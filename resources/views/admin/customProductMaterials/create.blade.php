@extends('admin.app.panel')
@section('title', 'ثبت انواع محصول شخصی سازی شده')
@section('content')
    <form action="{{ route('cpm.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <lable for="title">Title:</lable>
        <input type="text" name="title">
        <br><br>
        <lable for="description">Description:</lable>
        <input type="textarea" name="description">
        <br><br>
        <label for="price_per_unit">price_per_unit:</label>
        <input type="text" name="price_per_unit">
        <br><br>
        <label for="order">order:</label>
        <input type="text" name="order">
        <br><br>
        <label for="image">image:</label>
        <input type="file" name="image">
        <br><br>
        <label for="required">required:</label>
        <input type="checkbox" name="required" value="1">
        <br><br>
        <label for="max_unit_amount">max_unit_amount:</label>
        <input type="text" name="max_unit_amount">

        <select name="custom_product_id">
            @foreach($customProducts as $customProduct)
                <option value="{{ $customProduct->id }}">{{ $customProduct->title }}</option>
            @endforeach
        </select>
        <button>ثبت</button>
    </form>
@endsection
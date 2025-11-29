@extends('admin.app.panel')
@section('title', 'ثبت دسته بندی   ')
@section('content')
    <form action="{{ route('custmCategory.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <lable for="title">Title:</lable>
        <input type="text" name="title">
        <br><br>
        <lable for="max_item_amount">max_item_amount:</lable>
        <input type="textarea" name="max_item_amount">

        <button>ثبت</button>
    </form>

@endsection

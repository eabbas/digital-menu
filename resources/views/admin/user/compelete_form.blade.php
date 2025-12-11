@extends('admin.app.panel')
@section('title', 'تکمیل پروفایل');
@section('content')
<form action="{{ route('user.save') }}" class="w-full lg:w-1/2 lg:mx-auto flex flex-col items-center my-6 gap-3" method="post" enctype="multipart/form-data">
    @csrf
    <div class="w-full flex flex-col gap-3">
        <label>عکس پروفایل</label>
        <input type="file"
            class="w-full p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
            name="main_image" required>
    </div>
    <div class="w-full flex flex-col gap-3">
        <label>ایمیل</label>
        <input type="email"
            class="w-full p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
            name="email" placeholder="test@example.com">
    </div>
    <button class="text-center w-full bg-[#056EE9] p-3 rounded-[10px] text-white cursor-pointer">ذخیره</button>
</form>
@endsection
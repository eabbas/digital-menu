@extends('user.panel')
@section('title', 'مشاهده QR کد ها')
@section('content')
<div class="w-full grid grid-cols-8 mt-5">
    @foreach($menu->qr_codes as $qr_code)
    <div class="p-3 w-full">
        <img class="size-20" src="{{ asset('/storage/'.$qr_code->qr_path) }}" alt="">
    </div>
    @endforeach
</div>
@endsection
@extends('admin.app.panel')
@section('title', 'مشاهده QR کد ها')
@section('content')
<div class="w-full grid grid-cols-1 md:grid-cols-4 xl:grid-cols-8 mt-5">
    <?php $i=1;?>
    @foreach($career->qr_codes as $qr_code)
    <div class="p-3 w-full flex flex-col items-center gap-3">
        <img class="size-20 mx-auto" src="{{ asset('/storage/'.$qr_code->qr_path) }}" alt="">
        <span>{{ $i }}</span>
    </div>
    <?php $i++;?>
    @endforeach
</div>
@endsection
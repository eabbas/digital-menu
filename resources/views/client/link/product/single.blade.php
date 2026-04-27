@extends('client.document')
@section('title')
    مشاهده محصول {{ $product->title }}
@endsection
@section('content')
    <div class="w-full flex flex-col items-center gap-4">
        <div class="w-full bg-[#f0f0f1] flex justify-center">
            <img src="{{ asset('storage/'.$product->main_image) }}" alt="" class="w-50">
        </div>
        <div class="w-[92%] flex justify-between items-center">
            <div class=" flex items-center gap-2 text-[14px] text-[#91949a]">
                <a href="{{ route('home') }}">خانه</a>
                <span class="w-2 h-2 rotate-45 border-l-2 border-b-2 border-[#d2d3d5] "></span>
                <a href="{{ route('pages.single', [$product->page->id]) }}">{{ $product->page->title }}</a>
            </div>
            <div class="flex gap-5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5">
                    <path d="M448 112c0 44.2-35.8 80-80 80c-22.9 0-43.6-9.6-58.1-25l-151 75.5c.8 4.4 1.1 8.9 1.1 13.5s-.4 9.1-1.1 13.5l151 75.5c14.6-15.4 35.2-25 58.1-25c44.2 0 80 35.8 80 80s-35.8 80-80 80s-80-35.8-80-80c0-9.7 1.7-19 4.9-27.7L147.2 299.5c-14.3 22-39 36.5-67.2 36.5c-44.2 0-80-35.8-80-80s35.8-80 80-80c28.2 0 52.9 14.5 67.2 36.5l145.7-72.9c-3.2-8.6-4.9-17.9-4.9-27.7c0-44.2 35.8-80 80-80s80 35.8 80 80zM80 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM416 112a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM368 448a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5">
                    <path d="M244 130.6l-12-13.5-4.2-4.7c-26-29.2-65.3-42.8-103.8-35.8c-53.3 9.7-92 56.1-92 110.3v3.5c0 32.3 13.4 63.1 37.1 85.1L253 446.8c.8 .7 1.9 1.2 3 1.2s2.2-.4 3-1.2L443 275.5c23.6-22 37-52.8 37-85.1v-3.5c0-54.2-38.7-100.6-92-110.3c-38.5-7-77.8 6.6-103.8 35.8l-4.2 4.7-12 13.5c-3 3.4-7.4 5.4-12 5.4s-8.9-2-12-5.4zm34.9-57.1C311 48.4 352.7 37.7 393.7 45.1C462.2 57.6 512 117.3 512 186.9v3.5c0 36-13.1 70.6-36.6 97.5c-3.4 3.8-6.9 7.5-10.7 11l-184 171.3c-.8 .8-1.7 1.5-2.6 2.2c-6.3 4.9-14.1 7.5-22.1 7.5c-9.2 0-18-3.5-24.8-9.7L47.2 299c-3.8-3.5-7.3-7.2-10.7-11C13.1 261 0 226.4 0 190.4v-3.5C0 117.3 49.8 57.6 118.3 45.1c40.9-7.4 82.6 3.2 114.7 28.4c6.7 5.3 13 11.1 18.7 17.6l4.2 4.7 4.2-4.7c4.2-4.7 8.6-9.1 13.3-13.1c1.8-1.5 3.6-3 5.4-4.5z"/>
                </svg>
            </div>
        </div>
        <div class=" w-[92%] flex flex-col gap-2">
            <h2 class="font-bold">{{ $product->title }}</h2>
            <p class="text-[#8a8e94] text-[13px]">{{ $product->description }}</p>
        </div>
            <div class="w-[95%] flex flex-col gap-2 mt-5 mb-10">
                <h2 class="font-bold">جدول مشخصات</h2>
                <div class="w-full">
                    @foreach (json_decode($product->attributes) as $attribute)
                        <div class="w-full flex border-b-1 border-[#e1e1e3] text-[12px] ">
                            <div class="w-4/10 flex items-center px-3 py-2 bg-[#f2f2f2] ">
                                <span class="w-full">{{ $attribute->key }}</span>
                            </div>
                            <div class="w-6/10 px-3 flex items-center py-2">
                                <span>{{ $attribute->value }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
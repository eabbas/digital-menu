@extends('client.document')
@section('title', 'فائوس')
@section('content')
    <div class="w-full flex flex-row justify-between gap-3 pt-8 pb-8 rounded-2xl">
        <div class="w-1/2  p-1 lg:p-3 text-xs  lg:text-sm h-full font-medium">
            <a href="{{route('ecomm.single', [$ecomm]) }}" class="text-sky-700">مشاهده جزئیات  فروشگاه</a>
        </div>
    </div>
    <div class="w-full pt-16 bg-[#F4F8F9]">
        <div class="pb-4 text-3xl text-center font-bold">
            <h2>{{ $ecomm->title }}</h2>
        </div>
        @if (!$ecomm->banner)
            <img src="{{ asset('storage/images/banner01.jpg') }}"
                class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="ecomm banner">
        @else
            <img src="{{asset('storage/'.$ecomm->banner) }}"
                class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="ecomm banner">
        @endif
    </div>
    <div class="w-full bg-[#F4F8F9] py-3">
        
        <div class="w-11/12 mx-auto">
            <div class="my-5">
                <h1 class="text-lg font-bold">
                    دسته بندی
                </h1>
            </div>
            <div class="flex flex-row gap-3 overflow-x-auto [&::-webkit-scrollbar]:hidden">
                
                    {{-- @dd($menu->menu_categories) --}}
                    <div class="flex flex-row gap-3 parent_menu" data-index-menu="{{ $ecomm->id }}">
                        @foreach ($ecomm->ecomm_category as $ecomm_category)
                            <div class="w-20 gap-2 bg-white rounded-lg p-2 flex flex-col items-center cursor-pointer"
                                onclick='showItems("{{ $ecomm_category->id }}")'>
                                <div class="w-full">
                                    <img class="size-10 mx-auto object-cover"
                                        src="{{ asset('storage/' . $ecomm_category->image_path) }}" alt="ecomm category image">
                                </div>
                                <div class="w-full">
                                    <h3 class="text-sm text-center font-semibold">{{ $ecomm_category->title }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
               
            </div>
        </div>


        <div class="w-11/12 mx-auto">
            <div class="my-5">
                <h2 class="text-lg font-bold">
                     محصول
                </h2>
            </div>
            <div class="flex flex-col gap-3 overflow-x-auto [&::-webkit-scrollbar]:hidden">
                
                    @foreach ($ecomm->ecomm_category as $ecomm_category)
                        @foreach ($ecomm_category->ecomm_product as $ecomm_product)
                            <div class="w-full gap-2 bg-white rounded-lg p-2 flex flex-row items-center justify-between cursor-pointer menu_category"
                                data-product-menu="{{ $ecomm_category->id }}">
                                <div class="flex flex-row items-center gap-3">
                                    <div class="w-full">
                                        <div class="w-10">
                                            <img class="size-10 object-cover" src="{{ asset('storage/' . $ecomm_product->image_path) }}"
                                                alt="menu product image">
                                        </div>
                                    </div>
                                    <div class="w-full flex flex-col gap-2 items-start">
                                        <h3 class="text-sm text-center font-semibold">{{ $ecomm_product->title }}</h3>
                                        <div class="flex flex-row items-end gap-2">
                                            <span
                                                class="font-bold text-xs @if ($ecomm_product->discount) {{ 'line-through font-normal text-gray-400' }} @endif">{{ $ecomm_product->price }}</span>
                                            @if ($ecomm_product->discount)
                                                <span class="font-bold text-xs">{{ $ecomm_product->discount }}</span>
                                            @endif
                                            <span class="text-xs text-gray-400">تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div>دکمه ثبت سفارش</div>
                            </div>
                        @endforeach
                    @endforeach
                
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
@endsection

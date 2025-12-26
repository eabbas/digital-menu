@extends('client.document')
@section('title', 'فائوس')
@section('content')
    <div class="w-full flex flex-row justify-between gap-3 pt-8 pb-8 rounded-2xl">
        <div class="w-1/2  p-1 lg:p-3 text-xs  lg:text-sm h-full font-medium">
            <a href="{{ route('show_career', [$career]) }}" class="text-sky-700">مشاهده جزئیات کسب وکار</a>
        </div>
    </div>
    <div class="w-full pt-16 bg-[#F4F8F9]">
        <div class="pb-4 text-3xl text-center font-bold">
            <h2>{{ $career->title }}</h2>
        </div>
        @if (!$career->banner)
            <img src="{{ asset('storage/images/banner01.jpg') }}"
                class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="career banner">
        @else
            <img src="{{ asset('storage/' . $career->banner) }}"
                class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="career banner">
        @endif
    </div>
    <div class="w-full bg-[#F4F8F9] py-3">
        <div class="w-11/12 flex flex-row items-center gap-3 pb-3 mx-auto overflow-x-auto [&::-webkit-scrollbar]:hidden">
            @foreach ($career->menus as $menu)
                <div class="cursor-pointer" title="{{ $menu->title }}">
                    <div class="w-20 gap-2 bg-white rounded-lg p-2 flex flex-col items-center"
                        onclick='showMenu("{{ $menu->id }}")'>
                        <img class="size-10" src="{{ asset('storage/' . $menu->banner) }}" alt="menu image">
                        <span
                            class="block w-full title_category_icon text-center truncate text-xs">{{ $menu->title }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-11/12 mx-auto">
            <div class="my-5">
                <h1 class="text-lg font-bold">
                    دسته بندی
                </h1>
            </div>
            <div class="flex flex-row gap-3 overflow-x-auto [&::-webkit-scrollbar]:hidden">
                @foreach ($career->menus as $menu)
                    {{-- @dd($menu->menu_categories) --}}
                    <div class="flex flex-row gap-3 parent_menu" data-index-menu="{{ $menu->id }}">
                        @foreach ($menu->menu_categories as $category)
                            <div class="w-20 gap-2 bg-white rounded-lg p-2 flex flex-col items-center cursor-pointer"
                                onclick='showItems("{{ $category->id }}")'>
                                <div class="w-full">
                                    <img class="size-10 mx-auto object-cover"
                                        src="{{ asset('storage/' . $category->image) }}" alt="menu category image">
                                </div>
                                <div class="w-full">
                                    <h3 class="text-sm text-center font-bold">{{ $category->title }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>


        <div class="w-11/12 mx-auto">
            <div class="my-5">
                <h2 class="text-lg font-bold">
                    آیتم ها
                </h2>
            </div>
            <div class="flex flex-col gap-3 overflow-x-auto [&::-webkit-scrollbar]:hidden">
                @foreach ($career->menus as $menu)
                    @foreach ($menu->menu_categories as $category)
                        @foreach ($category->menu_items as $item)
                            <div class="w-full gap-2 bg-white rounded-lg p-2 flex flex-row items-center justify-between cursor-pointer menu_category"
                                data-item-menu="{{ $category->id }}">
                                <div class="flex flex-row items-center gap-3">
                                    <div class="w-full">
                                        <div class="w-10">
                                            <img class="size-10 object-cover" src="{{ asset('storage/' . $item->image) }}"
                                                alt="menu item image">
                                        </div>
                                    </div>
                                    <div class="w-full flex flex-col gap-2 items-start">
                                        <h3 class="text-sm text-center font-bold">{{ $item->title }}</h3>
                                        <div class="flex flex-row items-end gap-2">
                                            <span
                                                class="font-bold text-xs @if ($item->discount) {{ 'line-through font-normal text-gray-400' }} @endif">{{ $item->price }}</span>
                                            @if ($item->discount)
                                                <span class="font-bold text-xs">{{ $item->discount }}</span>
                                            @endif
                                            <span class="text-xs text-gray-400">تومان</span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div>دکمه ثبت سفارش</div> --}}
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
@endsection

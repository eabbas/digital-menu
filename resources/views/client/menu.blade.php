@extends('client.document')
@section('title', 'فائوس')
@section('content')
    <div class="w-full flex flex-row justify-between gap-3 py-3 lg:py-8 rounded-2xl">
        <div class="w-1/2  p-1 lg:p-3 text-xs  lg:text-sm h-full font-medium">
            <a href="{{ route('show_career', [$career]) }}" class="text-sky-700">مشاهده جزئیات کسب وکار</a>
        </div>
    </div>
    <div class="w-full pt-4 lg:pt-16 bg-[#F4F8F9]">
        <div class="pb-4 text-lg lg:text-3xl text-center font-bold">
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
        <h3 class="w-11/12 mx-auto py-3 text-base font-bold lg:text-md">منو های {{ $career->title }}</h3>
        <div class="w-11/12 flex flex-row items-center gap-3 pb-3 mx-auto overflow-x-auto [&::-webkit-scrollbar]:hidden">
            @foreach ($career->menus as $menu)
                <div class="cursor-pointer rounded-lg menuParent bg-white" title="{{ $menu->title }}" onclick='showMenu(this, "{{ $menu->id }}")'>
                    <div class="w-20 gap-2 p-2 flex flex-col items-center">
                        <img class="size-10" src="{{ asset('storage/' . $menu->banner) }}" alt="menu image">
                        <span
                            class="block w-full title_category_icon text-center truncate text-xs">{{ $menu->title }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @foreach ($career->menus as $menu)
        <div class="flex flex-col gap-3 mt-3 menus" data-menu-id="{{ $menu->id }}">
            @foreach ($menu->menu_categories as $category)
                @if (count($category->menu_items))
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <!-- Category Header -->
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-2.5 lg:p-5 border-b border-gray-100 bg-gray-200">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $category->image) }}" 
                                        alt="{{ $category->title }}"
                                        class="size-12 lg:size-14 rounded-lg object-cover border border-gray-200 shadow-sm bg-white">
                                <div>
                                    <h2 class="lg:text-xl font-bold text-gray-800">{{ $category->title }}</h2>
                                    <p class="text-xs lg:text-sm text-gray-500 mt-1">{{ count($category->menu_items) }} آیتم</p>
                                </div>
                            </div>
                        </div>

                        <!-- Items List -->
                        <div class="p-2 lg:p-4">
                        
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 pr-8 lg:pr-0">
                                    @foreach ($category->menu_items as $item)
                                        <div class="w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative">
                                            @if ($item->discount)
                                                <span class="text-xs text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">
                                                    {{ $item->percent }}%
                                                </span>
                                            @endif
                                            <div class="w-full flex items-center justify-between">
                                                <div class="w-full flex items-center gap-4 flex-1">
                                                    <img src="{{ asset('storage/' . $item->image) }}" 
                                                            class="size-10 lg:size-12 rounded-lg object-cover border border-gray-300"
                                                            alt="{{ $item->title }}">
                                                    <div class="flex-1 min-w-0 max-w-[100px]">
                                                        <h3 class="font-medium text-gray-800 truncate text-sm lg:text-base">{{ $item->title }}</h3>
                                                        <p class="text-sm text-gray-500 truncate mt-1 lg:text-sm">{{ $item->description }}</p>
                                                    </div>
                                                </div>
                                                @if (!$item->discount)
                                                <div class="text-left lg:ml-4">
                                                    <span class="font-bold text-green-600 text-xs lg:text-sm">{{ number_format($item->price) }} تومان</span>
                                                </div>
                                                @else
                                                <div class="text-left lg:ml-4 flex flex-col items-end">
                                                    <span class="font-bold text-green-600 text-xs lg:text-sm">{{ number_format($item->discount) }} تومان</span>
                                                    <span class="text-gray-400 text-[10px] line-through lg:text-sm">{{ number_format($item->price) }} تومان</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach

    <br><br><br><br><br><br><br>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
@endsection

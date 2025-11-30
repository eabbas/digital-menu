    @extends('admin.app.panel')
    @section('title', 'مشاهده منو')
    @section('content')
    <div class="2xl:container mx-auto w-full">
        <div class="w-full pt-16">
            @if(!$career->banner)
            <img src="{{ asset('storage/images/banner01.jpg') }}" class="w-11/12 h-[120px] sm:h-[180px] lg:h-[260px] mx-auto rounded-md object-cover" alt="career banner">
            @else
            <img src="{{ asset('storage/'.$career->banner) }}" class="w-11/12 h-[120px] sm:h-[180px] lg:h-[260px] mx-auto rounded-md object-cover" alt="career banner">
            @endif
        </div>
        <div class="w-full py-5 mt-5 rounded-[10px]">
            <div class="flex flex-row-reverse justify-between">
                <div class="flex flex-row items-center gap-1">
                    <a href="{{ route('career.qr_codes', [$career->id]) }}" class="bg-[#03A9F4] text-white border border-gray-300 rounded-md p-2 text-sm">مشاهده QR کد ها</a>
                </div>
                <h1 class="font-bold py-5 text-gray-500 lg:text-2xl md:text-xl ">
                    لیست منوی  {{ $career->title }}
                </h1>
            </div>
            <div class="w-full flex flex-col gap-3 p-3 border border-gray-300 rounded-lg">
                @foreach($career->menu_categories as $category)
   
                <div class="w-full lg:w-10/12 m-auto">
                    <div class="flex flex-row justify-between items-center">
                        <div class="flex flex-row items-end mb-3 gap-5">
                            <img src="{{ asset('storage/'.$category->image) }}" alt="menu image" class="size-12 rounded-[5px]">
                            <h2 class="text-xl font-semibold text-gray-600">{{ $category->title }}</h2>
                        </div>
                        <a href="{{ route('menuCat.edit', [$category->id]) }}" class="bg-[#03A9F4] text-white border border-gray-300 rounded-md p-2 text-sm">ویرایش</a>
                    </div>
                    <div class="w-full flex flex-col overflow-x-auto scroll-snap-x snap-mandatory gap-3 px-1 py-2 no-scrollbar ">
                        @foreach($category->menu_items as $item)
                        <div class="flex flex-row justify-between items-center bg-gray-300 px-5 rounded-md">
                            <div class="shrink-0 snap-center grid grid-cols-4 gap-4">
                                <div class="py-1">
                                    <img src="{{ asset('storage/'.$item->image) }}" class="size-10 rounded-[5px]" alt="item_image">
                                </div>
                                <div class="snap-center text-xs lg:text-base py-1 text-gray-600 flex flex-row justify-center items-center border border-gray-400 rounded-[7px] p-3">{{ $item->title }}</div>
                                <div class="shrink-0 text-xs lg:text-base snap-center py-1 text-gray-600 flex flex-row justify-center items-center border border-gray-400 rounded-[7px] p-3">{{ $item->price }}</div>
                                <div class="shrink-0 text-xs lg:text-base snap-center py-1 text-gray-600 flex flex-row justify-center items-center border border-gray-400 rounded-[7px] p-3">{{ $item->description }}</div>
                            </div>
                            <a href="{{ route('menu.edit', [$item->id]) }}" class="bg-[#03A9F4] text-white border border-gray-300 rounded-md p-2 text-sm">ویرایش منو</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection

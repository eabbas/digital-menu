    @extends('admin.app.panel')
    @section('title', 'مشاهده منو')
    @section('content')
    <div class="2xl:container mx-auto w-full">
        <div class="w-full py-5 mt-5 rounded-[10px]">
            <div class="flex flex-row-reverse justify-between">
                <div class="flex flex-row items-center gap-1">
                    <a href="{{ route('menu.qr_codes', [$career->menu]) }}" class="bg-[#03A9F4] text-white border border-gray-300 rounded-[6px] p-2 text-sm">مشاهده QR کد ها</a>
                    <a href="{{ route('menu.edit', [$career->menu]) }}" class="bg-[#03A9F4] text-white border border-gray-300 rounded-[6px] p-2 text-sm">ویرایش منو</a>
                </div>
                <h1 class="font-bold py-5 text-gray-500 lg:text-2xl md:text-xl ">
                    لیست منوی {{ $career->title }}
                </h1>
            </div>
            <div class="w-full flex flex-col gap-3 p-3 border border-gray-300 rounded-lg">
                @foreach(json_decode($career->menu->menu_data) as $data)
   
                <div class="w-full lg:w-10/12 m-auto">
                    <div class="flex flex-row items-end mb-3 gap-5">
                        <img src="{{ asset('storage/'.$data->menu_image) }}" alt="menu image" class="size-12 rounded-[5px]">
                        <h2 class="text-xl font-semibold text-gray-600">{{ $data->name }}</h2>
                    </div>
                    <div class="w-full flex flex-col overflow-x-auto scroll-snap-x snap-mandatory gap-3 px-1 py-2 no-scrollbar ">
                        @foreach($data->values as $value)
                        <div class="flex-shrink-0 snap-center lg:pr-5 grid grid-cols-4 gap-4">
                            <div class="snap-center text-xs lg:text-base py-1 text-gray-600 flex flex-row justify-center items-center border border-gray-400 rounded-[7px] p-3">{{ $value->title }}</div>
                            <div class="flex-shrink-0 text-xs lg:text-base snap-center py-1 text-gray-600 flex flex-row justify-center items-center border border-gray-400 rounded-[7px] p-3">{{ $value->price }}</div>
                            <div class="flex-shrink-0 text-xs lg:text-base snap-center py-1 text-gray-600 flex flex-row justify-center items-center border border-gray-400 rounded-[7px] p-3">{{ $value->description }}</div>
                            <div class="py-1">
                                <img src="{{ asset('storage/'.$value->gallery) }}" class="size-10 rounded-[5px]" alt="item_image">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection

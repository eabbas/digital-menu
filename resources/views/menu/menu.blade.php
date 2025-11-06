    @extends('user.panel')
    @section('title', 'مشاهده منو')
    @section('content')
    <div class="2xl:container mx-auto w-10/12">
        <div class="w-full p-5 border border-gray-400 mt-5 rounded-3xl relative">
            <a href="{{ route('menu.qr_codes', [$career->menu]) }}" class="absolute top-10 left-36 p-2 border border-gray-300 rounded">مشاهده QR کد ها</a>
            <a href="{{ route('menu.edit', [$career->menu]) }}" class="absolute top-10 left-10 p-2 border border-gray-300 rounded">ویرایش منو</a>
            <h1 class="text-center text-3xl font-bold py-5 text-gray-700">
                لیست منوی {{ $career->title }}
            </h1>
            <div class="w-full flex flex-col gap-3 p-3 border border-gray-300 rounded-lg">
                @foreach(json_decode($career->menu->menu_data) as $data)
                <div class="w-10/12 m-auto">
                    <div class="flex flex-row items-end mb-3 gap-5">
                        <img src="{{ asset('storage/'.$data->menu_image) }}" alt="menu image" class="size-10">
                        <h2 class="text-xl font-semibold text-gray-600 border-b border-black">{{ $data->name }}</h2>
                    </div>
                    <div class="w-full flex flex-col gap-3">
                        @foreach($data->values as $value)
                        <div class="pr-5 grid grid-cols-4 gap-5">
                            <div class="py-1 border border-red-500 rounded-lg p-3">{{ $value->title }}</div>
                            <div class="py-1 border border-red-500 rounded-lg p-3">{{ $value->price }}</div>
                            <div class="py-1 border border-red-500 rounded-lg p-3">{{ $value->description }}</div>
                            <div class="py-1 p-3">
                                <img src="{{ asset('storage/'.$value->gallery) }}" class="size-10" alt="item_image">
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

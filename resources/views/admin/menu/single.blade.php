@extends('admin.app.panel')
@section('title')
    منو {{ $menu->title }}
@endsection
@section('content')
    
    <div class="w-full pb-10 pt-16 bg-[#F4F8F9]">
        <div class="w-11/12 mx-auto">
            <div class="pb-4 text-3xl text-center font-bold">
                <h2>{{ $menu->title }}</h2>
            </div>
            <div class="pb-4 text-xl text-gray-700 text-center font-bold">
                <h3>{{ $menu->subtitle }}</h3>
            </div>
            <div class="pb-4 text-sm text-gray-700 flex flex-row items-center gap-3 font-bold">
                <span>تعداد QR کد ها:</span>
                <span>{{ $menu->qr_num }}</span>
            </div>
        </div>
        <div>
            @if (!$menu->banner)
                <img src="{{ asset('storage/images/banner01.jpg') }}"
                    class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="menu banner">
            @else
                <img src="{{ asset('storage/' . $menu->banner) }}"
                    class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="menu banner">
            @endif
        </div>
        <div class="w-11/12 mx-auto flex flex-row items-center justify-end gap-3 mt-5">
            <div>
                <a href="{{ route('menu.showMenu', [$menu]) }}" class="text-sm px-5 py-2 bg-sky-500 text-white transition-all duration-150 hover:bg-sky-600 rounded-sm">مشاهده لیست منو</a>
            </div>
            <div>
                <a href="{{ route('menu.qrcodes', [$menu]) }}" class="text-sm px-5 py-2 bg-sky-500 text-white transition-all duration-150 hover:bg-sky-600 rounded-sm">مشاهده QR کد ها</a>
            </div>
            <div>
                <a href="{{ route('menuCat.create', [$menu]) }}" class="text-sm px-5 py-2 bg-green-500 text-white transition-all duration-150 hover:bg-green-600 rounded-sm">ایجاد دسته</a>
            </div>
            @if (count($menu->menu_categories))
            <div>
                <a href="{{ route('menuCat.list', [$menu]) }}" class="text-sm px-5 py-2 bg-green-500 text-white transition-all duration-150 hover:bg-green-600 rounded-sm">مشاهده دسته ها</a>
            </div>
            @endif
            <div>
                <a href="{{ route('menu.edit', [$menu]) }}" class="text-sm px-5 py-2 bg-sky-500 text-white transition-all duration-150 hover:bg-sky-600 rounded-sm">ویرایش</a>
            </div>
            <div>
                <a href="{{ route('menu.delete', [$menu]) }}" class="text-sm px-5 py-2 bg-red-500 text-white transition-all duration-150 hover:bg-red-600 rounded-sm">حذف</a>
            </div>
        </div>
    </div>
@endsection

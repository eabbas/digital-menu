@extends('admin.app.panel')
@section('title')
    ایجاد نوع منو {{ $item->title }}
@endsection

@section('content')
    <form action="{{ route('menuItem.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                <div class="text-center mb-4">
                    <h1 class="text-2xl font-bold text-gray-800">ایجاد نوع های آیتم {{ $item->title }}</h1>
                    <div class="w-full flex flex-col gap-3 my-4">
                        <input type="hidden" name="menu_categories_id" value="{{ $item->menu_category->id }}">
                        <input type="hidden" name="parent_id" value="{{ $item->id }}">
                        <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-32 text-sm mb-1 mt-2.5 flex">عنوان آیتم:</label>
                            <div class="p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="w-full focus:outline-none text-sm font-bold mr-2" type="text" name='title' placeholder="عنوان" value="{{ $item->title }}">
                            </div>
                        </div>
                        <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-32 text-sm mb-1 mt-2.5 flex">تصویر آیتم:</label>
                            <div class="p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="w-full focus:outline-none text-sm font-bold mr-2" type="file" name='image'>
                            </div>
                        </div>
                        <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-32 text-sm mb-1 mt-2.5 flex">توضیحات:</label>
                            <div class="p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="w-full focus:outline-none text-sm font-bold mr-2" type="text" name='description' placeholder="توضیحات">
                            </div>
                        </div>
                        <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-32 text-sm mb-1 mt-2.5 flex">قیمت:</label>
                            <div class="p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="w-full focus:outline-none text-sm font-bold mr-2" type="number" name='price' placeholder="10000">
                            </div>
                        </div>
                        <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-32 text-sm mb-1 mt-2.5 flex">تخفیف:</label>
                            <div class="p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="w-full focus:outline-none text-sm font-bold mr-2" type="number" name='discount' placeholder="2000">
                            </div>
                        </div>
                        <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-32 text-sm mb-1 mt-2.5 flex">زمان تقریبی پخت:</label>
                            <div class="p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="w-full focus:outline-none text-sm font-bold mr-2" type="number" name='duration' placeholder="دقیقه">
                            </div>
                        </div>
                        <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <div class="w-32 flex items-center justify-center">
                                <input class="size-4 focus:outline-none text-sm font-bold cursor-pointer" type="checkbox" name='customizable' value="1">
                            </div>
                            <label class="text-sm mb-1 mt-2.5 flex">قابلیت شخصی سازی دارد:</label>
                        </div>
                    </div>
                    <div class="w-full p-3 bg-gray-100 rounded-lg">
                        <div class="flex flex-col" id="ingredients"></div>
                        <div class="text-end">
                            <button type="button" onclick="addIngre()" class="px-5 py-1 bg-sky-500 hover:bg-blue-500 text-white rounded-lg cursor-pointer">افزودن مواد+</button>
                        </div>
                    </div>
                    <div class="w-full text-left">
                        <button type="submit" class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            ارسال اطلاعات
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        let count = 0
    </script>
    <script src="{{ asset('assets/js/menuItem.js') }}"></script>
@endsection

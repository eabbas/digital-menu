 @extends('admin.app.panel')
    @section('title', 'درباره ما')
    @section('content')
        <div class="w-full">
            <div class="my-10">
                <h1 class="lg:text-3xl md:text-2xl text-md font-semibold text-center text-gray-700">لیست درباره ما</h1>
            </div>
            <div class="overflow-x-auto">
                <div class="w-[890px] xl:w-full mx-auto">
                    <ul class="grid grid-cols-8 gap-3 md:gap-5 lg:gap-10 text-center text-gray-700 font-semibold xl:text-lg border-b-2 border-gray-400 pb-3 mb-3">
                        <li class="w-full">آیدی</li>
                        <li class="w-full">نام</li>
                        <li class="w-full col-span-3">توضیحات</li>
                        <li class="w-full col-span-2">دکمه ها</li>
                    </ul>
                </div>
                @foreach($allAboutUs as $aboutUs)
                <div class="w-[890px] xl:w-full mx-auto">
                    <ul class="grid grid-cols-8 gap-3 md:gap-5 xl:gap-10 text-center text-gray-700 font-medium text-sm md:text-base border-b border-gray-400 pb-5 my-5">
                        <li class="w-full"> {{$aboutUs -> id}}</li>
                        <li class="w-full"> {{$aboutUs -> title}}</li>
                        <li class="w-full col-span-3"> {{$aboutUs -> description}}</li>
                        <li class="w-full col-span-2 grid grid-cols-2 gap-3 xl:gap-5">
                            <div class="w-full">
                                <a href="{{ route('aboutUs.create_edit',[$aboutUs->id])}}" class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-teal-500 hover:text-white hover:border-teal-500">ویرایش</a>
                            </div>
                            <div class="w-full">
                                <a href="{{ route('aboutUs.delete', [$aboutUs])}}" class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-teal-500 hover:text-white hover:border-teal-500">حذف</a>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
@endsection
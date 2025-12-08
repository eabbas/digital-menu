 @extends('admin.app.panel')
    @section('title', 'همه شبکه های اجتماعی')
    @section('content')
    
        <div class="w-full">
            <div class="my-10">
                <h1 class="lg:text-3xl md:text-2xl text-md font-semibold text-center text-gray-700">لیست شبکه های اجتماعی</h1>
            </div>
            <div class="overflow-x-auto">

                <div class="w-[890px] xl:w-full mx-auto">
                    <ul class="grid grid-cols-8 gap-3 md:gap-5 lg:gap-10 text-center text-gray-700 font-semibold xl:text-lg border-b-2 border-gray-400 pb-3 mb-3">
                        <li class="w-full">آیدی</li>
                        <li class="w-full">نام</li>
                        <li class="w-full">لینک</li>
                        <li class="w-full">عکس</li>
                        <li class="w-full col-span-2">دکمه ها</li>
                    </ul>
                </div>



                @foreach($socialMedias as $socialMedia)

                <div class="w-[890px] xl:w-full mx-auto">
                    <ul class="grid grid-cols-8 items-center gap-3 md:gap-5 xl:gap-10 text-center text-gray-700 font-medium text-sm md:text-base border-b border-gray-400 pb-5 my-5">
                        <li class="w-full"> {{$socialMedia -> id}}</li>
                        <li class="w-full"> {{$socialMedia -> title}}</li>
                        <li class="w-full"> {{$socialMedia -> link}}</li>
                        <li class="w-full"> <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">
                                <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover" src="<?= asset("storage/" . $socialMedia->icon_path) ?>">
                            </div></li>
                         
                        <li class="w-full col-span-4 grid grid-cols-5 gap-3 xl:gap-5">
                            <div class="w-full">
                                <a href="{{ route('socialMedia.edit', [$socialMedia])}}" class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-teal-500 hover:text-white hover:border-teal-500">ویرایش</a>
                            </div>
                            <div class="w-full">
                                <a href="{{ route('socialMedia.delete', [$socialMedia])}}" class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-teal-500 hover:text-white hover:border-teal-500">حذف</a>
                            </div>
                        </li>
                    </ul>
                </div>

                @endforeach

            </div>
        </div>
@endsection
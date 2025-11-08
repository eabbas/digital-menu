@extends('user.panel')
@section('title', 'لیست ارتباط با ما')
@section('content')
          <div class="my-10">
                <h1 class="lg:text-3xl md:text-2xl text-md font-semibold text-center text-gray-700"> لیست</h1>
            </div>
            <div class="my-10">
                <h1 class="lg:text-3xl md:text-2xl text-md font-semibold text-center text-gray-700">لیست ارتباط با ما</h1>
            </div>
            <div class="overflow-x-auto">

                <div class="w-[890px] xl:w-full mx-auto">
                    <ul class="grid grid-cols-7 gap-3 md:gap-5 lg:gap-10 text-center text-gray-700 font-semibold xl:text-lg border-b-2 border-gray-400 pb-3 mb-3">
                        <li class="w-full">آیدی</li>
                        <li class="w-full">نام</li>
                        <li class="w-full">شماره تلفن</li>
                        <li class="w-full col-span-2">دکمه ها</li>
                    </ul>
                </div>



                @foreach($contactuses as $contactus)

                <div class="w-[890px] xl:w-full mx-auto">
                    <ul class="grid grid-cols-7 gap-3 md:gap-5 xl:gap-10 text-center text-gray-700 font-medium text-sm md:text-base border-b border-gray-400 pb-5 my-5">
                        <li class="w-full"> {{$contactus-> id}}</li>
                        <li class="w-full"> {{$contactus-> name}}</li>
                        <li class="w-full"> {{$contactus->phone}}</li>
                        <li class="w-full col-span-2 grid grid-cols-4 gap-3 xl:gap-5">
                            <div class="w-full">
                            </div>
                            <div class="w-full">
                                <a href="{{ route('contactus.edit',[$contactus->id]) }}" class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-teal-500 hover:text-white hover:border-teal-500">ویرایش</a>
                            </div>
                            <div class="w-full">
                                <a href="{{ route('contactus.show',[$contactus->id]) }}" class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-teal-500 hover:text-white hover:border-teal-500">مشاهده</a>
                            </div>
                            <div class="w-full">
                                <a href="{{ route('contactus.delete',[$contactus->id]) }}" class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-rose-500 hover:text-white hover:border-rose-500">حذف</a>
                            </div>
                           
                          
                        </li>
                    </ul>
                </div>

                @endforeach

            </div>
        </div>
    </section>
</body>

</html>
@extends('user.panel')
@section('title', 'مشاهده ارتباط با ما')
@section('content')
          <div class="my-10">
                <h1 class="lg:text-3xl md:text-2xl text-md font-semibold text-center text-gray-700"> </h1>
            </div>
            <div class="my-10">
                <h1 class="lg:text-3xl md:text-2xl text-md font-semibold text-center text-gray-700"> ارتباط با ما مشاهده</h1>
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




                <div class="w-[890px] xl:w-full mx-auto">
                    <ul class="grid grid-cols-7 gap-3 md:gap-5 xl:gap-10 text-center text-gray-700 font-medium text-sm md:text-base border-b border-gray-400 pb-5 my-5">
                        <li class="w-full"> {{$contactus-> id}}</li>
                        <li class="w-full"> {{$contactus-> name}}</li>
                        <li class="w-full"> {{$contactus->family}}</li>
                        <li class="w-full"> {{$contactus->email}}</li>
                        <li class="w-full"> {{$contactus->phone}}</li>
                        <li class="w-full"> {{$contactus->description}}</li>
                        <li class="w-full col-span-2 grid grid-cols-3 gap-3 xl:gap-5">
                           
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </section>
</body>

</html>
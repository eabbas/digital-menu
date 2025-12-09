 @extends('admin.app.panel')
 @section('title', 'همه کاربران')
 @section('content')

     <div class="w-full">
         <div class="my-10">
             <h1 class="lg:text-3xl md:text-2xl text-md font-semibold text-center text-gray-700">لیست کاربران</h1>
         </div>
         <div class="overflow-x-auto" style="scrollbar-width: thin;">

             <div class="w-[890px] xl:w-full mx-auto">
                 <ul
                     class="grid grid-cols-8 gap-3 md:gap-5 lg:gap-10 text-center text-gray-700 font-semibold xl:text-lg border-b-2 border-gray-400 pb-3 mb-3">
                     <li class="w-full">آیدی</li>
                     <li class="w-full">نام</li>
                     <li class="w-full">شماره تلفن</li>
                     <li class="w-full">نوع کاربر</li>
                     <li class="w-full col-span-4">دکمه ها</li>
                 </ul>
             </div>



             @foreach ($users as $user)
                 <div class="w-[890px] xl:w-full mx-auto">
                     <ul
                         class="grid grid-cols-8 gap-3 md:gap-5 xl:gap-10 text-center text-gray-700 font-medium text-sm md:text-base border-b border-gray-400 pb-5 my-5">
                         <li class="w-full"> {{ $user->id }}</li>
                         <li class="w-full"> {{ $user->name }} {{ $user->family }}</li>
                         <li class="w-full"> {{ $user->phoneNumber }}</li>
                         <li class="w-full"> {{ $user->role[0]->title }}</li>
                         <li class="w-full col-span-4 grid grid-cols-5 gap-3 xl:gap-5">
                             <div class="w-full">
                                 <a href="{{ route('user.show', [$user->id]) }}"
                                     class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-gray-400 hover:text-white">نمایش</a>
                             </div>
                             <div class="w-full">
                                 <a href="{{ route('user.edit', [$user->id]) }}"
                                     class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-teal-500 hover:text-white hover:border-teal-500">ویرایش</a>
                             </div>
                             <div class="w-full">
                                 <a href="{{ route('user.delete', [$user->id]) }}"
                                     class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-rose-500 hover:text-white hover:border-rose-500">حذف</a>
                             </div>
                             <div class="w-full col-span-2">
                                 <a href="{{ route('career.careers', [$user->id]) }}"
                                     class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-teal-500 hover:text-white hover:border-teal-500">مشاهده
                                     کسب وکار</a>
                             </div>
                             {{-- <div class="w-full col-span-2">
                                <a href="{{ route('career.create', [$user->id]) }}" class="px-3 xl:px-5 py-1 border border-gray-300 rounded-md transition-all duration-150 hover:bg-teal-500 hover:text-white hover:border-teal-500">ایجاد کسب وکار</a>
                            </div> --}}
                         </li>
                     </ul>
                 </div>
             @endforeach

         </div>
     </div>
 @endsection

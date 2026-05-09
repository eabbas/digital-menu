@extends('admin.app.panel')
@section('title', 'نمایش رشته')

@section('content')

<div class="w-full flex flex-col pb-6">
    <div class="bg-white rounded-lg">
        <h2 class="text-lg font-bold text-gray-800 p-4 text-center">
         اطلاعات رشته
        </h2>

        {{--  هدر --}}
        <div class="w-11/12 mx-auto mt-6">
            <div class="bg-gray-50 border rounded-xl p-6 shadow-sm">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col justify-end gap-2">
         
                         <h1 class="text-2xl font-bold text-gray-600">
                              رشته {{ $field->title }}
                         </h1>
                          {{-- آموزشگاه --}}
                              <a href="{{ route('institute.single', [$field->institute->id]) }}"> 
                                  <span class="text-xs text-white bg-purple-500 px-3 py-1 rounded-full opacity-80">
                                     آموزشگاه {{ $field->institute->title }}  
                                  </span>
                              </a>
                       </div>
                       
                       {{-- ایجاد درس --}}
                       <div class="flex items-center gap-3">
                           <a href="{{ route('lesson.create' ,[$field->institute , $field]) }}"
                                 class="px-5 py-1 rounded-sm bg-blue-500 hover:bg-blue-600 text-white text-xs lg:text-base">ایجاد 
                             درس </a>
                           <a href="{{ route('field.lesson_list' ,[$field]) }}"
                                 class="px-5 py-1 rounded-sm bg-blue-500 hover:bg-blue-600 text-white text-xs lg:text-base">لیست 
                             دروس </a>
                       </div>
                    </div>        
               </div>
        </div>
        {{--  تصویر  --}}
        <div class="relative rounded-xl overflow-hidden shadow-lg w-11/12 mx-auto mt-6">

            <div class="absolute inset-0 bg-gradient-to-l from-slate-900/70 to-slate-800/40 z-10"></div>

            <img src="{{ asset('storage/'.$field->image) }}"
                 class="w-full h-[260px] object-cover">
                <div class="absolute inset-0 z-10 flex items-start justify-end p-3">
                    <a href="{{route('field.edit',[$field])}}" class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer" title="ویرایش">
                       <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                            viewBox="0 0 512 512">
                            <path 
                             d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z" />
                       </svg>
                    </a>
                </div>
        </div>
        {{--  توضیحات --}}
        <div class="w-11/12 mx-auto mt-6">
            <div class="bg-gray-50 border rounded-xl p-6 shadow-sm">

                <label class="text-xs text-gray-500">
                    توضیحات رشته
                </label>

                <div class="mt-3 text-sm leading-7 text-gray-700">
                    {!! $field->description !!}
                </div>

            </div>
        </div>
        {{-- دکمه بازگشت --}}
        {{-- <div class="w-11/12 mx-auto pb-6 flex justify-end mt-3">
            <a href="{{ route('institute.field_list' , [$field->institute]) }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded">
                بازگشت
            </a>
        </div> --}}

    </div>
</div>

@endsection
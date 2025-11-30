@extends('admin.app.panel')
@section('title')
    {{ $item->title }}
@endsection
@section('content')
  <div class="w-full">
            <div class="pb-5 w-full">
                {{-- <h1 class="text-xl text-center lg:text-start">اکانت من</h1>
                <div
                    class="flex flex-row justify-center lg:justify-start items-center gap-2 text-[#99A1B7] text-[11px] lg:text-sm">
                    <a href="{{ route('home') }}" class="p-2">خانه</a>
                    <span>/</span>
                    <a href="{{ route('user.profile', [$user]) }}">اکانت من</a>
                </div> --}}
            </div>

            <div class="flex flex-col border-none rounded-[7px]">
                <div class="block lg:flex flex-row justify-between gap-8">
                    <div class="flex flex-col xm:flex-row lg:flex-row gap-5 py-3">
                        @if (!$item->image)
                            <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0"
                                src="{{ asset('assets/img/user.png') }}" alt="user__avatar">
                        @else
                            <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0"
                                src="{{ asset('storage/' . $item->image) }}" alt="user__picture">
                        @endif
                        <div class="flex flex-col justify-end">
                            <div class="div1 text-center lg:text-start">
                                @if ($item->customizable)
                                    <a class="p-2.5 text-gary-600 bg-gray-100 rounded-lg hover:bg-gray-200" href="#">{{ $item->title }} خودتو بساز</a>
                                @endif
                            </div>
                           
                           
                        </div>
                    </div>
                </div>

            </div>

            <div class="pt-3 mt-4 lg:mt-8">

                <div class="shadow__profaill__karbary rounded-md lg:p-5 p-2 mb-3 lg:mb-5">
                    <h1 class="lg:text-xl mt-5 font-bold mx-2">
                        جزئیات {{ $item->title }} 
                    </h1>

                    <div class="w-full h-px bg-gray-200 my-5 "></div>
                    <div class="flex gap-7 sm:hidden">
                        <div class="flex w-full flex-col">
                            <label class="p-2.5 text-gray-400">توضیحات</label>
                            <span class="p-2.5 text-gary-600">{{ $item->description }}</span>
                            <label class="p-2.5 text-gray-400">قیمت</label>
                            <span class="p-2.5 text-gary-600">
                                {{ $item->price }}
                            </span>
                            <label class="p-2.5 text-gray-400">تخفیف</label>
                            <span class="p-2.5 text-gary-600">{{ $item->discount }}</span>
                            <label class="p-2.5 text-gray-400">دسته</label>
                            <span class="p-2.5 text-gary-600">{{ $item->menu_category->title }}</span>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-2 sm:gap-2 hidden">
                        <div class="flex w-full flex-col">
                            <label class="p-2.5 text-gray-400">توضیحات</label>
                            <label class="p-2.5 text-gray-400">قیمت</label>
                            <label class="p-2.5 text-gray-400">تخفیف</label>
                            <label class="p-2.5 text-gray-400">دسته</label>
                            
                        </div>
                        <div class="flex w-full flex-col">
                            <span class="p-2.5 text-gary-600">
                                {{ $item->description }}
                            </span>
                            
                            <span class="p-2.5 text-gary-600">{{ $item->price }}</span>
                            <span class="p-2.5 text-gary-600">{{ $item->discount }}</span>
                            <span class="p-2.5 text-gary-600">{{ $item->menu_category->title }}</span>
                          
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
@extends('admin.app.panel')
@section('title', 'ویرایش منو')
@section('content')
<section class="2xl:container mx-auto">
    <div class="w-11/12 mx-auto">
        <fieldset class="border-2 rounded-[10px] border-gray-400 shadow">
            <legend class="lg:text-3xl md:text-2xl text-md font-semibold text-end text-gray-500 p-5 rounded-full">
                ویرایش اطلاعات کسب وکار
            </legend>
            <form action="{{ route('career.update')}}" method="post" enctype='multipart/form-data'
                class="w-11/12 lg:w-3/4 mx-auto py-5 rounded-lg">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 lg:gap-4">
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="title">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عنوان
                            </legend>
                            <input type="title" name="title" value="{{$career -> title}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$career -> id}}">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="logo">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">لوگو
                            </legend>
                            <input type="file" name="logo" class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="province">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">استان
                            </legend>
                            <input type="province" name="province" value="{{$career -> province}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="city">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">شهر
                            </legend>
                            <input type="city" name="city" value="{{$career -> city}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="address">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">ادرس
                            </legend>
                            <input type="address" name="address" value="{{$career -> address}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="description">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                توضیحات</legend>
                            <input type="description" name="description" value="{{$career -> description}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="email">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">ایمیل
                            </legend>
                            <input type="email" name="email" value="{{$career -> email}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="instagram">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                اینستاگرام</legend>
                            <input type="text" name="social_medias[instagram]"
                                value="{{$career ->social_media->instagram}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="telegram">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                تلگرام</legend>
                            <input type="text" name="social_medias[telegram]"
                                value="{{$career ->social_media->telegram}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="whatsapp">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                واتساپ</legend>
                            <input type="text" name="social_medias[whatsapp]"
                                value="{{$career ->social_media->whatsapp}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                </div>
                <div class="text-center md:px-12 mt-5 lg:mt-10">
                    <button
                        class="w-5/12 max-sm:bg-blue-500 max-sm:text-white px-5 py-2 lg:px-10 lg:py-3 rounded-[8px] transition-all duration-250 bg-blue-400 text-white hover:bg-blue-600 hover:border-gray-400 hover:text-white text-gray-500 cursor-pointer">ثبت</button>
                </div>
            </form>
        </fieldset>
    </div>
</section>
@endsection
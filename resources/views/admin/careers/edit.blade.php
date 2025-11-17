a@extends('admin.app.panel')
@section('title', 'ویرایش کسب و کار')
@section('content')
<section class="2xl:container mx-auto">
    <div class="w-full mx-auto pb-5">
        <fieldset class="md:border-2 rounded-[10px] md:border-gray-400 md:shadow">
            <legend class="max-md:text-center lg:text-3xl md:text-2xl text-md font-semibold text-end text-gray-500 p-5 rounded-full">
                ویرایش اطلاعات کسب وکار
            </legend>
            <form action="{{ route('career.update')}}" method="post" enctype='multipart/form-data'
                class="w-11/12 lg:w-3/4 mx-auto  rounded-lg">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-1 md:gap-3 lg:gap-4">
                    <div class="w-full flex flex-col">
                            <label class="py-1 w-full text-md">عنوان
                            </label>
                            <input type="title" name="title" value="{{$career -> title}}"
                                class="w-full px-2 py-3.5 outline-none text-gray-500 text-sm md:text-base border border-gray-400 rounded-[10px]">
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$career -> id}}">
                            <label class="py-1 w-full text-md">لوگو
                            </label>
                            <input type="file" name="logo" 
                                class="w-full px-2 py-3.5 outline-none text-gray-500 text-sm md:text-base border border-gray-400 rounded-[10px]">
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$career -> id}}">
                            <label class="py-1 w-full text-md">استان
                            </label>
                            <input type="province" name="province" value="{{$career -> province}}" 
                                class="w-full px-2 py-3.5 outline-none text-gray-500 text-sm md:text-base border border-gray-400 rounded-[10px]">
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$career -> id}}">
                            <label class="py-1 w-full text-md">شهر
                            </label>
                            <input type="city" name="city" value="{{$career -> city}}"
                                class="w-full px-2 py-3.5 outline-none text-gray-500 text-sm md:text-base border border-gray-400 rounded-[10px]">
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$career -> id}}">
                            <label class="py-1 w-full text-md">ادرس
                            </label>
                            <input type="address" name="address" value="{{$career -> address}}"
                                class="w-full px-2 py-3.5 outline-none text-gray-500 text-sm md:text-base border border-gray-400 rounded-[10px]">
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$career -> id}}">
                            <label class="py-1 w-full text-md">توضیحات
                            </label>
                            <input type="description" name="description" value="{{$career -> description}}"
                                class="w-full px-2 py-3.5 outline-none text-gray-500 text-sm md:text-base border border-gray-400 rounded-[10px]">
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$career -> id}}">
                            <label class="py-1 w-full text-md">ایمیل
                            </label>
                            <input type="email" name="email" value="{{$career -> email}}"
                                class="w-full px-2 py-3.5 outline-none text-gray-500 text-sm md:text-base border border-gray-400 rounded-[10px]">
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$career -> id}}">
                            <label class="py-1 w-full text-md">اینستاکرام
                            </label>
                            <input type="text" name="social_medias[instagram]" value="{{$career -> social_media->instagram}}"
                                class="w-full px-2 py-3.5 outline-none text-gray-500 text-sm md:text-base border border-gray-400 rounded-[10px]">
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$career -> id}}">
                            <label class="py-1 w-full text-md">تلگرام
                            </label>
                            <input type="text" name="social_medias[telegram]" value="{{$career -> social_media->telegram}}"
                                class="w-full px-2 py-3.5 outline-none text-gray-500 text-sm md:text-base border border-gray-400 rounded-[10px]">
                    </div>
                    <div class="w-full flex flex-col">
                        <input type="hidden" name="id" value="{{$career -> id}}">
                            <label class="py-1 w-full text-md">واتساپ
                            </label>
                            <input type="text" name="social_medias[whatsapp]" value="{{$career -> social_media->whatsapp}}"
                                class="w-full px-2 py-3.5 outline-none text-gray-500 text-sm md:text-base border border-gray-400 rounded-[10px]">
                    </div>
                </form>
            </div>
            <div class="w-full text-center md:px-12 my-3">
                <button
                class="w-5/12 max-sm:bg-blue-500 max-sm:text-white px-5 py-2 lg:px-10 lg:py-3 rounded-[8px] transition-all duration-250 bg-blue-400 text-white hover:bg-blue-600 hover:border-gray-400 hover:text-white text-gray-500 cursor-pointer">ثبت</button>
            </div>
        </fieldset>
</section>
@endsection
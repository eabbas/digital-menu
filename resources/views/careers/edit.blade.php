@extends('user.panel')
@section('title', 'ویرایش منو')
@section('content')
    <section class="2xl:container mx-auto">
        <div class="w-11/12 mx-auto">
            <div class="my-10">
                <h1 class="lg:text-3xl md:text-2xl text-md font-semibold text-center text-gray-700"> ویرایش اطلاعات کسب وکار</h1>
            </div>
            <form action=" {{ route('user.career.update')}} " method="post" enctype='multipart/form-data' class="w-11/12 lg:w-3/4 mx-auto p-5 rounded-lg border">
                @csrf
                <?php
                // dd($career->social_media->instagram);
                ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-5 lg:gap-10">
                    <div class="w-full flex flex-col">
                        <input type="hidden" name ="id" value ="{{$career -> id}}">
                        <label class="text-sm md:text-base" for="logo">لوگو</label>
                        <input type="file" name="logo" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="province">استان</label>
                        <input type="province" name="province"  value="{{$career -> province}}"  class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="city"> شهر </label>
                        <input type="city" name="city"  value="{{$career -> city}}"  class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="title"> عنوان </label>
                        <input type="title" name="title"  value="{{$career -> title}}"  class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="address"> ادرس </label>
                        <input type="address" name="address"  value="{{$career -> address}}"  class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="description"> توضیحات </label>
                        <input type="description" name="description"  value="{{$career -> description}}"  class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="email"> ایمیل </label>
                        <input type="email" name="email"  value="{{$career -> email}}"  class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="instagram"> اینستاگرام </label>
                        <input type="text" name="social_medias[instagram]"  value="{{$career ->social_media->instagram}}"  class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="telegram"> تلگرام </label>
                        <input type="text" name="social_medias[telegram]"  value="{{$career ->social_media->telegram}}"  class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="whatsapp"> واتساپ </label>
                        <input type="text" name="social_medias[whatsapp]"  value="{{$career ->social_media->whatsapp}}"  class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none border-b">
                    </div>
                  
                  
                   
                </div>
                <div class="md:text-left text-center md:px-12 mt-5 lg:mt-10">
                    <button class="px-5 py-2 lg:px-10 lg:py-3 border rounded-md transition-all duration-150 hover:bg-gray-400 hover:border-gray-400 hover:text-white">ثبت</button>
                </div>
            </form>
        </div>
    </section>
@endsection
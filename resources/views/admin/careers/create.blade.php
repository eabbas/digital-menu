    <style>
        input:focus{
            color:#2196F3;
        }
    </style>
    @extends('admin.app.panel')
    @section('title', 'ثبت نام کسب و کار')
    @section('content')
    {{ dd($user) }}
    <form action="{{ route('career.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                <!-- هدر -->
                <div class="text-center mb-4">
                    <h1 class="text-2xl font-bold text-gray-800">اطلاعات کسب وکار</h1>
                    <p class="text-gray-600 mt-2">اطلاعات کسب وکار خود را وارد کنید</p>
                </div class="w-full">
            <div class="md:flex md:flex-row md:w-full md:items-center md:gap-5">
                <!--  لوگو   -->
                <div class="md:flex md:flex-col md:w-full">
                        <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3" for="province">
                            <legend class="kelass p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">لوگو کسب وکار</legend>
                            <input type="file" name='logo' placeholder=" لوگو کسب وکار خود را وارد کنید" class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </fieldset>
                <!-- نام کسب وکار -->
                         <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">نام کسب وکار</legend>
                            <input type="text" name='title' placeholder="نام کسب وکار خود را وارد کنید" class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </fieldset>
                </div>
                <!--استان   -->
                <div class="md:flex md:flex-col md:w-full">
                          <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">استان</legend>
                            <input type="text" name='province' placeholder="استان خود را وارد کنید" class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </fieldset>
                <!--    شهر -->
                         <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">شهر</legend>
                            <input type="text" name='city' placeholder=" شهرخود را وارد کنید" class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </fieldset>
                </div>
            </div>
            <div class="md:flex md:flex-row md:gap-4">

                <!--  ادرس کسب وکار -->
                <div class="md:flex md:flex-col md:w-full">
                          <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">ادرس کسب وکار</legend>
                            <input type="text" name='address' placeholder=" ادرس کسب وکار خود را وارد کنید" class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </fieldset>

                <!--  qrcode -->

                <!-- ایمیل -->
                         <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">ایمیل</legend>
                            <input type="email" name='email'placeholder="email@example.com" class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </fieldset>
                <!-- توضیحات-->
                        <fieldset class=" mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">توضیحات</legend>
                            <input type="text" name='description' placeholder="توضیحات کسب وکار" class="w-full px-3 py-1 md:px-2 outline-none text-gray-500">
                        </fieldset>
                </div>
                <!-- user_name-->
                <div class="w-full">
                        <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[20px] py-1 pr-3" for="province">
                             <legend class="p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">شبکه های اجتماعی</legend>
                    <ul class="w-full px-4 py-3  mt-2">
                        <li>
                                 <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[10px] py-1 pr-3" for="province">
                            <legend class="w-20 rounded-full flex flex-row justify-center text-sm">اینستاگرام:</legend>
                            <input type="text" name='social_medias[instagram]' placeholder="آدرس شبکه های اجتماعی" class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </fieldset>
                        </li>   
                        <li>
                           
                                 <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[10px] py-1 pr-3" for="province">
                            <legend class="w-15 rounded-full flex flex-row justify-center text-sm">تلگرام:</legend>
                            <input type="text" name='social_medias[telegram]' placeholder="آدرس شبکه های اجتماعی" class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </fieldset>
                        </li>
                        <li>
                                    <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[10px] py-1 pr-3" for="province">
                            <legend class="w-17 rounded-full flex flex-row justify-center text-sm">واتساپ:</legend>
                            <input type="text" name='social_medias[whatsapp]' placeholder="آدرس شبکه های اجتماعی" class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </fieldset>
                        </li>
                    </ul>

                </div>
            </div>

                <button type="submit"
                    class="active:bg-[#0080e5] mt-2 w-full bg-[#03A9F4] text-white py-3 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                    ارسال اطلاعات
                </button>
            </div>
        </div>
         </fieldset>

    </form>
    @endsection

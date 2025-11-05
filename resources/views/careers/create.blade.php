
    @extends('user.panel')
    @section('title', 'ثبت نام کسب و کار')
    @section('content')
    <form action="{{ route('user.career.store') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <!-- <input type="hidden" name="id" value=""> -->
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-lg p-8 w-full lg:w-9/12">
                <!-- هدر -->
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">اطلاعات کسب وکار</h1>
                    <p class="text-gray-600 mt-2">اطلاعات کسب وکار خود را وارد کنید</p>
                </div>
                <!--  لوگو   -->
                <div>
                        <fieldset class="mt-4 text-sm md:text-base border-1 border-gray-400 rounded-[20px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-gray-200 rounded-full flex flex-row justify-center text-sm">لوگو کسب وکار</legend>
                            <input type="file" name='logo' placeholder=" لوگو کسب وکار خود را وارد کنید" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                </div>
                <!-- نام کسب وکار -->
                <div>
                         <fieldset class="mt-4 text-sm md:text-base border-1 border-gray-400 rounded-[20px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-gray-200 rounded-full flex flex-row justify-center text-sm">نام کسب وکار</legend>
                            <input type="text" name='title' placeholder="نام کسب وکار خود را وارد کنید" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                </div>
                <!--استان   -->
                <div>
                          <fieldset class="mt-4 text-sm md:text-base border-1 border-gray-400 rounded-[20px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-gray-200 rounded-full flex flex-row justify-center text-sm">استان</legend>
                            <input type="text" name='province' placeholder="استان خود را وارد کنید" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                </div>
                <!--    شهر -->
                <div>
                         <fieldset class="mt-4 text-sm md:text-base border-1 border-gray-400 rounded-[20px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-gray-200 rounded-full flex flex-row justify-center text-sm">شهر</legend>
                            <input type="text" name='city' placeholder=" شهرخود را وارد کنید" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                </div>
                <!--  ادرس کسب وکار -->
                <div>
                          <fieldset class="mt-4 text-sm md:text-base border-1 border-gray-400 rounded-[20px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-gray-200 rounded-full flex flex-row justify-center text-sm">ادرس کسب وکار</legend>
                            <input type="text" name='address' placeholder=" ادرس کسب وکار خود را وارد کنید" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                </div>

                <!--  qrcode -->

                <!-- ایمیل -->
                <div>
                         <fieldset class="mt-4 text-sm md:text-base border-1 border-gray-400 rounded-[20px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-gray-200 rounded-full flex flex-row justify-center text-sm">ایمیل</legend>
                            <input type="email" name='email'placeholder="email@example.com" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                </div>
                <!-- توضیحات-->
                <div>
                        <fieldset class="mt-4 text-sm md:text-base border-1 border-gray-400 rounded-[20px] py-1 pr-3" for="province">
                            <legend class="p-1 w-30 bg-gray-200 rounded-full flex flex-row justify-center text-sm">توضیحات</legend>
                            <input type="text" name='description' placeholder="توضیحات کسب وکار" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                </div>
                <!-- user_name-->
                <!-- <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">نام کاربری</label>
                    <input 
                        type="text"
                        name='user_name' 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="user_name "
                    >
                </div> -->

                <div class="">
                        <fieldset class="mt-4 text-sm md:text-base border-1 border-gray-400 rounded-[20px] py-1 pr-3" for="province">
                             <legend class="p-1 w-30 bg-gray-200 rounded-full flex flex-row justify-center text-sm">شبکه های اجتماعی</legend>
                    <ul class="w-full px-4 py-3  mt-2">
                        <li>
                                 <fieldset class="mt-4 text-sm md:text-base border-1 border-gray-400 rounded-[10px] py-1 pr-3" for="province">
                            <legend class="w-20 rounded-full flex flex-row justify-center text-sm">اینستاگرام:</legend>
                            <input type="text" name='social_medias[instagram]' placeholder="آدرس شبکه های اجتماعی" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                        </li>
                        <li>
                           
                                 <fieldset class="mt-4 text-sm md:text-base border-1 border-gray-400 rounded-[10px] py-1 pr-3" for="province">
                            <legend class="w-15 rounded-full flex flex-row justify-center text-sm">تلگرام:</legend>
                            <input type="text" name='social_medias[telegram]' placeholder="آدرس شبکه های اجتماعی" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                        </li>
                        <li>
                                    <fieldset class="mt-4 text-sm md:text-base border-1 border-gray-400 rounded-[10px] py-1 pr-3" for="province">
                            <legend class="w-17 rounded-full flex flex-row justify-center text-sm">واتساپ:</legend>
                            <input type="text" name='social_medias[whatsapp]' placeholder="آدرس شبکه های اجتماعی" class="w-full px-2 py-1 lg:px-5 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                        </li>
                    </ul>

                </div>
                <button type="submit"
                    class="mt-4 w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-medium">
                    ارسال اطلاعات
                </button>
            </div>
        </div>
         </fieldset>

    </form>
    @endsection

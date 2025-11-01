
    @extends('user.panel')
    @section('title', 'ثبت نام کسب و کار')
    @section('content')
    <form action="{{ route('user.career.store') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <!-- <input type="hidden" name="id" value=""> -->
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
                <!-- هدر -->
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">اطلاعات کسب وکار</h1>
                    <p class="text-gray-600 mt-2">اطلاعات کسب وکار خود را وارد کنید</p>
                </div>


                <!--  لوگو   -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"> لوگو کسب وکار</label>
                    <input type="file" name='logo'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder=" لوگو کسب وکار خود را وارد کنید">
                </div>
                <!-- نام کسب وکار -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">نام کسب وکار</label>
                    <input type="text" name='title'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="نام کسب وکار خود را وارد کنید">
                </div>
                <!--استان   -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">استان</label>
                    <input type="text" name='province'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="   استان خود را وارد کنید">
                </div>
                <!--    شهر -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"> شهر</label>
                    <input type="text" name='city'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder=" شهرخود را وارد کنید">
                </div>
                <!--  ادرس کسب وکار -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"> ادرس کسب وکار</label>
                    <input type="text" name='address'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder=" ادرس کسب وکار خود را وارد کنید">
                </div>

                <!--  qrcode -->

                <!-- ایمیل -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">ایمیل</label>
                    <input type="email" name='email'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="email@example.com">
                </div>
                <!-- توضیحات-->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">توضیحات</label>
                    <input type="text" name='description'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="توضیحات کسب وکار">
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
                    <label class="block text-sm font-medium text-gray-700 mb-2">شبکه های اجتماعی</label>
                    <ul class="w-full px-4 py-3 border border-gray-300 rounded-lg mt-2">
                        <li>
                            <label class="block text-sm font-medium text-gray-700 mb-2"> اینستاگرام:</label>
                            <input type="text" name='social_medias[instagram]'
                                class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-2"
                                placeholder="آدرس شبکه های اجتماعی">
                        </li>
                        <li>
                            <label class="block text-sm font-medium text-gray-700 mb-2"> تلگرام:</label>

                            <input type="text" name='social_medias[telegram]'
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-2"
                                placeholder="آدرس شبکه های اجتماعی">
                        </li>
                        <li>
                            <label class="block text-sm font-medium text-gray-700 mb-2"> واتساپ:</label>
                            <input type="text" name='social_medias[whatsapp]'
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-2"
                                placeholder="آدرس شبکه های اجتماعی">
                        </li>
                    </ul>

                </div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-medium">
                    ارسال اطلاعات
                </button>
            </div>
        </div>
    </form>
    @endsection

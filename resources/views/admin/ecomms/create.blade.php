    <style>
        input:focus {
            color: #2196F3;
        }
    </style>
    @extends('admin.app.panel')
    @section('title', 'ثبت نام  فروشگاه ')
    @section('content')
        <form action="{{ route('ecomm.store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                    <div class="text-center mb-4">
                        <h1 class="text-2xl font-bold text-gray-800">فرم اطلاعات فروشگاه  </h1>
                        {{-- <p class="text-gray-600 mt-2">اطلاعات  فروشگاه خود را وارد کنید</p> --}}

                        <div class="w-full flex flex-col gap-3 my-4">
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">لوگو  فروشگاه</label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                        name='logo' placeholder=" لوگو  فروشگاه خود را وارد کنید" title="لوگو فروشگاهو کار">
                                </div>
                            </div>
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">نام فروشگاه </label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='title' placeholder="نام  فروشگاه خود را وارد کنید">
                                </div>
                            </div>
                           
                           
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">بنر  فروشگاه </label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                        name="banner" title="بنر فروشگاهو کار">
                                </div>
                            </div>
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">استان</label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='province' placeholder="استان خود را وارد کنید">
                                </div>
                            </div>
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">شهر</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='city' placeholder=" شهرخود را وارد کنید">
                                </div>
                            </div>
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">آدرس</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='address' placeholder=" ادرس  فروشگاه خود را وارد کنید">
                                </div>
                            </div>
                            
                             <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='description' placeholder="توضیحات فروشگاه "
                                        class="w-full px-3 py-1 md:px-2 outline-none text-gray-500">
                                </div>
                            </div>

                            <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">ایمیل</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="email"
                                        name='email' placeholder="email@example.com">
                                </div>
                            </div>
                            
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">اینستاگرام</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='social_medias[instagram]' placeholder="آدرس شبکه های اجتماعی">
                                </div>
                            </div>
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">تلگرام</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='social_medias[telegram]' placeholder="آدرس شبکه های اجتماعی">
                                </div>
                            </div>
                            <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">واتساپ</label>
                                <div
                                    class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] flex">
                                    <input class="w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='social_medias[whatsapp]' placeholder="آدرس شبکه های اجتماعی">
                                </div>
                            </div>
                        </div>
                        <div class="w-full text-left ">
                            <button type="submit"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                                ارسال اطلاعات
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection

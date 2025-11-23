    <style>
        input:focus{
            color:#2196F3;
        }
    </style>
    @extends('admin.app.panel')
    @section('title', 'ثبت نام کسب و کار')
    @section('content')
    <form action="{{ route('cc.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                <!-- هدر -->
                <div class="text-center mb-4">
                    <h1 class="text-2xl font-bold text-gray-800">اطلاعات کسب وکار</h1>
                    <p class="text-gray-600 mt-2">اطلاعات کسب وکار خود را وارد کنید</p>
                </div class="w-full">
            <div class="md:flex md:flex-col md:w-full md:items-center md:gap-5">
                <div class="md:flex md:flex-col md:w-full">
                <!-- نام دسته بندی  -->
                         <div class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3" for="province">
                            <lable class="p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">نام دسته بندی</lable>
                            <input type="text" name='title' placeholder="نام دسته بندی " class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </div>
                </div>
                <div class="md:flex md:flex-col md:w-full">
                <!-- توضیحات  دسته بندی -->
                         <div class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3" for="province">
                            <lable class="p-1 w-40 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">توضیحات دسته بندی</lable>
                            <input type="text" name='description' placeholder="توضیحات دسته بندی"  class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                        </div>
                </div>
                <div class="md:flex md:flex-col md:w-full">
                <!-- توضیحات  دسته بندی -->
                         <div class="flex flex-row items-center mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3" for="province">
                            <input type="checkbox" name='show_home' value="1">
                            <lable class="p-1 w-40 text-gray-600 rounded-full flex flex-row justify-center text-sm"> نمایش در صفحه اول</lable>
                        </div>
                </div>
                <div class="md:flex md:flex-col md:w-full">
                <!-- توضیحات  دسته بندی -->
                         <div class="flex flex-row items-center mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3" for="province">
                             <lable class="p-1 w-40 text-gray-600 rounded-full flex flex-row justify-center text-sm">عکس دسته</lable>
                            <input type="file" name='main_image'>
                        </div>
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

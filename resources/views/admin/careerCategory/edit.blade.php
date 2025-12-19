@extends('admin.app.panel')
@section('title', 'ویرایش کسب و کار')
@section('content')
    <div class="text-center mb-4">
        <h1 class="text-lg font-bold text-gray-800">
            ویرایش اطلاعات دسته بندی
        </h1>
    </div>
    <form action="{{ route('cc.update') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name="id" value="{{ $careerCategory->id }}">
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                <div class="text-center mb-4">
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">

                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                    name='title' placeholder="عنوان" value="{{ $careerCategory->title }}">
                            </div>
                        </div>
                        <div class="w-full flex flex-row items-center gap-3 itmes-center max-md:flex-row max-md:gap-1">
                            <input type="checkbox" name='show_home' value="1" @if($careerCategory->show_in_home){{ 'checked' }}@endif>
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">نمایش در صفحه اول</label>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">تصویر دسته</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2 cursor-pointer"
                                    type="file" name='main_image' title="تصویر دسته">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                            <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" rows="6" type="text" name='description'
                                    placeholder="توضیحات">{{ $careerCategory->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="w-full text-left ">
                        <button type="submit"
                            class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

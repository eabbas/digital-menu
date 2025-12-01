@extends('admin.app.panel')
@section('title', 'ویرایش کسب و کار')
@section('content')
    <section class="2xl:container mx-auto">
        <div class="w-full mx-auto pb-5">
            <form action="{{ route('career.update') }}" method="post" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" name="id" value="{{ $career->id }}">
                <div class="min-h-screen flex items-start justify-center">
                    <div class="bg-white rounded-2xl shadow-md p-3 w-full">
                        <div class="text-center mb-4">
                            <h1 class="text-2xl font-bold text-gray-800">فرم ویرایش کسب وکار</h1>
                            <div class="w-full flex flex-col gap-3 my-4">
                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">لوگو کسب وکار</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                            name='logo' placeholder=" لوگو کسب وکار خود را وارد کنید"
                                            title="لوگو کسب و کار">
                                    </div>
                                </div>
                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">نام کسب وکار</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='title' placeholder="نام کسب وکار خود را وارد کنید"
                                            value="{{ $career->title }}">
                                    </div>
                                </div>
                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">دسته کسب و کار</label>
                                    <div
                                        class="p-3 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex pl-3">
                                        <select name="careerCategory"
                                            class="w-full font-bold px-2 py-1 md:px-2 outline-none text-gray-500">
                                            @foreach ($careerCategories as $careerCategory)
                                                <option value="{{ $careerCategory->id }}"
                                                    @if ($career->career_category_id == $careerCategory->id) {{ 'selected' }} @endif>
                                                    {{ $careerCategory->title }}</option>
                                            @endforeach
                                            <option value="0">
                                                سایر
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='description' placeholder="توضیحات کسب وکار"
                                            class="w-full px-3 py-1 md:px-2 outline-none text-gray-500"
                                            value="{{ $career->description }}">
                                    </div>
                                </div>
                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">بنر کسب و کار</label>

                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                            name="banner" title="بنر کسب و کار">
                                    </div>
                                </div>
                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">استان</label>

                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='province' placeholder="استان خود را وارد کنید"
                                            value="{{ $career->province }}">
                                    </div>
                                </div>
                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">شهر</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='city' placeholder=" شهرخود را وارد کنید" value="{{ $career->city }}">
                                    </div>
                                </div>
                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">آدرس</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='address' placeholder=" ادرس کسب وکار خود را وارد کنید"
                                            value="{{ $career->address }}">
                                    </div>
                                </div>

                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">ایمیل</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="email"
                                            name='email' placeholder="email@example.com" value="{{ $career->email }}">
                                    </div>
                                </div>


                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">اینستاگرام</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='social_medias[instagram]' placeholder="آدرس شبکه های اجتماعی"
                                            value="{{ $career->social_media->instagram }}">
                                    </div>
                                </div>
                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">تلگرام</label>
                                    <div
                                        class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                        <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='social_medias[telegram]' placeholder="آدرس شبکه های اجتماعی"
                                            value="{{ $career->social_media->telegram }}">
                                    </div>
                                </div>
                                <div class="w-full flex flex-row gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                    <label class="w-30 text-sm mb-1 mt-2.5 flex">واتساپ</label>
                                    <div
                                        class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] flex">
                                        <input class="w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                            name='social_medias[whatsapp]' placeholder="آدرس شبکه های اجتماعی"
                                            value="{{ $career->social_media->whatsapp }}">
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
        </div>
    </section>
@endsection

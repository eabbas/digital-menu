@extends('admin.app.panel')
@section('title', 'ایجاد منو')
@section('content')
<div class="w-full h-full bg-cover bg-no-repeat pb-10">
    <h2 class="text-xl lg:text-3xl text-center font-bold py-5 text-[#425A8B]">فرم ایجاد منو</h2>
    <div class="w-full mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white text-sm ">
        <form action="{{route('menu.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="career_id" value="{{ $career->id }}">
            <div class="w-full flex flex-col items-center gap-3">
                <div data-count="0" class="w-full flex flex-row justify-center">
                    <div
                        class="w-full flex flex-col items-end gap-3 lg:gap-5 mt-3 md:mt-5 border-b border-gray-300 pb-3">
                        <div class="w-full flex flex-row gap-3 items-center max-md:justify-center">
                            <div class="w-55 max-md:w-4/12 flex flex-col">
                                <label class="max-md:text-sm mb-2 font-bold">عنوان منو</label>
                                <input type="text"
                                    class="border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                                    placeholder="نام" name="menu_data[0][name]">
                            </div>
                            <div class="w-55 max-md:w-4/12 flex flex-col">
                                <label class="max-md:text-sm mb-2 font-bold">تصویر منو</label>
                                <input type="file"
                                    class="outline-none pr-5 py-2 bg-[#F9F9F9] border border-gray-300 rounded-xl focus:bg-[#f1f1f4]"
                                    name="menu_data[0][menu_image]">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-2" data-value="1">
                            <div class="w-12/12 flex flex-row max-md:flex-col items-end gap-3 my-2">
                                <div
                                    class="w-full flex flex-row max-md:grid max-md:grid-cols-2 items-center gap-3 mb-0">
                                    <div class="w-full flex flex-col">
                                        <label class="text-gray-600 font-bold mb-2">نام آیتم</label>
                                        <input type="text"
                                            class="border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                                            placeholder="نوشابه"
                                            name="menu_data[0][values][0][title]">
                                    </div>
                                    <input type="hidden" value="0" name="menu_data[0][values][0][id]">
                                    <div class="w-full flex flex-col">
                                        <label class="text-gray-600 font-bold mb-2">قیمت آیتم</label>
                                        <input type="number" placeholder="500.000تومان"
                                            class="border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                                            name="menu_data[0][values][0][price]">
                                    </div>
                                    <div class="w-full flex flex-col">
                                        <label class="text-gray-600 font-bold mb-2">توضیحات آیتم </label>
                                        <input type="text"
                                            class="border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                                            placeholder="بدون قند"
                                            name="menu_data[0][values][0][description]">
                                    </div>
                                    <div class="w-full flex flex-col">
                                        <label class="text-gray-600 font-bold mb-2"> تصویر آیتم</label>
                                        <input type="file"
                                            class="border border-gray-300 rounded-[13px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                                            name="menu_data[0][values][0][gallery]">
                                            <input type="hidden" name="menu_data[0][values][0][id]" value="0">
                                    </div>
                                </div>
                                <div class="flex items-end max-md:w-full max-md:justify-end">
                                    <button type="button"
                                        class="mt-2 size-8 mb-[3px] max-md:h-9 text-xs rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer"
                                        onclick="removeAttrButton(this)">X</button>
                                </div>
                            </div>
                        </div>
                        <button type="button"
                            class="w-full h-10 rounded-lg bg-green-500 text-white text-lg text-center inline-block mt-3 cursor-pointer"
                            onclick="addAttr(this, 0)">+</button>
                    </div>
                </div>
                <div id="attribute"></div>
                <button type="button" onclick="add()"
                    class="p-3 w-60 rounded-md bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer mt-3">
                    افزودن منو +
                </button>`
                <div class="w-full flex items-center flex-col">
                    <label class="mb-2 font-bold"> تعداد کیو آر کد های خود را تعیین کنید :</label>
                    <input type="number" placeholder="1"
                        class="outline-none w-60 pr-5 py-3 bg-[#F9F9F9] rounded-lg focus:bg-[#f1f1f4]" name="qr_num">
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="w-60 py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">ثبت</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    let rowCount = 0
    let v_count = 0
</script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
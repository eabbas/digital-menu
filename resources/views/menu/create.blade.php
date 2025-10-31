<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>create product</title>
</head>

<body>
    <div class="w-full h-full  bg-cover bg-no-repeat pb-10">
        <h2 class="text-3xl text-center font-bold py-5 text-[#425A8B]">فرم ایجاد منو</h2>
        <div class="w-1/2 mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white text-sm">
            <form action="{{route('menu.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-3">
                    <div data-count="0">
                        <div class="flex flex-col items-end gap-3 lg:gap-5 mt-3 md:mt-5 border-b border-gray-300 pb-3">


                            <div class="w-full flex flex-col">
                                <label class="mb-2"> عنوان منو :</label>
                                <input type="text"
                                    class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                    placeholder="نوشیدنی" name="page_data[0][name]">
                            </div>

                            <div class="w-full flex flex-col gap-2" data-value="0">
                                <div class="w-full flex flex-row items-end gap-3">
                                    <div class="flex flex-row items-center pr-10 gap-3">
                                        <div class="w-full flex flex-col">
                                            <label class="mb-2"> نام آیتم :</label>
                                            <input type="text"
                                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                                placeholder="نوشابه" name="page_data[0][values][0][title]">
                                        </div>
                                        <div class="w-full flex flex-col">
                                            <label class="mb-2"> قیمت آیتم :</label>
                                            <input type="number"
                                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                                name="page_data[0][values][0][price]">
                                        </div>
                                        <div class="w-full flex flex-col">
                                            <label class="mb-2"> توضیحات آیتم :</label>
                                            <input type="text"
                                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                                placeholder="بدون قند" name="page_data[0][values][0][description]">
                                        </div>

                                    </div>
                                    <div class="flex items-end">
                                        <button type="button"
                                            class="size-5 text-xs rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer"
                                            onclick="removeAttrButton(this)">X</button>
                                    </div>

                                </div>
                            </div>
                            <button type="button"
                                class="w-full rounded-xl bg-green-500 text-white text-lg text-center inline-block mt-3"
                                onclick="addAttr(this, 0)">+</button>
                        </div>
                    </div>

                    <div id="attribute"></div>
                    <button type="button" onclick="add()"
                        class="p-3 rounded-md bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer mt-3">
                        افزودن ویژگی +
                    </button>`


                    <div class="w-full flex flex-col">
                        <label class="mb-2"> تعداد کیو آر کد های خود را تعیین کنید :</label>
                        <input type="number"
                            class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                            name="qr_num">
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">ثبت</button>
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
</body>

</html>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="2xl:container mx-auto w-10/12">
         <!-- nav_bar -->
    <div class="w-full bg-[#F4F8F9] flex items-center justify-between flex-row-reverse px-10 py-2">
        <!-- logo_site -->
        <div class="size-10 rounded-full">
            <img class="size-full" src="{{ asset('storage/images/client_avatar.png') }}" alt="profile_user">
        </div>
        <!-- hamberger_meno -->
        <div class="w-8 h-5 flex flex-col justify-between">
            <!-- item_top -->
            <div class="w-full h-0.5 bg-black rounded-full"></div>
            <!-- item_center -->
            <div class="w-full h-0.5 bg-black rounded-full"></div>
            <!-- item_button -->
            <div class="w-full h-0.5 bg-black rounded-full"></div>
        </div>
    </div>
    <!-- header -->
    <div class="h-[200px] w-full mt-[88px] overflow-hidden bg-[#F4F8F9] bg-[url(./img/nody--1634209466.jpg)] bg-center bg-no-repeat"></div>
    <!-- navigation_items_and_divijenes -->
    <div class="w-full bg-[#F4F8F9] pt-10">
        <!-- navigation -->
        <div class="w-[90%] h-[190px] flex flex-row items-center gap-3 pb-10 m-[5%] overflow-x-auto scrollbar-hide">
            <!-- navigation_items items1 -->
            <div class="w-1/3 gap-2 bg-[#deffec] rounded-lg p-2 flex flex-col items-center shadow-[0_0_40px_-20px]">
                <!-- img_category -->
                <div class="w-15 h-15 rounded-full bg-cover bg-center bg-no-repeat bg-[url(./img/French.Fries_.Photo_.3418.PNG.Thmb_.png)]"></div>
                <span class="title_category_icon text-center">دسته بندی</span>
            </div>
            <!-- navigation_items items2 -->
            <div class="w-1/3 gap-2 bg-[#deffec] rounded-lg p-2 flex flex-col items-center shadow-[0_0_40px_-20px]">
                <!-- img_category -->
                <div class="w-15 h-15 rounded-full bg-cover bg-center bg-no-repeat bg-[url(./img/Hamburger.Photo_.831.PNG.Thmb_.png)]"></div>
                <span class="title_category_icon text-center">دسته بندی</span>
            </div>
            <!-- navigation_items items3 -->
            <div class="w-1/3 gap-2 bg-[#deffec] rounded-lg p-2 flex flex-col items-center shadow-[0_0_40px_-20px]">
                <!-- img_category -->
                <div class="w-15 h-15 rounded-full bg-cover bg-center bg-no-repeat bg-[url(./img/Pizza.Photo_.319.PNG.Thmb_.png)]"></div>
                <span class="title_category_icon text-center">دسته بندی</span>
            </div>
            <!-- navigation_items items4 -->
            <div class="w-1/3 gap-2 bg-[#deffec] rounded-lg p-2 flex flex-col items-center shadow-[0_0_40px_-20px]">
                <!-- img_category -->
                <div class="w-15 h-15 rounded-full bg-cover bg-center bg-no-repeat bg-[url(./img/Roast.Beef_.Thigh_.Photo_.6011.PNG.Thmb_.png)]"></div>
                <span class="title_category_icon text-center">دسته بندی</span>
            </div>
            <!-- navigation_items items5 -->
            <div class="w-1/3 gap-2 bg-[#deffec] rounded-lg p-2 flex flex-col items-center shadow-[0_0_40px_-20px]">
                <!-- img_category -->
                <div class="w-15 h-15 rounded-full bg-cover bg-center bg-no-repeat bg-[url(./img/Samosas.Photo_.233.PNG.Thmb_.png)]"></div>
                <span class="title_category_icon text-center">دسته بندی</span>
            </div>
            <!-- navigation_items items6 -->
            <div class="w-1/3 gap-2 bg-[#deffec] rounded-lg p-2 flex flex-col items-center shadow-[0_0_40px_-20px]">
                <!-- img_category -->
                <div class="w-15 h-15 rounded-full bg-cover bg-center bg-no-repeat bg-[url(./img/Steak.Photo_.1369.PNG.Thmb_.png)]"></div>
                <span class="title_category_icon text-center">دسته بندی</span>
            </div>
        </div>
        <!-- items1 -->
        <div class="w-full">
            <!-- category -->
            <div class="">
                <!-- category_header -->
                <h1 class="text-[160%] w-[90%] m-[5%]">
                    دسته بندی
                </h1>
            </div>
            <!-- items_category -->
            <div class="w-[90%] m-[5%]">
                <!-- items_category1 -->
                <div class="w-full my-[5%] bg-[#deffec] grid grid-cols-[repeat(3,auto)] gap-4 p-4 rounded-lg shadow-[0_0_40px_-27px]">
                    <!-- image_items_category -->
                    <div class="w-15 h-15 bg-rose-600 rounded-xl bg-[url(./img/nody--1634209466.jpg)] bg-cover bg-center bg-no-repeat"></div>
                    <!-- text_item_category -->
                    <div class="">
                        <!-- title_text_item_category -->
                        <div class="">
                            <h2>title1</h2>
                        </div>
                        <!-- paragraph_text_item_category -->
                        <div class="text-[75%]">
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius, nemo.
                            </p>
                        </div>
                    </div>
                    <!-- price_items_category -->
                    <div class="flex flex-col items-end justify-around">
                        <!-- price -->
                        <div class="">
                            <span>
                                20$
                            </span>
                        </div>
                        <!-- icone_price -->
                        <div class="flex flex-row w-[90px] relative">
                            <input type="number" class="bg-white rounded-sm w-full text-center">
                            <button type="button" class="absolute w-2 h-2 rounded-sm text-black left-0 h-full w-[30px]">+</button>
                            <button type="button" class="absolute w-2 h-2 rounded-sm text-black right-0 h-full w-[30px]">-</button>
                        </div>
                    </div>
                </div>
                <!-- items_category2 -->
                <div class="w-full my-[5%] bg-[#deffec] grid grid-cols-[repeat(3,auto)] gap-4 p-4 rounded-lg shadow-[0_0_40px_-27px]">
                    <!-- image_items_category -->
                    <div class="w-15 h-15 bg-rose-600 rounded-xl bg-[url(./img/nody--1634209466.jpg)] bg-cover bg-center bg-no-repeat"></div>
                    <!-- text_item_category -->
                    <div class="">
                        <!-- title_text_item_category -->
                        <div class="">
                            <h2>title1</h2>
                        </div>
                        <!-- paragraph_text_item_category -->
                        <div class="text-[75%]">
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius, nemo.
                            </p>
                        </div>
                    </div>
                    <!-- price_items_category -->
                    <div class="flex flex-col items-end justify-around">
                        <!-- price -->
                        <div class="">
                            <span>
                                20$
                            </span>
                        </div>
                        <!-- icone_price -->
                        <div class="flex flex-row w-[90px] relative">
                            <input type="number" class="bg-white rounded-sm w-full text-center">
                            <button type="button" class="absolute w-2 h-2 rounded-sm text-black left-0 h-full w-[30px]">+</button>
                            <button type="button" class="absolute w-2 h-2 rounded-sm text-black right-0 h-full w-[30px]">-</button>
                        </div>
                    </div>
                </div>
                <!-- items_category3 -->
                <div class="w-full my-[5%] bg-[#deffec] grid grid-cols-[repeat(3,auto)] gap-4 p-4 rounded-lg shadow-[0_0_40px_-27px]">
                    <!-- image_items_category -->
                    <div class="w-15 h-15 bg-rose-600 rounded-xl bg-[url(./img/nody--1634209466.jpg)] bg-cover bg-center bg-no-repeat"></div>
                    <!-- text_item_category -->
                    <div class="">
                        <!-- title_text_item_category -->
                        <div class="">
                            <h2>title1</h2>
                        </div>
                        <!-- paragraph_text_item_category -->
                        <div class="text-[75%]">
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius, nemo.
                            </p>
                        </div>
                    </div>
                    <!-- price_items_category -->
                    <div class="flex flex-col items-end justify-around">
                        <!-- price -->
                        <div class="">
                            <span>
                                20$
                            </span>
                        </div>
                        <!-- icone_price -->
                        <div class="flex flex-row w-[90px] relative">
                            <input type="number" class="bg-white rounded-sm w-full text-center">
                            <button type="button" class="absolute rounded-sm text-black left-0 h-full w-[30px]">+</button>
                            <button type="button" class="absolute rounded-sm text-black right-0 h-full w-[30px]">-</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    

</body>
</html>
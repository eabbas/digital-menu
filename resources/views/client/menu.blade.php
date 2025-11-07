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
    <div class="2xl:container mx-auto w-full">
        <header class="fixed top-0 right-0 w-full flex flex-row justify-center bg-[#F4F8F9] z-20">
            <div class="w-11/12 mx-auto flex items-center justify-between flex-row-reverse py-2">
                <div class="size-10 rounded-full">
                    <img class="size-full object-cover" src="{{ asset('storage/'.$career->logo) }}" alt="profile_user">
                </div>
                <div class="w-5 h-3.5 flex flex-col justify-between cursor-pointer" onclick="hamburgerMenu('open', this)">
                    <div class="w-full h-0.5 bg-black rounded-full transition-all duration-300"></div>
                    <div class="w-full h-0.5 bg-black rounded-full transition-all duration-300"></div>
                    <div class="w-full h-0.5 bg-black rounded-full transition-all duration-300"></div>
                </div>
            </div>
            <div class="lg:hidden fixed w-full h-dvh bg-black/50 top-0 -left-full flex flex-row transition-all duration-500 ease-in-out">
                <div class="w-1/3 h-full bg-inherit" onclick="hamburgerMenu('close', this)"></div>
                <div class="w-2/3 h-full bg-[#f1f1f4] p-2">
                    <div>
                        <a href="#" class="flex flex-row items-center gap-3 pb-2 border-b border-gray-300">
                            <img class="size-10" src="{{ asset('storage/'.$career->logo) }}" alt="career logo">
                            <span class="text-sm text-gray-600 font-medium">
                                {{ $career->title }}
                            </span>
                        </a>
                    </div>
                    <div class="mt-2">
                        <ul class="flex flex-col gap-1 pr-3">
                            <li>
                                <a href="{{ route('login') }}" class="block text-xs py-2 text-gray-700 font-medium hover:text-blue-600 transition-all duration-300">ورود</a>
                            </li>
                            <li>
                                <a href="{{ route('signup') }}" class="block text-xs py-2 text-gray-700 font-medium hover:text-blue-600 transition-all duration-300">ثبت نام</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="w-full pt-16 bg-[#F4F8F9]">
            <img src="{{ asset('storage/images/banner01.jpg') }}"
                class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="career banner">
        </div>
        <div class="w-full bg-[#F4F8F9] pt-3">
            <div class="w-11/12 flex flex-row items-center gap-3 pb-3 mx-auto overflow-x-auto" style="scrollbar-width: none;">
                <?php $menuIndex = 0;?>   
                @foreach(json_decode($career->menu->menu_data) as $data)
                <div>
                    <a href="#" class="w-20 gap-2 bg-white rounded-lg p-2 flex flex-col items-center" onclick='showMenu(event, "<?= $menuIndex?>")'>
                        <img class="size-10" src="{{ asset('storage/'.$data->menu_image) }}" alt="menu image">
                        <span class="block w-full title_category_icon text-center truncate text-xs">{{ $data->name
                            }}</span>
                    </a>
                </div>
                <?php $menuIndex++;?>
                @endforeach
            </div>
            <div class="w-11/12 mx-auto">
                <div class="my-5">
                    <h1 class="text-lg font-semibold">
                        دسته بندی
                    </h1>
                </div>
                <div class="flex flex-col gap-3">
                    <?php $i=0; ?>
                    @foreach(json_decode($career->menu->menu_data) as $data)
                    <div class="flex flex-col gap-3 parent_menu" data-index-menu="{{ $i }}">
                        @foreach($data->values as $value)
                        <div class="w-full bg-white flex flex-row items-center gap-4 p-4 rounded-lg">
                            <div class="w-1/4">
                                <img class="w-full" src="{{ asset('storage/'.$value->gallery) }}" alt="menu item image">
                            </div>
                            <div class="w-3/4 flex flex-col gap-2">
                                <h3 class="text-sm font-semibold">{{ $value->title }}</h3>
                                <div class="flex flex-row items-end gap-2">
                                    <div class="w-2/3 flex flex-col gap-2">
                                        <span class="text-xs font-medium text-gray-400 w-full truncate">{{
                                            $value->description }}</span>
                                        <h4 class="text-xs font-semibold w-full truncate">
                                            {{ $value->price }} تومان
                                        </h4>
                                    </div>
                                    <div class="w-1/3 flex relative">
                                        <input
                                            class="w-full outline-none text-xs rounded-sm px-2 py-1 text-center text-gray-800"
                                            type="number" name="count" min="0" value="1">
                                        <button type="button"
                                            class="absolute size-4 flex items-center justify-center rounded-sm top-0.5 right-0.5 text-white bg-[#68bc75] cursor-pointer" onclick="calc(this, '+')">+</button>
                                        <button type="button"
                                            class="absolute size-4 flex items-center justify-center rounded-sm top-0.5 left-0.5 text-white bg-[#68bc75] cursor-pointer" onclick="calc(this, '-')">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <?php $i++;?>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('assets/js/menu.js') }}"></script>
</body>
</html>
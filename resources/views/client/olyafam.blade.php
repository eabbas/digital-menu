<div class="w-11/12 mx-auto py-3">

    <h3 class="w-full text-base font-bold lg:text-md mb-3">منو های {{ $career->title }}</h3>

    <div class="w-full bg-white rounded-md">
        <div class="w-11/12 mx-auto flex flex-row items-center gap-8 pb-3 py-4 overflow-x-auto bg-white"
            style="scrollbar-width: thin;" id="menuList">
            @foreach ($career->menus as $menu)
                @if (count($menu->menu_categories) > 1)
                    <div class="relative selectItems @if ($career->menus[0] == $menu) selected @endif allMenus min-w-20 min-h-20"
                        data-menu-id="{{ $menu->id }}">
                        <div class="cursor-pointer rounded-lg menuParent" title="{{ $menu->title }}"
                            onclick='showMenu(this, "{{ $menu->id }}")'>
                            <div class="w-20 gap-2 flex flex-col items-center rounded-lg">
                                <img class="size-20 rounded-md"
                                    src="{{ $menu->banner ? asset('storage/' . $menu->banner) : asset('assets/img/user.png') }}"
                                    alt="menu image">
                                <span
                                    class="block w-full title_category_icon text-center truncate text-xs">{{ $menu->title }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="w-11/12 mx-auto mt-3">
    <div class="w-full overflow-x-auto bg-white rounded-md py-2" style="scrollbar-width: thin;">
        <div class="w-11/12 mx-auto flex flex-row items-center gap-4 py-4" id="menuCats">
            @foreach ($career->menus as $menu)
                @if (count($menu->menu_categories) > 1)
                    @foreach ($menu->menu_categories as $category)
                        @if ($category->menu->id == $career->menus[0]->id)
                            @if ($category->title != 'بدون دسته بندی')
                                @if ($career->menus[0]->menu_categories[1]->id == $category->id)
                                    <div class="relative text-center border-1 @if ($career->menus[0]->menu_categories[1]->id == $category->id) border-red-600 @else border-gray-300 @endif rounded-md menuCategories"
                                        onclick='showItems(this, "{{ $category->id }}")'
                                        data-menu-category-id="{{ $category->id }}">
                                        <span
                                            class="text-sm px-5 flex items-center justify-center min-w-[120px] max-w-[120px] truncate text-center cursor-pointer h-[34px]">{{ $category->title }}</span>
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="w-11/12 mx-auto" id="items">
    @foreach ($career->menus as $menu)
        @if (count($menu->menu_categories) > 1)
            <div class="flex flex-col gap-3 mt-3 menus" data-menu-id="{{ $menu->id }}">
                @foreach ($menu->menu_categories as $category)
                    @if (count($category->menu_items))
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                            @if ($career->menus[0]->menu_categories[1]->id == $category->id)
                                <div class="p-2 lg:p-4">
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4" id="menuItemList">
                                        @foreach ($category->menu_items as $item)
                                            @if ($item->title != 'آیتم 1')
                                                <div class="w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative menuItems"
                                                    data-menu-item-title="{{ $item->title }}"
                                                    data-menu-item-id="{{ $item->id }}">
                                                    <!--<span class="absolute -top-1 -right-2 bg-[#eb3254] px-2 py-0.5 rounded text-sm text-white">ویژه</span>-->
{{--                                                    <input type="hidden" value="{{ $item->id }}">--}}
                                                    <span
                                                        class="text-xs @if (!$item->discount) invisible @else @endif text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">
                                                        {{ $item->percent }}%
                                                    </span>
                                                    <div class="w-full flex items-center justify-between">
                                                        <div class="w-10/12 flex flex-row gap-5 items-center">
                                                            <div class="flex items-center gap-2 lg:gap-4 flex-1 cursor-pointer"
                                                                onclick="openSingle(this)">
                                                                <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/img/user.png') }}"
                                                                    class="size-22 rounded-lg object-cover border border-gray-300"
                                                                    alt="{{ $item->title }}">
                                                                <div class="flex-1 min-w-0 max-w-[calc(100%-50px)]">
                                                                    <h3
                                                                        class="font-medium text-gray-800 truncate text-sm lg:text-base">
                                                                        {{ $item->title }}</h3>
                                                                    <p
                                                                        class="text-sm text-gray-500 truncate mt-1 lg:text-sm">
                                                                        {{ $item->description }}</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="pl-2 lg:pl-0 lg:ml-4 flex flex-col gap-0.5 lg:gap-3">
                                                                <div class="flex flex-row items-center gap-3">
                                                                    <div class="text-left flex flex-col items-end">
                                                                        @if ($item->discount == 0)
                                                                            <span
                                                                                class="font-bold text-xs lg:text-sm">{{ number_format($item->price) }}
                                                                                تومان</span>
                                                                        @else
                                                                            <span
                                                                                class="font-bold text-xs lg:text-sm">{{ number_format($item->discount) }}
                                                                                تومان</span>
                                                                            <span
                                                                                class="text-gray-400 text-[10px] line-through lg:text-sm">{{ number_format($item->price) }}
                                                                                تومان</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $userCart = $item->load([
                                                                'carts' => function ($query) {
                                                                    $query
                                                                        ->whereNull('order_id')
                                                                        ->where('user_id', Auth::id());
                                                                },
                                                            ]);
                                                        @endphp
                                                        <div data-item-id="{{ $item->id }}" class="count">
                                                            @if (Auth::check() && count($currentUser->carts) && count($userCart->carts))
                                                                <div class="relative w-16 lg:w-20">
                                                                    <button
                                                                        class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                                        onclick="setCount(this, '+', {{ $item->id }})">+
                                                                    </button>
                                                                    <input type="number"
                                                                        class="outline-none w-full rounded text-center text-sm py-1"
                                                                        min="1"
                                                                        value="{{ $userCart->carts[0]->quantity }}"
                                                                        disabled>
                                                                    <button
                                                                        class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                                        onclick="setCount(this, '-',{{ $item->id }})">
                                                                        @if ($userCart->carts[0]->quantity > 1)
                                                                            -
                                                                        @else
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="size-[14px]"
                                                                                viewBox="0 0 448 512">
                                                                                <path fill="white"
                                                                                    d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z" />
                                                                            </svg>
                                                                        @endif
                                                                    </button>
                                                                </div>
                                                            @else
                                                                <div
                                                                    class="w-[82px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                                                                    <button
                                                                        class="w-full h-full flex flex-row justify-center items-center bg-green-500 rounded text-white text-sm lg:text-base cursor-pointer set"
                                                                        onclick="addToCart(this, {{ $item->id }})">افزودن
                                                                        +
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @endforeach
</div>

@extends('client.document')
@section('title', 'فائوس')
@section('content')
        <div class="w-full flex flex-row justify-between gap-3 pt-8 pb-8 rounded-2xl">
            <div class="w-1/2  p-1 lg:p-3 text-xs  lg:text-sm h-full font-medium">
               <a href="{{ route('show_career', [$career]) }}" class="text-sky-700">مشاهده جزئیات کسب وکار</a>
            </div>
        </div>
        <div class="w-full pt-16 bg-[#F4F8F9]">
            <div class="pb-4 text-3xl text-center font-bold">
                <h2>{{$career->title}}</h2>
            </div>
            @if(!$career->banner)
            <img src="{{ asset('storage/images/banner01.jpg') }}" class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="career banner">
            @else
            <img src="{{ asset('storage/'.$career->banner) }}" class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="career banner">
            @endif
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
                                    <form class="w-1/3 flex  flex-col relative" method="post" action="{{ route('user.set_order') }}">
                                        @csrf
                                        <div>
                                            <input
                                                class="w-full outline-none text-xs rounded-sm px-2 py-1 text-center text-gray-800"
                                                type="number" name="count" min="0" value="1">
                                            <input type="hidden" name="career" value="{{$career->id}}">
                                            @if($slug)
                                            <input type="hidden" name="slug" value="{{$slug}}">
                                            @endif
                                            <input type="hidden" name="titles[]" value="{{$value->title}}">
                                            <button type="button"
                                                class="absolute size-4 flex items-center justify-center rounded-sm top-0.5 right-0.5 text-white bg-[#68bc75] cursor-pointer" onclick="calc(this, '+')">+</button>
                                            <button type="button"
                                                class="absolute size-4 flex items-center justify-center rounded-sm top-0.5 left-0.5 text-white bg-[#68bc75] cursor-pointer" onclick="calc(this, '-')">-</button>
                                        </div>
                                        <div class="mt-2">
                                            <button class="w-full py-1 text-[12px] bg-[#68bc75] rounded-sm text-white cursor-pointer">ثبت سفارش</button>
                                        </div>
                                    </form>
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
<script src="{{ asset('assets/js/menu.js') }}"></script>
@endsection
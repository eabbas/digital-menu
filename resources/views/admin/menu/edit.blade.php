@extends('admin.app.panel')
@section('title', 'ویرایش منو')
@section('content')

<div class="w-full h-full bg-cover bg-no-repeat pb-10">
    <h2 class="text-3xl max-md:text-2xl max-sm:text-xl text-center font-bold py-5 text-[#425A8B]">فرم ویرایش منو</h2>
    <div class="w-full sm:border sm:border-[#D5DFE4] rounded-[10px] text-[#425A8B] sm:p-5 bg-white text-sm">
        <form action="{{route('menu.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
            <input type="hidden" name="career_id" value="{{ $menu->career_id }}">
            <div class="flex flex-col gap-3">
                <div id="attribute">
                    <?php $i=0 ?>
                    @foreach(json_decode($menu->menu_data) as $data)
                    <?php $j=0?>
                    <div data-count="{{ $i }}">
                        <div class="w-full flex flex-col items-end gap-3 lg:gap-5 mt-3 md:mt-5 border-b border-gray-300 pb-3">
                            <div class="w-full flex flex-row gap-3 items-center max-md:justify-center">
                                <div class="w-55 max-md:w-4/12 flex flex-col">
                                    <label class="max-md:text-sm mb-2 font-bold"> عنوان منو  </label>
                                    <input type="text"
                                        class="outline-none pr-5 py-2 bg-[#F9F9F9] border border-gray-300 rounded-xl focus:bg-[#f1f1f4]"
                                        placeholder="نوشیدنی" name="menu_data[{{ $i }}][name]" value="{{ $data->name }}">
                                </div>
                                <div class="w-55 max-md:w-4/12 flex flex-col">
                                    <label class="max-md:text-sm mb-2 font-bold"> تصویر منو </label>
                                    <input type="file"
                                        class="outline-none pr-5 py-2 cursor-pointer border border-gray-300 rounded-xl"
                                        name="menu_data[{{ $i }}][menu_image]">
                                </div>

                            </div>
                            <div class="w-full flex overflow-x-auto scroll-snap-x snap-mandatory no-scrollbar flex-col gap-2" data-value="{{ $j }}">
                                @foreach($data->values as $value)
                                <div class="w-12/12 flex flex-row max-md:flex-col items-end gap-3 my-2">
                                    <div class="w-full flex flex-row items-center gap-3 max-md:gap-1 max-md:grid max-md:grid-cols-2">
                                        <div class="w-3/12 max-md:w-full flex flex-col">
                                            <label class="max-md:text-sm mb-2 font-bold"> نام آیتم  </label>
                                            <input type="text"
                                                class="border border-gray-300 rounded-[8px] outline-none pr-5 py-2 max-md:pr-1 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                                placeholder="نوشابه" name="menu_data[{{ $i }}][values][{{ $j }}][title]" value="{{ $value->title }}">
                                        </div>
                                        <div class="w-3/12 max-md:w-full flex flex-col">
                                            <label class="max-md:text-sm mb-2 font-bold"> قیمت آیتم  </label>
                                            <input type="number"
                                                class="border border-gray-300 rounded-[8px] w-full outline-none pr-5 py-2 max-md:pr-1 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                                name="menu_data[{{ $i }}][values][{{ $j }}][price]" value="{{ $value->price }}">
                                        </div>
                                        <div class="w-3/12 max-md:w-full flex flex-col">
                                            <label class="max-md:text-sm mb-2 font-bold"> توضیحات آیتم  </label>
                                            <input type="text"
                                                class="border border-gray-300 rounded-[8px] w-full outline-none pr-5 py-2 max-md:pr-1 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                                placeholder="بدون قند" name="menu_data[{{ $i }}][values][{{ $j }}][description]" value="{{ $value->description }}">
                                        </div>
                                        <div class="w-3/12 max-md:w-full flex flex-col">
                                            <label class="max-md:text-sm mb-2 font-bold"> تصویر آیتم  </label>
                                            <input type="file"
                                                class="border border-gray-300 rounded-[8px] w-full outline-none pr-5 py-2 max-md:pr-1 cursor-pointer"
                                                name="menu_data[{{ $i }}][values][{{ $j }}][gallery]">
                                        </div>
                                    </div>
                                    <div class="flex items-end max-md:w-full max-md:justify-end">
                                        <button type="button"
                                            class="mt-2 size-8 mb-[3px] max-md:h-9 text-xs rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer"
                                            onclick="removeAttrButton(this)">X</button>
                                    </div>
                                </div>
                                <?php $j++ ?>
                                @endforeach
                            </div>
                            <button type="button"
                                class="w-6/12 font-bold md:w-8/12 h-10 mx-auto rounded-[8px] bg-green-500 text-white text-lgd:jus text-center inline-block mt-3"
                                onclick="addAttr(this, 0)">+</button>
                        </div>
                    </div>
                    <?php $i++ ?>
                    @endforeach
                </div>
                <button type="button" onclick="add()"
                    class="w-6/12 mx-auto p-3 rounded-md bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer mt-3">
                    افزودن ویژگی +
                </button>`
               
                <div class="w-full flex flex-col items-center">
                    <label class="max-md:text-sm mb-2 font-bold"> تعداد کیو آر کد های خود را تعیین کنید  </label>
                    <input type="number" class="outline-none text-center py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                        name="qr_num" value="{{ count($menu->qr_codes) }}">
                </div>
                <div class="w-full flex flex-col gap-3">
                    <?php $i = 1; ?>
                    @foreach($menu->qr_codes as $qr_code)
                        @if(!$qr_code->is_main)
                        <div class="w-full flex flex-row items-center justify-between">
                            <div class="flex flex-row items-center gap-3">
                                {{ $i }}
                                <img class="size-20" src="{{ asset('storage/'.$qr_code->qr_path) }}" alt="QRCode">
                            </div>
                            <a href="{{ route('qr.delete', [$qr_code]) }}" class="p-3 bg-rose-500 rounded-lg text-white font-semibold text-sm cursor-pointer" onclick="remove_qr(this)">حذف</a>
                        </div>
                        <?php $i++; ?>
                        @endif
                    @endforeach
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="w-3/12 mx-auto py-3 px-10 rounded-[8px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">ثبت</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    let rowCount = <?= $i; ?>;
    let v_count = <?= $j ?>;
</script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
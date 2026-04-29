@extends('client.document')
@section('title', 'فامنو | جست و جو')
@section('content')

    <div class="w-full flex flex-col lg:flex-row gap-5 mt-5 lg:mt-10">
        <div class="w-full lg:w-1/5">
            <div class="w-full py-2 flex flex-row items-center overflow-x-auto [&::-webkit-scrollbar]:hidden lg:hidden">
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer"
                     data-title="all">
                    <div class=" flex flex-row items-center gap-1 max-w-[100px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 512 512">
                            <path fill="var(--color-fill)"
                                  d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z"/>
                        </svg>
                        <span class="text-xs">
                            همه
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer"
                     data-title="careerCategory">
                    <div class=" flex flex-row items-center justify-center gap-1 min-w-[100px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                            <path fill="var(--color-fill)"
                                  d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
                        </svg>
                        <span class="text-xs">
                            دسته رستوران
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer"
                     data-title="career">
                    <div class=" flex flex-row items-center justify-center gap-1 min-w-[70px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                            <path fill="var(--color-fill)"
                                  d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
                        </svg>
                        <span class="text-xs">
                             رستوران
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer"
                     data-title="pages">
                    <div class=" flex flex-row items-center justify-center gap-1 min-w-[110px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                            <path fill="var(--color-fill)"
                                  d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
                        </svg>
                        <span class="text-xs">
                            صفحه
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer"
                     data-title="menu">
                    <div class=" flex flex-row items-center gap-1 max-w-[100px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                            <path fill="var(--color-fill)"
                                  d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
                        </svg>
                        <span class="text-xs">
                            منو
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer"
                     data-title="ecomm">
                    <div class=" flex flex-row items-center gap-1 max-w-[100px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                            <path fill="var(--color-fill)"
                                  d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
                        </svg>
                        <span class="text-xs">
                            فروشگاه
                        </span>
                    </div>
                </div>
            </div>
            <div class="w-full p-3 sticky top-5 rounded-lg hidden lg:block border-1 border-gray-300">
                <div class="w-full flex flex-col">
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="all">همه</div>
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer"
                         data-title="careerCategory">دسته رستوران
                    </div>
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="career">
                        رستوران
                    </div>
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="pages">صفحه
                    </div>
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="menu">منو</div>
                    <div class="p-3 bg-white filter cursor-pointer" data-title="ecomm">فروشگاه</div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-4/5">
            <input type="hidden" id="searchTitle" value="{{ $searchTitle }}">
            <h2 class="text-sm lg:text-xl">
                نتایج مرتبط با
                <span class="font-bold">
                    {{ $datas['title'] }}
                </span>
            </h2>
            <div class="flex flex-col gap-5 lg:gap-10 mt-5 lg:mt-10" id="items">
                @if (count($datas['careerCategory']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">دسته های رستوران</h2>
                        <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4">
                            @foreach ($datas['careerCategory'] as $restaurantCat)
                                @if (count($restaurantCat->careers))
                                    <a href="{{ route('career.categoryCareers', [$restaurantCat]) }}"
                                       class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers"
                                       title="{{ $restaurantCat->title }}">
                                        <div class="w-full rounded-md overflow-hidden">
                                            <img class="size-26 mx-auto rounded-[7px] object-cover"
                                                 src="{{ asset('storage/' . $restaurantCat->main_image) }}"
                                                 alt="careerCat image">
                                        </div>
                                        <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                            {{ $restaurantCat->title }}
                                        </span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (count($datas['career']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">رستوران ها</h2>
                        <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4">
                            @foreach ($datas['career'] as $restaurant)
                                <a href="{{ route('client.menu', [$restaurant]) }}"
                                   class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers"
                                   title="{{ $restaurant->title }}">
                                    <div class="w-full rounded-md overflow-hidden">
                                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                                             src="{{ asset('storage/' . $restaurant->logo) }}" alt="career logo">
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                        {{ $restaurant->title }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (count($datas['pages']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">صفحه ها</h2>
                        <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4">
                            @foreach ($datas['pages'] as $page)
                                <a href="{{ route('client.loadLink', [$page]) }}"
                                   class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers"
                                   title="{{ $page->title }}">
                                    <div class="w-full rounded-md overflow-hidden">
                                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                                             src="{{ asset('storage/' . $page->logo_path) }}"
                                             alt="social address image">
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                        {{ $page->title }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (count($datas['menu']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">منو ها</h2>
                        <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4">
                            @foreach ($datas['menu'] as $menu)
                                @if ($menu->career)
                                    <a href="{{ route('client.menu', ['career' => $menu->career->id]) }}"
                                       class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers"
                                       title="{{ $menu->title }}">
                                        <div class="w-full rounded-md overflow-hidden">
                                            <img class="size-26 mx-auto rounded-[7px] object-cover"
                                                 src="{{ asset('storage/' . $menu->banner) }}"
                                                 alt="social address image">
                                        </div>
                                        <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                            {{ $menu->title }}
                                        </span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (count($datas['ecomm']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">فروشگاه ها</h2>
                        <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4">
                            @foreach ($datas['ecomm'] as $ecomm)
                                <a href="#"
                                   class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers"
                                   title="{{ $ecomm->title }}">
                                    <div class="w-full rounded-md overflow-hidden">
                                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                                             src="{{ asset('storage/' . $ecomm->banner) }}"
                                             alt="social address image">
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                            {{ $ecomm->title }}
                                        </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="flex flex-col gap-5 lg:gap-10 mt-5 lg:mt-10" id="parentItems"></div>
        </div>
    </div>

    <script>
        let parentItems = document.getElementById('parentItems')
        let filter = document.querySelectorAll('.filter')
        let models = []

        // let test = ["abbas" ,"b" ,"c" ,"m" , 'c']
        // console.log(test.includes("c"))

        // test = test.filter(item => item != "c")

        // console.log(test)
        let items = document.getElementById('items')
        filter.forEach((item) => {
            item.addEventListener('click', () => {
                items.classList.add('hidden')
                let searchTitle = document.getElementById('searchTitle')
                if (item.getAttribute('data-title') != "all") {
                    if (models.includes('all')) {
                        models = models.filter(index => index != "all")
                        let alls = document.querySelectorAll('[data-title="all"]')
                        alls.forEach((all) => {
                            all.classList.remove('bg-gray-200')
                            all.classList.add('bg-white')
                        })
                    }
                    if (!models.includes(item.getAttribute('data-title'))) {
                        item.classList.remove('bg-white')
                        item.classList.add('bg-gray-200')
                        models.push(item.getAttribute('data-title'))
                    } else {
                        item.classList.remove('bg-gray-200')
                        item.classList.add('bg-white')
                        models = models.filter(field => field != item.getAttribute('data-title'))
                    }
                    if (models.length == 0) {
                        let alls = document.querySelectorAll('[data-title="all"]')
                        alls.forEach((all) => {
                            all.classList.remove('bg-gray-200')
                            all.classList.add('bg-white')
                        })
                        models.push('all')
                    }
                }
                if (item.getAttribute('data-title') == "all") {


                    models = []
                    filter.forEach((index) => {
                        index.classList.remove('bg-gray-200')
                        index.classList.add('bg-white')
                    })
                    models.push(item.getAttribute('data-title'))
                    item.classList.remove('bg-white')
                    item.classList.add('bg-gray-200')


                    // if (!models.includes(item.getAttribute('data-title'))) {
                    //     models = []
                    //     filter.forEach((index) => {
                    //         index.classList.remove('bg-gray-200')
                    //         index.classList.add('bg-white')
                    //     })
                    //     models.push(item.getAttribute('data-title'))
                    //     item.classList.remove('bg-white')
                    //     item.classList.add('bg-gray-200')
                    // } else {
                    //     item.classList.remove('bg-gray-200')
                    //     item.classList.add('bg-white')
                    //     items.classList.remove('hidden')
                    //     // models = []
                    // }
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })

                $.ajax({
                    url: "{{ route('filter') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'models': models,
                        'searchTitle': searchTitle.value,
                    },
                    success: function (datas) {
                        console.log(datas)
                        parentItems.innerHTML = ""
                        console.log(datas)
                        for (const key in datas) {
                            if (key == "careerCategory") {
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "دسته های  رستوران"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4"
                                datas[key].forEach((data) => {
                                    let url = "{{ url('careers/categoryCareers/') }}"
                                    url += "/"
                                    url += data.id
                                    let element = document.createElement('a')
                                    element.setAttribute('title', data.title)
                                    element.setAttribute('href', url)
                                    element.classList = "w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers"
                                    element.innerHTML = `
                                    <div class="w-full rounded-md overflow-hidden">
                                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                                            src="${'{{ asset('storage/') }}/' + data.main_image}">
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                        ${data.title}
                                    </span>
                                    `
                                    parentLink.appendChild(element)
                                    div.appendChild(parentLink)
                                })
                                parentItems.appendChild(div)
                            }
                            if (key == "career") {
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "رستوران ها"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4"
                                datas[key].forEach((data) => {
                                    let url = "{{ url('qrcodes/') }}"
                                    url += "/"
                                    url += data.id
                                    let element = document.createElement('a')
                                    element.setAttribute('title', data.title)
                                    element.setAttribute('href', url)
                                    element.classList = "w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers"
                                    element.innerHTML = `
                                    <div class="w-full rounded-md overflow-hidden">
                                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                                            src="${'{{ asset('storage/') }}/' + data.logo}">
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                        ${data.title}
                                    </span>
                                    `
                                    parentLink.appendChild(element)
                                    div.appendChild(parentLink)
                                })
                                parentItems.appendChild(div)
                            }
                            if (key == "pages") {
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "صفحه ها"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4"
                                datas[key].forEach((data) => {
                                    let url = "{{ url('qrcodes/links/') }}"
                                    url += "/"
                                    url += data.id
                                    let element = document.createElement('a')
                                    element.setAttribute('title', data.title)
                                    element.setAttribute('href', url)
                                    element.classList = "w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers"
                                    element.innerHTML = `
                                    <div class="w-full rounded-md overflow-hidden">
                                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                                            src="${'{{ asset('storage/') }}/' + data.logo_path}">
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                        ${data.title}
                                    </span>
                                    `
                                    parentLink.appendChild(element)
                                    div.appendChild(parentLink)
                                })
                                parentItems.appendChild(div)
                            }
                            if (key == "menu") {
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "منو ها"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4"
                                datas[key].forEach((data) => {
                                    let url = "{{ url('qrcodes/') }}"
                                    url += "/"
                                    url += data.id
                                    let element = document.createElement('a')
                                    element.setAttribute('title', data.title)
                                    element.setAttribute('href', url)
                                    element.classList = "w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers"
                                    element.innerHTML = `
                                    <div class="w-full rounded-md overflow-hidden">
                                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                                            src="${'{{ asset('storage/') }}/' + data.banner}">
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                        ${data.title}
                                    </span>
                                    `
                                    parentLink.appendChild(element)
                                    div.appendChild(parentLink)
                                })
                                parentItems.appendChild(div)
                            }
                            if (key == "ecomm") {
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "فروشگاه ها"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4"
                                datas[key].forEach((data) => {
                                    let url = "#"
                                    // url += "/"
                                    // url += data.id
                                    let element = document.createElement('a')
                                    element.setAttribute('title', data.title)
                                    element.setAttribute('href', url)
                                    element.classList = "w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers"
                                    element.innerHTML = `
                                    <div class="w-full rounded-md overflow-hidden">
                                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                                            src="${'{{ asset('storage/') }}/' + data.banner}">
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                        ${data.title}
                                    </span>
                                    `
                                    parentLink.appendChild(element)
                                    div.appendChild(parentLink)
                                })
                                parentItems.appendChild(div)
                            }
                        }
                    },
                    error: function () {
                        alert('خطا  در ارسال داده')
                    }
                })

            })
        })
    </script>

@endsection

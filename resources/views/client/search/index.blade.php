@extends('client.document')
@section('title', 'جست و جو')
@section('content')

    <div class="w-full flex flex-col lg:flex-row gap-5 mt-5 lg:mt-10">
        <div class="w-full lg:w-1/5">
            <div class="w-full py-2 flex flex-row items-center overflow-x-auto [&::-webkit-scrollbar]:hidden lg:hidden">
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer" data-title="all">
                    <div class=" flex flex-row items-center gap-1 max-w-[100px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 512 512">
                            <path fill="var(--color-fill)"
                                d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z" />
                        </svg>
                        <span class="text-xs">
                            همه
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer" data-title="careerCategory">
                    <div class=" flex flex-row items-center justify-center gap-1 min-w-[100px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                            <path fill="var(--color-fill)"
                                d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                        </svg>
                        <span class="text-xs">
                            دسته کسب و کار
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer" data-title="career">
                    <div class=" flex flex-row items-center justify-center gap-1 min-w-[70px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                            <path fill="var(--color-fill)"
                                d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                        </svg>
                        <span class="text-xs">
                             کسب و کار
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer" data-title="pages">
                    <div class=" flex flex-row items-center justify-center gap-1 min-w-[110px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                            <path fill="var(--color-fill)"
                                d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                        </svg>
                        <span class="text-xs">
                             شبکه های اجتماعی
                        </span>
                    </div>
                </div>
                <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300 filter cursor-pointer" data-title="menu">
                    <div class=" flex flex-row items-center gap-1 max-w-[100px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                            <path fill="var(--color-fill)"
                                d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                        </svg>
                        <span class="text-xs">
                            منو
                        </span>
                    </div>
                </div>
            </div>
            <div class="w-full p-3 sticky top-5 rounded-lg hidden lg:block border-1 border-gray-300">
                <div class="w-full flex flex-col">
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="all">همه</div>
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="careerCategory">دسته کسب و کار</div>
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="career">کسب و کار</div>
                    <div class="p-3 bg-white border-b border-gray-300 filter cursor-pointer" data-title="pages">شبکه اجتماعی</div>
                    <div class="p-3 bg-white filter cursor-pointer" data-title="menu">منو</div>
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
                @if (count($datas['careerCategories']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">دسته های کسب و کار</h2>
                        <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4">
                            @foreach ($datas['careerCategories'] as $careerCat)
                                @if (count($careerCat->careers))
                                    <a href="{{ route('career.categoryCareers', [$careerCat]) }}"
                                        class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers" title="{{ $careerCat->title }}">
                                        <div class="w-full rounded-md overflow-hidden">
                                            <img class="size-26 mx-auto rounded-[7px] object-cover"
                                                src="{{ asset('storage/' . $careerCat->main_image) }}" alt="careerCat image">
                                        </div>
                                        <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                            {{ $careerCat->title }}
                                        </span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
        
                @if (count($datas['careers']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">کسب و کار ها</h2>
                        <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4">
                            @foreach ($datas['careers'] as $career)
                                <a href="{{ route('client.menu', [$career]) }}"
                                    class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers" title="{{ $career->title }}">
                                    <div class="w-full rounded-md overflow-hidden">
                                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                                            src="{{ asset('storage/' . $career->logo) }}" alt="career logo">
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                        {{ $career->title }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
        
                @if (count($datas['socialMedias']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">شبکه های اجتماعی</h2>
                        <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4">
                            @foreach ($datas['socialMedias'] as $socialMedia)
                                <a href="{{ route('client.loadLink', [$socialMedia]) }}"
                                    class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers" title="{{ $socialMedia->title }}">
                                    <div class="w-full rounded-md overflow-hidden">
                                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                                            src="{{ asset('storage/' . $socialMedia->logo_path) }}" alt="social address image">
                                    </div>
                                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                                        {{ $socialMedia->title }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
        
                @if (count($datas['menus']))
                    <div>
                        <h2 class="mb-5 font-bold text-sm lg:text-base">منو ها</h2>
                        <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4">
                            @foreach ($datas['menus'] as $menu)
                                @if ($menu->career)
                                    <a href="{{ route('client.menu', ['career' => $menu->career->id]) }}"
                                        class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers" title="{{ $menu->title }}">
                                        <div class="w-full rounded-md overflow-hidden">
                                            <img class="size-26 mx-auto rounded-[7px] object-cover"
                                                src="{{ asset('storage/' . $menu->banner) }}" alt="social address image">
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
        filter.forEach((item)=>{
            item.addEventListener('click', ()=>{
                items.classList.add('hidden')
                let searchTitle = document.getElementById('searchTitle')
                if(item.getAttribute('data-title') != "all"){
                    if(models.includes('all')){
                        models = models.filter(index => index != "all")
                    } 
                    if(!models.includes(item.getAttribute('data-title'))){
                        item.classList.remove('bg-white')
                        item.classList.add('bg-gray-200')
                        models.push(item.getAttribute('data-title'))
                    } else {
                        item.classList.remove('bg-gray-200')
                        item.classList.add('bg-white')
                        models = models.filter(field => field != item.getAttribute('data-title'))
                    }
                }
                if(item.getAttribute('data-title') == "all"){
                    if(!models.includes(item.getAttribute('data-title'))){
                        models = []
                        filter.forEach((index)=>{
                            index.classList.remove('bg-gray-200')
                            index.classList.add('bg-white')
                        })
                        models.push(item.getAttribute('data-title'))
                        item.classList.remove('bg-white')
                        item.classList.add('bg-gray-200')
                    } 
                    else {
                        item.classList.remove('bg-gray-200')
                        item.classList.add('bg-white')
                        items.classList.remove('hidden')
                        // models = []
                    }
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
                    success: function(datas){
                        console.log(datas)
                        parentItems.innerHTML = ""
                        console.log(datas)
                        for(const key in datas){
                            if(key == "careerCategory"){
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "دسته های  کسب و کار"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4"
                                datas[key].forEach((data)=>{
                                    let url = "{{ url('careers/categoryCareers/') }}"
                                    url+="/"
                                    url+=data.id
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
                            if(key == "career"){
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "کسب و کار ها"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4"
                                datas[key].forEach((data)=>{
                                    let url = "{{ url('qrcodes/') }}"
                                    url+="/"
                                    url+=data.id
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
                            if(key == "pages"){
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "شبکه های اجتماعی"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4"
                                datas[key].forEach((data)=>{
                                    let url = "{{ url('qrcodes/links/') }}"
                                    url+="/"
                                    url+=data.id
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
                            if(key == "menu"){
                                let div = document.createElement('div')
                                div.classList = "parent"
                                let heading = document.createElement('h2')
                                heading.classList = "mb-5 font-bold text-sm lg:text-base"
                                heading.innerText = "منو ها"
                                div.appendChild(heading)
                                let parentLink = document.createElement('div')
                                parentLink.classList = "grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4"
                                datas[key].forEach((data)=>{
                                    let url = "{{ url('qrcodes/') }}"
                                    url+="/"
                                    url+=data.id
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
                    error: function(){
                        alert('خطا  در ارسال داده')
                    }
                })
                
            })
        })
    </script>

@endsection

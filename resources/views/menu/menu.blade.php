<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <title>menus</title>
</head>
<body>
    <div class="2xl:container mx-auto w-10/12">
        <div class="w-full p-5 border border-gray-400 mt-5 rounded-3xl">
            <h1 class="text-center text-3xl font-bold py-5 text-gray-700">
                لیست منوی {{ $career->title }}
            </h1>
            @foreach($career->menus as $menu)
            <div class="w-full flex flex-col gap-3 p-3 border border-gray-300 rounded-lg">
                @foreach(json_decode($menu->page_data) as $data)
                <div class="w-1/2 m-auto">
                    <h2 class="text-xl font-semibold text-gray-600 border-b border-black mb-5">{{ $data->name }}</h2>
                    <div class="w-full flex flex-col gap-3">
                        @foreach($data->values as $value)
                        <div class="pr-5 grid grid-cols-3 gap-5">
                            <div class="py-1 border border-red-500 rounded-lg p-3">{{ $value->title }}</div>
                            <div class="py-1 border border-red-500 rounded-lg p-3">{{ $value->price }}</div>
                            <div class="py-1 border border-red-500 rounded-lg p-3">{{ $value->description }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>

    </div>
</body>
</html>
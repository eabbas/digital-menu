<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('contactus.store') }}" method="POST" >

        @csrf
        <input type="text"  name='name' placeholder='نام '>
        <input type="text" name='family' placeholder='نام خانوادگی'>
        <input type="text" name='email' placeholder='ایمیل'>
        <input type="text" name='phone' placeholder='شماره تلفن'>
        <input type="text" name='description' placeholder='توضیحات'>
        <button class="text-center w-full bg-[#056EE9] p-3 rounded-[10px] text-white cursor-pointer">ارسال</button>
    </form>
</body>
</html>
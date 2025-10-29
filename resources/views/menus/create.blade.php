<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('store/menu')}}" method='POST' enctype='multipart/form-data'>
        @csrf
        <label for="">تعداد میز</label>
        <input type="text" name='qr_num'>
        
        <input type="hidden" name='career_id' value={{$career_id}}>
        <input type="text" name='page_data[]' placeholder='page-data'>
        <input type="text" name='page_data[title]' placeholder='title'>
        <input type="text" name='page_data[value][name]' placeholder='name'>
        <input type="text" name='page_data[value][price]' placeholder='price'>
        <input type="text" name='page_data[value][description]' placeholder='description'>
        <input type="file" name='page_data[value][image]'>
        <button type="submit">ارسال اطلاعات</button>
    </form>
</body>
</html>
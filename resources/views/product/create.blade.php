<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('product/store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title">

        <label for="description">Description:</label>
        <input type="text" name="description">

        <label for="price">Price:</label>
        <input type="text" name="price">

        <label for="discount">Discount:</label>
        <input type="text" name="discount">

        <label for="show_home">Show_in_home:</label>
        <input type="checkbox" name="home" value="1">

        <label for="cat_id">Category:</label>
        <select name="categoryId">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>

        <button>create</button>
    </form>
</body>
</html>
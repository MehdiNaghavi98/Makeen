<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مدیریت دسته‌بندی‌ها</title>
<link rel="stylesheet" href="{{asset('panel/category.css')}}">
</head>
<body>
<div class="wrapper">

    <!-- لیست دسته‌بندی‌ها -->
    <div class="category-box">
        <h3>دسته‌بندی‌های موجود</h3>
        @foreach($categories as $category)
        <ul>
            <li>{{$category->name}}</li>
            <!-- اینجا اگر بیشتر باشه اسکرول می‌خوره -->
        </ul>
        @endforeach
    </div>

    <!-- فرم افزودن دسته‌بندی -->
    <div class="form-container">
        <h2>افزودن دسته‌بندی جدید</h2>
        <form method="POST" action="{{route('CreateCategory')}}">
            @csrf
            <label>نام دسته‌بندی</label>
            <input type="text" name="name" placeholder="مثلاً کیف">
            <button type="submit">ثبت دسته‌بندی</button>
        </form>
    </div>
</div>
</body>
</html>

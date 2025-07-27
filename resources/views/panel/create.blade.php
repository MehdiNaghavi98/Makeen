<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{asset('panel/create.css')}}">
    <title>افزودن محصول</title>
</head>
<body>

<h1>فرم افزودن محصول</h1>

<form action="{{route('Create-Product')}}" method="post" enctype="multipart/form-data">
    @csrf
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
    <!-- نام محصول -->
    <label for="name">نام محصول</label>
    <input type="text" id="name" name="name" placeholder="نام محصول را وارد کنید" required />

    <!-- توضیحات -->
    <label for="description">توضیحات</label>
    <textarea id="description" name="description" placeholder="توضیحات محصول را وارد کنید" required></textarea>

    <!-- تصویر -->
    <label for="image">تصویر محصول</label>
    <input type="file" id="image" name="image" accept="image/*" required />

    <!-- دسته بندی -->
    <label for="category">دسته بندی</label>
    <select name="category">
        @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    <!-- رنگ ها (5 فیلد ثابت) -->
    <label>رنگ‌ها (حداکثر ۵ مقدار)</label>
    <div class="multi-fields">
        <input type="text" name="colors[]" placeholder="رنگ ۱" />
        <input type="text" name="colors[]" placeholder="رنگ ۲" />
        <input type="text" name="colors[]" placeholder="رنگ ۳" />
        <input type="text" name="colors[]" placeholder="رنگ ۴" />
        <input type="text" name="colors[]" placeholder="رنگ ۵" />
    </div>

    <!-- سایز ها (5 فیلد ثابت) -->
    <label>سایزها (حداکثر ۵ مقدار)</label>
    <div class="multi-fields">
        <input type="text" name="sizes[]" placeholder="سایز ۱" />
        <input type="text" name="sizes[]" placeholder="سایز ۲" />
        <input type="text" name="sizes[]" placeholder="سایز ۳" />
        <input type="text" name="sizes[]" placeholder="سایز ۴" />
        <input type="text" name="sizes[]" placeholder="سایز ۵" />
    </div>

    <!-- جنسیت -->
    <label for="gender">جنسیت</label>
    <select id="gender" name="gender" class="gender-select" required>
        <option value="" disabled selected>انتخاب کنید</option>
        <option value="male">مردانه</option>
        <option value="female">زنانه</option>
        <option value="sport">اسپورت</option>
    </select>

    <!-- تعداد -->
    <label for="quantity">تعداد</label>
    <input type="number" id="quantity" name="quantity" min="0" placeholder="تعداد محصول" required />

    <!-- برند -->
    <label for="brand">برند</label>
    <input type="text" id="brand" name="brand" placeholder="برند محصول" required />

    <!-- قیمت -->
    <label for="price">قیمت (تومان)</label>
    <input type="number" id="price" name="price" min="0" placeholder="قیمت محصول" required />

    <button type="submit">ثبت محصول</button>
</form>

</body>
</html>

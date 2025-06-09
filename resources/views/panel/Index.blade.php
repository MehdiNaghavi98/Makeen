<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل فروشنده</title>
    <link rel="stylesheet" href="{{ asset('panel/index.style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@fontsource/vazirmatn@latest/index.css" rel="stylesheet">
</head>
<body>
<div class="seller-info" style="margin-right: 1300px">
     {{ $user->name }}👤 خوش اومدی
</div>

<div class="actions">
    <a href="{{ route('Show-Create') }}" class="btn green">➕ افزودن محصول</a>
    <a href="#" class="btn blue">➕ افزودن دسته‌بندی</a>
    <a class="btn red">🗑️ حذف همه محصولات</a>
</div>


<div class="table-container">
    <table class="product-table">
        <thead>
        <tr>
            <th>نام</th>
            <th>توضیحات</th>
            <th>تصویر</th>
            <th>دسته‌بندی</th>
            <th>رنگ</th>
            <th>سایز</th>
            <th>جنسیت</th>
            <th>تعداد</th>
            <th>فروشنده</th>
            <th>برند</th>
            <th>قیمت</th>
            <th>وضعیت</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>کرم پودر</td>
            <td>محصول مناسب پوست‌های چرب</td>
            <td><img src="https://via.placeholder.com/50" alt="محصول"></td>
            <td>آرایشی</td>
            <td>بژ</td>
            <td>50ml</td>
            <td>زنانه</td>
            <td>12</td>
            <td>فروشنده A</td>
            <td>Loreal</td>
            <td>۳۲۰٬۰۰۰ تومان</td>
            <td><span class="badge active">فعال</span></td>
            <td class="actions-cell">
                <a href="" class="btn small orange">✏️ ویرایش</a>
                <a href="" class="btn small red">🗑️ حذف</a>
                <a href="" class="btn small purple">🔄 وضعیت</a>


            </td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>

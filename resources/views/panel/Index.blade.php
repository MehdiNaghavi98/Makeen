<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل فروشنده</title>
    <link rel="stylesheet" href="{{ asset('panel/index.style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@fontsource/vazirmatn@latest/index.css" rel="stylesheet">
    <style>
        .tooltip-cell {
            position: relative;
            cursor: pointer;
        }

        .tooltip-cell:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 125%;
            right: 0;
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 6px 10px;
            border-radius: 6px;
            white-space: nowrap;
            font-size: 13px;
            z-index: 10;
            opacity: 1;
        }
    </style>
</head>
@if(session('success'))
    <div class="alert-success">
        {{session('success')}}
    </div>
@endif
<body>

<div class="topbar">
    <div class="seller-info">
        👤 {{ $user->name }} خوش اومدی
    </div>
    <a href="{{route('logout')}}" class="btn logout">🚪 خروج</a>
</div>

<div class="actions">
    <a href="{{ route('Show-Create') }}" class="btn green">➕ افزودن محصول</a>
    <a href="{{route('Show-Categories')}}" class="btn blue">➕ افزودن دسته‌بندی</a>
    <a href="{{route('DeleteAllProduct')}}" onclick="return confirm('آیا از حذف تمامی محصولات اطمینان دارید؟')" class="btn red">🗑️ حذف همه محصولات</a>

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
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ Str::limit($product->description, 4) }}</td>
                <td>
                    <img src="{{ asset('uploads/products/' . $product->image) }}" alt="عکس محصول"
                         style="max-width:200px;">
                </td>
                <td>{{ $product->category->name }}</td>

                @php
                    $colors = $product->properties->where('title', 'color');
                    $allColors = $colors->pluck('pivot.content')->toArray();
                    $firstColor = optional($colors->first())->pivot->content ?? '-';
                @endphp
                <td class="tooltip-cell"
                    data-tooltip="{{ count($allColors) ? implode(' | ', $allColors) : 'رنگی ثبت نشده' }}">
                    {{ $firstColor }}
                </td>
                @php
                    $sizes = $product->properties->where('title' , 'size');
                    $allSizes = $sizes->pluck('pivot.content')->toArray();
                    $firstSize = optional($sizes->first())->pivot->content ?? '-';
                @endphp
                <td class="tooltip-cell"
                    data-tooltip="{{ count($allSizes) ? implode(' | ', $allSizes) : 'رنگی ثبت نشده' }}">
                    {{ $firstSize }}
                </td>
                <td>@if($product->gender == 'male')
                        {{"مردانه"}}
                    @else
                        {{"زنانه"}}
                    @endif</td>
                <td>{{$product->quantity}}</td>
                <td>{{$user->name}}</td>
                <td>{{$product->brand}}</td>
                <td>{{number_format($product->price) . ' ' . 'تومان'}}</td>
                @if($product->status == 10)
                    <td><span class="badge active">فعال</span></td>
                @else
                    <td><span class="badge inactive">غیرفعال</span></td>

                @endif

                <td class="actions-cell">
                    <a href="{{route('Show-Update' , $product->id)}}" class="btn small orange">✏️ ویرایش</a>
                    <a href=" {{route('Delete' , $product->id)}} " class="btn small red">🗑️ حذف</a>
                    <a href="{{route('Change-Status' , $product->id)}}" class="btn small purple">🔄 وضعیت</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
<script src="{{ asset('panel/index.js') }}"></script>
</html>


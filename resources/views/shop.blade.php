<!DOCTYPE html>
<html lang="FA" dir="rtl">

<head>
    <title>فروشگاه زی - فروشگاه</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
</head>

<body>
<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
            </div>
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                        class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                        class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i
                        class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                        class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="{{route('Show-Index')}}">
            Zay
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
             id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Show-Index')}}">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Show-Shop')}}">فروشگاه</a>
                    </li>
                    @if(Auth::check())
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="{{route('Show-Sabt-Ticket')}}" class="nav-link">
                                    ثبت تیکت
                                </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="">
                                            مشاهده تیکت‌ها
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Show-About')}}">درباره ما</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Show-Contact')}}">تماس باما</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="جستجو...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                   data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                @if(auth()->check())
                <a class="nav-icon position-relative text-decoration-none" href="{{route('Show-Orders')}}">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    @endif
                </a>
                @if(!auth()->check())
                    <a class="nav-icon position-relative text-decoration-none" href="{{route('Show-Auth')}}">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    </a>
                @endif
                    @if(auth()->check())
                        <a class="nav-icon position-relative text-decoration-none" href="{{route('Show-User-Details')}}">
                            <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        </a>
                    @endif
            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Start Content -->
<div class="container py-5">
    <div class="row">
        <!-- سایدبار فیلتر محصولات -->
        <div class="col-lg-3 mb-4">
            <h2 class="h4 pb-3 border-bottom">فیلتر محصولات</h2>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    <a class="d-flex justify-content-between h5 text-decoration-none" href="#">
                        نوع
                        <i class="fa fa-chevron-down mt-1"></i>
                    </a>
                    <ul class="list-unstyled pl-3">
                        @php
                        $male = 'male';
                        $female = 'female';
                        @endphp
                        <li><a class="text-decoration-none" href="{{route('Show-Shop' , $male )}}">مردانه</a></li>
                        <li><a class="text-decoration-none" href="{{route('Show-Shop' , $female )}}">زنانه</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="d-flex justify-content-between h5 text-decoration-none" href="#">
                        دسته‌بندی
                        <i class="fa fa-chevron-down mt-1"></i>
                    </a>
                    <ul class="list-unstyled pl-3">
                        @foreach($categories as $category)
                            <li><a class="text-decoration-none" href="{{route('Show-Shop' , $category->id)}}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>

        <!-- محتوای اصلی محصولات -->
        <div class="col-lg-9">
            <!-- فیلتر و جستجو -->
            <div class="row mb-4">
                <div class  ="col-md-6"></div>
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="sort-options d-flex gap-2 mb-4 justify-content-center">
                        <a href="{{route('Show-Shop' , 'down')}}" class="sort-link">
                            قیمت از کم به زیاد
                        </a>
                        <a href="{{route('Show-Shop' , 'up')}}" class="sort-link">
                            قیمت از زیاد به کم
                        </a>
                    </div>


                </div>
            </div>

            <!-- لیست محصولات -->
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 border-success shadow-sm">
                            <div class="position-relative">
                                <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top"
                                     alt="{{ $product->name }}">
                                <div
                                    class="card-img-overlay d-flex flex-column justify-content-center align-items-center bg-dark bg-opacity-50 opacity-0 hover-opacity-100 transition">
                                    <a href="{{ route('Show-Shop-Single' , $product->id) }}" class="btn btn-success btn-sm mb-2"><i
                                            class="far fa-eye"></i> مشاهده</a>

                                </div>
                            </div>
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                @php
                                    $sizes = $product->properties->where('title', 'size')->pluck('pivot.content')->toArray();
                                @endphp

                                @if(count($sizes))
                                    <div class="product-sizes">
                                        <span class="sizes-label">سایزها:</span>
                                        @foreach($sizes as $size)
                                            <span class="size-badge">{{ $size }}</span>
                                        @endforeach
                                    </div>
                                @endif
                                @php
                                    $colors = $product->properties->where('title', 'color')->pluck('pivot.content')->toArray();
                                @endphp

                                @if(count($colors))
                                    <div style="margin-bottom: 10px" class="product-sizes">
                                        <span class="sizes-label">سایزها:</span>
                                        @foreach($colors as $color)
                                            <span class="size-badge">{{ $color }}</span>
                                        @endforeach
                                    </div>
                                @endif
                                <p class="text-success fw-bold">{{ number_format($product->price) }} تومان</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- صفحه‌بندی -->
            <ul class="pagination pagination-lg justify-content-end mt-4">
                <li class="page-item active"><a class="page-link border-success text-success" href="#">۱</a></li>
                <li class="page-item"><a class="page-link border-success text-success" href="#">۲</a></li>
                <li class="page-item"><a class="page-link border-success text-success" href="#">۳</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- End Content -->

<!-- Start Brands -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">مارک های ما</h1>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chev    ron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand"
                             data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_01.png')}}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_02.png')}}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_03.png')}}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_04.png')}}" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_01.png')}}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_02.png')}}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_03.png')}}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_04.png')}}" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_01.png')}}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_02.png')}}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_03.png')}}" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img"
                                                             src="{{asset('img/brand_04.png')}}" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Third slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Brands-->


<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">فروشگاه زی</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        تهران کوچه 123 پلاک 123
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">محصولات</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">لوکس</a></li>
                    <li><a class="text-decoration-none" href="#">لباس ورزشی</a></li>
                    <li><a class="text-decoration-none" href="#">کفش مردانه</a></li>
                    <li><a class="text-decoration-none" href="#">کفش زنانه</a></li>
                    <li><a class="text-decoration-none" href="#">لباس محبوب</a></li>
                    <li><a class="text-decoration-none" href="#">لوازم بدنسازی</a></li>
                    <li><a class="text-decoration-none" href="#">کفش ورزشی</a></li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">اطلاعات بیشتر</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">خانه</a></li>
                    <li><a class="text-decoration-none" href="#">درباره ما</a></li>
                    <li><a class="text-decoration-none" href="#">مکان های فروشگاه</a></li>
                    <li><a class="text-decoration-none" href="#">سوالات متداول</a></li>
                    <li><a class="text-decoration-none" href="#">تماس</a></li>
                </ul>
            </div>

        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i
                                class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                class="fab fa-twitter fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i
                                class="fab fa-linkedin fa-lg fa-fw"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="subscribeEmail">آدرس ایمیل</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"
                           placeholder="آدرس ایمیل">
                    <div class="input-group-text btn-success text-light">ارسال</div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        تمامی محتوای سایت برای تیم دیباوبسایت محفوض است
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<!-- Start Script -->
<script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/templatemo.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<!-- End Script -->
</body>

</html>

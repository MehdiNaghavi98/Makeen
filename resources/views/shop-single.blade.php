<!DOCTYPE html>
<html lang="FA" dir="auto">

<head>
    <title>فروش گاه زی - صفحه محصول تکی</title>
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

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
    <!--

    TemplateMo 559 Zay Shop

    https://templatemo.com/tm-559-zay-shop

    -->
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
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="جستوجو...">
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
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="جستوجو...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Open Content -->
<form action="{{route('AddOrder' , $product->id)}}" method="POST">
    @csrf
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">

                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">

                        <img style="max-height:500px;max-width: 700px" class="card-img img-fluid"
                             src="{{ asset('uploads/products/' . $product->image) }}"
                             alt="Card image cap" id="product-detail">
                    </div>

                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                             data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->

                                <!--/.First slide-->

                                <!--Second slide-->
                                <!--/.Second slide-->

                                <!--Third slide-->
                                <!--/.Third slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">bac</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>فروشنده:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $product->user->name }}</strong></p>
                                </li>
                            </ul>

                            <h1 class="h2">{{$product->name}}</h1>
                            <p class="h3 py-2">{{number_format($product->price) . ' ' . 'تومان'}}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>برند:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$product->brand}}</strong></p>
                                </li>
                            </ul>

                            <h6>شرح:</h6>
                            <p>{{$product->description}}</p>


                            <!-- انتخاب رنگ -->


                            <!-- دکمه افزودن -->
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>رنگ موجود :</h6>
                                </li>
                                <li class="list-inline-item">
                                    @php
                                        $color = $product->properties->where('title', 'color');
                                        $allColors = $color->pluck('pivot.content')->toArray();
                                    @endphp
                                    <label class="btn btn-success">
                                        @foreach($allColors as $color)
                                            <input type="radio" name="color" value="{{$color}}">
                                            {{$color}}
                                    </label>
                                </li>

                            </ul>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>نام دسته بندی :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$product->category->name}}</strong></p>
                                </li>
                            </ul>
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        @php
                                            $sizes = $product->properties->where('title', 'size');
                                            $allSizes = $sizes->pluck('pivot.content')->toArray();
                                        @endphp

                                        <label class="btn btn-success">
                                            @foreach($allSizes as $size)
                                                <input type="radio" name="size" value="{{$size}}">
                                                {{$size}}
                                            @endforeach
                                        </label>

                                    </ul>
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">تعداد:</label>
                                        <input type="number" name="quantity"
                                               class="form-control w-25 border-success"
                                               value="1" min="1">
                                    </div>
                                    @if($errors->has('quantity'))
                                        <div style="margin-bottom: 10px" class="text-danger mt-2">
                                            {{ $errors->first('quantity') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            تعداد موجود
                                        </li>

                                        <li class="list-inline-item"><span class="btn btn-success"
                                                                           id="btn-plus">{{$product->quantity}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">

                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit"
                                            value="addtocard">افزودن به سبد خرید
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</form>
<!-- Close Content -->


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
                        <a class="text-light text-decoration-none" target="_blank"
                           href="https://www.instagram.com/"><i
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
<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/templatemo.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<!-- End Script -->

<!-- Start Slider Script -->
<script src="{{ asset('js/slick.min.js') }}"></script>
<script>
    $('#carousel-related-product').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 3,
        dots: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            }
        ]
    });
</script>
<!-- End Slider Script -->

</body>

</html>


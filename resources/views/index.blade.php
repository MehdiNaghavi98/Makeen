<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>فروشگاه زی</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
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
                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">ZayCompany@gmail.com</a>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">09350598594</a>
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
        @if(auth()->check())
            <div class="user-box-mini">
                <span class="user-name-mini">سلام، {{ Auth::user()->name }}</span>
                <form method="get" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn-mini">خروج</button>
                </form>
            </div>
        @endif
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
                </a>
                @endif

                @if(auth()->check())
                    <a href="{{ route('Show-User-Details') }}" class="nav-icon position-relative text-decoration-none d-flex align-items-center">
                        <i class="fa fa-fw fa-user text-dark ms-1"></i>
                        <span class="user-name-custom">{{ Auth::user()->name }}</span>
                    </a>
                @endif




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
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="جستجو...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{ asset('img/banner_img_01.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>زی</b> تجارت الکترونیک</h1>
                            <h3 class="h2">قالبی زیبا و مدرن</h3>
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{ asset('img/banner_img_02.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">فروشگاه انواع محصولات </h1>
                            <h3 class="h2">دارای محصول تستی</h3>
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{ asset('img/banner_img_03.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">قالبی فروشگاهی و مدرن</h1>
                            <h3 class="h2">اجراع سئو ابتداعی</h3>
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
       role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-right"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
       role="button" data-bs-slide="next">
        <i class="fas fa-chevron-left"></i>
    </a>
</div>
<!-- End Banner Hero -->

<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">دسته بندی های متنوع</h1>
        </div>
    </div>

    <div class="row">
        @foreach($categories as $category)
            <div class="col-12 col-md-4 p-5 mt-3">
                <h5 class="text-center mt-3 mb-3">{{$category->name}}</h5>
                <p class="text-center"><a href="{{route('Show-Shop' , $category->id)}}" class="btn btn-success">برو فروشگاه</a></p>
            </div>
        @endforeach

    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">محصول ویژه</h1>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100 product-card">
                        <a href="{{ route('Show-Shop-Single' , $product->id) }}">
                            <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top"
                                 alt="...">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right">{{ number_format($product->price) . ' تومان' }}</li>
                            </ul>

                            <a href="{{ route('Show-Shop-Single' , $product->id) }}"
                               class="h2 text-decoration-none text-dark mb-2">{{ $product->name }}</a>

                            <p class="card-text flex-grow-1" style="overflow: hidden; text-overflow: ellipsis;">
                                {{ $product->description }}
                            </p>

                            <div class="card-buttons mt-3 d-flex justify-content-center">
                                <a href="{{route('Show-Shop-Single' , $product->id)}}" class="btn btn-view">👁 مشاهده محصول</a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

</section>

<!-- End Featured Product -->


<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">فروشگاه زی</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        تهران , بزرگراه رسالت
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:010-020-0340">0935-059-8594</a>
                    </li>
                    <li>

                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:info@company.com">ZayCompany@gmail.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">محصولات</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    @foreach($categories  as $category)
                        <li><a class="text-decoration-none" href="{{route('Show-Shop' , $category->id)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">اطلاعات بیشتر</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">خانه</a></li>
                    <li><a class="text-decoration-none" href="#">درباره ما</a></li>
                    <li><a class="text-decoration-none" href="#">تماس با ما</a></li>
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

        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        فروشگاه زی هیچ شعبه دیگری ندارد
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
</body>

</html>


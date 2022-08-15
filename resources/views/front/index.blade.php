@extends('front.parent')


@section('style')

@endsection


@section('content')

<!--***************************************************************************************************-->
<!--Srart slider-->
<div class="slider-section">

    <div id="demo" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="overlay"></div>
                @if($slider1 == null)
                <img src="{{ asset('images/slide1.jpg') }}" alt="slide1">
                @else
                <img src="{{ $slider1->image->getUrl() }}" alt="slide1">
                @endif
                <div class="carousel-caption">
                    <h1 class="animated wow fadeInDown hero-heading animated sub-color" data-wow-delay=".4s">
                        @if($slider1 == null)
                        @lang('dummy-data.slider-title')
                        @else
                        {{$slider1->title}}
                        @endif
                    </h1>
                    <p class="animated fadeInUp wow hero-sub-heading animated " data-wow-delay=".6s">
                        @if($slider1 == null)
                        @lang('dummy-data.slider-description')
                        @else
                        {!! $slider1->description !!}
                        @endif
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay"></div>
                @if($slider2 == null)
                <img src="{{ asset('images/slide2.jpg') }}" alt="slide2">
                @else
                <img src="{{ $slider2->image->getUrl() }}" alt="slide2">
                @endif

                <div class="carousel-caption">
                    <h1 class="animated wow fadeInLeft hero-heading animated sub-color" data-wow-delay=".7s">
                        @if($slider2 == null)
                        @lang('dummy-data.slider-title')
                        @else
                        {{$slider2->title}}
                        @endif
                    </h1>
                    <p class="animated wow fadeInRight hero-sub-heading animated " data-wow-delay=".9s">
                        @if($slider2 == null)
                        @lang('dummy-data.slider-description')
                        @else
                        {!! $slider2->description !!}
                        @endif
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay"></div>
                @if($slider3 == null)
                <img src="{{ asset('images/slide3.jpg') }}" alt="slide3">
                @else
                <img src="{{ $slider3->image->getUrl() }}" alt="slide3">
                @endif
                <div class="carousel-caption">
                    <h1 class="animated wow fadeInDown hero-heading animated sub-color" data-wow-delay=".6s">
                        @if($slider3 == null)
                        @lang('dummy-data.slider-title')
                        @else
                        {{$slider3->title}}
                        @endif
                    </h1>
                    <p class="animated fadeInUp wow hero-sub-heading animated " data-wow-delay=".8s">
                        @if($slider3 == null)
                        @lang('dummy-data.slider-description')
                        @else
                        {!! $slider3->description !!}
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>
<!--End slider-->
<!--------------------------------About US Start---------------------------------------->
<div class="about-us section">
    <div class="container">
        <div class="row">
            <div class=" col-sm-12 col-md-12 col-lg-7">
                <div class="single-col">
                    <h1 class="title">
                        @if($about_us == null)
                        @lang('dummy-data.about-title')
                        @else
                        {{$about_us->title}}
                        @endif
                    </h1>
                    <p style="-webkit-line-clamp: 5;">
                        @if($about_us == null)
                        @lang('dummy-data.about-description-short')
                        @else
                        {!! Str::limit($about_us->description , 600) !!}
                        @endif

                    </p>
                    <div class="read-more">
                        <a class="" href="{{ URL('aboutus') }}">@lang('front.read-more')</a>
                    </div>
                </div>
            </div>

            <div class=" col-sm-12 col-md-12 col-lg-5">
                <div class="single-col img-col">
                    @if($about_us == null)
                      <img src="{{asset('images/about-img.jpg')}}" alt="about-img" width="100%">
                      @else
                        @if($about_us->image == null)
                          <img src="{{asset('images/about-img.jpg')}}" alt="about-img" width="100%">
                        @else
                          <img src="{{ $about_us->image->getUrl() }}" alt="about-img" width="100%">
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------------------------About US End------------------------------------------>
<!--------------------------------our products Start------------------------------------>
<div class="section product-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <h1 class="title"> @if($our_products_page == null)
                        @lang('dummy-data.products-title')
                        @else
                        {{$our_products_page->title}}
                        @endif</h1>
                    <p>@if($our_products_page == null)
                        @lang('dummy-data.products-description')
                        @else
                        {{$our_products_page->description}}
                        @endif</p>
                </div>
            </div>
        </div>

        <div class="dealsBox">
            <div class="row">

                @forelse ($products as $product)
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="dealsOffer">
                            <div class="dealsimg">
                                <img src="{{ $product->image->getUrl() }}" alt="">
                                <div class="labelSale">{{$product->discount_percentage}}%</div>
                                <div class="img-overlay">
                                    <a href="{{ URL('product/details/' . $product->id) }}" style="additive-symbols: ">
                                        <button class="myBtn_multi">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="dealProductInfo">

                                <h4>{{$product->title}}</h4>
                                <div class="price-box">
                                    <span class="newPrice">${{$product->discounted_price}}</span>
                                    <span class="oldPrice">${{$product->price}}</span>
                                </div>

                                <div class="watsapp-order">
                                    <a href="{{$product->link}}">
                                        @lang('front.order-now')
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="dealsOffer">
                            <div class="dealsimg">
                                <img src="{{ asset('images/product.jpeg') }}" alt="">
                                <div class="labelSale">-7%</div>
                                <div class="img-overlay">
                                    <button class="myBtn_multi">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="dealProductInfo">

                                <h4>@lang('dummy-data.product-title')</h4>
                                <div class="price-box">
                                    <span class="newPrice">$80.00</span>
                                    <span class="oldPrice">$86.00</span>
                                </div>


                                <div class="watsapp-order">
                                    <a href="#">
                                        @lang('front.order-now') <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="dealsOffer">
                            <div class="dealsimg">
                                <img src="{{ asset('images/product.jpeg') }}" alt="">
                                <div class="labelSale">-7%</div>
                                <div class="img-overlay">
                                    <button class="myBtn_multi">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="dealProductInfo">

                                <h4>@lang('dummy-data.product-title')</h4>
                                <div class="price-box">
                                    <span class="newPrice">$80.00</span>
                                    <span class="oldPrice">$86.00</span>
                                </div>


                                <div class="watsapp-order">
                                    <a href="#">
                                        @lang('front.order-now') <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="dealsOffer">
                            <div class="dealsimg">
                                <img src="{{ asset('images/product.jpeg') }}" alt="">
                                <div class="labelSale">-7%</div>
                                <div class="img-overlay">
                                    <button class="myBtn_multi">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="dealProductInfo">

                                <h4>@lang('dummy-data.product-title')</h4>
                                <div class="price-box">
                                    <span class="newPrice">$80.00</span>
                                    <span class="oldPrice">$86.00</span>
                                </div>


                                <div class="watsapp-order">
                                    <a href="#">
                                        @lang('front.order-now') <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="dealsOffer">
                            <div class="dealsimg">
                                <img src="{{ asset('images/product.jpeg') }}" alt="">
                                <div class="labelSale">-7%</div>
                                <div class="img-overlay">
                                    <button class="myBtn_multi">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="dealProductInfo">

                                <h4>@lang('dummy-data.product-title')</h4>
                                <div class="price-box">
                                    <span class="newPrice">$80.00</span>
                                    <span class="oldPrice">$86.00</span>
                                </div>


                                <div class="watsapp-order">
                                    <a href="#">
                                        @lang('front.order-now') <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="dealsOffer">
                            <div class="dealsimg">
                                <img src="{{ asset('images/product.jpeg') }}" alt="">
                                <div class="labelSale">-7%</div>
                                <div class="img-overlay">
                                    <button class="myBtn_multi">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="dealProductInfo">

                                <h4>@lang('dummy-data.product-title')</h4>
                                <div class="price-box">
                                    <span class="newPrice">$80.00</span>
                                    <span class="oldPrice">$86.00</span>
                                </div>


                                <div class="watsapp-order">
                                    <a href="#">
                                        @lang('front.order-now') <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse

            </div>

        </div>
        <div class="more-products">
            <div class="row">
                <div class="col-12">
                    <a href="{{ URL('products') }}">@lang('front.more-products')</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!--------------------------------our products End-------------------------------------->
<!------------------------------Success partner start----------------------------------->
<div class="Success-Partners section">
    <div class="container">
        <h2 class="title">
            @lang('front.partner')
        </h2>

        <div class="partner">
            <div class="row">

                @forelse ($partners as $partner)
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card wow fadeIn animated" data-wow-delay="1.2s"
                        style="visibility: visible;-webkit-animation-delay: 1.2s; -moz-animation-delay: 1.2s; animation-delay: 1.2s;">
                        <img src="{{ $partner->image->getUrl() }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="">{{$partner->name}}</h5>
                                <span>{{$partner->job_title}}</span>
                            </div>

                            <p class="card-text">
                                {{$partner->description}}
                            </p>

                        </div>
                    </div>
                </div>
                @empty
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card wow fadeIn animated" data-wow-delay="1.2s"
                        style="visibility: visible;-webkit-animation-delay: 1.2s; -moz-animation-delay: 1.2s; animation-delay: 1.2s;">
                        <img src="{{ asset('images/partner1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="">@lang('dummy-data.partner-name')</h5>
                                <span>@lang('dummy-data.partner-job-title')</span>
                            </div>

                            <p class="card-text">
                                @lang('dummy-data.partner-description')
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card wow fadeIn animated" data-wow-delay="1.2s"
                        style="visibility: visible;-webkit-animation-delay: 1.2s; -moz-animation-delay: 1.2s; animation-delay: 1.2s;">
                        <img src="{{ asset('images/partner2.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="">@lang('dummy-data.partner-name')</h5>
                                <span>@lang('dummy-data.partner-job-title')</span>
                            </div>

                            <p class="card-text">
                                @lang('dummy-data.partner-description')
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card wow fadeIn animated" data-wow-delay="1.2s"
                        style="visibility: visible;-webkit-animation-delay: 1.2s; -moz-animation-delay: 1.2s; animation-delay: 1.2s;">
                        <img src="{{ asset('images/partner3.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="">@lang('dummy-data.partner-name')</h5>
                                <span>@lang('dummy-data.partner-job-title')</span>
                            </div>

                            <p class="card-text">
                                @lang('dummy-data.partner-description')
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card wow fadeIn animated" data-wow-delay="1.2s"
                        style="visibility: visible;-webkit-animation-delay: 1.2s; -moz-animation-delay: 1.2s; animation-delay: 1.2s;">
                        <img src="{{ asset('images/partner4.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="">@lang('dummy-data.partner-name')</h5>
                                <span>@lang('dummy-data.partner-job-title')</span>
                            </div>

                            <p class="card-text">
                                @lang('dummy-data.partner-description')
                            </p>

                        </div>
                    </div>
                </div>

                @endforelse

            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------------------------->
<!---------------------------Image Gellery------------------------------------>
<div class="image-gellery">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title">
                    @lang('front.portfolio')
                </h2>
            </div>
        </div>
        <div class="row">
            @forelse($portfolios as $portfolio)
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail img-responsive">
                    <a href="#" title="Image 1"><img src="{{ $portfolio->image->getUrl() }}">
                    </a>
                </div>
            </div>
            @empty
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail img-responsive">
                    <a href="#" title="Image 1"><img src="{{ asset('images/img_1.png') }}">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail img-responsive">
                    <a href="#" title="Image 1"><img src="{{ asset('images/img_1.png') }}">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail img-responsive">
                    <a href="#" title="Image 1"><img src="{{ asset('images/img_1.png') }}">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail img-responsive">
                    <a href="#" title="Image 1"><img src="{{ asset('images/img_1.png') }}">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="thumbnail img-responsive">
                    <a href="#" title="Image 1"><img src="{{ asset('images/img_1.png') }}">
                    </a>
                </div>
            </div>
            @endforelse
        </div>
    </div>
    <div id="modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!---------------------------Image Gellery------------------------------------>

@endsection

@section('script')

@endsection
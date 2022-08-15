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
                    <img src="{{ $slider1->image->getUrl() }}" alt="slide1">
                    <div class="carousel-caption">
                        <h1 class="animated wow fadeInDown hero-heading animated sub-color" data-wow-delay=".4s">{{$slider1->title}}</h1>
                        <p class="animated fadeInUp wow hero-sub-heading animated " data-wow-delay=".6s">{!! $slider1->description !!}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="overlay"></div>

                    <img src="{{ $slider2->image->getUrl() }}" alt="slide3">
                    <div class="carousel-caption">
                        <h1 class="animated wow fadeInLeft hero-heading animated sub-color" data-wow-delay=".7s">{{ $slider2->title}}</h1>
                        <p class="animated wow fadeInRight hero-sub-heading animated " data-wow-delay=".9s">{!! $slider2->description !!}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="overlay"></div>

                    <img src="{{ $slider3->image->getUrl() }}" alt="slide3">
                    <div class="carousel-caption">
                        <h1 class="animated wow fadeInDown hero-heading animated sub-color" data-wow-delay=".6s">{{ $slider3->title}}</h1>
                        <p class="animated fadeInUp wow hero-sub-heading animated " data-wow-delay=".8s">{!! $slider3->description !!}</p>
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
                            {{$about_us->title}}
                         </h1>
                         <p style="-webkit-line-clamp: 5;">
                             {!! Str::limit($about_us->description , 600) !!}
                         </p>
                        <div class="read-more">
                            <a class="" href="{{ URL('aboutus') }}">@lang('front.read-more')</a>
                        </div>
                    </div>
                </div>

                <div class=" col-sm-12 col-md-12 col-lg-5">
                    <div class="single-col img-col">
                        <img src="{{ $about_us->image->getUrl() }}" alt="about-img" width="100%">
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
                    <h1 class="title">{{$our_products_page->title}}</h1>
                    <p>{{$our_products_page->description}}</p>
                </div>
            </div>
        </div>

        <div class="dealsBox">
            <div class="row">

                @foreach ($products as $product)

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

                @endforeach

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

                    @foreach ($partners as $partner)
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
                    @endforeach

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
                        معرض أعمالنا
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($portfolios as $portfolio)
                <div class="col-lg-4 col-sm-6">
                    <div class="thumbnail img-responsive">
                        
                        <a href="#" title="Image 1"><img
                                src="{{ $portfolio->image->getUrl() }}">
                        </a>
                    </div>
                </div>
                @endforeach
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

@extends('front.parent')


@section('style')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<style type="text/css">
    .product-price .old-price {
        text-decoration: line-through;
    }
</style>

<style>
    div#social-links {
        margin: 0 auto;
        max-width: 500px;
        display: inline-block;

    }

    div#social-links ul li {
        display: inline-block;
    }

    div#social-links ul li a {
        margin: 1px;
        font-size: 20px;
        color: #222;
    }
</style>

@endsection


@section('content')

<!--modal-->

<div class="about-us section">
    <div class="container">
        <div class="row">

            <!-- Modal content -->
            {{-- <div class="modal-content pro-deatails"> --}}
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="single-col">
                            <div class="modal-img">
                                @if($product != null)
                                <img src="{{ $product->image->getUrl() }}" alt="1" width="100%">
                                @else
                                <img src=" {{ asset('images/product.jpeg') }}" alt="1" width="100%">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="product-deatails">
                            <h3 class="product-name">
                                @if($product != null)
                                {{$product->title}}
                                @else
                                @lang('dummy-data.product-title')
                                @endif
                            </h3>
                            <div class="product_rating mb-15">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="product-price">
                                <span class="new-price">
                                    @if($product != null)
                                    ${{$product->discounted_price}}
                                    @else
                                    $80.00
                                    @endif
                                    </span>
                                <span class="old-price">
                                    @if($product != null)
                                    ${{$product->price}} 
                                    @else
                                    $86.00
                                    @endif
                                </span>
                            </div>
                            <p class="deatalies"> 
                                @if($product != null)
                                {!! $product->description !!}
                                    @else
                                    @lang('dummy-data.product-description')
                                    @endif
                                </p>
                            <div class="watsapp-order">
                                @if($product != null)
                                <a href="{{$product->link}}">
                                    @lang('front.order-now')
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                @else
                                <a href="#">
                                    @lang('front.order-now') <i class="fab fa-whatsapp"></i>
                                </a>
                                @endif
                            </div>
                            <div class="share" style="text-align: start;">
                                <span style="display: inline;">@lang('front.share')</span>
                                {{-- <div class="icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                </div> --}}
                                <div class="container mt-4" style="display: inline;">
                                    {!! $shareComponent !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{--
            </div> --}}

        </div>
    </div>
</div>


@endsection


@section('script')

@endsection
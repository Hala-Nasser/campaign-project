@extends('front.parent')


@section('style')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<style type="text/css">
    .product-price .old-price{
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
                        <img src="{{ $product->image->getUrl() }}" alt="1" width="100%">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="product-deatails">
                    <h3 class="product-name">{{$product->title}}</h3>
                    <div class="product_rating mb-15">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="product-price">
                        <span class="new-price">${{$product->discounted_price}}</span>
                        <span class="old-price">${{$product->price}} </span>
                    </div>
                    <p class="deatalies"> {!! $product->description !!}</p>
                    <div class="watsapp-order">
                                        {{-- @foreach ($links as $link)
                @if($link->title == "whatsapp") --}}
                <a href="{{$product->link}}">
                    اطلبها من خلال واتس آب
                    <i class="fab fa-whatsapp"></i>
                </a>
                {{-- @endif  
                @endforeach                                         --}}                                      
                                    </div>
                    <div class="share" style="text-align: start;">
                        <span style="display: inline;">شاركها مع الأصدقاء</span>
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
    {{-- </div> --}}

        </div>
    </div>
 </div>

 
@endsection


@section('script')


    <script>
        // Get the modal

        var modalparent = document.getElementsByClassName("modal_multi");

        // Get the button that opens the modal

        var modal_btn_multi = document.getElementsByClassName("myBtn_multi");

        // Get the <span> element that closes the modal
        var span_close_multi = document.getElementsByClassName("close_multi");

        // When the user clicks the button, open the modal
        function setDataIndex() {

            for (i = 0; i < modal_btn_multi.length; i++) {
                modal_btn_multi[i].setAttribute('data-index', i);
                modalparent[i].setAttribute('data-index', i);
                span_close_multi[i].setAttribute('data-index', i);
            }
        }



        for (i = 0; i < modal_btn_multi.length; i++) {
            modal_btn_multi[i].onclick = function () {
                var ElementIndex = this.getAttribute('data-index');
                modalparent[ElementIndex].style.display = "block";
            };

            // When the user clicks on <span> (x), close the modal
            span_close_multi[i].onclick = function () {
                var ElementIndex = this.getAttribute('data-index');
                modalparent[ElementIndex].style.display = "none";
            };

        }

        window.onload = function () {

            setDataIndex();
        };

        window.onclick = function (event) {
            if (event.target === modalparent[event.target.getAttribute('data-index')]) {
                modalparent[event.target.getAttribute('data-index')].style.display = "none";
            }

            // OLD CODE
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };

        //XXXXXXXXXXXXXXXXXXXXXXX    Modified old code    XXXXXXXXXXXXXXXXXXXXXXXXXX

        // Get the modal

        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = modal.getElementsByClassName("close")[0]; // Modified by dsones uk

        // When the user clicks on the button, open the modal

        btn.onclick = function () {

            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }



    </script>

@endsection
@extends('front.parent')


@section('style')

<style type="text/css">
    .modal-content.pro-product-deatails .product-price .old-price{
        text-decoration: line-through;
    }
  </style>
    
@endsection


@section('content')

   
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
                                        اطلبها من خلال واتس آب
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
                        <a href="#">المزيد من المتجات</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--------------------------------our products End-------------------------------------->
 
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
@foreach($products as $product)

<div class="col-sm-12 col-md-6 col-lg-4">
    <div class="item">
        <div class="dealsOffer">
            <div class="dealsimg">
                <img src="{{ $product->image->getUrl() }}" alt="">
                <div class="labelSale">{{$product->discount_percentage}}%</div>
                <div class="img-overlay">
                    <a href="#" style="additive-symbols: ">
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
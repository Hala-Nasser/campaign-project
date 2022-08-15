@extends('front.parent')


@section('style')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

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

            <div class="dealsBox" style="
            min-height: auto;
            margin: 20px auto;">
                <div class="row">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div id="post_data"></div>
                    {{-- @foreach ($products as $product)

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
  
                    @endforeach --}}

                </div>

            </div>
            {{-- <div class="more-products">
                <div class="row">
                    <div class="col-12"> --}}
                        {{-- <a href="#" id="load-more">المزيد من المنتجات</a> --}}
                        {{-- <button class="btn btn-primary" id="load-more" data-paginate="2">Load more...</button>
                    
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
    <!--------------------------------our products End-------------------------------------->
 
@endsection


@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
 
    var _token = $('input[name="_token"]').val();
   
    load_data('', _token);
   
    // document.write('load data metho');
    function load_data(id="", _token)
    {

     $.ajax({
      url:"{{ route('load') }}",
      method:"POST",
      data:{id:id, _token:_token},
      beforeSend: function(xhr){
        xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
    },
      success:function(data)
      {
        // document.write('suc');
       $('#load_more_button').remove();
       $('#post_data').append(data);
      }
     })
     .fail(function(jqXHR, ajaxOptions, thrownError) {
              alert(jqXHR.statusText);
           });
}
    

    // document.write(' after load data metho');
   
    $(document).on('click', '#load_more_button', function(){
     var id = $(this).data('id');
     $('#load_more_button').html('<b>Loading...</b>');
     load_data(id, _token);
    });
   
   });
</script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    var paginate = 1;
    loadMoreData(paginate);

    $('#load-more').click(function() {
        var page = $(this).data('paginate');
        loadMoreData(page);
        $(this).data('paginate', page+1);
    });
    // run function when user click load more button
    function loadMoreData(paginate) {
        $.ajax({
            url: '?page=' + paginate,
            type: 'get',
            datatype: 'html',
            beforeSend: function() {
                $('#load-more').text('Loading...');
            }
        })
        .done(function(data) {
            if(data.length == 0) {
                $('.invisible').removeClass('invisible');
                $('#load-more').hide();
                return;
              } else {
                $('#load-more').text('Load more...');
                $('#post').append(data);
              }
        })
           .fail(function(jqXHR, ajaxOptions, thrownError) {
              alert('Something went wrong.');
           });
    }
</script> --}}

@endsection
@extends('front.parent')


@section('style')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<style type="text/css">
    .modal-content.pro-product-deatails .product-price .old-price {
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
            <div class="row" id="post_data">
                @include('front.data')
            </div>

        </div>
        <div class="more-products">
            <div class="row">
                <div class="col-12">
                    <a href="#" id="load-more">@lang('front.more-products')</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!--------------------------------our products End-------------------------------------->

@endsection


@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    var page = 1;
    var end_point = "{{url('/')}}";
    $('#load-more').click(function() {
        page++;
        loadMoreData(page);
    });

    function loadMoreData(page) {
        $.ajax({
            url: 'products?page=' + page,
            type: 'get',
            beforeSend: function() {
                $('#load-more').show();
            }
        })
        .done(function(data) {
            if(data.html == "") {
                $('.invisible').removeClass('invisible');
                $('#load-more').hide();
                return;
              } else {
                $('#post_data').append(data.html);
              }
        })
           .fail(function(jqXHR, ajaxOptions, thrownError) {
              alert('Something went wrong.');
           });
    }
</script>

@endsection
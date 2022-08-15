@extends('front.parent')


@section('style')

@endsection


@section('content')

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
                    <p>
                        @if($about_us == null)
                          @lang('dummy-data.about-description')
                        @else
                          {!! $about_us->description !!}
                        @endif
                    </p>

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

@endsection



@section('script')

@endsection
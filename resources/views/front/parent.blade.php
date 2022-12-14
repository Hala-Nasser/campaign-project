<!Doctype html>
<html>

<head>
    <title>@lang('front.knbah')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.lineicons.com/1.0.0/LineIcons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/slicknav.css')}}">

    <meta id="token" name="token" content="{{ csrf_token() }}">


    @if(app()->getLocale() == 'ar')    
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}" type="text/css">
      @else
      {{-- english style --}}
      <link rel="stylesheet" href="{{asset('front/css/style.css')}}" type="text/css">
      @endif


    @yield('style')
 

</head>

<body>
    <!--***********************************************************-->
    <!--Start Black-header Section-->
    <div class="black-header">
        <div class="header-contenent">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-md-7 col-sm-12">
                        <div class="socialIcons ">
                            @forelse ($links as $link)
                            @if ($link->title != "whatsapp")
                            <a class="{{$link->title}}" href="{{$link->value}}"><i class="lni-{{$link->title}}-filled"></i></a>                                
                            @endif
                            @empty
                            <a class="facebook" href="##"><i class="lni-facebook-filled"></i></a>
                            <a class="twitter" href="##"><i class="lni-twitter-filled"></i></a>
                            <a class="instagram" href="##"><i class="lni-instagram-filled"></i></a>
                            <a class="linkedin" href="##"><i class="lni-linkedin-filled"></i></a>
                            <a class="google" href="##"><i class="fab fa-pinterest-p"></i></a>
                            @endforelse
                        </div>

                    </div>

                    <div class="col-lg-7 col-md-5 col-sm-12">
                        <ul class="support">
                            <li>
                                <a href="tel:@if($about == null)
                                970567070203+
                                @else
                                {{$about->phone}}
                                @endif"><i class="lni-phone"></i>
                                @if($about == null)
                                970567070203+
                                @else
                                {{$about->phone}}
                                @endif</a>
                            </li>
                            <li>
                                <a href="@if($about == null)
                                kanaba@gmail.com
                                @else
                                {{$about->email}}
                                @endif"><i class="lni-envelope"></i>@if($about == null)
                                kanaba@gmail.com
                                @else
                                {{$about->email}}
                                @endif</a>
                            </li>
                        </ul>
                    </div>

                    <div class="clear-fix"></div>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar top-nav-collapse">
                <div class="container">

                    <div class="logo">
                        @if($about == null)
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                        @else
                        <img src="{{ $about->logo->getUrl() }}" alt="logo">
                        @endif
                    </div>
                    <div class="navbar-header"></div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav nav-pills  w-100 ">
                            <!--justify-content-center -->

                            <li class="nav-item"  id="index">
                                <a class="nav-link @if (\Request::url() == URL('index')) active @endif" href="{{ URL('index') }}">@lang('front.home')</a>
                            </li>

                            <li class="nav-item"  id="aboutus">
                                <a class="nav-link @if (\Request::url() == URL('aboutus')) active @endif" href="{{ URL('aboutus') }}">@lang('front.about-us')</a>
                            </li>

                            <li class="nav-item" id="products">
                                <a class="nav-link @if (\Request::url() == URL('products')) active @endif" href="{{ URL('products') }}">@lang('front.our-products')</a>
                            </li>
                            <li class="nav-item" id="contactusm">
                                <a class="nav-link @if (\Request::url() == URL('contactus')) active @endif" href="{{ URL('contactus') }}">@lang('front.contact-us')</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <ul class="mobile-menu">
                    <li class="activemobile ">
                        <a href="{{ URL('index') }}" class="activemobile">@lang('front.home')</a>
                    </li>
                    <li>
                        <a href="{{ URL('aboutus') }}">@lang('front.about-us')</a>
                    </li>
                    <li>
                        <a href="{{ URL('products') }}">@lang('front.our-products')</a>
                    </li>


                    <li>
                        <a href="{{ URL('contact') }}">@lang('front.contact-us')</a>
                    </li>
                    <!--End mobile Menu-->
                </ul>

                 <!-- Right navbar links -->
            @if(count(config('panel.available_languages', [])) > 1)
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        @endif
            </nav>
        </div>

    </div>
    <!--End  Black-header Section-->
    <!--***************************************************************************************************-->
    @yield('content')


    

  



    <!-- BlackFooter Section Start-->
    <div class="blackfooter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-mb-12">
                    <div class=" justify-content-center ">
                        <p class="copy-right">@lang('front.copy-right')</p>
                        <p class="by">@lang('front.by')</p>

                    </div>
                </div>


            </div>
        </div>
    </div>
    
    
    <!-- BlackFooter Section End-->
    <!-------------------------------------------------------------------------------------------------->








    <!--Call Java Script Files-->
    <script src="{{asset('front/js/jquery-2.2.3.min.js')}}"></script>
    <script src="{{asset('front/js/popper.min.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/wow.js')}}"></script>
    <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function () {
          @if (\Request::url() == URL('index'))
          $('#index').addClass('nav-item activepage');
        @elseif (\Request::url() == URL('aboutus'))
          $('#aboutus').addClass('nav-item activepage');
        @elseif (\Request::url() == URL('products'))
          $('#products').addClass('nav-item activepage');
        @elseif (\Request::url() == URL('contactus'))
          $('#contactusm').addClass('nav-item activepage');
        @endif
      });
      </script>

    @yield('script')



</body>

</html>
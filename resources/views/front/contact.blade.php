@extends('front.parent')


@section('style')
    
@endsection


@section('content')

    <!--------------------------------About US Start---------------------------------------->
    <div class="contact-page section">
        <div class="container">
            <div class="row">
                <div class=" col-sm-12 col-md-12 col-lg-12">
                        <h1 class="title">
                    @lang('front.contact-us')
                        </h1>
                </div>

             
            </div>
             
            <div class="main-contact-form">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-7">
                        <div class="single-col white-bg">
                            <h4>@lang('front.fill-contact-info')</h4>
                            <span>@lang('front.will-contact-you')</span>
                            
                            <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                                @lang('front.success-contact')
                              </div>
                            <form id="SubmitForm">
                                @csrf
                                <div class="form-group">
                                    <label for="name">@lang('front.name')</label>
                                    <input type="text" class="form-control" id="InputName" placeholder="@lang('front.name-placeholder')" name="name">
                                    <span class="text-danger" id="nameErrorMsg"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">@lang('front.email')</label>
                                    <input type="email" class="form-control" id="InputEmail" placeholder="info@email.com" name="email">
                                    <span class="text-danger" id="emailErrorMsg"></span>
                                </div>
                                <div class="form-group">
                                    <label for="messge">@lang('front.message')</label>
                                    <textarea class="form-control" id="InputMessage" name="message" placeholder="@lang('front.message-placeholder')"></textarea>
                                    <span class="text-danger" id="messageErrorMsg"></span>                                
                                </div>
                
                                <button type="submit" class="btn btn-primary">@lang('front.send')</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="single-col orange-bg">
                            <h4>@lang('front.contact-info')</h4>
                            <ul class="contact-info-list">
                                <li>
                                    <i class="fas fa-mobile-alt"></i>
                                    <span class="phon-number">{{$about->phone}}</span>
                                </li>
                                <li>
                                    <i class="far fa-envelope"></i>
                                    <span>{{$about->email}}</span>
                                </li>
                                <li>
                                    <i class="fas fa-globe"></i>
                                    <span>{{$about->website}}</span>
                                </li>
    
                            </ul>
    
                            <ul class="social-link">
                                @forelse ($links as $link)
                                <li>
                                    <a href="{{$link->value}}">
                                        <i class="fab fa-{{$link->title}}"></i>
                                    </a>
                                </li>
                                @empty
                                <li>
                                    <a href="#">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                   <a href="#">
                                    <i class="fab fa-instagram"></i>
                                   </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------About US End------------------------------------------>

    
    <!-------------------------------------------------------------------------------------------------->




@endsection



    <!--Call Java Script Files-->
    
@section('script')
       
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

$('#SubmitForm').on('submit',function(e){
    e.preventDefault();

    let name = $('#InputName').val();
    let email = $('#InputEmail').val();
    let message = $('#InputMessage').val();
    
    $.ajax({
      url: "/contact/store",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        email:email,
        message:message,
      },
      success:function(response){
        $('#successMsg').show();
        console.log(response);
        document.getElementById('InputName').value = '';
        document.getElementById('InputEmail').value = '';
        document.getElementById('InputMessage').value = '';
      },
      error: function(response) {
        $('#nameErrorMsg').text(response.responseJSON.errors.name);
        $('#emailErrorMsg').text(response.responseJSON.errors.email);
        $('#messageErrorMsg').text(response.responseJSON.errors.message);
      },
      });
    });
  </script>

@endsection
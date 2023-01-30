@extends('layouts.home')
@section('content')
   
     <div class="detai_page container card col-sm-3" style="margin-top: 8rem !important;margin-bottom: 3rem;">
            <div class="signn">Maintenance</div>
              <div class="" style="">
        {{ HTML::image('public/images/maintenance.jpg', SITE_TITLE, ['style' => 'width:450px;height:380px']) }} 
            {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
            <div class="card-body">
                
                <h3 class="mb-3 text-2xl font-bold text-center text-gray-700">
                    Temporarily down for maintenance
                    We’ll be back soon!
                </h3>
                <p class="card-text">Sorry for the inconvenience but we’re performing some maintenance at the moment.
                    If you need to you can always <a href="{{ URL::to('contact-us') }}" class="text-blue-600 hover:underline">Contact us </a>, otherwise
                    we’ll be back online shortly!<br></p>
                   <p style="text-align: end;"> —<b> Biznaaz</b></p>
                {{-- <a href="{{ URL::to('index1') }}" class="btn btn-primary">Go Home</a> --}}
            </div>
        </div>        
            
        </div>
@endsection

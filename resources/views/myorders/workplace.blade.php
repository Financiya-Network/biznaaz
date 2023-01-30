@extends('layouts.inner')
@section('content')
<script type="text/javascript">
    var img_path = "{!! HTTP_PATH !!}/public/img";
</script>
{{ HTML::script('public/js/jquery.raty.min.js')}}
<script type="text/javascript">
    $(document).ready(function () {
        $("#requestform").validate();
    });    
 </script>
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
            <div class="workplace">
                <div class="manage-btn">Gig Work Place
                    @if($orderInfo->seller_id == Session::get('user_id'))
                    <a href="{{ URL::to( 'selling-orders') }}" class="btn btn-primary">Back</a>                
                    @else 
                    <a href="{{ URL::to( 'buying-orders') }}" class="btn btn-primary">Back</a>
                    @endif
                </div>
                <div class="req_dtl">
                    <div class="req_dtl_head">Order Information</div>
                    <div class="req_row">
                        <label>Gig Title: </label> <span>{{$gigInfo->title or ''}}</span>
                    </div>
                    <div class="req_row">
                        <label>Package: </label> <span>{{$orderInfo->package }}</span>
                    </div>
                    <div class="req_row">
                        <label>OrderID: </label> <span>
                            @if($orderInfo->pay_type === 'Wallet')
                                {{$orderInfo->wallet_trn_id}}
                            @else 
                                {{$orderInfo->paypal_trn_id}}
                            @endif
                        </span>
                    </div>
                    <div class="req_row">
                        <label>Amount: </label> <span>{{CURR.$orderInfo->revenue}}</span>
                    </div>
                    <div class="req_row">
                        <label>Payment Type: </label> <span>{{$orderInfo->pay_type}}</span>
                    </div>
                    <div class="req_row">
                        <label>Order Date: </label> <span>{{$orderInfo->created_at->format('d M, Y')}}</span>
                    </div>
                    
                    <div class="req_row">
                        <label>GIG Documents: </label> <span>
                            @if(!empty($gigInfo->pdf_doc))
                            @php $pdf_doc = explode(',',$gigInfo->pdf_doc) @endphp
                        @if(count(array_filter($pdf_doc) )> 0)
                        <ul>

                                    @foreach (array_filter($pdf_doc) as $attachmental)
                                    @if(file_exists(GIG_DOC_FULL_UPLOAD_PATH.$attachmental) && $attachmental!="")
                                    

                                    <li data-img="{{$attachmental}}" class="portfolio-cc">{{substr($attachmental,9)}}<a href="{{GIG_DOC_FULL_DISPLAY_PATH.$attachmental}}" class="delete" download><i class="fa fa-download"></i></a></li>
                                    
                                    @endif
                                    @endforeach
                                </ul>
                        @endif
                            @endif
                        </span>
                    </div>
                    <div class="req_row">
                        <label>Gig Ready Made Document: </label> <span>
                            @if(!empty($gigInfo->document))
                            @php $pdf_doc = explode(',',$gigInfo->document) @endphp
                        @if(count(array_filter($pdf_doc) )> 0)
                        <ul>

                                    @foreach (array_filter($pdf_doc) as $attachmental)
                                    @if(file_exists(GIG_DOC_FULL_UPLOAD_PATH.$attachmental) && $attachmental!="")
                                    

                                    <li data-img="{{$attachmental}}" class="portfolio-cc">{{substr($attachmental,9)}}<a href="{{GIG_DOC_FULL_DISPLAY_PATH.$attachmental}}" class="delete" download><i class="fa fa-download"></i></a></li>
                                    
                                    @endif
                                    @endforeach
                                </ul>
                        @endif
                            @endif
                        </span>
                    </div>
                    
                    <div class="req_dtl_head">Gig Extra Information</div>
                      <!-- <div class="req_row">
                        <label>Extra Gig ID: </label> <span>{{$orderInfo->extra_ids}}</span>
                    </div> -->
                    <div class="req_row">
                        <label>Gig Extra: </label> <span> <?php 

                    $extra_ids = explode(',',$orderInfo->extra_ids);
                                        if ($extra_ids) {
                                            foreach ($extra_ids as $extra_id) {
                                                if(isset($gigextra[$extra_id])){
                                                echo $gigextra[$extra_id].'<br>';
                                                }
                                                
                                            }
                                        }else{
                                           echo 'N/A';
                                        }
                                        ?></span>
                    </div>
                    <div class="req_row">
                        <label>Description: </label> <span> <?php 

                    $extra_ids = explode(',',$orderInfo->extra_ids);
                    
                                        if ($extra_ids) {
                                            foreach ($extra_ids as $extra_id) {
                                                 // print_r($extra_ids);exit;
                                                if(isset($gigextra[$extra_id])){

                                                     $gigdescription=DB::table('gigextras')->where('id',$extra_id)->first();
                                                     // $user = DB::table('users')->where('name', 'John')->first();
                                                     //print_r($gigdescription);exit;

                                                echo $gigdescription->description.'<br>';
                                                }
                                                
                                            }
                                        }else{
                                           echo 'N/A';
                                        }
                                        ?></span>
                    </div>
                    <div class="req_row">
                        <label>Number Of Hours : </label> <span> <?php 

                    $extra_ids = explode(',',$orderInfo->extra_ids);
                    
                                        if ($extra_ids) {
                                            foreach ($extra_ids as $extra_id) {
                                                 // print_r($extra_ids);exit;
                                                if(isset($gigextra[$extra_id])){

                                                     $gigdescription=DB::table('gigextras')->where('id',$extra_id)->first();
                                                     // $user = DB::table('users')->where('name', 'John')->first();
                                                     //print_r($gigdescription);exit;

                                                echo $gigdescription->delivery." "."Hours".'<br>';
                                                }
                                                
                                            }
                                        }else{
                                           echo 'N/A';
                                        }
                                        ?></span>
                    </div>
                    
                     <div class="req_dtl_head">Gig Requirement Information</div>
                      <!-- <div class="req_row">
                        <label>Extra Gig ID: </label> <span>{{$orderInfo->extra_ids}}</span>
                    </div> -->
                    <div class="req_row">
                        <label>Requirements: </label> <span> <?php 

                   // $reqs = explode(',',$gigrequirement->description);
                                       // if ($req) {
                                           // foreach ($reqs as $req) {
                                                if(isset($gigrequirement->description)){
                                                echo $gigrequirement->description.'<br>';
                                               // }
                                                
                                            }
                                        else{
                                           echo 'N/A';
                                        }
                                        ?></span>
                    </div>
                    <div id="sentmessages" class="req_row"></div>
                </div>

                <div class="management-bx">
                    <div class="message_chat">
                        <div class="req_dtl_head">Messages</div>
                        <div class="comment-form-bx sendmesg">
                            <div class="comment-form">
                                <div class="ee er_msg postfrm">@include('elements.errorSuccessMessage')</div>
                                {{ Form::open(array('method' => 'post', 'id' => 'requestform', 'enctype' => "multipart/form-data")) }}
                                    <div class="input textarea">
                                        {{Form::textarea('message', null, ['class'=>'form-control textarea_box required', 'placeholder'=>"Write your message here", 'autocomplete' => 'off', 'rows'=>5, 'id'=>'description'])}}
                                    </div>   
                                    <div class="send_msgg">
                                        <div class="send_file">
                                            {{Form::file('attachment', ['class'=>'form-control', 'accept'=>IMAGE_EXT.' ,application/pdf, application/msword, text/plain'])}}
                                            <span class="help-text"> Supported File Types: jpg, jpeg, png, doc, docx, pdf  (Max. {{ MAX_IMAGE_UPLOAD_SIZE_DISPLAY }}).</span>
                                        </div>
                                        <div class="send_file"><input class="btn btn-success" value="Send" type="submit"></div>
                                    </div>
                                {{ Form::close()}}
                            </div>
                        </div>
                        <div class="all_msgg">
                            @if(!$gigmessages->isEmpty())
                                @foreach($gigmessages as $allrecord)
                                        <div class="messages-bx @if($allrecord->receiver_id == Session::get('user_id')) messages-bx-right @endif">
                                            <div class="user-profile-message">
                                                @if($allrecord->Sender->profile_image)
                                                <a href="{{ URL::to( 'public-profile/'.$allrecord->Sender->slug)}}">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$allrecord->Sender->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                                @else
                                                <a href="{{ URL::to( 'public-profile/'.$allrecord->Sender->slug)}}">{{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                                @endif
                                            </div>
                                            <div class="meassages-txt">
                                                <h2><a href="{{ URL::to( 'public-profile/'.$allrecord->Sender->slug)}}">{{$allrecord->Sender->first_name.' '.$allrecord->Sender->last_name}}</a></h2>
                                                <div class="message-date"><i class="fa fa-calendar" aria-hidden="true"></i><span>{{$allrecord->created_at->diffForHumans()}}</span></div>
                                                <p>
                                                    {{nl2br($allrecord->message)}}
                                                </p>
                                                @if($allrecord->attachment && file_exists(GIG_MSG_FULL_UPLOAD_PATH.$allrecord->attachment))
                                                    <a class="ggimsgat" href="{{ URL::to( 'myorders/download/'.$orderInfo->slug.'/'.$allrecord->attachment)}}">{{substr($allrecord->attachment, 9)}}</a>
                                                @endif
                                            </div>
                                        </div>
                                @endforeach
                            @endif                            
                        </div>
                    </div>
                    <div class="workplace-seller sticky">
                        <div class="offer_dtl" >
                            @if($orderInfo->seller_id == Session::get('user_id'))
                            <div class="req_dtl_head">About the Buyer</div>
                            <div class="dpimg-about_right">
                                <div class="buy_row">
                                    <div class="buy_img">
                                        @if($orderInfo->Buyer->profile_image)
                                        <a href="{{ URL::to( 'public-profile/'.$orderInfo->Buyer->slug)}}">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$orderInfo->Buyer->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                        @else
                                        <a href="{{ URL::to( 'public-profile/'.$orderInfo->Buyer->slug)}}">{{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                        @endif
                                    </div>
                                    <div class="buy_name">
                                        <span><a href="{{ URL::to( 'public-profile/'.$orderInfo->Buyer->slug)}}">{{$orderInfo->Buyer->first_name.' '.$orderInfo->Buyer->last_name}}</a></span>
                                        <div class="about-rating">
                                            <script>
                                                $(function() {
                                                    $('#avgRating22').raty({
                                                        starOn:    'star-on.png',
                                                        starOff:   'star-off.png',
                                                        start: {{$orderInfo->Buyer->average_rating}},
                                                        readOnly: true
                                                    });
                                                });
                                            </script>
                                            <span class="pprate" id="avgRating22"></span>
                                            <span class="rating-view"><b>{{$orderInfo->Buyer->average_rating}}</b> ({{$orderInfo->Buyer->total_review}} reviews)</span>
                                        </div>
                                     </div>
                                </div>
                                <div class="buy_row">
                                    <ul class="general-info">
                                        <li>
                                            <label><i class="fa fa-map-marker" aria-hidden="true"></i>From</label>
                                            <span>@isset($orderInfo->Buyer->Country->name) {{$orderInfo->Buyer->Country->name}} @endisset</span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-user" aria-hidden="true"></i>Member since</label>
                                            <span>{{$orderInfo->Buyer->created_at->format('M Y')}}</span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-language" aria-hidden="true"></i>Languages</label>
                                            <span>
                                                @if($orderInfo->Buyer->languages)
                                                    @foreach(json_decode($orderInfo->Buyer->languages) as $key => $lang)                                                      
                                                    @if(!$loop->first), @endif{!!$lang->lang_name!!}
                                                    @endforeach
                                                @else 
                                                    N/A
                                                @endif                                                 
                                            </span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            @else 
                            <div class="req_dtl_head">About the Seller</div>
                            <div class="dpimg-about_right">
                                <div class="buy_row">
                                    <div class="buy_img">
                                        @if($orderInfo->Seller->profile_image)
                                        <a href="{{ URL::to( 'public-profile/'.$orderInfo->Seller->slug)}}">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$orderInfo->Seller->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                        @else
                                        <a href="{{ URL::to( 'public-profile/'.$orderInfo->Seller->slug)}}">{{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                        @endif
                                    </div>
                                    <div class="buy_name">
                                        <span><a href="{{ URL::to( 'public-profile/'.$orderInfo->Seller->slug)}}">{{$orderInfo->Seller->first_name.' '.$orderInfo->Seller->last_name}}</a></span>
                                        <div class="about-rating">
                                            <script>
                                                $(function() {
                                                    $('#avgRating22').raty({
                                                        starOn:    'star-on.png',
                                                        starOff:   'star-off.png',
                                                        start: {{$orderInfo->Seller->average_rating}},
                                                        readOnly: true
                                                    });
                                                });
                                            </script>
                                            <span class="pprate" id="avgRating22"></span>
                                            <span class="rating-view"><b>{{$orderInfo->Seller->average_rating}}</b> ({{$orderInfo->Seller->total_review}} reviews)</span>
                                        </div>
                                     </div>
                                </div>
                                <div class="buy_row">
                                    <ul class="general-info">
                                        <li>
                                            <label><i class="fa fa-map-marker" aria-hidden="true"></i>From</label>
                                            <span>@isset($orderInfo->Seller->Country->name) {{$orderInfo->Seller->Country->name}} @endisset</span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-user" aria-hidden="true"></i>Member since</label>
                                            <span>{{$orderInfo->Seller->created_at->format('M Y')}}</span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-language" aria-hidden="true"></i>Languages</label>
                                            <span>
                                                @if($orderInfo->Seller->languages)
                                                    @foreach(json_decode($orderInfo->Seller->languages) as $key => $lang)                                                      
                                                    @if(!$loop->first), @endif{!!$lang->lang_name!!}
                                                    @endforeach
                                                @else 
                                                    N/A
                                                @endif                                                 
                                            </span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
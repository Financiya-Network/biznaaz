
<div role="tabpanel" class="tab-pane active" id="allproduct">
    <div class="dashboard-rights-section">
        <div class="row">
            @if(!$allrecords->isEmpty())
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <div class="creat-new">
                        <a href="{{ URL::to( 'gigs/create')}}" class="">
                            <i> {{HTML::image('public/img/front/plus.png', SITE_TITLE)}}</i>
                            <span>Create a new gig</span>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            {{Form::hidden('page', $page, ['id'=>'gigpage'])}}

            <div class="main_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
                @if(!$allrecords->isEmpty()) 
                <?php global $serviceDays; ?>
                @foreach($allrecords as $allrecord)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <div class="project-img">
                            <?php 
                            if ($allrecord->pause == 0 || ($allrecord->User->accept_orders == 0 || $allrecord->User->hide_weekend == 1)) { ?>
                                <div class="paused-project">Paused</div>
                            <?php }elseif ($allrecord->status == 0) { ?>
                                <div class="paused-project">Draft</div>
                            <?php }else{ ?>
                                <div class="active-project">Active</div>
                            <?php } ?>
                            
                            <div class="delete-product"><a href="{{ URL::to( 'gigs/delete/'.$allrecord->slug)}}" class="" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                            <?php
                            $gigimgname = '';
                            if ($allrecord->Image) {
                                foreach ($allrecord->Image as $gigimage) {
                                    if (isset($gigimage->name) && !empty($gigimage->name)) {
                                        $path = GIG_FULL_UPLOAD_PATH . $gigimage->name;
                                        if (file_exists($path) && !empty($gigimage->name)) {
                                            $gigimgname = GIG_FULL_DISPLAY_PATH . $gigimage['name'];
                                            break;
                                        }
                                    }
                                }
                            }
                            if ($gigimgname == '' && $allrecord->youtube_image) {
                                if (file_exists(GIG_FULL_UPLOAD_PATH . $allrecord->youtube_image)) {
                                    $gigimgname = GIG_FULL_DISPLAY_PATH . $allrecord->youtube_image;
                                }
                            }
                            if ($gigimgname == '') {
                                $gigimgname = 'public/img/front/dummy.png';
                            }
                            ?>
                            <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class="">{{HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->title])}}</a>
                        </div>
                        <div class="caption">
                            <h3><a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class="">{{ mb_substr($allrecord->title,0,40)}}</a></h3>
                            <div class="pro-bottm">
                                <div class="pro-bottm-left newmanage-icon">
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <!--<a href="#" class="bar-icons"> {{HTML::image('public/img/front/bar-icon.png', SITE_TITLE)}}<span class="listtoltip">Analytics for your Gig.</span></a>-->
                                    <p class="manageonoff">
                                        <?php
                                        if ($allrecord->pause == 1) {
                                            $selectG = "checked='checked'";
                                            ?>
                                        <input type="checkbox" value="1" id="checkboxID{{$allrecord->id}}" name="pause[{{$allrecord->id}}]" onclick="updatecon1({{$allrecord->id}})" <?php echo $selectG; ?>>
                                        <?php
                                        } else {
                                            $selectG = "";?>
                                        <input type="checkbox" value="1" id="checkboxID{{$allrecord->id}}" name="pause[{{$allrecord->id}}]" onclick="updatecon({{$allrecord->id}})" <?php echo $selectG; ?>>
                                        <?php }
                                        ?>
                                        
                                        <label for="checkboxID{{$allrecord->id}}"></label>
                                        <span class="listtoltip">You can pause Gig. This will be removed from ranking and search results, but Gig will be available for pre-order within 30 days, after a pause.</span>
                                    </p>
                                </div>
                                <div class="pro-bottm-right">
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}">  {{CURR.$allrecord->basic_price}}<!--{{$allrecord->basic_price.CURR}}--></a>
                                </div>
                            </div>
                        </div>
                        <div id="offer-show-{{$allrecord->id}}" class="show-adwanv">
                            <ul>
                                <li>
                                    <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class=""><i class="fa fa-pencil" aria-hidden="true"></i><span>Edit</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}" class=""><i class="fa fa-eye" aria-hidden="true"></i><span>View Detail</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to( 'gigs/delete/'.$allrecord->slug)}}" class="" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></a>
                                </li>

                                <li class="advanced-setting">
                                    <a href="javascript:void(0);" class="clsstng" id="close-{{$allrecord->id}}"><i class="fa fa-close" aria-hidden="true"></i><span>Close</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                @if($page == 1)

                @endif
                <script>$('#reqloaddiv').show();</script>
                @else
                @if($page == 1)
                <script>$('#reqloaddiv').hide();</script>
                <div class="col-md-12"><div class="management-full">No gigs found. </div></div>
                @else
                <script>$('#reqloaddiv').hide();</script>
                @endif
                @endif
            @if(!$allrecords->isEmpty() && count($allrecords) >= $limit)
            <!--<div class="loadmore" id="reqloaddiv">
                <span class="loadmorebtn" id="loadmorebtn" onclick="gigloadmore()">Load more...</span>
            </div>-->
            @endif
        </div>
    </div>
</div>

<div role="tabpanel" class="tab-pane" id="activeproduct">
    <div class="dashboard-rights-section">
        <div class="row">
            @if(!$allrecords->isEmpty())
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <div class="creat-new">
                        <a href="{{ URL::to( 'gigs/create')}}" class="">
                            <i> {{HTML::image('public/img/front/plus.png', SITE_TITLE)}}</i>
                            <span>Create a new gig</span>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            {{Form::hidden('page', $page, ['id'=>'gigpage'])}}

            <div class="main_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
           
                @if(!$allrecords->isEmpty()) 
                <?php global $serviceDays; ?>
                @foreach($allrecords as $allrecord)
                @if ($allrecord->status == 1 && $allrecord->pause == 1 && $allrecord->User->accept_orders == 1)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <div class="project-img">
                            <?php 
                            if ($allrecord->pause == 0 || $allrecord->User->accept_orders == 0) { ?>
                                <div class="paused-project">Paused</div>
                            <?php }else{ ?>
                                <div class="active-project">Active</div>
                            <?php } ?>
                            <div class="delete-product"><a href="{{ URL::to( 'gigs/delete/'.$allrecord->slug)}}" class="" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                            <?php
                            $gigimgname = '';
                            if ($allrecord->Image) {
                                foreach ($allrecord->Image as $gigimage) {
                                    if (isset($gigimage->name) && !empty($gigimage->name)) {
                                        $path = GIG_FULL_UPLOAD_PATH . $gigimage->name;
                                        if (file_exists($path) && !empty($gigimage->name)) {
                                            $gigimgname = GIG_FULL_DISPLAY_PATH . $gigimage['name'];
                                            break;
                                        }
                                    }
                                }
                            }
                            if ($gigimgname == '' && $allrecord->youtube_image) {
                                if (file_exists(GIG_FULL_UPLOAD_PATH . $allrecord->youtube_image)) {
                                    $gigimgname = GIG_FULL_DISPLAY_PATH . $allrecord->youtube_image;
                                }
                            }
                            if ($gigimgname == '') {
                                $gigimgname = 'public/img/front/dummy.png';
                            }
                            ?>
                            <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class="">{{HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->title])}}</a>
                        </div>
                        <div class="caption">
                            <h3><a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class="">{{ mb_substr($allrecord->title,0,40)}}</a></h3>
                            <div class="pro-bottm">
                                <div class="pro-bottm-left newmanage-icon">
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <!--<a href="#" class="bar-icons"> {{HTML::image('public/img/front/bar-icon.png', SITE_TITLE)}}<span class="listtoltip">Analytics for your Gig.</span></a>-->
                                    <p class="manageonoff">
                                        <?php
                                        if ($allrecord->pause == 1) {
                                            $selectG = "checked='checked'";
                                            ?>
                                        <input type="checkbox" value="1" id="checkboxID{{$allrecord->id}}" name="pause[{{$allrecord->id}}]" onclick="updatecon1({{$allrecord->id}})" <?php echo $selectG; ?>>
                                        <?php
                                        } else {
                                            $selectG = "";?>
                                        <input type="checkbox" value="1" id="checkboxID{{$allrecord->id}}" name="pause[{{$allrecord->id}}]" onclick="updatecon({{$allrecord->id}})" <?php echo $selectG; ?>>
                                        <?php }
                                        ?>
                                        <label for="checkboxID{{$allrecord->id}}"></label>
                                        <span class="listtoltip">You can pause Gig. This will be removed from ranking and search results, but Gig will be available for pre-order within 30 days, after a pause.</span>
                                    </p>
                                </div>
                                <div class="pro-bottm-right">
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}">{{$allrecord->basic_price.CURR}}</a>
                                </div>
                            </div>
                        </div>
                        <div id="offer-show-{{$allrecord->id}}" class="show-adwanv">
                            <ul>
                                <li>
                                    <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class=""><i class="fa fa-pencil" aria-hidden="true"></i><span>Edit</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}" class=""><i class="fa fa-eye" aria-hidden="true"></i><span>View Detail</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to( 'gigs/delete/'.$allrecord->slug)}}" class="" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></a>
                                </li>

                                <li class="advanced-setting">
                                    <a href="javascript:void(0);" class="clsstng" id="close-{{$allrecord->id}}"><i class="fa fa-close" aria-hidden="true"></i><span>Close</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @if($page == 1)

                @endif
                <script>$('#reqloaddiv').show();</script>
                @else
                @if($page == 1)
                <script>$('#reqloaddiv').hide();</script>
                <div class="col-md-12"><div class="management-full">No gigs found. </div></div>
                @else
                <script>$('#reqloaddiv').hide();</script>
                @endif
                @endif
            @if(!$allrecords->isEmpty() && count($allrecords) >= $limit)
            <!--<div class="loadmore" id="reqloaddiv">
                <span class="loadmorebtn" id="loadmorebtn" onclick="gigloadmore()">Load more...</span>
            </div>-->
            @endif
        </div>
    </div>
</div>
<div role="tabpanel" class="tab-pane" id="draft">
    <div class="dashboard-rights-section">
        <div class="row">
            @if(!$allrecords->isEmpty())
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <div class="creat-new">
                        <a href="{{ URL::to( 'gigs/create')}}" class="">
                            <i> {{HTML::image('public/img/front/plus.png', SITE_TITLE)}}</i>
                            <span>Create a new gig</span>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            {{Form::hidden('page', $page, ['id'=>'gigpage'])}}

            <div class="main_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
            
                @if(!$allrecords->isEmpty()) 
                <?php global $serviceDays; ?>
                @foreach($allrecords as $allrecord)
                @if ($allrecord->status == 0)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <div class="project-img">
                            <div class="draft-project">Draft</div>
                            <div class="delete-product"><a href="{{ URL::to( 'gigs/delete/'.$allrecord->slug)}}" class="" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                            <?php
                            $gigimgname = '';
                            if ($allrecord->Image) {
                                foreach ($allrecord->Image as $gigimage) {
                                    if (isset($gigimage->name) && !empty($gigimage->name)) {
                                        $path = GIG_FULL_UPLOAD_PATH . $gigimage->name;
                                        if (file_exists($path) && !empty($gigimage->name)) {
                                            $gigimgname = GIG_FULL_DISPLAY_PATH . $gigimage['name'];
                                            break;
                                        }
                                    }
                                }
                            }
                            if ($gigimgname == '' && $allrecord->youtube_image) {
                                if (file_exists(GIG_FULL_UPLOAD_PATH . $allrecord->youtube_image)) {
                                    $gigimgname = GIG_FULL_DISPLAY_PATH . $allrecord->youtube_image;
                                }
                            }
                            if ($gigimgname == '') {
                                $gigimgname = 'public/img/front/dummy.png';
                            }
                            ?>
                            <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class="">{{HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->title])}}</a>
                        </div>
                        <div class="caption">
                            <h3><a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class="">{{ mb_substr($allrecord->title,0,40)}}</a></h3>
                            <div class="pro-bottm">
                                <div class="pro-bottm-left newmanage-icon">
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <!--<a href="#" class="bar-icons"> {{HTML::image('public/img/front/bar-icon.png', SITE_TITLE)}}<span class="listtoltip">Analytics for your Gig.</span></a>-->
                                    <p class="manageonoff">
                                        <?php
                                        if ($allrecord->pause == 1) {
                                            $selectG = "checked='checked'";
                                            ?>
                                        <input type="checkbox" value="1" id="checkboxID{{$allrecord->id}}" name="pause[{{$allrecord->id}}]" onclick="updatecon1({{$allrecord->id}})" <?php echo $selectG; ?>>
                                        <?php
                                        } else {
                                            $selectG = "";?>
                                        <input type="checkbox" value="1" id="checkboxID{{$allrecord->id}}" name="pause[{{$allrecord->id}}]" onclick="updatecon({{$allrecord->id}})" <?php echo $selectG; ?>>
                                        <?php }
                                        ?>
                                        <label for="checkboxID{{$allrecord->id}}"></label>
                                        <span class="listtoltip">You can pause Gig. This will be removed from ranking and search results, but Gig will be available for pre-order within 30 days, after a pause.</span>
                                    </p>
                                </div>
                                <div class="pro-bottm-right">
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}">{{$allrecord->basic_price.CURR}}</a>
                                </div>
                            </div>
                        </div>
                        <div id="offer-show-{{$allrecord->id}}" class="show-adwanv">
                            <ul>
                                <li>
                                    <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class=""><i class="fa fa-pencil" aria-hidden="true"></i><span>Edit</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}" class=""><i class="fa fa-eye" aria-hidden="true"></i><span>View Detail</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to( 'gigs/delete/'.$allrecord->slug)}}" class="" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></a>
                                </li>

                                <li class="advanced-setting">
                                    <a href="javascript:void(0);" class="clsstng" id="close-{{$allrecord->id}}"><i class="fa fa-close" aria-hidden="true"></i><span>Close</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @if($page == 1)

                @endif
                <script>$('#reqloaddiv').show();</script>
                @else
                @if($page == 1)
                <script>$('#reqloaddiv').hide();</script>
                <div class="col-md-12"><div class="management-full">No gigs found. </div></div>
                @else
                <script>$('#reqloaddiv').hide();</script>
                @endif
                @endif
            @if(!$allrecords->isEmpty() && count($allrecords) >= $limit)
            <!--<div class="loadmore" id="reqloaddiv">
                <span class="loadmorebtn" id="loadmorebtn" onclick="gigloadmore()">Load more...</span>
            </div>-->
            @endif
        </div>
    </div>
</div>
<div role="tabpanel" class="tab-pane" id="paused">
    
    <div class="dashboard-rights-section">
        <div class="row">
            @if(!$allrecords->isEmpty())
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail">
                    <div class="creat-new">
                        <a href="{{ URL::to( 'gigs/create')}}" class="">
                            <i> {{HTML::image('public/img/front/plus.png', SITE_TITLE)}}</i>
                            <span>Create a new gig</span>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            {{Form::hidden('page', $page, ['id'=>'gigpage'])}}

            <div class="main_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
            
                @if(!$allrecords->isEmpty()) 
                <?php global $serviceDays; ?>
                @foreach($allrecords as $allrecord)
                @if ($allrecord->pause == 0  || $allrecord->User->accept_orders == 0) 
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <div class="project-img">
                            <div class="pause-project">Paused</div>
                            <div class="delete-product"><a href="{{ URL::to( 'gigs/delete/'.$allrecord->slug)}}" class="" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                            <?php
                            $gigimgname = '';
                            if ($allrecord->Image) {
                                foreach ($allrecord->Image as $gigimage) {
                                    if (isset($gigimage->name) && !empty($gigimage->name)) {
                                        $path = GIG_FULL_UPLOAD_PATH . $gigimage->name;
                                        if (file_exists($path) && !empty($gigimage->name)) {
                                            $gigimgname = GIG_FULL_DISPLAY_PATH . $gigimage['name'];
                                            break;
                                        }
                                    }
                                }
                            }
                            if ($gigimgname == '' && $allrecord->youtube_image) {
                                if (file_exists(GIG_FULL_UPLOAD_PATH . $allrecord->youtube_image)) {
                                    $gigimgname = GIG_FULL_DISPLAY_PATH . $allrecord->youtube_image;
                                }
                            }
                            if ($gigimgname == '') {
                                $gigimgname = 'public/img/front/dummy.png';
                            }
                            ?>
                            <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class="">{{HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->title])}}</a>
                        </div>
                        <div class="caption">
                            <h3><a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class="">{{ mb_substr($allrecord->title,0,40)}}</a></h3>
                            <div class="pro-bottm">
                                <div class="pro-bottm-left newmanage-icon">
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <!--<a href="#" class="bar-icons"> {{HTML::image('public/img/front/bar-icon.png', SITE_TITLE)}}<span class="listtoltip">Analytics for your Gig.</span></a>-->
                                    <p class="manageonoff">
                                        <?php
                                        if ($allrecord->pause == 1) {
                                            $selectG = "checked='checked'";
                                            ?>
                                        <input type="checkbox" value="1" id="checkboxID{{$allrecord->id}}" name="pause[{{$allrecord->id}}]" onclick="updatecon1({{$allrecord->id}})" <?php echo $selectG; ?>>
                                        <?php
                                        } else {
                                            $selectG = "";?>
                                        <input type="checkbox" value="1" id="checkboxID{{$allrecord->id}}" name="pause[{{$allrecord->id}}]" onclick="updatecon({{$allrecord->id}})" <?php echo $selectG; ?>>
                                        <?php }
                                        ?>
                                        <label for="checkboxID{{$allrecord->id}}"></label>
                                        <span class="listtoltip">You can pause Gig. This will be removed from ranking and search results, but Gig will be available for pre-order within 30 days, after a pause.</span>
                                    </p>
                                </div>
                                <div class="pro-bottm-right">
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}">{{$allrecord->basic_price.CURR}}</a>
                                </div>
                            </div>
                        </div>
                        <div id="offer-show-{{$allrecord->id}}" class="show-adwanv">
                            <ul>
                                <li>
                                    <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class=""><i class="fa fa-pencil" aria-hidden="true"></i><span>Edit</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}" class=""><i class="fa fa-eye" aria-hidden="true"></i><span>View Detail</span></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to( 'gigs/delete/'.$allrecord->slug)}}" class="" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></a>
                                </li>

                                <li class="advanced-setting">
                                    <a href="javascript:void(0);" class="clsstng" id="close-{{$allrecord->id}}"><i class="fa fa-close" aria-hidden="true"></i><span>Close</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @if($page == 1)

                @endif
                <script>$('#reqloaddiv').show();</script>
                @else
                @if($page == 1)
                <script>$('#reqloaddiv').hide();</script>
                <div class="col-md-12"><div class="management-full">No gigs found. </div></div>
                @else
                <script>$('#reqloaddiv').hide();</script>
                @endif
                @endif
            @if(!$allrecords->isEmpty() && count($allrecords) >= $limit)
            <!--<div class="loadmore" id="reqloaddiv">
                <span class="loadmorebtn" id="loadmorebtn" onclick="gigloadmore()">Load more...</span>
            </div>-->
            @endif
        </div>
    </div>
</div>
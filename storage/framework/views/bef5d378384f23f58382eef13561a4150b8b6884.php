<div id="toTop"><?php echo e(HTML::image('public/img/front/arrow-top.png', SITE_TITLE)); ?></div>
<script type="text/javascript">
$(document).ready(function(){
	$('.search-area').on("keyup click", function(){
	    $(".search-bar-panel").show();
	    $(".is_service_selected").val(0);
            //alert();
            //if (e.which == 13) {
				keyword = $('.search-area').val();
				if(keyword){
					$(".dlt-keyword").show();
					var currentRequest = null;
					$.ajaxSetup({cache: false}); // assures the cache is empty
				 if (currentRequest != null) {
					currentRequest.abort();
					currentRequest = null;
				 }
					currentRequest = $.ajax({
						type: 'POST',
						url: "<?php echo HTTP_PATH . '/gigs/getkeyword'; ?>",
						data: {'keyword':keyword, "_token": "<?php echo e(csrf_token()); ?>"},
						cache: false,
						
						beforeSend : function()    {           
							
						},
						success: function (data) {
						  //  $("#wrkr_srch_ldr").hide();
							//NProgress.done();
							$(".searchgig").html('');
							$(".searchgig").html(data);

						},
						error: function (data) {
							console.log("error");
							console.log(data);
						}
					});
					
				}else{
					$(".dlt-keyword").hide();
					$(".searchgig").html("");
					$(".is_service_selected").val(0);
				}
                return false;    //<---- Add this line
           // }
        });
		
	$('.dlt-keyword').on("click", function(){
		$(".searchgig").html("");
		$(".search-area").val("").focus();
		$(".is_service_selected").val(0);
		$(".dlt-keyword").hide();
	});		
	$(".searchform1").validate();
	$(".searchform1").submit(function( event ) {
		//alert(1);
		if($('ul.user-ul li').hasClass('selected')){
			//alert(2);
			userslug = $('ul.user-ul li.selected').attr('id');
			//alert(userslug);
			location.href="<?php echo e(HTTP_PATH); ?>/public-profile/"+userslug;
			event.preventDefault();
		}
		
	})
	$(document).on('click', function (event) {
	  if (!$(event.target).closest('.center_seacrh').length && !$(event.target).closest('.search-bar-panel').length) {
		$(".search-bar-panel").hide();
	  }
	});
});
</script>
<header class="header header-inner">
    <div class="container">
        <div class="header_inner">
             <div class="row">
                <div class="col-lg-2 col-xs-12 col-md-3">

            <div class="logo"><a href="<?php echo HTTP_PATH; ?>"> <?php echo e(HTML::image(LOGO_PATH, SITE_TITLE)); ?></a>
        </div>
                </div>

                  <div class="col-lg-4 col-xs-12 col-md-6">
                 <div class="search_top">
                    <?php echo e(Form::open(array('url' => url('gigs'), 'method' => 'post', 'class' => 'searchform1', 'id' => 'searchform1'))); ?>

                        <div class="seacrh_top_in">
    				<input id="search-area" autocomplete="off" type="text" name="title" class="required search-area-top search-area form-control" placeholder="What Service are you looking for">
    				<div class="dlt-keyword dlt-keyword-top" style="display:none;">x</div>
    				</div>  
                    <div class="search_top_btn"><input class="homesearch_top" type="submit" value="Search" /></div>
                    <input type="hidden" id="is_service_selected" name="is_service_selected" class="is_service_selected"> 
                        
                    <?php echo e(Form::close()); ?>

                    <div class="searchgig-top searchgig" id="searchgig"></div>
                    
                </div>
                 </div>
<div class="col-lg-6 col-xs-12 col-md-3 tab-headers">
            <div class="menu menu-inner">  
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
              <div class="toggle position-relative">
                <div class="line top position-absolute"></div>
                <div class="line middle cross1 position-absolute"></div>
                <div class="line middle cross2 position-absolute"></div>
                <div class="line bottom position-absolute"></div>
              </div>
              </button>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href='<?php echo e(URL::to('gigs/create')); ?>'> Post Gig</a></li>
                        <li class="nav-item"><a class="nav-link" href='<?php echo e(URL::to('gigs')); ?>'>Browse Gigs</a></li>
                        <?php if(session()->has('user_id')): ?>
                        <li class="nav-item dropdown notification-b" >
                            <a class="nav-link dropdown-toggle" href='javascript:void();' data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Notifications <span id="checkunreadmsg" class="green-dots displaynone"></span></a>
						
                            <ul class="dropdown-menu notification displaynonenot" id="msgcontaine">
                            </ul>
                        </li>
                        <li class="nav-item notification-b" >
                            <a class="nav-link" href='<?php echo e(URL::to( 'messages/message')); ?>'>Message <span id="checkunreadmsgs" class="green-dots displaynone"></span></a>
                            <ul class="notification displaynonenot" id="msgscontaine">
                            </ul>
                        </li>
                       
                          
                        </li>
                        <li class="nav-item"><a class="nav-link" href='<?php echo e(URL::to('logout')); ?>'>Logout</a></li>
                        <?php else: ?> 
                        <li class="nav-item"><a class="nav-link" href='<?php echo e(URL::to('register')); ?>'>Register</a></li>
                        <li class="nav-item"><a class="nav-link" href='<?php echo e(URL::to('login')); ?>'> Login</a></li>
                        <?php endif; ?>

                    </ul>
                         
                         
                   
                           <ul class="navbar-nav ml-auto">
                              
                        <?php if(session()->has('user_id')): ?>
                        
                        <li class="nav-item dropdown dropdown-home">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href='#'>
                                <i class="profiles-picher dfgrfgrf">
                                   <?php $userHInfo=DB::table('users')->where('id',session()->get('user_id'))->first(); ?>
                                 <?php if(isset($userHInfo->profile_image) && file_exists(PROFILE_SMALL_UPLOAD_PATH.$userHInfo->profile_image)): ?>
                            <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$userHInfo->profile_image, SITE_TITLE, ['id'=> 'pimage'])); ?>

                            <?php else: ?>
                            <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])); ?>

                            <?php endif; ?>
                                </i>
                            </a>
                            <ul class="dropdown-menu">
                                
                                <li class=""><a href="<?php echo e(URL::to('users/settings')); ?>">Settings</a></li>   
                                 <li class=""><a class="" href='<?php echo e(URL::to( 'users/dashboard')); ?>'> Dashboard</a>
                                <li class="dropdown dropdown-home-submenu"><a class="dropdown-toggle" href="<?php echo e(URL::to('gigs/management')); ?>">Selling</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a href="<?php echo e(URL::to('gigs/management')); ?>">Manage Gigs</a></li>
                                        <li><a href="<?php echo e(URL::to('gigs/create')); ?>">Create New Gig</a></li>
                                        <li><a href="<?php echo e(URL::to('gigs/myofferedgig')); ?>">My Offered Gigs</a></li>
                                    </ul>
                                </li>   
                                <li class="dropdown dropdown-home-submenu"><a class="dropdown-toggle" href="<?php echo e(URL::to('services/management')); ?>">Buying</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a href="<?php echo e(URL::to('services/management')); ?>">Manage Requests</a></li>
                                        <li><a href="<?php echo e(URL::to('services/create-request')); ?>">Post Request</a></li>
                                        <li><a href="<?php echo e(URL::to('my-saved-gigs')); ?>">My Saved Gigs</a></li>
                                        <li><a href="<?php echo e(URL::to('gigs/offeredgig')); ?>">Offered Gigs</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-home-submenu"><a class="dropdown-toggle" href="<?php echo e(URL::to('selling-orders')); ?>">Orders</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a href="<?php echo e(URL::to('selling-orders')); ?>">Selling Orders</a></li>
                                        <li><a href="<?php echo e(URL::to('buying-orders')); ?>">Buying Orders</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-home-submenu"><a class="dropdown-toggle" href="<?php echo e(URL::to('earnings')); ?>">Earnings</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a href="<?php echo e(URL::to('earnings')); ?>">Earnings</a></li>
                                        <li><a href="<?php echo e(URL::to('payments/history')); ?>">PayPal History</a></li>
                                    </ul>
                                </li>   
                            </ul> 
                        </li>
                        
                      
                        
                        <?php endif; ?>

                    </ul>
                     </div>
                </nav> 
                <div class="posstt post_icon">
                    <a href="<?php echo e(URL::to('gigs/create')); ?>">
                        <b>+</b>  
                        <span>Post Gig</span>
                    </a>
                </div>
            </div>
</div>
             </div>
        </div>
    </div>

    <div class="menu_drop sdfef">
        <div class="menu_in">
            <div class="wrapper">           
                <ul>
                    <?php if($globalCategories): ?>
                    <?php $__currentLoopData = $globalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(URL::to( 'gigs/'.$cat->slug)); ?>"><?php echo $cat->name; ?></a></li>
                    <?php if($loop->iteration == 8): ?>
                    <?php break; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    <li class="more-link"><a href="javascript:void()" class="showhide2">More <span class="caret-arrow"></span></a>
                        <ul class="slidediv2">
                            <?php $__currentLoopData = $globalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->iteration > 8): ?>
                            <li><a href="<?php echo e(URL::to( 'gigs/'.$cat->slug)); ?>"><?php echo $cat->name; ?></a></li>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </ul>
                    </li>
                    <?php endif; ?>

                </ul>    
            </div>
        </div>
    </div>
</header> 

<script>
    $(window).scroll(function () {
        if ($(this).scrollTop() > 5) {
            $(".header").addClass("fixed-me");
        } else {
            $(".header").removeClass("fixed-me");
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.showhide2').click(function () {
            $(".slidediv2").slideToggle();
        });
    });
</script>

<script>
    (function($){
	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	  if (!$(this).next().hasClass('show')) {
		$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	  }
	  var $subMenu = $(this).next(".dropdown-menu");
	  $subMenu.toggleClass('show');

	  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		$('.dropdown-submenu .show').removeClass("show");
	  });

	  return false;
	});
})(jQuery)
</script>
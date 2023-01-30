<script type="text/javascript">
$(document).ready(function(){
	$('ul.service-ul li').hover(function() {
		//alert($(this).find('button').text());
		$('ul li').removeClass('selected');
		$(this).addClass('selected');
		var hovertext = $(this).find('button').text();
		$(".search-area").val($.trim(hovertext)).focus();
		$(".is_service_selected").val(1);
		
	});
	$('ul.service-ul li').click(function() {
		//alert($(this).find('button').text());
		$('ul li').removeClass('selected');
		$(this).addClass('selected');
		var hovertext = $(this).find('button').text();
		$(".search-area").val($.trim(hovertext)).focus();
		$(".searchgig").html("");
		$(".is_service_selected").val(1);
		$(".searchform").trigger('submit');
		$(".searchform1").trigger('submit');
	});
	$('ul.user-ul li').hover(function() {
		$('ul li').removeClass('selected');
		$(this).addClass('selected');
		//alert($(this).find('button').text());
		var hovertext = $(this).find('button').text();
		$(".search-area").val($.trim(hovertext)).focus();
		$(".is_service_selected").val(0);
		
	});
	$('ul.user-ul li').click(function() {
		//alert($(this).find('button').text());
		$('ul li').removeClass('selected');
		$(this).addClass('selected');
		var hovertext = $(this).find('button').text();
		$(".search-area").val($.trim(hovertext)).focus();
		userslug = $('ul.user-ul li.selected').attr('id');
		location.href="{{HTTP_PATH}}/public-profile/"+userslug;
		$(".searchgig").html("");
		$(".is_service_selected").val(0);
	});
	
	
});
</script>

@if($allrecords || $alluserrecords)
	
	<ul class="search-bar-panel">
@if($allrecords)
<aside>
<li><i class="fa fa-paint-brush"></i>Services</li>
<ul class="service-ul" id="service-ul">
@foreach($allrecords as $allrecord)
    @if(isset($allrecord))
        <li class="service-li"><button>
	<span>
	    <span class="bold-txt">
	<?php echo str_replace(strtolower($keyword),"<span class='normal-txt'>".strtolower($keyword)."</span>",strtolower($allrecord)); ?>
	</span>
	</span>
	</button></li>
    @endif
@endforeach
</ul>
</aside>
@endif

@if($alluserrecords)
<aside>
<li><i class="fa fa-user"></i>Users</li>
<!--<button class="user-search"><i class="fa fa-search"></i>Search usernames containing <span>a</span></button>-->
<ul class="user-ul" id="user-ul">
@foreach($alluserrecords as $userrecord)
    @if(isset($userrecord['first_name']))
        <li class="user-li" id="<?php echo $userrecord['slug'];?>"><button><span>
            <span class="bold-txt">
	<?php echo str_replace(strtolower($keyword),"<span class='normal-txt'>".strtolower($keyword)."</span>",strtolower($userrecord['first_name'].' '.$userrecord['last_name'])); ?>
	</span></span></button></li>
    @endif
@endforeach
</ul>
</aside>
@endif
</ul>
@endif
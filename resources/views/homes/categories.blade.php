@extends('layouts.dashboard')
@section('content')
<div class="main_dashboard">
    @include('elements.topcategories')
    <section class="gigs-category">
    <div class="wrapper">
        <div class="jobs_itle">
            <div class="jobs_itl catpage">
                <h3 class="explore">Explore Gigs by Categories</h3>
                <div class="tiltee">Find best gig by category </div>
            </div>  
            <div class="exploree">
                <div class="exploree_mid_row">
                    @if($globalCategories)
                        @foreach($globalCategories as $cat)
                            <div class="gigs-category-bx">
                                <div class="thumbnail">
                                     <a href="{{URL::to( 'gigs/'.$cat->slug)}}">
                                        <div class="gigs-category-img">
                                            {{HTML::image(CATEGORY_FULL_DISPLAY_PATH.$cat->image, SITE_TITLE)}}
                                        </div>
                                        <div class="caption">
                                            <h3>{!! $cat->name !!}</h3>
                                            <p>{!! $cat->description !!}</p>
                                        </div>
                                     </a>
                                </div>
                            </div>
                        @endforeach                    
                    @endif
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
@endsection
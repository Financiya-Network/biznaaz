<div class="dashboard-menu sticky">
    <div class="navbar navbar-default">

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light navbar-me">
                <div class="nevicatio-menu nevicatio-menu-categoris">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        {{-- <ul class="nav navbar-nav">
                            @if($globalCategories)
                            @foreach($globalCategories as $cat)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{URL::to( 'gigs/'.$cat->slug)}}">{!! $cat->name !!}</a>
                                @if(isset($globalSubCategories[$cat->id]))
                                <ul class="dropdown-menu dropdown-menus dropdown-menu-categories">
                                    @foreach($globalSubCategories[$cat->id] as $subCat)                                
                                    <li><a href="{{URL::to( 'gigs/'.$cat->slug.'/'.$subCat->slug)}}">{!! $subCat->name !!}</a>
                                        @endforeach
                                </ul>
                                @endif
                            </li>
                            @if($loop->iteration == 8)
                            @break
                            @endif
                            @endforeach  --}}
                            <?php /* <li class="dropdown">
                              <a href="javascript:void(0)"class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                              <ul class="dropdown-menu dropdown-menus">
                              @foreach($globalCategories as $cat)
                              @if($loop->iteration > 8)
                              <li class="dropdown-submenu"><a href="{{URL::to( 'gigs/'.$cat->slug)}}">{!! $cat->name !!}</a>
                              @if(isset($globalSubCategories[$cat->id]))
                              <ul class="dropdown-menu">
                              @foreach($globalSubCategories[$cat->id] as $subCat)
                              <li><a href="{{URL::to( 'gigs/'.$cat->slug.'/'.$subCat->slug)}}">{!! $subCat->name !!}</a>
                              @endforeach
                              </ul>
                              @endif
                              </li>
                              @endif
                              @endforeach
                              </ul>
                              </li> */ ?>
                            {{-- @endif
                        </ul> --}}
                    </div>
                </div>
            </nav>
        </div>

    </div>
</div>


<!--------------------Mobile-Categories------------------------>
<div class="dashboard-menu-mobile">
    <div class="navbar navbar-default">
        <nav class="navbar navbar-expand-lg navbar-light navbar-me">
            <div class="nevicatio-menu-mobile nevicatio-menu-categoris">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedCategories" aria-controls="navbarSupportedCategories" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span> All Categories
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedCategories">
                    <ul class="nav navbar-nav">
                        @if($globalCategories)
                        @foreach($globalCategories as $cat)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{URL::to( 'gigs/'.$cat->slug)}}" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{!! $cat->name !!}</a>
                            @if(isset($globalSubCategories[$cat->id]))
                            <ul class="dropdown-menu dropdown-menus dropdown-menu-categories">
                                @foreach($globalSubCategories[$cat->id] as $subCat)                                
                                <li><a href="{{URL::to( 'gigs/'.$cat->slug.'/'.$subCat->slug)}}">{!! $subCat->name !!}</a>
                                    @endforeach
                            </ul>
                            @endif
                        </li>
                        @if($loop->iteration == 8)
                        @break
                        @endif
                        @endforeach 
                        <?php /* <li class="dropdown">
                          <a href="javascript:void(0)"class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                          <ul class="dropdown-menu dropdown-menus">
                          @foreach($globalCategories as $cat)
                          @if($loop->iteration > 8)
                          <li class="dropdown-submenu"><a href="{{URL::to( 'gigs/'.$cat->slug)}}">{!! $cat->name !!}</a>
                          @if(isset($globalSubCategories[$cat->id]))
                          <ul class="dropdown-menu">
                          @foreach($globalSubCategories[$cat->id] as $subCat)
                          <li><a href="{{URL::to( 'gigs/'.$cat->slug.'/'.$subCat->slug)}}">{!! $subCat->name !!}</a>
                          @endforeach
                          </ul>
                          @endif
                          </li>
                          @endif
                          @endforeach
                          </ul>
                          </li> */ ?>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>
<script>
    $(document).ready(function () {
        $(".navbar-default .dropdown").hover(
                function () {
                    $('.dropdown-menus', this).not('.in .dropdown-menus').stop(true, true).show();
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menus', this).not('.in .dropdown-menus').stop(true, true).hide();
                    $(this).toggleClass('open');
                }
        );
    });</script>
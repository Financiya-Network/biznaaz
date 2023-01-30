<div class="dashboard-menu sticky">
    <div class="navbar navbar-default">

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light navbar-me">
                <div class="nevicatio-menu nevicatio-menu-categoris">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
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
                        <?php if($globalCategories): ?>
                        <?php $__currentLoopData = $globalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo e(URL::to( 'gigs/'.$cat->slug)); ?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $cat->name; ?></a>
                            <?php if(isset($globalSubCategories[$cat->id])): ?>
                            <ul class="dropdown-menu dropdown-menus dropdown-menu-categories">
                                <?php $__currentLoopData = $globalSubCategories[$cat->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                                <li><a href="<?php echo e(URL::to( 'gigs/'.$cat->slug.'/'.$subCat->slug)); ?>"><?php echo $subCat->name; ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php if($loop->iteration == 8): ?>
                        <?php break; ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
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
                        <?php endif; ?>
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
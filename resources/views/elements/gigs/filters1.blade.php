<div class="left_bar">
    <div class="tagline headline">
        @if(isset($catInfo) && !empty($catInfo))
            
        @else  
            Refine By Category
        @endif   
    </div> 
    <div class="all_caterogy">
        <ul>
            @if(isset($catInfo) && !empty($catInfo))
                <li>All Sub Categories <span class="no">({{array_sum($gigcatlist)}})</span></li>
                @foreach($gigcatlist as $catid=>$gigcat)
                    @if(isset($catList[$catid]))
                        <li class="delivery_check">
                            <input type="radio" class="deltimesub" id="testsub{{$catid}}" name="subcategory_id" value="{{$catid}}">
                            <label for="testsub{{$catid}}" onclick="applyfilter()">{{$catList[$catid]}}</label>
                            <span class="no">({{$gigcat}})</span>
                        </li>
                    @endif
                @endforeach 
            @else
                <li>All Categories <span class="no">({{array_sum($gigcatlist)}})</span></li>
                @foreach($gigcatlist as $catid=>$gigcat)
                    @if(isset($catList[$catid]))
                        <li><a href="{{URL::to( 'gigs/'.$catListSlugs[$catid])}}">{{$catList[$catid]}}</a> <span class="no">({{$gigcat}})</span></li>
                    @endif
                @endforeach   
            @endif    
        </ul>    
    </div>
    <div class="morefilter samestyle">
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Search by title" value="{{$olftitle}}">
        </div>
        <div class="price_sec newsfilter">
            <div class="form-group">
                <label>{{CURR}}</label>
                <input type="text" name="price_min" class="form-control numbrreg" placeholder="min">
            </div>
            <span class="">to</span>
            <div class="form-group">
                <label>{{CURR}}</label>
                <input type="text" name="price_max"  class="form-control numbrreg" placeholder="max">
            </div>
        </div>
        <div class="form-group">
            <input type="button" value="Apply" class="btn btn-primary succbtn" onclick="updateresult();">
        </div>
    </div>
    
    <div class="delivery_time samestyle">
        <div class="same_tag">Delivery Time</div>
        <ul class="delivery">
            <?php global $searchTimeArray; ?>
            @foreach($searchTimeArray as $key=>$val)
                <li class="delivery_check">
                    <input type="radio" class="deltime" id="test{{$key}}" name="delivery_time" value="{{$key}}">
                    <label for="test{{$key}}" onclick="applyfilter()">{{$val}}</label>
                </li>
            @endforeach
        </ul>
    </div>
    
    <div class="delivery_time samestyle">
        <div class="same_tag">Seller Language</div>
        <ul class="delivery">
            <?php global $searchLanguageArray; ?>
            @foreach($searchLanguageArray as $key=>$val)
                <li><label class="checkbox checkbox-indent">
                        <input type="checkbox" name="langauge[]" class="langg" value="{{$key}}">
                        <i class="icon-checkbox"></i>{{$val}}
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="delivery_time samestyle">
        <div class="same_tag">Seller Location</div>
        <div class="fil_ciuntry">
            <div class="market-select"><span>{{Form::select('country_id', $countryLists, null, ['class' => 'form-control','placeholder' => 'Select Country', 'onchange'=>'updateresult()'])}}</span></div>
        </div>
        <div class="clear-filter same_tag" onclick="clearfilter();">Clear All Filters</div>
    </div>
</div>   
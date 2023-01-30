<?php $__env->startSection('content'); ?>
<?php echo e(HTML::script('public/js/front/tokenize2.js')); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#step_2").prop("disabled", false);
    });
    $(document).ready(function () {
        $("#gigform").validate();

        $("#category_id").change(function () { 
            var catid = $("#category_id").val();
            if(catid == ''){
                catid = '0';
            }
            if(catid != '143'){
                $("#subcategory").show();
            $("#subcategory").load('<?php echo HTTP_PATH . '/gigs/getsubcategorylist/' ?>' + catid);
        }else{
            $("#subcategory").hide();
        }


        });
        // $("#div1").load('');
    });
  
</script>
<div class="main_dashboard">
    <div class="dashboard-menu dashboard-menu-gigs">
        <div class="navbar navbar-default">
            <nav class="navbar navbar-me">
                <div class="container">
                    <div class="nevicatio-menu">
                            <ul class="top_tab" data-mode="wizard">
                                <li class="step hint--bottom">
                                    <a href="#!" id="tab_step_1" class="valid current" >
                                        <span>1</span> Overview
                                    </a>
                                </li>
                                <li class="step hint--bottom">
                                    <a href="#!" id="tab_step_2" class="valid">
                                        <span>2</span>  Pricing
                                    </a>
                                </li>
                                <li class="step hint--bottom">
                                    <a href="#!" id="tab_step_3" class="" >
                                        <span>3</span>   Description &amp; FAQ
                                    </a>
                                </li>
                                <li class="step hint--bottom">
                                    <a href="#!" id="tab_step_4" class="">
                                        <span>4</span> Requirements
                                    </a>
                                </li>
                                <li class="step hint--bottom">
                                    <a href="#!" id="tab_step_5" class="" >
                                        <span>5</span>  Gallery
                                    </a>
                                </li>
                                <li class="step hint--bottom">
                                    <a href="#!" id="tab_step_6" class="" > <span>6</span> Publish</a>
                                </li>
                            </ul>
                        
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                 <div class="col-md-12">
                <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <div class="gig_from">
                    <?php echo e(Form::open(array('method' => 'post', 'name' => 'gigform', 'id' => 'gigform', 'class' => 'form form-signin', 'enctype'=>'multipart/form-data'))); ?>  
                    <input type="hidden" value="1" name="stepcnt" id="stepcnt" />
                    <div class="step_form_inner step_account1" id="gig_overview">
                        <div class="form_field">
                            <label>Gig Title</label>   
                            <div class="right_filed">
                                <div class="text_area">
                                    <?php echo e(Form::textarea('title', null, ['minlength' => 5, 'maxlength' => 80, 'class'=>'form-control required', 'placeholder'=>"Do something you're really good at...", 'autocomplete' => 'off', 'rows'=>4])); ?>

                                    <!--<span class="first_txt">i will</span>-->
                                </div>
                                <figure class="textareatooltip">
                                    <figcaption>
                                        <h3>Describe your Gig.</h3>
                                        <p>This is your Gig title. Choose wisely, you can only use 80 characters.</p>
                                    </figcaption>
                                    <div class="gig-tooltip-img"></div>
                                </figure>
                            </div>
                        </div>   
                        <div class="form_field">
                            <label>Category</label>   
                            <div class="right_filed half_field">
                                <figure class="selecttooltip">
                                    <figcaption>
                                        <h3>Where will your Gig end up?</h3>
                                        <p>Please choose the category and sub-category most suitable for your Gig.</p>
                                    </figcaption>
                                    <div class="gig-tooltip-img"></div>
                                </figure>
                                <span class="drop_down_arow">
                                    <?php echo e(Form::select('category_id', $catList,null, ['class' => 'form-control required','placeholder' => 'Select Category','id' => 'category_id'])); ?>

                                </span>
                            </div>
                            <div class="right_filed half_field">
                                <figure class="selecttooltip">
                                    <figcaption>
                                        <h3>Where will your Gig end up?</h3>
                                        <p>Please choose the category and sub-category most suitable for your Gig.</p>
                                    </figcaption>
                                    <div class="gig-tooltip-img"></div>
                                </figure>
                                <span class="drop_down_arow" id="subcategory">
                                    <?php echo e(Form::select('subcategory_id', array(),null, ['class' => 'form-control required','placeholder' => 'Select Sub Category'])); ?>

                                </span>
                            </div>
                        </div>   
                        <div class="form_field">
                            <label>Tags
                                <!--<a href="#">Upgrade SEO</a>-->
                            </label>   
                            <div class="right_filed tg_bx">
                                <div class="text_input">
                                    <select class="tokenize-custom-demo1" multiple name="tags[]">
                                        <?php
                                        if ($skills) {
                                            foreach ($skills as $id => $skillsVal) {
                                                ?> <option value="<?php echo $skillsVal; ?>"><?php echo $skillsVal; ?></option><?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="tag_tooltip">
                                    <div class="fake-hint blue">
                                        <div class="icn">
                                            <i class="fa fa-lightbulb-o"></i>
                                        </div>
                                        <span class="fake-hint-title">Enter search terms, which you feel buyers will use when looking for your service. The terms you enter here are very important and will have an impact on your overall exposure on <?php echo e(SITE_TITLE); ?>. When adding your search terms, please keep in mind the following:</span>
                                        <ul>
                                            <li>Special characters and duplicated terms will be ignored.</li>
                                            <li>It doesn’t matter if you use upper case, lower case letters, or plural forms of words.</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="page_btn page_btn_creat">
                            <a href="<?php echo e(URL::to( 'users/dashboard')); ?>" title="Cancel" class="btn btn-default cancel_btn">Cancel</a>
                            <?php echo e(Form::submit('Save &amp; Continue', ['class' => 'btn btn-info', 'disabled'=>'disabled', 'id'=>'step_2'])); ?>

                        </div>
                    </div> 

                    <?php echo e(Form::close()); ?>

                </div>
                 </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $('.tokenize-custom-demo1').tokenize2({
                tokensAllowCustom: true
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
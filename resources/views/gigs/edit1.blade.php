@extends('layouts.inner')
@section('content')
{{ HTML::script('public/js/front/tokenize2.js')}}
{{ HTML::script('public/js/ckeditor/ckeditor.js')}}
<?php
if ($gigDetail->status == 1) {
    $is_step_1 = 'current';
    $is_step_2 = '';
    $stepcount = 1;
    $disable_button = 'step_2';
    $show_step_id = 'gig_overview';
} else {
    $is_step_1 = '';
    $is_step_2 = 'current';
    $stepcount = 2;
    $disable_button = 'step_3';
    $show_step_id = 'gig_package';
}
?>
<div class="admin_loader" style="display: none;" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
<script>
    $(document).ready(function () {

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#ShowImage1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image0").change(function () {
            if (imageValidation("image0") != false) {
                readURL(this);
            }
        });


        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#ShowImage2').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image1").change(function () {
            if (imageValidation("image1") != false) {
                readURL1(this);
            }
        });



        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#ShowImage3').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image2").change(function () {

            if (imageValidation("image2") != false) {
                readURL2(this);
            }
        });

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#ShowImage4').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image3").change(function () {
            if (imageValidation("image3") != false) {
                readURL3(this);
            }
        });
        
        
        function readPDFURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#ShowPdf1').html(input.files[0].name);
                    $('#ShowPdf1').attr('href', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#pdf0").change(function () {
            if (pdfValidation("pdf0") != false) {
                readPDFURL(this);
            }
        });


        function readPDFURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
//                    $('#ShowPdf2').attr('src', e.target.result);
                    $('#ShowPdf2').html(input.files[0].name);
                    $('#ShowPdf2').attr('href', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#pdf1").change(function () {
            if (pdfValidation("pdf1") != false) {
                readPDFURL1(this);
            }
        });



        function readPDFURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
//                    $('#ShowPdf3').attr('src', e.target.result);
                    $('#ShowPdf3').html(input.files[0].name);
                    $('#ShowPdf3').attr('href', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#pdf2").change(function () {

            if (pdfValidation("pdf2") != false) {
                readPDFURL2(this);
            }
        });

        function readPDFURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#ShowPdf4').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#pdf3").change(function () {
            if (pdfValidation("pdf3") != false) {
                readPDFURL3(this);
            }
        });



    });
</script>
<script>
    function addFaq() {
        //var faqnav = $(".faq_nav").html();
        var timestamp = Number(new Date()); // current time as number
        newItem = timestamp;
        var faqnav = '<div class="faq_nav_' + newItem + '">';
        faqnav += '<div class="form_fieldd">';
        faqnav += '<input name="question[]" id="faqques_' + newItem + '" minlength="5" maxlength="80" class="faqques required valid" placeholder="Add a Question: i.e. Do you translate to English as well?" type="text">';
        faqnav += '<textarea name="answer[]" id="faqans_' + newItem + '" minlength="5" maxlength="300" class="faqans texta required valid" placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew." cols="30" rows="6"></textarea>';
        faqnav += '<div class="notee">';
//        faqnav += '<span class="right">max. 300 Characters</span>';
        faqnav += '</div>';
        faqnav += '<div class="textarea_tooltip">';
        faqnav += '<div class="fake-hint blue">';
        faqnav += '<div class="icn">';
        faqnav += '<i class="fa fa-lightbulb-o"></i>';
        faqnav += '</div>';
        faqnav += '<span class="fake-hint-title">What are FAQs?</span>';
        faqnav += '<p>Here you can add answers to the most commonly asked questions. Your FAQs will be displayed in your Gig page</p>';
        faqnav += '<div class="tooltip-examples-component">';
        faqnav += '<span class="sub-title">for example:</span><p><strong>Question:</strong> Can you provide a British accent?</p>';
        faqnav += "<p><strong>Answer:</strong> Of course, I lived in England for 3 years! That won't be a problem.</p></div>";
        faqnav += '</div>';
        faqnav += '</div>';
        faqnav += '</div>';
        faqnav += '<div class="text_btn">';
        faqnav += '<input type="button" id="faqcan_' + newItem + '" class="btn-standard btn-white-grad btn-cancel-faq" value="Cancel" onclick="deletefaq(' + newItem + ')">';
        faqnav += '<input type="button" id="faqsub_' + newItem + '" class="btn-standard btn-green-grad btn-add-faq" value="add" onclick="submitfaq(' + newItem + ')">';
        faqnav += '</div>';
        faqnav += '</div>';
        $(".action-faq").hide();
        $(".add-faq-section").html(faqnav);
    }
    function submitfaq(idval) {

        if ($("#gigform").valid()) {

            var faqquesval = $("#faqques_" + idval).val();
            var faqansval = $("#faqans_" + idval).val();
            $(".add-faq-section").html('');

            var timestamp = Number(new Date()); // current time as number
            newItem = timestamp;

            var view_faq_frame = '<div class="faq_view_nav_' + idval + '">';
            view_faq_frame += '<div class="question_accordion">';
            view_faq_frame += '<div class="accordion-section">';
            view_faq_frame += '<a id="accordion-section-title-' + idval + '" class="accordion-section-title" href="#accordion-' + idval + '" onclick="open_accordion_section(' + idval + ')">' + faqquesval + '</a>';
            view_faq_frame += '<div id="accordion-' + idval + '" class="accordion-section-content">';

            view_faq_frame += '<div class="form_fieldd">';
            view_faq_frame += '<input name="question[]" id="faqques_' + idval + '" minlength="5" maxlength="80" class="faqques required valid" placeholder="Add a Question: i.e. Do you translate to English as well?" type="text" value="' + faqquesval + '">';
            view_faq_frame += '<textarea name="answer[]" id="faqans_' + idval + '" minlength="5" maxlength="300" class="faqans texta required valid" placeholder="Add an Answer: i.e. Yes, I also translate from English to Hebrew." cols="30" rows="6">' + faqansval + '</textarea>';
            view_faq_frame += '<div class="notee">';
//            view_faq_frame += '<span class="right">max. 300 Characters</span>';
            view_faq_frame += '</div>';
            view_faq_frame += '</div>';

            view_faq_frame += '<div class="text_btn">';
            view_faq_frame += '<a class="trash_left" href="javascript:void(0);" onclick="deletefaq(' + idval + ')"><i class="fa fa-trash"></i> Delete</a>';
            view_faq_frame += '<input type="button" id="faqcan_' + idval + '" class="btn-standard btn-white-grad btn-cancel-faq" value="Cancel" onclick="cancelfaq(' + idval + ')">';
            view_faq_frame += '<input type="button" id="faqsub_' + idval + '" class="btn-standard btn-green-grad btn-add-faq" value="update" onclick="updatefaq(' + idval + ')">'
            view_faq_frame += '</div>';

            view_faq_frame += '</div>';
            view_faq_frame += '</div>';
            view_faq_frame += '</div>';
            view_faq_frame += '</div>';

            $(".add-faq-section").html('');
            $(".view-faq-section").append(view_faq_frame);
            $("#action_faq1").show();

        }
    }
    function updatefaq(idval) {
        if ($("#gigform").valid()) {

            var faqquesval = $("#faqques_" + idval).val();
            var faqansval = $("#faqans_" + idval).val();
//            $("#faq_view_nav_" + idval).remove();
            $("#accordion-section-title-" + idval).html(faqquesval);
            $("#faqques_" + idval).val(faqquesval);
            $("#faqans_" + idval).val(faqansval);
            close_accordion_section(idval);
        }
    }
    function cancelfaq(idval) {
        close_accordion_section(idval);
    }
    function deletefaq(idval) {

        if ($(".faq_view_nav_" + idval).length > 0) {
            $(".faq_view_nav_" + idval).remove();
            $("#action_faq1").show();
        }
        if ($(".faq_nav_" + idval).length > 0) {
            $(".faq_nav_" + idval).remove();
            $("#action_faq1").show();
        }

    }
    function deleterequirement(idval) {
        if (idval == 1) {
            alert("You can't delete this requirement!");
        } else {
            if ($("#requirement_box_" + idval).length > 0) {
                $("#requirement_box_" + idval).remove();
                setRequirementNumbering();
            }
        }

    }
    function hideerrorsucc() {
        $('.close.close-sm').click();
    }
    $(window).load(function () {
        $("#<?php echo $disable_button; ?>").prop("disabled", false);
    });
    $(document).ready(function () {
        
        $.validator.addMethod("yturl", function (value, element) {
            return  this.optional(element) || /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/.test(value);
        }, "Youtube video url is not valid!");

        CKEDITOR.replace('description', {
            toolbar:
                    [
                        ['Styles', 'Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-'],
                        ['TextColor', 'BGColor'],
                        ['FontSize'],
                    ],
            language: '',
            height: 400,
            //uiColor: '#884EA1'
        });
        
        $('.step_form_inner').hide();
        $('#<?php echo $show_step_id; ?>').show();


        $("#gigform").validate({
            submitHandler: function (form) {
                var step = $('#stepcnt').val();

                $('input[type=checkbox]:checked').each(function () {
                    $(this).val(1);
                });
                hideerrorsucc();
                var isdocupload = $('#isdocupload').val();
                if (isdocupload == '1') {
                    var form = $('#gigform');
                    var formdata = false;
                    if (window.FormData) {
                        formData = new FormData(form[0]);
                    }
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo HTTP_PATH; ?>/gigs/uploaddocument",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('#loaderID').show();
                        },
                        success: function (data) {
                            console.log(data);
                            $('#loaderID').hide();
                            is_error = 0;
                            err_html = '';
                            jQuery.each(data.errors, function(key, value){
                                if(value != ''){
                                    is_error = 1;
                                    err_html = err_html +value+'<br/>';
                                }
                            });
                            if(is_error == '1'){
                                    jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                    setTimeout("hideerrorsucc()", 4000);
                            } else {
                                is_img = '0';
                                jQuery.each(data.file_name, function(key, value){
                                    if (value != undefined) {
                                        is_img = '1';
                                        $('#attachfiles').append(value);
                                    }
                                });
                                if(is_img == '1'){
                                    jQuery.each(data.json_data, function(key, value){
                                            $('#attachmentfiles').val(value);
                                    });
                                    document.getElementById("add_logo").value = '';
                                }
                            }
                            
                            $('#isdocupload').val('');
                        },
                        error: function (data) {
                            console.log(data);
                            $('#loaderID').hide();
                            jQuery.each(data.errors, function(key, value){
                                is_error = 1;
                                err_html = err_html +value+'<br/>';
                            });
                            if(is_error == '1'){
                                jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                setTimeout("hideerror()", 4000);
                            }
                        }
                    });

                }
                else if (step) {
                    if (step == 1) {
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo HTTP_PATH; ?>/gigs/edit/<?php echo $gigDetail->slug; ?>",
                            data: $('#gigform').serialize(),
                            cache: false,
                            beforeSend: function () {
                                $('#loaderID').show();
                            },
                            success: function (data) {
                                
                                $('#loaderID').hide();
                                is_error = '0';
                                err_html = '';
                                jQuery.each(data.errors, function(key, value){
                                    if(value != ''){
                                        is_error = 1;
                                        err_html = err_html +value+'<br/>';
                                    }
                                    
                  		});
                                
                                if(is_error == '1'){
                                        jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                        setTimeout("hideerrorsucc()", 4000);
                                } else {
                                    jQuery.each(data.message, function(key, value){
                                        jQuery('.er_msg').append('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+value+'</div>');
                                       // setTimeout("hideerrorsucc()", 4000);
                                    });
                                    

                                    $('#stepcnt').val('2');
                                    $(".step_form_inner").hide();
                                    $(".step_account2").show();

                                    $(".valid").removeClass('current');
                                    $("#tab_step_1,#tab_step_2").addClass('current');
                                }
                            },
                            error: function (data) {
                                $('#loaderID').hide();
                                jQuery.each(data.errors, function(key, value){
                                    is_error = 1;
                                    err_html = err_html +value+'<br/>';
                  		});
                                if(is_error == '1'){
                                    jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                    setTimeout("hideerror()", 4000);
                                }
                            }
                        });

                    } else if (step == 2) {
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo HTTP_PATH; ?>/gigs/edit/<?php echo $gigDetail->slug; ?>",
                            data: $('#gigform').serialize(),
                            cache: false,
                            beforeSend: function () {
                                $('#loaderID').show();
                            },
                            success: function (data) {
                                $('#loaderID').hide();
                                is_error = 0;
                                err_html = '';
                                jQuery.each(data.errors, function(key, value){
                                    if(value != ''){
                                        is_error = 1;
                                        err_html = err_html +value+'<br/>';
                                    }
                                    
                  		});
                                if(is_error == '1'){
                                        jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                        setTimeout("hideerrorsucc()", 4000);
                                } else {
                                    jQuery.each(data.message, function(key, value){
                                        jQuery('.er_msg').append('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+value+'</div>');
                                       // setTimeout("hideerrorsucc()", 4000);
                                    });
                                    $('#stepcnt').val('3');
                                    $(".step_form_inner").hide();
                                    $(".step_account3").show();
                                    $(".current").removeClass('current');
                                    $("#tab_step_1,#tab_step_2,#tab_step_3").addClass('current');
                                }
                            },
                            error: function (data) {
                                $('#loaderID').hide();
                                jQuery.each(data.errors, function(key, value){
                                    is_error = 1;
                                    err_html = err_html +value+'<br/>';
                  		});
                                if(is_error == '1'){
                                    jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                    setTimeout("hideerror()", 4000);
                                }
                            }
                        });

                    } else if (step == 3) {
                        for (instance in CKEDITOR.instances)
                            CKEDITOR.instances[instance].updateElement();
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo HTTP_PATH; ?>/gigs/edit/<?php echo $gigDetail->slug; ?>",
                            data: $('#gigform').serialize(),
                            cache: false,
                            beforeSend: function () {
                                $('#loaderID').show();
                            },
                            success: function (data) {
                                $('#loaderID').hide();
                                is_error = 0;
                                err_html = '';
                                jQuery.each(data.errors, function(key, value){
                                    if(value != ''){
                                        is_error = 1;
                                        err_html = err_html +value+'<br/>';
                                    }
                                    
                  		});
                                
                                if(is_error == '1'){
                                        jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                        setTimeout("hideerrorsucc()", 4000);
                                } else {
                                    jQuery.each(data.message, function(key, value){
                                        jQuery('.er_msg').append('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+value+'</div>');
                                       // setTimeout("hideerrorsucc()", 4000);
                                    });

                                    $('#stepcnt').val('4');
                                    $(".step_form_inner").hide();
                                    $(".step_account4").show();

                                    $(".current").removeClass('current');
                                    $("#tab_step_1,#tab_step_2,#tab_step_3,#tab_step_4").addClass('current');
                                }
                                
                            },
                            error: function (data) {
                                $('#loaderID').hide();
                                jQuery.each(data.errors, function(key, value){
                                    is_error = 1;
                                    err_html = err_html +value+'<br/>';
                  		});
                                if(is_error == '1'){
                                    jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                    setTimeout("hideerror()", 4000);
                                }
                            }        
                            
                        });


                    } else if (step == 4) {
                        $.ajax({
                        type: 'POST',
                        url: "<?php echo HTTP_PATH; ?>/gigs/edit/<?php echo $gigDetail->slug; ?>",
                        data: $('#gigform').serialize(),
                        cache: false,
                        beforeSend: function () {
                            $('#loaderID').show();
                        },
                        success: function (data) {
                            $('#loaderID').hide();
                            is_error = 0;
                            err_html = '';
                            jQuery.each(data.errors, function(key, value){
                                if(value != ''){
                                    is_error = 1;
                                    err_html = err_html +value+'<br/>';
                                }

                            });

                            if(is_error == '1'){
                                    jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                    setTimeout("hideerrorsucc()", 4000);
                            } else {
                                jQuery.each(data.message, function(key, value){
                                    jQuery('.er_msg').append('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+value+'</div>');
                                   // setTimeout("hideerrorsucc()", 4000);
                                });

                                $('#stepcnt').val('5');

                                $(".step_form_inner").hide();
                                $(".step_account5").show();

                                $(".current").removeClass('current');
                                $("#tab_step_1,#tab_step_2,#tab_step_3,#tab_step_4,#tab_step_5").addClass('current');
                            }

                        },
                        error: function (data) {
                            $('#loaderID').hide();
                            jQuery.each(data.errors, function(key, value){
                                is_error = 1;
                                err_html = err_html +value+'<br/>';
                            });
                            if(is_error == '1'){
                                jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                setTimeout("hideerror()", 4000);
                            }
                        }        

                       
                    });


                    } else if (step == 5) {

                        var form = $('#gigform');
                        var formdata = false;
                        if (window.FormData) {
                            formdata = new FormData(form[0]);
                        }

                        $.ajax({
                            type: 'POST',
                            url: "<?php echo HTTP_PATH; ?>/gigs/edit/<?php echo $gigDetail->slug; ?>",
                            data: formdata ? formdata : form.serialize(),
                            cache: false,
                            contentType: false,
                            processData: false,
                            beforeSend: function () {
                                $('#loaderID').show();
                            },
                            success: function (data) {
                                $('#loaderID').hide();
                                is_error = 0;
                                err_html = '';
                                jQuery.each(data.errors, function(key, value){
                                    if(value != ''){
                                        is_error = 1;
                                        err_html = err_html +value+'<br/>';
                                    }

                                });

                                if(is_error == '1'){
                                        jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                        setTimeout("hideerrorsucc()", 4000);
                                } else {
                                    jQuery.each(data.message, function(key, value){
                                        jQuery('.er_msg').append('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+value+'</div>');
                                       // setTimeout("hideerrorsucc()", 4000);
                                    });
                                    $('#stepcnt').val('6');

                                    $(".step_form_inner").hide();
                                    $(".step_account6").show();

                                    $(".current").removeClass('current');
                                    $("#tab_step_1,#tab_step_2,#tab_step_3,#tab_step_4,#tab_step_5,#tab_step_6").addClass('current');
                                }

                            },
                            error: function (data) {
                                $('#loaderID').hide();
                                jQuery.each(data.errors, function(key, value){
                                    is_error = 1;
                                    err_html = err_html +value+'<br/>';
                                });
                                if(is_error == '1'){
                                    jQuery('.er_msg').append('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>'+err_html+'</div>');
                                    setTimeout("hideerror()", 4000);
                                }
                            }        
                            
                        });
                        $('#stepcnt').val('6');

                        $(".step_form_inner").hide();
                        $(".step_account6").show();

                    } else {
                        if (confirm('Are you sure to publish this gig?')) {
                            form.submit();
                            return true;
                        } else {
                            return false;
                        }

                    }
                }
            }
        });


        $("#backstep_1").click(function () {
            $('#stepcnt').val('1');
            $(".step_form_inner").hide();
            $(".step_account1").show();

            $(".current").removeClass('current');
            $("#tab_step_1").addClass('current');
        });
        //2
        $("#backstep_2").click(function () {
            $('#stepcnt').val('2');
            $(".step_form_inner").hide();
            $(".step_account2").show();

            $(".current").removeClass('current');
            $("#tab_step_1,#tab_step_2").addClass('current');
        });
        $("#backstep_3").click(function () {
            $('#stepcnt').val('3');
            $(".step_form_inner").hide();
            $(".step_account3").show();
            $(".current").removeClass('current');
            $("#tab_step_1,#tab_step_2,#tab_step_3").addClass('current');
        });
        $("#backstep_4").click(function () {
            $('#stepcnt').val('4');
            $(".step_form_inner").hide();
            $(".step_account4").show();
            $(".current").removeClass('current');
            $("#tab_step_1,#tab_step_2,#tab_step_3,#tab_step_4").addClass('current');
        });
        $("#backstep_5").click(function () {
            $('#stepcnt').val('5');
            $(".step_form_inner").hide();
            $(".step_account5").show();
            $(".current").removeClass('current');
            $("#tab_step_1,#tab_step_2,#tab_step_3,#tab_step_4,#tab_step_5").addClass('current');
        });
        $("#backstep_6").click(function () {
            $('#stepcnt').val('6');
            $(".step_form_inner").hide();
            $(".step_account6").show();
            $(".current").removeClass('current');
            $("#tab_step_1,#tab_step_2,#tab_step_3,#tab_step_4,#tab_step_5,#tab_step_6").addClass('current');
        });
        $("#category_id").change(function () {
            var catid = $("#category_id").val();
            $("#subcategory").load('<?php echo HTTP_PATH . '/gigs/getsubcategorylist/' ?>' + catid);
        });
    });
</script>
<div class="main_dashboard">
    <div class="dashboard-menu">
        <div class="navbar navbar-default">
            <nav class="navbar navbar-me">
                <div class="container">
                    <div class="nevicatio-menu">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="top_tab" data-mode="wizard">
                                <li class="step hint--bottom">
                                    <a href="#!" id="tab_step_1" class="valid <?php echo $is_step_1; ?>" >
                                        <span>1</span> Overview
                                    </a>
                                </li>
                                <li class="step hint--bottom">
                                    <a href="#!" id="tab_step_2" class="valid <?php echo $is_step_2; ?>">
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
                </div>
            </nav>
        </div>
    </div>
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>
                <div class="gig_from">
                    {{Form::model($gigDetail, ['method' => 'post', 'name' => 'gigform', 'id' => 'gigform', 'enctype' => "multipart/form-data"]) }} 
                    <input type="hidden" value="<?php echo $stepcount; ?>" name="stepcnt" id="stepcnt" />
                    <input type="hidden" name="isdocupload" id="isdocupload" value="" />
                    <div class="step_form_inner step_account1" id="gig_overview">
                        <div class="form_field">
                            <label>GIG TITLE</label>   
                            <div class="right_filed">
                                <div class="text_area">
                                    {{Form::textarea('title', null, ['minlength' => 5, 'maxlength' => 80, 'class'=>'form-control required', 'placeholder'=>"Do something i'm really good at", 'autocomplete' => 'off', 'rows'=>4])}}
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
                            <label>category</label>   
                            <div class="right_filed half_field">
                                <figure class="selecttooltip">
                                    <figcaption>
                                        <h3>Where will your Gig end up?</h3>
                                        <p>Please choose the category and sub-category most suitable for your Gig.</p>
                                    </figcaption>
                                    <div class="gig-tooltip-img"></div>
                                </figure>
                                <span class="drop_down_arow">
                                    {{Form::select('category_id', $catList,null, ['class' => 'form-control required','placeholder' => 'Select Category','id' => 'category_id'])}}
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
                                    {{Form::select('subcategory_id', $subCatList,null, ['class' => 'form-control required','placeholder' => 'Select Sub Category'])}}
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
                                                ?> <option value="<?php echo $skillsVal; ?>" <?php echo (in_array($id, explode(',', $gigDetail->tags)) ? ' selected' : '') ?>><?php echo $skillsVal; ?></option><?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <span class="first_txt">i will</span>
                                </div>
                                <div class="tag_tooltip">
                                    <div class="fake-hint blue">
                                        <div class="icn">
                                            <i class="fa fa-lightbulb-o"></i>
                                        </div>
                                        <span class="fake-hint-title">Enter search terms, which you feel buyers will use when looking for your service. The terms you enter here are very important and will have an impact on your overall exposure on Fiverr. When adding your search terms, please keep in mind the following:</span>
                                        <ul>
                                            <li>Special characters and duplicated terms will be ignored.</li>
                                            <li>It doesn’t matter if you use upper case, lower case letters, or plural forms of words.</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="page_btn">
                            <a href="{{ URL::to( 'users/dashboard')}}" title="Cancel" class="btn btn-default canlcel_le">Cancel</a>
                            {{Form::submit('Save &amp; Continue', ['class' => 'btn btn-info', 'id'=>'step_2'])}}
                        </div>
                    </div>
                    <div class="step_form_inner second_page step_account2" id="gig_package">
                        <div class="page_title">Packages</div>   
                        <div class="table-container">
                            <table cellspacing="0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="shown">
                                            Basic
                                        </th>
                                        <th class="shown">
                                            Standard
                                        </th>
                                        <th class="shown">
                                            Premium
                                        </th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    <tr>
                                        <th>Title</th>
                                        <td class="package_tool tool_first">
                                            {{Form::textarea('basic_title', null, ['minlength' => 5, 'maxlength' => 35, 'class'=>'required', 'placeholder'=>"Name your package"])}}
                                            <!--<i class="fa fa-pencil"></i>-->
                                            <div class="package_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Title</span>
                                                    <ul>
                                                        <li>Give your package a catchy title, which describes what it includes.</li>
                                                        <li><strong>For example:</strong> 2D or 3D cover, Print-Ready Version</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </td>
                                        <td class="package_tool tool_sec">
                                            {{Form::textarea('standard_title', null, ['minlength' => 5, 'maxlength' => 35, 'class'=>'required', 'placeholder'=>"Name your package"])}}
                                            <!--<i class="fa fa-pencil"></i>-->
                                            <div class="package_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Title</span>
                                                    <ul>
                                                        <li>Give your package a catchy title, which describes what it includes.</li>
                                                        <li><strong>For example:</strong> 2D or 3D cover, Print-Ready Version</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td  class="package_tool tool_third">
                                            {{Form::textarea('premium_title', null, ['minlength' => 5, 'maxlength' => 35, 'class'=>'required', 'placeholder'=>"Name your package"])}}
                                            <!--<i class="fa fa-pencil"></i>-->
                                            <div class="package_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Title</span>
                                                    <ul>
                                                        <li>Give your package a catchy title, which describes what it includes.</li>
                                                        <li><strong>For example:</strong> 2D or 3D cover, Print-Ready Version</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>Description</th>
                                        <td class="description_tool desc_one">
                                            {{Form::textarea('basic_description', null, ['minlength' => 5, 'maxlength' => 100, 'class'=>'required', 'placeholder'=>"Description"])}}

                                        <!--<i class="fa fa-pencil"></i>-->
                                            <div class="delivery_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Description</span>
                                                    <ul>
                                                        <li>Summarize what this package offers buyers, and why you included these items in your package.</li>
                                                        <li>You can use maximum 100 chars.</li>
                                                        <p><strong>For example:</strong> This "Full Logo Design" package includes a standard logo design with 4 revisions and the source file.</p>
                                                    </ul>

                                                </div>
                                            </div>

                                        </td>
                                        <td class="description_tool desc_sec">
                                            {{Form::textarea('standard_description', null, ['minlength' => 5, 'maxlength' => 100, 'class'=>'required', 'placeholder'=>"Description"])}}
                                            <!--<i class="fa fa-pencil"></i>-->
                                            <div class="delivery_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Description</span>
                                                    <ul>
                                                        <li>Summarize what this package offers buyers, and why you included these items in your package.</li>
                                                        <li>You can use maximum 100 chars.</li>
                                                        <p><strong>For example:</strong> This "Full Logo Design" package includes a standard logo design with 4 revisions and the source file.</p>
                                                    </ul>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="description_tool desc_thir">
                                            {{Form::textarea('premium_description', null, ['minlength' => 5, 'maxlength' => 100, 'class'=>'required', 'placeholder'=>"Description"])}}
                                            <!--<i class="fa fa-pencil"></i>-->
                                            <div class="delivery_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Description</span>
                                                    <ul>
                                                        <li>Summarize what this package offers buyers, and why you included these items in your package.</li>
                                                        <li>You can use maximum 100 chars.</li>
                                                        <p><strong>For example:</strong> This "Full Logo Design" package includes a standard logo design with 4 revisions and the source file.</p>
                                                    </ul>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>Delivery Time</th>
                                        <td class="deliverytool deli_first">
                                            <span class="drop_arow">
                                                <?php global $delivery_days; ?>
                                                {{Form::select('basic_delivery', $delivery_days,null, ['class' => 'required','placeholder' => 'Delivery Time'])}}
                                            </span>
                                            <div class="delivery_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Delivery Time</span>
                                                    <ul>
                                                        <li>Delivery Time is the amount of time you have to work on the package, starting from when a buyer places the order.</li>
                                                        <li>Set a delivery time that makes sense for you, based on the combined time it takes you to create every part of the package.</li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="deliverytool deli_sec"> 
                                            <span class="drop_arow">
                                                {{Form::select('standard_delivery', $delivery_days,null, ['class' => 'required','placeholder' => 'Delivery Time'])}}
                                            </span>
                                            <div class="delivery_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Delivery Time</span>
                                                    <ul>
                                                        <li>Delivery Time is the amount of time you have to work on the package, starting from when a buyer places the order.</li>
                                                        <li>Set a delivery time that makes sense for you, based on the combined time it takes you to create every part of the package.</li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </td>
                                        <td class="deliverytool deli_thiir">
                                            <span class="drop_arow">
                                                {{Form::select('premium_delivery', $delivery_days,null, ['class' => 'required','placeholder' => 'Delivery Time'])}}
                                            </span>
                                            <div class="delivery_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Delivery Time</span>
                                                    <ul>
                                                        <li>Delivery Time is the amount of time you have to work on the package, starting from when a buyer places the order.</li>
                                                        <li>Set a delivery time that makes sense for you, based on the combined time it takes you to create every part of the package.</li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>Revision</th>
                                        <td>
                                            <span class="drop_arow">
                                                <?php global $revisions; ?>
                                                {{Form::select('basic_revision', $revisions,null, ['class' => 'required','placeholder' => 'Select'])}}                                           
                                            </span>
                                            <div class="delivery_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Revision</span>
                                                    <ul>
                                                        <li>Delivery Time is the amount of time you have to work on the package, starting from when a buyer places the order.</li>
                                                        <li>Set a delivery time that makes sense for you, based on the combined time it takes you to create every part of the package.</li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <span class="drop_arow">
                                                {{Form::select('standard_revision', $revisions,null, ['class' => 'required','placeholder' => 'Select'])}}                                           
                                            </span>
                                            <div class="delivery_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Revision</span>
                                                    <ul>
                                                        <li>Delivery Time is the amount of time you have to work on the package, starting from when a buyer places the order.</li>
                                                        <li>Set a delivery time that makes sense for you, based on the combined time it takes you to create every part of the package.</li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <span class="drop_arow">
                                                {{Form::select('premium_revision', $revisions,null, ['class' => 'required','placeholder' => 'Select'])}}                                           
                                            </span>
                                            <div class="delivery_tooltip">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Revision</span>
                                                    <ul>
                                                        <li>Delivery Time is the amount of time you have to work on the package, starting from when a buyer places the order.</li>
                                                        <li>Set a delivery time that makes sense for you, based on the combined time it takes you to create every part of the package.</li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </td>
                                    </tr>   
                                    <tr>
                                        <th>Price</th>
                                        <td class="price_tooltip first_rate">
                                            <span class="drop_arow">
                                                <?php global $package_price; ?>
                                                {{Form::select('basic_price', $package_price,null, ['class' => 'required','placeholder' => 'Select Price'])}}
                                            </span>

                                            <div class="price_tool price_first">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Price</span>
                                                    <ul>
                                                        <li>Earn up to 64% more per order with Triple Gig Packages</li>
                                                        <li>Package price can be between $5 - $995.</li>
                                                        <li>Price your packages from lowest (Basic) to highest (Premium).</li>
                                                        <li>You can always change your package price in the future.</li>
                                                        <li>This is the base price, you can add "Upgrades" in the section below.</li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </td>
                                        <td class="price_tooltip second_rate">
                                            <span class="drop_arow">
                                                {{Form::select('standard_price', $package_price,null, ['class' => 'required','placeholder' => 'Select Price'])}}
                                            </span>
                                            <div class="price_tool price_first">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Price</span>
                                                    <ul>
                                                        <li>Earn up to 64% more per order with Triple Gig Packages</li>
                                                        <li>Package price can be between $5 - $995.</li>
                                                        <li>Price your packages from lowest (Basic) to highest (Premium).</li>
                                                        <li>You can always change your package price in the future.</li>
                                                        <li>This is the base price, you can add "Upgrades" in the section below.</li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </td>
                                        <td class="price_tooltip third_rate">
                                            <span class="drop_arow">
                                                {{Form::select('premium_price', $package_price,null, ['class' => 'required','placeholder' => 'Select Price'])}}
                                            </span>
                                            <div class="price_tool price_first">
                                                <div class="fake-hint blue">
                                                    <div class="icn">
                                                        <i class="fa fa-lightbulb-o"></i>
                                                    </div>
                                                    <span class="fake-hint-title">Price</span>
                                                    <ul>
                                                        <li>Earn up to 64% more per order with Triple Gig Packages</li>
                                                        <li>Package price can be between $5 - $995.</li>
                                                        <li>Price your packages from lowest (Basic) to highest (Premium).</li>
                                                        <li>You can always change your package price in the future.</li>
                                                        <li>This is the base price, you can add "Upgrades" in the section below.</li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </td>
                                    </tr>    
                                </tbody>
                            </table>    
                        </div>
                        <div class="page_btn">

                            <!--<a href="{{ URL::to( 'users/dashboard')}}" title="Cancel" class="btn btn-default canlcel_le">Cancel</a>-->
                            {{Form::button('Back', ['class' => 'cancel_btn', 'id'=>'backstep_1'])}}
                            {{Form::submit('Save &amp; Continue', ['class' => 'btn btn-info', 'id'=>'step_3'])}}
                        </div>
                    </div>
                    <div class="step_form_inner third_page step_account3" id="gig_description">
                        <div class="descriptiomn">
                            <h3>Description</h3>
                        </div>   

                        <div class="descrp_text">
                            <label>Briefly Describe Your Gig</label> 
                            {{Form::textarea('description', null, ['minlength' => 120, 'maxlength' => 1200, 'class'=>'required', 'placeholder'=>"Description"])}}
                            <div class="notee">
                            </div>
                            <div class="desicri_tooltip">
                                <div class="fake-hint blue">
                                    <div class="icn">
                                        <i class="fa fa-lightbulb-o"></i>
                                    </div>
                                    <span class="fake-hint-title">This is your chance to be creative. Explain your Gig.</span>
                                    <p>Describe what you are offering. Be as detailed as possible so buyers will be able to understand if this meets their needs. Should be at least 120 characters.</p>
                                </div>
                            </div>
                        </div>

                        <div class="descriptiomn input_border">
                            <h3>Frequently Asked Questions <a href="javascript:void(0);" class="action-faq" id="action_faq1" onclick="addFaq()"> + add FAQ</a></h3>
                            <b>Add Questions & Answers for Your Buyers.</b>
                            <a href="javascript:void(0);" class="action-faq" id="action_faq2" onclick="addFaq()">+ Add FAQ</a> 
                        </div>  
                        <div class="add-faq-section">
                        </div>
                        <div class="view-faq-section">
                            <?php
                            if (count($recordFaqInfo) > 0) {
                                foreach ($recordFaqInfo as $key => $gigfaqques) {
                                    $currtime = time();
                                    $currid = $currtime . $key;
                                    ?>
                                    <div class="faq_view_nav_<?php echo $currid; ?>">
                                        <div class="question_accordion">
                                            <div class="accordion-section">
                                                <a id="accordion-section-title-<?php echo $currid; ?>" class="accordion-section-title" href="#accordion-<?php echo $currid; ?>" onclick="open_accordion_section('<?php echo $currid; ?>')"><?php echo $gigfaqques->question; ?></a>
                                                <div id="accordion-<?php echo $currid; ?>" class="accordion-section-content">
                                                    <div class="form_fieldd">
                                                        {{Form::text('question', $gigfaqques->question, ['name' => 'question[]', 'id' => 'faqques_' . $currid, 'class'=>'faqques required', 'minlength' => 5, 'maxlength' => 80, 'placeholder'=>'Add a Question: i.e. Do you translate to English as well?', 'autocomplete'=>'OFF'])}}
                                                        {{Form::textarea('answer', $gigfaqques->answer, ['name' => 'answer[]', 'id' => 'faqans_' . $currid, 'minlength' => 5, 'maxlength' => 300, 'class'=>'faqans texta required', 'placeholder'=>"Add an Answer: i.e. Yes, I also translate from English to Hebrew."])}}
                                                        <div class="notee">
                                                            <!--<span class="right">max. 300 Characters</span>-->    
                                                        </div>

                                                    </div>
                                                    <div class="text_btn">
                                                        <a class="trash_left" href="javascript:void(0);" onclick="deletefaq('<?php echo $currid; ?>')"><i class="fa fa-trash"></i> Delete</a>
                                                        {{Form::button('Cancel', ['class' => 'btn-standard btn-white-grad btn-cancel-faq', 'id'=>'faqcan_'.$currid, 'onclick'=>'cancelfaq('.$currid.')'])}}
                                                        {{Form::button('update', ['class' => 'btn-standard btn-green-grad btn-add-faq', 'id'=>'faqsub_'.$currid, 'onclick'=>'updatefaq('.$currid.')'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="page_btn">
                            {{Form::button('Back', ['class' => 'cancel_btn', 'id'=>'backstep_2'])}}
                            {{Form::submit('Save &amp; Continue', ['class' => 'btn btn-info', 'id'=>'step_4'])}}
                        </div>
                    </div>
                    <div class="step_form_inner fourth_page step_account4" id="gig_requirement">
                    <div class="description">
                        <i class="fa fa-file"></i>
                        <h4>Tell your buyer what you need to get started.</h4>
                        <small>Structure your Buyer Instructions as free text.</small>
                    </div>

                    <div class="text_fileld_wrap">
                        <div class="text_fileld_wrap_req">
                            <?php
                            //pr($gigDetail['Gigrequirement']);
                            if (count($recordReqInfo) > 0) {
                                $reqno = 0;
                                foreach ($recordReqInfo as $rkey => $gigreq) {
                                    $currtime = time();
                                    $currid = $currtime . $rkey;
                                    $reqno = $reqno + 1;
                                    ?>
                                    <div id="requirement_box_<?php echo $reqno; ?>" class="answer_div">
                                        <label class="req_lbl">REQUIREMENT #<?php echo $reqno; ?></label>
                                        <?php if ($reqno != 1) { ?>
                                            <a href="javascript:void(0)" onclick="deleterequirement(<?php echo $reqno; ?>)"><i class="fa fa-trash"></i></a>
                                        <?php } ?>
                                        {{Form::textarea('reqdescription', $gigreq->description, ['name' => 'reqdescription[' . $reqno . ']', 'id' => 'faqreq_' . $reqno, 'minlength' => 5, 'maxlength' => 300, 'class'=>'required', 'placeholder'=>"For example: specifications, dimensions, brand guidelines, or background materials."])}}
                                        <div class="notee">
                                            <!--<span class="right">0 / 450 Characters</span>-->    
                                        </div>
                                        <div class="textarea_active">
                                            <div class="answer">
                                                <?php $gigreq->is_mandatory == 1 ? $reqcheck = "checked='checked'" : $reqcheck = ''; ?>
                                                <input type="checkbox" name="is_mandatory[<?php echo $reqno; ?>]" value="<?php echo $gigreq->is_mandatory; ?>" id="faqmand_<?php echo $reqno; ?>" class="css-checkbox in-checkbox" <?php echo $reqcheck; ?>">
                                                <label class="in-label" for="checkboxG<?php echo $reqno; ?>">Answer is mandatory</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                ?>
                                <div id="requirement_box_1" class="answer_div">
                                    <label class="req_lbl">REQUIREMENT #1</label>
                                    {{Form::textarea('reqdescription', null, ['name' => 'reqdescription[1]', 'id' => 'faqreq_1', 'minlength' => 20, 'maxlength' => 450, 'class'=>'required', 'placeholder'=>"For example: specifications, dimensions, brand guidelines, or background materials."])}}
                                    <div class="notee">
<!--                                        <span class="right">0 / 450 Characters</span>    -->
                                    </div>
                                    <div class="textarea_active">

                                        <div class="answer">
                                            <input type="checkbox" name="is_mandatory[1]" value="1" id="faqmand_1" class="css-checkbox in-checkbox" checked="checked">
                                            <label class="in-label" for="checkboxG1">Answer is mandatory</label>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="another"><a href="javascript:void(0)" onclick="addmorerequirement()"><b>+</b> Add another requirement</a></div>
                    </div> 

                    <div class="page_btn">
                        <!--<a class="cancel_btn" href="javascript:void(0);">cancel</a>-->
                        {{Form::button('Back', ['class' => 'cancel_btn', 'id'=>'backstep_3'])}}
                        {{Form::submit('Save &amp; Continue', ['class' => 'btn btn-info', 'id'=>'step_5'])}}
                    </div>

                </div>
                    
                    
                    <div class="step_form_inner fifth_page step_account5" id="gig_gallery">
                    <div class="box_title">
                        <h3>Build Your Gig Gallery</h3>
                        <p>Add memorable content to your gallery to set yourself apart from competitors.</p>
                    </div>
                    <div class="gig_video">
                        <div class="gigtag_line">
                            <span>Youtube Video URL</span>  
                            <span></span>
                        </div>   
                        <div class="form_fieldd">
                            {{Form::text('youtube_url', null, ['id' => 'faqques_' . $currid, 'class'=>'yturl required', 'autocomplete'=>'OFF'])}}
                        </div>
                        <div class="dropzone-body video"></div>
                        <div class="gig_video_tooltip">
                            <div class="fake-hint blue">
                                <div class="icn">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <span class="fake-hint-title">Video</span>
                                <p>Videos can increase user engagement by 40%.</p>
                                <br>
                                <p>Ensure the production quality is representative of your deliveries.</p>
                                <br>
                                <p>Need help with your video? Check out our <?php echo SITE_TITLE; ?> expert audio/video talent here.</p>


                            </div>
                        </div>  
                    </div>
                    <div class="gig_video gig_photo">
                        <div class="gigtag_line">
                            <span>Gig Photos</span> 
                            Upload photos that describe or are related to your Gig. 
                            <span></span>
                        </div>   
                        <div class="wiz_cols_nw">
                            <?php
                            foreach ($recordImgInfo as $key => $value) {
                                ?>
                                <div class="form_row_fhr_cols" id="<?php echo $key; ?>imagediv">
                                    <div class="shoe_imagrd_rgijt_img">
                                        <div class="shoe_imagrd_rgijt_img_minimg">
                                            <?php
                                            $filePath = GIG_FULL_UPLOAD_PATH . $value->name;
                                            $imgid = $key + 1; ?>
                                            @if(file_exists($filePath) && $value->name != '')
                                                {{HTML::image(GIG_SMALL_DISPLAY_PATH.$value->name, SITE_TITLE,['id' => 'ShowImage' . $imgid, 'style'=>"max-width: 200px", 'class' => 'umg_ahe'])}}
                                            @else 
                                                {{HTML::image('front/no_image.png', SITE_TITLE,['id' => 'ShowImage' . $imgid, 'style'=>"max-width: 200px", 'class' => 'umg_ahe'])}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="shoe_imagrd_rgijt">
                                        <span class="inline-gsj">
                                            <input type="hidden" value="<?php echo $value->id; ?>" name="image_id[]" />
                                            <input type="hidden" value="<?php echo $value->name; ?>" name="old_image[]" />
                                            {{Form::file('image[]', ['class' => 'images', 'id' => 'image' . $key, 'class'=>'form-control', 'accept'=>IMAGE_EXT])}}
                                      
                                            <label for="image<?php echo $key; ?>"></label>
                                        </span>
                                        <div class="image_detail_show" id="fp"></div>
                                    </div>

                                </div>
                                <?php
                            }
                            $i = count($recordImgInfo);
                            for ($key = $i; $key < 3; $key++) {
                                $imgid = $key + 1;
                                ?>
                                <div class="form_row_fhr_cols" id="<?php echo $key; ?>imagediv">
                                    <div class="shoe_imagrd_rgijt_img">
                                        <div class="shoe_imagrd_rgijt_img_minimg">
                                                {{HTML::image('front/no_image.png', SITE_TITLE,['id' => 'ShowImage' . $imgid, 'style'=>"max-width: 200px", 'class' => 'umg_ahe'])}}
                                        </div>
                                    </div>
                                    <div class="shoe_imagrd_rgijt">
                                        <span class="inline-gsj">
                                            {{Form::file('image[]', ['class' => 'images', 'id' => 'image' . $key, 'class'=>'form-control', 'accept'=>IMAGE_EXT])}}
                                            <label for="image<?php echo $key; ?>"></label>
                                        </span>
                                        <div class="image_detail_show" id="fp"></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>  
                        <div class="gig_photo_tooltip">
                            <div class="fake-hint blue">
                                <div class="icn">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <span class="fake-hint-title">Photos</span>
                                <p>Files must be in JPEG, JPG, PNG • 3 file limit.</p>
                                <br>
                                <p>The quality of the photos you display will influence customers. Get help from expert photoshop talent here.</p>
                            </div>
                        </div> 
                    </div>
                    <div class="gig_video gig_pdf">
                        <div class="gigtag_line">
                            <span>Gig Documents</span>
                            We only recommend adding a Document file if it further clarifies the service you will be providing. 
                            <span></span>
                        </div>   
                        <div class="gig_attach_box">
                            {{Form::file('files_name', ['class' => 'images', 'id'=>'add_logo', 'class'=>'form-control file-item', 'accept'=>DOC_EXT])}}
                            <div class="help_text">Supported File Types: doc, docx, pdf (Max. 2MB)</div>
                            <div id="attachfiles">
                                <?php  
                                
                                $attachment = array_filter(explode(',',old('pdf_doc')));
                                
                                if(!empty($attachment)){ ?>
                                    <?php 
                                        foreach($attachment as $attachmental){
                                            if(file_exists(GIG_DOC_FULL_UPLOAD_PATH.$attachmental) && $attachmental!=""){
                                                $rand = rand(100, 999);
                                                echo '<li id="' . $rand . '" data-img="'.$attachmental.'" class="portfolio-cc">' . $attachmental . '<a href="javascript:void(0);" onclick="deletefile(' . $rand . ')" class="delete"><i class="fa fa-trash-o"></i></a></li>';
                                             }
                                        }

                                    ?>

                        <?php }else{ 
                            $attachment = array_filter(explode(',',$gigDetail->pdf_doc));
                             if(!empty($attachment)){ ?>
                                    <?php 
                                        foreach($attachment as $attachmental){
                                            if(file_exists(GIG_DOC_FULL_UPLOAD_PATH.$attachmental) && $attachmental!=""){
                                                $rand = rand(100, 999);
                                                echo '<li id="' . $rand . '" data-img="'.$attachmental.'" class="portfolio-cc">' . $attachmental . '<a href="javascript:void(0);" onclick="deletefile(' . $rand . ')" class="delete"><i class="fa fa-trash-o"></i></a></li>';
                                             }
                                        }

                                    ?>

                        <?php } } ?>
                        </div>

                        </div>  
                        <div class="gig_pdf_tooltip">
                            <div class="fake-hint blue">
                                <div class="icn">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <span class="fake-hint-title">Documents</span>
                                <p>The quality of the content in your Documents will influence potential customers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="page_btn">
                        <input type="hidden" name="isdocupload" id="isdocupload" value="" />
                        <input type="hidden" name="pdf_doc" id="attachmentfiles" value="<?php echo $gigDetail->pdf_doc; ?>" />
                        {{Form::button('Back', ['class' => 'cancel_btn', 'id'=>'backstep_4'])}}
                        {{Form::submit('Save &amp; Continue', ['class' => 'btn btn-info', 'id'=>'step_6'])}}
                    </div>
                </div>
                    
                    <div class="step_form_inner fifth_page step_account6" id="gig_publish">

                    <div class="congratulation_content">
                        <h2>Congratulations!</h2>
                        <h3 class="alt">You’re almost done with your first Gig.</h3>
                        <h4>Before you start selling on <?php echo SITE_TITLE; ?>, please confirm all details. <br>
                    </div>
                    <div class="simple_txt">If you agree with our <a href="javascript:void(0);" onclick="window.open('<?php echo HTTP_PATH ?>/privacy-policy', 'term', 'width=900,height=400,scrollbars=1')" >Privacy Policy</a> than please click on Save and Publish button</div>
                    <div class="page_btn">
                        {{Form::button('Back', ['class' => 'cancel_btn', 'id'=>'backstep_5'])}}
                        {{Form::submit('Save & Publish', ['class' => 'btn btn-info', 'id'=>'step_7'])}}
                    </div>
                </div>

                    {{ Form::close()}}
                </div>

            </div>
        </div>
    </section>
</div>


<script>
    function open_accordion_section(val) {
        //alert(val);
        var currentAttrValue = '#accordion-' + val;

        if ($('#accordion-section-title-' + val).is('.active')) {
            close_accordion_section();
        } else {
            close_accordion_section();

            // Add active class to section title
            $('#accordion-section-title-' + val).addClass('active');
            // Open up the hidden content panel
            $('.question_accordion ' + currentAttrValue).slideDown(300).addClass('open');
        }
    }
    function close_accordion_section() {
        jQuery('.question_accordion .accordion-section-title').removeClass('active');
        jQuery('.question_accordion .accordion-section-content').slideUp(300).removeClass('open');
    }

    function addmorerequirement() {
        
        var timestamp = Number(new Date()); // current time as number
        newItem = timestamp;
        var faqnav = '<div id="requirement_box_' + newItem + '" class="answer_div">';
        faqnav += '<label class="req_lbl">REQUIREMENT #' + newItem + '</label>';
        faqnav += '<a href="javascript:void(0)" onclick="deleterequirement(' + newItem + ')"><i class="fa fa-trash"></i></a>';
        faqnav += '<textarea name="reqdescription[' + newItem + ']" id="faqreq_' + newItem + '" minlength="20" maxlength="450" class="faqans texta required valid" placeholder="For example: specifications, dimensions, brand guidelines, or background materials."></textarea>';
        faqnav += '<div class="notee">';
//        faqnav += '<span class="right">0 / 450 Characters</span>';
        faqnav += '</div>';
        faqnav += '<div class="textarea_active">';
        faqnav += '<div class="answer">';
        faqnav += '<input type="checkbox" name="is_mandatory[' + newItem + ']" id="faqmand_' + newItem + '" class="css-checkbox in-checkbox">';
        faqnav += '<label class="in-label" for="faqmand_' + newItem + '">Answer is mandatory</label>';
        faqnav += '</div>';
        faqnav += '</div>';
        faqnav += '</div>';
        $(".text_fileld_wrap_req").append(faqnav);

        setRequirementNumbering();
    }
    function setRequirementNumbering() {
        var total_requirement = $('.req_lbl').length;
        for (var r = 0; r < total_requirement; r++) {
            var r_no = r + 1;
            $(".req_lbl:eq(" + r + ")").html("REQUIREMENT #" + r_no);
        }
    }
</script>

<script>
    function in_array(needle, haystack) {
        for (var i = 0, j = haystack.length; i < j; i++) {
            if (needle == haystack[i])
                return true;
        }
        return false;
    }

    function getExt(filename) {
        var dot_pos = filename.lastIndexOf(".");
        if (dot_pos == -1)
            return "";
        return filename.substr(dot_pos + 1).toLowerCase();
    }

    function imageValidation(imageId) {
        $('#no_image_div').css("display", "none");
        $('#selectIcon').css("display", "none");
        $('#undoIcon').css("display", "block");
        var filename = document.getElementById(imageId).value;
        var filetype = ['jpg', 'jpeg', 'png', 'gif'];
        if (filename != '') {
            var ext = getExt(filename);
            ext = ext.toLowerCase();
            var checktype = in_array(ext, filetype);
            if (!checktype) {
                alert(ext + " file not allowed.");
                document.getElementById(imageId).value = '';
                return false;
            } else {
                var fi = document.getElementById(imageId);
                var filesize = fi.files[0].size;//check uploaded file size
                if (filesize > 8388608) {
                    alert('Maximum 8MB file size allowed.');
                    document.getElementById(imageId).value = '';
                    return false;
                }
            }
        }
    }
    function pdfValidation(imageId) {
        $('#no_image_div').css("display", "none");
        $('#selectIcon').css("display", "none");
        $('#undoIcon').css("display", "block");
        var filename = document.getElementById(imageId).value;
        var filetype = ['pdf'];
        if (filename != '') {
            var ext = getExt(filename);
            ext = ext.toLowerCase();
            var checktype = in_array(ext, filetype);
            if (!checktype) {
                alert(ext + " file not allowed.");
                document.getElementById(imageId).value = '';
                return false;
            } else {
                var fi = document.getElementById(imageId);
                var filesize = fi.files[0].size;//check uploaded file size
                if (filesize > 8388608) {
                    alert('Maximum 8MB file size allowed.');
                    document.getElementById(imageId).value = '';
                    return false;
                }
            }
        }
    }

</script>
<script>
function deletefile(id){
       $('#'+id).remove();
       var img = $('#'+id).attr('data-img');
       var attachmentfiles = $('#attachmentfiles').val();
       if(attachmentfiles != ""){
           var imgs = attachmentfiles.split(',');
           imgs.splice( $.inArray(img,imgs) ,1 );
           $('#attachmentfiles').val(imgs.join(','));
            $.ajax({
                type:'POST',
                 url: "<?php echo HTTP_PATH; ?>/gigs/updatedocument/<?php echo $gigDetail->id ?>",
                data:{'files': $('#attachmentfiles').val()},
                cache:false,
                 beforeSend: function () {
                    NProgress.start(); 
                },
                success:function(data){
                    NProgress.done(); 
                    
                },
                error: function(data){
                    console.log("error");
                    console.log(data);
                }
            });
       }
}
    function uploadLogo() {
        var filename = document.getElementById("add_logo").value;
        var filetype = ['doc', 'pdf', 'docx'];
        if (filename != '') {
            var ext = getExt(filename);
            ext = ext.toLowerCase();
            var checktype = in_array(ext, filetype);
            if (!checktype) {
                alert(ext + " file not allowed for Attachment.");
                document.getElementById("add_logo").value = '';
                return false;
            } else {
                var fi = document.getElementById('add_logo');
                var filesize = fi.files[0].size;//check uploaded file size
                if (filesize > 2097152) {
                    alert('Maximum 2MB file size allowed for Attachment.');
                    document.getElementById("add_logo").value = '';
                    return false;
                }
            }
        }
        $("#isdocupload").val('1');
        $("#gigform").submit();
        return true;
    }
</script>
<script>
$(document).ready(function (e) {

        $("#add_logo").on("change", function () {
            uploadLogo();

        });
    });
</script>






<script type="text/javascript">
    $('.tokenize-custom-demo1').tokenize2({
        tokensAllowCustom: true
    });
</script>
@endsection
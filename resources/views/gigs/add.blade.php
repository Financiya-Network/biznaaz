@extends('layouts.inner')
@section('content')

<div class="main_dashboard">
 <section class="dashboard-section">
        <div class="container">
            <div class="row">
<div class="step_page">

    <div class="top_bar">
        <div class="wrapper">
            <ul class="top_tab" >
                <li class="step hint--bottom">
                    <a href="#!" id="" class="">
                        <span>1</span> Overview
                    </a>
                </li>
                <li class="step hint--bottom">
                    <a href="#!" id="" class="">
                        <span>2</span>  Pricing
                    </a>
                </li>
                <li class="step hint--bottom">
                    <a href="#!" id="" class="">
                        <span>3</span>   Description &amp; FAQ
                    </a>
                </li>
                <li class="step hint--bottom">
                    <a href="#!" id="" class="">
                        <span>4</span> Requirements
                    </a>
                </li>
                <li class="step hint--bottom">
                    <a href="#!" id="" class="">
                        <span>5</span>  Gallery
                    </a>
                </li>
                <li class="step hint--bottom">
                    <a href="#!" id="" class=""> <span>6</span> Publish</a>
                </li>
            </ul></div>
    </div>
    <div class="bottom_add_section">
        <div class="wrapper">
            
            <div class="step_form_inner step_account1" id="gig_overview" style="display: block;">
                    <div class="form_field">
                        <label>GIG TITLE
                            <!--<a href="#">Upgrade SEO</a>-->
                        </label>   
                        <div class="right_filed">
                            <div class="text_area">
                                <textarea name="data[Gig][title]" minlength="5" maxlength="80" class="required" placeholder="do something i'm really good at" id="GigTitle"></textarea>                                <span class="first_txt">i will</span>
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
                                <select  label="" class="sel_field required" id="">
<option value="">Select Category</option>
<option value="36">Business Services</option>
<option value="41">Data Entry &amp; Office Admin</option>
<option value="42">Design, Media &amp; Creative</option>
<option value="44">Mobile Apps &amp; Computing</option>
<option value="266">Other</option>
<option value="38">Product Sourcing &amp; Manufacturing</option>
<option value="40">Sales &amp; Marketing</option>
<option value="37">Science &amp; Engineering</option>
<option value="45">Website &amp; Software Dev</option>
<option value="43">Writing &amp; Content </option>
</select>                            </span>
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
                                <select  label="" class="sel_field required" id="">
<option value="">Select Sub Category</option>
</select>                            </span>
                        </div>
                    </div>   
                    <div class="page_btn">
                        <a href="#" class="cancel_btn">cancel</a>                        <input type="submit" name="continue" id="step_2" value="Save &amp; Continue" class="btn-lrg-standard">
                    </div>
                </div>
            <div class="step_form_inner second_page step_account2" id="" >
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
                                        <textarea  minlength="5" maxlength="35" class="required" placeholder="Name your package" id=""></textarea>                                        <!--<i class="fa fa-pencil"></i>-->
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
                                        <textarea  minlength="5" maxlength="35" class="required" placeholder="Name your package" id=""></textarea>                                        <!--<i class="fa fa-pencil"></i>-->
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
                                    <td class="package_tool tool_third">
                                        <textarea  minlength="5" maxlength="35" class="required" placeholder="Name your package" id=""></textarea>                                        <!--<i class="fa fa-pencil"></i>-->
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
                                        <textarea  minlength="5" maxlength="100" class="required" placeholder="Description" id=""></textarea>
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
                                        <textarea  minlength="5" maxlength="100" class="required" placeholder="Description" id=""></textarea>                                        <!--<i class="fa fa-pencil"></i>-->
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
                                        <textarea  minlength="5" maxlength="100" class="required" placeholder="Description" id=""></textarea>                                        <!--<i class="fa fa-pencil"></i>-->
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
                                            <select name="data[Gig][basic_delivery]" label="" class="required" id="GigBasicDelivery">
<option value="">Delivery Time</option>
<option value="1">1 Day Delivery</option>
<option value="2">2 Days Delivery</option>
<option value="3">3 Days Delivery</option>

</select>                                        </span>
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
                                            <select name="data[Gig][standard_delivery]" label="" class="required" id="GigStandardDelivery">
<option value="">Delivery Time</option>
<option value="1">1 Day Delivery</option>
<option value="2">2 Days Delivery</option>
<option value="3">3 Days Delivery</option>
<option value="4">4 Days Delivery</option>

<option value="12">12 Days Delivery</option>
</select>                                        </span>
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
                                            <select name="data[Gig][premium_delivery]" label="" class="required" id="GigPremiumDelivery">
<option value="">Delivery Time</option>
<option value="24">24 Days Delivery</option>
<option value="25">25 Days Delivery</option>
<option value="26">26 Days Delivery</option>
<option value="27">27 Days Delivery</option>
<option value="28">28 Days Delivery</option>
<option value="29">29 Days Delivery</option>
</select>                                        </span>
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
                                            <select name="data[Gig][basic_revision]" label="" class="" id="GigBasicRevision">
<option value="">Select</option>
<option value="0">0</option>
<option value="1">1</option>

<option value="unlimited">Unlimited</option>
</select>                                        </span>
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
                                            <select name="data[Gig][standard_revision]" label="" class="" id="GigStandardRevision">
<option value="">Select</option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="9">9</option>
<option value="unlimited">Unlimited</option>
</select>                                        </span>
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
                                            <select name="data[Gig][premium_revision]" label="" class="" id="GigPremiumRevision">
<option value="">Select</option>
<option value="0">0</option>
<option value="1">1</option>

<option value="9">9</option>
<option value="unlimited">Unlimited</option>
</select>                                        </span>
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
                                            <select name="data[Gig][basic_price]" label="" class="required" id="GigBasicPrice">


<option value="595">$595</option>
<option value="600">$600</option>
<option value="605">$605</option>
<option value="610">$610</option>


</select>                                        </span>


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
                                            <select name="data[Gig][standard_price]" label="" class="required" id="GigStandardPrice">

<option value="940">$940</option>
<option value="945">$945</option>
<option value="950">$950</option>
<option value="955">$955</option>
<option value="960">$960</option>
<option value="965">$965</option>
<option value="970">$970</option>
<option value="975">$975</option>
<option value="980">$980</option>
<option value="985">$985</option>
<option value="990">$990</option>
<option value="995">$995</option>
</select>                                        </span>
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
                                            <select name="data[Gig][premium_price]" label="" class="required" id="GigPremiumPrice">

<option value="990">$990</option>
<option value="995">$995</option>
</select>                                        </span>
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
                        <!--<a class="cancel_btn" href="javascript:void(0);">cancel</a>-->
                        <input type="button" name="continue" id="backstep_1" value="Back" class="cancel_btn">
                        <input type="submit" name="continue" id="step_3" value="Save &amp; Continue" class="btn-lrg-standard">
                    </div>
                </div>
            <div class="step_form_inner third_page step_account3" id="gig_description" >
                    <div class="descriptiomn">
                        <h3>Description</h3>
                    </div>   

                    <div class="descrp_text">
                        <label>Briefly Describe Your Gig</label> 
                        <textarea name="data[Gig][description]" minlength="120" maxlength="1200" class="required" placeholder="Description" id="GigDescription" style="visibility: hidden; display: none;"></textarea>
                                                                     <div class="notee">
<!--                            <span class="left">min. 120</span>  
                            <span class="right">0/1200 Characters min. 120</span>    -->
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
                        <b>Add Questions &amp; Answers for Your Buyers.</b>
                        <a href="javascript:void(0);" class="action-faq" id="action_faq2" onclick="addFaq()">+ Add FAQ</a> 
                    </div>  

                    <div class="add-faq-section">
                    </div>
                    <div class="view-faq-section">
                                            </div>
                    <div class="page_btn">
                        <!--<a class="cancel_btn" href="javascript:void(0);">cancel</a>-->
                        <input type="button" name="continue" id="backstep_2" value="Back" class="cancel_btn">
                        <input type="submit" name="continue" id="step_4" value="Save &amp; Continue" class="btn-lrg-standard">
                    </div>
                </div>
            <div class="step_form_inner fourth_page step_account4" id="gig_requirement" style="display: block;">
                    <div class="description">
                        <i class="fa fa-file"></i>
                        <h4>Tell your buyer what you need to get started.</h4>
                        <small>Structure your Buyer Instructions as free text.</small>
                    </div>

                    <div class="text_fileld_wrap">
                        <div class="text_fileld_wrap_req">
                                                            <div id="requirement_box_1" class="answer_div">
                                    <label class="req_lbl">REQUIREMENT #1</label>

                                    <textarea name="data[Gigrequirement][1][description]" id="faqreq_1" minlength="20" maxlength="450" class="required" placeholder="For example: specifications, dimensions, brand guidelines, or background materials." cols="30" rows="6"></textarea>                                    <div class="notee">
<!--                                        <span class="right">0 / 450 Characters</span>    -->
                                    </div>
                                    <div class="textarea_active">

                                        <div class="answer">
                                            <input type="checkbox" name="data[Gigrequirement][1][is_mandatory]" value="1" id="faqmand_1" class="css-checkbox in-checkbox" checked="checked">
                                            <label class="in-label" for="checkboxG1">Answer is mandatory</label>
                                        </div>
                                    </div>
                                </div>
                                                    </div>
                        <div class="another"><a href="javascript:void(0)" onclick="addmorerequirement()"><b>+</b> Add another requirement</a></div>
                    </div> 

                    <!--                                        <div class="question_box">
                                                                <div class="button_hover">
                                                                    <a href="javascript:void(0);"><i class="fa fa-trash"></i></a>
                                                                    <a href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                                                </div>
                                                                <div class="tag_line">Hello</div>
                                                                <div class="input_filedd"><input type="text" placeholder="Enter your answer an upload file">
                                                                    <i class="fa fa-attatchment"></i>
                                                                </div>
                                                                <div class="another"><a href="javascript:void(0);"><b>+</b> Add another requirement</a></div>
                                                            </div>-->

                    <div class="page_btn">
                        <!--<a class="cancel_btn" href="javascript:void(0);">cancel</a>-->
                        <input type="button" name="continue" id="backstep_3" value="Back" class="cancel_btn">
                        <input type="submit" name="continue" id="step_5" value="Save &amp; Continue" class="btn-lrg-standard">
                    </div>

                </div>
            <div class="step_form_inner fifth_page step_account5" id="gig_gallery" style="display: block;">
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
                            <input name="data[Gig][youtube_url]" class="required yturl" placeholder="" type="text" value="" id="GigYoutubeUrl">                        </div>
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
                                <p>Need help with your video? Check out our LS Freelancer expert audio/video talent here.</p>


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
                                                            <div class="form_row_fhr_cols" id="0imagediv">
                                    <div class="shoe_imagrd_rgijt_img">
                                        <div class="shoe_imagrd_rgijt_img_minimg">
                                             {{HTML::image('public/img/front/safety.png', SITE_TITLE)}}                                     </div>
                                    </div>
                                    <div class="shoe_imagrd_rgijt">
                                        <span class="inline-gsj">
                                            <input type="file"  id="image0" label="" size="20" class="images">                                            <label for="image0"></label>
                                        </span>
                                        <div class="image_detail_show" id="fp"></div>
                                    </div>
                                </div>

                                                            <div class="form_row_fhr_cols" id="1imagediv">
                                    <div class="shoe_imagrd_rgijt_img">
                                        <div class="shoe_imagrd_rgijt_img_minimg">
                                             {{HTML::image('public/img/front/safety.png', SITE_TITLE)}}                        </div>
                                    </div>
                                    <div class="shoe_imagrd_rgijt">
                                        <span class="inline-gsj">
                                            <input type="file"  id="image1" label="" size="20" class="images">                                            <label for="image1"></label>
                                        </span>
                                        <div class="image_detail_show" id="fp"></div>
                                    </div>
                                </div>

                                                            <div class="form_row_fhr_cols" id="2imagediv">
                                    <div class="shoe_imagrd_rgijt_img">
                                        <div class="shoe_imagrd_rgijt_img_minimg">
                                            {{HTML::image('public/img/front/safety.png', SITE_TITLE)}}                                </div>
                                    </div>
                                    <div class="shoe_imagrd_rgijt">
                                        <span class="inline-gsj">
                                            <input type="file" name="data[Gig2][image][]" id="image2" label="" size="20" class="images">                                            <label for="image2"></label>
                                        </span>
                                        <div class="image_detail_show" id="fp"></div>
                                    </div>
                                </div>

                            
                        </div>  
<!--                        <div class="dropzone empty_box"></div>
                        <div class="dropzone empty_box"></div>-->
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
                             <input type="file" name="data[Gig][files_name]" class="input-item form-control file-item" id="add_logo">                            <div class="help_text">Supported File Types: doc, docx, pdf (Max. 2MB)</div>
                            <div id="attachfiles">
                                                        </div>

                        </div>  
                        <!--<div class="dropzone empty_box"></div>-->
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
<!--                    <div class="gig_video gig_pdf">
                        <div class="gigtag_line"><span>Gig PDFs</span> We only recommend adding a PDF file if it further clarifies the service you will be providing. <span>(0/2)</span></div>   
                        <div class="dropzone"><div class="dropzone-body video"> react-text: 39 Drag /react-text  react-text: 40   /react-text  react-text: 41 a PDF or /react-text  react-text: 42   /react-text  react-text: 43  /react-text  react-text: 44   /react-text <br><label for="video"> react-text: 47 browse /react-text <input type="file" id="video" name="file" multiple=""></label></div></div>
                        <div class="dropzone empty_box"></div>
                        <div class="gig_pdf_tooltip">
                            <div class="fake-hint blue">
                                <div class="icn">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <span class="fake-hint-title">PDF</span>
                                <p>The quality of the content in your PDFs will influence potential customers.</p>




                            </div>
                        </div>
                    </div>-->
                    <div class="page_btn">
                        <!--<a class="cancel_btn" href="javascript:void(0);">cancel</a>-->
                        <input type="hidden" name="isdocupload" id="isdocupload" value="">
                        <input type="hidden" name="data[Gig][pdf_doc]" id="attachmentfiles" value="">
                        <input type="button" name="continue" id="backstep_4" value="Back" class="cancel_btn">
                        <input type="submit" name="continue" id="step_6" value="Save &amp; Continue" class="btn-lrg-standard">
                    </div>
                </div>
            <div class="step_form_inner fifth_page step_account6" id="gig_publish" style="display: block;">

                    <div class="congratulation_content">
                        <h2>Congratulations!</h2>
                        <h3 class="alt">You’re almost done with your first Gig.</h3>
                        <h4>Before you start selling on LS Freelancer, please confirm all details. <br>
                    </h4></div>
                <div class="simple_txt">If you agree with our <a href="javascript:void(0);" >Privacy Policy</a> than please click on Save and Publish button</div>
                    <div class="page_btn">
                        <!--<a class="cancel_btn" href="javascript:void(0);">cancel</a>-->
                        <input type="button" name="continue" id="backstep_5" value="Back" class="cancel_btn">
                        <input type="submit" name="continue" id="step_7" value="Save &amp; Publish" class="btn-lrg-standard">
                    </div>
                </div>
        </div>
    </div>

    
</div>
            </div>

        </div>
    </section>
</div>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $("#maraction").click(function () {
        $("#offer-show").addClass("offer-div");
        $(".dashboard-rights-section").removeClass("offer-div");
    });
</script>
@endsection
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview @if(isset($actdashboard)){{'active'}}@endif">
                <a href="{{HTTP_PATH}}/admin/admins/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview @if(isset($actchangeusername) || isset($actchangepassword) || isset($actchangeemail) || isset($actsitesetting)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-gears"></i> <span>Configuration</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actchangeusername)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/admins/change-username"><i class="fa fa-circle-o"></i> Change Username</a></li>
                    <li class="@if(isset($actchangepassword)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/admins/change-password"><i class="fa fa-circle-o"></i> Change Password</a></li>
                    <li class="@if(isset($actchangeemail)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/admins/change-email"><i class="fa fa-circle-o"></i> Change Email</a></li>
                    <li class="@if(isset($actsitesetting)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/admins/site-settings"><i class="fa fa-circle-o"></i> Site Settings</a></li>
                </ul>
            </li>            
            <li class="treeview @if(isset($actusers)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-users"></i> <span>Manage Users</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actusers)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/users"><i class="fa fa-circle-o"></i>Users List</a></li>
                </ul>
            </li>  
            <li class="treeview @if(isset($actwallets) || isset($actpaypal)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-money"></i> <span>Manage Payments</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actwallets)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/wallets"><i class="fa fa-circle-o"></i>Withdraw Requests</a></li>
                    <li class="@if(isset($actpaypal)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/paypal-payment-histories"><i class="fa fa-circle-o"></i>PayPal Histories</a></li>
                </ul>
            </li>  
            <li class="treeview @if(isset($actorders)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-table"></i> <span>View Gig Orders</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actorders)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/vieworders"><i class="fa fa-circle-o"></i>Gig Orders List</a></li>
                </ul>
            </li>  
            <li class="treeview @if(isset($actgigs)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-tasks"></i> <span>Manage Gigs</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actgigs)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/gigs"><i class="fa fa-circle-o"></i>Gigs List</a></li>
                </ul>
            </li>  
            <li class="treeview @if(isset($actservices)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-sellsy"></i> <span>Manage Service Requests</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actservices)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/services"><i class="fa fa-circle-o"></i>Service Requests List</a></li>
                </ul>
            </li>  
            <li class="treeview @if(isset($actcategories)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-sitemap"></i> <span>Manage Categories</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actcategories)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/categories"><i class="fa fa-circle-o"></i>Categories List</a></li>
                </ul>
            </li>
            <li class="treeview @if(isset($actskills)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-book"></i> <span>Manage Skills</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actskills)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/skills"><i class="fa fa-circle-o"></i>Skills List</a></li>
                </ul>
            </li>
            <li class="treeview @if(isset($actqualifications)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-list"></i> <span>Manage Qualifications</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actqualifications)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/qualifications"><i class="fa fa-circle-o"></i>Qualifications List</a></li>
                </ul>
            </li>
            <li class="treeview @if(isset($actbanners)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-photo"></i> <span>Manage Banners</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actbanners)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/banners"><i class="fa fa-circle-o"></i>Banners List</a></li>
                </ul>
            </li>  
            <li class="treeview @if(isset($actcountries)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-globe"></i> <span>Manage Countries</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actcountries)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/countries"><i class="fa fa-circle-o"></i>Countries List</a></li>
                </ul>
            </li>
            <li class="treeview @if(isset($acttestimonials)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-quote-left"></i> <span>Manage Testimonials</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($acttestimonials)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/testimonials"><i class="fa fa-circle-o"></i>Testimonials List</a></li>
                </ul>
            </li> 
            <li class="treeview @if(isset($actpages)){{'active'}}@endif">
                <a href="javascript:void(0)">
                    <i class="fa fa-file-text-o"></i> <span>Manage Pages</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(isset($actpages)){{'active'}}@endif"><a href="{{HTTP_PATH}}/admin/pages"><i class="fa fa-circle-o"></i>Page List</a></li>
                </ul>
            </li>      
        </ul>
    </section>
</aside>
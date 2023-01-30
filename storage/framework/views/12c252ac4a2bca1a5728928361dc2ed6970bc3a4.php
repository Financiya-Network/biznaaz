<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview <?php if(isset($actdashboard)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="<?php echo e(HTTP_PATH); ?>/admin/admins/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?php if(isset($actchangeusername) || isset($actchangepassword) || isset($actchangeemail) || isset($actsitesetting)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-gears"></i> <span>Configuration</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actchangeusername)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/admins/change-username"><i class="fa fa-circle-o"></i> Change Username</a></li>
                    <li class="<?php if(isset($actchangepassword)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/admins/change-password"><i class="fa fa-circle-o"></i> Change Password</a></li>
                    <li class="<?php if(isset($actchangeemail)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/admins/change-email"><i class="fa fa-circle-o"></i> Change Email</a></li>
                    <li class="<?php if(isset($actsitesetting)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/admins/site-settings"><i class="fa fa-circle-o"></i> Site Settings</a></li>
                </ul>
            </li>            
            <li class="treeview <?php if(isset($actusers)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-users"></i> <span>Manage Users</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actusers)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/users"><i class="fa fa-circle-o"></i>Users List</a></li>
                </ul>
            </li>  
            <li class="treeview <?php if(isset($actwallets) || isset($actpaypal)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-money"></i> <span>Manage Payments</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actwallets)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/wallets"><i class="fa fa-circle-o"></i>Withdraw Requests</a></li>
                    <li class="<?php if(isset($actpaypal)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/paypal-payment-histories"><i class="fa fa-circle-o"></i>PayPal Histories</a></li>
                </ul>
            </li>  
            <li class="treeview <?php if(isset($actorders)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-table"></i> <span>View Gig Orders</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actorders)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/vieworders"><i class="fa fa-circle-o"></i>Gig Orders List</a></li>
                </ul>
            </li>  
            <li class="treeview <?php if(isset($actgigs)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-tasks"></i> <span>Manage Gigs</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actgigs)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/gigs"><i class="fa fa-circle-o"></i>Gigs List</a></li>
                </ul>
            </li>  
            <li class="treeview <?php if(isset($actservices)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-sellsy"></i> <span>Manage Service Requests</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actservices)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/services"><i class="fa fa-circle-o"></i>Service Requests List</a></li>
                </ul>
            </li>  
            <li class="treeview <?php if(isset($actcategories)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-sitemap"></i> <span>Manage Categories</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actcategories)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/categories"><i class="fa fa-circle-o"></i>Categories List</a></li>
                </ul>
            </li>
            <li class="treeview <?php if(isset($actskills)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-book"></i> <span>Manage Skills</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actskills)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/skills"><i class="fa fa-circle-o"></i>Skills List</a></li>
                </ul>
            </li>
            <li class="treeview <?php if(isset($actqualifications)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-list"></i> <span>Manage Qualifications</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actqualifications)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/qualifications"><i class="fa fa-circle-o"></i>Qualifications List</a></li>
                </ul>
            </li>
            <li class="treeview <?php if(isset($actbanners)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-photo"></i> <span>Manage Banners</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actbanners)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/banners"><i class="fa fa-circle-o"></i>Banners List</a></li>
                </ul>
            </li>  
            <li class="treeview <?php if(isset($actcountries)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-globe"></i> <span>Manage Countries</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actcountries)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/countries"><i class="fa fa-circle-o"></i>Countries List</a></li>
                </ul>
            </li>
            <li class="treeview <?php if(isset($acttestimonials)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-quote-left"></i> <span>Manage Testimonials</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($acttestimonials)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/testimonials"><i class="fa fa-circle-o"></i>Testimonials List</a></li>
                </ul>
            </li> 
            <li class="treeview <?php if(isset($actpages)): ?><?php echo e('active'); ?><?php endif; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-file-text-o"></i> <span>Manage Pages</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if(isset($actpages)): ?><?php echo e('active'); ?><?php endif; ?>"><a href="<?php echo e(HTTP_PATH); ?>/admin/pages"><i class="fa fa-circle-o"></i>Page List</a></li>
                </ul>
            </li>      
        </ul>
    </section>
</aside>
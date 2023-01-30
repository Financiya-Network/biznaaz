<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo e($userInfo->first_name.' '.$userInfo->last_name); ?> > Wallet</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/admins/dashboard')); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="<?php echo e(URL::to('admin/wallets')); ?>"><i class="fa fa-money"></i> <span>Wallet</span></a></li>
            <li class="active"> History</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="ersu_message"><?php echo $__env->make('elements.admin.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
            <div class="admin_search">
                <div class="js-db-stats ">
                    <span><small>Net Income</small><?php echo e(CURR.number_format($amountArray['netincome'], 2)); ?></span>
                    <span><small>Withdrawn</small><?php echo e(CURR.number_format(-$amountArray['withdrawn'], 2)); ?></span>
                    <span><small>Used for Purchases</small><?php echo e(CURR.number_format(-$amountArray['userforpurchase'], 2)); ?></span>
                    <span><small>Pending Clearance</small><?php echo e(CURR.number_format(-$amountArray['pendingclearance'], 2)); ?></span>
                    <span><small>Available for Withdrawal</small><?php echo e(CURR.number_format($amountArray['availableforwithdraw'], 2)); ?></span>
                    <span><small>Min. Withdraw Amount</small><?php echo e(CURR.$siteSettings->minimum_withdraw_amount); ?></span>
                </div>
            </div>            
            <div class="m_content" id="listID">
                <?php echo $__env->make('elements.admin.wallets.history', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
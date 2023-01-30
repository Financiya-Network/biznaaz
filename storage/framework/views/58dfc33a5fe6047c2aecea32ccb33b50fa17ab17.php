<?php echo e(HTML::script('public/js/facebox.js')); ?>

<?php echo e(HTML::style('public/css/facebox.css')); ?>

<script type="text/javascript">
    $(document).ready(function ($) {
        $('.close_image').hide();
        $('a[rel*=facebox]').facebox({
            closeImage: '<?php echo HTTP_PATH; ?>/public/img/close.png'
        });
    });
</script>
<div class="admin_loader" id="loaderID"><?php echo e(HTML::image("public/img/website_load.svg", SITE_TITLE)); ?></div>
<?php if(!$allrecords->isEmpty()): ?>
    <div class="panel-body marginzero">
        <div class="ersu_message"><?php echo $__env->make('elements.admin.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <?php echo e(Form::open(array('method' => 'post', 'id' => 'actionFrom'))); ?>

            <section id="no-more-tables" class="lstng-section">
                <div class="topn">
                    <div class="topn_left">PayPal Payment Histories List</div>
                    <div class="topn_rightd ddpagingshorting" id="pagingLinks" align="right">
                        <div class="panel-heading" style="align-items:center;">
                            <?php echo e($allrecords->appends(Input::except('_token'))->render()); ?>

                        </div>
                    </div>                
                </div>
                <div class="tbl-resp-listing">
                <table class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf ddpagingshorting heafboldd">
                        <tr>
                            <th class="sorting_paging">Buyer Name</th>
                            <th class="sorting_paging">Payment For</th>
                            <th class="sorting_paging">Transaction ID</th>
                            <th class="sorting_paging">Amount</th>
                            <th class="sorting_paging">Status</th>
                            <th class="sorting_paging">Date</th>
                            <th class="action_dvv"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-title="Name"><?php echo e(isset($allrecord->User->first_name) ? $allrecord->User->first_name.' '.$allrecord->User->last_name : ''); ?></td>
                                <td data-title="Payment For">
                                    <?php if(isset($allrecord->Gig)): ?>
                                        <?php echo e(str_limit($allrecord->Gig->title, $limit = 45, $end = '...')); ?> (Gig)
                                    <?php elseif(isset($allrecord->Service)): ?>
                                        <?php echo e(str_limit($allrecord->Service->title, $limit = 45, $end = '...')); ?> (Request)
                                    <?php endif; ?>
                                </td>
                                <td data-title="Transaction ID"><?php echo e($allrecord->transaction_id); ?></td>
                                <td data-title="Amount"><?php echo e(CURR.$allrecord->amount); ?></td>
                                <td data-title="Status">
                                    <?php if($allrecord->status): ?>
                                        Completed
                                    <?php else: ?>
                                        Pending
                                    <?php endif; ?>    
                                </td>
                                <td data-title="Date"><?php echo e($allrecord->created_at->format('d M, Y')); ?></td>
                                <td data-title="Action">
                                    <a href="#info<?php echo $allrecord->id; ?>" title="View Offer Details" class="btn btn-primary btn-xs" rel='facebox'><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </section>
        <?php echo e(Form::close()); ?>

        </div>         
    </div>
<?php else: ?> 
    <div id="listingJS" style="display: none;" class="alert alert-success alert-block fade in"></div>
    <div class="admin_no_record">No record found.</div>
<?php endif; ?>


<?php if(!$allrecords->isEmpty()): ?>
    <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="info<?php echo $allrecord->id; ?>" style="display: none;">
            <div class="nzwh-wrapper">
                <fieldset class="nzwh">
                    <legend class="head_pop">#<?php echo $allrecord->transaction_id; ?></legend>
                    <div class="drt">
                    <div class="admin_pop"><span>Buyer Name: </span>  <label><?php echo e(isset($allrecord->User->first_name) ? $allrecord->User->first_name.' '.$allrecord->User->last_name : ''); ?></label></div>
                        <div class="admin_pop"><span>Payment For: </span>  <label>
                            <?php if(isset($allrecord->Gig)): ?>
                                <?php echo e(str_limit($allrecord->Gig->title, $limit = 45, $end = '...')); ?> (Gig)
                            <?php elseif(isset($allrecord->Service)): ?>
                                <?php echo e(str_limit($allrecord->Service->title, $limit = 45, $end = '...')); ?> (Request)
                            <?php endif; ?>
                        </label>
                        </div>
                    <div class="admin_pop"><span>Transaction ID: </span>  <label><?php echo e($allrecord->transaction_id); ?></label></div>
                    <div class="admin_pop"><span>Amount: </span>  <label><?php echo e(CURR.$allrecord->amount); ?></label></div>
                    <div class="admin_pop"><span>Status: </span> 
                        <label> <?php if($allrecord->status): ?>
                                        Completed
                                    <?php else: ?>
                                        Pending
                                    <?php endif; ?>  
                        </label>
                    </div>
                    <div class="admin_pop"><span>Date: </span>  <label><?php echo e($allrecord->created_at->format('d M, Y')); ?></label></div>
                    
                </fieldset>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
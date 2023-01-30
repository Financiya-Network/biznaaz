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
                    <div class="topn_left">Manage Withdraw Requests</div>
                    <div class="topn_rightd ddpagingshorting" id="pagingLinks" align="right">
                        <div class="panel-heading" style="align-items:center;">
                            <?php echo e($allrecords->appends(Input::except('_token'))->render()); ?>

                        </div>
                    </div>                
                </div>
                <div class="tbl-resp-listing">
                <table class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf ddpagingshorting">
                        <tr>
                            <th class="sorting_paging"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', 'User Name'));?></th>
                            <th class="sorting_paging"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('amount', 'Amount'));?></th>
                            <th class="sorting_paging"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('trn_id', 'Transaction ID'));?></th>
                            <th class="action_dvv"> Status</th>
                            <th class="sorting_paging"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('created_at', 'Date'));?></th>                            
                            <th class="action_dvv"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-title="Name"><?php echo e(isset($allrecord->User)?$allrecord->User->first_name.' '.$allrecord->User->last_name:""); ?></td>
                                <td data-title="Amount"><?php echo e(CURR.number_format(-$allrecord->revenue, 2)); ?></td>
                                <td data-title="Transaction ID">
                                    <?php if($allrecord->status == 1): ?>
                                        <?php echo e($allrecord->trn_id); ?>

                                    <?php endif; ?>
                                </td>
                                <td data-title="Date">
                                    <?php if($allrecord->status == 0): ?>
                                        Pending
                                    <?php elseif($allrecord->status == 1): ?>
                                        Approved
                                    <?php else: ?> 
                                        Rejected
                                    <?php endif; ?>
                                </td>
                                <td data-title="Status"><?php echo e($allrecord->created_at->format('M d, Y')); ?></td>
                                <td data-title="Action">
                                    <?php if($allrecord->status == 0): ?>
                                    <a href="<?php echo e(URL::to( 'admin/wallets/approve-reject/accept/'.$allrecord->slug)); ?>" title="Approve" class="deactivate"  onclick="return confirm('Are you sure you have transferred the amount?')"><span class="btn btn-success btn-xs"><i class="fa fa-check"></i></span></a>
                                    <a href="<?php echo e(URL::to( 'admin/wallets/approve-reject/reject/'.$allrecord->slug)); ?>" title="Reject" class="activate"  onclick="return confirm('Are you sure you want to reject this record?')"><span class="btn btn-danger btn-xs"><i class="fa fa-ban"></i></span></a>
                                    <?php endif; ?>
                                    <?php if(isset($allrecord->User)): ?>
                                    <a target="_blank" href="<?php echo e(URL::to( 'admin/wallets/history/'.$allrecord->User->slug)); ?>" title="View Wallet History" class="btn btn-primary btn-xs"><i class="fa fa-money"></i></a>
                                    <?php endif; ?>
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
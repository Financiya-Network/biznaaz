<div class="admin_loader" id="loaderID"><?php echo e(HTML::image("public/img/website_load.svg", SITE_TITLE)); ?></div>
<?php if(!$allrecords->isEmpty()): ?>
    <div class="panel-body marginzero">
        <div class="ersu_message"><?php echo $__env->make('elements.admin.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <?php echo e(Form::open(array('method' => 'post', 'id' => 'actionFrom'))); ?>

            <section id="no-more-tables" class="lstng-section">
                <div class="topn">
                    <div class="topn_left">Transaction History</div>
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
                            <th class="sorting_paging"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('created_at', 'Date'));?></th>
                            <th class="sorting_paging">Source</th>
                            <th class="sorting_paging">Transaction ID</th>
                            <th class="sorting_paging">Status</th>
                            <th class="sorting_paging">Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-title="Date"><?php echo e($allrecord->created_at->format('M d, Y')); ?></td>
                                <td data-title="Name"><?php echo $allrecord->source; ?></td>
                                <td data-title="Name">
                                    <?php if($allrecord->status == 1): ?>
                                        <?php echo e($allrecord->trn_id); ?>

                                    <?php endif; ?>
                                </td>
                                <td data-title="Name">
                                    <?php if($allrecord->status == 0): ?>
                                        Pending
                                    <?php elseif($allrecord->status == 1): ?>
                                        Approved
                                    <?php else: ?> 
                                        Rejected
                                    <?php endif; ?>
                                </td>
                                <td data-title="Name">
                                    <?php if($allrecord->type == 4): ?>
                                        <span class="">- <?php echo e(CURR.number_format(-$allrecord->revenue, 2)); ?></span>  
                                    <?php elseif($allrecord->revenue < 0): ?>
                                        <span class="amt_nt">- <?php echo e(CURR.number_format(-$allrecord->revenue, 2)); ?></span>  
                                    <?php else: ?> 
                                        <span class="amt_add">+ <?php echo e(CURR.number_format($allrecord->revenue, 2)); ?></span>  
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
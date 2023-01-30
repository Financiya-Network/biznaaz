<?php if(Session::get('user_id')): ?>
    <?php if(in_array($gid, $mysavegigs)): ?>
        <button type="button" class="btn btn-secondary btn-sm"
            style="border-radius: 35px;background-color: transparent;border-color: transparent;" title="Remove From Saved"
            onclick="addtolike(<?php echo e($gid); ?>, 0)">
            <i class="flaticon-like"></i>
        </button>
    <?php else: ?>
        <button type="button" class="btn btn-secondary btn-sm"
            style="border-radius: 35px;background-color: transparent;border-color: transparent;" title="Add to Saved"
            onclick="addtolike(<?php echo e($gid); ?>, 1)">
            <i class="flaticon-like"></i>
        </button>
    <?php endif; ?>
<?php else: ?>
    <button type="button" class="btn btn-secondary btn-sm"
        style="border-radius: 35px;background-color: transparent;border-color: transparent;" title="Add to Saved"
        onclick="javascript:alert('You must login to save this gig in your favourite list.')">
        <i class="flaticon-like"></i>
    </button>
    
<?php endif; ?>

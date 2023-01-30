<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#adminForm").validate();
    });
 </script>
<?php echo e(HTML::script('public/js/ckeditor/ckeditor.js')); ?>

<script type="text/javascript">
    $(document).ready(function() {
        CKEDITOR.replace( 'description', {
            toolbar :
                [
                    ['ajaxsave'],
                    ['Styles','Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-'],
                    ['Cut','Copy','Paste','PasteText'],
                    ['Undo','Redo','-','RemoveFormat'],
                    ['TextColor','BGColor'],
                    ['Maximize', 'Image', 'Table','Link', 'Unlink']
            ],
            filebrowserUploadUrl : '<?php echo HTTP_PATH;?>/admin/pages/pageimages',
            language: '',
            height: 300,
            //uiColor: '#884EA1'
        });
    });
</script>
 
 
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Page</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/admins/dashboard')); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="<?php echo e(URL::to('admin/pages')); ?>"><i class="fa fa-pages"></i> <span>Manage Pages</span></a></li>
            <li class="active"> Edit Page</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">&nbsp;</h3>
            </div>
            <div class="ersu_message"><?php echo $__env->make('elements.admin.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
            <?php echo e(Form::model($recordInfo, ['method' => 'post', 'id' => 'adminForm', 'enctype' => "multipart/form-data"])); ?>            
            <div class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Page Title <span class="require">*</span></label>
                        <div class="col-sm-10">
                            <?php echo e(Form::text('title', null, ['class'=>'form-control required', 'placeholder'=>'Page Title', 'autocomplete' => 'off'])); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Page Description <span class="require">*</span></label>
                        <div class="col-sm-10">
                            <?php echo e(Form::textarea('description', null, ['class'=>'form-control required', 'placeholder'=>'Description', 'autocomplete' => 'off'])); ?>

                        </div>
                    </div>
                    <div class="box-footer">
                        <label class="col-sm-2 control-label" for="inputPassword3">&nbsp;</label>
                        <?php echo e(Form::submit('Submit', ['class' => 'btn btn-info'])); ?>

                        <a href="<?php echo e(URL::to( 'admin/pages')); ?>" title="Cancel" class="btn btn-default canlcel_le">Cancel</a>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
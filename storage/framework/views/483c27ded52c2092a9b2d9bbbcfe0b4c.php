
<?php $__env->startSection('title', 'Select Theme - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Select Theme';
$data['title'] = 'Front Settings';
$data['title1'] = 'Select Theme';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger" role="alert">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
          <span aria-hidden="true" class="text-danger" >&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <div class="row">
    <div class="col-lg-12">
        <div class="card dashboard-card m-b-30">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__('Select Theme')); ?></h5>
            </div>
            <div class="card-body">
                <form class="form" action="<?php echo e(route('themenew.update')); ?>" method="POST" novalidate
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class ="row">
                        <div class="col-lg-6">
                            <div class="shadow-sm border theme-card">
                                <div class="theme-img">
                                    <img src="<?php echo e(url('images/theme/1.png')); ?>" class="img-fluid" alt="">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="theme" <?php echo e($setting->theme == 1 ? 'checked' : ''); ?> id="exampleRadios1" value="1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Theme One
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="shadow-sm border theme-card">
                                <div class="theme-img">
                                    <img src="<?php echo e(url('images/theme/3.png')); ?>" class="img-fluid" alt="">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="theme" <?php echo e($setting->theme == 0 ? 'checked' : ''); ?> id="exampleRadios2" value="0">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Theme Two
                                    </label>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i>
                            <?php echo e(__("Reset")); ?></button>
                        <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Save')); ?>"><i class="fa fa-check-circle"></i>
                            <?php echo e(__("Save")); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass\resources\views/admin/themenew/setting.blade.php ENDPATH**/ ?>
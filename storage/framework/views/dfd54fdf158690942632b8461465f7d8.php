<?php $__env->startSection('title', 'APP Secret Key'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'APP Secret Key';
$data['title'] = 'APP Secret Key';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
<?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  <!-- row started -->
    <div class="col-lg-12">
         <div class="card dashboard-card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('APP Secret Key')); ?></h5>
                </div> 
               
                <!-- card body started -->
                <div class="card-body">
                <!-- form start -->
                <form action="<?php echo e(route('apikey.create')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                        <!-- row start -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- card start -->
                                <div class="card">
                                    <!-- card body start -->
                                    <div class="card-body">
                                        <!-- row start -->
                                          <div class="row">
                                              
                                              <div class="col-md-12">
                                                  <!-- row start -->
                                                  <div class="row">
                                                    
                                                    <!-- Client Secret KEY -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__('Client Secret Key :')); ?></label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                                                    </div>
                                                                    <input  value="<?php echo e($key ? $key->secret_key : ""); ?>" type="text" name="apikey" class="form-control" placeholder="API KEY" aria-label="Username" aria-describedby="basic-addon1">
                                                                </div>
                                                               
                                                        </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-dark"><?php echo e(__('Purchase Code :')); ?></label>
                                                                <input id="pass_log_id6" type="password" placeholder="Please enter valid purchase code" class="form-control"  name="purchase_code" value="<?php echo e(old('purchase_code')); ?>" >
                                                                <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password6"></span>
                                                                
                                                                <small class="text-info"><i class="fa fa-question-circle"></i> <?php echo e(__('Enter envato mobile app purchase code')); ?>.</small>
                                                            </div>
                                                        </div>
         
                                                    <!-- update and close button -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                            <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('RE-GENREATE KEY')); ?>"><i class="fa fa-check-circle"></i>
                                                            <?php echo e($key ? "RE-GENREATE KEY" : "GET YOUR KEY"); ?></button>
                                                        </div>
                                                    

                                                  </div><!-- row end -->
                                              </div><!-- col end -->
                                          </div><!-- row end -->

                                    </div><!-- card body end -->
                                </div><!-- card end -->
                            </div><!-- col end -->
                        </div><!-- row end -->
                  </form>
                  <!-- form end -->
                </div><!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>
<script>
$(document).on('click', '.toggle-password6', function() {
$(this).toggleClass("fa-eye fa-eye-slash");
var input = $("#pass_log_id6");
input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});
</script>
<style>
.field_icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
</style>
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eclass\resources\views/admin/apikeys/getkey.blade.php ENDPATH**/ ?>
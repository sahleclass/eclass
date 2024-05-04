
<?php $__env->startSection('title', 'Addon Manager'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Addon Manager';
$data['title'] = 'Addon Manager';
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
                    <h5 class="card-box"><?php echo e(__('Addon Manager')); ?></h5>
                </div> 
                <div>
                  <div class="widgetbar">
                  <a href="<?php echo e(url('admin/add/addon')); ?>" class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Addon')); ?></a>
                    </div>
                  </div>
                <!-- card body started -->
                <div class="card-body">
                <div class="table-responsive">
                        <!-- table to display faq start -->
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <th>
                               # 
                            </th>
                            <th><?php echo e(__('Addon')); ?></th>
                            <th><?php echo e(__('Version')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                        </thead>

                        <tbody>
                        <?php $i=0;?>
                          <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $i++;?>
                            <?php
                              $path = base_path().'/Modules/'.$module.'/'.'module.json'; 
                              $json = json_decode(file_get_contents($path), true);
                            ?>
                            <tr>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($json['name']); ?></td>

                            <td>
                              <?php if(isset($json['version'])): ?>
                              <?php echo e($json['version']); ?>

                              <?php else: ?>
                              -
                              <?php endif; ?>
                            </td>
                            <td>
                                
                            <button type="button" class="btn btn-rounded <?php echo e($module->isStatus(1) ? 'btn-success-rgba' : 'btn-danger-rgba'); ?>" data-toggle="modal" data-target="#myModal-<?php echo e($json['name']); ?>" title="<?php echo e(__('Status')); ?>">
                                <?php if( $module->isStatus(1)): ?>
                                  <?php echo e(__('Active')); ?>

                                  <?php else: ?>
                                  <?php echo e(__('Deactivate')); ?>

                                  <?php endif; ?> 
                            </button>


                            <div class="modal fade" id="myModal-<?php echo e($json['name']); ?>" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="myModal"><?php echo e(__('Verify')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>"><span
                                        aria-hidden="true">&times;</span></button>

                                  </div>
                                  <div class="modal-body">
                                      <form action="<?php echo e(route('status.addon',$module)); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>



                                        <div class="row">
                                          <div class="col-md-12">
                                            <label for="code"><?php echo e(__('Purchase Code')); ?>:<sup class="redstar">*</sup></label>
                                            <input placeholder="" type="text" class="form-control" name="code"
                                              required>
                                          </div>
                                        </div>
                                        <br>
                                        <button  type="Submit" class="btn btn-rounded <?php echo e($module->isStatus(1) ? 'btn-success-rgba' : 'btn-danger-rgba'); ?>">
                                          <?php if( $module->isStatus(1)): ?>
                                          <?php echo e(__('Active')); ?>

                                          <?php else: ?>
                                          <?php echo e(__('Deactivate')); ?>

                                          <?php endif; ?>
                                        </button>
                                      </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                              
                            </td>

                                <td>
                                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('addon.delete')): ?>

                                    <div class="dropdown">
                                        <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                            <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($module); ?>" title="<?php echo e(__('Delete')); ?>">
                                                <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <!-- delete Modal start -->
                                    <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($module); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleSmallModalLabel">Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                                                        <p><?php echo e(__('Do you really want to delete')); ?> <b><?php echo e($json['name']); ?></b> ? <?php echo e(__('This process cannot be undone.')); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="<?php echo e(url('admin/addon/delete/'.$module)); ?>" class="pull-right">
                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- delete Model ended -->

                                </td>
                                
                            </tr> 
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                          
                        </tbody>
                        </table>                  
                        <!-- table to display FAQ data end -->                
                    </div><!-- table-responsive div end -->
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
    $("#checkboxAll").on('click', function () {
$('input.check').not(this).prop('checked', this.checked);
});
</script>
<!-- script to change status start -->
<script>
  $(function() {
    $('.custom_toggle').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        
        var id = $(this).data('id'); 
        
        
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'addon-status',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(id)
            }
        });
    });
  });
</script>

<!-- script to change status end -->
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass\resources\views/admin/addon/index.blade.php ENDPATH**/ ?>
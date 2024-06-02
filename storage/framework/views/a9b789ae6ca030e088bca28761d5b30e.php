
<?php $__env->startSection('title',' Countries'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Countries';
$data['title'] = 'Countries';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="contentbar">                
    <!-- Start row -->
    <div class="row">
      <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <h5 class="box-title"><?php echo e(__('Countries')); ?></h5>
					<div>
						<div class="widgetbar">
						  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('locations.country.delete')): ?>
							<a  href=" <?php echo e(url('admin/country/create')); ?>" class="btn btn-primary-rgba" title="<?php echo e(__('Add Country')); ?>"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Country")); ?></a>
              <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal"
                data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"><i class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?> </button>
							<?php endif; ?>
						  
						</div>                        
					  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                              <th>
                                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                    value="all" />
                                <label for="checkboxAll" class="material-checkbox"></label> 
                            </th>
                           
                              <th></th>
                              <th><?php echo e(__("Country Name")); ?> </th>
                              <th><?php echo e(__("ISO Code 2")); ?></th>
                              <th><?php echo e(__("ISO Code 3")); ?></th>
                              <th><?php echo e(__("Action")); ?></th>
                      
                            </tr>
                            </thead>
                            <tbody>
                              <?php $i=0;?> 
                              <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td>  <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                  name='checked[]' value='<?php echo e($country->id); ?>' id='checkbox<?php echo e($country->id); ?>'>
                              <label for='checkbox<?php echo e($country->id); ?>' class='material-checkbox'></label>
                              <?php $i++;?>
                              <?php echo $i;?>
                              </td>
                                  <td>
                                    <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                      <div class="modal-dialog modal-sm">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close"
                                                      data-dismiss="modal" title="<?php echo e(__('Close')); ?>">&times;</button>
                                                  <div class="delete-icon"></div>
                                              </div>
                                              <div class="modal-body text-center">
                                                  <h4 class="modal-heading"><?php echo e(__('Are You Sure')); ?> ?</h4>
                                                  <p><?php echo e(__('Do you really want to delete selected item names here? This process
                                                              cannot be undone')); ?>.</p>
                                              </div>
                                              <div class="modal-footer">
                                                  <form id="bulk_delete_form" method="post"
                                                      action="<?php echo e(route('country.bulk_delete')); ?>">
                                                      <?php echo csrf_field(); ?>
                                                      <?php echo method_field('POST'); ?>
                                                      <button type="reset" class="btn btn-gray translate-y-3"
                                                          data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                                      <button type="submit"
                                                          class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  </td>
                                  <td><?php echo e($country->nicename); ?></td>
                                  <td><?php echo e($country->iso); ?></td>
                                  <td><?php echo e($country->iso3); ?></td>
                               <td>
                                
                                  <div class="dropdown">
                                      <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                                      <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('locations.country.edit')): ?>
                                          <a class="dropdown-item"   href="<?php echo e(url('admin/country/'.$country->id. '/edit')); ?>" title="<?php echo e(__('Edit')); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                                          <?php endif; ?>
                                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('locations.country.delete')): ?>
                                          <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm" title="<?php echo e(__('Delete')); ?>"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                          <?php endif; ?>
                                        
                                      </div>
                                  </div>
                                </td>
                                <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                              <form  method="post" action="<?php echo e(url('admin/country/'.$country->id)); ?>

                                                "data-parsley-validate class="form-horizontal form-label-left">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" title="<?php echo e(__('Close')); ?>"><?php echo e(__("Close")); ?></button>
                                                <button type="submit" class="btn btn-primary" title="<?php echo e(__('Delete')); ?>"><?php echo e(__("Delete")); ?></button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass\resources\views/admin/country/index.blade.php ENDPATH**/ ?>
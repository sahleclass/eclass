
<?php $__env->startSection('title', 'All Instructors - Admin'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'All Instructors';
$data['title'] = 'All Instructors';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">                
    <!-- Start row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card m-b-30">
        <div class="card-header all-user-card-header">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false" title="<?php echo e(__('All Instructors')); ?>"><?php echo e(__('All Instructors')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" title="<?php echo e(__('Pending Instructors Request')); ?>"><?php echo e(__('Pending Instructors Request')); ?></a>
            </li>
          </ul>
        </div>
        <div>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="all-user-menu">
              <div class="row">
                <div class="col-lg-4">
                    <h5 class="box-title"><?php echo e(__('All Instructors')); ?></h5>
                </div>
                <div class="col-lg-8 text-right menus-button">
                  <a href="page-product-detail.html" class="btn btn-danger-rgba"  data-toggle="modal" data-target=".bd-example-modal-sm1" title="<?php echo e(__('Delete Selected')); ?>"><i class="feather icon-trash mr-2"></i><?php echo e(__('Delete Selected')); ?></a>
                        
                  <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center">
                          <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                        </div>
                        <div class="modal-footer">
                          <form method="post" action="<?php echo e(action('BulkdeleteController@instructorrequestdeleteAll')); ?>" id="bulk_delete_form" data-parsley-validate class="form-horizontal form-label-left">
                            <?php echo e(csrf_field()); ?>

                          
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                            <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th> 
                        <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                        <label for="checkboxAll" class="material-checkbox"></label> 
                      </th>
                      <th><?php echo e(__('Instructor Pic')); ?></th>
                      <th><?php echo e(__('Instructor Detail')); ?></th>
                      <th><?php echo e(__('Status')); ?></th>
                      <th><?php echo e(__('Action')); ?></th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($item->id); ?>" id="checkbox<?php echo e($item->id); ?>">
                        <label for="checkbox<?php echo e($item->id); ?>" class="material-checkbox"></label>
                      </td>
                      <td>
                                      <?php if($image = @file_get_contents('../public/images/user_img/'.$item->user_img)): ?>
                    <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        src="<?php echo e(url('images/user_img/'.$item->user_img)); ?>" alt="<?php echo e($item->fname); ?>"
                        class="img-responsive img-circle">
                <?php else: ?>
                <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        src="<?php echo e(Avatar::create($item->fname)->toBase64()); ?>" alt="<?php echo e($item->fname); ?>"
                        class="img-responsive img-circle" 
                      >

                <?php endif; ?>
                      </td>
                      
                      <td>
                        <ul class="user-dtl-name">
                          <li><span>Name:</span> <?php echo e($item->fname); ?></li>
                          <li><span>Email:</span> <a href="mailto:<?php echo e($item->email); ?>"><?php echo e($item->email); ?></a></li>
                          <li><span>Mobile:</span> <a href="tel:<?php echo e($item->mobile); ?>"><?php echo e($item->mobile); ?></a></li>
                        </ul>
                      </td>
                      <td>
                        <?php if($item->status==1): ?>
                          <span class="badge badge-pill badge-success"> <?php echo e(__('Approved')); ?></span>
                            
                          <?php else: ?>
                          <span class="badge badge-pill badge-warning"> <?php echo e(__('Pending')); ?></span>
                        <?php endif; ?>

                      </td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></button>
                          <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                              <a class="dropdown-item" data-toggle="modal" data-target="#instructorviewModal<?php echo e($item->id); ?>" title="<?php echo e(__('View')); ?>"><i class="feather icon-delete mr-2"></i><?php echo e(__("View")); ?></a>
                              <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm" title="<?php echo e(__('Delete')); ?>"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                          </div>
                        </div>
                      
                        <?php
                        $show = App\User::where('id', $item->id)->first();
                        ?>
                        <?php if(isset($show)): ?>
                        <div class="modal fade" id="instructorviewModal<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleStandardModalLabel"><?php echo e(__('View Instructor Details')); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="card m-b-30">
                                  <div class="card-body">
                                    <div class="form-group col-md-12">
                                      <div class="instructor-detail-img text-center">
                                        
                                      <?php if($image = @file_get_contents('../public/images/user_img/'.$show->user_img)): ?>
                                      <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                          src="<?php echo e(url('images/user_img/'.$show->user_img)); ?>" alt="<?php echo e($show->fname); ?> <?php echo e($show['lname']); ?>"
                                          class="img-responsive img-circle">
                                  <?php else: ?>
                                  <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                          src="<?php echo e(Avatar::create($show->fname)->toBase64()); ?>" alt="<?php echo e($show->fname); ?> <?php echo e($show['lname']); ?>"
                                          class="img-responsive img-circle" 
                                        >
                  
                                  <?php endif; ?>
                                        
                                      </div>
                                      <div class="mt-3">
                                        <h4 class="text-center"><?php echo e($show->fname); ?> <?php echo e($show['lname']); ?></h4>
                                      </div>
                                      <br>
                                      <div class="table-responsive">
                                        <table class="table table-borderless mb-0 user-table">
                                          <tbody>
                                            <tr>
                                              <th scope="row" class="p-1"><span class="text-color"><?php echo e(__('Role')); ?>:</span> </th>
                                              <td class="p-1"> <?php echo e($show->role); ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row" class="p-1"><span class="text-color"><?php echo e(__('Phone')); ?>:</span> </th>
                                              <td class="p-1"> <a href="tel:<?php echo e($show->mobile); ?>"><?php echo e($show->mobile); ?></a></td>
                                            </tr>
                                            <tr>
                                              <th scope="row" class="p-1"><span class="text-color"><?php echo e(__('Email')); ?>:</span></th>
                                              <td class="p-1"> <a href="mailto:<?php echo e($show->email); ?>"><?php echo e($show->email); ?></a></td>
                                            </tr>
                                            <tr>
                                              <th scope="row" class="p-1"><span class="text-color"><?php echo e(__('Detail')); ?>:</span></th>
                                              <td class="p-1"> <?php echo e($show->detail); ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row" class="p-1"><span class="text-color"><?php echo e(__('Resume')); ?>:</span> </th>
                                              <td class="p-1"> <a href="<?php echo e(asset('files/instructor/'.$show->file)); ?>" download="<?php echo e($show->file); ?>" title="<?php echo e(__('Download')); ?>"><?php echo e(__('Download')); ?> <i class="fa fa-download"></i></a></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                      <br>
                              
                                      <form action="<?php echo e(route('requestinstructor.update',$show->id)); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('PUT')); ?>

                                        <div class="form-group">
                                          <input type="hidden" value="<?php echo e($show->user_id); ?>" name="user_id" class="form-control">
                                            <input type="hidden" value="<?php echo e($show->role); ?>" name="role" class="form-control">
                                          <input type="hidden" value="<?php echo e($show->mobile); ?>" name="mobile" class="form-control">
                                          <input type="hidden" value="<?php echo e($show->detail); ?>" name="detail" class="form-control">
                                          <input type="hidden" value="<?php echo e($show->image); ?>" name="image" class="form-control">
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4">
                                            <label for="exampleInputTit1e"><?php echo e(__('Status')); ?>:</label>
                                          </div>
                                          <div class="col-md-8">
                                            <input  type="checkbox" name="search_enable"  class="custom_toggle"   <?php echo e($show->status==1 ? 'checked' : ''); ?> />
                                            <input type="hidden" name="status" value="<?php echo e($show->status); ?>" id="c33">
                                          </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                          <button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                          <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                                          <?php echo e(__("Update")); ?></button>
                                        </div>
                                  
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php endif; ?>
                      </td>
                      <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                  </div>
                                  <div class="modal-footer">
                                    <form  method="post" action="<?php echo e(url('requestinstructor/'.$item->id)); ?>

                                      "data-parsley-validate class="form-horizontal form-label-left">
                                      <?php echo e(csrf_field()); ?>

                                      <?php echo e(method_field('DELETE')); ?>

                                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                      <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </tr>     
                  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
                      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="col-lg-8 text-right">
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(' instructor-pending-request.manage')): ?>
                          <a href="page-product-detail.html" class="btn btn-danger-rgba"  data-toggle="modal" data-target=".bd-example-modal-sm1"><i class="feather icon-trash mr-2"></i><?php echo e(__('Delete Selected')); ?></a>
                          <?php endif; ?>                         
                          <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body text-center">
                                          <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                      </div>
                                      <div class="modal-footer">
                                        
                                        
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Close")); ?></button>
                                          <button type="submit" class="btn btn-primary"><?php echo e(__("Delete")); ?></button>
                                      </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="card-body">
                  
                          <div class="table-responsive">
                              <table id="datatable-buttons" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th><?php echo e(__('Image')); ?></th>
                                      <th><?php echo e(__('Name')); ?></th>
                                      <th><?php echo e(__('Email')); ?></th>
                                      <th><?php echo e(__('Detail')); ?></th>
                                      <th><?php echo e(__('Status')); ?></th>
                                      <th><?php echo e(__('Action')); ?></th>
                                    
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <?php if($item->status == '0'): ?>
                                        <td><img src="<?php echo e(asset('images/instructor/'.$item->image)); ?>" class="img-circle"></td> 
                                        <td><?php echo e($item->fname); ?></td>
                                        <td><?php echo e($item->email); ?></td>
                                        <td><?php echo e(str_limit($item->detail, $limit= 50, $end = '...')); ?></td>
                                        <td>
                                          <?php if($item->status==1): ?>
                                          <span class="badge badge-pill badge-success"> <?php echo e(__('Approved')); ?></span>
                                          
                                          <?php else: ?>
                                          <span class="badge badge-pill badge-warning"> <?php echo e(__('Pending')); ?></span>
                                          <?php endif; ?>
                                        </td>
                                    <td>
                                      <div class="dropdown">
                                          <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                          <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('instructorrequest.edit')): ?>
                                              <a class="dropdown-item"   href="<?php echo e(route('requestinstructor.edit',$item->id)); ?>"><i class="feather icon-eye mr-2"></i><?php echo e(__("View")); ?></a>
                                              <?php endif; ?>
                                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('instructorrequest.delete')): ?>
                                              <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                              <?php endif; ?>
                                            
                                          </div>
                                      </div>
                                    </td>
      
                                    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-muted"><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                  <form  method="post" action="<?php echo e(url('requestinstructor/'.$item->id)); ?>

                                                    "data-parsley-validate class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Close")); ?></button>
                                                    <button type="submit" class="btn btn-primary"><?php echo e(__("Delete")); ?></button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  
                                  </tr>   
                                  <?php endif; ?>  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                      </div>
                  </div>
                </div>
            </div>
             
          </div>
      </div>
      <!-- End col -->
  </div>
  <!-- End row -->
</div>        


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>



  <script>
        "use Strict";

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

 
        $(document).on("change",".all_instructor",function() { 
        
        $.ajax({
        
            type: "POST",
            dataType: "json",
            url: "<?php echo e(url('quickupdate/instructorrequest')); ?>",
            data: {'status': $(this).is(':checked') ? 1 : 0, 'id': $(this).data('id')},
            success: function(data){
            var warning = new PNotify( {
                title: 'success', text:'Status Update Successfully', type: 'success', desktop: {
                desktop: true, icon: 'feather icon-thumbs-down'
                }
              });
              warning.get().click(function() {
                warning.remove();
              });
          }
        });
  
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass\resources\views/admin/instructor/all_instructor/index.blade.php ENDPATH**/ ?>
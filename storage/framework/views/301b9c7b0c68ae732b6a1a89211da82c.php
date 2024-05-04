
<?php $__env->startSection('title','All Course'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'All Course';
$data['title'] = 'Courses';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
  <!-- Start row -->
  <!--=========master check box fro bulk delete start ==============================================-->
  <!--=========master check box fro bulk delete start ==============================================-->
  <div class="card dashboard-card m-b-30">
    <!-- Card header will display you the heading -->
    <div class="row p-4">
      <div class="col-lg-4 col-md-12">
        <form class="navbar-form" role="search">
          <div class="input-group ">
            <form method="get" action="">
              <input value="<?php echo e(app('request')->input('title') ?? ''); ?>" type="text" name="searchTerm" cllass="form-control float-left text-center" placeholder="<?php echo e(__('Search Courses')); ?>">
              <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
            </form>
            <?php if(app('request')->input('searchTerm') != ''): ?>
            <a role="button" title="Back" href="<?php echo e(url('course')); ?>" name="clear" value="search" id="clear_id"
                class="btn btn-warning-rgba btn-xs" title="<?php echo e(__('Clear Search')); ?>">
                <?php echo e(__('Clear Search')); ?>

            </a>
            <?php endif; ?>
         
          </div>
        </form>
      </div>
      <div class="col-lg-8 col-md-12 menus-button text-right mb-2">
        <a href="<?php echo e(url('course/create')); ?>" class="btn btn-primary-rgba mr-2" title="<?php echo e(__('Add Course')); ?>"
><i
              class="feather icon-plus mr-2"></i><?php echo e(__('Add Course')); ?></a>
      
          <?php if(Auth::User()->role == "admin" ): ?>
            <button type="button" class="btn btn-danger-rgba mr-2" data-toggle="modal" data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"
><i
              class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?></button>
              <button type="button" class="btn btn-success-rgba mr-2" title="<?php echo e(__('Select All')); ?>"
>
                <div class="select-all-checkbox">
        
                  <div>
                    <input id="checkboxAll" type="checkbox" class="filled-in width-15 height-15 t-3 position-relative"
                      name="checked[]" value="all" />
                    <label for="checkboxAll" class="material-checkbox"></label> <?php echo e(__('Select All')); ?>

                  </div>                  
          
                </div>
          
              </button>
          <?php endif; ?>
          
        
          <li class="list-inline-item">
            <div class="settingbar">
              <a href="javascript:void(0)" id="infobar-settings-open" class="btn btn-warning-rgba" title="<?php echo e(__('Filter')); ?>"
>
                <i class="feather icon-filter mr-2"></i><?php echo e(__('Filter')); ?>

              </a>
            </div>
          </li>
          <form action="" method="get" class="filterForm">
            <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
              <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
                <h4><?php echo e(__('Filtered')); ?></h4>
                <a href="javascript:void(0)" id="infobar-settings-close" class="btn btn-primary close" title="<?php echo e(__('Close')); ?>"
>
                  <img src="admin_assets/assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                </a>
              </div>
              <div class="infobar-settings-sidebar-body">
                <div class="custom-mode-setting">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h6 class="mb-0 filter"><?php echo e(__('Price')); ?></h6>
                    </div>
                   
                    <div class="col-4 text-right">
                      <div class="form-group">
                        <div class="update-password1">
                          <input type="checkbox" id="myCheck1" name="type" class="custom_toggle" onclick="myFunction()" checked>
                        </div>
                      </div>
                    </div>
                    <div style="display: none" id="update-password1">
                      <div class="form-group text-right col-md-12">
                        <select required="" name="type" id="myCheck1" class="form-control select2">
                          <option value="paid"><?php echo e(__('Paid')); ?></option>
                          <option value="free"><?php echo e(__('Free')); ?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter"><?php echo e(__('Status')); ?></h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="status" class="custom_toggle" checked/></div>
                  </div>
      
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter"><?php echo e(__('Featured')); ?></h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="featured" class="custom_toggle" checked/></div>
                  </div>
      
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter"><?php echo e(__('A-Z')); ?></h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="asc" class="custom_toggle"  checked/></div>
                  </div>
      
                </div>
                <div class="custom-mode-setting">
                  <div class="row align-items-center pb-3">
                    <div class="col-8">
                      <h6 class="mb-0 filter"><?php echo e(__('Z-A')); ?></h6>
                    </div>
                    <div class="col-4 text-right"><input type="checkbox" name="desc" class="custom_toggle"  checked/></div>
                  </div>
      
                </div>
                <div class="infobar-settings-sidebar-body">
                  <div class="custom-mode-setting">
                    <div class="row align-items-center pb-3">
                      <div class="col-8">
                        <h6 class="mb-0 filter"><?php echo e(__('Category')); ?></h6>
                      </div>
                      
                        <div class="col-4 text-right">
                          <div class="form-group">
                            <div class="update-password">
                              <input type="checkbox" id="myCheck" name="category_id" class="custom_toggle" onclick="myFunction()" checked>
                            </div>
                          </div>
                        </div>
                        <div style="display: none" id="update-password">
                            <div class="form-group text-right col-md-12">
                              <select autofocus="" class="form-control select2" name="category_id">
                                <option value=""><?php echo e(__('Select Category')); ?></option>
                                <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>            
                            </div>
                        </div>              
                    </div>        
                  </div>
                </div>
              </div>
              <div class="form-group col-md-12 text-center">
                <button type="reset" class="btn btn-danger reset-btn" title="<?php echo e(__('Reset Filter')); ?>"
                ><i class="fa fa-ban"></i> <?php echo e(__('Reset Filter')); ?></button>
                                <button type="submit" class="btn btn-primary" title="<?php echo e(__('Apply Filter')); ?>"
                ><i class="fa fa-check-circle"></i>
                  <?php echo e(__('Apply Filter')); ?></button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
  
  <div class="partial-course-main-block">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="card partial-course-block">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-6">
                  <h4><?php echo e($active); ?></h4>
                  <p class="font-14 mb-0"><?php echo e(__('Active Course')); ?></p>
              </div> 
              <div class="col-6 text-right">
                <i class="text-info feather icon-book-open icondashboard"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card partial-course-block">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-6">
                  <h4><?php echo e($deactive); ?></h4>
                  <p class="font-14 mb-0"><?php echo e(__('Pending Course')); ?></p>
              </div> 
              <div class="col-6 text-right">
                <i class="text-danger feather icon-link icondashboard"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card partial-course-block">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-6">
                  <h4><?php echo e($free); ?></h4>
                  <p class="font-14 mb-0"><?php echo e(__('Free Course')); ?></p>
              </div> 
              <div class="col-6 text-right">
                <i class="text-success feather icon-file-text icondashboard"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card partial-course-block-one">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-6">
                  <h4><?php echo e($paid); ?></h4>
                  <p class="font-14 mb-0"><?php echo e(__('Paid Course')); ?></p>
              </div> 
              <div class="col-6 text-right">
                <i class="text-warning feather icon-dollar-sign icondashboard"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 mt-3 text-center">
      <?php if(request()->get('searchTerm')): ?>
          <h5 class=""><?php echo e(__("Showing")); ?> <?php echo e(filter_var($course->count())); ?> <?php echo e(__("of")); ?> <?php echo e(filter_var($course->total())); ?> <?php echo e(__("results for ")); ?> "<span class="text-primary"><?php echo e(Request::get('searchTerm')); ?></span>"</h5>
          <div class="clearfix"></div>
        <?php endif; ?>
    </div>
  
    <?php $__empty_1 = true; $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      
      <div class="col-lg-4 mb-4">
        <input type='checkbox' form='bulk_delete_form'
          class='form-card-input check filled-in material-checkbox-input position-absolute width-25 height-25 l-30 t-13'
          name='checked[]' value="<?php echo e($cat->id); ?>" id='checkbox<?php echo e($cat->id); ?>'>
        <label for='checkbox<?php echo e($cat->id); ?>' class='material-checkbox'></label>
        <div class="card partial-course-img">
          <?php if($cat['preview_image'] !== NULL && $cat['preview_image'] !== '' && @file_get_contents('images/course/'.$cat['preview_image'])): ?>
          <img class="card-img-top" src="<?php echo e(url('images/course/'.$cat['preview_image'])); ?>" alt="<?php echo e($cat->title); ?>">
          <div class="overlay-bg"></div>
          <?php else: ?>
          <img class="card-img-top" src="<?php echo e(Avatar::create($cat->title)->toBase64()); ?>" alt="<?php echo e($cat->title); ?>">
          <div class="overlay-bg"></div>
          <?php endif; ?>
          <div class="card-img-block">
            <a href="<?php echo e(route('user.course.show',['id' => $cat->id, 'slug' => $cat->slug ])); ?>" target="_blank" title="<?php echo e($cat->title); ?>"><h4 class="mt-3 card-title" style="color:white;"><?php echo e($cat->title); ?></h4></a>
            <p class="card-sub-title" style="color:white;"><?php if(isset($cat->user)): ?> <?php echo e($cat->user['fname']); ?> <?php endif; ?></p>
          </div>
          <div class="card-user-img">
            <?php if($image = @file_get_contents('../public/images/user_img/'.$cat->user->user_img)): ?>

              <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> src="<?php echo e(url('images/user_img/'.$cat->user->user_img)); ?>" alt="<?php echo e($cat->user['fname']); ?>" class="img-fluid" data-toggle="modal" data-target="#exampleStandardModal<?php echo e($cat->user->id); ?>">

            <?php else: ?>

              <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> src="<?php echo e(Avatar::create($cat->user->fname)->toBase64()); ?>" alt="<?php echo e($cat->user['fname']); ?>" class="img-fluid w-h-100" data-toggle="modal" data-target="#exampleStandardModal<?php echo e($cat->user->id); ?>">

            
            <?php endif; ?>
            
          </div>
          <div class="card-body">
            <ul class="partial-course-status">
              <li style="list-style-type: none;" class="mt-4">
                <a href="#" style="color:black"><?php echo e(__('Type')); ?> 
                  <span class="button-align">
                    <?php if($cat->type == '1'): ?>
                      paid
                      <?php else: ?>
                      Free
                    <?php endif; ?>
                  </span>
                </a>
              </li>
              <?php if(Auth::user()->role == 'admin'): ?>
              <li style="list-style-type: none;" class="mt-3"> 
                <a href="#" style="color:black"><?php echo e(__('Features')); ?><span class="button-align">
                <input  data-id="<?php echo e($cat->id); ?>" type="checkbox"  class="custom_toggle status1" name="featured" <?php echo e($cat->featured == 1 ? 'checked' : ''); ?> />
                </span>
                </a>
                
              </li>
              <?php else: ?>
              <li style="list-style-type: none;" class="mt-3"> 
                <a href="#" style="color:black"><?php echo e(__('Featured')); ?>

                  <span class="button-align">
                <?php if($cat->featured ==1): ?>
                        <?php echo e(__('Yes')); ?>

                        <?php else: ?>
                        <?php echo e(__('No')); ?>

                        <?php endif; ?>
                </span>
                </a>
                
              </li>
              <?php endif; ?>

              <?php if(Auth::user()->role == 'admin'): ?>
              <li style="list-style-type: none;" class="mt-3">
                <a href="#" style="color:black"><?php echo e(__('Status')); ?>

                  <span class="button-align">
                    <input  data-id="<?php echo e($cat->id); ?>" type="checkbox"  class="custom_toggle status2" name="status" <?php echo e($cat->status == 1 ? 'checked' : ''); ?> />
                  </span>
                </a>
          
              </li>
              <?php else: ?>
              <li style="list-style-type: none;" class="mt-3">
                <a href="#" style="color:black"><?php echo e(__('Status')); ?>

                  <span class="button-align">
                    <?php if($cat->status ==1): ?>
                          <?php echo e(__('Active')); ?>

                        <?php else: ?>
                          <?php echo e(__('Deactive')); ?>

                        <?php endif; ?>
                  </span>
                </a>
          
              </li>
              <?php endif; ?>
            </ul>

          </div>
          <div class="card-footer">
            <div class="row mt-3 mb-3">
              <div class="col-1"></div>
              <div class="col-2">
                <a href="<?php echo e(route('course.show',$cat->id)); ?>" title="<?php echo e(__('Edit')); ?>"
>

                  <i title="Edit" class="feather icon-edit"></i></a>
              </div>
              <div class="col-2">
                <a data-toggle="modal" data-target="#delete<?php echo e($cat->id); ?>" title="<?php echo e(__('Delete')); ?>"
>
                  <i title="Delete" class="text-primary feather icon-trash"></i></a>

                <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($cat->id); ?>" tabindex="-1" role="dialog"
                  aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>"
>
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                        <p><?php echo e(__('Do you really want to delete')); ?> ? <?php echo e(__('This process cannot be undone.')); ?></p>
                      </div>
                      <div class="modal-footer">
                        <form method="post" action="<?php echo e(url('course/'.$cat->id)); ?>" class="pull-right">
                          <?php echo e(csrf_field()); ?>

                          <?php echo e(method_field("DELETE")); ?>

                          <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                          <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-2">
                <a href="<?php echo e(route('user.course.show',['id' => $cat->id, 'slug' => $cat->slug ])); ?>" target="_blank"
                  title="<?php echo e(__('View Course')); ?>">

                  <i class="feather icon-eye"></i></a>
              </div>

            

              <!--==================bulk delete start========================================-->

              <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" title="<?php echo e(__('Close')); ?>"
>&times;</button>
                      <div class="delete-icon"></div>
                    </div>
                    <div class="modal-body text-center">
                      <h4 class="modal-heading"><?php echo e(__('Are You Sure')); ?> ?</h4>
                      <p><?php echo e(__('Do you really want to delete selected item ? This process
                        cannot be undone')); ?>.</p>
                    </div>
                    <div class="modal-footer">
                      <form id="bulk_delete_form" method="post" action="<?php echo e(route('cource.bulk.delete')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!--=================== bulk delete end =======================================--->
              <div class="modal fade" id="exampleStandardModal<?php echo e($cat->user->id); ?>" tabindex="-1"
                role="dialog" aria-labelledby="exampleStandardModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleStandardModalLabel">
                                <?php echo e($cat->user->fname); ?></h5>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close" title="<?php echo e(__('Close')); ?>"
>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body py-5">
                                        <div class="row">
                                            <div class="user-modal">
                                                <?php if($image =
                                                @file_get_contents('../public/images/user_img/'.$cat->user->user_img)): ?>
                                                <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    src="<?php echo e(url('images/user_img/'.$cat->user->user_img)); ?>"
                                                    alt="<?php echo e($cat->user->fname); ?> <?php echo e($cat->user->lname); ?>"
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
                                                    src="<?php echo e(Avatar::create($cat->user->fname)->toBase64()); ?>"
                                                    alt="<?php echo e($cat->user->fname); ?> <?php echo e($cat->user->lname); ?>"
                                                    class="img-responsive img-circle">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-lg-12">
                                                <h4 class="text-center">
                                                    <?php echo e($cat->user->fname); ?> <?php echo e($cat->user->lname); ?>

                                                </h4>
                                                <div class="button-list mt-4 mb-3">
                                                    <a href="mailto:<?php echo e($cat->user->email); ?>" class="btn btn-primary-rgba" title="<?php echo e($cat->user->email); ?>"><i class="feather icon-email mr-2"></i><?php echo e($cat->user->email); ?></a>
                                                    <a href="tel:<?php echo e($cat->user->mobile); ?>" 
                                                        class="btn btn-success-rgba" title="<?php echo e($cat->user->mobile); ?>"><i
                                                            class="feather icon-phone mr-2"></i><?php echo e($cat->user->mobile); ?></a>
                                                </div>
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-borderless mb-0 user-table">
                                                        <tbody>
                                                          
                                                            <?php if(isset($cat->user->address )): ?>

                                                            <tr>
                                                                <th scope="row" class="p-1">
                                                                    <?php echo e(__('Address :')); ?></th>
                                                                <td class="p-1">
                                                                    <?php echo e($cat->user->address); ?></td>
                                                            </tr>
                                                            <?php endif; ?>                                        

                                                            <?php if(isset($cat->user->role )): ?>

                                                            <tr>
                                                              <th scope="row" class="p-1">
                                                              <?php echo e(__('Role :')); ?></th>
                                                              <td class="p-1">
                                                                  <?php echo e($cat->user->role); ?></td>
                                                          </tr>
                                                          <?php endif; ?>

                                                        

                                                          <tr>
                                                            <th scope="row" class="p-1">
                                                            <?php echo e(__('Country State City')); ?></th>
                                                            <td class="p-1">
                                                                <?php echo e(optional($cat->user->country)->name); ?>-<?php echo e(optional($cat->user->state)->name); ?>-<?php echo e(optional($cat->user->city)->name); ?></td>
                                                        </tr>
                                                    

                                                        <?php if(isset($cat->user->youtube_url )): ?>

                                                        <tr>
                                                            <th scope="row" class="p-1">
                                                            <?php echo e(__('YouTube URL')); ?></th>
                                                            <td class="p-1">
                                                                <a href="<?php echo e($cat->user->youtube_url); ?>" target="_blank" title="<?php echo e(str_limit($cat->user->youtube_url)); ?>"><?php echo e(str_limit($cat->user->youtube_url, '30')); ?></a></td>
                                                        </tr>
                                                        <?php endif; ?>

                                                        <?php if(isset($cat->user->fb_url )): ?>

                                                        <tr>
                                                            <th scope="row" class="p-1">
                                                                <?php echo e(__('Facebook URL')); ?></th>
                                                            <td class="p-1">
                                                                <a href="<?php echo e($cat->user->fb_url); ?>" target="_blank" title="<?php echo e(str_limit($cat->user->fb_url)); ?>"><?php echo e(str_limit($cat->user->fb_url, '30')); ?></a></td>
                                                        </tr>
                                                        <?php endif; ?>

                                                        <?php if(isset($cat->user->twitter_url )): ?>

                                                        <tr>
                                                            <th scope="row" class="p-1">
                                                                <?php echo e(__('Twitter URL')); ?></th>
                                                            <td class="p-1">
                                                                <a href="<?php echo e($cat->user->twitter_url); ?>" target="_blank" title="<?php echo e(str_limit($cat->user->twitter_url, '30')); ?>"><?php echo e(str_limit($cat->user->twitter_url)); ?></a></td>
                                                        </tr>
                                                        <?php endif; ?>

                                                        <?php if(isset($cat->user->linkedin_url )): ?>

                                                        <tr>
                                                            <th scope="row" class="p-1">
                                                                <?php echo e(__('Linkedin URL')); ?></th>
                                                            <td class="p-1">
                                                                <a href="<?php echo e($cat->user->linkedin_url); ?>" target="_blank" title="<?php echo e(str_limit($cat->user->linkedin_url, '30')); ?>"><?php echo e(str_limit($cat->user->linkedin_url)); ?></a></td>
                                                            </td>
                                                        </tr>
                                                        <?php endif; ?>


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
                </div>
            </div>

              <?php if(Module::has('Homework') && Module::find('Homework')->isEnabled()): ?>
              <div class="col-2">
                <?php echo $__env->make('homework::admin.icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
              <?php endif; ?>

              <div class="col-2 duplicate">


                <a href="#" title="<?php echo e(__('Duplicate Course')); ?>">
                  <form action="<?php echo e(route('course.duplicate',$cat->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button type="Submit" class="btn mr-3">
                      <i class="text-primary feather icon-copy"></i>
                    </button>
                  </form>
                </a>


              </div>
              <div class="col-1"></div>
            </div>
          </div>



        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <h3 class="col-md-12 mt-5 text-center">
        <i class="fa fa-frown-o text-warning"></i> <?php echo e(__("No Course Found !")); ?>

      </h3>
    <?php endif; ?>
  </div>
  <div class="row">
    <div class="col-md-12 my-5">
        <div class="pull-right">
          <?php echo $course->render(); ?>

        </div>
    </div>
  </div>
  <!-- End row -->
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
  $(function () {
    $('.status1').change(function () {
      var featured = $(this).prop('checked') == true ? 1 : 0;

      var id = $(this).data('id');


      $.ajax({
        type: "GET",
        dataType: "json",
        url: 'cource-featured-status',
        data: {
          'featured': featured,
          'id': id
        },
        success: function (data) {
          console.log(id)
        }
      });
    });
  });
</script>
<!-- script to change featured-status end -->
<!-- script to change status start -->
<script>
  $(function () {
    $('.status2').change(function () {
      var status = $(this).prop('checked') == true ? 1 : 0;

      var id = $(this).data('id');


      $.ajax({
        type: "GET",
        dataType: "json",
        url: 'cource-status',
        data: {
          'status': status,
          'id': id
        },
        success: function (data) {
          console.log(id)
        }
      });
    });
  });
</script>
<script>
  (function($) {
    "use strict";
    $(function(){
        $('#myCheck').change(function(){
          if($('#myCheck').is(':checked')){
            $('#update-password').show('fast');
          }else{
            $('#update-password').hide('fast');
          }
        });
        
    });
  })(jQuery);
  </script>
<script>
  (function($) {
    "use strict";
    $(function(){
        $('#myCheck1').change(function(){
          if($('#myCheck1').is(':checked')){
            $('#update-password1').show('fast');
          }else{
            $('#update-password1').hide('fast');
          }
        });
        
    });
  })(jQuery);
  </script>
<script>
  $(document).ready(function () {
    $(".reset-btn").click(function () {
      var uri = window.location.toString();

      if (uri.indexOf("?") > 0) {

        var clean_uri = uri.substring(0, uri.indexOf("?"));

        window.history.replaceState({}, document.title, clean_uri);

      }

      location.reload();
    });
  });
</script>
<!-- script to change status end -->

<script>
    $('#search').on('change', function () {
        var v = $(this).val();
        if (v == 'search') {
            $('#clear_id').show();
            $('#clear').attr('required', '');
        } else {
            $('#clear_id').hide();
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass\resources\views/admin/course/partial/index.blade.php ENDPATH**/ ?>
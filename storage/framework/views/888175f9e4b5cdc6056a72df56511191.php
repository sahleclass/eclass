<!-- homework tab start--> 
<div class="tab-pane fade" id="nav-homework" role="tabpanel" aria-labelledby="nav-homework-tab">
  <div class="assignment-main-block">
     <!-- row start --> 
    <div class="row">
        <div class="col-md-12">
          <div class="accordion" id="accordionExample" class="w-100 mt-2">
            <?php
            
            $homeworks = Modules\Homework\Models\Homework::where('course_id',$course->id)
                                                          ->where('status',1)->get();
            ?>
            <?php $__empty_1 = true; $__currentLoopData = $homeworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homework): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              
              <div id="headingOne<?php echo e(filter_var($homework->id)); ?>" class="mb-2">
                <button class="w-100 bg-scondary text-left border" type="button" data-toggle="collapse" data-target="#collapseOne_<?php echo e(filter_var($homework->id)); ?>" aria-expanded="true" aria-controls="collapseOne">
                  <div class="row mt-2 mb-2 ml-2 mr-2">
                    <div class="col-md-2">
                    <small><?php echo e(filter_var($homework->title)); ?></small>
                    </div>
                    <!-- homework description--> 
                    <div class="col-md-3 text-justify">
                     <small><?php echo e(filter_var($homework->description)); ?></small>
                    </div>
                    <!-- homework pdf/zip file--> 
                    <div class="col-md-1 mt-2">
                      <a  href="<?php echo e(route('homework.download',["id" =>$homework->id])); ?>" > <i class="fa fa-download"></i></a>
                    </div>
                     <!-- homework submission date-->
                    <div class="col-md-2">
                     <small><?php echo e(filter_var($homework->endtime)); ?> <br> <?php echo e(__("(Submission Date)")); ?></small> 
                    </div>
                    <!-- homework compulsory-->
                    <div class="col-md-1">
                      <small><?php echo e(filter_var($homework->compulsory) ? 'Compulsory' :''); ?></small>
                      
                    </div>
                    <?php
                      $current_date = Carbon\Carbon::now();
                    ?>
                    <!-- homework  Submit button -->
                    <div class="col-md-3">
                      <?php
                      $submithomework = Modules\Homework\Models\SubmitHomework::where('course_id',$course->id)
                                                        ->where('user_id',Auth::User()->id)
                                                        ->where('homework_id',$homework->id)->get();
                      ?>
                      
                      <?php if($submithomework->count() < 1 ): ?>
                      <?php if($current_date < $homework->endtime): ?>
                      <input  type="button" class="btn btn-danger btm-sm float-right" data-toggle="modal" data-target="#homework<?php echo e(filter_var($homework->id)); ?>" value="<?php echo e(__('Submit Homework')); ?>">
                      <?php else: ?>
                      <input  type="button" class="btn btn-warning rounded btm-sm float-right" value="<?php echo e(__('Submission date end')); ?>">
                      <?php endif; ?>
                       <?php else: ?>
                      <input  type="button" class="btn btn-warning btn-md float-right" value="<?php echo e(__('Submitted succesfully')); ?>">
                      <?php endif; ?>
                    </div>
                  </div>
                </button>
                 <!-- submithomework data show --> 
              <div id="collapseOne_<?php echo e(filter_var($homework->id)); ?>" class="collapse" aria-labelledby="headingOne<?php echo e(filter_var($homework->id)); ?>" data-parent="#accordionExample">
               
                <?php $__currentLoopData = $submithomework; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submithomework): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="assignment-tab-block bg-white">
                      <div class="categories-block">
                        <div class="row">
                          <!-- Submit homework detail -->
                          <div class="col-md-3">
                            <p class="font-weight-bold"> <?php echo e(filter_var($submithomework->detail)); ?></p> 
                          </div>
                           <!-- Submit homework pdf -->
                          <div class="col-md-1">
                            <a  href="<?php echo e(route('submithomework.download',["id" =>$submithomework->id])); ?>" > <i class="fa fa-download"></i></a>
                          </div>
                           <!-- Submit homework marks -->
                          <div class="col-md-3">
                            <span  class="font-weight-bold"> <?php echo e(__("Marks(Out of ")); ?><?php echo e(filter_var($homework->marks)); ?>)</span>
                         <br><?php echo e(!filter_var($submithomework->marks) ? "progress" : "$submithomework->marks"); ?>

                          </div>
                          <!-- Submit homework remark -->
                          <div class="col-md-3">
                            <span  class="font-weight-bold"><?php echo e(__("Remark")); ?></span>
                             <br><?php echo e(filter_var($submithomework->remark)); ?>

                          </div>
                        
                        </div>
                      </div>
                    </div> 
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              </div>
              <!-- Submit Homework Model start-->
              <div class="modal fade" id="homework<?php echo e(filter_var($homework->id)); ?>" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Submit Homework')); ?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="box box-primary">
                      <div class="panel panel-sum">
                        <div class="modal-body">
                            <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left"   action="<?php echo e(route('homework.submit', $course->id)); ?>" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                  <!-- user id -->
                                <input type="hidden" name="user_id"  value="<?php echo e(Auth::user()->id); ?>" />
                                 <!-- homework id -->
                                <input type="hidden" name="homework_id"  value="<?php echo e(filter_var($homework->id)); ?>" />
                                 <!-- course id -->
                                <input type="hidden" name="instructor_id"  value="<?php echo e(filter_var($course->user_id)); ?>" />
                                <div class="row">
                                  <div class="col-md-12">
                                    <!-- description -->
                                    <div class="form-group">
                                        <label for="title"><?php echo e(__('Description')); ?>:<sup class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="detail" placeholder="Please Enter Description">
                                    </div>
                                        
                                    <div class="form-group">
                                        <!-- Upload pdf/zip -->
                                        <div class="wrapper">
                                          <label for="detail"><?php echo e(__('Upload')); ?>:<sup class="redstar">*</sup></label> 
                                          <div class="file-upload">
                                            <input type="file" name="homework" class="form-control" />
                                            <i class="fa fa-arrow-up"></i>
                                          </div>
                                        </div>
                                    </div> 
                                  </div>
                                </div>
                                <!-- Upload Submit button -->
                                <div class="box-footer text-center">
                                <button type="submit" class="btn btn-sm btn-primary"><?php echo e(__('frontstaticword.Submit')); ?></button>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Submit Homework Model end-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <h4 class="text-center"><?php echo e(__("No homework available !")); ?></h4>
            <?php endif; ?>
          </div> 
        </div>
    </div>
    <!-- row end --> 
  </div> 
</div>
<!-- homework tab  end-->
<?php /**PATH C:\laragon\www\eclass\Modules/Homework\Resources/views/front/homework_tab.blade.php ENDPATH**/ ?>
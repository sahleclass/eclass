<div class="card btm-10">
    <div class="card-header" id="headingChapter<?php echo e($coursechapter->id); ?>">
        <div class="mb-0">
            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseChapter<?php echo e($coursechapter->id); ?>" aria-expanded="true" aria-controls="collapseChapter">
                <div class="course-check-table">
                <table class="table">  
                    <tbody>
                        <tr>
                        <td width="10px">
                            <div class="form-check">
                                <input class="form-check-input filled-in material-checkbox-input" type="checkbox" name="checked[]" value="<?php echo e($coursechapter->id); ?>" id="checkbox<?php echo e($coursechapter->id); ?>"  <?php echo e(isset($progress->mark_chapter_id) && in_array($coursechapter->id, $progress->mark_chapter_id) ? "checked" : ""); ?> >
                                <label class="form-check-label" for="invalidCheck">
                                </label>
                            </div>
                        </td>
                        
                        <td>
                            <div class="row">
                                <div class="col-lg-6 col-6">
                                    <div class="section"><?php echo e(__('Section')); ?>: <?php echo $i;?></div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="section-dividation text-right">
                                        <?php if(isset($progress->mark_chapter_id) && in_array($coursechapter->id, $progress->mark_chapter_id)): ?>
                                        <?php else: ?>
                                            <?php if(isset($coursechapter->goal_date)): ?>
                                            <?php
                                                // $dff = now()->diffInDays($coursechapter->goal_date);
                                                $startDate = date('Y-m-d');
                                                $dff = (strtotime($coursechapter->goal_date) - strtotime($startDate)) / (60 * 60 * 24);
                                                // if($dff>0){
                                                //     $dff+=1;
                                                // }
                                                // $dff+=1;                                                
                                            ?>
                                                <?php if($coursechapter->goal_date>=$startDate): ?>
                                                    <small class="text-danger"><?php echo e(__('Please complete your goal only ')); ?>

                                                    <?php if($dff==0): ?>
                                                   <?php echo e(__(' Today')); ?>

                                                    <?php else: ?>
                                                    <?php echo e($dff); ?> <?php echo e(__('days')); ?> 
                                                    <?php endif; ?>                                            
                                                    <?php echo e(__('left')); ?></small><br>
                                                <?php else: ?> 
                                                <small class="text-danger"><?php echo e(__('Your goal date is expired')); ?> <?php echo e($coursechapter->goal_date); ?></small><br>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>


                                        <?php
                                            $classone = App\CourseClass::where('coursechapter_id', $coursechapter->id)->count();
                                            if($classone>0){

                                                echo $classone;
                                            }
                                            else{

                                                echo "0";
                                            }
                                        ?>
                                        <?php echo e(__('Classes')); ?>

                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10 col-8">
                                    <div class="profile-heading"><?php echo e($coursechapter->chapter_name); ?>

                                    </div>
                                </div>
                                <div class="col-lg-2 col-4">
                                    <div class="text-right">
                                        <?php
                                        $classtwo =  App\CourseClass::where('coursechapter_id', $coursechapter->id)->sum("duration");
                                        echo $duration_round2 = round($classtwo,2);
                                        ?>
                                        
                                        <?php echo e(__('min')); ?>

                                        <br>
                                        <small>
                                        <?php if(isset($progress->mark_chapter_id) && in_array($coursechapter->id, $progress->mark_chapter_id)): ?>
                                            <?php if(isset($coursechapter->goal_date)): ?>
                                            <?php echo e(__('Goal Date')); ?> <?php echo e($coursechapter->goal_date); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                        <b><i class="fa fa-plus" aria-hidden="true" title="Set Goal Date" data-toggle="modal" data-target="#goaldate<?php echo e($coursechapter->id); ?>"></i></b>
                                            <?php if(isset($coursechapter->goal_date)): ?>
                                            <?php echo e(__('Goal Date')); ?> <?php echo e($coursechapter->goal_date); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </small>
                                        <?php if($coursechapter->file != NULL): ?>
                                        <a href="<?php echo e(asset('files/material/'.$coursechapter->file)); ?>" download="<?php echo e($coursechapter->file); ?>" title="Learning Material"><i class="fa fa-download"></i></a>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </button>
        </div>
    </div>
    <div id="collapseChapter<?php echo e($coursechapter->id); ?>" class="collapse" aria-labelledby="headingChapter" data-parent="#accordion">

        <?php

            $mytime = Carbon\Carbon::now();
        ?>
        <?php $__currentLoopData = $coursechapter->courseclass->sortBy('position'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


            <?php if(Auth::user()->role == "user" && $course->drip_enable == 1 && $class->drip_type != NULL): ?>

                <?php if($class->drip_type == 'date' && $class->drip_date != NULL): ?>

                    <?php if($today >= $class->drip_date): ?>

                        <?php echo $__env->make('include.course_class', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php endif; ?>

                <?php elseif($class->drip_type == 'days' && $class->drip_days != NULL): ?>

                    <?php
                        $order = App\Order::where('status', '1')->where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                        $days = $class->drip_days;
                        
                        $orderDate = optional($order)['created_at'];


                        $bundle = App\Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

                        $course_id = array();

                        foreach($bundle as $b)
                        {
                           $bundle = App\BundleCourse::where('id', $b->bundle_id)->first();
                            array_push($course_id, $bundle->course_id);
                        }

                        $course_id = array_values(array_filter($course_id));
                        $course_id = array_flatten($course_id);

                        if($orderDate != NULL){
                            $startDate = date("Y-m-d", strtotime("$orderDate +$days days"));
                        }
                        elseif(isset($course_id) && in_array($course->id, $course_id)){
                            $startDate = date("Y-m-d", strtotime("$bundle->created_at +$days days"));
                        }
                    ?>

                    <?php if($today >= $startDate): ?>

                        <?php echo $__env->make('include.course_class', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php endif; ?>

                <?php endif; ?>
            <?php else: ?>

                <?php echo $__env->make('include.course_class', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endif; ?>


        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="goaldate<?php echo e($coursechapter->id); ?>" tabindex="-1" role="dialog" aria-labelledby="goaldateLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="goaldateLabel"><?php echo e(__('Set Goal Date')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="date" name="goal_date" value="<?php echo e($coursechapter->goal_date); ?>" class="form-control date<?php echo e($coursechapter->id); ?>">
        <input type="hidden" name="chapter_id" value="<?php echo e($coursechapter->id); ?>" class="form-control chapter_id<?php echo e($coursechapter->id); ?>">
        <input type="hidden" name="current_date" value="<?php echo e(date('Y-m-d')); ?>" class="form-control current_date<?php echo e($coursechapter->id); ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="set_goal_date(<?php echo e($coursechapter->id); ?>)">Submit</button>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\laragon\www\eclass\resources\views/include/course_chapter.blade.php ENDPATH**/ ?>
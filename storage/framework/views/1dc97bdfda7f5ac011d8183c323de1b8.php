<?php if($class->status == 1): ?>
    <div class="card-body">
        <table class="table">  
            <tbody>
                <tr>
                    <td class="class-type">
                        <?php if($class->type =='video' && $class->video ): ?>
                          <a href="<?php echo e(route('watchcourseclass',$class->id)); ?>" title="Course" class="<?php if($z == 0): ?>iframe <?php endif; ?>"><i class="fa fa-play-circle"></i>&nbsp;<?php echo e(__('class')); ?></a>
                        <?php endif; ?>

                        <?php if($class->type =='video' && $class->aws_upload ): ?>
                          <a href="<?php echo e(route('watchcourseclass',$class->id)); ?>" title="Course" class="<?php if($z == 0): ?>iframe <?php endif; ?>"><i class="fa fa-play-circle"></i>&nbsp;<?php echo e(__('class')); ?></a>
                        <?php endif; ?>
                        
                        <?php
                            $url = Crypt::encrypt($class->iframe_url);
                        ?>
                        <?php if($class->type =='video' && $class->iframe_url ): ?>
                        <a href="<?php echo e(route('watchinframe',[$url, 'course_id' => $course->id])); ?>" title="Course"><i class="fa fa-play-circle"></i>&nbsp;<?php echo e(__('class')); ?></a>
                        <?php endif; ?>

                        <?php if($class->type =='audio' && $class->audio): ?>
                        <a href="<?php echo e(route('audiocourseclass',$class->id)); ?>" title="class" class="<?php if($z == 0): ?>iframe <?php endif; ?>"><i class="fa fa-play-circle"></i>&nbsp;<?php echo e(__('class')); ?></a>
                        <?php endif; ?>
                        <?php if($class->type =='image' && $class->image ): ?>
                        <a href="<?php echo e(asset('images/class/'.$class->image)); ?>" download="<?php echo e($class->image); ?>" title="Course"><i class="fas fa-image"></i>&nbsp;<?php echo e(__('save')); ?></a>
                        <?php endif; ?>
                        <?php if($class->type =='pdf' && $class->pdf ): ?>
                        <a href="<?php echo e(route('downloadPdf',$class->id)); ?>" title="Course" class="iframe"><i class="fas fa-file-pdf"></i>&nbsp;<?php echo e(__('View')); ?></a>

                        <?php endif; ?>

                        <?php if($class->type =='zip' && $class->zip ): ?>
                        <a href="<?php echo e(asset('files/zip/'.$class->zip)); ?>" download="<?php echo e($class->zip); ?>" title="Course"><i class="far fa-file-archive"></i>&nbsp;<?php echo e(__('save')); ?></a>
                        <?php endif; ?>

                        <?php if($class->url): ?>
                            <?php if($class->type =='video'): ?>
                            <?php if($mytime >= $class->date_time): ?>
                            <a href="<?php echo e(route('watchcourseclass',$class->id)); ?>" title="Course" class="<?php if($z == 0): ?>iframe <?php endif; ?>"><i class="fa fa-play-circle"></i>&nbsp;<?php echo e(__('class')); ?></a>
                            <?php else: ?>
                            <a href="" title="Course"><i class="fa fa-play-circle"></i>&nbsp;<?php echo e(__('class')); ?></a>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if($class->type =='image' || $class->type =='pdf' || $class->type =='zip' || $class->type =='audio'): ?>
                            <a href="<?php echo e($class->url); ?>" title="Course"><i class="fas fa-image"></i>&nbsp;<?php echo e(__('link')); ?></a>
                            <?php endif; ?>
                        <?php endif; ?> 
                    </td>

                    <td class="class-name">

                        <div class="koh-tab-content">
                          <div class="koh-tab-content-body">
                            <div class="koh-faq">
                              <div class="koh-faq-question">

                                <span class="koh-faq-question-span"> <?php echo e($class['title']); ?> </span>

                                <?php if($class->date_time != NULL): ?>
                                   <div class="live-class"><?php echo e(__('Live at')); ?>: <?php echo e($class->date_time); ?></div>
                                <?php endif; ?>
                                <?php if($class->detail != NULL): ?>
                                    <i class="fa fa-sort-down" aria-hidden="true"></i>
                                <?php endif; ?>
                              </div>
                              <div class="koh-faq-answer">
                                <?php echo $class->detail; ?>

                              </div>
                            </div>
                          </div>
                        </div>
                    </td>

                    <td class="class-size txt-rgt">
                        <?php if($class->type =='video' || $class->type =='audio'): ?>
                            <?php echo e($class->duration); ?> <?php echo e(__('min')); ?>

                        <?php endif; ?>
                        <?php if($class->type =='image' || $class->type =='pdf' || $class->type =='zip' ): ?>
                            <?php echo e($class->size); ?> Mb
                        <?php endif; ?>

                        <?php if($class->file != NULL): ?>
                        <a href="<?php echo e(asset('files/class/material/'.$class->file)); ?>" download="<?php echo e($class->file); ?>" title="<?php echo e(__('Learning Material')); ?>"><i class="fa fa-download"></i></a>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php endif; ?><?php /**PATH C:\laragon\www\eclass\resources\views/include/course_class.blade.php ENDPATH**/ ?>
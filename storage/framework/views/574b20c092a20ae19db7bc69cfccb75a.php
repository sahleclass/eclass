
<?php $__env->startSection('title', "$course->title"); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- courses content header start -->
<section id="class-nav" class="class-nav-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-12">
               <div class="class-nav-heading"><?php echo e($course->title); ?></div>
            </div>
            <div class="col-lg-5 col-md-6 col-12">
                <div class="class-button certificate-button">
                    <ul>
                        <?php if($gsetting->certificate_enable == 1): ?>
                        <?php if($course->certificate_enable == 1 ): ?>
                        <li>
                            <div class="dropdown">
                                <?php if(!empty($progress)): ?>
                                    <?php
                                    $total_class = $progress->all_chapter_id;
                                    $total_count = count($total_class);

                                    $total_per = 100;

                                    $read_class = $progress->mark_chapter_id;

                                    if(isset($read_class)){
                                        $read_count =  count($read_class);
                                    } else {
                                        $read_count =  '0';
                                    }
                                    

                                    $progres = ($read_count/$total_count) * 100;
                                    ?>

                                <?php endif; ?>
                                <?php if(Module::has('Certificate') && Module::find('Certificate')->isEnabled()): ?>
                                <?php if($certificate_setting->percentage <= Auth::user()->exam_percentage): ?>
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-trophy"></i>&nbsp; <?php echo e(__('Get Certificate')); ?>

                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php if(!empty($progress)): ?>
                                    <a class="dropdown-item"> 
                                        <?php echo e($read_count); ?> <?php echo e(__('of')); ?> <?php echo e($total_count); ?>  <?php echo e(__('complete')); ?>

                                    </a>
                                    <?php else: ?>
                                    <a class="dropdown-item"> 
                                        0 <?php echo e(__('of')); ?> 
                                        <?php
                                            $data = App\CourseChapter::where('course_id', $course->id)->count();
                                            if($data>0){
    
                                                echo $data;
                                            }
                                            else{
    
                                                echo "0";
                                            }
                                        ?> 
                                        <?php echo e(__('complete')); ?> 
                                    </a>
                                    <?php endif; ?>
                                    <?php if(!empty($progress)): ?>
                                        <?php if($read_count == $total_count): ?>
                                        <div class="about-home-btn">
    
                                            <?php
                                            $random = $progress->id.'CR-'.uniqid();
                                            ?>
                                            
                                            <a href="<?php echo e(route('certificate.show',['slug' => $random ])); ?>" class="btn btn-secondary" href="#"><?php echo e(__('Get Certificate')); ?></a>
                                        </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                  </div>
                                <?php endif; ?>
                                <?php else: ?>
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-trophy"></i>&nbsp; <?php echo e(__('Get Certificate')); ?>

                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php if(!empty($progress)): ?>
                                    <a class="dropdown-item"> 
                                        <?php echo e($read_count); ?> <?php echo e(__('of')); ?> <?php echo e($total_count); ?>  <?php echo e(__('complete')); ?>

                                    </a>
                                    <?php else: ?>
                                    <a class="dropdown-item"> 
                                        0 <?php echo e(__('of')); ?> 
                                        <?php
                                            $data = App\CourseChapter::where('course_id', $course->id)->count();
                                            if($data>0){
    
                                                echo $data;
                                            }
                                            else{
    
                                                echo "0";
                                            }
                                        ?> 
                                        <?php echo e(__('complete')); ?> 
                                    </a>
                                    <?php endif; ?>
                                    <?php if(!empty($progress)): ?>
                                        <?php if($read_count == $total_count): ?>
                                        <div class="about-home-btn">
    
                                            <?php
                                            $random = $progress->id.'CR-'.uniqid();
                                            ?>
                                            
                                            <a href="<?php echo e(route('certificate.show',['slug' => $random ])); ?>" class="btn btn-secondary" href="#"><?php echo e(__('Get Certificate')); ?></a>
                                        </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                  </div>
                                <?php endif; ?>
                           
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>" class="course_btn"> <?php echo e(__('Course details')); ?> <i class="fa fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="learning-courses-home" class="learning-courses-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="learning-courses-home-video text-white btm-30">
                    <div class="video-item hidden-xs">
                        <div class="video-device">
                            <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                                <img src="<?php echo e(asset('images/course/'.$course->preview_image)); ?>" class="img-fluid" alt="Background">
                            <?php else: ?>
                                <img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" class="bg_img img-fluid" alt="Background">
                            <?php endif; ?>
                            <div class="video-preview">
                                <?php
                                    //if empty 
                                    $z = 0;
                                    $items = App\CourseClass::where('course_id', $course->id)->first();
                                    $coursewatch = App\WatchCourse::where('course_id','=',$course->id)->where('user_id', Auth::User()->id)->first();
                                    if(isset($coursewatch['active']) == 0){
                                        $z = 0;    
                                    }else{
                                        $z = 1;
                                    }
                                
                                ?>

                               
                                <?php if(isset($items)): ?>
                                    <?php if(isset($course->chapter[0]->courseclass[0])): ?>

                                    <?php if($course->chapter[0]->courseclass[0]->type == "video" || $course->chapter[0]->courseclass[0]->type == "audio"): ?> 
                                    <?php if(isset($course->chapter[0]->courseclass[0])): ?> 
                                        <?php if($course->chapter[0]->courseclass[0]->iframe_url == NULL): ?>
                                            
                                            <a href="<?php echo e(route('watchcourse',$course->id)); ?>" class="btn-video-play <?php if($z == 0): ?>iframe <?php endif; ?>"><i class="fa fa-play"></i></a>
                                        <?php else: ?>
                                       
                                            <?php
                                                $url = Crypt::encrypt($course->chapter[0]->courseclass[0]->iframe_url);
                                            ?>
                                            <a href="<?php echo e(route('watchinframe',[$url, 'course_id' => $course->id])); ?>" class="btn-video-play"><i class="fa fa-play"></i></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('watchcourse',$course->id)); ?>" class="btn-video-play <?php if($z == 0): ?>iframe <?php endif; ?>"><i class="fa fa-play"></i></a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="learning-courses-home-block">
                    <h3 class="learning-courses-home-heading btm-20"><a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>" title="heading"><?php echo e($course->title); ?></a></h3>
                    <div class="learning-courses btm-20 display-inline"><?php echo e($course->user->fname); ?></div>

                    <?php if($course->user->vacation_start == !NULL): ?>
                    <span class="vacation-days text-white">(<?php echo e(__('On Vacation')); ?>)
                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo e(date('d-m-Y | h:i:s A',strtotime($course->user->vacation_start))); ?> to <?php echo e(date('d-m-Y | h:i:s A',strtotime($course->user->vacation_end))); ?>"><i class="fas fa-info-circle"></i></button>

                    </span>)
                    <?php endif; ?>
                    <br>

                    <div class="learning-courses btm-20"><?php echo e($course->short_detail); ?></div>

                    <?php if(!empty($progress)): ?>
                        <?php
                        $total_class = $progress->all_chapter_id;
                        $total_count = count($total_class);

                        $total_per = 100;

                        $read_class = $progress->mark_chapter_id;
                        if(isset($read_class)){
                            $read_count =  count($read_class);
                        } else {
                            $read_count =  '0';
                        }

                        $progres = ($read_count/$total_count) * 100;
                        ?>
    
                    <div class="progress-block">
                        <div class="one histo-rate">
                            <span class="bar-block" style="width: 100%">
                                <span id="bar-one" style="width: <?php echo $progres; ?>%" class="bar bar-clr bar-radius">&nbsp;</span> 
                            </span>
                        </div>
                        <i class="fa fa-trophy lft-7"></i>
                    </div>
                    <?php else: ?>
                    <div class="progress-block">
                        <div class="one histo-rate">
                            <span class="bar-block" style="width: 100%">
                                <span id="bar-one" style="width: 0%" class="bar bar-clr bar-radius">&nbsp;</span> 
                            </span>
                        </div>
                        <i class="fa fa-trophy lft-7"></i>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($items)): ?>
                        <?php if(isset($course->chapter[0]->courseclass[0])): ?>
                        <?php if($course->chapter[0]->courseclass[0]->type == "video" || $course->chapter[0]->courseclass[0]->type == "audio"): ?>
                        <?php if(isset($course->chapter[0]->courseclass[0])): ?>
                            <?php if($course->chapter[0]->courseclass[0]->iframe_url == NULL): ?>
                            <div class="learning-courses-home-btn">
                                <a href="<?php echo e(route('watchcourse',$course->id)); ?>" class="<?php if($z == 0): ?>iframe <?php endif; ?> btn btn-primary" title="Continue"><?php echo e(__('Continue to Lecture')); ?></a>
                            </div>
                            <?php else: ?>
                            <div class="learning-courses-home-btn">
                                <?php
                                    $url = Crypt::encrypt($course->chapter[0]->courseclass[0]->iframe_url);
                                ?>
                                <a href="<?php echo e(route('watchinframe',[$url, 'course_id' => $course->id])); ?>" class="btn btn-primary" title="Continue"><?php echo e(__('Continue to Lecture')); ?></a>
                            </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="learning-courses-home-btn">
                                <a href="<?php echo e(route('watchcourse',$course->id)); ?>" class="<?php if($z == 0): ?>iframe <?php endif; ?> btn btn-primary" title="Continue"><?php echo e(__('Continue to Lecture')); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- courses content header end -->
<!-- courses-content start -->
<section id="learning-courses" class="learning-courses-about-main-block">
    <div class="container-xl">
        <div class="about-block">
           
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link active text-center" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo e(__('Overview')); ?></a>

                    <a class="nav-item nav-link text-center" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo e(__('Course Content')); ?></a>

                    <a class="nav-item nav-link text-center" id="nav-live-tab" data-toggle="tab" href="#nav-live" role="tab" aria-controls="nav-live" aria-selected="false"><?php echo e(__('Live Class')); ?></a>

                    <a class="nav-item nav-link text-center" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><?php echo e(__('Q & A')); ?></a>

                    <?php if(count($announsments) > 0): ?>
                    <a class="nav-item nav-link text-center" id="nav-announcement-tab" data-toggle="tab" href="#nav-announcement" role="tab" aria-controls="nav-announcement" aria-selected="false"><?php echo e(__('Announcements')); ?></a>
                    <?php endif; ?>


                    <a class="nav-item nav-link text-center" id="nav-quiz-tab" data-toggle="tab" href="#nav-quiz" role="tab" aria-controls="nav-quiz" aria-selected="false"><?php echo e(__('Quiz')); ?></a>

                    <?php if($gsetting->assignment_enable == 1): ?>
                    <?php if($course->assignment_enable == 1): ?>
                    <a class="nav-item nav-link text-center" id="nav-assign-tab" data-toggle="tab" href="#nav-assign" role="tab" aria-controls="nav-assign" aria-selected="false"><?php echo e(__('Assignment')); ?></a>
                    <?php endif; ?>
                    <?php endif; ?>
                    
                    <?php if($gsetting->appointment_enable == 1): ?>
                    <?php if($course->appointment_enable == 1): ?>
                    <a class="nav-item nav-link text-center" id="nav-appoint-tab" data-toggle="tab" href="#nav-appoint" role="tab" aria-controls="nav-appoint" aria-selected="false"><?php echo e(__('Appointment')); ?></a>
                    <?php endif; ?>
                    <?php endif; ?>
                    

                    <?php if(count($papers) > 0): ?>
                    <a class="nav-item nav-link text-center" id="nav-paper-tab" data-toggle="tab" href="#nav-paper" role="tab" aria-controls="nav-paper" aria-selected="false"><?php echo e(__('Previous Papers')); ?></a>
                    <?php endif; ?>

                    <?php if(Module::has('Homework') && Module::find('Homework')->isEnabled()): ?>
                        <?php echo $__env->make('homework::front.icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                </div>
            </nav>
               
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="overview-block">
                        <h4><?php echo e(__('Recent Activity')); ?></h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="learning-questions-block btm-40">
                                    <h5 class="learning-questions-heading"><?php echo e(__('Recent Questions')); ?></h5>

                                    <?php if($coursequestions->isEmpty()): ?>
                                        <div class="learning-questions-content text-center">
                                            <h3 class="text-center"><?php echo e(__('No')); ?> <?php echo e(__('Recent Questions')); ?></h3>
                                        </div>
                                    <?php else: ?>
                                       
                                        <?php $__currentLoopData = $coursequestions->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="learning-questions-dtl-block">
                                            <div class="learning-questions-img rgt-20"><?php echo e(str_limit(optional($question->user)->fname, $limit = 1, $end = '')); ?><?php echo e(str_limit(optional($question->user)->lname, $limit = 1, $end = '')); ?></div>
                                            <div class="learning-questions-dtl"><?php echo $question->question; ?>

                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <div class="learning-questions-heading"><a href="#" id="goTab4" title="browse"><?php echo e(__('Browse questions')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php if(count($announsments) > 0): ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="learning-questions-block btm-40">
                                    <h5 class="learning-questions-heading"><?php echo e(__('Recent Announcements')); ?></h5>
                                    <?php if($announsments->isEmpty()): ?>
                                        <div class="learning-questions-content text-center">
                                            <h3 class="text-center"><?php echo e(__('No')); ?> <?php echo e(__('Recent Announcements')); ?></h3>
                                        </div>
                                    <?php else: ?>
                                        <div id="accordion" class="second-accordion">
                                        <?php $__currentLoopData = $announsments->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announsment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card">
                                            <div class="card-header" id="headingFour<?php echo e($announsment->id); ?>">
                                                <div class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour<?php echo e($announsment->id); ?>" aria-expanded="true" aria-controls="collapseFour">
                                                        <div class="learning-questions-img rgt-20"><?php echo e(str_limit($announsment->user->fname, $limit = 1, $end = '')); ?><?php echo e(str_limit($announsment->user->lname, $limit = 1, $end = '')); ?>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="section"><a href="#" title="questions"><?php echo e($course->user->fname); ?> <?php echo e($announsment->user->lname); ?></a> <a href="#" title="questions"><?php echo e(date('jS F Y', strtotime($announsment->created_at))); ?></a></div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="section-dividation text-right">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-9"> 
                                                                <div class="profile-heading"><?php echo e(__('Announcements')); ?></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="collapseFour<?php echo e($announsment->id); ?>" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                               
                                                <div class="card-body">
                                                    <p class="announsment-text"><?php echo $announsment->announsment; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="learning-questions-heading"><a id="goTab5" href="" title="browse"><?php echo e(__('Browse announcements')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="content-course-block">
                            <h4 class="content-course"><?php echo e(__('About this course')); ?></h4>
                            <p class="btm-40"><?php echo e($course->short_detail); ?></p>
                        </div>
                        <hr>
                        <div class="content-course-number-block">
                            <div class="row">
                                <div class="col-lg-3 col-sm-4">
                                    <div class="content-course-number"><?php echo e(__('By the numbers')); ?></div>
                                </div>
                                <div class="col-lg-6 col-sm-5">
                                    <div class="content-course-number">
                                        <ul>
                                            <li><?php echo e(__('students enrolled')); ?>: 
                                                <?php
                                                    $data = App\Order::where('course_id', $course->id)->count();
                                                    if($data>0){

                                                        echo $data;
                                                    }
                                                    else{

                                                        echo "0";
                                                    }
                                                ?>
                                            </li>
                                            <?php if($course->language_id == !NULL): ?>
                                            <?php if(isset($course->language)): ?>
                                            <li><?php echo e(__('Languages')); ?>: <?php echo e($course->language->name); ?></li>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <div class="content-course-number">
                                        <ul>
                                            <li><?php echo e(__('Classes')); ?>:
                                                <?php
                                                    $data = App\CourseClass::where('course_id', $course->id)->count();
                                                    if($data>0){

                                                        echo $data;
                                                    }
                                                    else{

                                                        echo "0";
                                                    }
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <div class="content-course-number"><?php echo e(__('Description')); ?></div>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <div class="content-course-number content-course-one">
                                        <h5 class="content-course-number-heading"><?php echo e(__('About this course')); ?></h5>
                                        <p><?php echo e($course->short_detail); ?><p>
                                        <h5 class="content-course-number-heading"><?php echo e(__('Description')); ?></h5>
                                        <p><?php echo $course->detail; ?><p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <div class="content-course-number"><?php echo e(__('Instructor')); ?></div>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <div class="content-course-number content-course-number-one">
                                        <div class="content-img-block btm-20">
                                            <div class="content-img">
                                                <?php
                                                $fullname = optional($course->user)['fname'] . ' ' . optional($course->user)['lname'];
                                                $fullname = preg_replace('/\s+/', '', $fullname);
                                                ?>

                                                <?php if($course->user->user_img != null || $course->user->user_img !=''): ?>
                                                  <a href="<?php echo e(route('instructor.profile', ['id' => $course->user->id, 'name' => $fullname] )); ?>" title="profile"><img src="<?php echo e(asset('images/user_img/'.$course->user->user_img)); ?>" class="img-fluid"  alt="instructor" ></a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('instructor.profile', ['id' => $course->user->id, 'name' => $fullname] )); ?>" title="profile"><img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-fluid" alt="instructor"></a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="content-img-dtl">
                                                <div class="profile"><a href="<?php echo e(route('instructor.profile', ['id' => $course->user->id, 'name' => $fullname] )); ?>" title="profile"><?php echo e($course->user->fname); ?> <?php echo e($course->user->lname); ?>

                                                </a></div>
                                                <p><?php echo e($course->user->email); ?></p>
                                            </div>
                                        </div>
                                        <ul>
                                            <?php if($course->user->twitter_url != NULL): ?>
                                            <li class="rgt-10"><a href="<?php echo e($course->user['twitter_url']); ?>" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($course->user->fb_url != NULL): ?>
                                            <li class="rgt-10"><a href="<?php echo e($course->user['fb_url']); ?>" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($course->user->linkedin_url != NULL): ?>
                                            <li class="rgt-10"><a href="<?php echo e($course->user['linkedin_url']); ?>" target="_blank" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($course->user->youtube_url != NULL): ?>
                                            <li class="rgt-10"><a href="<?php echo e($course->user['youtube_url']); ?>" target="_blank" title="twitter"><i class="fa fa-youtube"></i></a></li>
                                            <?php endif; ?>

                                        </ul>
                                        <p><?php echo $course->user->detail; ?><p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="profile-block">
                        <form  method="post" action="<?php echo e(action('CourseProgressController@checked', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                            <?php echo e(csrf_field()); ?>

                        
                            <div id="ck-button">
                               <label>
                                  <input type="checkbox" name="select-all" class="hidden" id="select-all" /><span><?php echo e(__('Select All')); ?></span>
                               </label>
                            </div>

                            <?php
                                $today = Carbon\Carbon::now();
                            ?>
                       
                            <div id="accordion" class="second-accordion">
                                <?php $i=0;?>
                                <?php $__currentLoopData = $course->chapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coursechapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++;?>

                                <?php if(Auth::user()->role == "user" && $course->drip_enable == 1 && $coursechapter->drip_type != NULL): ?>

                                    <?php if($coursechapter->drip_type == 'date' && $coursechapter->drip_date != NULL): ?>

                                        <?php if($today >= $coursechapter->drip_date): ?>

                                            <?php echo $__env->make('include.course_chapter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <?php endif; ?>

                                    <?php elseif($coursechapter->drip_type == 'days' && $coursechapter->drip_days != NULL): ?>

                                        <?php
                                            $order = App\Order::where('status', '1')->where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                                            $days = $coursechapter->drip_days;
                                            $orderDate = optional($order)['created_at'];


                                            $bundle = App\Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

                                            $course_id = array();

                                          

                                            $course_id = array_values(array_filter($course_id));
                                            $course_id = array_flatten($course_id);

                                            if($orderDate != NULL){
                                                $startDate = date("Y-m-d", strtotime("$orderDate +$days days"));
                                            }
                                            elseif(isset($course_id) && in_array($course->id, $course_id)){
                                                $startDate = date("Y-m-d", strtotime("$bundle->created_at +$days days"));
                                            }
                                            else
                                            {
                                                $startDate = NULL;
                                            }

                                            
                                        ?>

                                        <?php if($today >= $startDate): ?>

                                            <?php echo $__env->make('include.course_chapter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <?php endif; ?>

                                    <?php endif; ?>
                                <?php else: ?>

                                    <?php echo $__env->make('include.course_chapter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php endif; ?>
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mark-read-button">
                                        <button type="submit" class="btn btn-md btn-primary">
                                            <?php echo e(__('Mark as Complete')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        

                    </div>
                </div>

                <div class="tab-pane fade" id="nav-live" role="tabpanel" aria-labelledby="nav-live-tab">

                    <div id="about-product" class="about-product-main-block">

                        <?php if(auth()->guard()->check()): ?>

                        <?php
                            $user_enrolled = App\Order::where('course_id', $course->id)->where('user_id', Auth::user()->id)->first();

                            $bundle = App\Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

                            $course_id = array();

                            // foreach($bundle as $b)
                            // {
                            //  $bundle = App\BundleCourse::where('id', $b->bundle_id)->first();
                            //   array_push($course_id, $bundle->course_id);
                            // }

                            $course_id = array_values(array_filter($course_id));
                            $course_id = array_flatten($course_id);
                        ?>


                        <?php if( $user_enrolled != NULL || Auth::user()->role == 'admin' || isset($course_id) || in_array($course->id, $course_id)): ?>

                        <?php if( ! $bigblue->isEmpty() ): ?>

                        <div class="btm-30">
                            <h5><?php echo e(__('Big Blue Meetings')); ?></h5>
                            <div class="faq-block">
                                <div class="faq-dtl">
                                    <div id="accordion" class="second-accordion">

                                    <?php $__currentLoopData = $bigblue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($bbl->is_ended != 1): ?>

                                    <div class="card btm-10">
                                        <div class="card-header" id="headingThree<?php echo e($bbl->id); ?>">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree<?php echo e($bbl->id); ?>" aria-expanded="false" aria-controls="collapseThree">

                                                    <?php echo e($bbl['meetingname']); ?>


                                                </button>
                                            </div>

                                        </div>
                                        <div id="collapseThree<?php echo e($bbl->id); ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">

                                        <div class="card-body">
                                            <table class="table">
                                            <tbody>
                                                <td>
                                                  <ul>
                                                    <li><a href="#" title="about"><?php echo e(__('Created')); ?>: <?php if(isset($bbl->user)): ?> <?php echo e($bbl->user['fname']); ?> <?php echo e($bbl->user['lname']); ?> <?php endif; ?></a></li>
                                                    <li><a href="#" title="about"><?php echo e(__('Start At')); ?>: <?php echo e(date('d-m-Y | h:i:s A',strtotime($bbl['start_time']))); ?></a></li>
                                                    <li class="comment more">
                                                       <?php echo $bbl->detail; ?>

                                                    </li>

                                                    <li>
                                                        <a href="" data-toggle="modal" data-target="#myModalBBL" title="join" class="btn btn-light" title="course"><?php echo e(__('Join Meeting')); ?></a>
                                                    </li>

                                                    <div class="modal fade" id="myModalBBL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header">

                                                              <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Join Meeting')); ?></h4>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="box box-primary">
                                                              <div class="panel panel-sum">
                                                                <div class="modal-body">

                                                                    <form action="<?php echo e(route('bbl.api.join')); ?>" method="POST">
                                                                        <?php echo csrf_field(); ?>

                                                                        <div class="form-group">
                                                                            <label><?php echo e(__('Meeting ID')); ?>:</label>
                                                                            <input readonly="" type="text" name="meetingid" value="<?php echo e($bbl['meetingid']); ?>" class="form-control">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label><?php echo e(__('Your Name')); ?>:</label>
                                                                            <input value="<?php echo e(old('name')); ?>" type="text" required="" name="name" placeholder="<?php echo e(__('Enter your name')); ?>" class="form-control">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label><?php echo e(__('Meeting Password')); ?>:</label>
                                                                            <input type="password" name="password" placeholder="<?php echo e(__('Enter meeting password')); ?>" class="form-control" required="">
                                                                        </div>

                                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                                            <?php echo e(__('Join Meeting')); ?>

                                                                        </button>

                                                                    </form>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>

                                                  </ul>
                                                </td>

                                            </tbody>
                                            </table>
                                        </div>
                                       </div>
                                    </div>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if( ! $meetings->isEmpty() ): ?>
                        <div class="btm-30">
                            <h5><?php echo e(__('Zoom Meetings')); ?></h5>
                            <div class="faq-block">
                                <div class="faq-dtl">
                                    <div id="accordion" class="second-accordion">


                                    <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="card btm-10">
                                        <div class="card-header" id="headingFour<?php echo e($meeting->id); ?>">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour<?php echo e($meeting->id); ?>" aria-expanded="false" aria-controls="collapseFour">
                                                    <?php echo e($meeting['meeting_title']); ?>

                                                </button>
                                            </div>

                                        </div>
                                        <div id="collapseFour<?php echo e($meeting->id); ?>" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">

                                        <div class="card-body">
                                            <table class="table">
                                            <tbody>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="about"><?php echo e(__('Created')); ?>: <?php if(isset($meeting->user)): ?> <?php echo e($meeting->user['fname']); ?> <?php echo e($meeting->user['lname']); ?> <?php endif; ?> </a>
                                                        </li>
                                                        <li>
                                                           <p><?php echo e(__('Meeting Owner')); ?>: <?php echo e($meeting->owner_id); ?></p>
                                                        </li>
                                                        <li>
                                                           <p class="btm-10"><a herf="#"><?php echo e(__('Start At')); ?>: <?php echo e(date('d-m-Y | h:i:s A',strtotime($meeting['start_time']))); ?></a></p>
                                                        </li>
                                                        <li>
                                                             <a href="<?php echo e($meeting->zoom_url); ?>" target="_blank" class="iframe cboxElement btn btn-light"><?php echo e(__('Join Meeting')); ?></a>
                                                        </li>
                                                    </ul>

                                                </td>
                                            </tbody>
                                            </table>
                                        </div>
                                       </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($gsetting->googlemeet_enable == '1'): ?>
                        <?php if( ! $googlemeetmeetings->isEmpty() ): ?>

                        <div class="btm-30">
                            <h5> <?php echo e(__('Google Meetings')); ?></h5>
                            <div class="faq-block">
                                <div class="faq-dtl">
                                    <div id="accordion" class="second-accordion">
                                    <?php $__currentLoopData = $googlemeetmeetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="card btm-10">
                                        <div class="card-header" id="headingFour<?php echo e($meeting->id); ?>">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour<?php echo e($meeting->id); ?>" aria-expanded="false" aria-controls="collapseFour">

                                                    <?php echo e($meeting['meeting_title']); ?>


                                                </button>
                                            </div>

                                        </div>
                                        <div id="collapseFour<?php echo e($meeting->id); ?>" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">

                                        <div class="card-body">
                                            <table class="table">
                                            <tbody>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="about"><?php echo e(__('Created')); ?>: <?php if(isset($meeting->user)): ?> <?php echo e($meeting->user['fname']); ?> <?php echo e($meeting->user['lname']); ?> <?php endif; ?> </a>

                                                        </li>
                                                        <li>
                                                           <p>Meeting Owner: <?php echo e($meeting->owner_id); ?></p>
                                                        </li>
                                                        <li>
                                                           <p class="btm-10"><a herf="#"><?php echo e(__('Start At')); ?>: <?php echo e(date('d-m-Y | h:i:s A',strtotime($meeting['start_time']))); ?></a></p>
                                                        </li>
                                                        <li>
                                                             <a href="<?php echo e($meeting->meet_url); ?>" target="_blank" class="btn btn-light"><?php echo e(__('Join Meeting')); ?></a>
                                                        </li>
                                                    </ul>

                                                </td>
                                            </tbody>
                                            </table>
                                        </div>
                                       </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                       
                        <?php if($gsetting->jitsimeet_enable == '1'): ?>
                        <?php if( ! $jitsimeetings->isEmpty() ): ?>
                        <div class="btm-30">
                            <h5> <?php echo e(__('Jitsi Meetings')); ?></h5>
                            <div class="faq-block">
                                <div class="faq-dtl">
                                    <div id="accordion" class="second-accordion">


                                    <?php $__currentLoopData = $jitsimeetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="card btm-10">
                                        <div class="card-header" id="headingFour<?php echo e($meeting->id); ?>">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour<?php echo e($meeting->id); ?>" aria-expanded="false" aria-controls="collapseFour">

                                                    <?php echo e($meeting['meeting_title']); ?>


                                                </button>
                                            </div>

                                        </div>
                                        <div id="collapseFour<?php echo e($meeting->id); ?>" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">

                                        <div class="card-body">
                                            <table class="table">
                                            <tbody>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="about"><?php echo e(__('Created')); ?>: <?php if(isset($meeting->user)): ?> <?php echo e($meeting->user['fname']); ?> <?php echo e($meeting->user['lname']); ?> <?php endif; ?> </a>

                                                        </li>
                                                        <li>
                                                           <p><?php echo e(__('Meeting Owner')); ?>: <?php echo e($meeting->owner_id); ?></p>
                                                        </li>
                                                        <li>
                                                           <p class="btm-10"><a herf="#"><?php echo e(__('Start At')); ?>: <?php echo e(date('d-m-Y | h:i:s A',strtotime($meeting['start_time']))); ?></a></p>
                                                        </li>
                                                        <li>
                                                             <a href="<?php echo e(url('meetup-conferencing/'.$meeting->meeting_id)); ?>" target="_blank" class="btn btn-light"><?php echo e(__('Join Meeting')); ?></a>
                                                        </li>
                                                    </ul>

                                                </td>
                                            </tbody>
                                            </table>
                                        </div>
                                       </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                     

                        <?php endif; ?>

                        <?php endif; ?>
                   
                    </div>
                        
                   
                </div>

                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="learning-contact-block">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-search-block btm-40">
                                    <div class="learning-contact-search">
                                        <?php if($coursequestions->isEmpty()): ?>
                                            <h4 class="question-text"><?php echo e(__('No')); ?> <?php echo e(__('Recent Questions')); ?></h4>
                                        <?php else: ?>
                                            <h4 class="question-text">
                                            <?php
                                                $quess = App\Question::where('course_id', $course->id)->count();
                                                if($quess>0){

                                                    echo $quess;
                                                }
                                                else{

                                                    echo "0";
                                                }
                                            ?>
                                            <?php echo e(__('questions in this course')); ?></h4>
                                        <?php endif; ?>
                                        
                                    </div>
                                    <div class="learning-contact-btn">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><?php echo e(__('Ask a new question')); ?>

                                        </button>

                                        <!--Model start-->
                                        <div id="myModal" class="modal fade" role="dialog">
                                          <div class="modal-dialog modal-lg">
                                          

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h4 class="modal-title"><?php echo e(__('Ask a new question')); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              </div>

                                              <div class="modal-body">
                                                
                                                <form id="demo-form2" method="post" action="<?php echo e(url('addquestion', $course->id)); ?>"
                                                    data-parsley-validate class="form-horizontal form-label-left">
                                                    <?php echo e(csrf_field()); ?>

                                                            
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <input type="hidden" name="instructor_id" class="form-control" value="<?php echo e($course->user_id); ?>"  />
                                                        <input type="hidden" name="user_id"  value="<?php echo e(Auth::user()->id); ?>" />
                                                      </div>
                                                      <div class="col-md-6">
                                                        <input type="hidden" name="course_id"  value="<?php echo e($course->id); ?>" />
                                                        <input type="hidden" name="status"  value="1" />
                                                      </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                        <label for="detail"><?php echo e(__('Question')); ?>:<sup class="redstar">*</sup></label>
                                                        <textarea name="question" id="detail" rows="4"  class="form-control" placeholder=""></textarea>
                                                      </div>
                                                    </div>
                                                    <br>
                                                    <div class="box-footer">
                                                     <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('Submit')); ?></button>
                                                    </div>
                                                </form>
                                            </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                        <!--Model end-->
                                    </div>
                                </div>
                                
                                <div id="accordion" class="second-accordion">
                                    <?php
                                        $questions = App\Question::where('course_id', $course->id)->get();
                                    ?>
                                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($ques->status == 1): ?>
                                    <div class="card btm-10">
                                        <div class="card-header" id="headingThree<?php echo e($ques->id); ?>">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree<?php echo e($ques->id); ?>" aria-expanded="true" aria-controls="collapseThree">
                                                    <div class="learning-questions-img rgt-10"><?php echo e(str_limit($ques->user->fname, $limit = 1, $end = '')); ?><?php echo e(str_limit($ques->user->lname, $limit = 1, $end = '')); ?>

                                                    </div>
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-6 col-8">
                                                            <div class="section">
                                                                <a href="#" title="questions"><?php echo e($ques->user->fname); ?> </a> 
                                                                <a href="#" title="questions"><?php echo e(date('jS F Y', strtotime($ques->created_at))); ?></a>
                                                                <div class="author-tag">
                                                                    <?php echo e($ques->user->role); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="col-lg-5 col-3">
                                                            <div class="section-dividation text-right">
                                                                <?php
                                                                    $answer = App\Answer::where('question_id', $ques->id)->count();
                                                                    if($answer>0){

                                                                        echo $answer;
                                                                    }
                                                                    else{

                                                                        echo "0";
                                                                    }
                                                                ?>
                                                                <?php echo e(__('Answer')); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-1">
                                                            <div class="question-report txt-rgt">
                                                                 <a href="#" data-toggle="modal" data-target="#myModalquesReport<?php echo e($ques->id); ?>" title="response"><i class="fa fa-flag" aria-hidden="true"></i></a>
                                                            </div>
                                                            
                                                        </div>

                                                    </div>
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-8 col-8"> 
                                                            <div class="profile-heading profile-heading-two"><?php echo $ques->question; ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-3"> 
                                                            <div class="profile-heading txt-rgt"><a href="#" data-toggle="modal" data-target="#myModalanswer<?php echo e($ques->id); ?>" title="response"><?php echo e(__('Add Answer')); ?></a>
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                        <!--Model start-->
                                        <div class="modal fade" id="myModalanswer<?php echo e($ques->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">

                                                  <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Answer')); ?></h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="box box-primary">
                                                  <div class="panel panel-sum">
                                                    <div class="modal-body">
                                                    
                                                    <form id="demo-form2" method="post" action="<?php echo e(url('addanswer', $ques->id)); ?>"
                                                        data-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                        <input type="hidden" name="question_id"  value="<?php echo e($ques->id); ?>" />
                                                        <input type="hidden" name="instructor_id"  value="<?php echo e($course->user_id); ?>" />
                                                        <input type="hidden" name="ans_user_id"  value="<?php echo e(Auth::user()->id); ?>" />
                                                        <input type="hidden" name="ques_user_id"  value="<?php echo e($ques->user_id); ?>" />
                                                        <input type="hidden" name="course_id"  value="<?php echo e($ques->course_id); ?>" />
                                                        <input type="hidden" name="question_id"  value="<?php echo e($ques->id); ?>" />
                                                        <input type="hidden" name="status"  value="1" />       
                                                        
                                                        <div class="row">
                                                          <div class="col-md-12">
                                                            <?php echo $ques->question; ?>

                                                            <br>
                                                            <br>
                                                          </div>
                                                          <div class="col-md-12">
                                                            <label for="detail"><?php echo e(__('Answer')); ?>:<sup class="redstar">*</sup></label>
                                                            <textarea name="answer" rows="4" id="detail2" class="form-control" placeholder=""></textarea>
                                                          </div>
                                                        </div>
                                                        <br>
                                                        <div class="box-footer">
                                                         <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('Submit')); ?></button>
                                                        </div>
                                                    </form>

                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div> 
                                        </div>
                                        <!--Model close -->

                                        <!--Model start Question Report-->
                                                           
                                        <div class="modal fade" id="myModalquesReport<?php echo e($ques->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">

                                                  <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Report')); ?> <?php echo e(__('Question')); ?></h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="box box-primary">
                                                  <div class="panel panel-sum">
                                                    <div class="modal-body">
                                                    
                                                    <form id="demo-form2" method="post" action="<?php echo e(route('question.report', $ques->id)); ?>"
                                                        data-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                        <input type="hidden" name="course_id"  value="<?php echo e($course->id); ?>" />

                                                        <input type="hidden" name="question_id"  value="<?php echo e($ques->id); ?>" />
                                                                
                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title"><?php echo e(__('Title')); ?>:<sup class="redstar">*</sup></label>
                                                                <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title" value="" required>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email"><?php echo e(__('Email')); ?>:<sup class="redstar">*</sup></label>
                                                                <input type="email" class="form-control" name="email" id="title" placeholder="Please Enter Email" value="<?php echo e(Auth::user()->email); ?>" required>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="detail"><?php echo e(__('Detail')); ?>:<sup class="redstar">*</sup></label>
                                                                <textarea name="detail" rows="4" id="detail3" class="form-control" placeholder="Enter Detail"></textarea>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <br>
                                                        <div class="box-footer">
                                                            <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('Submit')); ?></button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div> 
                                        </div>
                                      
                                        <!--Model close -->

                                        
                                        <div id="collapseThree<?php echo e($ques->id); ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <?php
                                                $answers = App\Answer::where('question_id', $ques->id)->with('user')->get();
                                            ?>
                                            <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($ans->status == 1): ?>
                                            <div class="card-body">
                                                <div class="answer-block">
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-1 col-2">
                                                            <div class="learning-questions-img-two"><?php echo e(str_limit($ans->user->fname, $limit = 1, $end = '')); ?><?php echo e(str_limit($ans->user->lname, $limit = 1, $end = '')); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-11 col-10">
                                                            
                                                            <div class="section">
                                                                <a href="#" title="questions"><?php echo e($ans->user->fname); ?></a> <a href="#" title="questions"><?php echo e(date('jS F Y', strtotime($ans->created_at))); ?></a>
                                                                <div class="author-tag">
                                                                    <?php echo e($ans->user->role); ?>

                                                                </div>
                                                            </div>
                                                            <br>

                                                            <div class="section-answer">
                                                                <a href="#" title="Course"><?php echo $ans->answer; ?></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-announcement" role="tabpanel" aria-labelledby="nav-announcement-tab">
                    <?php if($announsments->isEmpty()): ?>
                        <div class="learning-announcement-null text-center">
                            <div class="offset-lg-2 col-lg-8">
                                <h1><?php echo e(__('No announcements')); ?></h1>
                                <p><?php echo e(__('No announcement detail')); ?></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="learning-announcement text-center">
                            <div class="col-lg-12">
                                <div id="accordion" class="second-accordion">
                                    
                                    <?php $__currentLoopData = $announsments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announsment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($announsment->status == 1): ?>
                                    <div class="card btm-30">
                                        <div class="card-header" id="headingFive<?php echo e($announsment->id); ?>">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive<?php echo e($announsment->id); ?>" aria-expanded="true" aria-controls="collapseFive">
                                                    <div class="learning-questions-img rgt-20"><?php echo e(str_limit($announsment->user->fname, $limit = 1, $end = '')); ?><?php echo e(str_limit($announsment->user->lname, $limit = 1, $end = '')); ?>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="section"><a href="#" title="questions"><?php echo e($announsment->user->fname); ?> <?php echo e($announsment->user->lname); ?></a> <a href="#" title="questions"><?php echo e(date('jS F Y', strtotime($announsment->created_at))); ?></a></div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="section-dividation text-right">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-9 offset-sm-0 col-sm-12 offset-md-0 col-md-12"> 
                                                            <div class="profile-heading profile-heading-one">
                                                                <?php echo e(__('Announcements')); ?>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="collapseFive<?php echo e($announsment->id); ?>" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                            <div class="card-body">
                                                <p><?php echo $announsment->announsment; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="tab-pane fade" id="nav-quiz" role="tabpanel" aria-labelledby="nav-quiz-tab">
                    <div class="container-xl">
                        <div class="quiz-main-block">

                          <h5><?php echo e(__('Objective')); ?></h5>
                          <div class="row">
                            <?php 
                                $topics = App\QuizTopic::where('course_id', $course->id)->where('type', NULL)->get();
                            ?>
                            
                            <?php if(count($topics)>0 ): ?>
                              <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($topic->status == 1): ?>

                                <?php if(Auth::User()->role == 'instructor' || Auth::User()->role == 'user'): ?>
                                <?php 
                                    $order = App\Order::where('course_id', $course->id)->where('user_id', '=', Auth::user()->id)->first();

                                    $days = $topic->due_days;
                                    $orderDate = optional($order)['created_at'];
                                    

                                    $bundle = App\Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

                                        $course_id = array();

                                        // foreach($bundle as $b)
                                        // {
                                        //    $bundle = App\BundleCourse::where('id', $b->bundle_id)->first();
                                        //     array_push($course_id, $bundle->course_id);
                                        // }

                                        $course_id = array_values(array_filter($course_id));
                                        $course_id = array_flatten($course_id);

                                        if($orderDate != NULL){
                                            $startDate = date("Y-m-d", strtotime("$orderDate +$days days"));
                                        }
                                        elseif(isset($course_id) && in_array($course->id, $course_id)){
                                            $startDate = date("Y-m-d", strtotime("$bundle->created_at +$days days"));
                                        }
                                        else{
                                            $startDate = '0';
                                        }
                                ?>

                                <?php else: ?>

                                <?php 
                                    
                                    $startDate = '0';
                                ?>
                                <?php endif; ?>


                                <?php
                                    $mytime = Carbon\Carbon::now();
                                ?>

                               
                               
                                <?php if($mytime >= $startDate): ?>
                              
                                <div class="col-md-6 col-lg-4">
                                  <div class="topic-block">
                                    <div class="card blue-grey darken-1">
                                      <div class="card-content dark-text">
                                        <span class="card-title"><?php echo e($topic->title); ?></span>
                                        <p title="<?php echo e($topic->description); ?>"><?php echo e(str_limit($topic->description, 120)); ?></p>
                                        <div class="row">
                                          <div class="col-lg-6 col-7">
                                            <ul class="topic-detail one-topic-detail">
                                              <li><?php echo e(__('Per Question Mark')); ?><i class="fa fa-long-arrow-right"></i></li>
                                              <li><?php echo e(__('Total Marks')); ?><i class="fa fa-long-arrow-right"></i></li>
                                              <li><?php echo e(__('Total Questions')); ?><i class="fa fa-long-arrow-right"></i></li>
                                              <li><?php echo e(__('Quiz Price')); ?><i class="fa fa-long-arrow-right"></i></li>
                                            </ul>
                                          </div>
                                          <div class="col-lg-6 col-5">
                                            <ul class="topic-detail two-topic-detail">
                                              <li><?php echo e($topic->per_q_mark); ?></li>
                                              <li>
                                                <?php
                                                    $qu_count = 0;
                                                    $quizz = App\Quiz::get();
                                                ?>
                                                <?php $__currentLoopData = $quizz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php if($quiz->topic_id == $topic->id): ?>
                                                    <?php 
                                                      $qu_count++;
                                                    ?>
                                                  <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($topic->per_q_mark*$qu_count); ?>

                                              </li>
                                              <li>
                                                <?php echo e($qu_count); ?>

                                              </li>
                                              
                                              <li>
                                                <?php echo e(__('Free')); ?>

                                              </li>

                                            </ul>
                                          </div>
                                        </div>
                                      </div>


                                   <div class="card-action text-center">

                                      <?php
                                        $users =  App\QuizAnswer::where('topic_id',$topic->id)->where('user_id',Auth::user()->id)->first();
                                        $quiz_question =  App\Quiz::where('course_id',$course->id)->get();

                                      ?>
                                      <?php if(empty($users)): ?>
                                        <?php if($quiz_question != null || $quiz_question!= ''): ?>
                                         
                                            <a href="<?php echo e(route('start_quiz', ['id' => $topic->id])); ?>" class="btn btn-block" title="Start Quiz"> <?php echo e(__('Start Quiz')); ?></a>
                                        
                                        <?php endif; ?>
                                      <?php else: ?>
                                         <a href="<?php echo e(route('start.quiz.show',$topic->id)); ?>" class="btn btn-block"><?php echo e(__('Show Quiz Report')); ?> </a>
                                       
                                        <?php if($topic->quiz_again == '1'): ?>
                                         <a href="<?php echo e(route('tryagain',$topic->id)); ?>" class="btn btn-block"><?php echo e(__('Try Again')); ?> </a>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                        
                                      </div>
                                    
                                    </div>
                                  </div>
                                </div>

                                <?php endif; ?>

                               
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                
                                <div class="learning-quiz-null text-center">
                                    <div class="col-lg-12">
                                        <h1><?php echo e(__('No quiz')); ?></h1>
                                        <p><?php echo e(__('No quizs detail')); ?></p>
                                    </div>
                                </div> 
                            <?php endif; ?>
                          </div>
                          <h5><?php echo e(__('Subjective')); ?></h5>
                          <div class="row">
                            <?php 
                                $topics = App\QuizTopic::where('course_id', $course->id)->where('type', '1')->get();
                            ?>
                            <?php if(count($topics)>0 ): ?>
                              <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($topic->status == 1): ?>

                                <?php if(Auth::User()->role == 'instructor' || Auth::User()->role == 'user'): ?>
                                <?php 
                                    $order = App\Order::where('course_id', $course->id)->where('user_id', '=', Auth::user()->id)->first();

                                    $days = $topic->due_days;
                                    $orderDate = optional($order)['created_at'];

                                    $bundle = App\Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

                                        $course_id = array();

                                        // foreach($bundle as $b)
                                        // {
                                        //    $bundle = App\BundleCourse::where('id', $b->bundle_id)->first();
                                        //     array_push($course_id, $bundle->course_id);
                                        // }

                                        $course_id = array_values(array_filter($course_id));
                                        $course_id = array_flatten($course_id);

                                        if($orderDate != NULL){
                                            $startDate = date("Y-m-d", strtotime("$orderDate +$days days"));
                                        }
                                        elseif(isset($course_id) && in_array($course->id, $course_id)){
                                            $startDate = date("Y-m-d", strtotime("$bundle->created_at +$days days"));
                                        }
                                        else
                                        {
                                            $startDate = NULL;
                                        }
                                ?>

                                <?php else: ?>

                                <?php 
                                    
                                    $startDate = '0';
                                ?>
                                <?php endif; ?>


                                <?php
                                    $mytime = Carbon\Carbon::now();
                                ?>

                               
                               
                                <?php if($mytime >= $startDate): ?>
                              
                                <div class="col-md-6 col-lg-4">
                                  <div class="topic-block">
                                    <div class="card blue-grey darken-1">
                                      <div class="card-content dark-text">
                                        <span class="card-title"><?php echo e($topic->title); ?></span>
                                        <p title="<?php echo e($topic->description); ?>"><?php echo e(str_limit($topic->description, 120)); ?></p>
                                        <div class="row">
                                          <div class="col-lg-6 col-7">
                                            <ul class="topic-detail one-topic-detail">
                                              <li><?php echo e(__('Per Question Mark')); ?><i class="fa fa-long-arrow-right"></i></li>
                                              <li><?php echo e(__('Total Marks')); ?><i class="fa fa-long-arrow-right"></i></li>
                                              <li><?php echo e(__('Total Questions')); ?><i class="fa fa-long-arrow-right"></i></li>
                                              <li><?php echo e(__('Quiz Price')); ?><i class="fa fa-long-arrow-right"></i></li>
                                            </ul>
                                          </div>
                                          <div class="col-lg-6 col-5">
                                            <ul class="topic-detail two-topic-detail">
                                              <li><?php echo e($topic->per_q_mark); ?></li>
                                              <li>
                                                <?php
                                                    $qu_count = 0;
                                                    $quizz = App\Quiz::get();
                                                ?>
                                                <?php $__currentLoopData = $quizz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php if($quiz->topic_id == $topic->id): ?>
                                                    <?php 
                                                      $qu_count++;
                                                    ?>
                                                  <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($topic->per_q_mark*$qu_count); ?>

                                              </li>
                                              <li>
                                                <?php echo e($qu_count); ?>

                                              </li>
                                              
                                              <li>
                                                <?php echo e(__('Free')); ?>

                                              </li>

                                            </ul>
                                          </div>
                                        </div>
                                      </div>


                                   <div class="card-action text-center">

                                      <?php
                                        $users =  App\QuizAnswer::where('topic_id',$topic->id)->where('user_id',Auth::user()->id)->first();
                                        $quiz_question =  App\Quiz::where('course_id',$course->id)->get();

                                      ?>
                                      <?php if(empty($users)): ?>
                                        <?php if($quiz_question != null || $quiz_question!= ''): ?>
                                         
                                            <a href="<?php echo e(route('sub_start_quiz', ['id' => $topic->id])); ?>" class="btn btn-block" title="Start Quiz"> <?php echo e(__('Start Quiz')); ?></a>
                                        
                                        <?php endif; ?>
                                      <?php else: ?>
                                         <a href="<?php echo e(route('sub.start.quiz.show',$topic->id)); ?>" class="btn btn-block"><?php echo e(__('Show Quiz Report')); ?> </a>
                                       
                                        <?php if($topic->quiz_again == '1'): ?>
                                         <a href="<?php echo e(route('sub.tryagain',$topic->id)); ?>" class="btn btn-block"><?php echo e(__('Try Again')); ?> </a>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                        
                                      </div>
                                    
                                    </div>
                                  </div>
                                </div>

                                <?php endif; ?>

                               
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                
                                <div class="learning-quiz-null text-center">
                                    <div class="col-lg-12">
                                        <h1><?php echo e(__('No quiz')); ?></h1>
                                        <p><?php echo e(__('No quiz detail')); ?></p>
                                    </div>
                                </div> 
                            <?php endif; ?>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-assign" role="tabpanel" aria-labelledby="nav-assign-tab">
                    <div class="container-xl">
                        <div class="assignment-main-block">
                            <h3><?php echo e(__('Your Assignments')); ?></h3>
                          <div class="row">

                            <div class="col-md-8">

                                <div class="row">
                                <?php $__currentLoopData = $assignment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-12">
                                        <div class="assignment-tab-block">
                                            <div class="categories-block assign-tab-one text-center">

                                                <table>
                                                    <td>
                                                        <div class="row">

                                                        <div class="col-lg-6 col-md-6">
                                                        <?php if($assign->type == 1): ?>
                                                         <a href="" data-toggle="tooltip" data-placement="top" title="<?php echo e($assign->rating); ?>/10 scores"><i data-feather="check-circle" title="Approved"></i></a>
                                                        <?php else: ?>
                                                        <i data-feather="x-circle" title="Pending"></i>
                                                        <?php endif; ?>
                                                        <span><?php echo e(__('Title')); ?>:<?php echo e($assign->title); ?></span>
                                                        </div>
                                                         <div class="col-lg-6 col-md-6">
                                                            <div class="assignment-delete-block text-right">

                                                            <a href="<?php echo e(asset('files/assignment/'.$assign->assignment)); ?>" download="<?php echo e($assign->assignment); ?>" title="<?php echo e(__('Download')); ?>"> <i data-feather="download"></i></a>
                                                            
                                                            <form  method="post" action="<?php echo e(url('assignment/delete/'.$assign->id)); ?>" ata-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                                <button  type="submit" class="assign-remove-btn display-inline" title="<?php echo e(__('Delete')); ?>"> <i data-feather="trash-2"></i></button>
                                                              </form>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    </td>
                                                
                                              
                                                </table>
                                               
                                            </div>
                                        </div>
                                    </div>
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                
                                <div class="contact-search-block btm-40">
                                    
                                    <div class="udemy-contact-btn text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignmodel"><?php echo e(__('Submit Assignment')); ?>

                                        </button>
                                    </div>



                                    <div class="modal fade" id="assignmodel" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Submit Assignment')); ?></h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="box box-primary">
                                              <div class="panel panel-sum">
                                                <div class="modal-body">
                                                    <form id="demo-form2" method="post" action="<?php echo e(route('assignment.submit', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                        <?php echo e(csrf_field()); ?>


                                                        <input type="hidden" name="user_id"  value="<?php echo e(Auth::user()->id); ?>" />

                                                        <input type="hidden" name="instructor_id"  value="<?php echo e($course->user_id); ?>" />
                                                                
                                                        <div class="row">
                                                          <div class="col-md-12">

                                                            <div class="form-group">
                                                                <label for="exampleInputDetails"><?php echo e(__('Chapter Name')); ?>:<sup class="redstar">*</sup></label>
                                                                <select style="width: 100%" name="course_chapters" class="form-control js-example-basic-single" required>
                                                                <option value="none" selected disabled hidden> 
                                                                  <?php echo e(__('Select Chapter')); ?>

                                                                </option>
                                                                  <?php $__currentLoopData = $course->chapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  <option value="<?php echo e($c->id); ?>"><?php echo e($c->chapter_name); ?></option>
                                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title"><?php echo e(__('Title')); ?>:<sup class="redstar">*</sup></label>
                                                                <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title" value="" required>
                                                            </div>
                                                                
                                                            <div class="form-group">
                                                                
                                                                <div class="wrapper">
                                                                   <label for="detail"><?php echo e(__('Assignment Upload')); ?>:<sup class="redstar">*</sup></label> 
                                                                  <div class="file-upload">
                                                                    <input type="file" name="assignment" class="form-control" />
                                                                    <i class="fa fa-arrow-up"></i>
                                                                  </div>
                                                                </div>
                                                            </div> 
                                                            
                                                          </div>
                                                          
                                                        </div>
                                                        
                                                        <hr>
                                                        <div class="box-footer text-center">
                                                         <button type="submit" class="btn btn-sm btn-primary"><?php echo e(__('Submit')); ?></button>
                                                        </div>
                                                    </form>
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
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-appoint" role="tabpanel" aria-labelledby="nav-appoint-tab">
                    <div class="container-xl">
                        <div class="appointment-main-block">
                            <h3><?php echo e(__('Your Appointment')); ?></h3>
                          <div class="row">

                            <div class="col-md-8">
                                <?php $__currentLoopData = $appointment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-12">
                                        <div class="assignment-tab-block">
                                            <div class="categories-block assign-tab-one text-center">
                                                <ul>
                                                    <li class="btm-5"><span><?php echo e($appoint->title); ?></span></li>
                                                    <li class="btm-5"><span><?php echo $appoint->detail; ?></span></li>
                                                    <li>
                                                   
                                                        <form  method="post" action="<?php echo e(url('appointment/delete/'.$appoint->id)); ?>" ata-parsley-validate class="form-horizontal form-label-left">
                                                        <?php echo e(csrf_field()); ?>


                                                        <button  type="submit" class="cart-remove-btn display-inline" title="<?php echo e(__('Remove From cart')); ?>"> <?php echo e(__('Delete')); ?></button>
                                                      </form>

                                                    </li>
                                                    <?php if($appoint->accept == 1): ?>
                                                    <li><a href="" data-toggle="modal" data-target="#myModalresponse" title="response"><?php echo e(__('Response')); ?></a></li>

                                                    <div class="modal fade" id="myModalresponse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header">

                                                              <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Response')); ?></h4>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="box box-primary">
                                                              <div class="panel panel-sum">
                                                                <div class="modal-body">
                                                                  <div class="instructor-detail">
                                                                    <ul>
                                                                        <li>

                                                                            <div class="instructor-img btm-30">
                                                                                <?php if($appoint->user->user_img != null || $appoint->user->user_img !=''): ?>
                                                                                <a href="<?php echo e(route('instructor.profile',  ['id' => $course->user->id, 'name' => $fullname])); ?>" title="instructor"><img src="<?php echo e(asset('images/user_img/'.$appoint->instructor->user_img)); ?>" width="100px" height="100px" class="img-fluid img-circle"/></a>
                                                                                <?php else: ?>

                                                                                <a href="<?php echo e(route('instructor.profile',  ['id' => $course->user->id, 'name' => $fullname])); ?>" title="instructor"><img src="<?php echo e(asset('images/default/user.jpg')); ?>" width="100px" height="100px" class="img-fluid img-circle"/></a>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <?php echo e(__('Instructor')); ?>: <?php echo e($appoint->instructor->fname); ?> <?php echo e($appoint->instructor->lname); ?>

                                                                        </li>
                                                                        <li>
                                                                            <?php echo e(__('Email')); ?>: <?php echo e($appoint->instructor->email); ?>

                                                                        </li>
                                                                        <li>
                                                                            <?php echo e(__('Response')); ?>: <?php echo $appoint->reply; ?>

                                                                        </li>

                                                                    </ul>
                                                                  </div>
                                                                
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div> 
                                                    </div>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="contact-search-block btm-40">
                                    <div class="udemy-contact-btn text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#appointmodel"><?php echo e(__('Request Appointment')); ?>

                                        </button>
                                    </div>
                                    <div class="modal fade" id="appointmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Request Appointment')); ?></h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="box box-primary">
                                              <div class="panel panel-sum">
                                                <div class="modal-body">
                                                    <form id="demo-form2" method="post" action="<?php echo e(route('appointment.request', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                        <?php echo e(csrf_field()); ?>


                                                        <input type="hidden" name="user_id"  value="<?php echo e(Auth::user()->id); ?>" />

                                                        <input type="hidden" name="instructor_id"  value="<?php echo e($course->user_id); ?>" />
                                                        
                                                        
                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title"><?php echo e(__('User')); ?>:<sup class="redstar">*</sup></label>
                                                                <input type="text" name="fname" value="<?php echo e(Auth::user()->email); ?>" class="form-control" disabled />
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title"><?php echo e(__('Instructor')); ?>:<sup class="redstar">*</sup></label>
                                                                <input type="text" name="instructor" value="<?php echo e($course->user->email); ?>" class="form-control" disabled/>
                                                            </div>
                                                          </div>
                                                        </div>

                                                        
                                                                
                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title"><?php echo e(__('Title')); ?>:<sup class="redstar">*</sup></label>
                                                                <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title" value="">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title"><?php echo e(__('Date')); ?>:<sup class="redstar">*</sup></label>
                                                                <input type="datetime-local" class="form-control" id="date_time" name="date_time" placeholder="Please Enter Title" value="">
                                                            </div>
                                                          </div>
                                                        </div>

                                                        <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="detail"><?php echo e(__('Detail')); ?>:<sup class="redstar">*</sup></label>
                                                                <textarea id="detail" name="detail" class="form-control" placeholder="Enter your details" value=""></textarea>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        
                                                        <hr>
                                                        <div class="box-footer">
                                                         <button type="submit" class="btn btn-sm btn-primary"><?php echo e(__('Submit')); ?></button>
                                                        </div>
                                                    </form>
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
                    </div>
                </div>

                <?php if(count($papers) > 0): ?>

                <div class="tab-pane fade" id="nav-paper" role="tabpanel" aria-labelledby="nav-paper-tab">
                    
                    <div class="assignment-main-block">
                        <h3><?php echo e(__('AllPapers')); ?></h3>
                      <div class="row">

                        <div class="col-md-12">

                            <div class="row">
                            <?php $__currentLoopData = $papers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($paper->status == 1): ?>
                                <div class="col-md-12">
                                    <div class="assignment-tab-block">
                                        <div class="categories-block assign-tab-one text-center">

                                            <table>
                                                <td>
                                                    <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="koh-tab-content">
                                                          <div class="koh-tab-content-body">
                                                            <div class="koh-faq">
                                                              <div class="koh-faq-question">

                                                                <i class="far fa-check-circle" title="pending"></i>

                                                                <span class="koh-faq-question-span"><?php echo e(__('Title')); ?>:<?php echo e($paper->title); ?></span>

                                                                <?php if($paper->detail != NULL): ?>
                                                                    <i class="fa fa-sort-down" aria-hidden="true"></i>
                                                                <?php endif; ?>
                                                              </div>
                                                              <div class="koh-faq-answer">
                                                                <?php echo $paper->detail; ?>

                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>

                                                    </div>


                                                     <div class="col-md-6">
                                                        <div class="assignment-delete-block text-right">

                                                        <a href="<?php echo e(asset('files/papers/'.$paper->file)); ?>" download="<?php echo e($paper->file); ?>" title="<?php echo e(__('Download')); ?>"> <i class="fa fa-download"></i></a>
                                                        
                                                    </div>
                                                </div>
                                                </td>
                                            </table>
                                           
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        

                      </div>
                    </div>
                    
                </div>

                <?php endif; ?>

                <?php if(Module::has('Homework') && Module::find('Homework')->isEnabled()): ?>
                    <?php echo $__env->make('homework::front.homework_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
                
            
    </div>
</section>
<!-- courses-content end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<!-- iframe script -->
<script>

// Example of using an event listener and public method to build a primitive slideshow:
$(document).bind('cbox_closed', function(){

  setTimeout($.colorbox.close, 1);
  
  $.ajax({

        type : 'GET',
        data : {userid : '<?php echo e(Auth::user()->id); ?>', chapterid : '<?php echo e($course->id); ?>'},
        url  : "<?php echo e(url('activestatus')); ?>",
        success : function(data){
            console.log(data);

            if(data.code == 200){
                console.log(data.msg);
            }else{
                console.log(data.msg);
            }

        }

  });

});
</script>



<script>

(function($) {
  "use strict";
  $(document).ready(function(){

    $(".group1").colorbox({rel:'group1'});
    $(".group2").colorbox({rel:'group2', transition:"fade"});
    $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
    $(".group4").colorbox({rel:'group4', slideshow:true});
    $(".ajax").colorbox();
    $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
    $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
    $(".iframe").colorbox({iframe:true, width:"100%", height:"100%"});
    $(".inline").colorbox({inline:true, width:"50%"});
    $(".callbacks").colorbox({
      onOpen:function(){ alert('onOpen: colorbox is about to open'); },
      onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
      onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
      onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
      onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
    });

    $('.non-retina').colorbox({rel:'group5', transition:'none'})
    $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});


    
    
    $("#click").click(function(){ 
      $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
      return false;
    });
  });
})(jQuery);

</script>



<!-- script to remain on active tab -->
<script>
(function($) {
  "use strict";
      $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#nav-tab a[href="' + activeTab + '"]').tab('show');
        }
      });
})(jQuery);
</script>
<!-- link for another tab -->
<script>
(function($) {
  "use strict";
    $("#goTab4").click(function(){
        $("#nav-tab a:nth-child(4)").click();
        return false;
    });

    $("#goTab5").click(function(){
        $("#nav-tab a:nth-child(5)").click();
        return false;
    });
})(jQuery);    
</script>

<script type="text/javascript">
    $('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});
</script>

<script>
(function($) {
  "use strict";
    tinymce.init({selector:'textarea#detail, textarea#detail2, textarea#detail3'});
})(jQuery);
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(this).on("click", ".koh-faq-question", function() {
        $(this).parent().find(".koh-faq-answer").toggle();
        $(this).find(".fa").toggleClass('active');
    });
});
</script>
<script>
    function set_goal_date(params) {
        
        var idclass = '.chapter_id'+params;
        var dateclass = '.date'+params;
        var current_dateclass = '.current_date'+params;
       var id = $(idclass).val();
       var date = $(dateclass).val();
       var current_date = $(current_dateclass).val();

       if (date < current_date) {
            alert("Date must be in the future");
        } else {
            if(id && date){
            $.ajax({

                type : 'GET',
                data : {chapter_id : id, date : date},
                url  : "<?php echo e(url('set/goal/date')); ?>",
                success : function(data){
                    location.reload();
                    // console.log(data)
                }

                });
            }
        }
    }
</script>

<?php $__env->stopSection(); ?>


<style>
    .hidden {position:absolute;visibility:hidden;opacity:0;}
    input[type=checkbox] + label {
      color: #ccc;
      font-style: italic;
    } 
    input[type=checkbox]:checked + label {
      color: #f00;
      font-style: normal;
    }

</style>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass\resources\views/front/course_content.blade.php ENDPATH**/ ?>
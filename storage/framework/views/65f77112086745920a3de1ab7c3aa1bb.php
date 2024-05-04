
<?php $__env->startSection('title', "$bundle->title"); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startSection('meta_tags'); ?>

<?php
    $url =  URL::current();
?>

<meta name="title" content="<?php echo e($bundle['title']); ?>">
<meta name="description" content="<?php echo e($bundle['short_detail']); ?> ">
<meta name="author" content="elsecolor">
<meta property="og:title" content="<?php echo e($bundle['title']); ?> ">
<meta property="og:url" content="<?php echo e($url); ?>">
<meta property="og:description" content="<?php echo e($bundle['short_detail']); ?>">
<meta property="og:image" content="<?php echo e(asset('images/bundle/'.$bundle['preview_image'])); ?>">
<meta itemprop="image" content="<?php echo e(asset('images/bundle/'.$bundle['preview_image'])); ?>">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?php echo e(asset('images/bundle/'.$bundle['preview_image'])); ?>">
<meta property="twitter:title" content="<?php echo e($bundle['title']); ?> ">
<meta property="twitter:description" content="<?php echo e($bundle['short_detail']); ?>">
<meta name="twitter:site" content="<?php echo e(url()->full()); ?>" />
<link rel="canonical" href="<?php echo e(url()->full()); ?>"/>
<meta name="robots" content="all">
<meta name="keywords" content="<?php echo e($gsetting->meta_data_keyword); ?>">
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- course detail header start -->
<section id="about-home" class="about-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="about-home-block text-white">
                    <h1 class="about-home-heading text-white"><?php echo e($bundle['title']); ?></h1>
                    <p><?php echo e($bundle['short_detail']); ?></p>
                    <ul>

                        <ul>
                            <li><a href="#" title="about"><?php echo e(__('Created')); ?>:
                                    <?php echo e($bundle->user['fname']); ?> </a></li>
                            <li><a href="#" title="about"><?php echo e(__('Last Updated')); ?>:
                                    <?php echo e(date('jS F Y', strtotime($bundle['updated_at']))); ?></a></li>

                        </ul>
                </div>
            </div>
            <!-- course preview -->
            <div class="col-lg-4 col-md-4">


                <div class="about-home-product">
                    <div class="video-item hidden-xs">

                        <div class="video-device">
                            <?php if($bundle['preview_image'] !== null && $bundle['preview_image'] !== ''): ?>
                                <img src="<?php echo e(asset('images/bundle/' . $bundle['preview_image'])); ?>"
                                    class="bg_img img-fluid" alt="Background">
                            <?php else: ?>
                                <img src="<?php echo e(Avatar::create($bundle->title)->toBase64()); ?>" class="bg_img img-fluid"
                                    alt="Background">
                            <?php endif; ?>

                        </div>
                    </div>


                    <div class="about-home-dtl-training">
                        <div class="about-home-dtl-block btm-10">
                            <?php if($bundle->type == 1): ?>
                                <?php if($bundle->is_subscription_enabled == 1): ?>
                                    <div class="about-home-rate">
                                        <ul>
                                            
                                            <?php if($bundle->discount_price == !null): ?>
                                            <li><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($bundle->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?>/<?php echo e($bundle->billing_interval); ?></li>


                                                <li><span><s><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($bundle->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?>/<?php echo e($bundle->billing_interval); ?></s></span></li>
                                                
                                            <?php else: ?>
                                                
                                            <li><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($bundle->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?>/<?php echo e($bundle->billing_interval); ?></li>
                                                
                                            <?php endif; ?>

                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div class="about-home-rate">
                                        <ul>
                                           
                                            <?php if($bundle->discount_price == !null): ?>
                                                
                                            <li><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($bundle->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?>/<?php echo e($bundle->billing_interval); ?></li>


                                            <li><span><s><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($bundle->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?>/<?php echo e($bundle->billing_interval); ?></s></span></li>
                                               
                                            <?php else: ?>
                                                
                                            <li><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($bundle->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?>/<?php echo e($bundle->billing_interval); ?></li>
                                               
                                            <?php endif; ?>

                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php if(Auth::check()): ?>
                                    <?php if(Auth::User()->role == 'admin'): ?>
                                        <div class="about-home-btn btm-20">
                                            <a href="" class="btn btn-secondary"
                                                title="course"><?php echo e(__('Purchased')); ?></a>
                                        </div>
                                    <?php else: ?>


                                        <?php
                                        $order = App\Order::where('user_id', Auth::User()->id)->where('bundle_id',
                                        $bundle->id)->first();
                                        ?>



                                        <?php if(!empty($order) && $order->status == 1): ?>

                                            <div class="about-home-btn btm-20">
                                                <a href="" class="btn btn-secondary"
                                                    title="course"><?php echo e(__('Purchased')); ?></a>
                                            </div>

                                        <?php else: ?>
                                            <?php
                                            $cart = App\Cart::where('user_id', Auth::User()->id)->where('bundle_id',
                                            $bundle->id)->first();
                                            ?>
                                            <?php if(!empty($cart)): ?>
                                                <div class="about-home-btn btm-20">
                                                    <form id="demo-form2" method="post"
                                                        action="<?php echo e(route('remove.item.cart', $cart->id)); ?>">
                                                        <?php echo e(csrf_field()); ?>


                                                        <div class="box-footer">
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fa fa-shopping-cart"
                                                                    aria-hidden="true"></i>&nbsp;<?php echo e(__('Remove From Cart')); ?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php else: ?>
                                                <div class="about-home-btn btm-20">
                                                    <form id="demo-form2" method="post"
                                                        action="<?php echo e(route('bundlecart', $bundle->id)); ?>"
                                                        data-parsley-validate class="form-horizontal form-label-left">
                                                        <?php echo e(csrf_field()); ?>


                                                        <div class="box-footer">
                                                            <?php if($bundle->is_subscription_enabled == 1): ?>
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-cart-plus"
                                                                        aria-hidden="true"></i>&nbsp;<?php echo e(__('Subscribe Now')); ?></button>
                                                            <?php else: ?>
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-cart-plus"
                                                                        aria-hidden="true"></i>&nbsp;<?php echo e(__('Add To Cart')); ?></button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="about-home-btn btm-20">
                                        <?php if($bundle->is_subscription_enabled == 1): ?>
                                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><i
                                                    class="fa fa-cart-plus"
                                                    aria-hidden="true"></i>&nbsp;<?php echo e(__('Subscribe Now')); ?></a>
                                        <?php else: ?>

                                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><i
                                                    class="fa fa-cart-plus"
                                                    aria-hidden="true"></i>&nbsp;<?php echo e(__('Add To Cart')); ?></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="about-home-rate">
                                    <ul>
                                        <li><?php echo e(__('Free')); ?></li>
                                    </ul>
                                </div>
                                <?php if(Auth::check()): ?>
                                    <?php if(Auth::User()->role == 'admin'): ?>
                                        <div class="about-home-btn btm-20">
                                            <a href="" class="btn btn-secondary"
                                                title="course"><?php echo e(__('Purchased')); ?></a>
                                        </div>
                                    <?php else: ?>
                                        <?php
                                        $enroll = App\Order::where('user_id', Auth::User()->id)->where('bundle_id',
                                        $bundle->id)->first();
                                        ?>
                                        <?php if($enroll == null): ?>
                                            <div class="about-home-btn btm-20">
                                                <a href="<?php echo e(url('bundle/enroll', $bundle->id)); ?>"
                                                    class="btn btn-primary"
                                                    title="Enroll Now"><?php echo e(__('Enroll Now')); ?></a>
                                            </div>
                                        <?php else: ?>
                                            <div class="about-home-btn btm-20">
                                                <a href="" class="btn btn-secondary"
                                                    title="Cart"><?php echo e(__('Purchased')); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="about-home-btn btm-20">
                                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"
                                            title="Enroll Now"><?php echo e(__('Enroll Now')); ?></a>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <hr>


                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <div class="about-home-share text-center">
                                        <a href="https://calendar.google.com/calendar/r/eventedit?text=<?php echo e($bundle['title']); ?>" target="__blank"><i data-feather="calendar"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="about-home-share text-center">
                                        <a href="#" data-toggle="modal" data-target="#myModalshare" title="share" data-dismiss="modal"><i data-feather="share"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!--Model start-->
                            <div class="modal fade" data-backdrop="" style="z-index: 1050;" id="myModalshare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">

                                      <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Share this course')); ?></h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="box box-primary">
                                      <div class="panel panel-sum">
                                        <div class="modal-body">

                                            <?php
                                            $url=  URL::current();
                                            ?>

                                            <!-- The text field -->

                                            <div class="nav-search">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="myInput"  value="<?php echo e($url); ?>">
                                                </div>
                                                <button onclick="myFunction()" class="btn btn-primary"><?php echo e(__('CopyText')); ?></button>
                                            </div>

                                            <div class="social-icon">

                                            <?php

                                            echo Share::currentPage('', [], '<div class="row">')
                                                ->facebook()
                                                ->twitter()
                                                ->linkedin('Extra linkedin summary can be passed here')
                                                ->whatsapp()
                                                ->telegram();

                                            ?>

                                            </div>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <!--Model close -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- course header end -->
<!-- course detail start -->
<section id="about-product" class="about-product-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="requirements">
                    <h3><?php echo e(__('Detail')); ?></h3>
                    <ul>
                        <li class="comment more">

                            <?php echo $bundle->detail; ?>


                        </li>

                    </ul>
                </div>

                <div class="course-content-block btm-30">
                    <h3><?php echo e(__('Courses In Bundle')); ?></h3>
                    <!-- FSMS -->

                    <div class="row" style="padding-bottom:10px">
                        <div class="col-lg-8 col-6">
                            <?php
                            // FSMS
                            function convertToHoursMins($time, $format = '%02d:%02d') {
                                if ($time < 1) {
                                    return;
                                }
                                $hours =floor($time / 60);
                                $minutes = ($time % 60);

                                return sprintf($format, $hours, $minutes);
                            }

                            $courseCount = count( $bundle['course_id'] )

                            // FSMS
                        ?>

                        <small> &nbsp; <?php echo e($courseCount . " courses"); ?></small>
                        </div>
                        <div class="col-lg-4 col-6">
                            <button type="button" onclick="toggleAllSections()" class="btn btn-link courseToggle float-right"><span
                                    style="color:#0384a3"><?php echo e(__('Expand all courses')); ?></span></button>
                            <button type="button" onclick="toggleAllSections()" class="btn btn-link courseToggle float-right"
                                style="display:none"><span style="color:#0384a3"><?php echo e(__('Collapse all')); ?>

                                        <?php echo e(__('courses')); ?></span></button>
                        </div>
                    </div>


                    <!-- FSMS -->

                    <div class="faq-block">
                        <div class="faq-dtl">
                            <div id="accordion" class="second-accordion">
                                <?php $__currentLoopData = $bundle->course_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                    $course = App\Course::where('id', $bundles)->first();
                                    ?>
                                    <?php if(isset($course)): ?>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo<?php echo e($course->id); ?>">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseTwo<?php echo e($course->id); ?>" aria-expanded="false"
                                                    aria-controls="collapseTwo">

                                                    <div class="row">
                                                        <div class="col-lg-8 col-12">
                                                            <a
                                                                href="<?php echo e(route('user.course.show', ['id' => $course->id, 'slug' => $course->slug])); ?>"><?php echo e($course->title); ?></a>
                                                        </div>

                                                    </div>

                                                </button>
                                            </div>

                                        </div>

                                        <div id="collapseTwo<?php echo e($course->id); ?>" class="collapse"
                                            aria-labelledby="headingTwo" data-parent="#accordion">

                                            <div class="card-body">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="class-icon">
                                                                <?php echo e($course->short_detail); ?>

                                                            </td>
                                                        </tr>
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
                </div>
            </div>
        </div>
    </div>
</section>


<!-- course detail end -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom-script'); ?>
    <script>
        // FSMS
        function toggleAllSections() {
            $("div[id*='collapseTwo']").collapse('toggle');
            $(".courseToggle").toggle();
        }
        // FSMS

    </script>
    
<script>
    function myFunction() {
      /* Get the text field */
      var copyText = document.getElementById("myInput");
    
      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
      /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText.value);
      
      /* Alert the copied text */
    }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass\resources\views/front/bundle_detail.blade.php ENDPATH**/ ?>
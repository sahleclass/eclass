<?php $__env->startSection('title', 'Online Courses'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('meta_tags'); ?>
<meta name="title" content="<?php echo e($gsetting['project_title']); ?>">
<meta name="description" content="<?php echo e($gsetting['meta_data_desc']); ?> ">
<meta property="og:title" content="<?php echo e($gsetting['project_title']); ?> ">
<meta property="og:asset" content="<?php echo e(url()->full()); ?>">
<meta property="og:description" content="<?php echo e($gsetting['meta_data_desc']); ?>">
<meta property="og:image" content="<?php echo e(asset('images/logo/'.$gsetting['logo'])); ?>">
<meta itemprop="image" content="<?php echo e(asset('images/logo/'.$gsetting['logo'])); ?>">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?php echo e(asset('images/logo/'.$gsetting['logo'])); ?>">
<meta property="twitter:title" content="<?php echo e($gsetting['project_title']); ?> ">
<meta property="twitter:description" content="<?php echo e($gsetting['meta_data_desc']); ?>">
<meta name="twitter:site" content="<?php echo e(url()->full()); ?>" />
<link rel="canonical" href="<?php echo e(url()->full()); ?>" />
<meta name="robots" content="all">
<meta name="keywords" content="<?php echo e($gsetting->meta_data_keyword); ?>">
<?php $__env->stopSection(); ?>
<!-- categories-tab start-->
<!-- slider-area -->
<?php if(isset($sliders)): ?>
<section id="home" class="slider-area fix p-relative">
    <div class="slider-active" style="background: #141b22;">
    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($slider->status == 1): ?>
        <div class="single-slider slider-bg" style="background-image: asset('<?php echo e(asset('images/slider/'.$slider['image'])); ?>'); background-size: cover;">
            <div class="container">
               <div class="row">
                  <div class="col-lg-7 col-md-7">
                        <div class="slider-content s-slider-content mt-130">
                            <h5 data-animation="fadeInUp" data-delay=".4s"><?php echo e($slider['heading']); ?></h5>
                            <h2 data-animation="fadeInUp" data-delay=".2s"><?php echo e($slider['sub_heading']); ?></h2>
                            <p data-animation="fadeInUp" data-delay=".6s"><?php echo e($slider['detail']); ?></p>
                            <?php if($slider->search_enable == 1): ?>
                            <div class="home-search">
                                <form method="GET" id="searchform" action="<?php echo e(route('search')); ?>">
                                    <div class="search">
                                        <input type="text" name="searchTerm" class="searchTerm"
                                            placeholder="<?php echo e(__('Search Courses')); ?>">
                                        <button type="submit" class="searchButton"><?php echo e(__('Search')); ?>

                                        </button>
                                    </div>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php endif; ?>
<!-- slider-area-end -->
<!-- service-area -->
<?php if(isset($facts)): ?>
<section class="service-details-two p-relative">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $facts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="services-box07">
                    
                    <div class="sr-contner">
                    <div class="icon">
                        <i class="fa <?php echo e($fact['icon']); ?>"></i>                       
                        </div>
                    <div class="text">
                        <h5><?php echo e($fact['heading']); ?></h5>
                        <p><?php echo e($fact['sub_heading']); ?></p>
                    </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- service-details2-area-end -->
<!-- facts-area -->
<?php if($hsetting->fact_enable == 1 && isset($factsetting)): ?>
    <section id="facts" class="fact-main-block pt-120 pb-120 p-relative fix">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $factsetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="facts-block hover-zoomin text-center">
                            <div class="facts-block-one">
                                <div class="facts-block-img">
                                    <?php
                                    $image = $factset['image'] !== NULL && $factset['image'] !== '' ? asset('/images/facts/'.$factset->image) : Avatar::create($factset->title)->toBase64();
                                    ?>
                                    <img src="<?php echo e($image); ?>" class="img-fluid" alt="" />
                                    <div class="facts-count"><?php echo e($factset->number); ?></div>
                                </div>
                                <h5 class="facts-title"><a href="#" title=""><?php echo e($factset->title); ?></a></h5>
                                <p><?php echo e($factset->description); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- facts-area-end -->
<!-- about-area -->
<?php if($hsetting->feature_enable == 1 && ! $feature->isEmpty() && isset($featuresetting) ): ?>
<section class="about-area about-p pt-120 pb-120 p-relative fix">
    <div class="animations-02">
        <img src="<?php echo e(asset('frontcss/img/bg/an-img-02.png')); ?>" alt="contact-bg-an-01">
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                    <?php if($featuresetting['image'] == !NULL): ?>
                    <img src="<?php echo e(asset('images/feature/'.$featuresetting['image'])); ?>" alt="img">
                    <?php else: ?>
                    <img src="<?php echo e(asset('images/feature/'.$featuresetting['image'])); ?>" alt="img">
                    <img src="<?php echo e(Avatar::create($featuresetting->title)->toBase64()); ?>"> 
                    <?php endif; ?>  
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="about-content s-about-content pl-15 wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                    <div class="about-title second-title pb-25">  
                            <h5><i class="fal fa-graduation-cap"></i> <?php echo e(__('About Our University')); ?></h5>
                            <h2><?php echo e($featuresetting->title); ?></h2>                                   
                    </div>
                    <p class="txt-clr"><?php echo e($featuresetting->detail); ?></p>
                    <div class="about-content2">
                    
                        <div class="row">
                        
                            <div class="col-md-12">
                                <ul class="green2">       
                                <?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                       
                                    <li><div class="abcontent"><div class="ano"><span><?php echo e($key+1); ?></span></div> <div class="text"><h3><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($data->title))) , $limit = 15, $end = '...')); ?></h3> <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($data->detail))) , $limit = 50, $end = '...')); ?></p></div></div></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            
                        </div>
                    
                    </div>
                    <div class="slider-btn mt-20">                                          
                        <a href="<?php echo e(route('about.show')); ?>" class="btn ss-btn smoth-scroll" style=""><?php echo e(__('Read More')); ?> <i class="fal fa-long-arrow-right"></i></a>				
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- about-area-end -->
<!-- recent courses-area -->
<?php if(Auth::check()): ?>
<?php if($hsetting->recentcourse_enable  == 1 && isset($categories)): ?>
<section id="learning-courses" class="learning-courses-main-block pt-120 pb-120 p-relative fix">
    <div class="animations-01"><img src="<?php echo e(asset('frontcss/img/bg/an-img-03.png')); ?>" alt="an-img-01"></div>
    <div class="container-xl">
        <div class="row">   
            <div class="col-lg-6 p-relative">
                <div class="section-title center-align mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                        <h5><i class="fal fa-graduation-cap"></i> <?php echo e(__('Recent Courses')); ?></h5>
                    <h2>
                        <?php echo e(__('Recent Courses')); ?>

                    </h2>                             
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="learning-courses">
                    <?php if(isset($categories)): ?>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="photography-tab" data-bs-toggle="tab" href="#photography" onclick="showtab('<?php echo e($cats->id); ?>')" data-bs-target="#photography" type="button" role="tab" aria-controls="photography" aria-selected="true"><?php echo e($cats['title']); ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="tab-content" id="myTabContent"> 
                    <?php if(!empty($categories)): ?>               
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade show active" id="photography" role="tabpanel" aria-labelledby="photography-tab">
                        <div id="tabShow">
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>
<!-- recent courses-area-end -->
<!-- courses-area -->
<?php if(!$cors->isEmpty()): ?>
<section class="courses pt-

120 pb-60 p-relative fix">
    <div class="animations-01"><img src="<?php echo e(asset('frontcss/img/bg/an-img-03.png')); ?>" alt="an-img-01')}}"></div>
    <div class="container">
        <div class="row">   
            <div class="col-lg-12 p-relative">
                <div class="section-title center-align mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                        <h5><i class="fal fa-graduation-cap"></i> <?php echo e(__('Our Courses')); ?></h5>
                    <h2>
                        <?php echo e(__('Our Courses')); ?>

                    </h2>                             
                </div>
            </div>
        </div>
        <div class="row class-active">  
            <?php $__currentLoopData = $cors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($c->status == 1 && $c->featured == 1): ?>   
                <div class="col-lg-4 col-md-4">
                <div class="courses-item mb-30 hover-zoomin <?php if($gsetting['course_hover'] == 1): ?> protip <?php endif; ?>">
                
                    <div class="thumb fix ">
                        <?php if($c['preview_image'] !== NULL && $c['preview_image'] !== '0'): ?>
                        <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$c['preview_image'])); ?>" alt="contact-bg-an-01"></a>
                        <?php else: ?>
                        <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(Avatar::create($c->title)->toBase64()); ?>" alt="contact-bg-an-01"></a>
                        <?php endif; ?>
                            
                        <div class="courses-icon">
                            <ul>
                                <li class="protip-wish-btn"><a
                                        href="https://calendar.google.com/calendar/r/eventedit?text=<?php echo e($c['title']); ?>"
                                        target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        <?php if(Auth::check()): ?>
                                        <li class="protip-wish-btn">
                                            <a class="compare" data-id="<?php echo e(filter_var($c->id)); ?>" title="compare">
                                                <i data-feather="bar-chart"></i>
                                            </a>
                                        </li>
                                 

                                <?php
                                $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                $c->id)->first();
                                ?>
                                <?php if($wish == NULL): ?>
                                <li class="protip-wish-btn">
                                    <form id="demo-form2" method="post"
                                        action="<?php echo e(asset('show/wishlist', $c->id)); ?>" data-parsley-validate
                                        class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>


                                        <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                        <input type="hidden" name="course_id" value="<?php echo e($c->id); ?>" />

                                        <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i
                                                data-feather="heart"></i></button>
                                    </form>
                                </li>
                                <?php else: ?>
                                <li class="protip-wish-btn-two heart-fill">
                                    <form id="demo-form2" method="post"
                                        action="<?php echo e(asset('remove/wishlist', $c->id)); ?>" data-parsley-validate
                                        class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>


                                        <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                        <input type="hidden" name="course_id" value="<?php echo e($c->id); ?>" />

                                        <button class="wishlisht-btn" title="Remove from Wishlist"
                                            type="submit"><i data-feather="heart"></i></button>
                                    </form>
                                </li>
                                <?php endif; ?>
                                <?php else: ?>
                                <li class="protip-wish-btn"><a href="<?php echo e(route('login')); ?>" title="heart"><i
                                            data-feather="heart"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <?php if(isset($c->discount_price)): ?>
                    <div class="badges bg-priamry offer-badge"><span><?php echo e(__('OFF')); ?><span><?php echo round((($c->price - $c->discount_price) * 100) / $c->price) . '%'; ?></span></span></div>
                    <?php endif; ?>
                    <?php if(isset($c->user->id)): ?>
                    <div class="courses-content">    
                        <div class="view-user-img">
                            <a href="<?php echo e(route('all/profile',$c->user->id)); ?>" title="<?php echo e(optional($c->user)['fname']); ?>">
                                <?php if($c->user['user_img'] !== NULL && $c->user['user_img'] !== ''): ?>
                                <img src="<?php echo e(asset('images/user_img/'.$c->user['user_img'])); ?>" class="img-fluid user-img-one" alt="">
                                <?php else: ?>
                                <img src="<?php echo e(Avatar::create($c->title)->toBase64()); ?>" alt="img">
                                <?php endif; ?>
                            </a>
                                                     
                        </div>                                
                        <div class="cat">
                            <div class="rate text-right">
                                <ul>
                                    <?php if($c->type == 1): ?>
                                                    <?php if($c->discount_price != NULL): ?>
                                                        <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($c['discount_price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?> <?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                                        <li><a><b><strike><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></strike></b></a></li>
                                                    <?php elseif($c->price != NULL): ?>
                                                        <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <li><a><b><?php echo e(__('Free')); ?></b></a></li>
                                                <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <h3><a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"> <?php echo e($c->category['title'] ?? '-'); ?></a></h3>
                            <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($c->detail))) , $limit = 70, $end = '...')); ?>

                        <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>" class="readmore"><?php echo e(__('Read More ')); ?><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <?php endif; ?>
                    <div class="icon">
                        <img src="<?php echo e(asset('frontcss/img/icon/cou-icon.png')); ?>" alt="img">
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- courses-area-end -->
<?php if(isset($subscriptionBundles) && !$subscriptionBundles->isEmpty()): ?>
<section class="courses pt-60 pb-60 p-relative fix">
    <div class="animations-01"><img src="<?php echo e(asset('frontcss/img/bg/an-img-03.png')); ?>" alt="an-img-01')}}"></div>
    <div class="container">
        <div class="row">   
            <div class="col-lg-12 p-relative">
                <div class="section-title center-align mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                        <h5><i class="fal fa-graduation-cap"></i> <?php echo e(__('Subscription Bundles')); ?></h5>
                    <h2>
                        <?php echo e(__('Subscription Bundles')); ?>

                    </h2>                             
                </div>
            </div>
        </div>
        <div class="row class-active">  
            <?php $__currentLoopData = $subscriptionBundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($bundle->status == 1 && $bundle->is_subscription_enabled == 1): ?>  
                <div class="col-lg-4 col-md-4">
                <div class="courses-item mb-30 hover-zoomin <?php if($gsetting['course_hover'] == 1): ?> protip <?php endif; ?>">
                
                    <div class="thumb fix ">
                        <?php if($bundle['preview_image'] !== NULL && $bundle['preview_image'] !== '0'): ?>
                        <a href="<?php echo e(route('bundle.detail', $bundle->id)); ?>"><img src="<?php echo e(asset('images/bundle/' . ($bundle['preview_image'] ?? Avatar::create($bundle->title)->toBase64()))); ?>" alt="contact-bg-an-01"></a>
                        <?php else: ?>
                        <a href="<?php echo e(route('bundle.detail', $bundle->id)); ?>"><img src="<?php echo e(Avatar::create($bundle->title)->toBase64()); ?>" alt="contact-bg-an-01"></a>
                        <?php endif; ?>
                       
                    </div>
                    <?php if(isset($bundle->discount_price)): ?>
                    <div class="badges bg-priamry offer-badge"><span><?php echo e(__('OFF')); ?><span><?php echo round((($bundle->price - $bundle->discount_price) * 100) / $bundle->price) . '%'; ?></span></span></div>
                    <?php endif; ?>
                    <div class="courses-content">    
                        <div class="view-user-img">
                            <a href="<?php echo e(route('all/profile', $bundle->user->id)); ?>" title="">
                                <img src="<?php echo e(asset('images/user_img/' . ($bundle->user['user_img'] ?? 'default/user.png'))); ?>"
                                    class="img-fluid user-img-one" alt="">
                            </a>
                        </div>                              
                        <div class="cat">
                            <?php if($bundle->type == 1 && $bundle->price != null): ?>
                            <div class="rate text-right">
                                <ul>
                                    <?php if($bundle->discount_price != null): ?>
                                    <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format( currency($bundle->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                    <li><a><b><strike><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format( currency($bundle->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></strike></b></a></li>
                                    <?php else: ?>
                                    <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format( currency($bundle->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php else: ?>
                            <div class="rate text-right">
                                <ul>
                                    <li><a><b><?php echo e(__('Free')); ?></b></a></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <h3><a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"> <?php echo e($bundle['title']); ?></a></h3>
                        <p><?php echo e(str_limit($bundle['short_detail'] ?? $bundle['detail'], $limit = 200, $end = '...')); ?></p>
                    </div>
                    <div class="icon">
                        <img src="<?php echo e(asset('frontcss/img/icon/cou-icon.png')); ?>" alt="img">
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- courses-area -->
<?php if($hsetting->discount_enable   == 1 && isset($discountcourse) && count($discountcourse) >0): ?>
<section class="courses pt-60 pb-60 p-relative fix">
    <div class="animations-01"><img src="<?php echo e(asset('frontcss/img/bg/an-img-03.png')); ?>" alt="an-img-01')}}"></div>
    <div class="container">
        <div class="row">   
            <div class="col-lg-12 p-relative">
                <div class="section-title center-align mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                        <h5><i class="fal fa-graduation-cap"></i> <?php echo e(__('Top Disconted Courses')); ?></h5>
                    <h2>
                        <?php echo e(__('Top Disconted Courses')); ?>

                    </h2>                             
                </div>
            </div>
        </div>
        <div class="row class-active">  
            <?php $__currentLoopData = $discountcourse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($discount->status == 1 && $discount->featured == 1): ?>
            <div class="col-lg-4 col-md-4">
                <div class="courses-item mb-30 hover-zoomin <?php if($gsetting['course_hover'] == 1): ?> protip <?php endif; ?>">
                
                    <div class="thumb fix ">
                        <?php if($discount['preview_image'] !== NULL && $discount['preview_image'] !== '0'): ?>
                        <a href="<?php echo e(route('user.course.show',['id' => $discount->id, 'slug' => $discount->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$discount['preview_image'])); ?>" alt="contact-bg-an-01"></a>
                        <?php else: ?>
                        <a href="<?php echo e(route('user.course.show',['id' => $discount->id, 'slug' => $discount->slug ])); ?>"><img src="<?php echo e(Avatar::create($discount->title)->toBase64()); ?>" alt="contact-bg-an-01"></a>
                        <?php endif; ?>
                            
                        <div class="courses-icon">
                            <ul>
                                <li class="protip-wish-btn"><a
                                        href="https://calendar.google.com/calendar/r/eventedit?text=<?php echo e($discount['title']); ?>"
                                        target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        <?php if(Auth::check()): ?>
                                        <li class="protip-wish-btn">
                                            <a class="compare" data-id="<?php echo e(filter_var($discount->id)); ?>" title="compare">
                                                <i data-feather="bar-chart"></i>
                                            </a>
                                        </li>
                                 

                                <?php
                                $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                $discount->id)->first();
                                ?>
                                <?php if($wish == NULL): ?>
                                <li class="protip-wish-btn">
                                    <form id="demo-form2" method="post"
                                        action="<?php echo e(asset('show/wishlist', $discount->id)); ?>" data-parsley-validate
                                        class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>


                                        <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                        <input type="hidden" name="course_id" value="<?php echo e($discount->id); ?>" />

                                        <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i
                                                data-feather="heart"></i></button>
                                    </form>
                                </li>
                                <?php else: ?>
                                <li class="protip-wish-btn-two heart-fill">
                                    <form id="demo-form2" method="post"
                                        action="<?php echo e(asset('remove/wishlist', $discount->id)); ?>" data-parsley-validate
                                        class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>


                                        <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                        <input type="hidden" name="course_id" value="<?php echo e($discount->id); ?>" />

                                        <button class="wishlisht-btn" title="Remove from Wishlist"
                                            type="submit"><i data-feather="heart"></i></button>
                                    </form>
                                </li>
                                <?php endif; ?>
                                <?php else: ?>
                                <li class="protip-wish-btn"><a href="<?php echo e(route('login')); ?>" title="heart"><i
                                            data-feather="heart"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                    $badgeMap = [
                        'trending' => ['badge bg-warning', __('Trending')],
                        'featured' => ['badge bg-danger', __('Featured')],
                        'new' => ['badge bg-success', __('New')],
                        'onsale' => ['badge bg-info', __('On-sale')],
                        'bestseller' => ['badge bg-success', __('Bestseller')],
                        'beginner' => ['badge bg-primary', __('Beginner')],
                        'intermediate' => ['badge bg-secondary', __('Intermediate')]
                    ];
                    ?>
                    <?php if(isset($badgeMap[$discount['level_tags']])): ?>
                        <div class="advance-badge">
                            <span class="<?php echo e($badgeMap[$discount['level_tags']][0]); ?>"><?php echo e($badgeMap[$discount['level_tags']][1]); ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="courses-content">    
                        <div class="view-user-img">
                            <a href="#" title="">
                                <?php if($discount->user['user_img'] !== NULL && $discount->user['user_img'] !== ''): ?>
                                <img src="<?php echo e(asset('images/user_img/'.$discount->user['user_img'])); ?>" class="img-fluid user-img-one" alt="">
                                <?php else: ?>
                                <img src="<?php echo e(Avatar::create($discount->title)->toBase64()); ?>" alt="img">
                                <?php endif; ?>
                            </a>
                                                     
                        </div>                                
                        <div class="cat">
                            <div class="rate text-right">
                                <ul>
                                    <?php if($discount->type == 1): ?>
                                                    <?php if($discount->discount_price != NULL): ?>
                                                        <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($discount['discount_price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?> <?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                                        <li><a><b><strike><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($discount['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></strike></b></a></li>
                                                    <?php elseif($discount->price != NULL): ?>
                                                        <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($discount['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <li><a><b><?php echo e(__('Free')); ?></b></a></li>
                                                <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <h3><a href="<?php echo e(route('user.course.show',['id' => $discount->id, 'slug' => $discount->slug ])); ?>"> <?php echo e($discount->category['title'] ?? '-'); ?></a></h3>
                            <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($discount->detail))) , $limit = 70, $end = '...')); ?>

                        <a href="<?php echo e(route('user.course.show',['id' => $discount->id, 'slug' => $discount->slug ])); ?>" class="readmore"><?php echo e(__('Read More ')); ?><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <div class="icon">
                        <img src="<?php echo e(asset('frontcss/img/icon/cou-icon.png')); ?>" alt="img">
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- courses-area-end -->

<!-- courses-area -->
<?php if(Auth::check()): ?>
<?php
if(Schema::hasColumn('orders', 'refunded')){
$enroll = App\Order::where('refunded', '0')->where('user_id', auth()->user()->id)->where('status',
'1')->with('courses')->with(['user','courses.user'] )->get();
}
else{
$enroll = NULL;
}
?>
<?php if($hsetting->purchase_enable == 1 && isset($enroll)): ?>
<section class="courses pt-60 pb-60 p-relative fix">
    <div class="animations-01"><img src="<?php echo e(asset('frontcss/img/bg/an-img-03.png')); ?>" alt="an-img-01')}}"></div>
    <div class="container">
        <?php if(count($enroll) > 0): ?>
        <div class="row">   
            <div class="col-lg-12 p-relative">
                <div class="section-title center-align mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                        <h5><i class="fal fa-graduation-cap"></i> <?php echo e(__('My Purchased Course')); ?></h5>
                    <h2>
                        <?php echo e(__('My Purchased Course')); ?>

                    </h2>                             
                </div>
            </div>
        </div>
        <div class="row">  
            <?php $__currentLoopData = $enroll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($enrol->courses) && $enrol->courses['status'] == 1 ): ?>
                <div class="col-lg-4 col-md-4">
                <div class="courses-item mb-30 ms-0 me-0 hover-zoomin <?php if($gsetting['course_hover'] == 1): ?> protip <?php endif; ?>">
                
                    <div class="thumb fix ">
                        <?php if($enrol->courses['preview_image'] !== NULL && $enrol->courses['preview_image'] !== '0'): ?>
                        <a href="<?php echo e(route('user.course.show',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$enrol->courses['preview_image'])); ?>" alt="contact-bg-an-01"></a>
                        <?php else: ?>
                        <a href="<?php echo e(route('user.course.show',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ])); ?>"><img src="<?php echo e(Avatar::create($enrol->courses->title)->toBase64()); ?>" alt="contact-bg-an-01"></a>
                        <?php endif; ?>
                            
                        
                    </div>
                    <?php if(isset($enrol->courses->discount_price)): ?>
                    <div class="badges bg-priamry offer-badge"><span><?php echo e(__('OFF')); ?><span><?php echo round((($enrol->courses->price - $enrol->courses->discount_price) * 100) / $enrol->courses->price) . '%'; ?></span></span></div>
                    <?php endif; ?>
                    <div class="courses-content">    
                        <div class="view-user-img">
                            <a href="<?php echo e(route('all/profile',$enrol->user->id)); ?>" title="<?php echo e(optional($enrol->user)['fname']); ?>">
                                <?php if($c->user['user_img'] !== NULL && $c->user['user_img'] !== ''): ?>
                                <img src="<?php echo e(asset('images/user_img/'.$c->user['user_img'])); ?>" class="img-fluid user-img-one" alt="">
                                <?php else: ?>
                                <img src="<?php echo e(Avatar::create($enrol->user->title)->toBase64()); ?>" alt="img">
                                <?php endif; ?>
                            </a>
                                                     
                        </div>                                
                        <div class="cat">
                            <div class="rate text-right">
                                <ul>
                                    <?php if($enrol->courses->type == 1): ?>
                                                    <?php if($enrol->courses->discount_price != NULL): ?>
                                                        <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($enrol->courses['discount_price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?> <?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                                        <li><a><b><strike><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($enrol->courses['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></strike></b></a></li>
                                                    <?php elseif($c->price != NULL): ?>
                                                        <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : ''); ?><?php echo e(price_format(currency($enrol->courses['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : ''); ?></b></a></li>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <li><a><b><?php echo e(__('Free')); ?></b></a></li>
                                                <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <h3><a href="<?php echo e(route('user.course.show',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ])); ?>"> <?php echo e($c->category['title'] ?? '-'); ?></a></h3>
                            <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($enrol->courses->detail))) , $limit = 70, $end = '...')); ?>

                        <a href="<?php echo e(route('user.course.show',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ])); ?>" class="readmore"><?php echo e(__('Read More ')); ?><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <div class="icon">
                        <img src="<?php echo e(asset('frontcss/img/icon/cou-icon.png')); ?>" alt="img">
                    </div>
                </div>
                    </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>
<!-- courses-area-end -->

 <!-- steps-area -->
<?php if($hsetting->service_enable == 1 && !$services->isEmpty() && isset($servicesetting)): ?>
<section class="steps-area p-relative">
    <div class="animations-10"><img src="<?php echo e(asset('frontcss/img/bg/an-img-10.png')); ?>" alt="an-img-01"></div> 
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="section-title mb-35 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                    <h2><?php echo e(__('Our Best Features')); ?></h2>
                    <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/", '', strip_tags(html_entity_decode($servicesetting->detail))), $limit = 150, $end = '...')); ?></p>
                </div>
                <div class="row pr-20">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="step-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="dnumber">
                                <?php if($ser['image'] == !NULL): ?>
                                    <div class="date-box"><img src="<?php echo e(asset('images/service/'.$ser['image'])); ?>" alt="icon"></div>
                                <?php else: ?>
                                    <img src="<?php echo e(Avatar::create($ser->title)->toBase64()); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="text">
                                <h3><?php echo e($ser->title); ?></h3>
                                <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/", '', strip_tags(html_entity_decode($ser->detail))), $limit = 25, $end = '...')); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="step-img wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                    <img src="<?php echo e(asset('images/services/'.$servicesetting['image'])); ?>" alt="class image">
                </div>
            </div>
        </div> 
    </div>
</section>
<?php endif; ?>
<!-- steps-area-end -->
<!-- categories start -->
<?php if($hsetting->featuredcategories_enable == 1 && !$category->isEmpty()): ?>
    <section id="categories" class="categories-main-block pt-120 pb-120 p-relative fix">
        <div class="container-xl">
            <?php if($category->where('featured', '1')->count() > 0): ?>
                <h3 class="categories-heading"><?php echo e(__('Featured Categories')); ?></h3>
                <div class="row">
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($t->status == 1 && $t->featured == 1): ?>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                                <div class="cat-container btm-20 hover-zoomin text-center">
                                    <a href="<?php echo e(route('category.page',['id' => $t->id, 'category' => str_slug(str_replace('-','&',$t->slug))])); ?>">
                                        <div class="cat-img">
                                            <img src="<?php echo e($t['cat_image'] ? asset('images/category/'.$t['cat_image']) : Avatar::create($t->title)->toBase64()); ?>">
                                        </div>
                                        <div class="cat-dtl">
                                            <div>
                                                <span>
                                                    <h5 class="cat-name"><i class="fa <?php echo e($t['icon']); ?> mr-2"></i><?php echo e($t['title']); ?></h5>
                                                    <div class="cat-img-count"><?php echo e($t->courses->count()); ?> <?php echo e(__('Courses')); ?></div>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<!-- categories end -->
<!-- cta-area -->
<?php if($hsetting->became_enable == 1): ?>
<?php
$gets = App\JoinInstructor::first();
?>
<?php if(isset($gets)): ?> 
             <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
            <section class="cta-area cta-bg pt-50 pb-50" style="background-image:asset(<?php echo e(asset('/images/joininstructor/'.$gets->img)); ?>)">
                <?php else: ?>
            <section class="cta-area cta-bg pt-50 pb-50" style="background-image:asset(<?php echo e(asset('/images/joininstructor/'.$gets->img)); ?>)">
                <img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>">
             <?php endif; ?>           
                <div class="overlay-bg"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-8">
                            <div class="section-title cta-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                                <h2><?php echo e($gets->text); ?></h2>
								<p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($gets->detail))) , $limit = 100, $end = '...')); ?>

                            </div>
                                             
                        </div>
                        <div class="col-lg-4 col-md-4 text-right"> 
                            <div class="recommendation-btn">
                                <a href=""  data-toggle="modal" data-target="#myModalinstructor" class="btn btn-primary" title="Become an Instructor"><?php echo e(__('Become an Instructor')); ?></a>
                            </div>
                        </div>
					
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <?php endif; ?>
            <!-- cta-area-end -->
 <!-- frequently-area -->
 <?php
     $faqs = App\FaqStudent::get();
 ?>
 <section class="faq-area pt-120 pb-120 p-relative fix">
    <div class="animations-10"><img src="<?php echo e(asset('frontcss/img/bg/an-img-04.png')); ?>" alt="an-img-01"></div>
    <div class="animations-08"><img src="<?php echo e(asset('frontcss/img/bg/an-img-05.png')); ?>" alt="contact-bg-an-01"></div>
    <div class="container">
        <div class="row justify-content-center  align-items-center">
            <?php if(isset($faqs)): ?>
            <div class="col-lg-7">
                <div class="section-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                    <h2><?php echo e(__('Get every single answer here.')); ?></h2>
                    <p><?php echo e(__('A business or organization established to provide a particular service, typically one that involves a organizing transactions.')); ?></p>
                </div>
                <div class="faq-wrap mt-30 pr-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="heading<?php echo e($faq->id); ?>">
                                <h2 class="mb-0">
                                    <button class="faq-btn  <?php echo e($index == 0 ? '' : 'collapsed'); ?>" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse<?php echo e($faq->id); ?>" aria-expanded="<?php echo e($index == 0 ? 'true' : 'false'); ?>" aria-controls="collapse">
                                       <?php echo e($faq->title); ?>

                                    </button>
                                </h2>
                            </div>
                            <div id="collapse<?php echo e($faq->id); ?>" class="accordion-collapse collapse <?php echo e($index == 0 ? 'show' : ''); ?>" >
                                <div class="card-body">
                                    <?php echo e(substr(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($faq->details))), 0, 100)); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>          
            </div>
            <?php endif; ?>
            
            <?php if(Auth::check()): ?>
            <div class="col-lg-5">
                <div class="contact-bg02">
                <div class="section-title wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                    <h2>
                      <?php echo e(__('Make An Contact')); ?>

                    </h2>
                  
                </div>
                    
            <form action="<?php echo e(route('contact.user')); ?>" method="post" class="contact-form mt-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                <?php echo e(csrf_field()); ?>



                <div class="row">
                <div class="col-lg-12">
                    <div class="contact-field p-relative c-name mb-20">                                    
                        <input type="text" id="firstn" name="fname" placeholder="First Name" required>
                    </div>                               
                </div>
                
                <div class="col-lg-12">                               
                    <div class="contact-field p-relative c-subject mb-20">                                   
                        <input type="text" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>		
                <div class="col-lg-12">                               
                    <div class="contact-field p-relative c-subject mb-20">                                   
                        <input type="text" id="phone" name="mobile" placeholder="Phone No." required>
                    </div>
                </div>	
                <?php
                $data =  App\Contactreason::where('status', '1')->get();
               ?>
              
                <div class="col-lg-12">
                    <div class="contact-field p-relative c-message mb-30">                                  
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Write comments"></textarea>
                    </div>
                    <div class="slider-btn">                                          
                                <button class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s"><span><?php echo e(__('Submit Now')); ?></span> <i class="fal fa-long-arrow-right"></i></button>				
                            </div>                             
                </div>
                </div>
        </form>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<!-- frequently-area-end -->	
     <!-- video-area -->
<?php if($hsetting->video_enable == 1 &&  isset($videosetting) ): ?>
    <section class="cta-area cta-bg pt-160 pb-160 cta-area-videosetting" style="background-image:asset(<?php echo e(('images/videosetting/'.$videosetting->image)); ?>);">
        <div class="overlay-bg"></div>
        <div class="container">
            <div class="row justify-content-center  align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="section-title cta-title video-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                        <h2> <?php echo e($videosetting->tittle); ?></h2>
                        <p><?php echo e($videosetting->description); ?> </p>	
                    </div>
                                     
                </div>
                <div class="col-lg-2 col-md-2">
                </div>
               <div class="col-lg-4">

                        <div class="s-video-content">
                            <a href="<?php echo e($videosetting->asset); ?>" class="popup-video mb-50"><img src=<?php echo e(asset('frontcss/img/bg/play-button.png')); ?> alt="circle_right"></a>
                           
                        </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- video-area-end -->	
<!-- testimonial-area -->
<?php if($hsetting->testimonial_enable == 1 && ! $testi->isEmpty() ): ?>
<section class="testimonial-area pt-120 pb-115 p-relative fix">
    <div class="animations-01"><img src="<?php echo e(asset('frontcss/img/bg/an-img-03.png')); ?>" alt="an-img-01"></div>
    <div class="animations-02"><img src="<?php echo e(asset('frontcss/img/bg/an-img-04.png')); ?>" alt="contact-bg-an-01"></div>
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
               <div class="section-title text-center mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                   <h5><i class="fal fa-graduation-cap"></i> <?php echo e(__('Testimonial')); ?></h5>
                   <h2>
                    <?php echo e(__('What Our Clients Says')); ?>

                   </h2>
                
               </div>
              
           </div>
           
           <div class="col-lg-12">
             
                <div class="testimonial-active wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                    <?php $__currentLoopData = $testi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-testimonial text-center">
                        <div class="qt-img">
                            <img src="<?php echo e(asset('frontcss/img/qt-icon.png')); ?>" alt="img">
                        </div>
                        <p><?php echo e(str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($tes->details))) , $limit = 100, $end = '...')); ?></p>
                        <div class="testi-author">
                           <img src="<?php echo e(asset('images/testimonial/'.$tes['image'])); ?>"   alt="img">
                        </div>
                        <div class="ta-info">
                            <h6><?php echo e($tes['client_name']); ?></h6>
                            <span><?php echo e($tes['designation']); ?></span>
                        </div>                                    
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              
           </div>
       </div>
   </div>
</section>
<?php endif; ?>
<!-- testimonial-area-end -->	

 <!-- admission-area -->
<?php if($hsetting->get_enable == 1 && isset($get_enable)): ?>
 <section class="about-area about-p pt-120 pb-120 p-relative fix" style="background-image:asset(<?php echo e(asset('frontcss/img/bg/admission_bg.png')); ?>); background-repeat: no-repeat; background-position: top;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
             <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                    <img src="<?php echo e('images/getstarted/'.$get_enable->image); ?>" alt="img">                              
                </div>                          
            </div>
            
        <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="about-content s-about-content pl-15 wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                    <div class="about-title second-title pb-25">  
                        <h2><?php echo e($get_enable->heading); ?></h2>                                   
                    </div>
                       <p class="txt-clr"><?php echo e($get_enable->sub_heading); ?></p>
                     <div class="slider-btn mt-20">                                          
                         <a href="<?php echo e($get_enable->link); ?>" class="btn ss-btn smoth-scroll"><?php echo e($get_enable->button_txt); ?> <i class="fal fa-long-arrow-right"></i></a>				
                    </div>
                </div>
            </div>
         
        </div>
    </div>
</section>
<?php endif; ?>
<!-- admission-area-end -->
  <!-- brand-area -->
<?php if($hsetting->trusted_enable == 1 && ! $trusted->isEmpty() ): ?>
<div class="brand-area pt-60 pb-60" >
    <div class="container">
        <div class="row brand-active">
        <?php $__currentLoopData = $trusted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trust): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-2">
                <div class="single-brand owl-carousel">
                    <img src="<?php echo e(asset('images/trusted/'.$trust['image'])); ?>" class="img-fluid owl-lazy" alt="img">
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- brand-area-end -->   
<!-- blog-area -->
<?php if($hsetting->blog_enable == 1 && !$blogs->isEmpty()): ?>
<section id="blog" class="blog-area p-relative fix pt-120 pb-90" style="background-image:asset(frontcss/img/bg/blog_bg.png); background-repeat: no-repeat; background-position: top;">    <div class="container">
        <div class="row align-items-center"> 
            <div class="col-lg-12">
                <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                    <h5><i class="fal fa-graduation-cap"></i><?php echo e(__(' Our Blog')); ?></h5>
                    <h2>
                        <?php echo e(__('Latest Blog & News')); ?>

                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                $counter = 0;
            ?>
                                     
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $image = $blog['image'];
            $slug = $blog->slug;
            $headingSlug = str_slug(str_replace('-','&',$blog->heading));
            $detailRoute = $slug != NULL ? route('blog.detail', ['id' => $blog->id, 'slug' => $slug]) : route('blog.detail', ['id' => $blog->id, 'slug' => $headingSlug]);
            $imageSrc = $image ? asset('images/blog/'.$image) : Avatar::create($blog->heading)->toBase64();
            ?>
                <?php if($counter < 3): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                        <div class="blog-thumb2">
                            <a href="<?php echo e($detailRoute); ?>"><img src="<?php echo e(asset('images/blog/'.$blog['image'])); ?>" alt="img"></a>
                            <div class="date-home">
                                <i class="fal fa-calendar-alt"></i> <?php echo e(date('d-m-Y',strtotime($blog['start_time']))); ?>

                            </div>
                        </div>                    
                        <div class="blog-content2">    
                            <div class="b-meta">
                                <div class="meta-info">
                                    <ul>
                                        <li><i class="fal fa-user"></i><?php echo e(__(' By ')); ?><?php echo e(optional($blog->user)['fname']); ?></a></li>
                                    </ul>
                                </div>
                            </div>

                            <h4><a href="<?php echo e($detailRoute); ?>" class="truncate"><?php echo e($blog['heading']); ?></a></h4> 
                            <p class="limited-lines"><?php echo e(substr(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($blog->detail))), 0, 200)); ?></p>
                            <div class="blog-btn"><a href="<?php echo e($detailRoute); ?>"><?php echo e(__('Read More')); ?> <i class="fal fa-long-arrow-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <?php
                    $counter++;
                ?>
                <?php else: ?>
                    <?php break; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- blog-area-end -->

<!-- Instructor-area -->
<?php if($hsetting->instructor_enable == 1 && !$instructors->isEmpty()): ?>
<section id="instructor" class="instructor-main-block pt-90 pb-90 p-relative fix" data-animation="fadeInUp animated" data-delay=".2s">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-12">
                <div class="section-title center-align mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                    <h5><i class="fal fa-graduation-cap"></i> <?php echo e(__('Instructor')); ?></h5>
                    <h2>
                        <?php echo e(__('Instructor')); ?>

                    </h2>
                </div>
            </div>
        </div>
        <div class="row class-active">
            <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 ">
                <?php
                $asset = asset::to('/').'/allinstructor/profile/'.$inst->id;
                ?>
                <!-- class-item -->
                <div class="class-item mb-30 courses-item hover-zoomin">
                        <!-- class-img -->
                    <div class="class-img">
                        <div class="class-img-outer">
                            <a href="<?php echo e(route('allinstructor/profile',$inst->id)); ?>"> <img src="<?php echo e(asset('/images/user_img/'.$inst['user_img'])); ?>" alt="class image"></a>
                            <div class="courses-icon instructor-home-block">
                                <ul>
                                    <li>
                                        <div class="tooltip">
                                            <div class="tooltip-icon">
                                                <i data-feather="share-2"></i>
                                            </div>
                                            <span class="tooltiptext">
                                                <div class="instructor-home-social-icon">
                                                    <ul>
                                                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&asset=<?php echo e($asset); ?>&title=Default+share+text&summary=" target="_blank" title="Linkedin"><b><i class="fab fa-linkedin-in"></i></b></a></li>
                                                        <li><a href="https://www.facebook.com/sharer/sharer.php?&asset=<?php echo e($asset); ?>" target="_blank" title="Facebook"><b><i class="fab fa-facebook-f"></i></b></a></li>
                                                        <li><a href="https://twitter.com/intent/tweet?text=Default+share+text&asset=<?php echo e($asset); ?>" target="_blank" title="Twitter"><b><i class="fab fa-twitter"></i></b></a></li>
                                                        <li><a href="https://telegram.me/share/asset?asset=<?php echo e($asset); ?>&text=Default+share+text" target="_blank" title="Telegram"><b><i class="fab fa-telegram"></i></b></a></li>
                                                        <li><a href="https://wa.me/?text=<?php echo e($asset); ?>" target="_blank" title="Whatsapp"><b><i class="fab fa-whatsapp"></i></b></a></li>
                                                    </ul>
                                                </div>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('allinstructor/profile',$inst->id)); ?>"  title="View Page"><i data-feather="eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- course-meta -->
                            <div class="course-meta">
                                <div class="instructor-home-dtl">
                                    <h4 class="instructor-home-heading mb-0"><a href="<?php echo e(route('allinstructor/profile',$inst->id)); ?>" title=""><?php echo e($inst->fname); ?> <?php echo e($inst->lname); ?></a></h4>
                                    <p><?php echo e($inst->role); ?></p>
                                    <div class="instructor-home-info">
                                        <?php
                                        $followers = App\Followers::where('user_id', '!=', $inst->id)->where('follower_id', $inst->id)->count();
                                        $followings = App\Followers::where('user_id', $inst->id)->where('follower_id','!=', $inst->id)->count();
                                        $course = App\Course::where('user_id', $inst->id)->count();
                                    ?>
                                    <ul>
                                        <li><?php echo e($course > 0 ? $course.' '.__('Courses') : __('No Courses')); ?></li>
                                        <li><?php echo e($followers); ?> <?php echo e(__('Follower')); ?></li>
                                        <li><?php echo e($followings); ?> <?php echo e(__('Following')); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- course-meta-end -->
                        </div>                                    
                    </div>
                    <!-- class-img -->
                </div>
                    <!-- class-item-end -->
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Instructor-area-end -->

<!-- Institute-area -->
<?php if($hsetting->institute_enable == 1 && !$institute->isEmpty()): ?>
<section id="institute" class="institute-main-block pt-90 pb-90 p-relative fix" data-animation="fadeInUp animated" data-delay=".2s">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-12">
                <div class="section-title center-align mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                    <h5><i class="fal fa-graduation-cap"></i> <?php echo e(__('Institute')); ?></h5>
                    <h2>
                        <?php echo e(__('Institute')); ?>

                    </h2>
                </div>
            </div>
        </div>
        <div class="row class-active">
            <?php $__currentLoopData = $institute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 ">
                <!-- class-item -->
                <div class="class-item mb-30 courses-item hover-zoomin">
                        <!-- class-img -->
                    <div class="class-img">
                        <div class="class-img-outer">
                            <a href="<?php echo e(route('ins.sluging', ['id' => $inst->id, 'slug' => $inst->slug])); ?>"> <img src="<?php echo e($inst['image'] ? asset('/files/institute/'.$inst->image) : Avatar::create($inst->fname)->toBase64()); ?>" alt="class image"></a>
                            <div class="courses-icon">
                                <ul>
                                    <li>
                                        <a href="<?php echo e(route('ins.sluging', ['id' => $inst->id, 'slug' => $inst->slug])); ?>"  title="View Page"><i data-feather="eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- course-meta -->
                            <div class="course-meta">
                                <h4 class="instructor-home-heading"><a href="<?php echo e(route('ins.sluging', ['id' => $inst->id, 'slug' => $inst->slug])); ?>" title=""><?php echo e($inst->title); ?> </a></h4>
                                <p><?php echo e($inst->email); ?></p>
                                <p><?php echo e($inst->phone); ?></p>
                            </div>
                            <!-- course-meta-end -->
                        </div>                                    
                    </div>
                    <!-- class-img -->
                </div>
                    <!-- class-item-end -->
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Institute-area-end -->

<!-- newslater-area -->
<section class="newslater-area pt-60 pb-60">
    <div class="container" >
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-7">
                <div class="section-title newslater-title">
                    <div class="icon">
                        <img src="<?php echo e(asset('frontcss/img/icon/send-mail.png')); ?>" alt="img">
                    </div>
                    <div class="text">
                        <h2><?php echo e(__('Subscribe for Newsletter')); ?></h2>
                        <p><?php echo e(__('Manage Your Business With Our Software')); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
                 <form name="ajax-form" id="contact-form4" action="<?php echo e(asset('store-newsletter')); ?>" method="post" class="contact-form newslater">
                    <?php echo csrf_field(); ?>
                   <div class="form-group p-relative">
                      <input class="form-control" id="email2" name=subscribed_email type="email" placeholder="Email Address..." required> 
                      <button type="submit" class="btn btn-custom" id="send2"><?php echo e(__('Subscribe Now')); ?></button>
                   </div>
                   <!-- /Form-email -->	
                </form>
            </div>
        </div>
       
    </div>
</section>
<!-- newslater-aread-end -->
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('custom-script'); ?>
<script>
    (function ($) {
        "use strict";
        $(function () {
            $("#photography-tab").trigger("click");
        });
    })(jQuery);
    function showtab(id) {
        $.ajax({
            type: 'GET',
            asset:'<?php echo e(asset('/tabcontent1')); ?>/' + id,
            dataType: 'json',
            success: function (data) {
                $('.btn_more').html(data.btn_view);
                $('#tabShow').html(data.tabview2);
            }
        });
    }
    $(document).ready(function () {
        "use Strict";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.compare').on('click', function (e) {
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                asset: 'compare/dataput',
                data: { id: id },
                success: function (data) {}
            });
        });
    });
    $(document).ready(function () {
        var asset = $("#elearningVideo").attr('src');
        $("#video_modal").on('hide.bs.modal', function () {
            $("#elearningVideo").attr('src', '');
        });
        $("#video_modaal").on('show.bs.modal', function () {
            $("#elearningVideo").attr('src', asset);
        });
    });
</script>
<script src="<?php echo e(asset('js/colorbox-script.js')); ?>"></script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eclass\resources\views/quedecato/front/home.blade.php ENDPATH**/ ?>
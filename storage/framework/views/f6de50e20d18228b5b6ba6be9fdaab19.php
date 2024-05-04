
<?php $__env->startSection('title', 'Wishlist'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$gets = App\Breadcum::first();
?>
<?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
<section class="breadcrumb-area d-flex  p-relative align-items-center" style="background-image: url('<?php echo e(asset('/images/breadcum/'.$gets->img)); ?>')">
<?php else: ?>
<section class="breadcrumb-area d-flex  p-relative align-items-center" style="background-image: url('<?php echo e(asset('Avatar::create($gets->text)->toBase64() ')); ?>')">
<?php endif; ?>
<div class="overlay-bg"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2><?php echo e(__('Wishlist')); ?></h2>    
                        
                    </div>
                </div>
            </div>
            <div class="breadcrumb-wrap2">
                  <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('My Wishlist')); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
    </div>
</section>
<?php
    $item = App\Wishlist::where('user_id', Auth::User()->id)->get();
?>
<?php if(isset($wishlist)): ?>
<section class="courses pt-120 pb-120 p-relative fix courses-coloumn-block">
    <div class="container">
        <div class="row"> 
            <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($wish->courses->status == '1'): ?>
        	<?php if($wish->user_id == Auth::User()->id): ?>  
            <div class="col-lg-4 col-md-6 ">
                <div class="courses-item mb-30 hover-zoomin">
                    <div class="thumb fix">
                        <?php if($wish->courses['preview_image'] !== NULL && $wish->courses['preview_image'] !== ''): ?>
                        <a href="<?php echo e(route('user.course.show',['id' => $wish->courses->id, 'slug' => $wish->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$wish->courses->preview_image)); ?>" class="img-fluid" alt="course">
                        <?php else: ?>
                            <a href="<?php echo e(route('user.course.show',['id' => $wish->courses->id, 'slug' => $wish->courses->slug ])); ?>"><img src="<?php echo e(Avatar::create($wish->courses->title)->toBase64()); ?>" class="img-fluid" alt="course">
                        <?php endif; ?>                    
                        <div class="courses-icon">
                            <ul>
                                <li class="">   
                                    <?php if($wish->courses->type == 1): ?>
                                    <div class="cart-btn">
                                        <form id="demo-form2" method="post" action="<?php echo e(route('addtocart',['course_id' => $wish->courses->id, 'price' => $wish->courses->price, 'discount_price' => $wish->courses->discount_price ])); ?>">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="category_id"  value="<?php echo e($wish->courses->category['id']); ?>" />
                                                <button type="submit" class="wishlist-cart"  title="Add To Cart"><i
                                                data-feather="shopping-cart" ></i></button>
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                </li>
                                <li class="">
                                    <div class="wishlist-btn txt-rgt">
                                        <form  method="post" action="<?php echo e(url('delete/wishlist', $wish->id)); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            <button type="submit" class="trash-icon" title="Remove From Wishlist"><i
                                            data-feather="trash" ></i></button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="courses-content">      
                        <div class="view-user-img">
                            <a href="#" title="">
                                <?php if($wish->user['user_img'] !== NULL && $wish->user['user_img'] !== ''): ?>
                                <img src="<?php echo e(asset('images/user_img/'.$wish->user['user_img'])); ?>" alt="img">
                                <?php else: ?>
                                <img src="<?php echo e(url('frontcss/img/icon/cou-icon.png')); ?>" alt="img">
                                <?php endif; ?>
                            </a>
                                                     
                        </div>                                
                        <div class="cat">
                            <div class="rate text-right">
                                <ul>

                                    <?php if($wish->courses->discount_price == !NULL): ?>

                                    <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format( currency($wish->courses->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></b></a>
                                    </li>

                                    <li><a><b><strike><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format( currency($wish->courses->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></strike></b></a>
                                    </li>


                                    <?php else: ?>
                                    <li><a><b>
                                        <?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format( currency($wish->courses->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false) )); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></b></a>
                                    </li>


                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <h3><a href="<?php echo e(route('user.course.show',['id' => $wish->courses->id, 'slug' => $wish->courses->slug ])); ?>"><?php echo e(str_limit($wish->courses->title, $limit = 35, $end = '...')); ?></a></h3>
                        <p><?php echo e(str_limit($wish->courses->title, $limit = 70, $end = '...')); ?></p>
                        <a href="<?php echo e(route('user.course.show',['id' => $wish->courses->id, 'slug' => $wish->courses->slug ])); ?>" class="readmore"><?php echo e(__('Read More')); ?> <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <div class="icon">
                        <img src="<?php echo e(url('frontcss/img/icon/cou-icon.png')); ?>" alt="img">
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
  <div class="container-xl" id="adsense">
        <!-- google adsense code -->
        <?php
          if (isset($ad)) {
           if ($ad->iswishlist==1 && $ad->status==1) {
              $code = $ad->code;
              echo html_entity_decode($code);
           }
          }
        ?>
    </div>
</section>
<?php else: ?>
<section id="search-block" class="search-main-block search-block-no-result text-center">
    <div class="container-xl">
        <div class="no-result-img btm-20">
            <img src="<?php echo e(url('/images/no-result.jpg')); ?>" class="img-fluid" alt="">
        </div>
        <div class="no-result-courses btm-10"><?php echo e(__('Empty Wishlist')); ?></div>
        <div class="recommendation-btn text-white text-center">
            <a href="<?php echo e(url('/')); ?>" class="btn btn-primary" title="search"><b><?php echo e(__('Browse')); ?></b></a>
        </div> 
    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eclass\resources\views/quedecato/front/wishlist.blade.php ENDPATH**/ ?>
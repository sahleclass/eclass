
<?php $__env->startSection('title', 'Wishlist'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$gets = App\Breadcum::first();
?>
<?php if(isset($gets)): ?>
<section id="business-home" class="business-home-main-block">
    <div class="business-img">
        <?php if($gets['img'] !== NULL && $gets['img'] !== ''): ?>
        <img src="<?php echo e(url('/images/breadcum/'.$gets->img)); ?>" class="img-fluid" alt="" />
        <?php else: ?>
        <img src="<?php echo e(Avatar::create($gets->text)->toBase64()); ?>" alt="course" class="img-fluid">
        <?php endif; ?>
    </div>
    <div class="overlay-bg"></div>
    <div class="container-xl">
        <div class="business-dtl">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="bredcrumb-dtl">
                        <h1 class="wishlist-home-heading text-white"><?php echo e(__('Wishlist')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- about-home end -->
<?php
    $item = App\Wishlist::where('user_id', Auth::User()->id)->get();
?>
<?php if(count($item) > 0): ?>
<section id="learning-courses" class="learning-courses-main-block">
    <div class="container-xl">
        <div class="row">
        	<?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($wish->courses->status == '1'): ?>
        	<?php if($wish->user_id == Auth::User()->id): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="view-block">
                        <div class="view-img">
                            <?php if($wish->courses['preview_image'] !== NULL && $wish->courses['preview_image'] !== ''): ?>
                                <a href="<?php echo e(route('user.course.show',['id' => $wish->courses->id, 'slug' => $wish->courses->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$wish->courses->preview_image)); ?>" class="img-fluid" alt="course">
                            <?php else: ?>
                                <a href="<?php echo e(route('user.course.show',['id' => $wish->courses->id, 'slug' => $wish->courses->slug ])); ?>"><img src="<?php echo e(Avatar::create($wish->courses->title)->toBase64()); ?>" class="img-fluid" alt="course">
                            <?php endif; ?>
                            </a>
                        </div>
                        <div class="view-user-img">
                            <?php if($wish->user['user_img'] !== NULL && $wish->user['user_img'] !== ''): ?>
                                <a href="<?php echo e(route('all/profile',$wish->user->id)); ?>" title=""><img src="<?php echo e(asset('images/user_img/'.$wish->user['user_img'])); ?>" class="img-fluid user-img-one" alt=""></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('all/profile',$wish->user->id)); ?>" title=""><img src="<?php echo e(asset('images/default/user.png')); ?>" class="img-fluid user-img-one" alt=""></a>
                            <?php endif; ?>
                        </div>
                        <?php if($wish->courses['tags'] == !NULL): ?>
                            <div class="best-seller"><?php echo e($wish->courses['tags']); ?></div>
                        <?php endif; ?>
                        <div class="view-dtl">
                            <div class="view-heading"><a href="<?php echo e(route('user.course.show',['id' => $wish->courses->id, 'slug' => $wish->courses->slug ])); ?>"><?php echo e(str_limit($wish->courses->title, $limit = 35, $end = '...')); ?></a></div>
                            <div class="user-name">
                                <h6>By <span><a href="<?php echo e(route('all/profile',$wish->user->id)); ?>"> <?php echo e(optional($wish->courses->user)['fname']); ?></a></span></h6>
                            </div>
                            <div class="rating">
                                <ul>
                                    <li>
                                        
                                        <?php 
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $sub_total = 0;
                                        $reviews = App\ReviewRating::where('course_id',$wish->courses->id)->where('status','1')->get();
                                        ?> 
                                        <?php if(!empty($reviews[0])): ?>
                                            <?php
                                            $count =  App\ReviewRating::where('course_id',$wish->courses->id)->count();

                                            foreach($reviews as $review){
                                                $learn = $review->price*5;
                                                $price = $review->price*5;
                                                $value = $review->value*5;
                                                $sub_total = $sub_total + $learn + $price + $value;
                                            }

                                            $count = ($count*3) * 5;
                                            $rat = $sub_total/$count;
                                            $ratings_var = ($rat*100)/5;
                                            ?>
                            
                                            <div class="pull-left">
                                                <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="pull-left">
                                                <?php echo e(__('No Rating')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </li>

                                    <?php
                                    $reviews = App\ReviewRating::where('course_id' ,$wish->courses->id)->get();
                                    ?>
                                    <?php 
                                    $learn = 0;
                                    $price = 0;
                                    $value = 0;
                                    $sub_total = 0;
                                    $count =  count($reviews);
                                    $onlyrev = array();

                                    $reviewcount = App\ReviewRating::where('course_id', $wish->courses->id)->where('status',"1")->WhereNotNull('review')->get();

                                    foreach($reviewcount as $review){

                                        $learn = $review->learn*5;
                                        $price = $review->price*5;
                                        $value = $review->value*5;
                                        $sub_total = $sub_total + $learn + $price + $value;
                                    }

                                    $count = ($count*3) * 5;
                                     
                                    if($count != "" && $count != '0')
                                    {
                                        $rat = $sub_total/$count;
                                 
                                        $ratings_var = ($rat*100)/5;
                               
                                        $overallrating = ($ratings_var/2)/10;
                                    }
                                     
                                    ?>

                                    <?php
                                        $reviewsrating = App\ReviewRating::where('course_id', $wish->courses->id)->first();
                                    ?>
                                    <li class="reviews">
                                        (<?php
                                        $data = App\ReviewRating::where('course_id', $wish->courses->id)->count();
                                        if($data>0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        ?> Reviews)
                                    </li>
                                </ul>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="count-user">
                                            <i data-feather="user"></i><span>
                                                <?php
                                                $data = App\Order::where('course_id', $wish->courses->id)->count();
                                                if(($data)>0){

                                                echo $data;
                                                }
                                                else{

                                                echo "0";
                                                }
                                                ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <?php if( $wish->courses->type == 1): ?>
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
                                        <?php else: ?>
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b><?php echo e(__('Free')); ?></b></a></li>
                                            </ul>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="img-wishlist">
                        <div class="protip-wishlist">
                            <ul>
                                <li class="protip-wish-btn">   
                                    <?php if($wish->courses->type == 1): ?>
                                    <div class="cart-btn">
                                        <form id="demo-form2" method="post" action="<?php echo e(route('addtocart',['course_id' => $wish->courses->id, 'price' => $wish->courses->price, 'discount_price' => $wish->courses->discount_price ])); ?>"
                                                data-parsley-validate class="form-horizontal form-label-left">
                                                <?php echo e(csrf_field()); ?>

                                                
                                                <input type="hidden" name="category_id"  value="<?php echo e($wish->courses->category['id']); ?>" />
                                                    
                                            
                                        <button type="submit" class="btn btn-primary wishlist-cart"  title="Add To Cart"><i
                                                data-feather="shopping-cart" class="rgt-10"></i></button>
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                </li>
                                <li class="protip-wish-btn-two">
                                    <div class="wishlist-btn txt-rgt">
                                        <form  method="post" action="<?php echo e(url('delete/wishlist', $wish->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                            <?php echo e(csrf_field()); ?>

                                            
                                        <button type="submit" class="btn btn-primary trash-icon" title="Remove From Wishlist"><i
                                            data-feather="trash" class="rgt-10"></i></button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
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
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eclass\resources\views/front/wishlist.blade.php ENDPATH**/ ?>
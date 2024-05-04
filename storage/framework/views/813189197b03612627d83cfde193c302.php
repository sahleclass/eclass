<div class="row">
    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($c->status == 1): ?>
    <div class="col-lg-4">
        <div class="courses-item mb-30 hover-zoomin ms-0 me-0 protip">
            <div class="thumb fix ">
                <?php if($c['preview_image'] !== NULL && $c['preview_image'] !== ''): ?>
                <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$c['preview_image'])); ?>" alt="course" class="img-fluid" >
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(Avatar::create($c->title)->toBase64()); ?>" alt="course"class="img-fluid">
                </a>
            <?php endif; ?>                
            <div class="courses-icon">
                    <ul>

                        <li class="protip-wish-btn"><a href="https://calendar.google.com/calendar/r/eventedit?text=<?php echo e($c['title']); ?>" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                        <?php if(Auth::check()): ?>

                            <li class="protip-wish-btn"><a class="compare" data-id="<?php echo e(filter_var($c->id)); ?>" title="compare"><i data-feather="bar-chart"></i></a></li>
                            

                            <?php
                                $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                            ?>
                            <?php if($wish == NULL): ?>
                             <li class="protip-wish-btn">
                                    <form id="demo-form2" method="post" action="<?php echo e(url('show/wishlist', $c->id)); ?>" data-parsley-validate
                                        class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                        <input type="hidden" name="course_id"  value="<?php echo e($c->id); ?>" />
                                        <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                    </form>
                                </li>
                            <?php else: ?>
                                <li class="protip-wish-btn-two">
                                    <form id="demo-form2" method="post" action="<?php echo e(url('remove/wishlist', $c->id)); ?>" data-parsley-validate
                                        class="form-horizontal form-label-left">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                        <input type="hidden" name="course_id"  value="<?php echo e($c->id); ?>" />
                                        <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                    </form>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="protip-wish-btn"><a href="<?php echo e(route('login')); ?>" title="heart"><i data-feather="heart"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <?php if($c['level_tags'] == 'trending'): ?>
            <div class="advance-badge">
                <span class="badge bg-warning"><?php echo e(__('Trending')); ?></span>
            </div>
            <?php endif; ?>
            <?php if($c['level_tags'] == 'featured'): ?>

            <div class="advance-badge">
                <span class="badge bg-danger"><?php echo e(__('Featured')); ?></span>
            </div>
            <?php endif; ?>
            <?php if($c['level_tags'] == 'new'): ?>

            <div class="advance-badge">
                <span class="badge bg-success"><?php echo e(__('New')); ?></span>
            </div>
            <?php endif; ?>
            <?php if($c['level_tags'] == 'onsale'): ?>

            <div class="advance-badge">
                <span class="badge bg-info"><?php echo e(__('On-sale')); ?></span>
            </div>
            <?php endif; ?>
            <?php if($c['level_tags'] == 'bestseller'): ?>

            <div class="advance-badge">
                <span class="badge bg-success"><?php echo e(__('Bestseller')); ?></span>
            </div>
            <?php endif; ?>
            <?php if($c['level_tags'] == 'beginner'): ?>

            <div class="advance-badge">
                <span class="badge bg-primary"><?php echo e(__('Beginner')); ?></span>
            </div>
            <?php endif; ?>
            <?php if($c['level_tags'] == 'intermediate'): ?>

            <div class="advance-badge">
                <span class="badge bg-secondary"><?php echo e(__('Intermediate')); ?></span>
            </div>
            <?php endif; ?>
            <div class="courses-content">    
                <div class="view-user-img">
                    <?php if($c->user['user_img'] !== NULL && $c->user['user_img'] !== ''): ?>
                    <a href="<?php echo e(route('all/profile',$c->user->id)); ?>" title=""><img src="<?php echo e(asset('images/user_img/'.$c->user['user_img'])); ?>" class="img-fluid user-img-one" alt=""></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('all/profile',$c->user->id)); ?>" title=""><img src="<?php echo e(asset('images/default/user.png')); ?>" class="img-fluid user-img-one" alt=""></a>
                    <?php endif; ?>
                 
                </div>                              
                <div class="cat">
                    <div class="rate text-right">
                        <?php if( $c->type == 1): ?>
                                            <div class="rate text-right">
                                                <ul>
                                                    <?php if($c->discount_price == !NULL): ?>
                                                       
                                                        <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format( currency($c['discount_price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></b></a></li>
                                                        <li><a><b><strike><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></strike></b></a></li>
                                                        <?php else: ?>
                                                        <?php if($c->price == !NULL): ?> 
                                                        <li><a><b><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></b></a></li>
                                                        <?php endif; ?>
                                                      
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
                <h3><a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>" tabindex="0"><?php echo e($c->title); ?></a></h3>
                <p><?php echo e(strip_tags(str_limit($c['short_detail'], $limit = 200, $end = '...'))); ?></p>

                    <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>" class="readmore" tabindex="0"><?php echo e(__('Read More')); ?> <i class="fal fa-long-arrow-right"></i></a>
                </p>
            </div>
            <div class="icon">
                <img src="<?php echo e(url('frontcss/img/icon/cou-icon.png')); ?>" alt="img">
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script><?php /**PATH C:\laragon\www\eclass_purchasecopy\resources\views/tab2.blade.php ENDPATH**/ ?>
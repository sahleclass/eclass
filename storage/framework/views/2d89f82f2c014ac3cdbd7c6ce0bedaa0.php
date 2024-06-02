<?php if($gsetting->promo_enable == 1): ?>
<div id="promo-outer">
    <div id="promo-inner">
        <a href="<?php echo e($gsetting['promo_link']); ?>"><?php echo e($gsetting['promo_text']); ?></a>
        <span id="close">x</span>
    </div>
</div>
<div id="promo-tab" class="display-none"><?php echo e(__('SHOW')); ?></div>
<?php endif; ?>

<!-- header -->
<header class="header-area header-three">  
    <div class="header-top second-header d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">      
                <?php
                $user = \Auth::user(); 
               
                ?>
                
                <div class="col-lg-4 col-md-4 d-none d-lg-block ">
                    <div class="header-social">
                        <span>
                            <?php echo e(__('Follow us:-')); ?>

                            <a href="https://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a>               
                            <a href="https://twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a>
                        </span>                    
                            <!--  /social media icon redux -->                               
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 d-none d-lg-block text-right">
                    <div class="header-cta">
                        <ul>
                            <li>
                                <div class="call-box">
                                    <div class="icon">
                                        <img src="<?php echo e(url('frontcss/img/icon/phone-call.png')); ?>">
                                    </div>
                                    <div class="text">
                                        <span><?php echo e(__('Call Now !')); ?></span>
                                        <strong><a href="tel:+917052101786"><?php echo e($gsetting->default_phone); ?></a></strong>                                              
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="call-box">
                                    <div class="icon">
                                        <img src="<?php echo e(url('frontcss/img/icon/mailing.png')); ?>">
                                    </div>
                                    <div class="text">
                                        <span><?php echo e(__('Email Now')); ?></span>
                                        <strong><a href="mailto:info@example.com"><?php echo e($gsetting->wel_email); ?> </a></strong>                                               
                                    </div>
                                </div>
                            </li>                                 
                        </ul>
                    </div>                        
                </div>
                 
            </div>
        </div>
    </div>		
    <div id="header-sticky" class="menu-area">
        <div class="container">
            <div class="second-menu fullscreen">
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="logo">
                            <?php if($gsetting->logo_type == 'L'): ?>
                            <a href="<?php echo e(url('/')); ?>" ><img src="<?php echo e(asset('images/logo/'.$gsetting->logo)); ?>" class="img-fluid" alt="logo"></a>
                            <?php else: ?>
                            <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($gsetting->project_title); ?></div></b></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                    
                        <div class="main-menu text-center text-xl-right">
                            <nav id="mobile-menu">
                                
                                <ul>
                                    <li class="has-sub">
                                        <a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a>
                                    </li>
                                         
                                    
                                    <li id="cssmenu" class="has-sub navigation">
                                        <a href="#" title="Categories"><?php echo e(__('Categories')); ?></a>
                                        <?php
                                        $categories = App\Categories::orderBy('position','ASC')->with(['subcategory','subcategory.childcategory'])->get();
                                        ?>
                                        <ul class="">
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($cate->status == 1 ): ?>
                                                    <li><a href="<?php echo e(route('category.page',['id' => $cate->id, 'category' => $cate->title])); ?>" title="<?php echo e($cate->title); ?>"><?php echo e(str_limit($cate->title, $limit = 25, $end = '..')); ?> <i data-feather="chevron-right" class="float-right"></i></a>
                                                        <ul>   
                                                            <?php $__currentLoopData = $cate->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($sub->status ==1): ?>
                                                            <li><a href="<?php echo e(route('subcategory.page',['id' => $sub->id, 'category' => $sub->title])); ?>" title="<?php echo e($sub->title); ?>"><?php echo e(str_limit($sub->title, $limit = 25, $end = '..')); ?>

                                                                <i data-feather="chevron-right" class="float-right"></i></a>
                                                                <ul>
                                                                    <?php $__currentLoopData = $sub->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($child->status ==1): ?>
                                                                    <li>
                                                                        <a href="<?php echo e(route('childcategory.page',['id' => $child->id, 'category' => $child->title])); ?>" title="<?php echo e($child->title); ?>"><?php echo e(str_limit($child->title, $limit = 25, $end = '..')); ?></a>
                                                                    </li>
                                                                    <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a href="<?php echo e(route('about.show')); ?>"><?php echo e(__('About Us')); ?></a>
                                    </li>   
                                    <li class="has-sub"> 
                                        <a href="<?php echo e(route('blog.all')); ?>"><?php echo e(__('Blog')); ?></a>
                                    </li>
                                    <li><a href="<?php echo e(url('user_contact')); ?>"><?php echo e(__('Contact')); ?></a></li>                                               
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-3">
                        <?php if(auth()->guard()->guest()): ?>
                        <div class="Login-btn second-header-btn">
                            <a href="<?php echo e(route('register')); ?>" class="btn" title="register"><?php echo e(__('Register')); ?></a>
                        </div> 
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                        <div class="nav-admin-icon">
                            <div class="row">
                                <div class="col-lg-2 col-md-1 col-sm-2 col-2">
                                    <div class="nav-wishlist">
                                        <ul id="nav">
                                            <li id="notification_li">
                                                <a href="<?php echo e(url('send')); ?>" id="notificationLink" title="Notification"><i data-feather="bell"></i></a>
                                                <span class="red-menu-badge red-bg-success">
                                                    <?php echo e(Auth()->user()->unreadNotifications->where('type', 'App\Notifications\UserEnroll')->count()); ?>

                                                </span>
                                                <div id="notificationContainer">
                                                    <div id="notificationTitle"><?php echo e(__('Notifications')); ?></div>
                                                    <div id="notificationsBody" class="notifications">
                                                        <ul>
                                                            <?php $__currentLoopData = Auth()->user()->unreadNotifications->where('type', 'App\Notifications\UserEnroll'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="unread-notification">
                                                                    <a href="<?php echo e(url('notifications/'.$notification->id)); ?>">          
                                                                    <div class="notification-image">
                                                                        <?php if($notification->data['image'] !== NULL ): ?>
                                                                            <img src="<?php echo e(asset('images/course/'.$notification->data['image'])); ?>" alt="course" class="img-fluid" >
                                                                        <?php else: ?>
                                                                            <img src="<?php echo e(Avatar::create($notification->data['id'])->toBase64()); ?>" alt="course" class="img-fluid">
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="notification-data">
                                                                        In <?php echo e(str_limit($notification->data['id'], $limit = 20, $end = '...')); ?>

                                                                        <br>
                                                                        <?php echo e(str_limit($notification->data['data'], $limit = 20, $end = '...')); ?>

                                                                    </div>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                                                            <?php $__currentLoopData = Auth()->user()->readNotifications->where('type', 'App\Notifications\UserEnroll'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('mycourse.show')); ?>">
                                                                    <div class="notification-image">
                                                                        <?php if($notification->data['image'] !== NULL ): ?>
                                                                            <img src="<?php echo e(asset('images/course/'.$notification->data['image'])); ?>" alt="course" class="img-fluid" >
                                                                        <?php else: ?>
                                                                        <img src="<?php echo e(Avatar::create($notification->data['id'])->toBase64()); ?>" alt="course" class="img-fluid">
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="notification-data">
                                                                        In <?php echo e(str_limit($notification->data['id'], $limit = 20, $end = '...')); ?>

                                                                        <br>
                                                                        <?php echo e(str_limit($notification->data['data'], $limit = 20, $end = '...')); ?>

                                                                    </div>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                    <div id="notificationFooter"><a href="<?php echo e(route('deleteNotification')); ?>"><?php echo e(__('ClearAll')); ?></a></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-1 col-sm-2 col-2">
                                    <div class="nav-wishlist">
                                        <ul>
                                            <li id="wishlist_li">
                                                <a href="<?php echo e(route('wishlist.show')); ?>" title="Go to Wishlist"><i data-feather="heart"></i></a>
                                                <span class="red-menu-badge red-bg-success">
                                                    <?php
                                                        $wishlist = App\Wishlist::where('user_id', Auth::User()->id)->get();
                                                        
                                                    ?>
                    
                                                    
                    
                                                    <?php
                                                        $counter = 0;
                                                        foreach ($wishlist as $item) {
                                                            if($item->courses->status == '1'){
                    
                                                                
                                                            $counter++;
                        
                                                            }
                                                        }
                    
                                                        echo  $counter; 
                                                    ?>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>  
                                </div>
                                <div class="col-lg-2">
                                    <div class="shopping-cart">
                                        <ul>
                                            <li id="shopping_li">
                                                <a href="<?php echo e(route('cart.show')); ?>" title="Cart"><i data-feather="shopping-cart"></i></a>
                                                <span class="red-menu-badge red-bg-success">
                                                    <?php
                                                        $item = App\Cart::where('user_id', Auth::User()->id)->count();
                                                        if($item>0){
                                
                                                            echo $item;
                                                        }
                                                        else{
                                
                                                            echo "0";
                                                        }
                                                    ?>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="search search-one" id="search">
                                        <form method="GET" id="searchform" action="<?php echo e(route('search')); ?>">
                                        <div class="search-input-wrap">
                                            <input class="search-input" name="searchTerm" placeholder="Search in Site" type="text" id="course_name" autocomplete="off" />
                                        </div>
                                        <input class="search-submit" type="submit" id="go" value="">
                                        <div class="icon"><i data-feather="search"></i></div>
                                        <div id="course_data"></div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                $user = \Auth::user(); 
                                $roles = $user->getRoleNames();
                                $test_id = Spatie\Permission\Models\Role::select('id')->where('name',$roles[0])->get();
                                $dropdown = App\Dropdown::where('role_id', $test_id[0]['id'])->get();
                                ?>
                                <?php if($roles[0] != "admin" &&  $roles[0] != "instructor" && $roles[0] != "user"): ?>
                                <?php $__currentLoopData = $dropdown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-5 col-md-3 col-sm-6 col-6">
                                    <div class="my-container second-header-btn">
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle  my-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                               <?php if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img'])): ?>
                                                <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="circle" alt="<?php echo e(Auth::User()->fname); ?>">
                                              <?php else: ?>
                                                  <img src="<?php echo e(asset('images/default/user.jpg')); ?>"  class="circle" alt="<?php echo e(Auth::User()->fname); ?>">
                                              <?php endif; ?>
                                              <span class="dropdown__item name" id="name"><?php echo e(str_limit(Auth::User()->fname, $limit = 10, $end = '..')); ?></span>
                                              <span class="dropdown__item caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right User-Dropdown U-open" aria-labelledby="dropdownMenu1">
                                                <div id="notificationTitle">
                                                    <?php if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img'])): ?>
                                                        <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="dropdown-user-circle" alt="<?php echo e(Auth::User()->fname); ?>">
                                                    <?php else: ?>
                                                      <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="dropdown-user-circle" alt="<?php echo e(Auth::User()->fname); ?>">
                                                    <?php endif; ?>
                                                    <div class="user-detailss">
                                                      <?php echo e(Auth::User()->fname); ?>

                                                      <br>
                                                      <?php echo e(Auth::User()->email); ?>

                                                    </div>                                    
                                                </div>
                                                <div class="scroll-down">
                                                    <?php if(Auth::User()->role == "admin" ): ?>                               
                                                        <a target="_blank" href="<?php echo e(url('/admins')); ?>" title="<?php echo e(__('Admin Dashboard')); ?>"><li><i data-feather="pie-chart"></i><?php echo e(__('Admin Dashboard')); ?></li></a>
                                             
                                                    <?php endif; ?>
                                                    <?php if(Auth::User()->role == "instructor"): ?>
                    
                                                    <a target="_blank" href="<?php echo e(url('/instructor')); ?>" title="<?php echo e(__('Instructor Dashboard')); ?>"><li><i data-feather="pie-chart"></i><?php echo e(__('Instructor Dashboard')); ?></li></a>
                                                    <?php endif; ?>
              
                                            
                                                    <?php if($drop->my_courses == '1'): ?>
                                                    <a href="<?php echo e(route('mycourse.show')); ?>" title="<?php echo e(__('My Courses')); ?>"><li><i data-feather="book-open"></i><?php echo e(__('My Courses')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if($drop->my_wishlist == '1'): ?>
                                                    <a href="<?php echo e(route('wishlist.show')); ?>" title="<?php echo e(__('Wishlist')); ?>"><li><i data-feather="heart"></i><?php echo e(__('Wishlist')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if($drop->purchased_history == '1'): ?>
                                                    <a href="<?php echo e(route('purchase.show')); ?>" title="<?php echo e(__('Purchased History')); ?>"><li><i data-feather="shopping-cart"></i><?php echo e(__('Purchased History')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if($drop->my_profile == '1'): ?>
                                                    <a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>" title="<?php echo e(__('Profile')); ?>"><li><i data-feather="user"></i><?php echo e(__('Profile')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if(Auth::User()->role == "user"): ?>
                                                    <?php if($gsetting->instructor_enable == 1): ?>
                                                    <a href="#" data-toggle="modal" data-target="#myModalinstructor"  title="<?php echo e(__('Become An Instructor')); ?>"><li><i data-feather="shield"></i><?php echo e(__('Become An Instructor')); ?></li></a>
                                                    <?php endif; ?>
                                      
                                                    <?php endif; ?>
                                                    <?php if($drop->flash_deal == '1'): ?>
                                                    <a href="<?php echo e(route('flash.deals')); ?>" title="<?php echo e(__('Flash Deal')); ?>"><li><i data-feather="battery-charging"></i><?php echo e(__('Flash Deals')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if(env('ENABLE_INSTRUCTOR_SUBS_SYSTEM') == 1): ?>
                                                    <?php if(Auth::User()->role == "instructor"): ?>
                                                    <a href="<?php echo e(route('plan.page')); ?>" title="<?php echo e(__('Instructor Plan')); ?>"><li><i data-feather="tag"></i><?php echo e(__('Instructor Plan')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if(Auth::User()->role == "user" || Auth::User()->role == "instructor"): ?>
                                                    <?php if($gsetting->device_control == 1): ?>
                                                    <a href="<?php echo e(route('active.courses')); ?>" title="<?php echo e(__('Watchlist')); ?>"><li><i data-feather="framer"></i><?php echo e(__('Watchlist')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>                                
                                                    <?php if($gsetting->donation_enable == 1 && $drop->donation == '1'): ?>
                                                    <a target="__blank" href="<?php echo e($gsetting->donation_link); ?>" title="<?php echo e(__('Donation')); ?>"><li><i data-feather="framer"></i><?php echo e(__('Donation')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if($gsetting->affilate == 1 && $drop->my_wallet == '1'): ?>
                                                    <?php if(Schema::hasTable('affiliate') && Schema::hasTable('wallet_settings')): ?>
                                                    <?php endif; ?>
                                                    <?php if(isset($wallet_settings) && $wallet_settings->status == 1): ?>
                                                    <a href="<?php echo e(url('/wallet')); ?>" title="<?php echo e(__('Wallet')); ?>"><li><i class="icon-wallet icons"></i><?php echo e(__('Wallet')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if(isset($affiliate) && $affiliate->status == 1): ?>
                                                    <a href="<?php echo e(route('get.affiliate')); ?>" title="<?php echo e(__('Affiliate')); ?>"><li><i data-feather="users"></i><?php echo e(__('Affiliate')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if($drop->compare == '1'): ?>
                                                    <a href="<?php echo e(route('compare.index')); ?>" title="<?php echo e(__('Compare')); ?>"><li><i data-feather="bar-chart"></i><?php echo e(__("Compare")); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if($drop->search_job == '1'): ?>
                                                    <?php if(Module::has('Resume') && Module::find('Resume')->isEnabled()): ?>
                                                        <?php echo $__env->make('resume::front.searchresume', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if($drop->job_portal == '1'): ?>
                                                    <?php if(Module::has('Resume') && Module::find('Resume')->isEnabled()): ?>
                                                        <?php echo $__env->make('resume::front.job.icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if($drop->form_enable == '1'): ?>
                                                    <?php if(Module::find('Forum') && Module::find('Forum')->isEnabled()): ?>
                                                        <?php if($gsetting->forum_enable == 1): ?>
                                                            <?php echo $__env->make('forum::layouts.sidebar_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if($drop->my_leadership == '1'): ?>
                                                    <a href="<?php echo e(route('my.leaderboard')); ?>" title="<?php echo e(__('leader Board')); ?>"><li><i class="icon-chart icons"></i><?php echo e(__('Leader Board')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if(Auth::User()->role == "user"): ?>
                                                    <a href="<?php echo e(route('studentprofile')); ?>" title="<?php echo e(__('Share Profile')); ?>"><li><i data-feather="share"></i><?php echo e(__('Share Profile')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if($drop->affilate_dashboard == '1'): ?>
                                                    <a href="<?php echo e(route('affilate.report')); ?>"><li><i data-feather="users"></i><?php echo e(__('Affiliate Dashboard')); ?></li></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('batch.front')); ?>" title="<?php echo e(__('Batch')); ?>"><li><i data-feather="book-open"></i><?php echo e(__('Batch')); ?></li></a>
                                                    </div>
                                                    <?php if(Module::has('Ebook') && Module::find('Ebook')->isEnabled()): ?>
                                                    <a href="<?php echo e(route('web.ebook.confirm-order')); ?>" title="<?php echo e(__('My eBook')); ?>"><li><i data-feather="book-open"></i><?php echo e(__('My eBook')); ?></li></a>
                                                    <?php endif; ?> 
                                                    <a href="<?php echo e(route('logout')); ?>" title="<?php echo e(__('Logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <div id="notificationFooter">
                                                            <?php echo e(__('Logout')); ?>                                        
                                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="display-none">
                                                                <?php echo csrf_field(); ?>
                                                            </form>
                                                        </div>
                                                    </a>
                                                
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <div class="col-lg-5 col-md-3 col-sm-6 col-6">
                                    <div class="my-container second-header-btn">
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle  my-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <?php if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img'])): ?>
                                                <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="circle" alt="">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>"  class="circle" alt="">
                                                <?php endif; ?>
                                                <span class="dropdown__item name" id="name"><?php echo e(str_limit(Auth::User()->fname, $limit = 10, $end = '..')); ?></span>
                                                <span class="dropdown__item caret"></span>
                                            </button>
                
                                            <ul class="dropdown-menu dropdown-menu-right User-Dropdown U-open" aria-labelledby="dropdownMenu1">
                                                <div id="notificationTitle">
                                                    <?php if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img'])): ?>
                                                    <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="dropdown-user-circle" alt="">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="dropdown-user-circle" alt="">
                                                    <?php endif; ?>
                                                    <div class="user-detailss">
                                                        <?php echo e(Auth::User()->fname); ?>

                                                        <br>
                                                        <?php echo e(Auth::User()->email); ?>

                                                    </div>
                                                    
                                                </div>
                
                                                <div class="scroll-down">
                                                    <?php if(Auth::User()->role == "admin" ): ?>                               
                                                    <a target="_blank" href="<?php echo e(url('/admins')); ?>" title="<?php echo e(__('Admin Dashboard')); ?>"><li><i data-feather="pie-chart"></i><?php echo e(__('Admin Dashboard')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if(Auth::User()->role == "instructor"): ?>
                                                    <a target="_blank" href="<?php echo e(url('/instructor')); ?>" title="<?php echo e(__('Instructor Dashboard')); ?>"><li><i data-feather="pie-chart"></i><?php echo e(__('Instructor Dashboard')); ?></li></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('mycourse.show')); ?>" title="<?php echo e(__('My Courses')); ?>"><li><i data-feather="book-open"></i><?php echo e(__('My Courses')); ?></li></a>
                                                    <a href="<?php echo e(route('wishlist.show')); ?>" title="<?php echo e(__('Wishlist')); ?>"><li><i data-feather="heart"></i><?php echo e(__('Wishlist')); ?></li></a>
                                                    <a href="<?php echo e(route('purchase.show')); ?>" title="<?php echo e(__('Purchased History')); ?>"><li><i data-feather="shopping-cart"></i><?php echo e(__('Purchased History')); ?></li></a>
                                                    <a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>" title="<?php echo e(__('Profile')); ?>"><li><i data-feather="user"></i><?php echo e(__('Profile')); ?></li></a>
                                                    <?php if(Auth::User()->role == "user"): ?>
                                                    <?php if($gsetting->instructor_enable == 1): ?>
                                                    <a href="#" data-toggle="modal" data-target="#myModalinstructor" title="<?php echo e(__('Become An Instructor')); ?>"><li><i data-feather="shield"></i><?php echo e(__('Become An Instructor')); ?></li></a>
                                                    <?php endif; ?>                        
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('flash.deals')); ?>" title="<?php echo e(__('Flash Deals')); ?>"><li><i data-feather="battery-charging"></i><?php echo e(__('Flash Deals')); ?></li></a>
                                                    <?php if(env('ENABLE_INSTRUCTOR_SUBS_SYSTEM') == 1): ?>
                                                    <?php if(Auth::User()->role == "instructor"): ?>
                                                    <a href="<?php echo e(route('plan.page')); ?>" title="<?php echo e(__('Instructor Plan')); ?>"><li><i data-feather="tag"></i><?php echo e(__('Instructor Plan')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if(Auth::User()->role == "user" || Auth::User()->role == "instructor"): ?>
                                                    <?php if($gsetting->device_control == 1): ?>
                                                    <a href="<?php echo e(route('active.courses')); ?>" title="<?php echo e(__('Watchlist')); ?>"><li><i data-feather="framer"></i><?php echo e(__('Watchlist')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if($gsetting->donation_enable == 1): ?>
                                                    <a target="__blank" href="<?php echo e($gsetting->donation_link); ?>" title="<?php echo e(__('Donation')); ?>"><li><i data-feather="framer"></i><?php echo e(__('Donation')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if(Schema::hasTable('affiliate') && Schema::hasTable('wallet_settings')): ?>
                                                    <?php if(isset($wallet_settings) && $wallet_settings->status == 1): ?>
                                                    <a href="<?php echo e(url('/wallet')); ?>" title="<?php echo e(__('Wallet')); ?>"><li><i class="icon-wallet icons"></i><?php echo e(__('Wallet')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php if(isset($affiliate) && $affiliate->status == 1): ?>
                                                    <a href="<?php echo e(route('get.affiliate')); ?>" title="<?php echo e(__('Affiliate')); ?>"><li><i data-feather="users"></i><?php echo e(__('Affiliate')); ?></li></a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('compare.index')); ?>" title="<?php echo e(__('Compare')); ?>"><li><i data-feather="bar-chart"></i><?php echo e(__("Compare")); ?></li></a>
                                                    <?php if(Module::has('Resume') && Module::find('Resume')->isEnabled()): ?>
                                                        <?php echo $__env->make('resume::front.searchresume', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                    <?php if(Module::has('Resume') && Module::find('Resume')->isEnabled()): ?>
                                                        <?php echo $__env->make('resume::front.job.icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>                               
                                                    <?php if(Module::find('Forum') && Module::find('Forum')->isEnabled()): ?>
                                                        <?php if($gsetting->forum_enable == 1): ?>
                                                            <?php echo $__env->make('forum::layouts.sidebar_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('my.leaderboard')); ?>" title="<?php echo e(__('Leader Board')); ?>"><li><i class="icon-chart icons"></i><?php echo e(__('Leader Board')); ?></li></a>
                                                    <?php if(Auth::User()->role == "user"): ?>
                                                    <a href="<?php echo e(route('studentprofile')); ?>" title="<?php echo e(__('Share Profile')); ?>"><li><i data-feather="share"></i><?php echo e(__('Share Profile')); ?></li></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('affilate.report')); ?>" title="<?php echo e(__('Affiliate Dashboard')); ?>"><li><i data-feather="users"></i><?php echo e(__('Affiliate Dashboard')); ?></li></a>
                                                    <a href="<?php echo e(route('batch.front')); ?>" title="<?php echo e(__('Batch')); ?>"><li><i data-feather="book-open"></i><?php echo e(__('Batch')); ?></li></a>
                                                    <?php if(Module::has('Ebook') && Module::find('Ebook')->isEnabled()): ?>
                                                    <a href="<?php echo e(route('web.ebook.confirm-order')); ?>" title="<?php echo e(__('My eBook')); ?>"><li><i data-feather="book-open"></i><?php echo e(__('My eBook')); ?></li></a>
                                                    <?php endif; ?> 
                                                </div>
                                                <a href="<?php echo e(route('logout')); ?>" title="<?php echo e(__('Logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <div id="notificationFooter">
                                                        <?php echo e(__('Logout')); ?>                                        
                                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="display-none">
                                                            <?php echo csrf_field(); ?>
                                                        </form>
                                                    </div>
                                                </a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php endif; ?>                   
                    </div>
                    
                </div>
            </div>
            <div class="second-menu mobilescreen">
                <div class="row">
                    <div class="col-5">
                        <div class="logo">
                            <div class="logo">
                                <?php if($gsetting->logo_type == 'L'): ?>
                                <a href="<?php echo e(url('/')); ?>" ><img src="<?php echo e(asset('images/logo/'.$gsetting->logo)); ?>" class="img-fluid" alt="logo"></a>
                                <?php else: ?>
                                <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($gsetting->project_title); ?></div></b></a>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-2"></div>                    
                    <div class="col-5">
                        <?php if(auth()->guard()->guest()): ?>
                        <div class="Login-btn second-header-btn">
                            <a href="<?php echo e(route('register')); ?>" class="btn" title="register"><?php echo e(__('Register')); ?></a>
                        </div> 
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                        <div class="nav-admin-icon">
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-2 col-3">
                                    <div class="shopping-cart">
                                        <a href="<?php echo e(route('cart.show')); ?>" title="Cart"><i data-feather="shopping-cart"></i></a>
                                        <span class="red-menu-badge red-bg-success">
                                            <?php
                                                $item = App\Cart::where('user_id', Auth::User()->id)->count();
                                                if($item>0){
                        
                                                    echo $item;
                                                }
                                                else{
                        
                                                    echo "0";
                                                }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-2 col-3">
                                    <div class="search search-one" id="search">
                                        <form method="GET" id="searchform" action="<?php echo e(route('search')); ?>">
                                        <div class="search-input-wrap">
                                            <input class="search-input" name="searchTerm" placeholder="Search in Site" type="text" id="course_name" autocomplete="off" />
                                        </div>
                                        <input class="search-submit" type="submit" id="go" value="">
                                        <div class="icon"><i data-feather="search"></i></div>
                                        <div id="course_data"></div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                $user = \Auth::user(); 
                                $roles = $user->getRoleNames();
                                $test_id = Spatie\Permission\Models\Role::select('id')->where('name',$roles[0])->get();
                                $dropdown = App\Dropdown::where('role_id', $test_id[0]['id'])->get();
                                ?>
                                <?php if($roles[0] != "admin" &&  $roles[0] != "instructor" && $roles[0] != "user"): ?>
                                <?php $__currentLoopData = $dropdown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 col-6">
                                    <div class="my-container">
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle  my-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <?php if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img'])): ?>
                                                <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="circle" alt="">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>"  class="circle" alt="">
                                                <?php endif; ?>
                                                
                                                <span class="dropdown__item caret"></span>
                                            </button>
            
                                            <ul class="dropdown-menu dropdown-menu-right User-Dropdown U-open" aria-labelledby="dropdownMenu1">
                                                <div id="notificationTitle">
                                                    <?php if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img'])): ?>
                                                    <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="dropdown-user-circle" alt="">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="dropdown-user-circle" alt="">
                                                    <?php endif; ?>
                                                    <div class="user-detailss">
                                                        <?php echo e(Auth::User()->fname); ?>

                                                        <br>
                                                        <?php echo e(Auth::User()->email); ?>

                                                    </div>
                                                    
                                                </div>
                
                                                <div class="scroll-down">
                
                                                <?php if(Auth::User()->role == "admin" ): ?>
                                            
                                                <a target="_blank" href="<?php echo e(url('/admins')); ?>"><li><i data-feather="pie-chart"></i><?php echo e(__('AdminDashboard')); ?></li></a>
                                            
                                                <?php endif; ?>
                                                <?php if(Auth::User()->role == "instructor"): ?>
                
                                                <a target="_blank" href="<?php echo e(url('/instructor')); ?>"><li><i data-feather="pie-chart"></i><?php echo e(__('InstructorDashboard')); ?></li></a>
                                                <?php endif; ?>
                
                                            
                                                <?php if($drop->my_courses == '1'): ?>
                                                <a href="<?php echo e(route('mycourse.show')); ?>"><li><i data-feather="book-open"></i><?php echo e(__('MyCourses')); ?></li></a>
                                                <?php endif; ?>
                                                <?php if($drop->my_wishlist == '1'): ?>
                                                <a href="<?php echo e(route('wishlist.show')); ?>"><li><i data-feather="heart"></i><?php echo e(__('MyWishlist')); ?></li></a>
                                                <?php endif; ?>
                                                <?php if($drop->purchased_history == '1'): ?>
                                                <a href="<?php echo e(route('purchase.show')); ?>"><li><i data-feather="shopping-cart"></i><?php echo e(__('PurchaseHistory')); ?></li></a>
                                                <?php endif; ?>
                                                <?php if($drop->my_profile == '1'): ?>
                                                <a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>"><li><i data-feather="user"></i><?php echo e(__('UserProfile')); ?></li></a>
                                                <?php endif; ?>
                                                <?php if($drop->course == '1'): ?>
                                                <a href="<?php echo e(route('all.course',Auth::User()->id)); ?>"><li><i data-feather="user"></i><?php echo e(__('course')); ?></li></a>
                                                <?php endif; ?>
                                                
                                                
                                                <?php if($drop->flash_deal == '1'): ?>
                                                <a href="<?php echo e(route('flash.deals')); ?>"><li><i data-feather="battery-charging"></i><?php echo e(__('Flash Deals')); ?></li></a>
                                                <?php endif; ?>
                
                                                
                
                
                                                <?php if(Auth::User()->role == "user" || Auth::User()->role == "instructor"): ?>
                                                <?php if($gsetting->device_control == 1): ?>
                                                <a href="<?php echo e(route('active.courses')); ?>" title="Watchlist"><li><i data-feather="framer"></i><?php echo e(__('Watchlist')); ?></li></a>
                                                <?php endif; ?>
                                                <?php endif; ?>
                
                                                
                                                <?php if($gsetting->donation_enable == 1 && $drop->donation == '1'): ?>
                                                <a target="__blank" href="<?php echo e($gsetting->donation_link); ?>" title="Donation"><li><i data-feather="framer"></i><?php echo e(__('Donation')); ?></li></a>
                                                <?php endif; ?>
                                                <?php if($gsetting->affilate == 1 && $drop->my_wallet == '1'): ?>
                                                <?php if(Schema::hasTable('affiliate') && Schema::hasTable('wallet_settings')): ?>
                                                <?php endif; ?>
                                                
                
                                                <?php if(isset($wallet_settings) && $wallet_settings->status == 1): ?>
                                                <a href="<?php echo e(url('/wallet')); ?>"><li><i class="icon-wallet icons"></i><?php echo e(__('MyWallet')); ?></li></a>
                                                <?php endif; ?>
                
                                                <?php if(isset($affiliate) && $affiliate->status == 1): ?>
                                                <a href="<?php echo e(route('get.affiliate')); ?>"><li><i data-feather="users"></i><?php echo e(__('Affiliate')); ?></li></a>
                                                <?php endif; ?>
                
                                                <?php endif; ?>
                                                <?php if($drop->compare == '1'): ?>
                                                <a href="<?php echo e(route('compare.index')); ?>"><li><i data-feather="bar-chart"></i><?php echo e(__("Compare")); ?></li></a>
                                                <?php endif; ?>
                                                <?php if($drop->my_leadership == '1'): ?>
                                                <a href="<?php echo e(route('my.leaderboard')); ?>"><li><i data-feather="icon-chart icons"></i><?php echo e(__('MyLeaderboard')); ?></li></a>
                                                <?php endif; ?>
                                                <?php if(Auth::User()->role == "user"): ?>
                                                <a href="<?php echo e(route('studentprofile')); ?>"><li><i data-feather="share"></i><?php echo e(__('Share profile')); ?></li></a>
                                                <?php endif; ?>
                                                <?php if($drop->affilate_dashboard == '1'): ?>
                                                <a href="<?php echo e(route('affilate.report')); ?>"><li><i data-feather="users"></i><?php echo e(__('Affiliate Dashboard')); ?></li></a>
                                                <?php endif; ?>
                                                <?php if($drop->batch == '1'): ?>
                                                <a href="<?php echo e(route('batch.front')); ?>"><li><i data-feather="book-open"></i><?php echo e(__('Batch')); ?></li></a>
                                                <?php endif; ?>
                                                </div>
                                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <div id="notificationFooter">
                                                        <?php echo e(__('Logout')); ?>

                                                        
                                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="display-none">
                                                            <?php echo csrf_field(); ?>
                                                        </form>
                                                    </div>
                                                </a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 col-6">
                                    <div class="my-container">
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle  my-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <?php if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img'])): ?>
                                                <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="circle" alt="">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>"  class="circle" alt="">
                                                <?php endif; ?>
                                                
                                                <span class="dropdown__item caret"></span>
                                            </button>
                
                                            <ul class="dropdown-menu dropdown-menu-right User-Dropdown U-open" aria-labelledby="dropdownMenu1">
                                                <div id="notificationTitle">
                                                    <?php if(Auth::User()['user_img'] != null && Auth::User()['user_img'] !='' && @file_get_contents('images/user_img/'.Auth::user()['user_img'])): ?>
                                                    <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="dropdown-user-circle" alt="">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="dropdown-user-circle" alt="">
                                                    <?php endif; ?>
                                                    <div class="user-detailss">
                                                        <?php echo e(Auth::User()->fname); ?>

                                                        <br>
                                                        <?php echo e(Auth::User()->email); ?>

                                                    </div>
                                                    
                                                </div>
                
                                                <div class="scroll-down">
                
                                                <?php if(Auth::User()->role == "admin" ): ?>
                                            
                                                <a target="_blank" href="<?php echo e(url('/admins')); ?>"><li><i data-feather="pie-chart"></i><?php echo e(__('AdminDashboard')); ?></li></a>
                                            
                                                <?php endif; ?>
                                                <?php if(Auth::User()->role == "instructor"): ?>
                
                                                <a target="_blank" href="<?php echo e(url('/instructor')); ?>"><li><i data-feather="pie-chart"></i><?php echo e(__('InstructorDashboard')); ?></li></a>
                                                <?php endif; ?>
                
                                            
                                        
                                                <a href="<?php echo e(route('mycourse.show')); ?>"><li><i data-feather="book-open"></i><?php echo e(__('MyCourses')); ?></li></a>
                
                                                <a href="<?php echo e(route('wishlist.show')); ?>"><li><i data-feather="heart"></i><?php echo e(__('MyWishlist')); ?></li></a>
                                                <a href="<?php echo e(route('purchase.show')); ?>"><li><i data-feather="shopping-cart"></i><?php echo e(__('PurchaseHistory')); ?></li></a>
                                                <a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>"><li><i data-feather="user"></i><?php echo e(__('UserProfile')); ?></li></a>
                                                <?php if(Auth::User()->role == "user"): ?>
                                                <?php if($gsetting->instructor_enable == 1): ?>
                                                <a href="#" data-toggle="modal" data-target="#myModalinstructor" title="Become An Instructor"><li><i data-feather="shield"></i><?php echo e(__('BecomeAnInstructor')); ?></li></a>
                
                                                <?php endif; ?>
                                        
                                                <?php endif; ?>
                
                                                <a href="<?php echo e(route('flash.deals')); ?>"><li><i data-feather="battery-charging"></i><?php echo e(__('Flash Deals')); ?></li></a>
                
                
                                                <?php if(env('ENABLE_INSTRUCTOR_SUBS_SYSTEM') == 1): ?>
                
                                                <?php if(Auth::User()->role == "instructor"): ?>
                                                <a href="<?php echo e(route('plan.page')); ?>"><li><i data-feather="tag"></i><?php echo e(__('InstructorPlan')); ?></li></a>
                                                <?php endif; ?>
                                                <?php endif; ?>
                
                
                                                <?php if(Auth::User()->role == "user" || Auth::User()->role == "instructor"): ?>
                                                <?php if($gsetting->device_control == 1): ?>
                                                <a href="<?php echo e(route('active.courses')); ?>" title="Watchlist"><li><i data-feather="framer"></i><?php echo e(__('Watchlist')); ?></li></a>
                                                <?php endif; ?>
                                                <?php endif; ?>
                
                
                                                <?php if($gsetting->donation_enable == 1): ?>
                                                <a target="__blank" href="<?php echo e($gsetting->donation_link); ?>" title="Donation"><li><i data-feather="framer"></i><?php echo e(__('Donation')); ?></li></a>
                                                <?php endif; ?>
                
                                                <?php if(Schema::hasTable('affiliate') && Schema::hasTable('wallet_settings')): ?>
                
                                                
                
                                                <?php if(isset($wallet_settings) && $wallet_settings->status == 1): ?>
                                                <a href="<?php echo e(url('/wallet')); ?>"><li><i class="icon-wallet icons"></i><?php echo e(__('MyWallet')); ?></li></a>
                                                <?php endif; ?>
                
                                                <?php if(isset($affiliate) && $affiliate->status == 1): ?>
                                                <a href="<?php echo e(route('get.affiliate')); ?>"><li><i data-feather="users"></i><?php echo e(__('Affiliate')); ?></li></a>
                                                <?php endif; ?>
                
                                                <?php endif; ?>
                
                                                <a href="<?php echo e(route('compare.index')); ?>"><li><i data-feather="bar-chart"></i><?php echo e(__("Compare")); ?></li></a>
                                                <a href="<?php echo e(route('my.leaderboard')); ?>"><li><i class="icon-chart icons"></i><?php echo e(__('MyLeaderboard')); ?></li></a>
                                                <?php if(Auth::User()->role == "user"): ?>
                                                <a href="<?php echo e(route('studentprofile')); ?>"><li><i data-feather="share"></i><?php echo e(__('Share profile')); ?></li></a>
                                                <?php endif; ?>
                                                <a href="<?php echo e(route('affilate.report')); ?>"><li><i data-feather="users"></i><?php echo e(__('Affiliate Dashboard')); ?></li></a>
                                                <a href="<?php echo e(route('batch.front')); ?>"><li><i data-feather="book-open"></i><?php echo e(__('Batch')); ?></li></a>
                                                </div>
                                                
                                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <div id="notificationFooter">
                                                        <?php echo e(__('Logout')); ?>

                                                        
                                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="display-none">
                                                            <?php echo csrf_field(); ?>
                                                        </form>
                                                    </div>
                                                </a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php endif; ?>                   
                    </div>                    
                </div>
                <div class="mobile-menu"></div>
            </div>
        </div>
    </div>
 </header>
<!-- side navigation  -->
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>


<?php echo $__env->make('instructormodel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass_purchasecopy\resources\views/theme2/nav.blade.php ENDPATH**/ ?>
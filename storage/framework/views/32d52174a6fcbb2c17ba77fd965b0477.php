
<?php $__env->startSection('title', "$cats->title"); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- categories-tab start-->
<?php if($gsetting->category_enable == 1): ?>
<section id="categories-tab" class="categories-tab-main-block">
    <div class="container-xl">
        <div id="categories-tab-slider" class="categories-tab-block owl-carousel">
            <?php
            $category = App\Categories::all();
            ?>
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cat->status == 1): ?>
            <div class="item categories-tab-dtl">
                <a href="<?php echo e(route('category.page',['id' => $cat->id, 'category' => str_slug(str_replace('-','&',$cat->slug))])); ?>" title="tab"><i class="fa <?php echo e($cat->icon); ?>"></i><?php echo e($cat->title); ?></a>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- categories-tab end-->
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
                        <h1 class=""><?php echo e($cats->title); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- category-title end -->
<!-- sub categories start -->
<?php if(isset($subcat)): ?>
<section id="categories" class="categories-main-block categories-main-block-one">
    <div class="container-xl">
        <h4 class="categories-heading"><?php echo e(__('SubCategories')); ?></h4>
        <div class="row">
            <?php $__currentLoopData = $subcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cat->status == 1): ?>
            <div class="col-lg-3 col-sm-6">
                <div class="categories-block">
                    <div class="categories-block-one">
                        <ul>
                            <li><a href="#" title="<?php echo e($cat->title); ?>"><i class="fa <?php echo e($cat->icon); ?>"></i>
                                </a></li>
                            <li><a href="<?php echo e(route('subcategory.page',['id' => $cat->id, 'category' => str_slug(str_replace('-','&',$cat->slug))])); ?>"><?php echo e($cat->title); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php elseif(isset($childcat)): ?>
<section id="categories" class="categories-main-block categories-main-block-one">
    <div class="container-xl">
        <h4 class="categories-heading"><?php echo e(__('SubCategories')); ?></h4>
        <div class="row">

            <?php $__currentLoopData = $childcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cat->status == 1): ?>
            <div class="col-lg-3 col-sm-6">
                <div class="categories-block">
                    <ul>
                        <li><a href="#" title="<?php echo e($cat->title); ?>"><i class="fa <?php echo e($cat->icon); ?>"></i>
                            </a></li>
                        <li><a href="<?php echo e(route('childcategory.page',['id' => $cat->id, 'category' => str_slug(str_replace('-','&',$cat->slug))])); ?>"><?php echo e($cat->title); ?></a></li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php else: ?>
<section id="categories" class="categories-main-block categories-main-block-one">
</section>
<?php endif; ?>
<!-- sub categories end -->
<!-- categories start -->
<section id="categories-popularity" class="categories-popularity-main-block category-filters">
    <div class="container-xl">
        <h4 class="btm-40"><?php echo e($cats->title); ?> <?php echo e(__('Courses')); ?></h4>

        <div class="row">

            <div class="col-md-6 col-sm-6">
                <div class="filter-dropdown catalog-main-block">
                    <ul>

                        <?php if(isset($subcat)): ?>

                        <li class="dropdown language-select dropdown-select-one">
                            <a href="#" data-toggle="dropdown" title="Duration" class="select"><?php echo e(__('Sort')); ?><i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-one">
                                <li>
                                    <ul>
                                        <li><a href="<?php echo e(route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'a-z' ])); ?>" title="A-Z">A-Z <?php echo e(__('Sort')); ?></a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'z-a' ])); ?>" title="Z-A">Z-A <?php echo e(__('Sort')); ?></a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'newest' ])); ?>" title="<?php echo e(__('Newest')); ?>"><?php echo e(__('Newest')); ?> </a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'featured' ])); ?>" title="<?php echo e(__('Featured')); ?>"><?php echo e(__('Featured')); ?></a></li>

                                        <br>
                                        <li><a href="<?php echo e(route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'l-h' ])); ?>" title="<?php echo e(__('Low to High')); ?>"> <?php echo e(__('Low to High')); ?></a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'h-l' ])); ?>" title="<?php echo e(__('High to Low')); ?>"> <?php echo e(__('High to Low')); ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown language-select dropdown-select rgt-15 limit-dropdown">
                            <a href="#" data-toggle="dropdown" title="Ratings" class="select"><?php echo e(__('Limit')); ?><i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul>

                                        <li><a href="<?php echo e(route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '10' ])); ?>" title="Highest Rated"><?php echo e(__('10')); ?></a></li>
                                        <br>

                                        <li><a href="<?php echo e(route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '30' ])); ?>" title="Highest Rated"><?php echo e(__('30')); ?></a></li>
                                        <br>

                                        <li><a href="<?php echo e(route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '50' ])); ?>" title="Highest Rated"><?php echo e(__('50')); ?></a></li>
                                        <br>

                                        <li><a href="<?php echo e(route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '100' ])); ?>" title="Highest Rated"><?php echo e(__('100')); ?></a></li>
                                        <br>


                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <?php elseif(isset($childcat)): ?>


                        <li class="dropdown language-select dropdown-select-one">
                            <a href="#" data-toggle="dropdown" title="Duration" class="select"><?php echo e(__('Sort')); ?><i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-one">
                                <li>
                                    <ul>
                                        <li><a href="<?php echo e(route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'a-z' ])); ?>" title="A-Z"><?php echo e(__('A-Z')); ?> <?php echo e(__('Sort')); ?></a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'z-a' ])); ?>" title="Z-A"><?php echo e(__('Z-A')); ?> <?php echo e(__('Sort')); ?></a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'newest' ])); ?>" title="<?php echo e(__('Newest')); ?>"> <?php echo e(__('Newest')); ?></a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('subcategory.page',['id' => $cats->id, 'category' =>str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'featured' ])); ?>" title="<?php echo e(__('Featured')); ?>"><?php echo e(__('Featured')); ?></a></li>

                                        <br>
                                        <li><a href="<?php echo e(route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'l-h' ])); ?>" title="<?php echo e(__('Low to High')); ?>"><?php echo e(__('Low to High')); ?></a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'h-l' ])); ?>" title="<?php echo e(__('High to Low')); ?>"><?php echo e(__('High to Low')); ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <li class="dropdown language-select dropdown-select rgt-15 limit-dropdown">
                            <a href="#" data-toggle="dropdown" title="Ratings" class="select"><?php echo e(__('Limit')); ?><i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul>

                                        <li><a href="<?php echo e(route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '10' ])); ?>" title="Highest Rated"><?php echo e(__('10')); ?></a></li>
                                        <br>

                                        <li><a href="<?php echo e(route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '30' ])); ?>" title="Highest Rated"><?php echo e(__('30')); ?></a></li>
                                        <br>

                                        <li><a href="<?php echo e(route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '50' ])); ?>" title="Highest Rated"><?php echo e(__('50')); ?></a></li>
                                        <br>

                                        <li><a href="<?php echo e(route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '100' ])); ?>" title="Highest Rated"><?php echo e(__('100')); ?></a></li>
                                        <br>


                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <?php else: ?>


                        <li class="dropdown language-select dropdown-select-one">
                            <a href="#" data-toggle="dropdown" title="Duration" class="select"><?php echo e(__('Sort')); ?><i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-one">
                                <li>
                                    <ul>
                                        <li><a href="<?php echo e(route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'a-z' ])); ?>" title="A-Z"><?php echo e(__('A-Z')); ?> <?php echo e(__('Sort')); ?></a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'z-a' ])); ?>" title="Z-A"><?php echo e(__('Z-A')); ?> <?php echo e(__('Sort')); ?></a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'newest' ])); ?>" title="<?php echo e(__('Newest')); ?>"> <?php echo e(__('Newest')); ?></a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'featured' ])); ?>" title="<?php echo e(__('Featured')); ?>"><?php echo e(__('Featured')); ?></a></li>

                                        <br>
                                        <li><a href="<?php echo e(route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'l-h' ])); ?>" title="<?php echo e(__('Low to High')); ?>"><?php echo e(__('Low to High')); ?></a></li>
                                        <br>
                                        <li><a href="<?php echo e(route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'h-l' ])); ?>" title="<?php echo e(__('High to Low')); ?>"><?php echo e(__('High to Low')); ?></a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <li class="dropdown language-select dropdown-select rgt-15 limit-dropdown">
                            <a href="#" data-toggle="dropdown" title="Ratings" class="select"><?php echo e(__('Limit')); ?><i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul>

                                        <li><a href="<?php echo e(route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '10' ])); ?>" title="Highest Rated"><?php echo e(__('10')); ?></a></li>
                                        <br>

                                        <li><a href="<?php echo e(route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '30' ])); ?>" title="Highest Rated"><?php echo e(__('30')); ?></a></li>
                                        <br>

                                        <li><a href="<?php echo e(route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '50' ])); ?>" title="Highest Rated"><?php echo e(__('50')); ?></a></li>
                                        <br>

                                        <li><a href="<?php echo e(route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '100' ])); ?>" title="Highest Rated"><?php echo e(__('100')); ?></a></li>
                                        <br>

                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <?php endif; ?>

                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 ">

                <?php
                $course_count = App\Course::where('status', '1')->count();
                ?>

                <div class="text-right">
                    <?php echo e(__('Showing result')); ?> <?php echo e($filter_count); ?> of <?php echo e($filter_count); ?>

                </div>
                <div class="btn-group-web-screen">
                    <div class="btn-group float-right mt-2 mb-4">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label id="list" class="btn btn-outline-dark active">
                                <input type="radio" name="layout" id="layout1" checked> <i data-feather="list"></i>
                            </label>
                            <label id="grid" class="btn btn-outline-dark">
                                <input type="radio" name="layout" id="layout2"> <i data-feather="grid"></i>
                            </label>
                        </div>
                    </div>
                </div>

            </div>

        </div>



        <div class="row">

            <div class="col-lg-3 col-md-4">

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" data-toggle="collapse" href="#collapseOne" data-closetxt="Stäng block" data-opentxt="Visa innehåll">
                            <a class="card-title">
                                <?php echo e(__('Categories')); ?>

                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="">
                            <div class="card-body">
                                <div class="wrapper-two center-block">
                                    <?php
                                    $categories = App\Categories::orderBy('position','ASC')->get();
                                    ?>
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <?php $__currentLoopData = $categories->where('status', '1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading active" role="tab" id="headingOnexxx">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOnexxx<?php echo e($cate->id); ?>" aria-expanded="false" aria-controls="collapseOnexxx">
                                                        <i class="fa <?php echo e($cate->icon); ?> rgt-10"></i> <label class="prime-cat" data-url="<?php echo e(route('category.page',['id' => $cate->id, 'category' => str_slug(str_replace('-','&',$cate->slug))])); ?>"><?php echo e(str_limit($cate->title, $limit = 20, $end = '..')); ?></label>
                                                    </a>
                                                </h4>
                                            </div>


                                            <div id="collapseOnexxx<?php echo e($cate->id); ?>" class="subcate-collapse panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOnexxx">
                                                <?php $__currentLoopData = $cate->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($sub->status ==1): ?>
                                                <div class="panel-body">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingelevenxxx">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseelevenxxx<?php echo e($sub->id); ?>" aria-expanded="false" aria-controls="collapseelevenxxx">
                                                                    <i class="fa <?php echo e($sub->icon); ?> rgt-10"></i> <label class="sub-cate" data-url="<?php echo e(route('subcategory.page',['id' => $sub->id, 'category' => str_slug(str_replace('-','&',$sub->slug))])); ?>"><?php echo e(str_limit($sub->title, $limit = 15, $end = '..')); ?></label>

                                                                </a>
                                                            </h4>
                                                        </div>

                                                        <div id="collapseelevenxxx<?php echo e($sub->id); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingelevenxxx">
                                                            <?php $__currentLoopData = $sub->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($child->status ==1): ?>
                                                            <div class="panel-body sub-cat">
                                                                <i class="fa <?php echo e($child->icon); ?> rgt-10"></i> <label class="child-cate" data-url="<?php echo e(route('childcategory.page',['id' => $child->id, 'category' => str_slug(str_replace('-','&',$child->slug))])); ?>"><?php echo e($child->title); ?> </label>
                                                            </div>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>

                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo" data-closetxt="Stäng block" data-opentxt="Visa innehåll">
                            <a class="card-title">
                                <?php echo e(__('Price')); ?>

                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse show" data-parent="">
                            <div class="card-body">
                                <div class="categories-tags">
                                    <div class="categories-content-one">
                                        <div class="categories-tags-content-one">
                                            <ul>
                                                <li>
                                                    <div class="form-check form-check-inline">
                                                        <input <?php echo e(app('request')->input('type') == 'paid' ? 'checked' : ''); ?> class="form-check-input type" type="radio" name="type" id="flexRadioDefaultpaid" value="paid">
                                                        <label class="form-check-label active" for="inlineCheckboxpaid"><?php echo e(__('Paid')); ?></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check form-check-inline">
                                                        <input <?php echo e(app('request')->input('type') == 'free' ? 'checked' : ''); ?> class="form-check-input type" type="radio" name="type" id="flexRadioDefaultfree" value="free">
                                                        <label class="form-check-label" for="inlineCheckboxfree"><?php echo e(__('Free')); ?></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo" data-closetxt="Stäng block" data-opentxt="Visa innehåll">
                            <a class="card-title">
                                <?php echo e(__('Languages')); ?>

                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse show" data-parent="">
                            <div class="card-body">
                                <div class="categories-tags">
                                    <div class="categories-content-one">
                                        <div class="categories-tags-content-one">
                                            <?php
                                            $CourseLanguage = App\CourseLanguage::get();
                                            ?>
                                            <?php $__currentLoopData = $CourseLanguage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <ul>
                                                <li>
                                                    <div class="form-check form-check-inline">
                                                        <input <?php echo e(app('request')->input('lang') == $lang->id ? 'checked' : ''); ?> class="form-check-input lang" type="radio" name="lang" id="flexRadioDefault<?php echo e($lang->id); ?>" value="<?php echo e($lang->id); ?>">
                                                        <label class="form-check-label" for="inlineCheckbox<?php echo e($lang->id); ?>"><?php echo e($lang->name); ?></label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div id="posts" class="students-bought btm-30">
                    <div class="row">
                        <?php
                        $test = count($courses);
                        
                        ?>
                        <?php if($test != 0): ?>
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($course->country != ''): ?>
                        <?php if( !in_array($usercountry, $course->country) ): ?>
                        <div class="item col-lg-12 col-12">
                            <div class="course-bought-block protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($course->id); ?>">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 course-bought-block-one">
                                        <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                                        <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$course->preview_image)); ?>" alt="course" class="img-fluid"></a>
                                        <?php else: ?>
                                        <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" alt="course" class="img-fluid"></a>
                                        <?php endif; ?>
                                        <?php if($course['level_tags'] == !NULL): ?>
                                        <div class="best-seller best-seller-one"><?php echo e($course['level_tags']); ?></div>
                                        <?php endif; ?>
                                        <div class="img-wishlist img-wishlist-btm">
                                            <div class="protip-wishlist">
                                                <ul>

                                                    <li class="protip-wish-btn"><a href="#" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                    <?php if(Auth::check()): ?>

                                                    <li class="protip-wish-btn"><a class="compare" data-id="<?php echo e(filter_var($course->id)); ?>" title="compare"><i data-feather="bar-chart"></i></a></li>

                                                    <?php
                                                    $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                                                    ?>
                                                    <?php if($wish == NULL): ?>
                                                    <li class="protip-wish-btn">
                                                        <form id="demo-form2" method="post" action="<?php echo e(url('show/wishlist', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                            <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>" />

                                                            <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                                        </form>
                                                    </li>
                                                    <?php else: ?>
                                                    <li class="protip-wish-btn-two">
                                                        <form id="demo-form2" method="post" action="<?php echo e(url('remove/wishlist', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                            <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>" />

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
                                    </div>
                                    <div class="col-lg-7 col-md-6 categories-popularity-dtl-block">
                                        <div class="categories-popularity-dtl">
                                            <div class="view-heading btm-10"><a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><?php echo e($course->title); ?></a></div>
                                            <ul>

                                                <li>
                                                    <i data-feather="play-circle"></i>
                                                    <div class="class-des">
                                                        <?php
                                                        $data = App\CourseClass::where('course_id', $course->id)->count();
                                                        if($data>0){

                                                        echo $data;
                                                        }
                                                        else{

                                                        echo "0";
                                                        }
                                                        ?> <?php echo e(__('Classes')); ?>

                                                    </div>
                                                </li>
                                                <li>
                                                    <i data-feather="clock"></i>
                                                    <div class="time-des">


                                                        <span class="">
                                                            <?php
                                                            $classtwo = App\CourseClass::where('course_id', $course->id)->sum("duration");

                                                            ?>
                                                            <?php echo e($classtwo); ?> <?php echo e(__('Minutes')); ?>

                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i data-feather="user"></i>
                                                    <div class="student-des">
                                                        <?php
                                                        $enroll = App\Order::where('course_id', $course->id)->count();
                                                        if($enroll>0){

                                                        echo $enroll;
                                                        }
                                                        else{

                                                        echo "0";
                                                        }



                                                        ?> <?php echo e(__('Students')); ?>

                                                    </div>
                                                </li>
                                                <li>
                                                    <?php if(isset($course->level_tags)): ?>
                                                    <i data-feather="align-justify"></i>
                                                    <div class="all-levels-des">
                                                        <?php echo e(optional($course)->level_tags); ?>

                                                    </div>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                            <p><?php echo e(str_limit($course->short_detail, $limit = 125, $end = '..')); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3 course-rate-block">
                                        <div class="rate text-right">
                                            <ul>
                                                <?php if($course->type == 1): ?>

                                                <?php if($course->discount_price == !NULL): ?>

                                                <li class="rate-r"><?php echo e(currency($course->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true)); ?>&nbsp; <br><s><?php echo e(currency($course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true)); ?></s> </li>

                                                <?php else: ?>
                                                <?php if($course->price == !NULL): ?>
                                                <li class="rate-r"><?php echo e(currency($course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true)); ?></li>
                                                <?php endif; ?>

                                                <?php endif; ?>
                                                <?php else: ?>
                                                <li class="rate-r"><?php echo e(__('Free')); ?></li>
                                                <?php endif; ?>
                                            </ul>
                                            <div class="rating">
                                                <ul>
                                                    <li>
                                                        <!-- star rating -->
                                                        <?php
                                                        $learn = 0;
                                                        $price = 0;
                                                        $value = 0;
                                                        $sub_total = 0;
                                                        $sub_total = 0;
                                                        $reviews = App\ReviewRating::where('course_id', $course->id)->where('status', '1')->get();
                                                        ?>
                                                        <?php if(!empty($reviews[0])): ?>
                                                        <?php
                                                        $count =  App\ReviewRating::where('course_id', $course->id)->count();

                                                        foreach ($reviews as $review) {
                                                            $learn = $review->price * 5;
                                                            $price = $review->price * 5;
                                                            $value = $review->value * 5;
                                                            $sub_total = $sub_total + $learn + $price + $value;
                                                        }

                                                        $count = ($count * 3) * 5;
                                                        $rat = $sub_total / $count;
                                                        $ratings_var = ($rat * 100) / 5;
                                                        ?>

                                                        <div class="pull-left">
                                                            <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                            </div>
                                                        </div>


                                                        <?php else: ?>
                                                        <div class="pull-left">
                                                            <p><?php echo e(__('No Rating')); ?></p>
                                                        </div>
                                                        <?php endif; ?>
                                                    </li>

                                                    <!-- overall rating -->
                                                    <?php
                                                    $learn = 0;
                                                    $price = 0;
                                                    $value = 0;
                                                    $sub_total = 0;
                                                    $count =  count($reviews);
                                                    $onlyrev = array();

                                                    $reviewcount = App\ReviewRating::where('course_id', $course->id)->where('status', "1")->WhereNotNull('review')->get();

                                                    foreach ($reviews as $review) {

                                                        $learn = $review->learn * 5;
                                                        $price = $review->price * 5;
                                                        $value = $review->value * 5;
                                                        $sub_total = $sub_total + $learn + $price + $value;
                                                    }

                                                    $count = ($count * 3) * 5;

                                                    if ($count != ""  && $count != '0') {
                                                        $rat = $sub_total / $count;

                                                        $ratings_var = ($rat * 100) / 5;

                                                        $overallrating = ($ratings_var / 2) / 10;
                                                    }

                                                    ?>

                                                    <?php
                                                    $reviewsrating = App\ReviewRating::where('course_id', $course->id)->first();
                                                    ?>
                                                    <li class="reviews">
                                                        (<?php
                                                        $data = App\ReviewRating::where('course_id', $course->id)->count();
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
                                        </div>
                                    </div>
                                </div>

                                <?php if($course['whatlearns']->isNotEmpty()): ?>
                                <div id="prime-next-item-description-block<?php echo e($course->id); ?>" class="prime-description-block">
                                    <div class="prime-description-under-block">
                                        <div class="prime-description-under-block">
                                            <h6><?php echo e(__('What learn')); ?></h6>

                                            <?php $__currentLoopData = $course['whatlearns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($wl->status ==1): ?>
                                            <div class="product-learn-dtl protip-whatlearn">
                                                <ul>
                                                    <li><i data-feather="check-circle"></i><?php echo e(str_limit($wl['detail'], $limit = 120, $end = '...')); ?></li>
                                                </ul>
                                            </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>


                            </div>
                        </div>
                        <?php endif; ?>
                        <?php else: ?>

                        <div class="item col-12">
                            <div class="course-bought-block protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($course->id); ?>">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 course-bought-block-one">
                                        <?php if($course['preview_image'] !== NULL && $course['preview_image'] !== ''): ?>
                                        <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$course->preview_image)); ?>" alt="course" class="img-fluid"></a>
                                        <?php else: ?>
                                        <a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><img src="<?php echo e(Avatar::create($course->title)->toBase64()); ?>" alt="course" class="img-fluid"></a>
                                        <?php endif; ?>
                                        <?php if($course['level_tags'] == !NULL): ?>
                                        <div class="best-seller best-seller-one"><?php echo e($course['level_tags']); ?></div>
                                        <?php endif; ?>
                                        <div class="img-wishlist img-wishlist-btm">
                                            <div class="protip-wishlist">
                                                <ul>

                                                    <li class="protip-wish-btn"><a href="#" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                    <?php if(Auth::check()): ?>

                                                    <li class="protip-wish-btn"><a class="compare" data-id="<?php echo e(filter_var($course->id)); ?>" title="compare"><i data-feather="bar-chart"></i></a></li>

                                                    <?php
                                                    $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                                                    ?>
                                                    <?php if($wish == NULL): ?>
                                                    <li class="protip-wish-btn">
                                                        <form id="demo-form2" method="post" action="<?php echo e(url('show/wishlist', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                            <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>" />

                                                            <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                                        </form>
                                                    </li>
                                                    <?php else: ?>
                                                    <li class="protip-wish-btn-two">
                                                        <form id="demo-form2" method="post" action="<?php echo e(url('remove/wishlist', $course->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>" />
                                                            <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>" />

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
                                        <div class="view-user-img">
                                            <?php if($course->user['user_img'] !== NULL && $course->user['user_img'] !== ''): ?>
                                            <a href="" title=""><img src="<?php echo e(asset('images/user_img/'.$course->user['user_img'])); ?>" class="img-fluid user-img-one" alt=""></a>
                                            <?php else: ?>
                                            <a href="" title=""><img src="<?php echo e(asset('images/default/user.png')); ?>" class="img-fluid user-img-one" alt=""></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-6 categories-popularity-dtl-block">
                                        <div class="categories-popularity-dtl">
                                            <div class="view-heading btm-10"><a href="<?php echo e(route('user.course.show',['id' => $course->id, 'slug' => $course->slug ])); ?>"><?php echo e($course->title); ?></a></div>
                                            <ul>

                                                <li>
                                                    <i data-feather="play-circle"></i>
                                                    <div class="class-des">
                                                        <?php
                                                        $data = App\CourseClass::where('course_id', $course->id)->count();
                                                        if($data>0){

                                                        echo $data;
                                                        }
                                                        else{

                                                        echo "0";
                                                        }
                                                        ?> <?php echo e(__('Classes')); ?>

                                                    </div>
                                                </li>
                                                <li>
                                                    <i data-feather="clock"></i>
                                                    <div class="time-des">


                                                        <span class="">
                                                            <?php
                                                            $classtwo = App\CourseClass::where('course_id', $course->id)->sum("duration");

                                                            ?>
                                                            <?php echo e($classtwo); ?> <?php echo e(__('Minutes')); ?>

                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i data-feather="user"></i>
                                                    <div class="student-des">
                                                        <?php
                                                        $enroll = App\Order::where('course_id', $course->id)->count();
                                                        if($enroll>0){

                                                        echo $enroll;
                                                        }
                                                        else{

                                                        echo "0";
                                                        }



                                                        ?> <?php echo e(__('Students')); ?>

                                                    </div>
                                                </li>
                                                <li>
                                                    <?php if(isset($course->level_tags)): ?>
                                                    <i data-feather="align-justify"></i>
                                                    <div class="all-levels-des">
                                                        <?php echo e(optional($course)->level_tags); ?>

                                                    </div>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                            <p><?php echo e(str_limit($course->short_detail, $limit = 125, $end = '..')); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3 course-rate-block">
                                        <div class="rate text-right">
                                            <ul>
                                                <?php if($course->type == 1): ?>

                                                <?php if($course->discount_price == !NULL): ?>

                                                <li class="rate-r"><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($course->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?>&nbsp; <br><s><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></s> </li>

                                                <?php else: ?>
                                                <?php if($course->price == !NULL): ?>
                                                <li class="rate-r"><?php echo e(activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :''); ?><?php echo e(price_format(  currency($course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false))); ?><?php echo e(activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :''); ?></li>
                                                <?php endif; ?>

                                                <?php endif; ?>
                                                <?php else: ?>
                                                <li class="rate-r"><?php echo e(__('Free')); ?></li>
                                                <?php endif; ?>
                                            </ul>
                                            <div class="rating">
                                                <ul>
                                                    <li>
                                                        <!-- star rating -->
                                                        <?php
                                                        $learn = 0;
                                                        $price = 0;
                                                        $value = 0;
                                                        $sub_total = 0;
                                                        $sub_total = 0;
                                                        $reviews = App\ReviewRating::where('course_id', $course->id)->where('status', '1')->get();
                                                        ?>
                                                        <?php if(!empty($reviews[0])): ?>
                                                        <?php
                                                        $count =  App\ReviewRating::where('course_id', $course->id)->count();

                                                        foreach ($reviews as $review) {
                                                            $learn = $review->price * 5;
                                                            $price = $review->price * 5;
                                                            $value = $review->value * 5;
                                                            $sub_total = $sub_total + $learn + $price + $value;
                                                        }

                                                        $count = ($count * 3) * 5;
                                                        $rat = $sub_total / $count;
                                                        $ratings_var = ($rat * 100) / 5;
                                                        ?>

                                                        <div class="pull-left">
                                                            <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                            </div>
                                                        </div>


                                                        <?php else: ?>
                                                        <div class="pull-left">
                                                            <p><?php echo e(__('No Rating')); ?></p>
                                                        </div>
                                                        <?php endif; ?>
                                                    </li>

                                                    <!-- overall rating -->
                                                    <?php
                                                    $learn = 0;
                                                    $price = 0;
                                                    $value = 0;
                                                    $sub_total = 0;
                                                    $count =  count($reviews);
                                                    $onlyrev = array();

                                                    $reviewcount = App\ReviewRating::where('course_id', $course->id)->where('status', "1")->WhereNotNull('review')->get();

                                                    foreach ($reviews as $review) {

                                                        $learn = $review->learn * 5;
                                                        $price = $review->price * 5;
                                                        $value = $review->value * 5;
                                                        $sub_total = $sub_total + $learn + $price + $value;
                                                    }

                                                    $count = ($count * 3) * 5;

                                                    if ($count != "" && $count != '0') {
                                                        $rat = $sub_total / $count;

                                                        $ratings_var = ($rat * 100) / 5;

                                                        $overallrating = ($ratings_var / 2) / 10;
                                                    }

                                                    ?>

                                                    <?php
                                                    $reviewsrating = App\ReviewRating::where('course_id', $course->id)->first();
                                                    ?>
                                                    <li class="reviews">
                                                        (<?php
                                                        $data = App\ReviewRating::where('course_id', $course->id)->count();
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
                                        </div>
                                    </div>
                                </div>

                                <?php if($course['whatlearns']->isNotEmpty()): ?>
                                <div id="prime-next-item-description-block<?php echo e($course->id); ?>" class="prime-description-block">
                                    <div class="prime-description-under-block">
                                        <div class="prime-description-under-block">
                                            <h6><?php echo e(__('What learn')); ?></h6>

                                            <?php $__currentLoopData = $course['whatlearns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($wl->status ==1): ?>
                                            <div class="product-learn-dtl protip-whatlearn">
                                                <ul>
                                                    <li><i data-feather="check-circle"></i><?php echo e(str_limit($wl['detail'], $limit = 120, $end = '...')); ?></li>
                                                </ul>
                                            </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>


                        <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="top-20"><?php echo $courses->appends(Request::except('page'))->links(); ?></a></li>
                            </ul>
                        </nav>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- categories end -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script type="text/javascript">
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };


    $('.type').on('click', function() {
        if ($(this).is(':checked')) {
            var type = $(this).val();

            var exist = window.location.href;
            var url = new URL(exist);
            var query_string = url.search;
            var search_params = new URLSearchParams(query_string);
            search_params.set('type', type);
            url.search = search_params.toString();
            var new_url = url.toString();
            window.history.pushState('page2', 'Title', new_url);

        } else {
            var element = '&type=' + getUrlParameter('type');
            var exist = window.location.href;
            var new_url = exist.replace(element, '');
            window.history.pushState('page2', 'Title', new_url);
        }

        location.reload();

    });


    $('.lang').on('click', function() {
        if ($(this).is(':checked')) {
            var type = $(this).val();

            var exist = window.location.href;
            var url = new URL(exist);
            var query_string = url.search;
            var search_params = new URLSearchParams(query_string);
            search_params.set('lang', type);
            url.search = search_params.toString();
            var new_url = url.toString();
            window.history.pushState('page2', 'Title', new_url);

        } else {
            var element = '&lang=' + getUrlParameter('lang');
            var exist = window.location.href;
            var new_url = exist.replace(element, '');
            window.history.pushState('page2', 'Title', new_url);
        }

        location.reload();

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass\resources\views/front/category.blade.php ENDPATH**/ ?>
<?php if(env('GOOGLE_TAG_MANAGER_ENABLED') == 'true' && env('GOOGLE_TAG_MANAGER_ID') == !NULL): ?>
<?php echo $__env->make('googletagmanager::head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<title><?php echo $__env->yieldContent('title'); ?> | <?php echo e($gsetting->project_title ?? ''); ?></title>
<meta name="description" content="Media City">
<meta name="viewport" content="width=device-width, initial-scale=1">


<?php echo $__env->yieldContent('meta_tags'); ?>
<?php if(isset($gsetting)): ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url('frontcss/img/favicon.ico'.$gsetting->favicon)); ?>">

<?php endif; ?>
<!-- theme styles -->


<?php
$language = Session::get('changed_language');
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa');
?>


<!-- CSS here -->
<?php if(in_array($language,$rtl)): ?>
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/bootstrap.rtl.min.css')); ?>">
<?php else: ?>
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/bootstrap.min.css')); ?>">
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/animate.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/magnific-popup.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('frontcss/fontawesome/css/all.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('admin_assets/assets/icons/font-awesome/css/font-awesome.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/dripicons.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/slick.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/meanmenu.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/venom-button.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/default.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/colorbox.css')); ?>">
<?php if(in_array($language,$rtl)): ?>
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/style_rtl.css')); ?>">
<?php else: ?>
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/style.css')); ?>">
<?php endif; ?>
<?php if(in_array($language,$rtl)): ?>
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/responsive_rtl.css')); ?>">
<?php else: ?>
<link rel="stylesheet" href="<?php echo e(url('frontcss/css/responsive.css')); ?>">
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(url('css/simple_line_icons/css/simple-line-icons.css')); ?>">

<?php if(env('PWA_ENABLE') == 1): ?>
  <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>
<?php endif; ?>

<?php
  if(Schema::hasTable('player_settings')){
  $colors = App\PlayerSetting::first();
}
?>
<?php if(isset($color)): ?>
<style type="text/css">

:root {
  --subtitle_color:  <?php echo e($colors['subtitle_color']); ?>;
}
</style>
<?php endif; ?>

<!-- end theme styles -->
<?php
if(Schema::hasTable('color_options')){
  $color = App\ColorOption::first();
}
?>
<?php if(isset($color)): ?>

<style type="text/css">
  
  :root {
  --linear-gradient-bg-color:linear-gradient(-45deg, <?php echo e($color['linear_bg_one']); ?> 0, <?php echo e($color['linear_bg_two']); ?> 100%);
  --linear-gradient-reverse-bg-color:linear-gradient(-45deg, <?php echo e($color['linear_reverse_bg_one']); ?> 0, <?php echo e($color['linear_reverse_bg_two']); ?> 100%);
  --linear-gradient-about-bg-color:linear-gradient(197.61deg, <?php echo e($color['linear_about_bg_one']); ?> , <?php echo e($color['linear_about_bg_two']); ?>);
  --linear-gradient-about-blue-bg-color:linear-gradient(40deg, <?php echo e($color['linear_about_bluebg_one']); ?> 33%, <?php echo e($color['linear_about_bluebg_two']); ?> 84%);
  --linear-gradient-career-bg-color:linear-gradient(22.72914987deg, <?php echo e($color['linear_career_bg_one']); ?> 4%, <?php echo e($color['linear_career_bg_two']); ?>);
  --background-blue-bg-color: <?php echo e($color['blue_bg']); ?>;
  --background-red-bg-color: <?php echo e($color['red_bg']); ?>; 
  --background-grey-bg-color:<?php echo e($color['grey_bg']); ?>;
  --background-light-grey-bg-color:<?php echo e($color['light_grey_bg']); ?>;
  --background-black-bg-color:<?php echo e($color['black_bg']); ?>;
  --background-white-bg-color:<?php echo e($color['white_bg']); ?>;
  --background-mehroon-bg-color:<?php echo e($color['dark_red_bg']); ?>;
  --text-black-color:<?php echo e($color['black_text']); ?>;
  --text-light-grey-color:<?php echo e($color['light_grey_text']); ?>;
  --text-dark-grey-color:<?php echo e($color['dark_grey_text']); ?>;
  --text-red-color:<?php echo e($color['red_text']); ?>;
  --text-blue-color:<?php echo e($color['blue_text']); ?>;
  --text-dark-blue-color:<?php echo e($color['dark_blue_text']); ?>;
  --text-white-color:<?php echo e($color['white_text']); ?>;
}
</style>

<?php else: ?>

<style type="text/css">
 :root {

  --linear-gradient-bg-color:linear-gradient(-45deg, #F44A4A 0, #6E1A52 100%);
  --linear-gradient-reverse-bg-color:linear-gradient(-45deg, #6E1A52 0,#F44A4A 100%);
  --linear-gradient-about-bg-color:linear-gradient(197.61deg,#F44A4A,#6E1A52);
  --linear-gradient-about-blue-bg-color:linear-gradient(40deg,#1A263A 33%,#4A8394 84%);
  --linear-gradient-career-bg-color:linear-gradient(22.72914987deg,#F5C252 4%,#6AC1D0);
  --background-blue-bg-color: #0284A2;
  --background-red-bg-color:#F44A4A; 
  --background-grey-bg-color:#F7F8FA;
  --background-light-grey-bg-color:#F9F9F9;
  --background-black-bg-color:#29303B;
  --background-white-bg-color:#FFF;
  --background-mehroon-bg-color:#992337;
  --text-black-color:#29303B;
  --text-light-grey-color:#777;
  --text-red-color:#F44A4A;
  --text-dark-grey-color:#686F7A; 
  --text-blue-color:#0284A2;
  --text-dark-blue-color:#003845;
  --text-white-color:#FFF;
}

</style>
<?php endif; ?>
<?php echo $__env->yieldContent('custom-head'); ?><?php /**PATH C:\wamp64\www\eclass\resources\views/theme2/head.blade.php ENDPATH**/ ?>
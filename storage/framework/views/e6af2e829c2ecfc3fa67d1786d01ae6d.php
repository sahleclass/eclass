<!-- Fevicon -->
<link rel="shortcut icon" href="">
<!-- Start css -->
<!-- Switchery css -->

<link rel="icon" type="image/icon" href="<?php echo e(asset('images/favicon/'.$gsetting->favicon)); ?>"> <!-- favicon-icon -->
<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>

<?php if(in_array($language,$rtl)): ?>
	<link href="<?php echo e(url('admin_assets_rtl/assets/plugins/switchery/switchery.min.css')); ?>" rel="stylesheet">
	<!-- Select2 css -->
	<link href="<?php echo e(url('admin_assets_rtl/assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css">
	<!-- Slick css -->
	<link href="<?php echo e(url('admin_assets_rtl/assets/plugins/slick/slick.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('admin_assets_rtl/assets/plugins/slick/slick-theme.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('admin_assets_rtl/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
	<!-- Fontawesome 4 css -->
	<link rel="stylesheet" href="<?php echo e(url("admin_assets/assets/icons/font-awesome/css/font-awesome.min.css")); ?>">
	<link href="<?php echo e(url('admin_assets_rtl/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(url('admin_assets_rtl/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(url('admin_assets_rtl/assets/plugins/pnotify/css/pnotify.custom.min.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(url('admin_assets_rtl/assets/css/flag-icon.min.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(url('admin_assets_rtl/assets/plugins/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(url('admin_assets_rtl/assets/plugins/datatables/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
	 <!-- Responsive Datatable css -->
	<link href="<?php echo e(url('admin_assets_rtl/assets/plugins/datatables/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(url('admin_assets_rtl/assets/css/style.css')); ?>" rel="stylesheet" type="text/css">
	<!-- jQuery ui css -->
	
	<link href="<?php echo e(url('admin_assets_rtl/assets/plugins/jquery-ui/jquery-ui.min.css')); ?>" rel="stylesheet" type="text/css">
	<?php if($gsetting->sidebar_enable == 1 || $gsetting->instructor_sidebar == 1): ?>
	<link rel="stylesheet" href="<?php echo e(url('admin_assets_rtl/assets/css/theme_sidebar.css')); ?>" type="text/css">
	<?php else: ?>
	<link rel="stylesheet" href="<?php echo e(url('admin_assets_rtl/assets/css/theme.css')); ?>" type="text/css">
	<?php endif; ?>
<?php else: ?>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
	<link href="<?php echo e(url('admin_assets/assets/plugins/switchery/switchery.min.css')); ?>" rel="stylesheet">
	<!-- Select2 css -->
	<link href="<?php echo e(url('admin_assets/assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css">
	<!-- Slick css -->
	<link href="<?php echo e(url('admin_assets/assets/plugins/apexcharts/apexcharts.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('admin_assets/assets/plugins/slick/slick.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('admin_assets/assets/plugins/slick/slick-theme.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('admin_assets/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
	<!-- Fontawesome 4 css -->
	<link rel="stylesheet" href="<?php echo e(url("admin_assets/assets/icons/font-awesome/css/font-awesome.min.css")); ?>">
	<link href="<?php echo e(url('admin_assets/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(url('admin_assets/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(url('admin_assets/assets/plugins/pnotify/css/pnotify.custom.min.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(url('admin_assets/assets/css/flag-icon.min.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(url('admin_assets/assets/plugins/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(url('admin_assets/assets/plugins/datatables/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
	 <!-- Responsive Datatable css -->

	<link href="<?php echo e(url('admin_assets/assets/plugins/datatables/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(url('admin_assets/assets/css/lightbox.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- lightbox css -->
	<link href="<?php echo e(url('admin_assets/assets/css/style.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(url('admin_assets/assets/plugins/jquery-ui/jquery-ui.min.css')); ?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo e(url('admin_assets/css/imagestyle.css')); ?>" type="text/css">
	
	<?php if($gsetting->sidebar_enable == 1 || $gsetting->instructor_sidebar == 1): ?>

	<link rel="stylesheet" href="<?php echo e(url('admin_assets/css/theme_sidebar.css')); ?>" type="text/css">
	<?php else: ?>
	<link rel="stylesheet" href="<?php echo e(url('admin_assets/css/theme.css')); ?>" type="text/css">
	<?php endif; ?>
	<?php endif; ?>
<link href="<?php echo e(url('admin_assets/assets/plugins/datepicker/datepicker.min.css')); ?>" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="<?php echo e(url("admin_assets/css/bootstrap-iconpicker.min.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('css/custom-style.css')); ?>"/>
<link href="<?php echo e(url('admin_assets/assets/plugins/colorpicker/bootstrap-colorpicker.css')); ?>" rel="stylesheet" type="text/css">

<?php echo midia_css(); ?>

<?php
if(Schema::hasTable('admincustomisations')){
  $color = App\Admincustomisation::first();
}
?>
<?php if(isset($color)): ?>
<style type="text/css">

:root {
    --bg_grey_color: <?php echo e($color['bg_grey_color']); ?>;
    --bg_white_color: <?php echo e($color['bg_white_color']); ?>;
	 --text-grey-color: <?php echo e($color['text-grey-color']); ?>;
    --text_dark_color: <?php echo e($color['text_dark_color']); ?>;
    --text_white_color: <?php echo e($color['text_white_color']); ?>;
    --text_blue_color: <?php echo e($color['text_blue_color']); ?>;
}
</style>
<?php else: ?>
<style type="text/css">

:root {
    --bg_grey_color: #F2F3F7;
    --bg_white_color: #FFF;
	--text-grey-color: #8A98AC;
    --text_dark_color: #141d46;
    --text_white_color: #FFF;
    --text_blue_color: #506fe4;
}
</style>
<?php endif; ?>
<?php echo $__env->yieldContent('stylesheet'); ?><?php /**PATH C:\wamp64\www\eclass\resources\views/admin/layouts/head.blade.php ENDPATH**/ ?>
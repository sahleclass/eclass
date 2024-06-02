
<?php $__env->startSection('title','View Course'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php echo $__env->make('admin.course.partial.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass\resources\views/admin/course/index.blade.php ENDPATH**/ ?>
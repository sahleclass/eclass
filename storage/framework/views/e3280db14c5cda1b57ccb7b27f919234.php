
<?php $__env->startSection('title', 'Front Theme Settings'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Front Theme Settings';
$data['title'] = 'Front Theme Settings';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar bardashboard-card">
	<?php
	    $key = \DB::table('api_keys')
        	  ->where('id', '2')
        	  ->first()
	?>

	<?php if(Module::has('Blizzard')): ?>	
		<?php if(!Module::find('Blizzard')->isEnabled()): ?>
			<div class="alert alert-danger">
				<p class="alert-text">
					<?php echo e(__('Please active Blizzard from configure')); ?>

				</p>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if(Module::has('Blizzard')): ?>
	  <?php if(env('MIX_THEME_FOLDER') == '' || !$key): ?>
		<div class="alert alert-danger">
			<p class="alert-text">
				<?php echo e(__("Please configure Blizzard theme before using it.")); ?>

			</p>
		</div>
	  <?php endif; ?>
	<?php endif; ?>
							
                          
	<div class="row">
	  <div class="col-lg-12">
		<?php if($errors->any()): ?>  
		<div class="alert alert-danger" role="alert">
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
		<p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
		<span aria-hidden="true">&times;</span></button></p>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
		</div>
		<?php endif; ?>
		<div class="card m-b-30">
		  <div class="card-header">
			<h5 class="card-title"><?php echo e(__('Front Theme Settings')); ?></h5>
			<div>
				<div class="widgetbar">
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('themes.manage')): ?>
					<a href="<?php echo e(route('add.theme')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Add Theme')); ?>">
						<i class="feather icon-plus mr-2"></i>
						<?php echo e(__('Add Theme')); ?>

					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		  <div class="card-body">
			<form action="<?php echo e(action('ThemeController@update')); ?>" method="POST" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>

				<?php echo e(method_field('PUT')); ?>

				
				<div class="row">

					<div class="shadow-sm border card col-md-6" style="width: 18rem;">
						<img src="<?php echo e(url('images/theme/1.png')); ?>" class="card-img-top" alt="Classic">
						<div class="card-body">
						    <h5 class="card-title"><?php echo e(__('Classic')); ?></h5>
						    <p class="card-text"><?php echo e(__('Classic Theme')); ?>.</p>
						    <div class="custom-radio-button mt-3">
						    	<div class="form-check-inline radio-primary">
			                      	<section class="mt-2">
										<input type="radio" id="classicTheme" name="default_theme" value="classic" required <?php echo e($env_files['DEFAULT_THEME'] == 'classic' ? 'checked' : ''); ?>>
			                      		<label for="classicTheme" class="">
			                      			&nbsp;&nbsp;&nbsp;<?php echo e(__("Select Theme")); ?>

			                      		</label>
									</section>
									<div class=""><div class=""></div></div>
			                    </div>
			                
							<a href="<?php echo e(url('admin/coloroption')); ?>" class="btn btn-md btn-info-rgba mr-2">
								<i class="feather icon-settings"></i> <?php echo e(__("Color Setting")); ?>

							  </a>
							</div>
						</div>
					</div>

					<?php if(Module::has('Blizzard')): ?>
					<!-- Blizzard Configuration -->
					<div class="shadow-sm border card col-md-6" style="width: 18rem;">
						<img src="<?php echo e(url('images/theme/2.png')); ?>" class="card-img-top" alt="Classic">
						<div class="card-body">
						    <h5 class="card-title">
								<?php echo e(__('Blizzard')); ?>

							</h5>
						    <p class="card-text">
								<?php echo e(__('Blizzard VUE SPA Theme.')); ?>

							</p>
						    <div class="custom-radio-button mt-3">
						    	<div class="form-check-inline radio-danger">

								  <!-- Radio Button -->
			                      <section class="mt-2">
									<input type="radio" id="skillifyTheme" name="default_theme" value="blizzard" required <?php echo e($env_files['DEFAULT_THEME'] == 'blizzard' ? 'checked' : ''); ?>>
									<label for="skillifyTheme" class="mr-3">
										&nbsp;&nbsp;&nbsp;<?php echo e(__("Select Theme")); ?>

									</label>
								  </section>
								  
								  <!-- Configure Button -->
								  <a href="<?php echo e(route('configuration.show','Blizzard')); ?>" class="btn btn-md btn-info-rgba mr-2">
									<i class="feather icon-settings"></i> <?php echo e(__("Configure")); ?>

								  </a>
								  
								  <!-- Delete Button -->
								  <a href="" class="btn btn-md btn-danger-rgba" data-toggle="modal" data-target="#deleteBlizzard">
									<i class="feather icon-trash"></i> <?php echo e(__("Delete")); ?>

								  </a>
			                    </div>

								<br>
								<br>
								<!-- Warning Message -->
								<span class="alert alert-danger">
									<i class="feather icon-alert-triangle mr-2"></i>
									<?php echo e(__('Please keep theme status disable from configure if you are not using it.')); ?>

								</span>
			                </div>
						</div>
					</div>

					<?php endif; ?>

					<!-- Apply theme button -->
					<div class="mt-3 col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Apply Theme')); ?>">
								<i class="fa fa-check-circle"></i>
								<?php echo e(__("Apply Theme")); ?>

							</button>
						</div>
					</div>
	            
            	</div>
		
			
		</form>

		<!-- delete Modal start -->
		<div class="modal fade bd-example-modal-sm" id="deleteBlizzard" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleSmallModalLabel">
							<?php echo e(__('Delete')); ?>

						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Delete')); ?>">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
							<h4><?php echo e(__('Are You Sure ?')); ?></h4>
							<p><?php echo e(__('Do you really want to delete')); ?> <b><?php echo e(__('Blizzard')); ?></b> ? <?php echo e(__('This process cannot be undone.')); ?></p>
					</div>
					<div class="modal-footer">
						<form method="post" action="<?php echo e(route('theme.delete','Blizzard')); ?>" class="pull-right">
							<?php echo e(csrf_field()); ?>

							<button type="reset" class="btn btn-secondary" data-dismiss="modal">
								<?php echo e(__('No')); ?>

							</button>
							<button type="submit" class="btn btn-primary">
								<?php echo e(__('Yes')); ?>

							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- delete Model ended -->
	  </div>
	</div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\eclass\resources\views/admin/theme/edit.blade.php ENDPATH**/ ?>

<?php $__env->startSection('title', 'Career'); ?>
<?php $__env->startSection('maincontent'); ?>
<?php
$data['heading'] = 'Career';
$data['title'] = 'Career';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="contentbar">
    <div class="row">
<?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
  <!-- row started -->
    <div class="col-lg-12">
		<div class="card dashboard-card m-b-30">
			<!-- Card header will display you the heading -->
                <div class="card-header">
                    <h5 class="card-box"><?php echo e(__('Career')); ?></h5>
                </div> 
				 <!-- card body started -->
                <div class="card-body">
                <!-- form for comming soon start -->
				   <form action="<?php echo e(action('CareersController@update')); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

						<!-- section 1 start -->
						<div class="row">
							<div class="col-md-12">
		                        <label class="text-dark" for="one_enable"><?php echo e(__('Section One')); ?></label><br>
								<input type="checkbox" class="custom_toggle" id="customSwitch1" name="one_enable" <?php echo e($careers['one_enable']==1 ? 'checked' : ''); ?> />
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch1">
		                        <br>
				                <div class="row" style="<?php echo e($careers['one_enable']==1 ? '' : 'display:none'); ?>" id="section_one">
				                	<div class="col-md-6">
					                    <label class="text-dark" for="one_heading"><?php echo e(__('Section One Heading :')); ?> <span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['one_heading']); ?>" name="one_heading" type="text" class="form-control" placeholder="<?php echo e(__('Enter Heading')); ?>" />
					                </div>

									<div class="col-md-6">
					                    <label class="text-dark" for="one_text"><?php echo e(__('Section One Text :')); ?> <span class="text-danger">*</span></label>
					                    <textarea name="one_text" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Text')); ?>" ><?php echo e($careers['one_text']); ?></textarea>
					                    <br>
				                  	</div>

				                  	<div class="col-md-6">
					                    <label class="text-dark" for="one_btntxt"><?php echo e(__('Section One button Text :')); ?> <span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['one_btntxt']); ?>" name="one_btntxt" type="text" class="form-control" placeholder="<?php echo e(__('Enter Button Text')); ?>" />
									</div>

									<div class="col-md-6">
					                    <label class="text-dark" for="one_btntxt"><?php echo e(__('Section One button Link :')); ?> <span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['three_btntxt']); ?>" name="three_btntxt" type="text" class="form-control" placeholder="<?php echo e(__('Enter Button Link')); ?>" />
									</div>

				                  	<div class="col-md-6">

									  <label class="text-dark"><?php echo e(__('Section One Image :')); ?><span class="text-danger">*</span></label><br>
											<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
											</div>
											<div class="custom-file">
												<input accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" name="one_video" aria-describedby="inputGroupFileAddon01">
												<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
											</div>
											</div>
											<?php if($image = @file_get_contents('../public/images/careers/'.$careers['one_video'])): ?>
											<img src="<?php echo e(url('/images/careers/'.$careers['one_video'])); ?>" class="image_size"/>
											<?php endif; ?>
				                  	</div>
				              	</div>
		                    </div>
		                </div>
		              	<br>
		              	<br>
						<!-- section 1 end -->

						<!-- section 2 start -->
						<div class="row">
							<div class="col-md-12">
		                        <label class="text-dark" name="two_enable" for="two_enable"><?php echo e(__('Section Two')); ?></label><br>
								<input type="checkbox" class="custom_toggle" id="customSwitch2" name="two_enable" <?php echo e($careers['two_enable']==1 ? 'checked' : ''); ?>/>
                                <input type="hidden" name="free" value="0" for="status" id="customSwitch2">
		                    </div>
		                </div>
						<br>
						<br>
						<!-- section 2 end -->

						<!-- section 3 start -->
						<div class="row">
							<div class="col-md-12">
		                        <label class="text-dark" for="three_enable"><?php echo e(__('Section Three')); ?></label><br>
								<input type="checkbox" class="custom_toggle" id="customSwitch3" name="three_enable" <?php echo e($careers['three_enable']==1 ? 'checked' : ''); ?>/>
                                <input type="hidden" name="free" value="0" for="customSwitch3" id="customSwitch3">
		                        <br>
		                        <div class="row" style="<?php echo e($careers['three_enable']==1 ? '' : 'display:none'); ?>" id="section_three">

		                        	<div class="col-md-6">

										<label class="text-dark"><?php echo e(__('Section Three Background Image :')); ?><span class="text-danger">*</span></label><br>
										<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" name="three_bg_image" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
										<?php if($image = @file_get_contents('../public/images/careers/'.$careers['three_bg_image'])): ?>
										<img src="<?php echo e(url('/images/careers/'.$careers['three_bg_image'])); ?>" class="image_size"/>
										<?php endif; ?>
										
				                  	</div>

				                  	<div class="col-md-6">

									  <label class="text-dark"><?php echo e(__('Section Three Image :')); ?><span class="text-danger">*</span></label><br>
										<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="inputGroupFile01" name="three_video" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
										<?php if($image = @file_get_contents('../public/images/careers/'.$careers['three_video'])): ?>
										<img src="<?php echo e(url('/images/careers/'.$careers['three_video'])); ?>" class="image_size"/>
										<?php endif; ?>
					                    <br>
					                    <br> 
				                  	</div>

									<div class="col-md-6">
					                    <label class="text-dark" for="three_heading"><?php echo e(__('Section Three Heading :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['three_heading']); ?>" name="three_heading" type="text" class="form-control" placeholder="<?php echo e(__('Enter Heading')); ?>"/>
					                </div>

				                  	
		                        </div>
				            </div>
		                </div>
						<br>
						<br>
						<!-- section 3 end -->
						<!-- section 4 start -->	
						<div class="row">
							<div class="col-md-12">
		                        <label class="text-dark" for="four_enable"><?php echo e(__('Section Four')); ?></label><br>
								<input type="checkbox" class="custom_toggle" id="customSwitch4" name="four_enable" <?php echo e($careers['four_enable']==1 ? 'checked' : ''); ?>/>
                                <input type="hidden" name="free" value="0" for="customSwitch4" id="customSwitch4">
		                        <br>
		                        <div class="row" style="<?php echo e($careers['four_enable']==1 ? '' : 'display:none'); ?>" id="section_four">

									<div class="col-md-4">
										<label class="text-dark"><?php echo e(__('Section Four Image One :')); ?><span class="text-danger">*</span></label><br>
										<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" name="four_img_one" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
										<?php if($image = @file_get_contents('../public/images/careers/'.$careers['four_img_one'])): ?>
										<img src="<?php echo e(url('/images/careers/'.$careers['four_img_one'])); ?>" class="image_size"/>
										<?php endif; ?>
				                  	</div>

				                  	<div class="col-md-4">

									  <label class="text-dark"><?php echo e(__('Section Four Image Two :')); ?><span class="text-danger">*</span></label><br>
										<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" name="four_img_two" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
										<?php if($image = @file_get_contents('../public/images/careers/'.$careers['four_img_two'])): ?>
										<img src="<?php echo e(url('/images/careers/'.$careers['four_img_two'])); ?>" class="image_size"/>
										<?php endif; ?>
										
				                  	</div>

				                  	<div class="col-md-4">

									  <label class="text-dark"><?php echo e(__('Section Four Image Three :')); ?><span class="text-danger">*</span></label><br>
										<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" name="four_img_three" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
										<?php if($image = @file_get_contents('../public/images/careers/'.$careers['four_img_three'])): ?>
										<img src="<?php echo e(url('/images/careers/'.$careers['four_img_three'])); ?>" class="image_size"/>
										<?php endif; ?>
										
					                    <br>
					                    <br>
				                  	</div>

				                  	<div class="col-md-4">

									  <label class="text-dark"><?php echo e(__('Section Four Image Four :')); ?><span class="text-danger">*</span></label><br>
										<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" name="four_img_four" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
										<?php if($image = @file_get_contents('../public/images/careers/'.$careers['four_img_four'])): ?>
										<img src="<?php echo e(url('/images/careers/'.$careers['four_img_four'])); ?>" class="image_size"/>
										<?php endif; ?>
										
				                  	</div>

				                  	<div class="col-md-4">
									  	<label class="text-dark"><?php echo e(__('Section Four Image Five :')); ?><span class="text-danger">*</span></label><br>
										<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" name="four_img_five" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
										<?php if($image = @file_get_contents('../public/images/careers/'.$careers['four_img_five'])): ?>
										<img src="<?php echo e(url('/images/careers/'.$careers['four_img_five'])); ?>" class="image_size"/>
										<?php endif; ?>
				                  	</div>

				                  	<div class="col-md-4">

									  <label class="text-dark"><?php echo e(__('Section Four Image Six :')); ?><span class="text-danger">*</span></label><br>
										<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" name="four_img_six" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
										<?php if($image = @file_get_contents('../public/images/careers/'.$careers['four_img_six'])): ?>
										<img src="<?php echo e(url('/images/careers/'.$careers['four_img_six'])); ?>" class="image_size"/>
										<?php endif; ?>
					                    <br>
					                    <br>
				                  	</div>

				                  	<div class="col-md-4">

									  <label class="text-dark"><?php echo e(__('Section Four Image Seven :')); ?><span class="text-danger">*</span></label><br>
										<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" name="four_img_seven" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
										<?php if($image = @file_get_contents('../public/images/careers/'.$careers['four_img_seven'])): ?>
										<img src="<?php echo e(url('/images/careers/'.$careers['four_img_seven'])); ?>" class="image_size"/>
										<?php endif; ?>
				                  	</div>

				                  	<div class="col-md-4">

									  <label class="text-dark"><?php echo e(__('Section Four Image Eight :')); ?><span class="text-danger">*</span></label><br>
										<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" name="four_img_eight" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
										<?php if($image = @file_get_contents('../public/images/careers/'.$careers['four_img_eight'])): ?>
										<img src="<?php echo e(url('/images/careers/'.$careers['four_img_eight'])); ?>" class="image_size"/>
										<?php endif; ?>
				                  	</div>

				                  	<div class="col-md-4">
									  <label class="text-dark"><?php echo e(__('Section Four Image Nine :')); ?><span class="text-danger">*</span></label><br>
										<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupFileAddon01"><?php echo e(__('Upload')); ?></span>
										</div>
										<div class="custom-file">
											<input accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" name="four_img_nine" aria-describedby="inputGroupFileAddon01">
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
										</div>
										</div>
										<?php if($image = @file_get_contents('../public/images/careers/'.$careers['four_img_nine'])): ?>
										<img src="<?php echo e(url('/images/careers/'.$careers['four_img_nine'])); ?>" class="image_size"/>
										<?php endif; ?>
					                    <br>
					                    <br>
				                  	</div>
		                        </div>
				            </div>
				        </div>
						<br>
						<br>
						<!-- section 4 end -->
						<!-- section 5 start -->
						<div class="row">
							<div class="col-md-12">
		                        <label  class="text-dark" for="four_enable"><?php echo e(__('Section Five')); ?></label><br>
								<input type="checkbox" class="custom_toggle" id="customSwitch5" name="five_enable" <?php echo e($careers['five_enable']==1 ? 'checked' : ''); ?>/>
                                <input type="hidden" name="free" value="0" for="customSwitch5" id="customSwitch5">
		                        <br>
		                        <div class="row" style="<?php echo e($careers['five_enable']==1 ? '' : 'display:none'); ?>" id="section_five">
									<div class="col-md-4">
					                    <label class="text-dark" for="five_heading"><?php echo e(__('Section Five Heading : ')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_heading']); ?>" name="five_heading" type="text" class="form-control" placeholder="<?php echo e(__('Enter Heading')); ?>" />
					                </div>

				                  	<div class="col-md-4">
					                    <label class="text-dark" for="five_text"><?php echo e(__('Section Five Text :')); ?> <span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_text']); ?>" name="five_text" type="text" class="form-control" placeholder="<?php echo e(__('Enter Text')); ?>" />
									</div>

									<div class="col-md-4 display-none">
					                    <label class="text-dark" for="five_icon"><?php echo e(__('Section Five Icon :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_icon']); ?>" name="five_icon" type="text" class="form-control" placeholder="<?php echo e(__('Select Icon')); ?>" />
					                    <br>
									</div>

									<div class="col-md-6">
					                    <label class="text-dark" for="five_textone"><?php echo e(__('Section Five Topic One :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_textone']); ?>" name="five_textone" type="text" class="form-control" placeholder="<?php echo e(__('Enter Topic')); ?>"/>
					                    <br>
									
					                    <label class="text-dark" for="five_texttwo"><?php echo e(__('Section Five Topic Two : ')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_texttwo']); ?>" name="five_texttwo" type="text" class="form-control" placeholder="<?php echo e(__('Enter Topic')); ?>" />
					                    <br>
									
					                    <label class="text-dark" for="five_textthree"><?php echo e(__('Section Five Topic Three :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_textthree']); ?>" name="five_textthree" type="text" class="form-control" placeholder="<?php echo e(__('Enter Topic')); ?>" />
					                    <br>
									
					                    <label class="text-dark" for="five_textfour"><?php echo e(__('Section Five Topic Four :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_textfour']); ?>" name="five_textfour" type="text" class="form-control" placeholder="<?php echo e(__('Enter Topic')); ?>" />
					                    <br>
									
					                    <label class="text-dark" for="five_textfive"><?php echo e(__('Section Five Topic Five :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_textfive']); ?>" name="five_textfive" type="text" class="form-control" placeholder="<?php echo e(__('Enter Topic')); ?>" />
					                    <br>
									
					                    <label class="text-dark" for="five_textsix"><?php echo e(__('Section Five Topic Six :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_textsix']); ?>" name="five_textsix" type="text" class="form-control" placeholder="<?php echo e(__('Enter Topic')); ?>') }}" />
					                    <br>
									
					                    <label class="text-dark" for="five_textseven"><?php echo e(__('Section Five Topic Seven :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_textseven']); ?>" name="five_textseven" type="text" class="form-control" placeholder="<?php echo e(__('Enter Topic')); ?>" />
					                    <br>
									
					                    <label class="text-dark" for="five_texteight"><?php echo e(__('Section Five Topic Eight :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_texteight']); ?>" name="five_texteight" type="text" class="form-control" placeholder="<?php echo e(__('Enter Topic')); ?>"/>
					                    <br>
									
					                    <label class="text-dark" for="five_textnine"><?php echo e(__('Section Five Topic Nine :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_textnine']); ?>" name="five_textnine" type="text" class="form-control" placeholder="<?php echo e(__('Enter Topic')); ?>" />
					                    <br>
									
					                    <label class="text-dark" for="five_textten"><?php echo e(__('Section Five Topic Ten :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['five_textten']); ?>" name="five_textten" type="text" class="form-control" placeholder="<?php echo e(__('Enter Topic')); ?>" />
					                    <br>
									</div>

									<div class="col-md-6">
					                   	<label class="text-dark" for="five_dtlone"><?php echo e(__('Section Five Detail One :')); ?><span class="text-danger">*</span></label>
					                    <textarea name="five_dtlone" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Deatil')); ?>" ><?php echo e($careers['five_dtlone']); ?></textarea>
					                    <br>
					                   
					                   	<label class="text-dark" for="five_dtltwo"><?php echo e(__('Section Five Detail two :')); ?><span class="text-danger">*</span></label>
					                    <textarea name="five_dtltwo" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Deatil')); ?>" ><?php echo e($careers['five_dtltwo']); ?></textarea>
					                    <br>
					                    
					                
					                   	<label class="text-dark" for="five_dtlthree"><?php echo e(__('Section Five Detail three :')); ?><span class="text-danger">*</span></label>
					                    <textarea name="five_dtlthree" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Deatil')); ?>" ><?php echo e($careers['five_dtlthree']); ?></textarea>
					                    <br>
					                    
					                   	<label class="text-dark" for="five_dtlfour"><?php echo e(__('Section Five Detail four :')); ?> <span class="text-danger">*</span></label>
					                    <textarea name="five_dtlfour" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Deatil')); ?>" ><?php echo e($careers['five_dtlfour']); ?></textarea>
					                    <br>
					                    
					                   	<label class="text-dark" for="five_dtlfive"><?php echo e(__('Section Five Detail five :')); ?> <span class="text-danger">*</span></label>
					                    <textarea name="five_dtlfive" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Deatil')); ?>" ><?php echo e($careers['five_dtlfive']); ?></textarea>
					                    <br>
					                   
					                   	<label class="text-dark" for="five_dtlsix"><?php echo e(__('Section Five Detail six :')); ?><sup class="redstar">*</sup></label>
					                    <textarea name="five_dtlsix" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Deatil')); ?>" ><?php echo e($careers['five_dtlsix']); ?></textarea>
					                    <br>
					                    
					                   	<label class="text-dark" for="five_dtlseven"><?php echo e(__('Section Five Detail seven :')); ?><span class="text-danger">*</span></label>
					                    <textarea name="five_dtlseven" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Deatil')); ?>" ><?php echo e($careers['five_dtlseven']); ?></textarea>
					                    <br>
					                    
					                   	<label class="text-dark" for="five_dtleight"><?php echo e(__('Section Five Detail eight :')); ?><span class="text-danger">*</span></label>
					                    <textarea name="five_dtleight" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Deatil')); ?>" ><?php echo e($careers['five_dtleight']); ?></textarea>
					                    <br>
					                    
					                   	<label class="text-dark" for="five_dtlnine"><?php echo e(__('Section Five Detail nine :')); ?> <span class="text-danger">*</span></label>
					                    <textarea name="five_dtlnine" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Deatil')); ?>') }}" ><?php echo e($careers['five_dtlnine']); ?></textarea>
					                    <br>
					                    
					                   	<label class="text-dark" for="five_dtlten"><?php echo e(__('Section Five Detail ten :')); ?> <span class="text-danger">*</span></label>
					                    <textarea name="five_dtlten" rows="1"  class="form-control" placeholder="<?php echo e(__('Enter Deatil')); ?>" ><?php echo e($careers['five_dtlten']); ?></textarea>
					                    <br>
					                </div>
		                        </div>
				            </div>
				        </div>
						<br>
						<br>
						<!-- section 5 end -->

						<!-- section 6 start -->
						<div class="row">
							<div class="col-md-12">
		                        <label  class="text-dark" for="four_enable"><?php echo e(__('Section Six')); ?></label><br>
								<input type="checkbox" class="custom_toggle" id="customSwitch6" name="six_enable" <?php echo e($careers['six_enable']==1 ? 'checked' : ''); ?>/>
                                <input type="hidden" name="free" value="0" for="customSwitch6" id="customSwitch6">
		                        <br>
		                        <div class="row" style="<?php echo e($careers['six_enable']==1 ? '' : 'display:none'); ?>" id="section_six">
		                        	<div class="col-md-6">
					                    <label class="text-dark" for="six_heading"><?php echo e(__('Section Six Heading : ')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['six_heading']); ?>" name="six_heading" type="text" class="form-control" placeholder="Enter Heading" />
					                </div>

									<div class="col-md-6">
					                   	<label class="text-dark" for="six_text"><?php echo e(__('Section Six Text :')); ?><span class="text-danger">*</span></label>
					                    <textarea name="six_text" rows="3"  class="form-control" placeholder="Enter Text" ><?php echo e($careers['six_text']); ?></textarea>
					                    <br>
					                </div>

					                <div class="col-md-6">
					                    <label class="text-dark" for="six_topic_one"><?php echo e(__('Section Six Topic One :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['six_topic_one']); ?>" name="six_topic_one" type="text" class="form-control" placeholder="Enter Title" />
					                </div>

					                <div class="col-md-6">
					                    <label class="text-dark" for="six_topic_two"><?php echo e(__('Section Six Topic Two :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['six_topic_two']); ?>" name="six_topic_two" type="text" class="form-control" placeholder="Enter Title" />
					                    <br>
					                </div>

					                <div class="col-md-6">
					                    <label class="text-dark" for="six_topic_three"><?php echo e(__('Section Six Topic Three :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['six_topic_three']); ?>" name="six_topic_three" type="text" class="form-control" placeholder="Enter Title" />
					                </div>

					                <div class="col-md-6">
					                    <label class="text-dark" for="six_topic_four"><?php echo e(__('Section Six Topic Four :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['six_topic_four']); ?>" name="six_topic_four" type="text" class="form-control" placeholder="Enter Title" />
					                    <br>
					                </div>

					                <div class="col-md-6">
					                    <label class="text-dark" for="six_topic_five"><?php echo e(__('Section Six Topic Five :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['six_topic_five']); ?>" name="six_topic_five" type="text" class="form-control" placeholder="Enter Title" />
					                </div>

					                <div class="col-md-6">
					                    <label class="text-dark" for="six_topic_six"><?php echo e(__('Section Six Topic Six :')); ?><span class="text-danger">*</span></label>
					                    <input value="<?php echo e($careers['six_topic_six']); ?>" name="six_topic_six" type="text" class="form-control" placeholder="Enter Title" />
					                    <br>
					                </div>
		                        </div>
				            </div>
				        </div>
						<br>
						<br>
						<!-- section 6 end -->
		              	
						<div class="form-group">
							<button type="reset" class="btn btn-danger-rgba mr-1" title="<?php echo e(__('Reset')); ?>"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
								<?php echo e(__("Update")); ?></button>
						</div>

		          	</form>
				<!-- form for comming soon end -->
                </div>
				<!-- card body end -->
            
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
    <br><br>
<?php $__env->stopSection(); ?>
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<?php $__env->startSection('script'); ?>
<script>
(function($) {
  "use strict";

  	$(document).ready(function(){

      $('#customSwitch1').change(function(){
        if($('#customSwitch1').is(':checked')){
        	$('#section_one').show('fast');
        }else{
        	$('#section_one').hide('fast');
        }

      });

      $('#customSwitch2').change(function(){
        if($('#customSwitch2').is(':checked')){
        	$('#section_two').show('fast');
        }else{
        	$('#section_two').hide('fast');
        }

      });

      $('#customSwitch3').change(function(){
        if($('#customSwitch3').is(':checked')){
        	$('#section_three').show('fast');
        }else{
        	$('#section_three').hide('fast');
        }

      });

      $('#customSwitch4').change(function(){
        if($('#customSwitch4').is(':checked')){
        	$('#section_four').show('fast');
        }else{
        	$('#section_four').hide('fast');
        }

      });

      $('#customSwitch5').change(function(){
        if($('#customSwitch5').is(':checked')){
        	$('#section_five').show('fast');
        }else{
        	$('#section_five').hide('fast');
        }

      });

      $('#customSwitch6').change(function(){
        if($('#customSwitch6').is(':checked')){
        	$('#section_six').show('fast');
        }else{
        	$('#section_six').hide('fast');
        }

      });
  	});
 })(jQuery);
</script>
<style>
    .image_size{
    height:80px;
    width:200px;
}
</style>
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass\resources\views/admin/careers/edit.blade.php ENDPATH**/ ?>
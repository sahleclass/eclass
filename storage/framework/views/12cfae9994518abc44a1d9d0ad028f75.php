
<?php $__env->startSection('title', __('Job Portal')); ?>
<!--section start--> 
<?php $__env->startSection('content'); ?>
<!-- css section start--> 
<?php $__env->startSection('custom-head'); ?>
<link rel="stylesheet" href="<?php echo e(url('/css/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(Module::asset('resume:css/resume.css')); ?>">
<link rel="stylesheet" href="<?php echo e(Module::asset('resume:css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(Module::asset('resume:css/index.css')); ?>">

<?php $__env->stopSection(); ?>
<!-- css section end--> 
<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--section start--> 
<section class="profile-item-block job-portal-block">
 <!-- container start -->
  <div class="container back mt-2">
    <!--row start-->
    <div class="row">
      <div class="col-md-3">
        <div class="nav top flex-column button text-center  bg-white" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active"  id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-book"></i> <?php echo e(__("My Resume")); ?></a>
          <a class="nav-link " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"> <i class="fa fa-address-card"></i> <?php echo e(__("Post a new Job")); ?></a>
          <a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-briefcase"></i> <?php echo e(__("Created Job")); ?></a>
          <a class="nav-link " id="v-pills-apply-tab" data-toggle="pill" href="#v-pills-apply" role="tab" aria-controls="v-pills-apply" aria-selected="false"><i class="fa fa-briefcase"></i> <?php echo e(__("Applied Job")); ?></a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <?php
              $info = Modules\Resume\Models\Personalinfo::where('user_id',Auth::user()->id)->count();
              $statusresume = Modules\Resume\Models\Personalinfo::where('user_id',Auth::user()->id)->value('status');
              $message = Modules\Resume\Models\Personalinfo::where('user_id',Auth::user()->id)
                                                            ->value('message');
            ?>
            
              <div class="form-wizard bg-white">
                <?php if(filter_var($info) < 1): ?>
                <form method="post"  enctype="multipart/form-data"  action="<?php echo e(route('resume.store',["id" => Auth::user()->id])); ?>" >
                  <?php echo csrf_field(); ?>
                  <div class="form-wizard-header">
                    <ul class="list-unstyled form-wizard-steps clearfix">
                      <li class="active"><span>1</span></li>
                      <li><span>2</span></li>
                      <li><span>3</span></li>
                      <li><span>4</span></li>
                      <li><span>5</span></li>
                    </ul>
                  </div>
                  <fieldset class="wizard-fieldset show">
                    <div class="row">
                      <div class="col-md-12">
                          <h3><?php echo e(__("Personal Information")); ?></h3>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="control-label"><?php echo e(__("First Name")); ?>  <span class="text-danger">*</span></label>
                          <input  type="text" title="<?php echo e(__("Enter first name")); ?>" required name="fname"  class="form-control wizard-required" placeholder="Enter First Name"  />
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="control-label"><?php echo e(__("Last Name")); ?>  <span class="text-danger">*</span></label>
                          <input type="text" name="lname" title="<?php echo e(__("Enter last name")); ?>" required class="form-control wizard-required" placeholder="Enter Last Name" />
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="control-label"><?php echo e(__("Image")); ?>  <span class="text-danger">*</span></label>
                          <div class="custom-file mb-3">
                              <input type="file" class="form-control wizard-required" title="<?php echo e(__("Image required")); ?>" required id="customFile" name="photo">
                              <div class="wizard-form-error"></div>
                          </div>
                      </div>
                              
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("Profession")); ?>  <span class="text-danger">*</span></label>
                          <input type="text" name="profession" title="<?php echo e(__("Enter your profession")); ?>" required  class="form-control wizard-required" placeholder="Enter Your Profession" />
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("Language")); ?>  <span class="text-danger">*</span></label>
                          <input  type="text" name="language"  title="<?php echo e(__("Enter language")); ?>" required  class="form-control wizard-required" placeholder="Enter Language" />
                          <div class="wizard-form-error"></div>
                      </div> 
                      
                      <div class="form-group col-md-4">
                          <label class="control-label"><?php echo e(__("Country")); ?>  <span class="text-danger">*</span></label>
                          <input type="text" name="country"  title="<?php echo e(__("Enter your country")); ?>" required  class="form-control wizard-required" placeholder="Enter Your Country" />
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="control-label"><?php echo e(__("State")); ?>  <span class="text-danger">*</span></label>
                          <input type="text" name="country_state" title="<?php echo e(__("Enter your state")); ?>" required   class="form-control wizard-required" placeholder="Enter Your State" />
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="control-label"><?php echo e(__("City")); ?>  <span class="text-danger">*</span></label>
                          <input  type="text" name="country_city"  title="<?php echo e(__("Enter your city")); ?>" required   class="form-control wizard-required" placeholder="Enter Your City" />
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-12">
                          <label class="control-label"><?php echo e(__("Address")); ?>  <span class="text-danger">*</span></label>
                          <input  type="text" name="address"  title="<?php echo e(__("Enter your address")); ?>" required class="form-control wizard-required" placeholder="Enter Your Address" />
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("Phone No.")); ?>  <span class="text-danger">*</span></label>
                          <input  type="phone" name="phone"  title="<?php echo e(__("Enter your phone no.")); ?>" required class="form-control wizard-required" placeholder="Enter Your Phone No." />
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("Email")); ?>  <span class="text-danger">*</span></label>
                          <input  type="email" name="email"  title="<?php echo e(__("Enter your email")); ?>" required class="form-control wizard-required" placeholder="Enter Your Email" />
                          <div class="wizard-form-error"></div>
                      </div>
                    </div>
                    <div class="form-group clearfix">
                      <a href="javascript:;" class="form-wizard-next-btn float-right"><?php echo e(__("Next")); ?></a>
                    </div>
                  </fieldset>	
                  <fieldset class="wizard-fieldset">
                    <h3 class="ml-4"><?php echo e(__("Academic Details")); ?></h3>
                    <div class="row dynamicTable" >
                      <input type="hidden" name="addcourse[0][user_id]" value="<?php echo e(Auth::user()->id); ?>">
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("Course/Degree")); ?> <span class="text-danger">*</span></label>
                          <input type="text" name="course[]" title="<?php echo e(__("Enter course")); ?>" required class="form-control wizard-required" placeholder="Course/Degree"/>
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("School/College/University Name")); ?> <span class="text-danger">*</span></label>
                          <input  type="text"  name="school[]" title="<?php echo e(__("Enter school/college/university name")); ?>"  required class="form-control wizard-required"  placeholder="School/College/University Name"/>
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6" >
                          <label class="control-label"><?php echo e(__("Marks/CGPA")); ?> <span class="text-danger">*</span></label>
                          <input  type="text"  name="marks[]" title="<?php echo e(__("Enter marks/CGPA")); ?>"  required class="form-control wizard-required" placeholder="Marks/CGPA"/>
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6"  id="existingCustomer1">
                          <label class="control-label"><?php echo e(__("Year of passing")); ?> <span class="text-danger">*</span></label>
                          <input  type="date" name="yearofpassing[]"  title="<?php echo e(__("Enter year of passing")); ?>"  required class="form-control wizard-required"  placeholder="Year Of passing"/>
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <button type="button"  id="addacademic" class="addacademic btn btn-outline-danger action-button rounded"><?php echo e(__("Add More")); ?></button>
                          </div>
                      </div>
                    </div>
                    <div class="form-group clearfix">
                      <a href="javascript:;" class="form-wizard-previous-btn float-left"><?php echo e(__("Previous")); ?></a>
                      <a href="javascript:;" class="form-wizard-next-btn float-right"><?php echo e(__("Next")); ?></a>
                    </div>
                  </fieldset>	
                  <fieldset class="wizard-fieldset">
                    <h3 class="ml-4"><?php echo e(__("Working History")); ?></h3>
                    <div class="row workinghistory">
                      <input type="hidden" name="job[0][user_id]" value="<?php echo e(Auth::user()->id); ?>">
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("Job Title")); ?> <span class="text-danger">*</span></label>
                          <input  type="text"  name="jobtitle[]"  title="<?php echo e(__("Enter job title")); ?>"  required class="form-control wizard-required"  placeholder="Job Title"/>
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("Employer")); ?> <span class="text-danger">*</span></label>
                          <input  type="text"  name="employer[]" title="<?php echo e(__("Enter employer")); ?>"  required class="form-control wizard-required"  placeholder="Employer" />
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("City")); ?> <span class="text-danger">*</span></label>
                          <input  type="text" name="city[]" title="<?php echo e(__("Job city")); ?>"  required class="form-control wizard-required"    placeholder="city"/>
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("State")); ?> <span class="text-danger">*</span></label>
                          <input  type="text" name="state[]"  title="<?php echo e(__("Job state")); ?>"  required class="form-control wizard-required"  placeholder="state"/>
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("Start Date")); ?> <span class="text-danger">*</span></label>
                          <input  type="date" name="startdate[]"  title="<?php echo e(__("Job start date")); ?>"  required  class="form-control wizard-required"    placeholder="Select"/>
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6">
                          <label class="control-label"><?php echo e(__("End Date")); ?> <span class="text-danger">*</span></label><br>
                          <input  type="date" name="enddate[]"   title="<?php echo e(__("Job end date")); ?>"  required class="form-control wizard-required" placeholder="Select"/>
                          <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6">
                          <button type="button"  id="addwork" class="action-button  btn btn-outline-danger rounded"><?php echo e(__("Add More")); ?></button>
                      </div>
                    </div>
                    <div class="form-group clearfix">
                      <a href="javascript:;" class="form-wizard-previous-btn float-left"><?php echo e(__("Previous")); ?></a>
                      <a href="javascript:;" class="form-wizard-next-btn float-right"><?php echo e(__("Next")); ?></a>
                    </div>
                  </fieldset>	
                  <fieldset class="wizard-fieldset">
                    <h3 class="ml-4"><?php echo e(("Project")); ?></h3>
                    <div class="row project">
                      <div class="form-group col-md-6">
                        <label class="control-label"><?php echo e(__("Project Title")); ?> <span class="text-danger">*</span></label>
                        <input  type="text" name="projecttitle[]"  title="<?php echo e(__("Enter project title")); ?>"  required class="form-control wizard-required"  placeholder="Project Title"/>
                        <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><?php echo e(__("Role")); ?> <span class="text-danger">*</span></label>
                        <input  type="text" name="role[]" class="form-control wizard-required"  title="<?php echo e(__("Enter project role")); ?>"  required  placeholder="Role"/>
                        <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-12">
                        <label class="control-label"><?php echo e(__("Description")); ?> <span class="text-danger">*</span></label>
                        <input  type="text" name="description[]"  class="form-control wizard-required"  title="<?php echo e(__("Enter project description")); ?>"  required placeholder="description" />
                        <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-12">
                          <button type="button"  id="addproject" class="action-button btn btn-outline-danger rounded"><?php echo e(__("Add More")); ?></button>
                      </div>
                    </div>
                    <div class="form-group clearfix">
                      <a href="javascript:;" class="form-wizard-previous-btn float-left"><?php echo e(__("Previous")); ?></a>
                      <a href="javascript:;" class="form-wizard-next-btn float-right"><?php echo e(__("Next")); ?></a>
                    </div>
                  </fieldset>	
                  <fieldset  class="wizard-fieldset">
                    <div class="row setup-content" id="step-5">
                      <div class="col-md-12">
                        <h3><?php echo e(__("Strength and Hobbies")); ?></h3>
                      </div>
                      <div class="form-group col-md-12">
                            <label class="control-label"><?php echo e(__("Objective")); ?> <span class="text-danger">*</span></label>
                            <textarea name="objective"  type="text" title="<?php echo e(__("Enter objective")); ?>"  required class="form-control textarea_size wizard-required" placeholder="Objective"></textarea>
                            <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-12">
                            <label class="control-label"><?php echo e(__("Skills")); ?> <span class="text-danger">*</span></label>
                            <textarea name="skill" id="" type="text"  title="<?php echo e(__("Enter skills")); ?>"  required  class="form-control textarea_size wizard-required" placeholder="Skills"></textarea>
                            <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-12">
                        <label class="control-label"><?php echo e(__("Strength And Hobbies")); ?> <span class="text-danger">*</span></label>
                        <textarea name="strength" id="" type="text" title="<?php echo e(__("Enter strength and hobbies")); ?>"  required class="form-control textarea_size wizard-required" placeholder="Strength And Hobbies"></textarea>
                        <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group col-md-12">
                        <label class="control-label"><?php echo e(__("Field of interest")); ?> <span class="text-danger">*</span></label>
                          <textarea name="interest" id="" type="text" title="<?php echo e(__("Enter Field of interest")); ?>"  required  class="form-control textarea_size wizard-required" placeholder="Field of interest"></textarea>
                        <div class="wizard-form-error"></div>
                      </div>
                      <div class="form-group clearfix float-right">
                        <a href="javascript:;" class="form-wizard-previous-btn float-left mr-3"><?php echo e(__("Previous")); ?></a>
                        <button type="submit" class="form-wizard-submit float-right"><?php echo e(__("Submit")); ?></button>
                      </div>
                    </div>
                  </fieldset>
                  
                  
                </form>
                <?php else: ?>
              
                <?php if(filter_var($statusresume) == 0 && !filter_var($message)): ?>
                  <h4 class="text-center"><span class="text-success"> <?php echo e(__("Congratulations!")); ?></span> <?php echo e(__("You have successfully submitted your resume")); ?></h4>
                  <p class="text-center"><?php echo e(__("Your resume is currently under process. Once it is approved by our team, your resume will be displayed in resume section.")); ?></p>
                  <?php elseif(filter_var($statusresume) == 0 && filter_var($message)): ?>
                  <div class="ml-5 mr-5 mb-3">
                    <h4 class="text-center"><?php echo e(__("Your Resume Is")); ?> <span class="text-danger">"<?php echo e(__("Rejected")); ?>"</span></h4>
                    <div class="alert alert-danger" role="alert"><i class="fa fa-frown-o"></i> <?php echo e(filter_var( $message)); ?></div>
                  </div>
                  <?php else: ?>
                    <h4 class="text-center"><span class="text-success"> <?php echo e(__("Congratulations!")); ?> </span><?php echo e(__("Your resume is Approved")); ?></h4>
                <?php endif; ?>
                <!--Edit and View Button-->
                <div class="text-center mb-2">
                  <a type="button" href="<?php echo e(route('resume.edit',['id'=>Auth::user()->id])); ?>" class=" btn-sm btn btn-info" > <i class="fa fa-pencil" aria-hidden="true"></i></a>
                  <a type="button" href="<?php echo e(route('myresume.view',['id'=>Auth::user()->id])); ?>" class="edit_button btn-sm btn btn-info  "> <i class="fa fa-eye" aria-hidden="true"></i></a>
                </div>
                <!--View Module End-->
                <?php endif; ?>
              </div>  
            
            
          </div>
          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            <div class="profile-info-block">
              <div class="row">
                <div class="col-lg-6">
                  <div class="profile-heading"><?php echo e(__('Post a job')); ?></div>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="<?php echo e(route('job.import')); ?>" type="button" class="btn btn-primary" title="import">Import</a>
                  </div>
              </div>
              <form method="post" id="msform" enctype="multipart/form-data"  action="<?php echo e(route('job.store',["id" => Auth::user()->id])); ?>" >
                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for=""><?php echo e(__('Company Name')); ?> <span class="text-danger">*</span></label>
                    <input type="text"  name="companyname" required class="form-control" placeholder="<?php echo e(__("Company Name")); ?>" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label for=""><?php echo e(__('Job Title')); ?> <span class="text-danger">*</span></label>
                    <input type="text"  name="title" required class="form-control" placeholder="<?php echo e(__("Job Title")); ?>" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label for=""><?php echo e(__('Job Description')); ?> <span class="text-danger">*</span></label>
                    <textarea  name="description" id="detail"  class="form-control" placeholder="<?php echo e(__('Job Description')); ?>" value=""></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label for=""><?php echo e(__('Requirement')); ?> <span class="text-danger">*</span></label>
                    <input type="number" required name="requirement" class="form-control" placeholder="<?php echo e(__("Requirement")); ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for=""><?php echo e(__('Location')); ?> <span class="text-danger">*</span></label>
                    <input type="text" required  name="location" class="form-control" placeholder="<?php echo e(__("Location")); ?>" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label for=""><?php echo e(__('Experience')); ?> <span class="text-danger">*</span></label>
                    <div class="row">
                      
                      <div class="col-md-4">
                        
                        <input type="number"  name="minexp" required class="form-control" placeholder="<?php echo e(__("Minimum")); ?>" required>
                      </div>
                      <div class="col-md-4">
                      
                        <input type="number"  name="maxexp" required class="form-control" placeholder="<?php echo e(__("Maximum")); ?>" required>
                      </div>
                      <div class="col-md-4">
                        
                        <select name="experience" class="form-control" id="size">
                          <option value="months"><?php echo e(__("Months")); ?></option>
                          <option  value="years"><?php echo e(__("Years")); ?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                    
                  <div class="form-group col-md-6">
                    <label for=""><?php echo e(__('Role')); ?> <span class="text-danger">*</span></label>
                    <input type="text"  name="role" required class="form-control" placeholder="<?php echo e(__("Role")); ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for=""><?php echo e(__('Industry Type')); ?> <span class="text-danger">*</span></label>
                    <input type="text"  name="industry_type" required class="form-control" placeholder="<?php echo e(__("Industry Type")); ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for=""><?php echo e(__('Employment Type')); ?> <span class="text-danger">*</span></label>
                    <input type="text"  name="employment_type" required class="form-control" placeholder="<?php echo e(__("Employment Type")); ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label"><?php echo e(__("Image")); ?> <span class="text-danger">*</span></label>
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="image">
                          <label class="custom-file-label" for="customFile"><?php echo e(__("Choose file")); ?></label>
                      </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for=""><?php echo e(__('Salary')); ?> </span></label>
                    <div class="row">
                      
                      <div class="col-md-4">
                        
                        <input type="number"  name="minsalary" class="form-control" placeholder="<?php echo e(__("Minimum")); ?>">
                      </div>
                      <div class="col-md-4">
                      
                        <input type="number"  name="maxsalary" class="form-control" placeholder="<?php echo e(__("Maximum")); ?>">
                      </div>
                      <div class="col-md-4">
                        
                        <select name="salary" class="form-control" id="size">
                          <option value="PA"><?php echo e(__("PA")); ?></option>
                          <option  value="PM"><?php echo e(__("PM")); ?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for=""><?php echo e(__('Key Skills')); ?> <span class="text-danger">*</span></label>
                    <input type="text"  name="skills" required class="form-control" placeholder="<?php echo e(__("Key Skills")); ?>" required>
                  </div>
                  <div class="form-group col-md-12 text-right">
                    <button type="submit" class="btn-sm btn btn-primary" title="upload items"><?php echo e(__('Submit')); ?></button>
                  </div>
                </div>
              </form>
             </div>
          </div>
          
          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <!-- card start-->
              <div class="card create-job-portal mb-3">
                <div class="row ml-2 mt-3 mb-3 mr-2">
                
                  <div class="col-lg-9 col-md-8">
                      <h5 class="title"> <?php echo e(filter_var($data->title)); ?>  <?php if($data->varified == 1): ?>  
                        <img src="<?php echo e(Module::asset('resume:image/verified.png')); ?>" class="img-fluid verfied" alt="image"> <?php endif; ?> 
                      <?php if($data->approved == 0 && $data->message): ?> <p class="badge badge-danger"><?php echo e(__("Rejected")); ?></p> 
                      <?php elseif(filter_var($data->approved) == 0): ?>
                      <p class="badge badge-warning"><?php echo e(__("Processing")); ?></p> <?php else: ?>
                      <p class="badge badge-success"><?php echo e(__("Approved")); ?></p> <?php endif; ?>
                    </h5>
                    <p><?php echo e(filter_var($data->companyname)); ?></p>
                    <p class="p-color"> <i class="fa fa-suitcase mr-2"></i><?php echo e(filter_var($data->min_experience)); ?> - <?php echo e(filter_var($data->max_experience)); ?>  <?php echo e(filter_var($data->experience)); ?> &nbsp; &nbsp; <i class="fa fa-map-marker mr-2" ></i><?php echo e(filter_var($data->location)); ?></p>
                    <p class="p-color"><i class="fa fa-file-text-o mr-2" aria-hidden="true"></i><?php echo e(substr(strip_tags($data->description), 0, 80)); ?><?php echo e(strlen(strip_tags($data->description))>80 ? '...' : ""); ?></p>
                    <p class="p-color mt-3"><?php echo e(str_replace(',', '   .   ', $data->skills )); ?></p>
                    <?php if($data->approved == 0 && $data->message ): ?>  <p class="p-color text-danger"><?php echo e(__("Reason for rejection")); ?></p>  
                    <div class="alert alert-danger" role="alert"><?php echo e(filter_var($data->message)); ?></div><?php endif; ?>
                    <p class="p-color mt-3"><span class="date-color"><i class="fa fa-clock-o mr-1 ml-2" aria-hidden="true"></i><?php echo e(filter_var($data->created_at->diffForHumans())); ?></span>
                      <span class="date-color"><?php echo e(__("Job Applicants")); ?> &nbsp; <?php echo e(filter_var($data->postjob->count())); ?></span>
                    </p>
                    <div class="custom-control custom-switch mt-2">
                      <input type="checkbox" class="custom-control-input userstatus" id="customSwitches"  data-id="<?php echo e(filter_var($data->id)); ?>" name="status" <?php echo e(filter_var($data->status) == '1' ? 'checked' : ''); ?>>
                      <label class="custom-control-label" for="customSwitches"><?php echo e(__("Job Status")); ?></label>
                    </div>
                  </div>
                
                  <div class="col-lg-3 col-md-4">
                    <div class="create-job-block"> 
                      <?php if(filter_var($data->image)): ?>
                        <img src="<?php echo e(asset('files/job/'.filter_var($data->image))); ?>" class="img-fluid ml-5 job-image " alt="image">
                        <?php else: ?>
                        <img src="<?php echo e(Module::asset('resume:image/noimage.jpg')); ?>" class="img-fluid ml-5  job-image" alt="image">
                      <?php endif; ?>
                    </div>
                    <div class="create-job-block-btn">
                        <!-- view button -->
                        <a type="button"  href="<?php echo e(route("job.show",['id'=> filter_var($data->id)])); ?>" class="apply-button edit_button btn-sm btn btn-info mt-1"> <i class="fa fa-eye mt-2" aria-hidden="true"></i></a>
                        <!-- edit button -->
                        <a type="button" href="<?php echo e(route('job.edit',["id" => filter_var($data->id)])); ?>" class="apply-button btn-sm btn btn-info mt-1"> <i class="fa fa-pencil mt-2" aria-hidden="true"></i></a>
                        <!-- delete button-->
                        <button type="button"  data-toggle="modal" data-target="#delete_<?php echo e(filter_var($data->id)); ?>"  class="apply-button delete-color btn btn-info mt-1"> <i class="fa fa-trash-o " aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>
                
              </div>
              <!-- card end-->

              <!-- delete model start -->
              <div class="modal fade bd-example-modal-sm" id="delete_<?php echo e(filter_var($data->id)); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__("Delete")); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                            <p><?php echo e(__('Do you really want to delete ? ')); ?>   <?php echo e(__('This process cannot be undone.')); ?></p>
                        </div>
                        <div class="modal-footer">
                            <form method="post" action="<?php echo e(route('job.jobdestroy',['id' => $data->id])); ?>" class="pull-right"> 
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field("DELETE")); ?>

                                <button type="reset" class="btn " data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
              <!-- delete model end-->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <h3 class="mt-3 text-center">
                <i class="fa fa-frown-o"></i> <?php echo e(__("No Job Create !")); ?>

              </h3> 
            <?php endif; ?> 
          </div>
              
          <div class="tab-pane fade show" id="v-pills-apply" role="tabpanel" aria-labelledby="v-pills-apply-tab">
            <div class="row">
              <div class="col-md-12 bg-white ">
                <div class="table-responsive">
                  <table id="datatable-buttons" class="table table-striped table-bordered mt-3 w-100" >
                    <thead>
                        <tr>
                          <th><?php echo e(__("ID")); ?></th>
                          <th><?php echo e(__('Comapny Name')); ?></th>
                          <th><?php echo e(__('Job Title')); ?></th>
                          <th><?php echo e(__('Date')); ?></th>
                          <th><?php echo e(__('Delete')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $applyjobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <?php
                          $job1 = Modules\Resume\Models\Postjob::where('id',$data->job_id)->first();
                        ?>
                        <td> <?php echo e(filter_var($key+1)); ?></td>
                        <td> <?php echo e(filter_var($job1->companyname)); ?></td>
                        <td> <?php echo e(filter_var($job1->title)); ?></td>
                        <td><?php echo e(date('d-m-Y', strtotime($data->created_at))); ?></td>
                        <td>
                          <button   type="button"  data-toggle="modal" data-target="#delete<?php echo e(filter_var($data->id)); ?>"  class=" btn btn-danger"> <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </td>
                      
                      </tr>
                      <div class="modal fade bd-example-modal-sm" id="delete<?php echo e(filter_var($data->id)); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__("Delete")); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                                        <p><?php echo e(__('Do you really want to delete ? ')); ?>   <?php echo e(__('This process cannot be undone.')); ?></p>
                                </div>
                                <div class="modal-footer">
                                    <form method="post" action="<?php echo e(route('job.applyjobdestroy',['id' => filter_var($data->id)])); ?>" class="pull-right">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field("DELETE")); ?>

                                        <button type="reset" class="btn " data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                        <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                  <div class="mx-auto mb-3 paginate-resume">
                    <?php echo $applyjobs->links(); ?> 
                </div>
                </div>
              </div>
            </div>
          </div>

          
        </div>
      </div>
    </div>
    <!-- row end-->
  </div>
<!-- container end -->
</section>
<?php $__env->stopSection(); ?>

<!-- This section will contain javacsript start -->
<?php $__env->startSection('custom-script'); ?>

<script src="<?php echo e(url('admin_assets/assets/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script src="https://emart.castleindia.in/front/vendor/js/additional-methods.min.js"></script>
<script src="https://emart.castleindia.in/front/vendor/js/jquery.validate.min.js"></script>
 <!-- Datatable js -->
 
<script>var url = <?php echo json_encode(url('/'), 15, 512) ?>;</script>
<script src="<?php echo e(Module::asset('resume:js/job.js')); ?>"></script>
<script>var user = <?php echo json_encode(Auth::user()->id, 15, 512) ?>;</script>

<script src="<?php echo e(Module::asset('resume:js/resume.js')); ?>"></script>
<script src="<?php echo e(Module::asset('resume:js/append.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<!-- This section will contain javacsript end -->
<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eclass\Modules/Resume\Resources/views/front/job/index.blade.php ENDPATH**/ ?>
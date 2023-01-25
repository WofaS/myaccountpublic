<?php $this->view('admin/admin-header',$data) ?>

 <?php
  use \Model\Auth;
  $categories = get_categories();
  $positions = get_positions();
  $localPositions = get_local_positions();
  $roles = get_roles();
  $maritalStatus = get_marital_status();
  $app = get_app_details();

?>

  
    <div class="container">
      <div class="row justify-content-center">
        <div class="col d-flex flex-column align-items-center justify-content-center">

          <div class="d-flex justify-content-center py-4">
            <?php if($app):?>
            <?php foreach($app as $row):?>
            <a href="<?=ROOT?>" class="logo d-flex align-items-center w-auto">
              <img src="<?=get_image($row->image)?>" alt="">
              <span class="mb-0" >||<?=$row->appname?>  </span><br>
            </a>
              <h3 class="mb-0" >  <?=$row->district_name?></h3>
          <?php endforeach;?>
          <?php else:?>
            <a href="<?=ROOT?>" class="logo d-flex align-items-center w-auto">
              <img src="<?=ROOT?>/assets/images/cop logo.png" alt="">
              <span class="mb-0" >||<?=APP_NAME?></span>
            </a>
          <?php endif;?>
          </div id="forms-content"><!-- End Logo -->

          <form method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
            <div class="container mb-5 p-2 d-flex">
            <div class="card mb-5 p-3 col-6">
              
            <div class="card-body bg-light p-3 rounded">

              <div class="pt-2 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Member Form A</h5>
                <p class="text-center small">Enter member's personal details to create account</p>
              </div>

              
                <div class="col-12 d-flex mb-2">
                <div class="col-6 mr-2">
                  <label for="firstname" class="form-label">First Name</label>
                  <input value="<?=set_value('firstname')?>" type="text" name="firstname" class="form-control <?=!empty($errors['firstname']) ? 'border-danger':'';?>" id="firstname" required>
                  <div class="invalid-feedback">Please, enter your first name!</div>
                  <?php if (!empty($errors['firstname'])):?>
                    <div class="js-error-firstname text-danger"><small><?=$errors['firstname']?></small></div>
                  <?php endif;?>
                </div>

                <div class="col-lg-6">
                  <label for="lastname" class="form-label">Last Name</label>
                  <input value="<?=set_value('lastname')?>" type="text" name="lastname" class="form-control <?=!empty($errors['lastname']) ? 'border-danger':'';?>" id="lastname" required>
                  <div class="invalid-feedback">Please, enter your last name!</div>
                  <?php if (!empty($errors['lastname'])):?>
                    <div class="js-error-lastname text-danger"><small><?=$errors['lastname']?></small></div>
                  <?php endif;?>
                </div>
                </div>

                <div class="col-12 mb-2">
                  <label for="youremail" class="form-label">Email</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-envelope input-group-text fs-4" id="inputGroupPrepend"></i>
                    <input value="<?=set_value('email')?>" type="email" name="email" class="form-control <?=!empty($errors['email']) ? 'border-danger':'';?>" id="youremail">
                    <div class="invalid-feedback">Please enter a valid email.</div>
                  </div>
                    <?php if (!empty($errors['email'])):?>
                    <div class="js-error-email text-danger"><small><?=$errors['email']?></small></div>
                  <?php endif;?>
                </div>
                <?php if (!empty($errors['password'])):?>
                    <div class="js-error-password text-danger"><small><?=$errors['password']?></small></div>
                  <?php endif;?>

              <div class="col-12 d-flex my-2">
              <div class="col-6">
                  <label for="phone" class="form-label">Phone Number</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-phone input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('phone')?>" type="text" name="phone" class="form-control <?=!empty($errors['phone']) ? 'border-danger':'';?>" id="phone" required>
                  <div class="invalid-feedback">Please retype your phone!</div>
                </div>
                <?php if (!empty($errors['phone'])):?>
                    <div class="js-error-phone text-danger"><small><?=$errors['phone']?></small></div>
                  <?php endif;?>
              </div>

              <div class="col-6 ">
                  <label for="yourPassword" class="form-label">Gender</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bi bi-gender-ambiguous input-group-text fs-4" id="inputGroupPrepend"></i>
                    <select <?=set_value('gender')?> class="form-select <?=!empty($errors['gender']) ? 'border-danger':'';?>" name="gender"  required>
                      <option value="">--Select Gender--</option>
                      <option value="female" <?=set_value('gender') == 'female' ? 'selected' : '' ?> >female</option>
                      <option value="male" <?=set_value('gender') == 'male' ? 'selected' : '' ?>>male</option>
                    </select>
                    <div class="invalid-feedback">Gender is required.</div>
                </div>                
                <?php if (!empty($errors['gender'])):?>
                    <div class="js-error-gender text-danger"><small><?=$errors['gender']?></small></div>
                  <?php endif;?>
              </div>
              </div>

              <div class="col-12 d-flex mb-2">
              <div class="col-6">
                  <label for="yourDateofBirth" class="form-label">Date of Birth</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-calendar input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('dob')?>" type="date" name="dob" class="form-control <?=!empty($errors['dob']) ? 'border-danger':'';?>" id="dob" required>
                  <div class="invalid-feedback">Please enter your dob!</div>
                </div>
                <?php if (!empty($errors['dob'])):?>
                    <div class="js-error-dob text-danger"><small><?=$errors['dob']?></small></div>
                  <?php endif;?>
              </div>

              <div class="col-6 ">
                  <label for="yourPassword" class="form-label">Marital Status</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-user input-group-text fs-4" id="inputGroupPrepend"></i>
                    <select <?=set_value('marital_status_id')?> class="form-select <?=!empty($errors['marital_status_id']) ? 'border-danger':'';?>" name="marital_status_id"  required>
                      <option value="">--Select Marital Status--</option>
                      <?php if(!empty($maritalStatus)):?>
                        <?php foreach($maritalStatus as $cat):?>
                          <option <?=set_select('marital_status_id',$cat->marital_status)?> value="<?=$cat->marital_status?>"><?=esc($cat->marital_status)?></option>
                        <?php endforeach;?>
                      <?php endif;?>
                    </select>                    
                    <div class="invalid-feedback">Marital Status is required.</div>
                </div>                
                <?php if (!empty($errors['marital_status_id'])):?>
                    <div class="js-error-marital_status_id text-danger"><small><?=$errors['marital_status_id']?></small></div>
                  <?php endif;?>
              </div>
              </div>

              <div class="col-12 d-flex my-2">
              <div class="col-6">
                  <label for="residence" class="form-label">Residencial Address</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bxs-map input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('residence')?>" type="text" name="residence" class="form-control <?=!empty($errors['residence']) ? 'border-danger':'';?>" id="residence" required>
                  <div class="invalid-feedback">Please enter your residence location!</div>
                </div>
                <?php if (!empty($errors['job'])):?>
                    <div class="js-error-job text-danger"><small><?=$errors['job']?></small></div>
                  <?php endif;?>
              </div>

              <div class="col-6">
                  <label for="gps_address" class="form-label">GPS Address</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bxs-map input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('gps_address')?>" type="text" name="gps_address" class="form-control <?=!empty($errors['gps_address']) ? 'border-danger':'';?>" id="gps_address" >
                  <div class="invalid-feedback">Please enter your gps address location!</div>
                </div>
                <?php if (!empty($errors['gps_address'])):?>
                    <div class="js-error-gps_address text-danger"><small><?=$errors['gps_address']?></small></div>
                  <?php endif;?>
              </div>
              </div>

              <div class="col-12 d-flex mb-2">
              <div class="col-6">
                  <label for="hometown" class="form-label">Home Town</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bi bi-house-fill input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('hometown')?>" type="text" name="hometown" class="form-control <?=!empty($errors['hometown']) ? 'border-danger':'';?>" id="hometown" required>
                  <div class="invalid-feedback">Please enter your hometown location!</div>
                </div>
                <?php if (!empty($errors['hometown'])):?>
                    <div class="js-error-hometown text-danger"><small><?=$errors['hometown']?></small></div>
                  <?php endif;?>
              </div>

              <div class="col-6">
                  <label for="job" class="form-label">Occupation</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-briefcase input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('job')?>" type="text" name="job" class="form-control <?=!empty($errors['job']) ? 'border-danger':'';?>" id="job" required>
                  <div class="invalid-feedback">Please enter your job/occupation!</div>
                </div>
                <?php if (!empty($errors['job'])):?>
                    <div class="js-error-hometown text-danger"><small><?=$errors['hometown']?></small></div>
                  <?php endif;?>
              </div>
              </div>


              <div class="col-12 d-flex mb-2">
              <div class="col-4">
                  <label for="yourPassword" class="form-label">Baptized in Water?</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bi bi-cloud-fog input-group-text fs-4" id="inputGroupPrepend"></i>
                    <select <?=set_value('water_baptized')?> class="form-select <?=!empty($errors['water_baptized']) ? 'border-danger':'';?>" name="water_baptized"  required>
                      <option value="">***********</option>
                      <option value="yes" <?=set_value('water_baptized') == 'yes' ? 'selected' : '' ?> >yes</option>
                      <option value="no" <?=set_value('water_baptized') == 'no' ? 'selected' : '' ?>>no</option>
                    </select>                    
                    <div class="invalid-feedback">Water baptism Status is required.</div>
                </div>                
                <?php if (!empty($errors['water_baptized'])):?>
                    <div class="js-error-water_baptized text-danger"><small><?=$errors['water_baptized']?></small></div>
                  <?php endif;?>
              </div>

              <div class="col-4">
                  <label for="yourPassword" class="form-label">Holy Ghost Baptized?</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bi bi-cloud-drizzle-fill input-group-text fs-4" id="inputGroupPrepend"></i>
                    <select <?=set_value('holyghost_baptized')?> class="form-select <?=!empty($errors['holyghost_baptized']) ? 'border-danger':'';?>" name="holyghost_baptized"  required>
                      <option value="">***********</option>
                      <option value="yes" <?=set_value('holyghost_baptized') == 'yes' ? 'selected' : '' ?> >yes</option>
                      <option value="no" <?=set_value('holyghost_baptized') == 'no' ? 'selected' : '' ?>>no</option>
                    </select>                    
                    <div class="invalid-feedback">Holy Ghost baptism Status is required.</div>
                </div>                
                <?php if (!empty($errors['holyghost_baptized'])):?>
                    <div class="js-error-holyghost_baptized text-danger"><small><?=$errors['holyghost_baptized']?></small></div>
                  <?php endif;?>
              </div>

              <div class="col-4">
                  <label for="yourPassword" class="form-label">Attends Communion?</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bi bi-inbox-fill input-group-text fs-4" id="inputGroupPrepend"></i>
                    <select <?=set_value('communicant_status')?> class="form-select <?=!empty($errors['communicant_status']) ? 'border-danger':'';?>" name="communicant_status"  required>
                      <option value="">***********</option>
                      <option value="yes" <?=set_value('communicant_status') == 'yes' ? 'selected' : '' ?> >yes</option>
                      <option value="no" <?=set_value('communicant_status') == 'no' ? 'selected' : '' ?>>no</option>
                    </select>                    
                    <div class="invalid-feedback">Holy Ghost baptism Status is required.</div>
                </div>                
                <?php if (!empty($errors['communicant_status'])):?>
                    <div class="js-error-communicant_status text-danger"><small><?=$errors['communicant_status']?></small></div>
                  <?php endif;?>
              </div>
              </div>

              <div class="col-12 d-flex my-2">
              <div class="col-6">
                  <label for="spouse_name" class="form-label">Spouse Name <small>(if any)</small></label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bxs-user input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('spouse_name')?>" type="text" name="spouse_name" class="form-control <?=!empty($errors['spouse_name']) ? 'border-danger':'';?>" id="spouse_name">
                  <div class="invalid-feedback">Please enter your spouse name!</div>
                </div>
                <?php if (!empty($errors['spouse_name'])):?>
                    <div class="js-error-spouse_name text-danger"><small><?=$errors['spouse_name']?></small></div>
                  <?php endif;?>
              </div>

              <div class="col-6">
                  <label for="spouse_phone" class="form-label">Spouse's phone <small>(if any)</small></label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-phone input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('spouse_phone')?>" type="text" name="spouse_phone" class="form-control <?=!empty($errors['spouse_phone']) ? 'border-danger':'';?>" id="spouse_phone" >
                  <div class="invalid-feedback">Please enter your spouse's phone number!</div>
                </div>
                <?php if (!empty($errors['spouse_phone'])):?>
                    <div class="js-error-spouse_phone text-danger"><small><?=$errors['spouse_phone']?></small></div>
                  <?php endif;?>
              </div>
              </div>

            </div>
          </div>

          <div class="card mb-5 p-3 col-6">

            <div class="card-body bg-light p-3 rounded">

              <div class="pt-0 pb-0">
                <h5 class="card-title text-center pb-0 fs-4">Member Form B</h5><br>
              </div>

              <div class="col-12 ">
                  <label for="yourPassword" class="form-label"> </label>
                  <div class="input-group has-validation">
                    <label class="input-group-text text-wrap col-3" id="inputGroupPrepend">Names of Children <small class="text-muted fst-italic">(If Any)</small></label>
                    <textarea value="<?=set_value('children')?>" type="text" name="children" class="form-control <?=!empty($errors['children']) ? 'border-danger':'';?>" id="children"></textarea>
                </div>                
                <?php if (!empty($errors['children'])):?>
                    <div class="js-error-children text-danger"><small><?=$errors['children']?></small></div>
                  <?php endif;?>
              </div>

              <div class="col-12 d-flex mb-2">
              <div class="col-6">
                  <label for="father_name" class="form-label">Father's Name</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-male input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('father_name')?>" type="text" name="father_name" class="form-control <?=!empty($errors['father_name']) ? 'border-danger':'';?>" id="father_name" >
                  <div class="invalid-feedback">Please enter father's name!</div>
                </div>
                <?php if (!empty($errors['father_name'])):?>
                    <div class="js-error-father_name text-danger"><small><?=$errors['father_name']?></small></div>
                  <?php endif;?>
              </div>

              <div class="col-6">
                  <label for="father_phone" class="form-label">Father's Phone</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-phone input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('father_phone')?>" type="text" name="father_phone" class="form-control <?=!empty($errors['father_phone']) ? 'border-danger':'';?>" id="father_phone">
                  <div class="invalid-feedback">Please enter father's phone!</div>
                </div>
                <?php if (!empty($errors['father_phone'])):?>
                    <div class="js-error-father_phone text-danger"><small><?=$errors['father_phone']?></small></div>
                  <?php endif;?>
              </div>
              </div>

              <div class="col-12 d-flex mb-2 my-3">
              <div class="col-6">
                  <label for="mother_name" class="form-label">Mother's Name</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-female input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('mother_name')?>" type="text" name="mother_name" class="form-control <?=!empty($errors['mother_name']) ? 'border-danger':'';?>" id="mother_name" required>
                  <div class="invalid-feedback">Please enter mother's name!</div>
                </div>
                <?php if (!empty($errors['mother_name'])):?>
                    <div class="js-error-mother_name text-danger"><small><?=$errors['mother_name']?></small></div>
                  <?php endif;?>
              </div>



              <div class="col-6">
                  <label for="mother_phone" class="form-label">Mother's Phone</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-phone input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('mother_phone')?>" type="text" name="mother_phone" class="form-control <?=!empty($errors['mother_phone']) ? 'border-danger':'';?>" id="mother_phone">
                  <div class="invalid-feedback">Please enter Mother's name!</div>
                </div>
                <?php if (!empty($errors['mother_phone'])):?>
                    <div class="js-error-mother_phone text-danger"><small><?=$errors['mother_phone']?></small></div>
                  <?php endif;?>
              </div>
              </div>

              <div class="col-12 d-flex my-3">
              <div class="col-6">
                  <label for="emergecy_name" class="form-label">Emergency Contact Person</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-male input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('emergecy_name')?>" type="text" name="emergecy_name" class="form-control <?=!empty($errors['emergecy_name']) ? 'border-danger':'';?>" id="emergecy_name">
                  <div class="invalid-feedback">Please enter Person's name!</div>
                </div>
                <?php if (!empty($errors['emergecy_name'])):?>
                    <div class="js-error-emergecy_name text-danger"><small><?=$errors['emergecy_name']?></small></div>
                  <?php endif;?>
              </div>

               <div class="col-6">
                  <label for="emergecy_contact" class="form-label">Emergency Contact Number</label>
                  <div class="input-group has-validation">
                    <i class="text-primary bx bx-phone input-group-text fs-4" id="inputGroupPrepend"></i>
                  <input value="<?=set_value('emergecy_contact')?>" type="text" name="emergecy_contact" class="form-control <?=!empty($errors['emergecy_contact']) ? 'border-danger':'';?>" id="emergecy_contact">
                  <div class="invalid-feedback">Please enter emergency contact!</div>
                </div>
                <?php if (!empty($errors['emergecy_contact'])):?>
                    <div class="js-error-emergecy_contact text-danger"><small><?=$errors['emergecy_contact']?></small></div>
                  <?php endif;?>
              </div>
              </div>

                <div class="col-12 d-flex my-4">
                <div class="col-6 ">
                <div class="input-group has-validation">
                    <select name="category_id" id="inputState" class="form-select <?=!empty($errors['category_id']) ? 'border-danger':'';?>">
                      
                      <option value="" selected="">---Select Assembly---</option>
                      <?php if(!empty($categories)):?>
                        <?php foreach($categories as $cat):?>
                          <option <?=set_select('category_id',$cat->category)?> value="<?=$cat->category?>"><?=esc($cat->category)?></option>
                        <?php endforeach;?>
                      <?php endif;?>

                    </select>

                    <?php if(!empty($errors['category_id'])):?>
                      <small class="text-danger"><?=$errors['category_id']?></small>
                    <?php endif;?>
                  <div class="invalid-feedback">Category is required.</div>
                </div>
                </div>

                <div class="col-6">
                  <select name="role" class="form-select" required>
                    <option value="">--Select Role--</option>
                <?php if(user_can('edit_slider_images')):?>
                    <?php if(!empty($roles)):?>
                        <?php foreach($roles as $cat):?>
                          <?php if($cat->id > 2):?>
                          <option <?=set_select('role',$cat->role)?> value="<?=$cat->id?>"><?=esc($cat->role)?></option>
                      <?php endif;?>
                      <?php endforeach;?>
                      <?php endif;?>
                <?php else:?>
                    <option value="4">member</option>              
                    <option value="8">child</option>              
                    <option value="9">visitor</option>
                <?php endif;?>              
                  </select>
                  <small class="js-error-role_name w-100 text-danger"></small>
                </div>
                </div>

                <div class="col-12 my-4 d-flex">
                <div class="col-6">
                  <select name="position_id" class="form-select">
                    <option value="">--Select Local Role--</option>
                    <?php if(!empty($localPositions)):?>
                        <?php foreach($localPositions as $cat):?>
                          <option <?=set_select('localposition_id',$cat->position)?> value="<?=$cat->id?>"><?=esc($cat->position)?></option>
                        <?php endforeach;?>
                      <?php endif;?>      
                  </select>
                  <small class="js-error-error-role_name w-100 text-danger"></small>
                </div>

                <div class="col-6">
                  <select name="position_id" class="form-select">
                    <option value="">--Select District Role--</option>
                    <?php if(!empty($positions)):?>
                        <?php foreach($positions as $cat):?>
                          <option <?=set_select('position_id',$cat->position)?> value="<?=$cat->id?>"><?=esc($cat->position)?></option>
                        <?php endforeach;?>
                      <?php endif;?>      
                  </select>
                  <small class="js-error-error-role_name w-100 text-danger"></small>
                </div>
                </div>

                <div class="col-12 my-4 d-flex">

                  <label class="d-flex rounded js-profile-image-input" title="Click to Upload new profile image">
                    <input class="js-profile-image-input" onchange="load_image(this.files[0])" type="file" name="image" style="display: none;">
                    <img class="js-image-preview bg-light shadow rounded text-center my-auto" src="<?=ROOT?>/<?=$row->image?>" alt="Profile photo" style="width:50px;max-width:50px;height:50px;object-fit: cover; font-size: 18px">
                    <div class="js-filename m-2 ">Selected File: None</div>
                  </label>
                  <div class="pt-2">
                    <label class="btn btn-primary btn-sm" title="Upload new profile image" >
                      <i class="text-info mx text-white bi bi-upload"></i>
                      <input class="js-profile-image-input" onchange="load_image(this.files[0])" type="file" name="image" style="display: none;">
                    </label>

                    <?php if(!empty($errors['image'])):?>
                      <small class="js-error-image text-danger"><?=$errors['image']?></small>
                    <?php endif;?>
                  </div>    
                </div>

                <div class="col-12 my-3">
                  <div class="form-check">
                    <input <?=set_value('terms') ? 'checked':'' ?> class="form-check-input  <?=!empty($errors['terms']) ? 'border-danger':'';?>" name="terms" type="checkbox" value="1" id="acceptTerms" required>
                    <label class="form-check-label " for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                    <div class="invalid-feedback">You must agree before submitting.</div>
                  </div>
                  <?php if (!empty($errors['terms'])):?>
                    <div class="js-error-terms text-danger"><small><?=$errors['terms']?></small></div>
                  <?php endif;?>
                </div>

              <div class="row justify-content-center">
                <div class="col-12 ">
                <button class="btn btn-primary w-100" type="submit">Submit</button>
              </div>
              </div>              
            </div>
          </div>
        </div>
      </form>
      <a class="justify-content-right float-right" href="<?=ROOT?>/admin/make_pdf/download_member_form">
        <button class="btn btn-secondary bi bi-download fw-bolder"> Download form</button>
      </a>
    </div>
  </div>          
</div>


<script>
  
  function load_image(file)
  {

    document.querySelector(".js-filename").innerHTML = "Selected File: " + file.name;

    var mylink = window.URL.createObjectURL(file);
    document.querySelector(".js-image-preview").src = mylink;
  }

  window.onload = function(){

    show_tab(tab);
  }

</script>
<?php $this->view('admin/admin-footer',$data) ?>
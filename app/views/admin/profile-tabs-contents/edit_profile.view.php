<form method="post" enctype="multipart/form-data">

                    <div class="row mb-3 ">
                      <label for="profileImage" class="mx-auto col-md-4 col-lg-3 px-3">Profile Image</label>
                      <div class="mx-auto col-md-8 col-lg-9">
                        <label class="d-flex rounded js-profile-image-input" title="Click to Upload new profile image">
                          <input class="js-profile-image-input" onchange="load_image(this.files[0])" type="file" name="image" style="display: none;">
                          <img class="js-image-preview bg-light shadow rounded text-center my-auto" src="<?=ROOT?>/<?=$row->image?>" alt="Profile photo" style="width:200px;max-width:200px;height:200px;object-fit: cover; font-size: 18px">
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

                    </div>                      
                      <div class="row mb-3 col-12">
                        <div class="row mb-3">
                          <label for="firstname" class="mx-auto col-md-4 col-lg-3 px-3">First Name</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="firstname" type="text" class="form-control" id="firstname" value="<?=set_value('firstname',$row->firstname)?>">
                          </div>

                          <?php if(!empty($errors['firstname'])):?>
                            <small class="js-error-firstname text-danger"><?=$errors['firstname']?></small>
                          <?php endif;?>
                          <small class="js-error-firstname text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="lastname" class="mx-auto col-md-4 col-lg-3 px-3">Last Name</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="lastname" type="text" class="form-control" id="lastname" value="<?=set_value('lastname',$row->lastname)?>">
                          </div>

                          <?php if(!empty($errors['lastname'])):?>
                            <small class="js-error-lastname text-danger"><?=$errors['lastname']?></small>
                          <?php endif;?>
                          <small class="js-error-lastname text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="Job" class="mx-auto col-md-4 col-lg-3 px-3">Job</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="job" type="text" class="form-control" id="Job" value="<?=set_value('job',$row->job)?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="dob" class="mx-auto col-md-4 col-lg-3 px-3">dob</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="dob" type="date" class="form-control" id="dob" value="<?=set_value('dob',$row->dob)?>">
                          </div>

                          <?php if(!empty($errors['dob'])):?>
                            <small class="js-error-dob text-danger"><?=$errors['dob']?></small>
                          <?php endif;?>
                          <small class="js-error-dob text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="Phone" class="mx-auto col-md-4 col-lg-3 px-3">Phone</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="Phone" value="<?=set_value('phone',$row->phone)?>">
                          </div>

                          <?php if(!empty($errors['phone'])):?>
                            <small class="js-error-phone text-danger"><?=$errors['phone']?></small>
                          <?php endif;?>
                          <small class="js-error-phone text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="Email" class="mx-auto col-md-4 col-lg-3 px-3">Email</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="Email" value="<?=set_value('email',$row->email)?>">
                          </div>

                          <?php if(!empty($errors['email'])):?>
                            <small class="js-error-email text-danger"><?=$errors['email']?></small>
                          <?php endif;?>
                          <small class="js-error-email text-danger"></small>
                        </div>

                      <div class="row mb-3 ">
                      <label for="Marital-status" class="mx-auto col-md-4 col-lg-3 px-3">Gender/M.Status</label>
                      <div class="mx-auto col-md-4 col-lg-5">
                        <select class="form-select rounded <?=!empty($errors['gender']) ? 'border-danger':'';?>" name="gender"  >
                            <option value="">--Select Gender--</option>
                            <option value="female" <?=set_select('gender','female',$row->gender)?>>female</option>
                            <option value="male"<?=set_select('gender','male',$row->gender)?>>male</option>

                        </select>
                        <div class="invalid-feedback">Gender is required.</div>
                      </div>                
                      <?php if (!empty($errors['gender'])):?>
                        <div class="text-danger"><small><?=$errors['gender']?></small></div>
                      <?php endif;?>

                      <div class="mx-auto col-md-4 col-lg-4">
                        <select class="form-select rounded <?=!empty($errors['marital_status_id']) ? 'border-danger':'';?>" name="marital_status_id"  >
                            <option value="">---Select Marital Status---</option>
                            <?php if(!empty($maritalStatus)):?>
                              <?php foreach($maritalStatus as $cat):?>
                                <option <?=set_select('marital_status_id',$row->marital_status_id,$cat->marital_status)?> value="<?=$cat->marital_status?>"><?=esc($cat->marital_status)?></option>
                              <?php endforeach;?>
                            <?php endif;?>
                        </select>
                        <div class="invalid-feedback">Marital status is required.</div>
                      </div>                
                      <?php if (!empty($errors['marital_status_id'])):?>
                        <div class="text-danger"><small><?=$errors['marital_status_id']?></small></div>
                      <?php endif;?>
                      </div>

                      <div class="row mb-3">
                          <label for="position" class="mx-auto col-md-4 col-lg-3 px-3">About Spouse <br> (if married)</label>
                          <div class="mx-auto col-md-4 col-lg-5">
                            <input name="spouse_name" type="text" class="form-control" id="Email" value="<?=set_value('spouse_name',$row->spouse_name)?>" placeholder="Enter Spouse's Full Name">
                          </div>

                          <div class="mx-auto col-md-4 col-lg-4">
                            <input name="spouse_phone" type="text" class="form-control" id="Email" value="<?=set_value('spouse_phone',$row->spouse_phone)?>" placeholder="Enter Spouse's Contact">
                          </div>

                          <?php if(!empty($errors['spouse_phone'])):?>
                            <small class="js-error-spouse_phone text-danger"><?=$errors['spouse_phone']?></small>
                          <?php endif;?>
                          <small class="js-error-spouse_phone text-danger"></small>
                        </div>

                      <div class="row mb-3">
                          <label for="Children" class="mx-auto col-md-4 col-lg-3 px-3">Names of Children <br> (if any)</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <textarea  class="form-control" aria-label="With textarea" style="height: 100px;" name="children" placeholder="Please list the full names of your children. Eg. Alvin Nyansah Sam, Diana Favour Sam, etc."><?=$row->children?></textarea>
                          </div>

                          <?php if(!empty($errors['children'])):?>
                            <small class="js-error-children text-danger"><?=$errors['children']?></small>
                          <?php endif;?>
                          <small class="js-error-children text-danger"></small>
                      </div>

                    <?php if(user_can('edit_slider_images')):?>
                      <div class="row mb-3 ">
                      <label for="Marital-status" class="mx-auto col-md-3 col-lg-3 px-3">Baptism</label>

                      <div class="mx-auto col-md-3 col-lg-3">
                        <select class="form-select rounded <?=!empty($errors['water_baptized']) ? 'border-danger':'';?>" name="water_baptized"  >
                            <option value="" selected="">---Water Baptized?---</option>
                            <option value="yes"  <?=set_select('water_baptized','yes',$row->water_baptized)?> >yes</option>
                            <option value="no" <?=set_select('water_baptized','no',$row->water_baptized)?> >no</option>
                          </select>
                        <div class="invalid-feedback">Water Baptism status is required.</div>
                      </div>                
                      <?php if (!empty($errors['water_baptized'])):?>
                        <div class="text-danger"><small><?=$errors['water_baptized']?></small></div>
                      <?php endif;?>

                      <div class="mx-auto col-md-3 col-lg-3">
                        <select class="form-select rounded <?=!empty($errors['holyghost_baptized']) ? 'border-danger':'';?>" name="holyghost_baptized"  >
                          <option value="" selected="">---Holy Ghost Baptized?---</option>
                            <option value="yes"  <?=set_select('holyghost_baptized','yes',$row->holyghost_baptized)?> >yes</option>
                            <option value="no" <?=set_select('holyghost_baptized','no',$row->holyghost_baptized)?> >no</option>
                        </select>
                        <div class="invalid-feedback">Holy Ghost baptism status is required.</div>
                      </div>                
                      <?php if (!empty($errors['holyghost_baptized'])):?>
                        <div class="text-danger"><small><?=$errors['holyghost_baptized']?></small></div>
                      <?php endif;?>

                      <div class="mx-auto col-md-3 col-lg-3">
                        <select class="form-select rounded <?=!empty($errors['communicant_status']) ? 'border-danger':'';?>" name="communicant_status"  >
                          <option value="" selected="">---Attends Communion?---</option>
                            <option value="yes"  <?=set_select('communicant_status','yes',$row->communicant_status)?> >yes</option>
                            <option value="no" <?=set_select('communicant_status','no',$row->communicant_status)?> >no</option>
                        </select>
                        <div class="invalid-feedback">Communion status is required.</div>
                      </div>                
                      <?php if (!empty($errors['communicant_status'])):?>
                        <div class="text-danger"><small><?=$errors['communicant_status']?></small></div>
                      <?php endif;?>
                      </div>
                    <?php endif;?>

                     <?php if(user_can('edit_slider_images')):?>
                      <div class="row mb-3 ">
                      <label for="Marital-status" class="mx-auto col-md-4 col-lg-3 px-3">Local/Role</label>

                      <div class="mx-auto col-md-4 col-lg-5">
                        <select class="form-select rounded <?=!empty($errors['category_id']) ? 'border-danger':'';?>" name="category_id"  >
                            <option value="">---Select Local Assembly---</option>
                            <?php if(!empty($categories)):?>
                              <?php foreach($categories as $cat):?>
                                <option <?=set_select('category_id',$row->category_id,$cat->category)?> value="<?=$cat->category?>"><?=esc($cat->category)?></option>
                              <?php endforeach;?>
                            <?php endif;?>

                        </select>
                        <div class="invalid-feedback">Local assembly is required.</div>
                      </div>                
                      <?php if (!empty($errors['category_id'])):?>
                        <div class="text-danger"><small><?=$errors['category_id']?></small></div>
                      <?php endif;?>

                      <div class="mx-auto col-md-4 col-lg-4">
                        <select class="form-select rounded <?=!empty($errors['role']) ? 'border-danger':'';?>" name="role"  >
                            <option value="">---Select Role---</option>
                            <?php if(!empty($roles)):?>
                              <?php foreach($roles as $cat):?>
                                <option <?=set_select('role',$row->role_name,$cat->role)?> value="<?=$cat->id?>"><?=esc($cat->role)?></option>
                              <?php endforeach;?>
                            <?php endif;?>

                        </select>
                        <div class="invalid-feedback">Role is required.</div>
                      </div>                
                      <?php if (!empty($errors['role'])):?>
                        <div class="text-danger"><small><?=$errors['role']?></small></div>
                      <?php endif;?>
                      </div>
                    <?php endif;?>

                        <div class="row mb-3">
                          <label for="position" class="mx-auto col-md-4 col-lg-3 px-3">Position</label>
                          <div class="mx-auto col-md-4 col-lg-5">
                            <select name="localposition_id" class="form-select rounded">
                              <option value="">--Select Local Role--</option>
                              <?php if(!empty($localPositions)):?>
                              <?php foreach($localPositions as $cat):?>
                                <option <?=set_select('localposition_id',$row->localposition_id,$cat->position)?> value="<?=$cat->position?>"><?=esc($cat->position)?></option>
                              <?php endforeach;?>
                            <?php endif;?>        
                            </select>
                          </div>

                          <div class="mx-auto col-md-4 col-lg-4">
                            <select name="position_id" class="form-select rounded">
                              <option value="">--Select District Role--</option>
                              <?php if(!empty($positions)):?>
                              <?php foreach($positions as $cat):?>
                                <option <?=set_select('position_id',$row->position_id,$cat->position)?> value="<?=$cat->position?>"><?=esc($cat->position)?></option>
                              <?php endforeach;?>
                            <?php endif;?>        
                            </select>
                          </div>

                          <?php if(!empty($errors['position_id'])):?>
                            <small class="js-error-position_id text-danger"><?=$errors['position_id']?></small>
                          <?php endif;?>
                          <small class="js-error-position_id text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="residence" class="mx-auto col-md-4 col-lg-3 px-3">Residence</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="residence" type="text" class="form-control" id="residence" value="<?=set_value('residence',$row->residence)?>">
                          </div>

                          <?php if(!empty($errors['residence'])):?>
                            <small class="js-error-residence text-danger"><?=$errors['residence']?></small>
                          <?php endif;?>
                          <small class="js-error-residence text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="gps_address" class="mx-auto col-md-4 col-lg-3 px-3">GPS Address</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="gps_address" type="text" class="form-control" id="gps_address" value="<?=set_value('gps_address',$row->gps_address)?>">
                          </div>

                          <?php if(!empty($errors['gps_address'])):?>
                            <small class="js-error-gps_address text-danger"><?=$errors['gps_address']?></small>
                          <?php endif;?>
                          <small class="js-error-gps_address text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="hometown" class="mx-auto col-md-4 col-lg-3 px-3">Hometown</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="hometown" type="text" class="form-control" id="hometown" value="<?=set_value('hometown',$row->hometown)?>">
                          </div>

                          <?php if(!empty($errors['hometown'])):?>
                            <small class="js-error-hometown text-danger"><?=$errors['hometown']?></small>
                          <?php endif;?>
                          <small class="js-error-hometown text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="MotherName" class="mx-auto col-md-4 col-lg-3 px-3">Mother's Name</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="mother_name" type="text" class="form-control" id="MotherName" value="<?=set_value('mother_name',$row->mother_name)?>">
                          </div>

                          <?php if(!empty($errors['mother_name'])):?>
                            <small class="js-error-mother_name text-danger"><?=$errors['mother_name']?></small>
                          <?php endif;?>
                          <small class="js-error-mother_name text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="MotherPhone" class="mx-auto col-md-4 col-lg-3 px-3">Mother's Phone</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="mother_phone" type="text" class="form-control" id="MotherPhone" value="<?=set_value('mother_phone',$row->mother_phone)?>">
                          </div>

                          <?php if(!empty($errors['mother_phone'])):?>
                            <small class="js-error-mother_phone text-danger"><?=$errors['mother_phone']?></small>
                          <?php endif;?>
                          <small class="js-error-mother_phone text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="FatherName" class="mx-auto col-md-4 col-lg-3 px-3">Father's Name</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="father_name" type="text" class="form-control" id="FatherName" value="<?=set_value('father_name',$row->father_name)?>">
                          </div>

                          <?php if(!empty($errors['father_name'])):?>
                            <small class="js-error-father_name text-danger"><?=$errors['father_name']?></small>
                          <?php endif;?>
                          <small class="js-error-father_name text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="FatherPhone" class="mx-auto col-md-4 col-lg-3 px-3">Father's Phone</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="father_phone" type="text" class="form-control" id="FatherPhone" value="<?=set_value('father_phone',$row->father_phone)?>">
                          </div>

                          <?php if(!empty($errors['father_phone'])):?>
                            <small class="js-error-father_phone text-danger"><?=$errors['father_phone']?></small>
                          <?php endif;?>
                          <small class="js-error-father_phone text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="emergecy_name" class="mx-auto col-md-4 col-lg-3 px-3">Emergency Contact Person</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="emergecy_name" type="text" class="form-control" id="emergecy_name" value="<?=set_value('emergecy_name',$row->emergecy_name)?>">
                          </div>

                          <?php if(!empty($errors['emergecy_name'])):?>
                            <small class="js-error-emergecy_name text-danger"><?=$errors['emergecy_name']?></small>
                          <?php endif;?>
                          <small class="js-error-emergecy_name text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="emergecy_contact" class="mx-auto col-md-4 col-lg-3 px-3">Emergency Contact Number</label>
                          <div class="mx-auto col-md-8 col-lg-9">
                            <input name="emergecy_contact" type="text" class="form-control" id="emergecy_contact" value="<?=set_value('emergecy_contact',$row->emergecy_contact)?>">
                          </div>

                          <?php if(!empty($errors['emergecy_contact'])):?>
                            <small class="js-error-emergecy_contact text-danger"><?=$errors['emergecy_contact']?></small>
                          <?php endif;?>
                          <small class="js-error-emergecy_contact text-danger"></small>
                        </div>
                        <br>
                          <h4>End of Personal details</h4>                  

                    <div class="js-prog progress my-4 hide">
                      <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Saving.. 50%</div>
                    </div>
                    </div>

                    <div class="text-center">
                     <!--  <a href="<?=ROOT?>/admin/viewusers/<?=$row->id?>">
                        <button type="button" class="btn btn-warning  float-start">Back</button>
                      </a> -->
                      <button type="button" onclick="save_profile(event)" type="submit" class="btn btn-info float-end">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
<?php $this->view('admin/admin-header',$data) ?>
  <?php if(!empty($row)):?>

    <?php

  $categories = get_categories();
  $positions = get_positions();
  $localPositions = get_local_positions();
  $roles = get_roles();
  $maritalStatus = get_marital_status();
  
      $dob = $row->dob;
      $today = date("Y-m-d");
      $diff = date_diff(date_create($dob), date_create($today));
      $age = $diff->format('%Y,%m years');

  ?>

  <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=ROOT?>/admin/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item"><?=esc(ucfirst(set_value('role',$row->role_name ?? '')))?></li>
          <li class="breadcrumb-item">Admin Profile</li>
          <li class="breadcrumb-item active"><?=esc($row->firstname)?> <?=esc($row->lastname)?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   <section class="container-fluid">
      <div class="row">
        <div class="mx-auto col-md-3">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <?php if(!empty($row->image)):?>              
            <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded-circle" style="object-fit: fill; width: 90px; max-width:90px;height:90px;">
          <?php elseif(!empty($row->gender)):?>
            <img src="<?=ROOT?>/assets/images/<?=($row->gender)?>.jpg" class="rounded-circle" style="object-fit: fill; width: 90px; max-width:90px;height:90px;">
          <?php else:?>
            <img src="<?=get_profile_image($row->image)?>" class="rounded-circle" style="object-fit: fill; width: 90px; max-width:90px;height:90px;">
          <?php endif;?>
              <h4 class="text-center"><?=esc($row->firstname)?> <?=esc($row->lastname)?></h4>
              <h5><?=esc(set_value('role',$row->role_name ?? ''))?></h5>
              <h5><?=esc($row->phone )?></h5>
              <small><?=esc($row->job )?></small>
              <small><?=$age?></small>

              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="text-info mx bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="text-info mx bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="text-info mx bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="text-info mx bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-md-9">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                
                <li class="nav-item mx-2">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link active bi bi-eye-fill" data-bs-toggle="tab" data-bs-target="#profile-view" id="profile-view-tab">View Profile</button>
                </li>

                <li class="nav-item mx-2">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link bi bi-pencil" data-bs-toggle="tab" data-bs-target="#profile-edit" id="profile-edit-tab">Edit Profile</button>
                </li>

              </ul>

        <!-- Profile overview -->

        <!--end tabs-->

        <div oninput="something_changed(event)" >
          <div id="tabs-content">
            <!-- tabs content displayed -->

          </div>
        </div>
        <!--end div-tabs-->

                <div class="tab-content">               

                <div class="tab-pane fade profile-view pt-3 show active" id="profile-view">
                  <!-- Profile Edit Form -->                      
                      <div class="row mb-3 col-12">
                        <div class=" px-3 py-2 rounded" style="">
                          <div class="row d-flex mx-0 px-0">
                            <div class="col-9 my-auto">
                              <h4 class="border-bottom fw-bolder text-center mx-auto">About <?=ucfirst($row->firstname)?> <?=ucfirst($row->lastname)?></h4>
                              <p class="small fst-italic border-bottom"><?= ucfirst($row->firstname ).' '. ucfirst($row->lastname)?> <?='('.ucfirst($row->role_name ? :'No role').') of '.ucfirst($row->category_id). ' Assembly serves in the church as '?> <?=$row->position_id ? :$row->role_name?><?='. '.ucfirst($row->firstname). ' was born on the '.get_date($row->dob).' to '.$row->mother_name.' (Mother) and '. $row->father_name." (Father). Currently ".$row->firstname."'s occupation is ". $row->job.' and stays at '.$row->residence.' in Sampa-Jaman North District of the Bono Region, Ghana.'?></p>
                            <!--  <div class="badge bg-info"><?=$age?></div> -->
                            </div>
                            <div class="col float-end my-auto mx-auto">
                            <?php if(!empty($row->image)):?>
                                <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 150px; max-width:150px;height:150px; border: 2px solid black;" alt="">
                              <?php elseif($row->gender ==="female" AND $age < 13):?>
                                <img src="<?=ROOT?>/assets/images/girl-avatar2.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 150px; max-width:150px;height:150px; border: 2px solid black;" alt="">
                              <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
                                <img src="<?=ROOT?>/assets/images/female.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 150px; max-width:150px;height:150px; border: 2px solid black;" alt="">
                              <?php elseif($row->gender === "male" AND $age < 13):?>
                                <img src="<?=ROOT?>/assets/images/boy-avatar2.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 150px; max-width:150px;height:150px; border: 2px solid black;" alt="">
                                <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
                                <img src="<?=ROOT?>/assets/images/male.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 150px; max-width:150px;height:150px; border: 2px solid black;" alt="">
                              <?php endif;?><br>
                            <div class="badge bg-info text-light py-1"><?=$age?></div>
                          </div> 
                          <br>
                          
                          </div>
                         <div class="table table-hover mx-0 px-3 rounded mb-3 mt-2" id="profile-overview">            
                              
                              <div class="row d-flex">
                              <div class="col-lg-6 px-2">
                              <table class="table-borderless table-hover table-striped px-3 rounded">
                                <tbody>
                                  <!-- personal Details -->
                                  <h5 class="text-info">Personal Details</h5><hr>

                                <tr class="my-3  row d-flex">
                                  <th class="col-4">Name: </th>
                                  <td class="col-8"><?=esc($row->firstname ? :'Not available')?> <?=esc($row->lastname ? :'Not available')?></td>
                                </tr>              

                                <tr class="my-3  row d-flex">
                                  <th class="col-4">Role: </th>
                                  <td class="col-8"><?=esc($row->role_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=($row->position_id ? :'No position')?>)</span></td>
                                </tr>

                                <tr class="my-3  row d-flex">
                                  <th class="col-4">DOB: </th>
                                  <td class="col-8"><?=esc(get_date($row->dob ? :'Not available'))?></td>
                                </tr>

                                <tr class="my-3  row d-flex">
                                  <th class="col-4">Gender: </th>
                                  <td class="col-8"><?=esc($row->gender ? :'Not available')?></td>
                                </tr>

                                 <tr class="my-3  row d-flex">
                                  <th class="col-4">Contact: </th>
                                  <td class="col-8"><?=esc($row->phone ? :'Not available')?></td>
                                </tr>

                                <tr class="my-3  row d-flex">
                                  <th class="col-4">Email: </th>
                                  <td class="col-8"><?=esc($row->email ? :'Not available')?></td>
                                </tr>

                                <tr class="my-3  row d-flex">
                                  <th class="col-4">M Status: </th>
                                  <td class="col-8"><?=esc($row->marital_status_id ? :'Not available')?></td>
                                </tr>

                                <tr class="my-3  row d-flex">
                                  <th class="col-4">Residence: </th>
                                  <td class="col-8"><?=esc($row->residence ? :'Not available')?></td>
                                </tr>
                              </tbody>
                            </table>
                              </div>

                          <!-- Other Details -->
                              <div class="col-lg-6 px-2">
                              <table class="table-borderless table-hover table-striped px-3 rounded">
                                  <tbody>

                                  <h5 class="text-info">Other Details</h5><hr>

                                  <tr class="my-3  row d-flex">
                                  <th class="col-4">Occupation: </th>
                                  <td class="col-8"><?=esc($row->job ? :'Not available')?></td>
                                </tr>

                                <tr class="my-3  row">
                                  <th class="col-4 ">Hometown:</th>
                                  <td class="col-8 text-wrap"><?=esc($row->hometown ? :'Not available')?></td>
                                </tr>

                                <tr class="my-3  row">
                                  <th class="col-4">Father:</th>
                                  <td class="col-8 text-wrap"><?=esc($row->father_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->father_phone ? :'Contact Unknowm')?>)</span>
                                  </td>
                                </tr>

                                <tr class="my-3  row">
                                  <th class="col-4">Mother:</th>
                                  <td class="col-8 text-wrap"><?=esc($row->mother_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->mother_phone ? :'Contact Unknowm')?>)</span>
                                  </td>
                                </tr>
                                
                                <tr class="my-3  row">
                                  <th class="col-4">Registered on:</th>
                                  <td class="col-8 text-wrap"><?=get_date($row->date ?? '<div class="text-danger fs-5 fw-lighter">Not available</div>')?></td>
                                </tr>
                              </tbody>
                            </table>
                              </div>
                              </div>

                          
                        </div>
                      </div>
                    </div>
                </div>

                 <div class="tab-pane fade profile-edit pt-3 show" id="profile-edit">
                  <!-- Profile Edit Form -->

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

                </div>
              </div>
              </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
    </section>

  <?php else:?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                That profile was not found!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

  <?php endif;?>

<script>
  
  
  var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab"): "#profile-overview";

  /*function show_tab(tab_name)
  {
    const someTabTriggerEl = document.querySelector(tab_name +"-tab");
    const tab = new bootstrap.Tab(someTabTriggerEl);

    tab.show();

  }*/

  var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab"): "intended-learners";
  var dirty = false;
  var get_meta = true;

  function show_tab(tab_name)
  {
 
    var contentDiv = document.querySelector("#tabs-content");
    // show_loader(contentDiv);

    //change active tab
    var div = document.querySelector("#"+tab_name);
    var children = div.parentNode.children;
    for (var i = 0; i < children.length; i++) {
      children[i].classList.remove("active-tab");
    }

    div.classList.add("active-tab");


    send_data({
      tab_name:tab,
      data_type:"read",
    });

    disable_save_button(false);

  }

  function set_tab(tab_name)
  {
    tab = tab_name;
    sessionStorage.setItem("tab", tab_name);
  }

  function show_loader(item)
  {
    item.innerHTML = '<img class="loader" src="<?=ROOT?>/assets/images/loader2.gif">';
  }

  show_tab(tab);

  function load_image(file)
  {

    document.querySelector(".js-filename").innerHTML = "Selected File: " + file.name;

    var mylink = window.URL.createObjectURL(file);
    document.querySelector(".js-image-preview").src = mylink;
  }

  window.onload = function(){

    show_tab(tab);
  }

  //upload functions
  function save_profile(e)
  {

    var form = e.currentTarget.form;
    var inputs = form.querySelectorAll("input,textarea,select,radio");
    var obj = {};
    var image_added = false;

    for (var i = 0; i < inputs.length; i++) {
      var key = inputs[i].name;

      if(key == 'image'){
        if(typeof inputs[i].files[0] == 'object'){
          obj[key] = inputs[i].files[0];
          image_added = true;
        }
      }else{
        obj[key] = inputs[i].value;
      }
    }
 
    //validate image
    if(image_added){

      var allowed = ['jpg','jpeg','png'];
      if(typeof obj.image == 'object'){
        var ext = obj.image.name.split(".").pop();
      }

      if(!allowed.includes(ext.toLowerCase())){
        alert("Only these file types are allowed in profile image: "+ allowed.toString(","));
        return;
      }
    }

    send_data(obj);

  }

  function send_data(obj, progbar = 'js-prog')
  {

    var prog = document.querySelector("."+progbar);
    prog.children[0].style.width = "0%";
    prog.classList.remove("hide");

    var myform = new FormData();
    for(key in obj){
      myform.append(key,obj[key]); 
    }

    var ajax = new XMLHttpRequest();

    ajax.addEventListener('readystatechange',function(){

      if(ajax.readyState == 4){

        if(ajax.status == 200){
          //everything went well
          //alert("upload complete");
          handle_result(ajax.responseText);
        }else{
          //error
          alert("an error occurred");
        }
      }
    });

    ajax.upload.addEventListener('progress',function(e){

      var percent = Math.round((e.loaded / e.total) * 100);
      prog.children[0].style.width = percent + "%";
      prog.children[0].innerHTML = "Saving.. " + percent + "%";

    });

    ajax.open('post','',true);
    ajax.send(myform);

  }

  function handle_result(result)
  {
    console.log(result);
    var obj = JSON.parse(result);
    if(typeof obj == 'object'){
      //object was created

      if(typeof obj.errors == 'object')
      {
        //we have errors
        display_errors(obj.errors);
        alert("Please correct the errors on the page");
      }else{
        //save complete
        alert("Profile saved successfully!");
        window.location.reload();

      }
    }
  }

  function display_errors(errors){

    for(key in errors){

      document.querySelector(".js-error-"+key).innerHTML = errors[key];
    }
  }

</script>

<!-- <script type="text/javascript">
  
  function get_data(text)
  {

    if(text.trim() == "")
      return
    
    if(text.trim().length < 1)
      return

    var form = new FormData();
    form.append('text',text);

    var ajax = new XMLHttpRequest();

    ajax.addEventListener('readystatechange',function(e){

      if(ajax.readyState == 4 && ajax.status == 200){

        //results are back
        handle_result(ajax.responseText);
      }
    });

    ajax.open('post','',true);
    ajax.send(form);
  }

  function handle_result(result)
  {
    //console.log(result);
    var result_div = document.querySelector(".js-results");
    var str = "";
    var strR = "";

    var num = 0;
    var obj = JSON.parse(result);

    for (var i = obj.length - 1; i >= 0; i--) { 

      num +=1;

      var totalnum = num;
     
     str += `<a href='<?=ROOT?>/admin/profile/${obj[i].id}'><div>`+ num + '. ' + obj[i].firstname + ' ' + obj[i].lastname + "<small>" + ' ('+ obj[i].role_name +') '+ "</small>" +"</div></a>";
     if(totalnum < 2){
      strR = "<center>"+"Only "+ totalnum +' Result Found!' +"</center>"  
      }else{
      strR = "<center>"+ totalnum +' Results Found!' +"</center>" 
      }
      //console.log(obj[i].firstname + ' ' + obj[i].lastname);
    }

    result_div.innerHTML = strR + str;
    if(obj.length > 0){
    show_results();
  }else{
    hide_results();
  }

  }

  function show_results()
  {
    var result_div = document.querySelector(".js-results");
    result_div.classList.remove("hide")
  }

  function hide_results()
  {
    var result_div = document.querySelector(".js-results");
    result_div.classList.add("hide")
  }

</script> -->

<?php $this->view('admin/admin-footer',$data) ?>
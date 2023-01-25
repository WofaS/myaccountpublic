<?php $this->view('admin/admin-header',$data) ?>


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


    $myID = $row->id;
    $queryAtt = "SELECT count(*) AS T_MY_ATT FROM register where member_id=:member_id";
    $totalAtt = query_row($queryAtt, ['member_id' => $myID]);
    $my_total_attentance = $totalAtt['T_MY_ATT'];
    
    $queryPresent = "SELECT count(*) AS T_MY_PRESENT FROM register where member_id=:member_id && status=:status";
    $totalP = query_row($queryPresent, ['member_id' => $myID,'status'=>'PRESENT']);
    $my_total_present = $totalP['T_MY_PRESENT'];

    $queryAbsent = "SELECT count(*) AS T_MY_ABSENT FROM register where member_id=:member_id && status=:status";
    $totalAbs = query_row($queryAbsent, ['member_id' => $myID,'status'=>'ABSENT']);
    $my_total_absent = $totalAbs['T_MY_ABSENT'];

  ?>

    <style>
    
     *{
        font-family: tahoma;
      }
    form{
      margin: auto;
      width: 600px;
      padding: 10px;
      border-radius: 10px;
    }

    .search-div span{
      margin: auto;
      width: 40%;
      padding: 10px;
      border-radius: 10px;
    }

    center{
      color: #6fd1ee;
      font-size: 14px;
      font-family: sans-serif;
    }

    .search-div{
      margin: auto;
      width: 850px;
      padding: 10px;
      display: flex;
      flex-direction: row;
     /* box-shadow: 0px 0px 10px #aaa;*/
      border-radius: 10px;
    }

    .search{
      width: 90%;
      padding: 10px;
      border-radius: 10px;
      border: solid thin #aaa;
      outline: none;
    }

    .results{
      width: 90%;
      padding-top: 4px;
      border: solid thin #eee;
      border-radius: 10px;
      outline: none;
    }

    .results div:hover{
      color: white;
      background-color: #00cfff;
    }

    .hide{
      display: none;
    }
  
  .tabs-holder{
    display: flex;
    margin-top: 10px; 
    margin-bottom: 10px;
    justify-content: center;
    text-align: center;
    flex-wrap: wrap;
  }

  .my-tab{
    flex:1;
    border-bottom: solid 2px #ccc;
    padding-top: 10px;
    padding-bottom: 10px;
    cursor: pointer;
    user-select: none;
    min-width: 150px;

  }
  .my-tab:hover{
    color: #4154f1;
  }

  .active-tab{
    color: #4154f1;
    border-bottom: solid 2px #4154f1;
  }

  .hide{
    display: none;
  }

  .loader{
    position: relative;
    width:200px;
    height:200px;
    left: 50%;
    top: 50%;
    transform: translateX(-50%);
    opacity: 0.5;
  }

</style>

  
  <?php if(!empty($row)):?>

  <div class="page-titles">
       <div class="col-sm-6 p-md-0">
      <div class="welcome-text">
          <h4><?=$row->firstname?>'s Profile</h4>
      </div>
  </div>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=ROOT?>/admin/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item">Profile</li>
          <li class="breadcrumb-item"><?=esc(ucfirst(set_value('role',$row->role_name ?? '')))?></li>
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
                  <a href="<?=ROOT?>/admin/profile_edit/<?=$row->id?>">
                    <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link active bi bi-pencil">Edit Profile</button>
                  </a>
                </li>
                
                <li class="nav-item mx-2">
                  <a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
                    <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link  bi bi-eye-fill" >View Profile</button>
                  </a>
                </li>

                <li class="nav-item mx-2">
                  <a href="<?=ROOT?>/admin/delete/<?=$row->id?>">
                    <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link  bi bi-trash-fill" >Delete</button>
                  </a>
                </li>

                <li class="nav-item mx-2">
                  <a class="justify-content-right float-right" href="<?=ROOT?>/admin/make_pdf/download_profile/<?=$row->id?>">
                    <button class="nav-link bi bi-download"> Download profile</button>
                  </a>
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

                 <div class="tab-pane fade profile-edit pt-3 active show" id="profile-edit">
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

                </div>

                <div class="tab-pane fade search pt-3 show" id="search">
                  <!-- Profile Edit Form -->
                  <div class="row">
                      <div class="mx-auto p-3 rounded">
                      <div class=" rounded">
    
                         <?php include views_path('admin/mysearch') ?>
                      </div>
                  </div>
                     
                  </div>

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

<?php $this->view('admin/admin-footer',$data) ?>
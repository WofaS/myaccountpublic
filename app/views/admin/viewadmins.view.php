<?php $this->view('admin/admin-header',$data) ?>

<?php
  use \Model\Auth;
  $categories = get_categories();
?>

<?php

      $dob = $row->dob;
      $today = date("Y-m-d");
      $diff = date_diff(date_create($dob), date_create($today));
      $age = $diff->format('%Y,%m years');

  ?>

<div class="container d-flex">
    <div class="col-lg-7 col-md-11 col-12 pt-4  mx-auto align-items-center shadow rounded bg-light mb-5">
      <div class=" px-3 py-2 rounded text-light bg-secondary" style="">
        <div class="row d-flex mx-0 px-0">
          <div class="col-8 my-auto">
            <center class="border-bottom fw-bolder text-center mx-auto text-light">About <?=ucfirst($row->firstname)?> <?=ucfirst($row->lastname)?></center>
            <p class="small fst-italic border-bottom"><?= ucfirst($row->firstname ).' '. ucfirst($row->lastname)?> <?='('.ucfirst($row->role_name ? :'No role').') of '.ucfirst($row->category_id). ' Assembly serves in the church as '?> <?=$row->position_id ? :$row->role_name?><?='. '.ucfirst($row->firstname). ' was born on the '.get_date($row->dob).' to '.$row->mother_name.' (Mother) and '. $row->father_name." (Father). Currently ".$row->firstname."'s occupation is ". $row->job.' and stays at '.$row->residence.' in Sampa-Jaman North District of the Bono Region, Ghana.'?></p>
          <!--  <div class="badge bg-info"><?=$age?></div> -->
          </div>
          <div class="col-4 float-end my-auto">
          <?php if(!empty($row->image)):?>
              <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
            <?php elseif($row->gender ==="female" AND $age < 13):?>
              <img src="<?=ROOT?>/assets/images/girl-avatar2.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
            <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
              <img src="<?=ROOT?>/assets/images/female.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
            <?php elseif($row->gender === "male" AND $age < 13):?>
              <img src="<?=ROOT?>/assets/images/boy-avatar2.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
              <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
              <img src="<?=ROOT?>/assets/images/male.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
            <?php endif;?>
          <div class="badge text-light bg-primary"><?=$age?></div>
        </div> 
        <br>
        
        </div>
       <div class="table table-hover bg-light text-dark mx-0 px-3 rounded mb-3 mt-2" id="profile-overview" style="font-size: 16px;">            

              <div class="row d-flex">
              <div class="row  col-lg-6 mx-0 p-2 shadow ">
            <!-- personal Details -->
                <h5 class="text-primary">Personal Details</h5><hr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label ">Name: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->firstname ? :'Not available')?> <?=esc($row->lastname ? :'Not available')?></div>
              </tr>              

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Role: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->role_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->position_id ? :'No position')?>)</span></div>
              </tr>

              <tr class="row">
               
                <strong class="col-lg-4 col-md-4 col-5 label">DOB: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc(get_date($row->dob ? :'Not available'))?></div>
              </tr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Gender: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->gender ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">M Status: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->marital_status_id ? :'Not available')?></div>
              </tr>

               <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Contact: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->phone ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Email: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->email ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Residence: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->residence ? :'Not available')?></div>
              </tr>
            </div>

        <!-- Other Details -->
            <div class="row  col-lg-6 mx-0 p-2 shadow ">

                <h5 class="text-primary">Other Details</h5><hr>

                <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Occupation: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->job ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Assembly: </strong>

                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->category_id ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-4 col-lg-4 col-md-4 col-sm-5 label">Local Position </strong>
                <div class="col-8 col-lg-8 col-md-8 col-sm-7"><?=esc($row->localposition_id ? :'Not available')?></div>
              </tr> 

              <tr class="row">
                <strong class="col-4 col-lg-4 col-md-4 col-sm-5 label ">Hometown:</strong>
                <div class="col-8 col-lg-8 col-md-8 col-sm-7 text-wrap"><?=esc($row->hometown ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-4 col-lg-4 col-md-4 col-sm-5 label">Father:</strong>
                <div class="col-8 col-lg-8 col-md-8 col-sm-7 text-wrap"><?=esc($row->father_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->father_phone ? :'Contact Unknowm')?>)</span>
                </div>
              </tr>

              <tr class="row">
                <strong class="col-4 col-lg-4 col-md-4 col-sm-5 label">Mother:</strong>
                <div class="col-8 col-lg-8 col-md-8 col-sm-7 text-wrap"><?=esc($row->mother_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->mother_phone ? :'Contact Unknowm')?>)</span>
                </div>
              </tr>
              
              <tr class="row">
                <strong class="col-4 col-lg-4 col-md-4 col-sm-5 label">Registered on:</strong>
                <div class="col-8 col-lg-8 col-md-8 col-sm-7 text-wrap"><?=get_date($row->date ?? '<div class="text-danger fs-5 fw-lighter">Not available</div>')?></div>
              </tr>

            </div>
            </div>
        
      </div>
    <div class="row">              
      <div class="col-6">
        <a href="<?=ROOT?>/admin/dashboard">
          <button type="button" class="btn btn-outline-warning col-12 float-start px-5 fw-bolder">Back</button>
        </a>
      </div>
      <div class="col-6">
        <?php if(user_can('edit_slider_images')):?>
        <a href="<?=ROOT?>/admin/adminprofile/<?=$row->id?>">
          <label type="button" class="btn btn-primary col-12 float-end fw-bolder" style="border:1px solid gray"><i class="bi bi-pencil-square text-light"></i> Edit</label> 
        </a>
    <?php endif;?>
      </div>          
    </div>
    </div>
  </div> 
</div>

<?php $this->view('admin/admin-footer',$data) ?>
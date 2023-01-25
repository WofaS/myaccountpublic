<?php $this->view('admin/admin-header',$data) ?>
  <?php if(!empty($row)):?>

    <?php
  
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

  </style>

    

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
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="mx-auto col-md-9">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->            

                <div id="profile-view">
                  <!-- Profile Edit Form -->                      
                      <div class="row mb-3 col-12">
                        <div class=" px-3 py-2 rounded" style="">
                          <div class="row d-flex mx-0 px-0">
                            <div class="col-8 my-auto">
                              <h4 class="border-bottom fw-bolder text-center mx-auto">About <?=ucfirst($row->firstname)?> <?=ucfirst($row->lastname)?></h4>
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
                            <div class="badge bg-info text-light py-0"><?=$age?></div>
                          </div> 
                          <br>
                          
                          </div>
                         <div class="table table-hover mx-0 px-3 rounded mb-3 mt-2" id="profile-overview">            
                              
                              <div class="row d-flex">
                              <div class="col-lg-6 px-2">
                              <table class="table-borderless table-striped px-3 rounded">
                                <tbody>
                                  <!-- personal Details -->
                                  <h5 class="text-info">Personal Details</h5><hr>

                                <tr class="row d-flex">
                                  <th class="col-4">Name: </th>
                                  <td class="col-8"><?=esc($row->firstname ? :'Not available')?> <?=esc($row->lastname ? :'Not available')?></td>
                                </tr>              

                                <tr class="row d-flex">
                                  <th class="col-4">Role: </th>
                                  <td class="col-8"><?=esc($row->role_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=($row->position_id ? :'No position')?>)</span></td>
                                </tr>

                                <tr class="row d-flex">
                                  <th class="col-4">DOB: </th>
                                  <td class="col-8"><?=esc($row->dob ? :'Not available')?></td>
                                </tr>

                                <tr class="row d-flex">
                                  <th class="col-4">Gender: </th>
                                  <td class="col-8"><?=esc($row->gender ? :'Not available')?></td>
                                </tr>

                                 <tr class="row d-flex">
                                  <th class="col-4">Contact: </th>
                                  <td class="col-8"><?=esc($row->phone ? :'Not available')?></td>
                                </tr>

                                <tr class="row d-flex">
                                  <th class="col-4">Email: </th>
                                  <td class="col-8"><?=esc($row->email ? :'Not available')?></td>
                                </tr>

                                <tr class="row d-flex">
                                  <th class="col-4">M Status: </th>
                                  <td class="col-8"><?=esc($row->marital_status_id ? :'Not available')?></td>
                                </tr>
                                
                                <?php if($row->marital_status_id === 'Married'):?>
                                <tr class="row d-flex">
                                  <th class="col-4">Spouse Name: </th>
                                  <td class="col-8"><?=esc($row->spouse_name ? :'Not available')?>
                                    <span class="fst-italic text-muted">(<?=esc($row->spouse_phone ? :'Contact Unknowm')?>)</span>
                                  </td>
                                </tr>

                                

                                <?php if(!empty($row->children)):?> 
                                <tr class="row">
                                  <th class="col-4">Children </th>
                                  <td class="col-8"><?=esc($row->children ? :'Not available')?></td>
                                </tr>
                                <?php endif;?> 
                              <?php endif;?>

                                <tr class="row d-flex">
                                  <th class="col-4">Residence: </th>
                                  <td class="col-8"><?=esc($row->residence ? :'Not available')?></td>
                                </tr>

                                <tr class="row d-flex">
                                  <th class="col-4">GPS Address: </th>
                                  <td class="col-8"><?=esc($row->gps_address ? :'Not available')?></td>
                                </tr>
                              </tbody>
                            </table>
                              </div>

                          <!-- Other Details -->
                              <div class="col-lg-6 px-2 shadow">
                              <table class="table-borderless table-striped px-3 rounded">
                                  <tbody>

                                  <h5 class="text-info">Other Details</h5><hr>

                                <tr class="row d-flex">
                                  <th class="col-4">Water Baptized?: </th>
                                  <td class="col-8"><?=esc($row->water_baptized ? :'Not available')?></td>
                                </tr>

                                <tr class="row d-flex">
                                  <th class="col-4">HolyGhost Baptized?: </th>
                                  <td class="col-8"><?=esc($row->holyghost_baptized ? :'Not available')?></td>
                                </tr>

                                <tr class="row d-flex">
                                  <th class="col-4">Attends Communion?: </th>
                                  <td class="col-8"><?=esc($row->communicant_status ? :'Not available')?></td>
                                </tr>

                                  <tr class="row d-flex">
                                  <th class="col-4">Occupation: </th>
                                  <td class="col-8"><?=esc($row->job ? :'Not available')?></td>
                                </tr>

                                <tr class="row">
                                  <th class="col-4 ">Hometown:</th>
                                  <td class="col-8 text-wrap"><?=esc($row->hometown ? :'Not available')?></td>
                                </tr>

                                <tr class="row">
                                  <th class="col-4">Father:</th>
                                  <td class="col-8 text-wrap"><?=esc($row->father_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->father_phone ? :'Contact Unknowm')?>)</span>
                                  </td>
                                </tr>

                                <tr class="row">
                                  <th class="col-4">Mother:</th>
                                  <td class="col-8 text-wrap"><?=esc($row->mother_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->mother_phone ? :'Contact Unknowm')?>)</span>
                                  </td>
                                </tr>

                                <tr class="row">
                                  <th class="col-4 text-wrap">Emergency Contact Person:</th>
                                  <td class="col-8 text-wrap"><?=esc($row->emergecy_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->emergecy_contact ? :'Contact Unknowm')?>)</span>
                                  </td>
                                </tr>
                                
                                <tr class="row">
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
       
      </div>

  <?php endif;?>


<?php $this->view('admin/admin-footer',$data) ?>
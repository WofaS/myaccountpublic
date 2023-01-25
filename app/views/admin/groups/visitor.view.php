<?php
  use \Model\Auth;
  $categories = get_categories();

  
  //visitor count
  $queryVisitor = "select count(id) as num from members where role = '9'";
  $resVisitor = query_row($queryVisitor);

//visitorMale count
  $queryVisitorMale = "select count(id) as num from members where role = '9' AND gender = 'male'";
  $resVisitorMale = query_row($queryVisitorMale);

//visitorMale count
  $queryVisitorFemale = "select count(id) as num from members where role = '9' AND gender = 'female'";
  $resVisitorFemale = query_row($queryVisitorFemale);
 
?>
<div class="pagetitle rounded p-0 border-bottom">
   <nav>   
        <label class="fw-bolder badge text-primary"><?=strtoupper('District visitors Overview')?></label>
        
        <ul class="breadcrumb my-0 py-0">

          <li class="card-title d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto" ><i class="bx bx-female"></i></div>Visitors <b class="mx-3 text-danger"><?=$resVisitor['num'] ?? 0?></b>
            <div class="filter col float-end">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Visitors</h6>
              </li>

                  <li><a class="dropdown-item" href="#"><label class="col-6">Male</label><span class="col-6 fw-bolder text-primary"><?=$resVisitorMale['num'] ?? 0?></span></a></li>
                  <li class="mb-0 pb-0"><a class="dropdown-item" href="#"><label class="col-6">Female</label><span class="col-6  text-dark fw-bolder border-bottom text-primary"><?=$resVisitorFemale['num'] ?? 0?></span></a></li>
                  <li><a class="dropdown-item" href="#"><label class="col-6 text-danger">Total</label><span class="col-6  text-danger fw-bolder" style="border-bottom:2px solid red"><?=$resVisitor['num'] ?? 0?></span></a></li>
                </ul>
              </div>
          </li>
        </ul>
      </nav>
    </div><!-- End Page Title -->

      <!-- Profile Edit Form -->
        <div class="card-body">
             
            <div class="section-header d-flex justify-content-between align-items-center mb-2">
              <h5 class="text-muted"><?=strtoupper(esc('Sampa District - visitors'))?></h5><br>
              <p class="fst-italic">These are those who worship with us but are not in the Church Register. They are special to the church.</p>
            </div>      
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
              
              <div class="dataTable-container">

              <table class="table table-striped table-borderless border-bottom table-hover table-sm datatable dataTable-loading" >
              <thead>
                <tr style="background: lightgray;">
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">#</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">Photo</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">Name</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">M.Status</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">DOB</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">ROLE</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter"><i class="bx bxs-phone-incoming fw-bolder text-danger"></i> Phone</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter"><i class="bi bi-pin-map fw-bolder text-danger"></i> Residence</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter"><i class="bi bi-pin-map fw-bolder text-danger fw-bolder"></i> Local</a></th>
                  <th scope="col" data-sortable="" >ACTION
                    <a href="<?=ROOT?>/admin/excel/print_visitors"><button class="btn btn-success btn-sm"><i class="bi bi-file-earmark-excel p-0"></i>  Download Excel</button></a>
                  </th>
                </tr>
              </thead>
              <tbody>
                  
                  

                <?php $id = 0;?>
                <?php foreach ($data['row'] as $row):?>

                <?php if(!empty($row->category_id)):?>
                <?php if($row->role_name ==='visitor'): $id +=1;?>

                  <?php

                      $dob = $row->dob;
                      $today = date("Y-m-d");
                      $diff = date_diff(date_create($dob), date_create($today));
                      $age = $diff->format('%Y');

                      $mydob = get_date_month_day($row->dob);
                      $today = date('m d');
                  ?>

                <tr>                        
                  <th scope="row"><a href="<?=ROOT?>/admin/profile/<?=$row->id?>"><?=$id?></a></th>
                  <td>
                    <a href="<?=ROOT?>/admin/profile/<?=$row->id?>" class="text-primary">
                    <?php if(!empty($row->image)):?>
                      <img src="<?=get_profile_image($row->image)?>" alt="" style="width:40px;max-width:40px;height:40px;object-fit: SPAN;" class="rounded">
                    <?php elseif($row->gender ==="female" AND $age < 13):?>
                      <img src="<?=ROOT?>/assets/images/girl-avatar2.jpg" alt="" style="width:40px;max-width:40px;height:40px;object-fit: SPAN;" class="rounded">
                    <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
                      <img src="<?=ROOT?>/assets/images/female.jpg" alt="" style="width:40px;max-width:40px;height:40px;object-fit: SPAN;" class="rounded">
                    <?php elseif($row->gender === "male" AND $age < 13):?>
                      <img src="<?=ROOT?>/assets/images/boy-avatar2.jpg" alt="" style="width:40px;max-width:40px;height:40px;object-fit: SPAN;" class="rounded">
                      <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
                      <img src="<?=ROOT?>/assets/images/male.jpg" alt="" style="width:40px;max-width:40px;height:40px;object-fit: SPAN;" class="rounded">
                    <?php endif;?>
                   </a>
                  <?php if(Auth::is_admin()):?>
                  <?php if($age > 1 AND $mydob === $today):?>
                  <strong class="badge bg-info"><?=$age?> yrs</strong>
                <?php elseif($age > 1 AND $mydob !== $today):?>
                  <strong class="badge bg-secondary"><?=$age?> yrs</strong>
                <?php elseif($age < 2 AND $mydob === $today):?>
                  <strong class="badge bg-info"><?=$age?> yr</strong>
                <?php else:?>
                  <strong class="badge bg-secondary"><?=$age?> yr</strong>
                <?php endif;?>
                <?php endif;?>
                  </td>
                  <th><a href="<?=ROOT?>/admin/profile/<?=$row->id?>"><?=$row->firstname?> <?=$row->lastname?> <small class="fst-italic text-muted">(<?=ucfirst($row->role_name ?? '')?>)</small></a></th>
                  <td><span class=""><?=ucfirst($row->marital_status_id ? : 'Unknown')?></span></td>
                  <td><span class=""><?=get_date($row->dob ? : 'Unknown')?></span></td>
                  <td><span class=""><?=ucfirst($row->localposition_id ? :'member')?></span></td>
                  <td><span class=""><?=$row->phone ?? 'Unknown'?></span></td>
                  <td><p class="fst-italic"><?=$row->residence?></p></td>          
                  <td><p class="fst-italic"><?=$row->category_id ?? 'Unknown'?></p></td>
                  <td colspan="3">
                    <a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
                      <i class="bi bi-eye-fill btn btn-sm btn-outline-secondary"></i> 
                    </a>

                    <a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
                      <i class="bi bi-pencil-square btn btn-sm btn-outline-primary"></i> 
                    </a>

                    <a href="<?=ROOT?>/admin/delete/<?=$row->id?>">
                      <i class="bi bi-trash-fill btn btn-sm btn-outline-danger"></i>
                    </a>
                  </td>
                </tr>
                <?php endif;?>
                <?php endif;?>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          </div>

        </div>
      <!-- End Profile Edit Form -->
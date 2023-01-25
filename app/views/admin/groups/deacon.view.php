<?php
  use \Model\Auth;
  $categories = get_categories();

  
  //dcn count
  $queryDcn = "select count(id) as num from members where role = '7'";
  $resDcn = query_row($queryDcn);
  
?>
<div class="pagetitle rounded p-0 border-bottom">
   <nav>   
        <label class="fw-bolder badge text-primary"><?=strtoupper('District deacon Overview')?></label>
        
        <ul class="breadcrumb my-0 py-0">

          <li class="card-title d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder" >
              <i class="bi bi-people-fill"></i>
            </div>Total
           <b class="mx-2 mb-0 text-danger"><?=$resDcn['num'] ?? 0?></b>
          </li>
        </ul>
      </nav>
    </div><!-- End Page Title -->

      <!-- Profile Edit Form -->
        <div class="card-body">
             
            <div class="section-header d-flex justify-content-between align-items-center mb-2">
              <h5 class="text-muted"><?=strtoupper(esc('Sampa District - deacons'))?></h5>
            </div>      
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
              
              <div class="dataTable-container">

              <table class="table table-striped table-borderless border-bottom table-hover datatable dataTable-loading" >
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
                  <th scope="col" data-sortable="" >Action
                    <a href="<?=ROOT?>/admin/excel/print_deacons"><button class="btn btn-success btn-sm"><i class="bi bi-file-earmark-excel p-0"></i>  Download Excel</button></a>
                  </th>
                </tr>
              </thead>
              <tbody>
                  
                  

                <?php $id = 0;?>
                <?php foreach ($data['row'] as $row):?>

                <?php if(!empty($row->category_id)):?>
                <?php if($row->role_name ==='deacon'): $id +=1;?>

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
                  <td><span class=""><?=ucfirst($row->marital_status_id ?? 'Unknown')?></span></td>
                  <td><span class=""><?=get_date($row->dob ?? 'Unknown')?></span></td>
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
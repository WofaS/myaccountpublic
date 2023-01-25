<?php
  use \Model\Auth;
  $categories = get_categories();

  
  $query = "select count(id) as num from members where category_id = 'Central'";
  $resLocal = query_row($query);

  $queryMale = "select count(id) as num from members where gender = 'male' AND category_id = 'Central'";
  $resLocalMale = query_row($queryMale);
  
  $queryMaleChild = "select count(id) as num from members where role = '8' AND gender = 'male' AND category_id = 'Central'";
  $resLocalMaleChild = query_row($queryMaleChild);

  $resLocalMaleAdult = $resLocalMale['num'] - $resLocalMaleChild['num'];

  $queryFemale = "select count(id) as num from members where gender = 'female' AND category_id = 'Central'";
  $resLocalFemale = query_row($queryFemale);

  $queryFemaleChild = "select count(id) as num from members where role = '8' AND gender = 'female' AND category_id = 'Central'";
  $resLocalFemaleChild = query_row($queryFemaleChild);

  $resLocalFemaleAdult = $resLocalFemale['num'] - $resLocalFemaleChild['num'];

  $query1 = "select count(id) as num from members where role = '1' AND category_id = 'Central'";
  $resLocal1 = query_row($query1);

  //admin count
  $query2 = "select count(id) as num from members where role = '2' AND category_id = 'Central'";
  $resLocal2 = query_row($query2);

  //members count
  $query3 = "select count(id) as num from members where role = '4' AND category_id = 'Central'";
  $resLocal3 = query_row($query3);

  //elders count
  $query4 = "select count(id) as num from members where role = '5' AND category_id = 'Central'";
  $resLocal4 = query_row($query4);

  //dcnss count
  $query5 = "select count(id) as num from members where role = '6' AND category_id = 'Central'";
  $resLocal5 = query_row($query5);

  //dcn count
  $query6 = "select count(id) as num from members where role = '7' AND category_id = 'Central'";
  $resLocal6 = query_row($query6);

  //child count
  $query7 = "select count(id) as num from members where role = '8' AND category_id = 'Central'";
  $resLocal7 = query_row($query7);
  
  //visitor count
  $query8 = "select count(id) as num from members where role = '9' AND category_id = 'Central'";
  $resLocal8 = query_row($query8);

  //total count
  $total_resLocal = $resLocal1['num'] + $resLocal2['num'] + $resLocal3['num']+ $resLocal4['num']+ $resLocal5['num']+ $resLocal6['num']+ $resLocal7['num']+ $resLocal8['num'];
  
?>
<div class="pagetitle rounded p-0 border-bottom">
   <nav>   
        <label class="fw-bolder badge text-primary"><?=strtoupper('Central Membership Overview')?></label>
        
        <ul class="breadcrumb my-0 py-0">

          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder" >
              <i class="bi bi-people-fill"></i></div>Total <b class="mx-2 mb-0 text-danger"><?=$resLocal['num'] ?? 0?></b>
              <div class="filter col float-end">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Members</h6>
                    </li>

                    <li><a class="dropdown-item" href="#"><label class="col-6">Users </label><span class="col-6 text-info fw-bold"><?=$resLocal1['num']?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Admin </label><span class="col-6 text-info fw-bold"><?=$resLocal2['num']?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Membs. </label><span class="col-6 text-info fw-bold"><?=$resLocal3['num']?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Elds </label><span class="col-6 text-info fw-bold"><?=$resLocal4['num']?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Dcnss. </label><span class="col-6 text-info fw-bold"><?=$resLocal5['num']?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Dcns. </label><span class="col-6 text-info fw-bold"><?=$resLocal6['num']?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Children </label><span class="col-6 text-info fw-bold"><?=$resLocal7['num']?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Visitors </label><span class="col-6 text-info fw-bold"><?=$resLocal8['num']?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6 fw-bolder text-danger">TOTAL </label><span class=" col-6 text-danger fw-bold" style="border-bottom:2px solid red"><?=$total_resLocal?></span></a></li>
                  </ul>
                </div>
          </li>
          
          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto" ><i class="bx bx-male"></i></div>Males <b class="mx-3 text-danger"><?=$resLocalMale['num'] ?? 0?></b>
            <div class="filter col float-end">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Male</h6>
                  </li>

                  <li><a class="dropdown-item" href="#"><label class="col-6">Adult</label><span class="col-6  text-dark fw-bolder"><?=$resLocalMaleAdult ?? 0?></span></a></li>
                  <li class="mb-0 pb-0"><a class="dropdown-item" href="#"><label class="col-6">Child</label><span class="col-6  text-dark fw-bolder border-bottom text-primary"><?=$resLocalMaleChild['num'] ?? 0?></span></a></li>
                  <li><a class="dropdown-item" href="#"><label class="col-6 text-danger">Total</label><span class="col-6  text-danger fw-bolder" style="border-bottom:2px solid red"><?=$resLocalMale['num'] ?? 0?></span></a></li>
                </ul>
              </div>
          </li>
          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto" ><i class="bx bx-female"></i></div>Females <b class="mx-3 text-danger"><?=$resLocalFemale['num'] ?? 0?></b>
            <div class="filter col float-end">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Female</h6>
              </li>

                  <li><a class="dropdown-item" href="#"><label class="col-6">Adult</label><span class="col-6 fw-bolder text-primary"><?=$resLocalFemaleAdult ?? 0?></span></a></li>
                  <li class="mb-0 pb-0"><a class="dropdown-item" href="#"><label class="col-6">Child</label><span class="col-6  text-dark fw-bolder border-bottom text-primary"><?=$resLocalFemaleChild['num'] ?? 0?></span></a></li>
                  <li><a class="dropdown-item" href="#"><label class="col-6 text-danger">Total</label><span class="col-6  text-danger fw-bolder" style="border-bottom:2px solid red"><?=$resLocalFemale['num'] ?? 0?></span></a></li>
                </ul>
              </div>
          </li>
        </ul>
      </nav>
    </div><!-- End Page Title -->

<section class="mt-2 pt-1">
<div class="container-fluid" data-aos="fade-up">

<?php if(!empty($data['row'])):?>
        <div class="card-body">
             
            <div class="section-header d-flex justify-content-between align-items-center mb-2">
              <h5 class="text-muted"><?=strtoupper(esc('Sampa District - Central Assembly'))?></h5>
              <p class="col-6">Note: <span class="fst-italic">These are members from age of 36 to 60 years. It comprises officers, non-officers and 'visitors'.</span></p>
            </div>      
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
              
              <div class="dataTable-container">

              <table class="table table-striped table-borderless border-bottom table-hover datatable dataTable-loading" >
              <thead>
                <tr class="" style="background: lightgray;">
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">#</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">PHOTO</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">NAME</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">M.STATUS</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">DOB</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">ROLE</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter"><i class="bx bxs-phone-incoming fw-bolder text-danger"></i> PHONE</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter"><i class="bi bi-pin-map fw-bolder text-danger"></i> RESIDENCE</a></th>
                  <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter"><i class="bi bi-pin-map fw-bolder text-danger fw-bolder"></i> LOCAL</a></th>
                  <th scope="col-3" data-sortable="" ><a href="<?=ROOT?>/admin/excel/print_central"><button class="btn btn-success btn-sm fs-6 px-3 py-0 m-0" title="Download Excel"><i class="bi bi-file-earmark-excel p-0 fs-6"></i>  Excel</button></a>ACTION</th>
                </tr>
              </thead>
              <tbody>
                  
                  

                <?php $id = 0;?>
                <?php foreach ($data['row'] as $row):?>

                <?php if(!empty($row->category_id) && $row->category_id === 'Central'): $id +=1;?>

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
                    <?php if (!empty($row->image)): ?>                  
                    <img src="<?=get_profile_image($row->image)?>" alt="" style="width:40px;max-width:40px;height:40px;object-fit: SPAN;" class="rounded">          
                    <?php elseif(!empty($row->gender)):?>
                    <img src="<?=ROOT?>/assets/images/<?=$row->gender?>.jpg" alt="" style="width:40px;max-width:40px;height:40px;object-fit: SPAN;" class="rounded">
                  <?php else:?>
                    <img src="<?=ROOT?>/assets/images/no-image.jpg" alt="" style="width:40px;max-width:40px;height:40px;object-fit: SPAN;" class="rounded">
                  <?php endif ;?></a>
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
                  <td><span class=""><?=$row->marital_status_id ?? 'Unknown'?></span></td>
                  <td><span class=""><?=get_date($row->dob ?? 'Unknown')?></span></td>
                  <td><span class=""><?=ucfirst($row->localposition_id ? :'member')?></span></td>
                  <td><span class=""><?=$row->phone ?? 'Unknown'?></span></td>
                  <td><p class="fst-italic"><?=$row->residence?></p></td>          
                  <td><p class="fst-italic"><?=$row->category_id ?? 'Unknown'?></p></td>
                  <td>
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
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </section>
  <?php else:?>
    <div class="alert alert-danger">No records to show</div>
  <?php endif;?>
      <!-- End Profile Edit Form -->
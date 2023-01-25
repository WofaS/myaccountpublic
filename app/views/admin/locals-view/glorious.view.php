<?php
  use \Model\Auth;
  $categories = get_categories();

  
  $query = "select count(id) as num from members where category_id = 'Glorious'";
  $resLocal = query_row($query);

  $queryMale = "select count(id) as num from members where gender = 'male' AND category_id = 'Glorious'";
  $resLocalMale = query_row($queryMale);
  
  $queryMaleChild = "select count(id) as num from members where role = '8' AND gender = 'male' AND category_id = 'Glorious'";
  $resLocalMaleChild = query_row($queryMaleChild);

  $resLocalMaleAdult = $resLocalMale['num'] - $resLocalMaleChild['num'];

  $queryFemale = "select count(id) as num from members where gender = 'female' AND category_id = 'Glorious'";
  $resLocalFemale = query_row($queryFemale);

  $queryFemaleChild = "select count(id) as num from members where role = '8' AND gender = 'female' AND category_id = 'Glorious'";
  $resLocalFemaleChild = query_row($queryFemaleChild);

  $resLocalFemaleAdult = $resLocalFemale['num'] - $resLocalFemaleChild['num'];

  $query1 = "select count(id) as num from members where role = '1' AND category_id = 'Glorious'";
  $resLocal1 = query_row($query1);

  //admin count
  $query2 = "select count(id) as num from members where role = '2' AND category_id = 'Glorious'";
  $resLocal2 = query_row($query2);

  //members count
  $query3 = "select count(id) as num from members where role = '4' AND category_id = 'Glorious'";
  $resLocal3 = query_row($query3);

  //elders count
  $query4 = "select count(id) as num from members where role = '5' AND category_id = 'Glorious'";
  $resLocal4 = query_row($query4);

  //dcnss count
  $query5 = "select count(id) as num from members where role = '6' AND category_id = 'Glorious'";
  $resLocal5 = query_row($query5);

  //dcn count
  $query6 = "select count(id) as num from members where role = '7' AND category_id = 'Glorious'";
  $resLocal6 = query_row($query6);

  //child count
  $query7 = "select count(id) as num from members where role = '8' AND category_id = 'Glorious'";
  $resLocal7 = query_row($query7);
  
  //visitor count
  $query8 = "select count(id) as num from members where role = '9' AND category_id = 'Glorious'";
  $resLocal8 = query_row($query8);

  //total count
  $total_resLocal = $resLocal1['num'] + $resLocal2['num'] + $resLocal3['num']+ $resLocal4['num']+ $resLocal5['num']+ $resLocal6['num']+ $resLocal7['num']+ $resLocal8['num'];
  
?>
<div class="pagetitle rounded p-0 border-bottom">
   <nav>   
        <label class="fw-bolder badge text-primary"><?=strtoupper('Glorious Membership Overview')?></label>
        
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
    <div class="section-header d-flex justify-content-between align-items-center mb-5">
      <h2 class="text-muted"><?=strtoupper(esc('Glorious ASSEMBLY'))?></h2>
    </div>
  <div class="row g-5">
    <div class="row d-flex mx-1 justify-content-center rounded table py-3 " style="height:200;">

      
  
  <?php foreach($data['row'] as $row):?>
  <?php if(!empty($row->category_id) && $row->category_id === 'Glorious'):?>

<?php
    $mydob = get_date_month_day($row->dob);
    $today = date('m d');
    ?>
    
  <div class="col py-2" style="">
    <div class="container bg-secondary rounded shadow" style="width:160px; height: fit-content;">
  <?php if($mydob ===$today):?>

    <div class="row justify-content-center rounded mb-0 pb-0  bg-info" style="width:157.5px;">
    <a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
    <?php if(!empty($row->image)):?>              
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
    <?php elseif(!empty($row->gender)):?>
    <img src="<?=ROOT?>/assets/images/<?=($row->gender)?>.jpg" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
    <?php else:?>
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
    <?php endif;?>
    </a>
    <div class='badge'>      
      <div class="badge bg-light text-danger" href="#">Happy birthday <?=$row->firstname?></div>
      
    </div>
    </div>

  <?php else:?>

    <div class="row justify-content-center rounded mb-0 pb-0" style="width:157.5px;">
    <a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
    <?php if(!empty($row->image)):?>              
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
    <?php elseif(!empty($row->gender)):?>
    <img src="<?=ROOT?>/assets/images/<?=($row->gender)?>.jpg" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
    <?php else:?>
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
    <?php endif;?>
    </a>
    </div>
  <?php endif;?>
<div class="row bg-dark text-white px-3 text-wrap rounded mb-0 pb-4" style="width:160px; height: 100px;">
<div class="text-center fw-bolder px-0 mx-0 mb-0 pb-0" style="font-size:11px"><b><?=$row->firstname ?? ''?> <?=$row->lastname ?? ''?></b>
<div><span class="fst-italic text-muted">(<?=ucfirst($row->role_name ?? '')?>) - <?=$row->category_id ?? 'Unknown'?></span></div></div>
<div class="text-center small text-warning" style="font-size: 10px;"><b><?=$row->position_id ?? ''?></b><br>
<u class="text-danger fw-bolder fst-italic"><?=$row->phone ? :'Unknown contact'?></u><br>
</div>

<div class="text-center fw-bolder px-0 mx-0 text-light" style="font-size:9px;">

<span class="social float-end mb-3">
<a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
  <i class="bi bi-eye-fill text-light py-0 px-1"></i>
</a>
<?php if(user_can('edit_slider_images')):?>
<a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
  <i class="bi bi-pencil-fill text-light py-0 px-1 "></i>
</a>
<a href="<?=ROOT?>/admin/delete/<?=$row->id?>">
  <i class="bi bi-trash-fill text-danger"></i>
</a>
<?php endif;?>
</span>

</div>

</div>  
</div>  
    
</div>
<?php endif;?>
<?php endforeach;?>
 
</div>
         
</div>
        
</div>
</section> <!-- End Post Grid Section -->

<?php else:?>

  <div class="alert alert-success text-center">No records were found!</div>
<?php endif;?>
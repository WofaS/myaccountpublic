<?php
  use \Model\Auth;
  $categories = get_categories();

  
  //visitor count
  $queryChild = "select count(id) as num from members where role = '8'";
  $resChild = query_row($queryChild);

//visitorMale count
  $queryChildMale = "select count(id) as num from members where role = '8' AND gender = 'male'";
  $resChildMale = query_row($queryChildMale);

//visitorMale count
  $queryChildFemale = "select count(id) as num from members where role = '8' AND gender = 'female'";
  $resChildFemale = query_row($queryChildFemale);
 
?>
<div class="pagetitle rounded p-0 border-bottom">
   <nav>   
        <label class="fw-bolder badge text-primary"><?=strtoupper('District Children Overview')?></label>
        
        <ul class="breadcrumb my-0 py-0">

          <li class="card-title d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto" ><i class="bx bx-female"></i></div>Child <b class="mx-3 text-danger"><?=$resChild['num'] ?? 0?></b>
            <div class="filter col float-end">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Child</h6>
              </li>

                  <li><a class="dropdown-item" href="#"><label class="col-6">Male</label><span class="col-6 fw-bolder text-primary"><?=$resChildMale['num'] ?? 0?></span></a></li>
                  <li class="mb-0 pb-0"><a class="dropdown-item" href="#"><label class="col-6">Female</label><span class="col-6  text-dark fw-bolder border-bottom text-primary"><?=$resChildFemale['num'] ?? 0?></span></a></li>
                  <li><a class="dropdown-item" href="#"><label class="col-6 text-danger">Total</label><span class="col-6  text-danger fw-bolder" style="border-bottom:2px solid red"><?=$resChild['num'] ?? 0?></span></a></li>
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
      <h5 class="text-muted border-bottom"><?=strtoupper(esc('Sampa District - Children'))?><span>(0 - 12yrs)</span></h5>
      <a class="float-right" href="<?=ROOT?>/admin/excel/print_children"><button class="btn btn-success btn-sm"><i class="bi bi-file-earmark-excel p-0"></i>  Download Excel</button></a>
    </div>
  <div class="row g-5">
    <div class="row d-flex mx-1 justify-content-center rounded table py-3 " style="height:200;">

      
  
  <?php foreach($data['row'] as $row):?>
  <?php if(!empty($row->category_id) && $row->role_name === 'child'):?>

<?php

    $dob = $row->dob;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dob), date_create($today));
    $age = $diff->format('%Y');

    $mydob = get_date_month_day($row->dob);
    $today = date('m d');
    ?>
    
  <div class="col py-2" style="">
    <div class="container bg-secondary rounded shadow" style="width:160px; height: fit-content;">
  <?php if($mydob ===$today):?>

    <div class="row justify-content-center rounded mb-0 pb-0  bg-info" style="width:157.5px;">
    <a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
    <?php if(!empty($row->image)):?>
        <img src="<?=get_profile_image($row->image)?>" alt=""class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
      <?php elseif($row->gender ==="female" AND $age < 13):?>
        <img src="<?=ROOT?>/assets/images/girl-avatar2.jpg" alt=""class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
      <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
        <img src="<?=ROOT?>/assets/images/female.jpg" alt=""class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
      <?php elseif($row->gender === "male" AND $age < 13):?>
        <img src="<?=ROOT?>/assets/images/boy-avatar2.jpg" alt=""class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
        <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
        <img src="<?=ROOT?>/assets/images/male.jpg" alt=""class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
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
        <img src="<?=get_profile_image($row->image)?>" alt=""class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
      <?php elseif($row->gender ==="female" AND $age < 13):?>
        <img src="<?=ROOT?>/assets/images/girl-avatar2.jpg" alt=""class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
      <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
        <img src="<?=ROOT?>/assets/images/female.jpg" alt=""class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
      <?php elseif($row->gender === "male" AND $age < 13):?>
        <img src="<?=ROOT?>/assets/images/boy-avatar2.jpg" alt=""class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
        <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
        <img src="<?=ROOT?>/assets/images/male.jpg" alt=""class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
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
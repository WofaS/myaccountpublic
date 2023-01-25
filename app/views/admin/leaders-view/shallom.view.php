<?php
  use \Model\Auth;
  $categories = get_categories();

  $queryElder = "select count(id) as num from members where role = '5' AND category_id = 'Shallom'";
  $resElder = query_row($queryElder);

  $queryDeaconess = "select count(id) as num from members where role = '6' AND category_id = 'Shallom'";
  $resDeaconess = query_row($queryDeaconess);

  $queryDeacon = "select count(id) as num from members where role = '7' AND category_id = 'Shallom'";
  $resDeacon = query_row($queryDeacon);

  //total count
  $totalOfficers = $resElder['num'] + $resDeaconess['num'] + $resDeacon['num'];
  ?>
<div class="pagetitle rounded p-0 border-bottom">
   <nav>   
        <label class="fw-bolder badge text-primary"><?=strtoupper('Shallom Officers Overview')?></label>
        
        <ul class="breadcrumb my-0 py-0">

          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder" >
              <i class="bi bi-people-fill"></i></div>Total Officers<b class="mx-2 mb-0 text-danger"><?=$totalOfficers ?? 0?></b>
          </li>
          
          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto" ><i class="bx bx-male"></i></div>Elders <b class="mx-3 text-danger"><?=$resElder['num'] ?? 0?></b>
          </li>
          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto" ><i class="bx bx-female"></i></div>Deacons <b class="mx-3 text-danger"><?=$resDeacon['num'] ?? 0?></b>
            <div class="filter col float-end">
          </li>
          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto" ><i class="bx bx-female"></i></div>Deaconesses <b class="mx-3 text-danger"><?=$resDeaconess['num'] ?? 0?></b>
            <div class="filter col float-end">
          </li>
        </ul>
      </nav>
    </div><!-- End Page Title -->

    
<section class="mt-2 pt-1">
<div class="container-fluid" data-aos="fade-up">

<?php if(!empty($data['row'])):?>
    <div class="section-header d-flex justify-content-between align-items-center mb-5">
      <h2 class="text-muted border-bottom"><?=strtoupper('Shallom ASSEMBLY Officers')?></h2>
    </div>
  <div class="row g-5">
    <div class="row d-flex mx-1 justify-content-center rounded table py-3 " style="height:200;">

      
  
  <?php foreach($data['row'] as $row):?>
  <?php if(!empty($row->category_id) && $row->category_id === 'Shallom'):?>

  <?php if($row->role_name === 'Elder' OR $row->role_name === 'Deacon' OR $row->role_name === 'Deaconess'):?>

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
<div class="text-center fw-bolder px-0 mx-0 mb-0 pb-0" style="font-size:11px"><b><?=substr($row->firstname ?? '',0,1)?>. <?=$row->lastname ?? ''?></b>
<div><span class="fst-italic text-muted">(<?=ucfirst($row->role_name ?? '')?>)</span></div></div>
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
<?php endif;?>
<?php endforeach;?>
 
</div>
         
</div>
        
</div>
</section> <!-- End Post Grid Section -->

<?php else:?>

  <div class="alert alert-success text-center">No records were found!</div>
<?php endif;?>
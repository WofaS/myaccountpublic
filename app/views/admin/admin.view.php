<?php $this->view('admin/admin-header',$data) ?>

<?php

use model\Auth;
$roles = get_roles();

  ?>

  <?php include('stat.inc.php') ?>

   <div class="pagetitle">
      <h1>Admins</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=ROOT?>/admin/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  <section class="mt-2 pt-1">
<div class="container-fluid" data-aos="fade-up">

<?php if(!empty($data['row'])):?>
    <div class="section-header d-flex justify-content-between align-items-center mb-5">
      <h2 class="text-muted"><?=strtoupper(esc('Administrators'))?></h2>
      <?php if(user_can('edit_slider_images')):?> 

          <a href="<?=ROOT?>/adminsignup">
            <button class="btn btn-primary btn-md float-end">+ New Admin</button>
          </a>
      <?php endif;?>
    </div>
 <div class="row g-5 bg-white rounded">
    <div class="row d-flex mx-1 justify-content-center rounded table py-3 " style="height:200;">

      
  
  <?php foreach($data['row'] as $row):?>
  <?php if(!empty($row->role) && $row->role_name === 'admin'):?>

  <div class="col py-2" style="">
    <div class="container bg-secondary rounded shadow" style="width:160px; height: fit-content;">
    <div class="row justify-content-center rounded mb-0 pb-0" style="width:157.5px;">
    <a href="<?=ROOT?>/admin/viewadmins/<?=$row->id?>">
    <?php if(!empty($row->image)):?>              
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
    <?php elseif(!empty($row->gender)):?>
    <img src="<?=ROOT?>/assets/images/<?=($row->gender)?>.jpg" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
    <?php else:?>
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;">
    <?php endif;?>
    </a>
    </div>
    <div class="row bg-dark text-white px-3 text-wrap rounded mb-0 pb-4" style="width:160px; height: 100px;">
    <div class="text-center fw-bolder px-0 mx-0 mb-0 pb-0" style="font-size:11px"><b><?=$row->firstname ?? ''?> <?=$row->lastname ?? ''?></b>
    <div><span class="fst-italic text-muted">(<?=ucfirst($row->role_name ?? '')?>) - <?=$row->category_id ?? 'Unknown'?></span></div></div>
    <div class="text-center small text-warning" style="font-size: 10px;"><b><?=$row->position_id ?? ''?></b><br>
    <u class="text-danger fw-bolder fst-italic"><?=$row->phone ? :'Unknown contact'?></u><br>
    </div>

    <div class="text-center fw-bolder px-0 mx-0 text-light" style="font-size:9px;">

    <span class="social float-end mb-3">
    <a href="<?=ROOT?>/admin/viewadmins/<?=$row->id?>">
      <i class="bi bi-eye-fill text-light py-0 px-1"></i>
    </a>
    <?php if(user_can('edit_slider_images')):?>
    <a href="<?=ROOT?>/admin/adminprofile/<?=$row->id?>">
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

<?php $this->view('admin/admin-footer',$data) ?>
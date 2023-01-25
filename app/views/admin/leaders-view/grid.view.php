<?php if(!empty($data['row'])):?>
<div class="container" data-aos="fade-up">
    
<div class="row">
  <div class="row d-flex mx-1 bg-light justify-content-center rounded shadow table py-3 " style="height:200;">

  <?php foreach($data['row'] as $row):?>

  <?php if(!empty($row->category_id)):?>

  <?php if(!empty($row->position_id)):?>

  <?php
    $mydob = get_date_month_day($row->dob);
    $today = date('m d');
  ?>
  
  <div class="col" style="">
  <div class="container bg-secondary rounded shadow my-2" style="width:220px; height: 260px;">
      
    <?php if($mydob ===$today):?>

    <div class="row justify-content-center rounded mb-0 pb-0  bg-info" style="width:215px;">
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

    <div class="row justify-content-center rounded mb-0 pb-0" style="width:215px;">
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
  <div class="row bg-dark text-white px-3 text-wrap rounded mb-0 pb-0" style="width:220px; height: 110px;">
    <div class="text-center fw-bolder px-0 mx-0 mb-0 pb-0" style="font-size:13px"><b><?=substr($row->firstname ?? '',0,1)?>. <?=ucfirst($row->lastname ?? '')?> (<?=$row->role_name ?? ''?>)</b><b class="text-center fw-bolder" style="font-size: 12px; color: lightgray;"> <br> <?=$row->category_id?></b></div>
    <div class="text-center text-warning" style="font-size: 12px; color: lightgray;"><b><?=strtoupper($row->position_id ?? '')?></b></div>
    <div class="text-center fw-bolder px-0 mx-0" style="font-size:12px; color: red;">
      <i class="bi bi-telephone-fill text-danger"></i>
      <span><?=$row->phone ? :'Unknown contact'?></span><br>
    
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
<?php endif;?>
 
</div>
         
</div>
</div> <!-- End .row -->

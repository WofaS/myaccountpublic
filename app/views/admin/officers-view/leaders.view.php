
<section class="mt-2 pt-1">
<div class="container-fluid" data-aos="fade-up">

<div class="row g-5">
<div class="mt-3 row d-flex mx-0 justify-content-center table rounded shadow table py-3 " style="height:fit-content;">
<h4 class="text-muted border-bottom">ALL LEADERS IN <?=strtoupper(APP_NAME)?></h4>

<?php foreach($data['row'] as $row):?>

<?php if(!empty($row->position_id)):?>
<div class="col" style="">
  <div class="container bg-secondary rounded shadow my-2" style="width:220px; height: 260px;">
    <div class="row justify-content-center rounded mb-0 pb-0" style="width:215px;">
      
    <a href="<?=ROOT?>/admin/viewusers/<?=$row->id?>">
    <?php if(!empty($row->image)):?>              
      <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:140px;">
    <?php elseif(!empty($row->gender)):?>
      <img src="<?=ROOT?>/assets/images/<?=($row->gender)?>.jpg" class="w-100 rounded border" style="object-fit: fill; width: 180px; max-width:180px;height:140px;">
    <?php else:?>
      <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border" style="object-fit: fill; width: 180px; max-width:180px;height:140px;">
    <?php endif;?>
    </a>
  </div>
  <div class="row bg-dark text-white px-3 text-wrap rounded mb-0 pb-0" style="width:220px; height: 110px;">
    <div class="text-center fw-bolder px-0 mx-0 mb-0 pb-0" style="font-size:14px"><b><?=$row->firstname ?? ''?> <?=ucfirst($row->lastname ?? '')?></b>
      <b class="text-center fw-bolder small fst-italic" style="font-size: 12px; color: lightgray;"> (<?=$row->role_name ?? ''?>)- <span><?=ucfirst($row->category_id ?? '')?></span></b></div>
    <div class="text-center text-warning" style="font-size: 12px; color: lightgray;"><b><?=strtoupper($row->position_id ?? '')?></b></div>
    <div class="text-center fw-bolder px-0 mx-0" style="font-size:12px; color: red;">
      <i class="bi bi-telephone-fill text-danger"></i>
      <span><?=$row->phone ? :'Unknown contact'?></span><br>
    
    <span class="social float-end mb-3">
      <a href="<?=ROOT?>/admin/viewusers/<?=$row->id?>">
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
</section>
<?php
use \Model\Auth;
$categories = get_categories();
$app = get_app_details();


?>
 <?php if($app):?>
<?php foreach($app as $row):?> 

<div style="width:fit-content; background: lightblue; border-radius:10px; margin-left: 35px;margin-top: 5px; padding: 0.4rem; margin-bottom: -35px;">
  <div>
    <h2 style="margin-bottom: -20px; color: red;"><img src="<?=get_image($row->image)?>" alt="App Logo" style="width: 20px; max-width: 20px; height: 20px;"><?=$row->appname?></h2>
    <h3 style="margin-bottom: -20px;"><?=ucfirst($row->church_name)?></h3>
    <p><?=ucfirst($row->district_name)?>-<?=ucfirst($row->area_name)?></p>
    <h6 style="margin-top:-15px;">Located @ <?=$row->location ? : '(Location)'?></h6>
  </div>
</div>

<center style="padding: 3rem;">
  
  <h1>MEMBERSHIP RECORDS</h1>
<?php endforeach;?>
<?php endif;?>
<div>
  
<?php if(!empty($data['row'])):?>
<div class="container" data-aos="fade-up">

<?php if($action == 'print_members'):?>

<div class="row">
  <div class="row d-flex mx-1 bg-light justify-content-center rounded shadow table py-3 " style="height:200; display: flex; flex-direction: row; flex-wrap: wrap;">

  <?php foreach($data['row'] as $row):?>
  
  <?php
    $mydob = get_date_month_day($row->dob);
    $today = date('m d');
    ?>
    
  <div class="col py-2" style="">
    <div style="width:160px; height: fit-content;">
  <?php if($mydob ===$today):?>

    <div class="row justify-content-center rounded mb-0 pb-0  bg-info" style="width:157.5px; justify-content: center;background: lightgreen; border-radius:5px;">
    <a href="<?=ROOT?>/admin/viewusers/<?=$row->id?>">
    <?php if(!empty($row->image)):?>              
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 140px; max-width:140px;height:105px; border-radius: 5px;">
    <?php elseif(!empty($row->gender)):?>
    <img src="<?=ROOT?>/assets/images/<?=($row->gender)?>.jpg" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px; border-radius: 5px;">
    <?php else:?>
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px; border-radius: 5px;">
    <?php endif;?>
    </a>
    <div class='badge'>      
      <small class="badge bg-light text-danger" href="#" style="color: red;">Happy birthday <?=$row->firstname?></small>
      
    </div>
    </div>

  <?php else:?>

    <div class="row justify-content-center rounded mb-0 pb-0" style="width:157.5px; justify-content:center; border-radius: 5px;">
    <a href="<?=ROOT?>/admin/viewusers/<?=$row->id?>">
    <?php if(!empty($row->image)):?>              
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 140px; max-width:140px;height:105px;border-radius: 5px;">
    <?php elseif(!empty($row->gender)):?>
    <img src="<?=ROOT?>/assets/images/<?=($row->gender)?>.jpg" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;border-radius: 5px;">
    <?php else:?>
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;border-radius: 5px;">
    <?php endif;?>
    </a>
    </div>
  <?php endif;?>
    <div class="" style="width:160px; height: 100px;">
    <div class="text-center fw-bolder px-0 mx-0 mb-0 pb-0" style="font-size:11px; font-weight: bolder; padding: 2px 0 2px 0;"><b><?=$row->firstname ?? ''?> <?=$row->lastname ?? ''?></b>
    <div><span class="fst-italic text-muted">(<?=ucfirst($row->role_name ?? '')?>) - <?=$row->category_id ?? 'Unknown'?></span></div></div>
    <div class="text-center small text-warning" style="font-size: 10px;"><b><?=$row->position_id ?? ''?></b><br>
    <u class="text-danger fw-bolder fst-italic"><?=$row->phone ? :'Unknown contact'?></u><br>
    </div>
    </div>  
    </div>  
        
  </div>
<?php endforeach;?>
 
</div>
         
</div>

<?php elseif($action == 'print_central'):?>
<div class="row">
  <div class="row d-flex mx-1 bg-light justify-content-center rounded shadow table py-3 " style="height:200; display: flex; flex-direction: row; flex-wrap: wrap;">

  <?php foreach($data['row'] as $row):?>
  
  <?php
    $mydob = get_date_month_day($row->dob);
    $today = date('m d');
    ?>

    <?php if(!empty($row->category_id) AND $row->category_id === 'Central'):?>
    
  <div class="col py-2" style="">
    <div style="width:160px; height: fit-content;">
  <?php if($mydob ===$today):?>

    <div class="row justify-content-center rounded mb-0 pb-0  bg-info" style="width:157.5px; justify-content: center;background: lightgreen; border-radius:5px;">
    <a href="<?=ROOT?>/admin/viewusers/<?=$row->id?>">
    <?php if(!empty($row->image)):?>              
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 140px; max-width:140px;height:105px; border-radius: 5px;">
    <?php elseif(!empty($row->gender)):?>
    <img src="<?=ROOT?>/assets/images/<?=($row->gender)?>.jpg" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px; border-radius: 5px;">
    <?php else:?>
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px; border-radius: 5px;">
    <?php endif;?>
    </a>
    <div class='badge'>      
      <small class="badge bg-light text-danger" href="#" style="color: red;">Happy birthday <?=$row->firstname?></small>
      
    </div>
    </div>

  <?php else:?>

    <div class="row justify-content-center rounded mb-0 pb-0" style="width:157.5px; justify-content:center; border-radius: 5px;">
    <a href="<?=ROOT?>/admin/viewusers/<?=$row->id?>">
    <?php if(!empty($row->image)):?>              
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 140px; max-width:140px;height:105px;border-radius: 5px;">
    <?php elseif(!empty($row->gender)):?>
    <img src="<?=ROOT?>/assets/images/<?=($row->gender)?>.jpg" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;border-radius: 5px;">
    <?php else:?>
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;border-radius: 5px;">
    <?php endif;?>
    </a>
    </div>
  <?php endif;?>
    <div class="" style="width:160px; height: 100px;">
    <div class="text-center fw-bolder px-0 mx-0 mb-0 pb-0" style="font-size:11px; font-weight: bolder; padding: 2px 0 2px 0;"><b><?=$row->firstname ?? ''?> <?=$row->lastname ?? ''?></b>
    <div><span class="fst-italic text-muted">(<?=ucfirst($row->role_name ?? '')?>) - <?=$row->category_id ?? 'Unknown'?></span></div></div>
    <div class="text-center small text-warning" style="font-size: 10px;"><b><?=$row->position_id ?? ''?></b><br>
    <u class="text-danger fw-bolder fst-italic"><?=$row->phone ? :'Unknown contact'?></u><br>
    </div>
    </div>  
    </div>  
        
  </div>
<?php endif;?>
<?php endforeach;?>
 
</div>
         
</div>

<?php else:?>
<div class="row">
  <div class="row d-flex mx-1 bg-light justify-content-center rounded shadow table py-3 " style="height:200; display: flex; flex-direction: row; flex-wrap: wrap;">

  <?php foreach($data['row'] as $row):?>
  
  <?php
    $mydob = get_date_month_day($row->dob);
    $today = date('m d');
    ?>

    <?php if(!empty($row->category_id) AND $row->category_id === 'Central'):?>
    
  <div class="col py-2" style="">
    <div style="width:160px; height: fit-content;">
  <?php if($mydob ===$today):?>

    <div class="row justify-content-center rounded mb-0 pb-0  bg-info" style="width:157.5px; justify-content: center;background: lightgreen; border-radius:5px;">
    <a href="<?=ROOT?>/admin/viewusers/<?=$row->id?>">
    <?php if(!empty($row->image)):?>              
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 140px; max-width:140px;height:105px; border-radius: 5px;">
    <?php elseif(!empty($row->gender)):?>
    <img src="<?=ROOT?>/assets/images/<?=($row->gender)?>.jpg" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px; border-radius: 5px;">
    <?php else:?>
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px; border-radius: 5px;">
    <?php endif;?>
    </a>
    <div class='badge'>      
      <small class="badge bg-light text-danger" href="#" style="color: red;">Happy birthday <?=$row->firstname?></small>
      
    </div>
    </div>

  <?php else:?>

    <div class="row justify-content-center rounded mb-0 pb-0" style="width:157.5px; justify-content:center; border-radius: 5px;">
    <a href="<?=ROOT?>/admin/viewusers/<?=$row->id?>">
    <?php if(!empty($row->image)):?>              
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 140px; max-width:140px;height:105px;border-radius: 5px;">
    <?php elseif(!empty($row->gender)):?>
    <img src="<?=ROOT?>/assets/images/<?=($row->gender)?>.jpg" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;border-radius: 5px;">
    <?php else:?>
    <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border" style="object-fit: fill; width: 140px; max-width:140px;height:105px;border-radius: 5px;">
    <?php endif;?>
    </a>
    </div>
  <?php endif;?>
    <div class="" style="width:160px; height: 100px;">
    <div class="text-center fw-bolder px-0 mx-0 mb-0 pb-0" style="font-size:11px; font-weight: bolder; padding: 2px 0 2px 0;"><b><?=$row->firstname ?? ''?> <?=$row->lastname ?? ''?></b>
    <div><span class="fst-italic text-muted">(<?=ucfirst($row->role_name ?? '')?>) - <?=$row->category_id ?? 'Unknown'?></span></div></div>
    <div class="text-center small text-warning" style="font-size: 10px;"><b><?=$row->position_id ?? ''?></b><br>
    <u class="text-danger fw-bolder fst-italic"><?=$row->phone ? :'Unknown contact'?></u><br>
    </div>
    </div>  
    </div>  
        
  </div>
<?php endif;?>
<?php endforeach;?> 
</div>
         
</div>
<?php endif;?>

</div> <!-- End .row -->

<?php endif;?>

</center>

</div>
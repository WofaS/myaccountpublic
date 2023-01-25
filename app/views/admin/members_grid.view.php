<style type="text/css">
  
  .social{
    color: yellow;
    transition: 0.4s ease-in-out;
  }

  .social::hover{
    color: blue;
  }

</style>


<?php if(!empty($rows)):?>
      <div class="container" data-aos="fade-up">
            <?php
              $query1 = "select count(id) as num from users where disabled = '0'";
              $res1 = query_row($query1);

            ?>
        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h4 class="text-muted">REGISTERED MEMBERS <strong class="fw-bolder text-light badge bg-danger"><?=$res1['num'] ?? 0?></strong></h4>
            
        <nav class="navbar navbar-light bg-light">
      <form class="form-inline">
        <div class="input-group">
          <div class="input-group-prepend">
            <button class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i>&nbsp</button>
          </div>
          <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
        </div>
      </form>
     
    </nav>

          <div>
       <?php if(user_can('edit_slider_images')):?> 

            <a href="<?=ROOT?>/adminsignup">
              <button class="btn btn-secondary btn-md float-end">+ New</button>
            </a>
        <?php endif;?>
          </div>
        </div>

        <div class="row">
          <div class="row d-flex mx-1 bg-light justify-content-center rounded shadow table py-3 " style="height:200;">

          <?php foreach($row as $row):?>
          <div class="col" style="">
          <div class="container bg-secondary rounded shadow my-2" style="width:220px; height: 260px;">
            <div class="row justify-content-center rounded mb-0 pb-0" style="width:215px;">
              
            <a href="<?=ROOT?>/viewusers/<?=$row->id?>">
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
            <div class="text-center fw-bolder px-0 mx-0 mb-0 pb-0" style="font-size:14px"><b><?=$row->firstname ?? ''?> <?=ucfirst($row->lastname ?? '')?></b><b class="text-center fw-bolder small fst-italic" style="font-size: 12px; color: lightgray;"> (<?=$row->role_name ?? ''?>)</b></div>
            <div class="text-center text-warning" style="font-size: 12px; color: lightgray;"><b><?=strtoupper($row->position_id ?? '')?></b></div>
            <div class="text-center fw-bolder px-0 mx-0" style="font-size:12px; color: red;">
              <i class="bi bi-telephone-fill text-danger"></i>
              <span><?=$row->phone ? :'Unknown contact'?></span><br>
            
            <span class="social float-end mb-3">
              <a href="<?=ROOT?>/viewusers/<?=$row->id?>">
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
        <?php endforeach;?>
         
      </div>
                 
      </div>
    </div> <!-- End .row -->

<?php endif;?>
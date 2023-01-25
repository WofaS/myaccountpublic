<?php

use model\Auth;
?>

<div class="card-body">
                        
    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
      
      <div class="dataTable-container">

      <table class="table table-striped table-borderless border-bottom table-hover datatable dataTable-loading" >
      <thead>
        <tr class="bg-secondary text-light">
          <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">#</a></th>
          <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">Photo</a></th>
          <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter">Name</a></th>
          <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter"><i class="bx bxs-phone-incoming fw-bolder text-danger"></i> Phone</a></th>
          <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter"><i class="bi bi-pin-map fw-bolder text-danger"></i> Residence</a></th>
          <th scope="col" data-sortable="" ><a href="#" class="dataTable-sorter"><i class="bi bi-pin-map fw-bolder text-danger fw-bolder"></i> Local</a></th>
          <th scope="col" data-sortable="" ><a href="<?=ROOT?>/admin/users-view/tabular" class="dataTable-sorter">Action</a></th>
        </tr>
      </thead>
      <tbody>
          
          

        <?php $id = 0;?>
        <?php foreach ($row as $row):
          ?>

          <?php

              $dob = $row->dob;
              $today = date("Y-m-d");
              $diff = date_diff(date_create($dob), date_create($today));
              $age = $diff->format('%Yyrs.');
          ?>

          <?php if(!empty($row->category_id)):?>

          <?php if(!empty($row->position_id)): $id +=1;?>
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
          <strong class="badge bg-secondary"><?=$age?></strong>
        <?php endif;?>
          </td>
          <th><a href="<?=ROOT?>/admin/profile/<?=$row->id?>"><?=$row->firstname?> <?=$row->lastname?> <small class="fst-italic text-muted">(<?=ucfirst($row->role_name ?? '')?>)</small></a></th>
          <td><span class=""><?=$row->phone ?? 'Unknown'?></span></td>
          <td><p class="fst-italic"><?=$row->residence?></p></td>          
          <td><p class="fst-italic"><?=$row->category_id ?? 'Unknown'?></p></td>
          <td><span class="badge badge-lg">
            <a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
              <i class="bi bi-eye-fill"></i> 
            </a>

            <a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
              <i class="bi bi-pencil-square"></i> 
            </a>

            <a href="<?=ROOT?>/admin/delete/<?=$row->id?>">
              <i class="bi bi-trash-fill text-danger"></i>
            </a></span>
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
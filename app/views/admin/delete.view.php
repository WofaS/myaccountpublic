<?php $this->view('admin/admin-header',$data) ?>

  <?php
    
    $dob = $row->dob;
    $todayd = date("Y-m-d");
    $diff = date_diff(date_create($dob), date_create($todayd));
    $age = $diff->format('%Y');
    ?>   
    
    <div class="col-6 pt-4  mx-auto align-items-center shadow rounded bg-light">
    <form method="post" enctype="multipart/form-data" class="bg-light rounded">
      <center class="mb-4">
        <?php if(!empty($row->image)):?>
          <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
        <?php elseif($row->gender ==="female" AND $age < 13):?>
          <img src="<?=ROOT?>/assets/images/girl-avatar2.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
        <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
          <img src="<?=ROOT?>/assets/images/female.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
        <?php elseif($row->gender === "male" AND $age < 13):?>
          <img src="<?=ROOT?>/assets/images/boy-avatar2.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
          <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
          <img src="<?=ROOT?>/assets/images/male.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
        <?php endif;?><br>
        <h3 class="badge bg-secondary"><?=get_age()?></h3>
      </center>
      <table class="table  table-hover  col-12">
        <tbody class="bg-light shadow rounded text-left py-3" style="font-weight: bolder;">
          <?php if(!empty($row)):?>
                                    
            <tr >
              <th>NAME</th>
              <td><?=$row->firstname?> <?=$row->lastname?></td>
            </tr>
            <tr >
              <th>PHONE</th>
              <td><?=$row->phone?></td>
            </tr>
            <tr>
              <th>RESIDENCE</th>
              <td><?=$row->residence?></td>
            </tr>
            <tr>
              <th>Date Registered</th>
              <td><?=get_date($row->date)?></td>
            </tr>
            <?php else:?>
            <tr>
              <td>
                <div class="alert alert-danger text-center">
                  No records found
                </div>
              </td>
            </tr>          
        <?php endif;?>
        </tbody>
        <footer class="footer bg-secondary shadow rounded">
          <tr class="my-3">              
          <td class="col-3 float-start">
            <a href="<?=ROOT?>/admin/locals">
              <button type="button" class="btn btn-primary  float-start">Back</button>
            </a>
          </td>

          <td class="col-9">
              
              <?php if(user_can('delete_user')):?>
            <button onclick="alert('Are you sure you want to delete this?!')" type="submit" class="btn btn-danger float-end">Delete <?=$row->firstname?></button>
            <?php endif;?>
          </td>

          </tr>
        </footer>
        
        
      </table>
    
        
       </form> 
      </div>


<?php $this->view('admin/admin-footer',$data) ?>
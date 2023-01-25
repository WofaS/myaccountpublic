<?php $this->view('admin/admin-header',$data) ?>

<?php 

use model\Auth;

include('stat2.inc.php'); ?>

<div class="container bg-light rounded col-md-10 shadow p-2">
    <div class="row">
        <div class="col-11 mx-auto bg-light rounded">

            <div class="table-responsive mt-3">
                <?php if (!empty($rows)): ?>
                    <h4 class="text-center my-3 fw-bolder text-info" style="font-family: tahoma;"><u>Pending for <?= $event_date ?></u></h4>
                    <table class="table table-hover ">
                        <tr>                                        
                            <th>Sn</th> 
                            <th>Image</th>            
                            <th>Member Name</th>            
                            <th>Assembly</th>            
                            <th>Comment</th>            
                            <th>Remarks</th>            
                            <th class="no-print">Action</th>
                        </tr>     


                        <?php
                        $NO = 0;
                        foreach ($rows as $row):
                            $NO += 1;
                            ?>
                            <form method="POST">
                                <tr>
                                    <td><?= esc($NO) ?></td>
                                    <td>
                                        <a href="<?=ROOT?>/admin/profile/<?=$row->id?>" class="text-primary">
                                        <?php if (!empty($row->image)): ?>                  
                                        <img src="<?=get_profile_image($row->image)?>" alt="" style="width:80px;max-width:80px;height:80px;object-fit: SPAN;" class="rounded">          
                                        <?php elseif(!empty($row->gender)):?>
                                        <img src="<?=ROOT?>/assets/images/<?=$row->gender?>.jpg" alt="" style="width:80px;max-width:80px;height:80px;object-fit: SPAN;" class="rounded">
                                      <?php else:?>
                                        <img src="<?=ROOT?>/assets/images/no-image.jpg" alt="" style="width:80px;max-width:80px;height:80px;object-fit: SPAN;" class="rounded">
                                      <?php endif ;?></a>
                                    </td>

                                    <td><?= esc($row->firstname . ' ' . $row->lastname) ?></td>
                                    <td><?= esc($row->category_id) ?></td>

                                    <td>
                                        <select class="form-select selectric col-md-6" name="status" required>                                   
                                            <option value="PRESENT" selected="">PRESENT</option>
                                            <option value="ABSENT" >ABSENT</option>                                   
                                        </select>    
                                    </td>
                                    <td>
                                        <input value="<?=set_value('comment')?>" class="py-2 rounded" type="textarea" name="comment" placeholder="Give additional remarks" style="font-weight: lighter; color: darkblue;">      
                                    </td>
                                    <td class="no-print">
                                        <input type="hidden" name="member_id" value="<?= $row->id; ?>" />                            
                                        <button class="btn btn-sm btn-success"><i  class="bi bi-check fw-bolder"> Mark</i></button>
                                    </td>
                                </tr>
                            </form>
                        <?php endforeach; ?>


                    </table>

                    <hr>
                <?php endif; ?>
                <?php
// $pager->display(count($row));
                ?>
            </div>
        </div>

    </div>
    <div class="row col-12 mx-auto bg-light rounded">
        <div class="col-12 mx-auto bg-light rounded">
        <?php if(!empty($rows2)):?>
            <h4 class="text-center LucidaSans mt-3"><u>Marked Attendance for <?= $event_date ?></u></h4>
            <div class="col-md-11 mx-auto table-responsive mt-3">
                <div class="card pt-3 px-3 mb-4 col-8 mx-auto bg-light shadow">
                    <table class="table table-hover table-bordered bg-light table-responsive table-sm rounded table-striped">
                        
                        
                        <tr class="alert alert-info">                                        
                             
                            <th></th>            
                            <th>Male</th>            
                            <th>Female</th>           
                            <th>Total</th>
                        </tr> 
                        <tr>
                            <th focus="row">Present:</th>
                            <td><?=$total_present_male ? $total_present_male : 0?></td>
                            <td><?=$total_present_female ? $total_present_female : 0?></td>
                            <td><?=$total_present ? $total_present : 0?></td>

                        </tr>
                        <tr>
                            <th focus="row">Absent:</th>
                            <td><?=$total_absent_male ? $total_absent_male : 0?></td>
                            <td><?=$total_absent_female ? $total_absent_female : 0?></td>
                            <td><?=$total_absent ? $total_absent : 0?></td>

                        </tr>

                        <tr>
                            <th focus="row">Total Marked:</th>
                            <th class="border-bottom text-primary"><?=$total_male ? $total_male:0;?></th>
                            <th class="border-bottom text-primary"><?=$total_female ? $total_female:0;?></th>
                            <th class="border-bottom text-primary"><?=$total_attendance  ? $total_attendance :0;?></th>

                        </tr>
                    </table>
                </div>

                    <table class="table table-hover table-sm">
                        <tr>                                        
                            <th>Sn</th> 
                            <th>Image</th>            
                            <th>Name</th>            
                            <th>Assembly</th>            
                            <th>Comment</th>          
                            <th>Remarks</th>          
                            <th>Marked by</th>            

                        </tr>     
                        <?php
                        $NO = 0;
                        foreach ($rows2 as $row):
                            $NO += 1;
                            ?>
                            <tr>
                                <td><?= esc($NO) ?></td>
                                <td>
                                   <a href="<?=ROOT?>/admin/profile/<?=$row->member_id?>" class="text-primary">
                                    <?php if (!empty($row->image)): ?>                  
                                    <img src="<?=get_profile_image($row->image)?>" alt="" style="width:80px;max-width:80px;height:80px;object-fit: SPAN;" class="rounded">          
                                    <?php elseif(!empty($row->gender)):?>
                                    <img src="<?=ROOT?>/assets/images/<?=$row->gender?>.jpg" alt="" style="width:80px;max-width:80px;height:80px;object-fit: SPAN;" class="rounded">
                                  <?php else:?>
                                    <img src="<?=ROOT?>/assets/images/no-image.jpg" alt="" style="width:80px;max-width:80px;height:80px;object-fit: SPAN;" class="rounded">
                                  <?php endif ;?></a>
                                </td>

                                <td><?= esc($row->firstname . ' ' . $row->lastname) ?></td>
                                <td><?= esc($row->category_id) ?></td>
                                <td <?php
                                    if ($row->status == "PRESENT") {
                                        echo 'class="text-success text-center"';
                                    } else {
                                        echo 'class="text-danger text-center"';
                                    }
                                    ?>><?php echo $row->status; ?>
                                </td>

                                <td >
                                    <?php if(!empty($row->comment)):?>
                                        <p class="text-center text-muted fst-italic alert alert-info py-1"><?= $row->comment; ?></p>
                                    <?php endif;?>
                                </td>
                                
                                <td><?= $row->marked_by ?></td>

                            </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        

                    </table>
                <a  href="<?=ROOT?>/admin/register_info" ><button class="btn btn-danger float-end">  <i class="bx bxs-left-arrow-alt"></i> Back</button></a>
                <?php
// $pager->display(count($row));
                ?>
            </div>
        </div>
    </div>

</div>


<?php $this->view('admin/admin-footer',$data) ?>
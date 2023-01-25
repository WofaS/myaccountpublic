<?php $this->view('admin/admin-header',$data) ?>
<?php 

use model\Auth;

include('stat2.inc.php'); ?>

<div class="container bg-light rounded col-md-9 shadow p-2">
    <div class="row">
        <div class="col-11 mx-auto bg-light rounded">
          
            <div class="table-responsive mt-3">
                <?php if (!empty($rows2)): ?>
                  <h3 class="text-center LucidaSans mt-3 text-info"><u>Marked Attendance for <?= $event_date ?></u></h3>
                  <div class="card pt-3 px-3 mb-4 col-8 mx-auto bg-light shadow">
                    <?php if(!empty($rows2)):?>
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
                <?php endif; ?>

                    <table class="table table-hover ">
                        <?php if (!empty($_SESSION['MESSAGE'])): ?>
                            <center>
                                <div class="alert alert-success text-center"><b><?= Auth::getMessage(); ?></b></div>
                            </center>
                        <?php endif; ?>
                        <tr>                                        
                            <th>#</th> 
                            <th>Image</th>            
                            <th> Name</th>            
                            <th>Comment</th>        
                            <th>Remarks</th>        
                            <th>Marked by</th>        
                        </tr>     


                        <?php
                        $NO = 0;
                        foreach ($rows2 as $row):
                            $NO += 1;
                            ?>
                            <form method="POST">
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

                                    <td>

                                        <?php if($row->status === 'ABSENT'):?>
                                            <span class="form-control col-md-2 text-center alert alert-danger my-0 py-1"><?= $row->status  ? :'' ?></span>
                                        <?php else:?>
                                            <span class="form-control col-md-2 text-center text-success"><?= $row->status  ? :'' ?>
                                        <?php endif;?>
                                        </span>     
                                    </td>
                                    <td> 
                                    <?php if(!empty($row->comment)):?>
                                        <p class="text-center text-muted fst-italic alert alert-info py-1"><?= $row->comment; ?></p>
                                    <?php endif;?>   
                                    </td>
                                    <td><?= $row->marked_by ?></td>
                                </tr>
                            </form>
                        <?php endforeach; ?>


                    </table>

                    <a  href="<?=ROOT?>/admin/register_view_info" ><button class="btn btn-danger float-end"> <i class="bx bxs-left-arrow-alt"></i> Back</button></a>

                  <?php else: ?>
        <div class="alert alert-danger text-center mt-5">Record not found</div>
        <a  href="<?=ROOT?>/admin/register_view_info" ><button class="btn btn-danger "> <i class="fa fa-ban"></i> Cancel</button></a>
                  
                <?php endif; ?>

            </div>
        </div>
       
    </div>
    
</div>

<?php $this->view('admin/admin-footer',$data) ?>
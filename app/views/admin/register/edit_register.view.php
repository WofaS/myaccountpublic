<?php $this->view('admin/admin-header',$data) ?>
<?php 

use model\Auth;

include('stat2.inc.php'); ?>

<div class="container">
    <div class="row">
        <div class="container bg-light rounded col-md-9 shadow p-2">
          
            <div class="table-responsive mt-3 bg-light">
                <?php if (!empty($rows2)): ?>
                  <h4 class="text-center LucidaSans my-3 text-info"><u>Edit Marked Attendance for <?= $event_date ?></u></h4><hr>
                    <table class="table table-hover table-bordered table-sm">
                        <?php if (!empty($_SESSION['MESSAGE'])): ?>
                            <center>
                                <div class="alert alert-success text-center"><b><?= Auth::getMessage(); ?></b></div>
                            </center>
                        <?php endif; ?>
                        <tr>                                        
                            <th>Sn</th> 
                            <th>Image</th>            
                            <th>Member Name</th>            
                            <th>Comment</th>            
                            <th>Remarks</th>            
                            <th class="no-print">Action</th>
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
                                        <select class="form-select" name="status" required>                                   
                                            <option value="PRESENT" <?= $row->status == 'PRESENT' ? 'selected':'' ?>>PRESENT</option>
                                            <option value="ABSENT" <?= $row->status == 'ABSENT' ? 'selected':'' ?>>ABSENT</option>                                   
                                        </select>    
                                    </td>

                                    <td>
                                        <input value="<?=set_value('comment', $row->comment ? :'')?>" class="form-control py-2 rounded text-wrap text-center fst-italic alert alert-secondary py-1" type="textarea" name="comment" placeholder="Give additional remarks" style="font-weight: lighter; color: deepskyblue;">     
                                    </td>
                                    <td class="no-print">
                                        <input type="hidden" name="id" value="<?= $row->id; ?>" />                            
                                        <input type="hidden" name="name" value="<?= $row->firstname . ' ' . $row->lastname; ?>" />                            
                                        <button class="btn btn-sm btn-success"><i class="bi bi-check"> Mark</i></button>
                                    </td>
                                </tr>
                            </form>
                        <?php endforeach; ?>


                    </table>

                     <a  href="<?=ROOT?>/admin/register_edit_info" ><button class="btn btn-danger float-end">  <i class="bx bxs-left-arrow-alt"></i> Back</button></a>

                  <?php else: ?>
        <div class="alert alert-danger text-center mt-5">Record not found</div>
        <a  href="<?=ROOT?>/admin/register_edit_info" ><button class="btn btn-danger ">  <i class="bx bxs-left-arrow-alt"></i> Cancel</button></a>
                  
                <?php endif; ?>

            </div>
        </div>
       
    </div>
    
</div>

<?php $this->view('admin/admin-footer',$data) ?>
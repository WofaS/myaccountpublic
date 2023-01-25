<?php $this->view('admin/admin-header',$data) ?>

<?php

use model\Auth;

?>

<div class="container">
    <div class="row">
<div class="container-fluid border col-lg-4 col-md-6 mt-5 p-4 rounded" >
    <?php if (!empty($_SESSION['MESSAGE'])): ?>
                <center>
                    <div class="alert alert-success text-center"><b><?= Auth::getMessage(); ?></b></div>
                </center>
            <?php endif; ?> 
    <form method="post">
        <div class="mb-3 col-md-12">
            <label for="exampleFormControlInput1" class="form-label">Date of Event</label>
            <input value="<?= set_value('date') ?>" name="date" type="date" class="form-control <?= !empty($errors['date']) ? 'border-danger' : '' ?>" id="exampleFormControlInput1" placeholder="Date of Event" required="">
            <?php if (!empty($errors['date'])): ?>
                <small class="text-danger"><?= $errors['date'] ?></small>
            <?php endif; ?>

            <input value="<?= set_value('activity') ?>" name="activity" type="text" class="form-control mt-3 d-none <?= !empty($errors['activity']) ? 'border-danger' : '' ?>" id="exampleFormControlInput1" placeholder="Name of Event">
            <?php if (!empty($errors['activity'])): ?>
                <small class="text-danger"><?= $errors['activity'] ?></small>
            <?php endif; ?>
        </div>

        <br>
        <button class="btn btn-primary float-end"><i class="bi bi-forward"></i> Go</button>
        <a type="button" href="<?=ROOT?>/admin/dashboard" class="btn btn-danger"><i class="bi bi-x-circle"></i> Cancel</a>
    </form>
</div>
</div>
</div>

<?php $this->view('admin/admin-footer',$data) ?>
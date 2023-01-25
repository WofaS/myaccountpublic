 <?php
  use \Model\Auth;
  $app = get_app_details();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php if($app):?>
  <?php foreach($app as $row):?>
  <title><?=$row->appname?>|| <?=ucfirst(App::$page)?></title>
  <link href="<?=get_image($row->image)?>" rel="icon">
<?php endforeach;?>
<?php endif;?>
  <link rel="stylesheet" href="animation/style.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="niceadmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?=ROOT?>/admindash/vendor/toastr/css/toastr.min.css">

  <link href="niceadmin/assets/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="forms-container container-fluid">
      <div class="signin-signup">
        
        <form action="" method="post" class="sign-in-form">
          <div>
            <a href="<?=ROOT?>" class="logo d-flex align-items-center w-auto">
             <?php if($app):?>
              <?php foreach($app as $row):?> 
              <h2 class=""><img src="<?=get_image($row->image)?>" alt="App Logo"><?=$row->appname?></h2>
            <?php endforeach;?>
            <?php endif;?>
            </a>
          </div><!-- End Logo -->

           <?php if(message()):?>
          <div class="input-field alert alert-danger" style=" background: #ee6666; color: #ffecdf;">

            <input style="width:fit-content;"><h4 style="margin-top: 15px; padding:auto;"><?=message('', true)?></h4></input>
          </div>
          <?php endif;?>

          <?php if (!empty($errors['email'])):?>
            <div class="input-field" style=" background: #ee6666; color: #ffecdf;">

            <input style="width:fit-content;"><h3 style="margin-top: 15px; padding:auto;"><?=$errors['email']?></h3></input>
          </div>
          <?php endif;?>

          <h2 class="title">Log in</h2>
          <div class="input-field">
            <i class="bx bx-envelope" style="font-size:25px; font-weight: bolder; color:lightblue;"></i>
            <input type="text" placeholder="Email Address" name="email" value="<?=set_value('email')?>" required />
          </div>
          <div class="input-field">
            <i class="bx bx-lock" style="font-size:25px; font-weight: bolder; color:lightblue;"></i>
            <input type="password" placeholder="Password" name="password" value="<?=set_value('password')?>" required />
          </div>
          <input type="submit" value="Login" name="signin" class="btn solid" id="toastr-info-top-right"/>
        </form>
        
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <?php if($app):?>
          <?php foreach($app as $row):?> 
          <h1 style="color:red;">Welcome to <?=$row->appname?></h1>
          <p >
            This is a membership tracker app of <?=ucfirst($row->district_name ? : '(District name)')?> of <?=ucfirst($row->church_name ? : '(Church name)')?> - <?=ucfirst($row->area_name ? : '(Area name)')?> located @ <?=$row->location ? : '(Location)'?>. You are always welcome to worship with us.</p><br>
        <?php endforeach;?>
        <?php else:?>
          <h1>Welcome to to <?=APP_NAME?></h1>
          <p >
            This is a membership tracker app of <?=APP_NAME?>. You are always welcome to worship with us.</p><br>
        <?php endif;?>          

          <h4>Fill in your login credntials to view your dashboard</h4>
        </div>
        <img src="animation/img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="animation/app.js"></script>
  <script src="<?=ROOT?>/admindash/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?=ROOT?>/admindash/js/custom.min.js"></script>
  <script src="<?=ROOT?>/admindash/js/deznav-init.js"></script>

    <!-- Toastr -->
    <script src="<?=ROOT?>/admindash/vendor/toastr/js/toastr.min.js"></script>

    <!-- All init script -->
    <script src="<?=ROOT?>/admindash/js/plugins-init/toastr-init.js"></script>
</body>

</html>
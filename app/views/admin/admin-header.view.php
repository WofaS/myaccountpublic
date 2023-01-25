<style>
    
     *{
        font-family: tahoma;
      }

    .subnav ul li:hover{
      color: red;
      background-color: #00cfff;
      margin-left: 10px;
      font-size: 14px;
    }

    .subnav ul li{
      margin-left: 15px;
      font-size: 16px;
    }

    .subnav ul li span:hover{
          color: lightblue;

    }

    .subnav ul li span{
      margin-left: 12px;
      transition: 0.5s zoom-in;
      }

    .hide{
      display: none;
    }

  </style>

  <?php
  use \Model\Auth;
  $categories = get_categories();
  $members = get_members();
  $app = get_app_details();
  $admin = get_admin();
  $id = 0 ?? Auth::getId();

  $current_month_day=date("m-d");
  $current_month=date("m");

  $birthdays= "select count(id) as num from members where date_format(dob, '%m-%d')='{$current_month_day}'";
  $birthdaysToday = query_row($birthdays);

  $birthdays_Coming="select count(id) as num from members where date_format(dob, '%m') = '{$current_month}' AND date_format(dob, '%m-%d') > '{$current_month_day}'";
  $birthdaysToCome = query_row($birthdays_Coming);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php if($app):?>
  <?php foreach ($app as $row): ?>
  <title><?=ucfirst(App::$page)?>|| <?=$row->appname?></title>
  <!-- Favicons -->
  <link href="<?=get_image($row->image)?>" rel="icon">
  <link href="<?=ROOT?>/assets/images/imgbin-bible-study-second-epistle-to-the-corinthians-prayer-christianity-reading-man-reading-book-3FA5WzAwqm8FHNCGbxtbkw7SF.jpg" rel="apple-touch-icon">
<?php endforeach;?>
  <?php else:?>
  <title><?=ucfirst(App::$page)?>|| <?=APP_NAME?></title>
  <!-- Favicons -->
  <link href="<?=ROOT?>/assets/images/cop logo.png" rel="icon">
  <link href="<?=ROOT?>/assets/images/imgbin-bible-study-second-epistle-to-the-corinthians-prayer-christianity-reading-man-reading-book-3FA5WzAwqm8FHNCGbxtbkw7SF.jpg" rel="apple-touch-icon">
<?php endif;?>
  <link href="<?=ROOT?>/admindash/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
  <meta content="" name="description">
  <meta content="" name="keywords">

  

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=ROOT?>/niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=ROOT?>/admindash/vendor/chartist/css/chartist.min.css">

  <!-- Template Main CSS File -->
  <link href="<?=ROOT?>/niceadmin/assets/css/style.css" rel="stylesheet">
  <link href="<?=ROOT?>/assets/css/custom.css" rel="stylesheet">
  <script src="<?=ROOT?>/assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header main-wrapper" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <?php if($app):?>
      <?php foreach ($app as $row): ?>
        
      <div  class="logo d-flex align-items-center">
       <div class="col-6 mx-auto d-flex">
         <a class="logo d-flex mr-3" href="<?=ROOT?>/admin/dashboard">
        <img src="<?=get_image($row->image)?>" alt="">
        <span class="d-none d-md-block text-primary"><?=$row->appname?></span>
        </a>
       </div>
        <div class="d-flex mx-auto">
          <span class="d-none d-md-block text-primary mx-auto"><!-- <small style="font-size:10px; margin-bottom: -10px; font-weight: bolder;"><?=$row->church_name?></small> --><small style="font-size:12px; font-weight: thin;"><?=$row->district_name?></small></span>
        </div>
      </div>
      <?php endforeach ?>
      <?php else:?>
      <a href="<?=ROOT?>/admin/dashboard" class="logo d-flex align-items-center">
        <img src="<?=ROOT?>/assets/images/cop logo.png" alt="">
        <span class="d-none d-md-block text-primary"><?=APP_NAME?></span>
      </a>
    <?php endif;?>
      <i class="text-info bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <!-- <input type="text" name="query" placeholder="Search" title="Enter search keyword"> -->
        <input class="form-control search js-search" oninput="get_data(this.value)" type="text" name="query" placeholder="Type something to Search" title="Enter search" autocomplete="false">
        <button type="submit" title="Search"><i class="text-info bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <!-- <div class="search-bar">     
      <a href="<?=ROOT?>/admin/search">
        <button class="btn btn-outline-info" title="Search"><i class="text-info bi bi-search"></i><span>Click to search members</span></button>
      </a>
    </div> --><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="text-info bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown px-1">
          <!--  -->
         
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="text-info bi bi-bell" title="Birthdays Today"></i>
            <?php if($birthdaysToday['num'] >0):?>
            <span class="badge bg-success badge-number"><?=$birthdaysToday['num']?></span>
          <?php endif;?>
          </a><!-- End Notification Icon -->
        
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications rounded">
            <li class="dropdown-header mb-0 py-0 mb-2">
            
            <?php if($birthdaysToday['num'] === 1):?>
              <label class="alert alert-secondary fw-bolder rounded py-1">You have only <?=$birthdaysToday['num']?> new birthday celebrant today</label>
            <?php elseif($birthdaysToday['num'] > 1):?>
              <label class="alert alert-secondary fw-bolder rounded py-1">You have <?=$birthdaysToday['num']?> new birthday celebrants today</label>
            <?php if($birthdaysToday['num'] > 4):?>
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            <?php endif;?>
            <?php else:?>
              <label class="alert alert-secondary fw-bolder rounded py-1">You have no birthday celebrants today</label>
            <?php endif;?>
            </li>
            <li>
              <hr class="dropdown-divider mb-0">
            </li>

            <?php if(!empty($members)):?>
              <?php foreach($members as $row):?>            
                
                <?php
                  $mydob = get_date_month_day($row->dob);
                  $today = date('m d');

                  $dob = $row->dob;
                  $todayd = date("Y-m-d");
                  $diff = date_diff(date_create($dob), date_create($todayd));
                  $age = $diff->format('%Y');
                ?>
             <?php if($mydob ===$today):?>
              <li class="notification-item my-0"style="cursor: pointer;">       
                <a href="<?=ROOT?>/admin/notifications/<?=$row->firstname?>">
                  <div class="alert alert-danger d-flex mx-0 my-0 py-1">
                  <div class="col-2 mx-0">
                  <?php if(!empty($row->image)):?>
                  <img src="<?=get_profile_image($row->image)?>" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                <?php elseif($row->gender ==="female" AND $age < 13):?>
                  <img src="<?=ROOT?>/assets/images/girl-avatar2.jpg" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
                  <img src="<?=ROOT?>/assets/images/female-avatar.jpg" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                <?php elseif($row->gender === "male" AND $age < 13):?>
                  <img src="<?=ROOT?>/assets/images/boy-avatar2.jpg" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                  <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
                  <img src="<?=ROOT?>/assets/images/man-avatar.jpg" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                <?php endif;?>
                </div>
                <div class="col-10 float-end mx-0">         
                  <h4>Today is <?=$row->firstname?>'s birthday</h4>
                  <p>Happy birthday <?=$row->firstname?> <?=$row->lastname?> <small class="text-muted fst-italics fw-bolder"> (<?=$row->role_name?>)</small> of <?=$row->category_id?> assembly.We love you.<span class="fw-bolder ml-5"> <?=date('h:i:s')?></span></p>        
                </div>               
                </div>
                </a>               
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <?php endif;?>
                <?php endforeach;?>
                <li class="dropdown-footer">
                  <a href="<?=ROOT?>/admin/notifications">Show all notifications</a>
                </li>
              <?php endif;?>
            

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Birthdays today Notification Nav -->

        <!-- Birthdays tocome Notification Nav -->

        <li class="nav-item dropdown px-1">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="text-info bi bi-chat-left-text" title="Birthdays This month"></i>
          <?php if($birthdaysToCome['num'] >0):?>
            <span class="badge bg-danger badge-number"><?=$birthdaysToCome['num']?></span>
          <?php endif;?>
          </a><!-- End Notification Icon -->
        
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications rounded">
            <li class="dropdown-header mb-0 py-0 mb-2">
            
            <?php if($birthdaysToCome['num'] === 1):?>
              <label class="alert alert-secondary fw-bolder rounded py-1">You have only <?=$birthdaysToCome['num']?> pending birthday this month</label>
            <?php elseif($birthdaysToCome['num'] > 1):?>
              <label class="alert alert-secondary fw-bolder rounded py-1">You have <?=$birthdaysToCome['num']?> pending birthdays this month</label>
            <?php if($birthdaysToCome['num'] > 4):?>
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            <?php endif;?>
            <?php else:?>
              <label class="alert alert-secondary fw-bolder rounded py-1">You have no pending birthday this month</label>
            <?php endif;?>
            </li>
            <li>
              <hr class="dropdown-divider mb-0">
            </li>

            <?php if(!empty($members)):?>
              <?php foreach($members as $row):?>            
            <?php
              $mydob = get_date_month_day($row->dob);
              $today = date('m d');

              $mymonth = get_date_month($row->dob);
              $thismonth = date('m');

              $myday = get_date_day($row->dob);
              $thisday = date('d');

              $dob = $row->dob;
              $todayd = date("Y-m-d");
              $diff = date_diff(date_create($dob), date_create($todayd));
              $age = $diff->format('%Y');

              $daysMore = $myday - $thisday;
              ?>

             <?php if($mymonth ===$thismonth):?>
             <?php if($daysMore > 0 ):?>

              <li class="notification-item my-0"style="cursor: pointer;">
                 <a href="<?=ROOT?>/admin/notifications/<?=$row->firstname?>">
                   <div class="alert alert-info d-flex mx-0 my-0 py-1">
                  <div class="col-2 mx-0">
                 <?php if(!empty($row->image)):?>
                  <img src="<?=get_profile_image($row->image)?>" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                <?php elseif($row->gender ==="female" AND $age < 13):?>
                  <img src="<?=ROOT?>/assets/images/girl-avatar2.jpg" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
                  <img src="<?=ROOT?>/assets/images/female-avatar.jpg" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                <?php elseif($row->gender === "male" AND $age < 13):?>
                  <img src="<?=ROOT?>/assets/images/boy-avatar2.jpg" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                  <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
                  <img src="<?=ROOT?>/assets/images/man-avatar.jpg" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                <?php endif;?>
                </div>
                <div class="col float-end">         
                  <h4><?=$daysMore?> days to <?=$row->firstname?>'s birthday</h4>
                  <p><?=$row->firstname?> <?=$row->lastname?> <small class="text-muted fst-italics fw-bolder"> (<?=$row->role_name?>)</small> of <?=$row->category_id?> assembly will be <?=$age + 1?> on <?=get_date_month2($row->dob)?>.<br><span class="fw-bolder ml-5"> <?=date('h:i:s')?></span></p>        
                </div>
                </div>
                 </a>               
              </li>
              <?php endif;?>
              <?php endif;?>
              <?php endforeach;?>
              <li class="dropdown-footer">
                <a href="<?=ROOT?>/admin/notifications">Show all pending birthdays</a>
              </li>
            <?php endif;?>
            

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Birthdays to come Notification Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="<?=ROOT?>/admin/adminprofile" data-bs-toggle="dropdown">
  
           <!-- profile image -->         
            <?php if($admin):?>
            <?php foreach($admin as $row):?>
              <?php if( $row->id === Auth::getId()):?>
              <?php if(!empty($row->image) AND $row->id === Auth::getId()):?>
                
                <div style="width: 30px; height: 30px;">             
                  <img src="<?=get_profile_image($row->image)?>" alt=""style="width: 30px; height: 30px; border-radius: 50%;">
               </div>

              <?php else:?> 
                <div style="width: 30px; height: 30px;"style="width: 30px; height: 30px; border-radius: 50%;">
                      
                  <img src="<?=ROOT?>/assets/images/no-image.jpg" alt="" style="width: 30px; height: 30px; border-radius: 50%;">
                </div>
              <?php endif;?><!-- End of profile image -->
                    
              </div>
                    <span class="d-md-block dropdown-toggle ps-3"><?=ucfirst(substr($row->firstname,0,1))?>. <?=ucfirst($row->lastname)?></span>
              </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h5><?=$row->firstname?> <?=$row->lastname?></h5>
              <strong><?=$row->role_name?></strong>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=ROOT?>/admin/adminprofile">
                <i class="text-primary bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=ROOT?>/admin/operations">
                <i class="text-primary bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=ROOT?>/logout">
                <i class="text-primary bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>
          
          <?php endif;?>
          <?php endforeach;?>
          <?php endif;?>          

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      
      <?php if(user_can('view_dashboard')):?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=ROOT?>/admin/dashboard">
          <i class="text-info bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php endif;?> 

        <?php if(user_can('view_categories')):?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?=ROOT?>/admin/locals">
            <i class="text-info bi bi-people-fill" style="font-size: 18px;"></i>
            <span>Staff</span>
          </a>
        </li><!-- End Dashboard Nav -->
        <?php endif;?>

        <?php if(user_can('view_categories')):?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?=ROOT?>/admin/search">
            <i class="text-info bi bi-search" style="font-size: 18px;"></i>
            <span>search</span>
          </a>
        </li><!-- End Dashboard Nav -->
        <?php endif;?>

        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-navAttendance" data-bs-toggle="collapse" href="#">
          <i class="text-info bi bi-book-half" style="font-size: 18px;"></i><span>Attendance</span><i class="text-info bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="icons-navAttendance" class="subnav nav-content collapse " data-bs-parent="#sidebar-nav">

          <?php if(user_can('view_roles')):?>
            <li class="nav-item ">
              <a class="nav-link collapsed" href="<?=ROOT?>/admin/register_info">
                <i class="text-info bi bi-clipboard-check" style="font-size: 18px;"></i>
                <span>Mark Attendance</span>
              </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item ">
              <a class="nav-link collapsed" href="<?=ROOT?>/admin/register_edit_info">
                <i class="text-info bi bi-pencil-square" style="font-size: 18px;"></i>
                <span>Edit Attendance</span>
              </a>
            </li><!-- End Dashboard Nav --> 

            <li class="nav-item ">
              <a class="nav-link collapsed" href="<?=ROOT?>/admin/register_view_info">
                <i class="text-info bx bx-list-check" style="font-size: 18px;"></i>
                <span>View Attendance</span>
              </a>
            </li><!-- End Dashboard Nav -->       
          <?php endif;?>

        </ul>
      </li>

        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav3" data-bs-toggle="collapse" href="#">
          <i class="text-info bi bi-gear" style="font-size: 18px;"></i><span>Admin Operations</span><i class="text-info bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="icons-nav3" class="subnav nav-content collapse " data-bs-parent="#sidebar-nav">

          <?php if(user_can('view_roles')):?>
            
            <li class="nav-item ">
              <a class="nav-link collapsed" href="<?=ROOT?>/adminsignup">
                <i class="text-info bi bi-person-check" style="font-size: 18px;"></i>
                <span>Add Admin</span>
              </a>
            </li><!-- End Dashboard Nav --> 
              
              <li class="nav-item">
                <a class="nav-link collapsed" href="<?=ROOT?>/admin/categories">
                  <i class="text-info bi bi-list" style="font-size: 18px;"></i>
                  <span>List Branches</span>
                </a>
              </li><!-- End Dashboard Nav -->      
          <?php endif;?>

          <?php if(user_can('view_marital_status')):?>
            <li class="nav-item ">
              <a class="nav-link collapsed" href="<?=ROOT?>/admin/maritalstatus">
                <i class="text-info bi bi-gender-ambiguous" style="font-size: 18px;"></i>
                <span>Marital Statuses</span>
              </a>
            </li><!-- End Dashboard Nav -->      
          <?php endif;?>

          <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#icons-subnav" data-bs-toggle="collapse" href="#">
            <i class="text-info bi bi-gear-fill" style="font-size: 18px;"></i><span>App Settings</span><i class="text-info bi bi-chevron-down ms-auto"></i>
          </a>

            <ul id="icons-subnav" class="subnav nav-content collapse " data-bs-parent="#icons-nav3">


              <li class="nav-item ">
                <a class="nav-link collapsed" href="<?=ROOT?>/admin/roles">
                  <i class="text-info bx bxs-lock" style="font-size: 18px;"></i>
                  <span>Permissions</span>
                </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item ">
              <a class="nav-link collapsed" href="<?=ROOT?>/admin/operations">
                <i class="text-info bi bi-gear" style="font-size: 18px;"></i>
                <span>App Details</span>
              </a>
            </li><!-- End Dashboard Nav -->

            </ul>

          </li>

          <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#icons-subnav2" data-bs-toggle="collapse" href="#">
            <i class="text-info bi bi-gear" style="font-size: 18px;"></i><span>Position Settings</span><i class="text-info bi bi-chevron-down ms-auto"></i>
          </a>

            <ul id="icons-subnav2" class="subnav nav-content collapse " data-bs-parent="#icons-nav3"> 
               
            <li class="nav-item ">
              <a class="nav-link collapsed" href="<?=ROOT?>/admin/local_position">
                <i class="text-info bx bx-list-check" style="font-size: 18px;"></i>
                <span>Positions</span>
              </a>
            </li><!-- End Dashboard Nav -->

            </ul>

          </li>


        </ul>
      </li>

      <li class="nav-heading">Go to</li>       

        <li class="nav-item">
        <a class="nav-link collapsed" href="<?=ROOT?>/logout">
          <i class="text-info bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Home Nav -->
      
      </li><!-- End Icons Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <?php if(message()):?>
      <div class="row d-flex">
        <div class="col-lg-8 col-6 mx-auto"></div>
          <div class="news col-lg-4 col-md-6 col-sm-6 mx-auto">
            <div class="alert alert-success alert-dismissible fade show d-flex" role="alert" >
              <i class="bi bi-check-circle me-3 fs-4 fw-bolder d-flex float-start"></i>
              <?=message('', true)?> 
              <button type="button" class="btn-close float-end " data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
      </div>
    <?php endif;?>
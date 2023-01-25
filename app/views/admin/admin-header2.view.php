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

  $birthdays_Belated="select count(id) as num from members where date_format(dob, '%m') = '{$current_month}' AND date_format(dob, '%m-%d') < '{$current_month_day}'";
  $birthdaysBelated = query_row($birthdays_Belated);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=ROOT?>/niceadmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?=ROOT?>/admindash/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <!-- Datatable -->
    <link href="<?=ROOT?>/admindash/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
	<link href="<?=ROOT?>/admindash/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?=ROOT?>/admindash/css/style.css" rel="stylesheet">
	
	<link href="<?=ROOT?>/admindash/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=ROOT?>/admindash/vendor/chartist/css/chartist.min.css">	
    <link href="<?=ROOT?>/admindash/css/style.css" rel="stylesheet">
	<meta property="og:description" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
    <?php if($app):?>
 <?php foreach ($app as $row): ?>

    <title><?=ucfirst(App::$page)?>|| <?=$row->appname?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=get_image($row->image)?>">
    <?php endforeach;?>
  <?php endif;?>

    <!-- Datatable -->
    <link href="<?=ROOT?>/admindash/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=ROOT?>/assets/css/custom.css" rel="stylesheet">  
  <script src="<?=ROOT?>/assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
        <?php if($app):?>
      	<?php foreach ($app as $row): ?>
            <a href="#" class="brand-logo">
                <img src="<?=get_image($row->image)?>" alt="" style="width: 50px; max-width: 50px; max-height: 50px; margin-left: 10px; margin-right: 5px;">
                
			<h2 class="d-none d-md-block fs-2 fw-boler"><?=$row->appname?></h2>
            </a>

      <?php endforeach; ?>
      <?php endif; ?>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		<div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">
				<ul class="nav nav-tabs mx-auto">
					
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#alerts">Birthdays
			            <span class="badge bg-success badge-number px-1 py-0"><?=$birthdaysToday['num']?></span>
			      		</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#chat">Pending & Belated
			            <span class="badge bg-success py-0 px-1 badge-number"><?=$birthdaysToCome['num']+$birthdaysBelated['num']?></span>
			        	</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active show" id="chat" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
							<div class="card-header chat-list-header text-center">
								<a href="#">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"></rect></g>
									</svg>
								</a>
								<div>
									<h6 class="mb-1">Birthdays List</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="#">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g>
									</svg>
								</a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
								<ul class="contacts">
									<li class="name-first-letter">Upcoming Birthdays <small class="text-muted">This Month</small><span class="badge bg-danger py-0 px-1 badge-number mx-2"><?=$birthdaysToCome['num']?></span></li>
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
						              $daysAgo = $thisday - $myday;
						              ?>

						             <?php if($mymonth ===$thismonth):?>
						             <?php if($daysMore > 0 ):?>
									<li class="active dz-chat-user">
											
                 						<a href="<?=ROOT?>/admin/notifications/<?=$row->firstname?>">
										<div class="d-flex bd-highlight">
                 							<div class="img_cont">
												<?php if(!empty($row->image)):?>
							                  <img src="<?=get_profile_image($row->image)?>" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                
							                <?php else:?>
							                  <div class="img_cont info mx-auto text-center" style="font-size:17px;"><?=ucfirst(substr($row->firstname,0,1))?> <?=ucfirst(substr($row->lastname,0,1))?></div>
							                <?php endif;?>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span><?=$row->firstname?> <?=$row->lastname?></span>
												<p><?=$daysMore?> days to <?=$row->firstname?>'s birthday</p>
												<p><?=$row->firstname?> <?=$row->lastname?> <small class="text-muted fst-italics fw-bolder"> (<?=$row->role_name?>)</small> of <?=$row->category_id?> assembly will be <?=$age + 1?> on <?=get_date_month2($row->dob)?>.<br><span class="fw-bolder ml-5"> <?=date('h:i:s')?></span></p>
											</div>
										</div>
										</a>
									</li>
									<?php endif;?>
						              <?php endif;?>
						              <?php endforeach;?>
									
									<li class="name-first-letter mb-5"></li>

									<li class="name-first-letter">Belated Birthdays <small class="text-muted">This Month</small><span class="badge bg-danger py-0 px-1 badge-number mx-2"><?=$birthdaysBelated['num']?></span></li>
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
						              $daysAgo = $thisday - $myday;
						              ?>

						             <?php if($mymonth ===$thismonth): $num = 0;?>
						             <?php if($daysAgo > 0 ):$num+=1;?>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
                 							<div class="img_cont">
											<?php if(!empty($row->image)):?>
							                  <img src="<?=get_profile_image($row->image)?>" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                
							                <?php else:?>
							                  <div class="img_cont info mx-auto text-center" style="font-size:17px;"><?=ucfirst(substr($row->firstname,0,1))?> <?=ucfirst(substr($row->lastname,0,1))?></div>
							                <?php endif;?>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span><?=$row->firstname?> <?=$row->lastname?></span>
												<p><?=$daysAgo?> days ago</p>
												<p><?=$row->firstname?> was <?=$age + 1?> yrs old.</p>
											</div>
										</div>
									</li>

						              <?php endif;?>
						              <?php endif;?>
						              <?php endforeach;?>
						              <?php endif;?>
									
								</ul>
							</div>
						</div>
						
					</div>
					<div class="tab-pane fade" id="alerts" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card">
							<div class="card-header chat-list-header text-center">
								<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
								<div>
									<h6 class="mb-1">Birthday Celebrants</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
								<ul class="contacts">
									<li class="name-first-letter">Birthdays <small class="text-muted">Today</small><span class="badge bg-danger py-0 px-1 badge-number mx-2"><?=$birthdaysToday['num']?></span></li>
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
						                ?>
						             <?php if($mydob ===$today):?>

									<li class="dz-chat-user">
											
						                <a href="<?=ROOT?>/admin/notifications/<?=$row->firstname?>">
										<div class="d-flex bd-highlight">
						                 	<div class="img_cont">
											<?php if(!empty($row->image)):?>
							                  <img src="<?=get_profile_image($row->image)?>" style="object-fit:cover; width: 40px;max-width: 40px; max-height: 40px; height: 40px; border-radius: 50%;" alt="">
                
							                <?php else:?>
							                  <div class="img_cont info mx-auto text-center" style="font-size:17px;"><?=ucfirst(substr($row->firstname,0,1))?> <?=ucfirst(substr($row->lastname,0,1))?></div>
							                <?php endif;?>
												<span class="online_icon online"></span>
											</div>
											<div class="user_info">
												<span><?=$row->firstname?> <?=$row->lastname?></span>
												<p>Today </p>
												<p><?=$row->firstname?> is <?=$age + 1?> yrs old.</p>
											</div>
										</div>
										</a>
									</li>
									
					                <?php endif;?>
					                <?php endforeach;?>
					                <?php endif;?>
								</ul>
							</div>
							<div class="card-footer"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="input-group search-area right d-lg-inline-flex d-none"style="width:500px;">
								<input type="text" class="form-control" placeholder="Find something here..." >
								<div class="input-group-append">
									<span class="input-group-text">
										<a href="javascript:void(0)">
											<i class="flaticon-381-search-2"></i>
										</a>
									</span>
								</div>
							</div>
                        </div>
                        <ul class="navbar-nav header-right main-notification">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="#">
									<i id="icon-light" class="fa fa-sun-o text-warning" title="Light theme-mode"></i>
                                    <i id="icon-dark" class="fa fa-moon-o" title="Dark theme-mode"></i>
                                </a>
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-fullscreen" href="#" title="fullscreen mode">
                                    <svg id="icon-full" viewbox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                                    <svg id="icon-minimize" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                                </a>
							</li>

							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell bell-link" href="javascript:void(0)" title="Birthdays Notications">
                                    <svg width="24" height="24" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22.4605 3.84888H5.31688C4.64748 3.84961 4.00571 4.11586 3.53237 4.58919C3.05903 5.06253 2.79279 5.7043 2.79205 6.3737V18.1562C2.79279 18.8256 3.05903 19.4674 3.53237 19.9407C4.00571 20.4141 4.64748 20.6803 5.31688 20.6811C5.54005 20.6812 5.75404 20.7699 5.91184 20.9277C6.06964 21.0855 6.15836 21.2995 6.15849 21.5227V23.3168C6.15849 23.6215 6.24118 23.9204 6.39774 24.1818C6.5543 24.4431 6.77886 24.6571 7.04747 24.8009C7.31608 24.9446 7.61867 25.0128 7.92298 24.9981C8.22729 24.9834 8.52189 24.8863 8.77539 24.7173L14.6173 20.8224C14.7554 20.7299 14.918 20.6807 15.0842 20.6811H19.187C19.7383 20.68 20.2743 20.4994 20.7137 20.1664C21.1531 19.8335 21.4721 19.3664 21.6222 18.8359L24.8966 7.05011C24.9999 6.67481 25.0152 6.28074 24.9414 5.89856C24.8675 5.51637 24.7064 5.15639 24.4707 4.84663C24.235 4.53687 23.931 4.28568 23.5823 4.11263C23.2336 3.93957 22.8497 3.84931 22.4605 3.84888ZM23.2733 6.60304L20.0006 18.3847C19.95 18.5614 19.8432 18.7168 19.6964 18.8275C19.5496 18.9381 19.3708 18.9979 19.187 18.9978H15.0842C14.5856 18.9972 14.0981 19.1448 13.6837 19.4219L7.84171 23.3168V21.5227C7.84097 20.8533 7.57473 20.2115 7.10139 19.7382C6.62805 19.2648 5.98628 18.9986 5.31688 18.9978C5.09371 18.9977 4.87972 18.909 4.72192 18.7512C4.56412 18.5934 4.4754 18.3794 4.47527 18.1562V6.3737C4.4754 6.15054 4.56412 5.93655 4.72192 5.77874C4.87972 5.62094 5.09371 5.53223 5.31688 5.5321H22.4605C22.5905 5.53243 22.7188 5.56277 22.8353 5.62076C22.9517 5.67875 23.0532 5.76283 23.1318 5.86646C23.2105 5.97008 23.2642 6.09045 23.2887 6.21821C23.3132 6.34597 23.308 6.47766 23.2733 6.60304Z" fill="#EB8153"></path>
										<path d="M7.84173 11.4233H12.0498C12.273 11.4233 12.4871 11.3347 12.6449 11.1768C12.8027 11.019 12.8914 10.8049 12.8914 10.5817C12.8914 10.3585 12.8027 10.1444 12.6449 9.98661C12.4871 9.82878 12.273 9.74011 12.0498 9.74011H7.84173C7.61852 9.74011 7.40446 9.82878 7.24662 9.98661C7.08879 10.1444 7.00012 10.3585 7.00012 10.5817C7.00012 10.8049 7.08879 11.019 7.24662 11.1768C7.40446 11.3347 7.61852 11.4233 7.84173 11.4233Z" fill="#EB8153"></path>
										<path d="M15.4162 13.1066H7.84173C7.61852 13.1066 7.40446 13.1952 7.24662 13.3531C7.08879 13.5109 7.00012 13.725 7.00012 13.9482C7.00012 14.1714 7.08879 14.3855 7.24662 14.5433C7.40446 14.7011 7.61852 14.7898 7.84173 14.7898H15.4162C15.6394 14.7898 15.8535 14.7011 16.0113 14.5433C16.1692 14.3855 16.2578 14.1714 16.2578 13.9482C16.2578 13.725 16.1692 13.5109 16.0113 13.3531C15.8535 13.1952 15.6394 13.1066 15.4162 13.1066Z" fill="#EB8153"></path><span class="badge bg-dark py-0 px-1 badge-number mx-0" style="margin-left: -10px; margin-top:-5px;"><?=$birthdaysToday['num']+$birthdaysToCome['num']+$birthdaysBelated['num']?></span>
									</svg>
									
                                </a>
							</li>
							
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="<?=ROOT?>/admin/viewadmin/<?=Auth::getId()?>" role="button" data-toggle="dropdown"><!-- profile image -->         
					            <?php if($admin):?>
					            <?php foreach($admin as $row):?>
					              <?php if( $row->id === Auth::getId()):?>
					              <?php if(!empty($row->image) AND $row->id):?>
					                
					                <div style="width: 30px; height: 30px;">             
					                  <img src="<?=get_profile_image($row->image)?>" alt=""width="20" style="border-radius: 50%;">
					               </div>

					              <?php else:?> 
					                <div style="width: 30px; height: 30px;"width="20" style="border-radius: 50%;">
					                      
					                  <img src="<?=ROOT?>/assets/images/no-image.jpg" alt="" width="20" style="border-radius: 50%;">
					                </div>
					              <?php endif;?><!-- End of profile image -->

									<div class="header-info">
										<span><?=ucfirst(substr($row->firstname,0,1))?>. <?=ucfirst($row->lastname)?></span>
										<small><?=ucfirst($row->role_name)?></small>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="<?=ROOT?>/admin/viewadmins/<?=Auth::getId()?>" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="<?=ROOT?>/admin/operations" class="dropdown-item ai-icon">
                                        <i class="bi bi-gear"></i>
                                        <span class="ml-2">Admin Settings </span>
                                    </a>
                                    <a href="<?=ROOT?>/logout" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            
				              <?php endif;?>
				              <?php endforeach;?>
				              <?php endif;?>

                            </li>
                        </ul>
                    </div>
                </nav>
				<div class="sub-header">
					<div class="d-flex align-items-center flex-wrap mr-auto">
						<h5 class="dashboard_bar">Dashboard</h5>
					</div>
				</div>
			</div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<div class="main-profile">
					<div class="image-bx">
						<?php foreach($admin as $row):?>
			              <?php if( $row->id === Auth::getId()):?>
			              <?php if(!empty($row->image) AND $row->id):?>          
			                  <img src="<?=get_profile_image($row->image)?>" alt=""width="20" style="border-radius: 50%;">

			              <?php else:?> 			                      
			                  <img src="<?=ROOT?>/assets/images/no-image.jpg" alt="" width="20" style="border-radius: 50%;">
			              <?php endif;?>
			             
					</div>
					<h5 class="name"><span class="font-w400">Hello,</span> <?=ucfirst($row->firstname)?></h5>
					<p class="email"><a href="<?=ROOT?>/admin/dashboard2//cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="95f8f4e7e4e0f0efefefefd5f8f4fcf9bbf6faf8">[<?=$row->email?>&#160;protected]</a></p>

					<?php endif;?>
			       <?php endforeach;?>
				</div>
				<ul class="metismenu" id="menu">
					<li class="nav-label first">Main Menu</li>
                    <li><a  href="<?=ROOT?>/admin/dashboard2" aria-expanded="false">
							<i class="text-info flaticon-144-layout"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                	
                	<?php if(user_can('view_categories')):?>
			        <li class="nav-item">
			          <a class="nav-link collapsed" href="<?=ROOT?>/admin/locals">
			            <i class="text-info bi bi-people-fill" style="font-size: 18px;"></i>
			            <span>Members</span>
			          </a>
			        </li><!-- End Dashboard Nav -->
			        <?php endif;?>

			        <?php if(user_can('view_categories')):?>
			        <li class="nav-item">
			          <a class="nav-link collapsed" href="<?=ROOT?>/admin/groups">
			            <i class="text-info bx bxl-mailchimp" style="font-size: 24px;"></i>
			            <span>Groups</span>
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

			        <?php if(user_can('view_categories')):?>
			        <li class="nav-item">
			          <a class="nav-link collapsed" href="<?=ROOT?>/admin/datatable">
			            <i class="text-info bi bi-search" style="font-size: 18px;"></i>
			            <span>Datatable</span>
			          </a>
			        </li><!-- End Dashboard Nav -->
			        <?php endif;?>

                    <li><a class="has-arrow ai-icon" href="<?=ROOT?>/admin/dashboard2/javascript:void()" aria-expanded="false">
							<i class="text-info bi bi-book-half"></i>
							<span class="nav-text">Attendance</span>
						</a>
                        <ul aria-expanded="false">
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

                    <li><a class="has-arrow ai-icon" href="<?=ROOT?>/admin/dashboard2/javascript:void()" aria-expanded="false">
							 <i class="text-info bi bi-gear" style="font-size: 18px;"></i>
							 <span>Operations</span>
						</a>
                        <ul aria-expanded="false">
                            <?php if(user_can('view_roles')):?>
					            <li class="nav-item ">
					              <a class="nav-link collapsed" href="<?=ROOT?>/admin/operations">
					                <i class="text-info bi bi-gear" style="font-size: 18px;"></i>
					                <span>App Details</span>
					              </a>
					            </li><!-- End Dashboard Nav -->
					            <li class="nav-item ">
					              <a class="nav-link collapsed" href="<?=ROOT?>/admin/roles">
					                <i class="text-info bx bxs-lock" style="font-size: 18px;"></i>
					                <span>Permissions</span>
					              </a>
					            </li><!-- End Dashboard Nav --> 
					              
					              <li class="nav-item">
					                <a class="nav-link collapsed" href="<?=ROOT?>/admin/categories">
					                  <i class="text-info bi bi-list" style="font-size: 18px;"></i>
					                  <span>List Locals</span>
					                </a>
					              </li><!-- End Dashboard Nav --> 

					            <li class="nav-item ">
					              <a class="nav-link collapsed" href="<?=ROOT?>/admin/districtposition">
					                <i class="text-info bx bx-list-check" style="font-size: 18px;"></i>
					                <span>Dist. Positions</span>
					              </a>
					            </li><!-- End Dashboard Nav -->    
					            <li class="nav-item ">
					              <a class="nav-link collapsed" href="<?=ROOT?>/admin/local_position">
					                <i class="text-info bx bx-list-check" style="font-size: 18px;"></i>
					                <span>Local Positions</span>
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
                            <li><a href="<?=ROOT?>/admin/dashboard2/page-lock-screen.html">Lock Screen</a></li>
                        </ul>
                    </li>
                </ul>
				<div class="copyright">
					<?php foreach($app as $row):?>				    
					<p>
						<strong> <?=$row->appname?> Admin Dashboard</strong> &copy;<?=date('Y')?> All Rights Reserved
					</p>
					<p class="fs-12">Contact developer 
						<span class="social-links">
						<span href="#" class="facebook" title="0548214842"><i class=" text-info bi bi-whatsapp"></i></span>
						<span href="#" class="facebook" title="0548214842"><i class=" text-info bi bi-telephone"></i></span>
						</span>
					</p>
				<?php endforeach;?>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
<?php $this->view('admin/admin-header',$data) ?>
<?php

use model\Auth;
  $categories = get_categories();
  $members = get_members();

  $current_month_day=date("m-d");
  $current_month=date("m");

  $birthdays= "select count(id) as num from members where date_format(dob, '%m-%d')='{$current_month_day}'";
  $birthdaysToday = query_row($birthdays);

  $birthdays_Coming="select count(id) as num from members where date_format(dob, '%m') = '{$current_month}' AND date_format(dob, '%m-%d') > '{$current_month_day}'";
  $birthdaysToCome = query_row($birthdays_Coming);


 include('stat.inc.php')
?>

  <style>
    
     *{
        font-family: tahoma;
      }
    form{
      margin: auto;
      width: 600px;
      padding: 10px;
      border-radius: 10px;
    }

    .search-div span{
      margin: auto;
      width: 40%;
      padding: 10px;
      border-radius: 10px;
    }

    center{
      color: #6fd1ee;
      font-size: 14px;
      font-family: sans-serif;
    }

    .search-div{
      margin: auto;
      width: 850px;
      padding: 10px;
      display: flex;
      flex-direction: row;
     /* box-shadow: 0px 0px 10px #aaa;*/
      border-radius: 10px;
    }

    .search{
      width: 90%;
      padding: 10px;
      border-radius: 10px;
      border: solid thin #aaa;
      outline: none;
    }

    .results{
      width: 90%;
      padding-top: 4px;
      border: solid thin #eee;
      border-radius: 10px;
      outline: none;
    }

    .results div:hover{
      color: white;
      background-color: #00cfff;
    }

    .hide{
      display: none;
    }

  </style>

    
    <div class="col-3 search-div float-left mb-2">
      <form>
        <div class="results js-results hide">
        <div>
          
        </div>
        </div>
      </form>
    </div>
    <div class="col-7"></div>

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=ROOT?>">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    <section class="section dashboard">
      <div class="row">



            <!-- Recently Registered Swipper -->
              <div class="card">

                <div class="card-body ">
                  <p class="card-title mx-0 px-0">Recently Registered <span>/This Month</span><span class="badge bg-danger text-white mx-3"><?=$resAllMembers['num']?></span></p>
              <div class="testimonial-one px-4 owl-right-nav owl-carousel owl-loaded owl-drag">
                <?php if(!empty($members)):$num = 0;?>
                        <?php foreach($members as $row):$num+=1;?>            
                      <?php
                        $myday = get_date_month_day($row->dob);
                        $today = date('m d');

                        $mymonth = get_date_month($row->date);
                        $thismonth = date('m');

                        $dob = $row->dob;
                        $todayd = date("Y-m-d");
                        $diff = date_diff(date_create($dob), date_create($todayd));
                        $age = $diff->format('%Y');
                        ?>
                <div class="items my-0 bg-light rounded shadow px-0">

                  <a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
                    <div class="text-center my-0 px-3" style="height:220px;">
                      <small class="card-title" style="font-size: 12px;"><?=$num?></small>
                      <?php if(!empty($row->image)):?>
                      <img style="height: 80px; max-height: 80px; max-width:80px;" src="<?=get_profile_image($row->image)?>" alt=""class="mb-0 mx-auto rounded">
                    <?php elseif($row->gender ==="female" AND $age < 13):?>
                      <img style="height: 80px; max-height: 80px; max-width:80px;" src="<?=ROOT?>/assets/images/girl-avatar2.jpg" alt=""class="mb-0 mx-auto rounded">
                    <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
                      <img style="height: 80px; max-height: 80px; max-width:80px;" src="<?=ROOT?>/assets/images/female.jpg" alt=""class="mb-0 mx-auto rounded">
                    <?php elseif($row->gender === "male" AND $age < 13):?>
                      <img style="height: 80px; max-height: 80px; max-width:80px;" src="<?=ROOT?>/assets/images/boy-avatar2.jpg" alt=""class="mb-0 mx-auto rounded">
                      <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
                      <img style="height: 80px; max-height: 80px; max-width:80px;" src="<?=ROOT?>/assets/images/male.jpg" alt=""class="mb-0 mx-auto rounded">
                    <?php endif;?>
                    <p style="margin-top:-10px; position: fixed;" class="badge bg-secondary text-light"><span>age <?=$age?></span></p>
                    <h5 class="mb-0 card-title text-info" style="font-size: 15px;"><?=$row->firstname?> <?=$row->lastname?><br> <span class="mb-0"><?=$row->category_id?></span></h5>
                   
                  </div>
                </a>
                </div>
              <?php endforeach;?>
              <?php endif;?>
              </div>                    
              </div>
            </div> <!--End Recently Registered Swipper -->

        <!-- Left side columns -->
        <div class="col-lg-9">
          <div class="row">
          
          <div class="row admin-members">        

            <!-- Admin Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">

                  <a class="icon" href="<?=ROOT?>/admin/admin" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>                  
                <a href="<?=ROOT?>/admin/admin">
                  <div class="card-body">
                  <h5 class="card-title">Admin <span class=""></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="col-3 card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div>
                    <div class="ps-3">

                        <h6><?=$resAdmin['num'] ?? 0?></h6>
                    </div>
                  </div>
                </div>
                </a>

              </div>
            </div><!-- End Admin Card -->

            <!-- User Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <a href="<?=ROOT?>/admin/locals">
                  <div class="card-body">
                  <h5 class="card-title">Users <span class=""></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-fill"></i>
                    </div>
                    <div class="ps-3">

                        <h6><?=$resUsers['num'] ?? 0?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div><!-- End User Card -->
            </div>

            <!-- Members stats Card -->
            <div class="row rounded pt-3 mb-3">
            <div class="col-xxl-6 col-6">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <a href="<?=ROOT?>/admin/locals">
                  <div class="card-body">
                  <h5 class="card-title">Members <span class=""></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">

                        <h6><?=$resMember['num'] ?? 0?></h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->
                    </div>
                  </div>

                </div>
                </a>
              </div>

            </div><!-- End Officers Card -->

            <!-- Officers Card -->
            <div class="col-xxl-6 col-6">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Officers</h6>
                    </li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Elds</label><span class="col-6 text-info"><?=$resElder['num'] ?? 0?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Dcns.</label><span class="col-6 text-info"><?=$resDeacon['num'] ?? 0?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Dcnss.</label><span class="col-6 text-info"><?=$resDeaconess['num'] ?? 0?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Admins</label><span class="col-6 text-info"><?=$resAdmin['num'] ?? 0?></span></a></li>
                    <li><a class="dropdown-item" href="#"><label class="col-6">Total</label><span class="col-6 text-info"><?=$totalOfficers ?? 0?></span></a></li>
                  </ul>
                </div>

                <a href="<?=ROOT?>/admin/groups">
                  <div class="card-body">
                  <h5 class="card-title">Officers <span class=""></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      

                        <h6><?=$totalOfficers ?? 0?></h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
 -->
                    </div>
                  </div>

                </div>
                </a>
              </div>

            </div><!-- End Officers Card -->

            <!-- Children Card -->
            <div class="col-xxl-6 col-6">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <a href="<?=ROOT?>/admin/groups">
                <div class="card-body">
                  <h5 class="card-title">Children <span class=""></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bx bx-run text-primary"></i>
                    </div>
                    <div class="ps-3">

                        <h6><?=$resChild['num'] ?? 0?></h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
 -->
                    </div>
                  </div>

                </div>
              </a>
              </div>

            </div><!-- End Children Card -->

            <!-- Visitors Card -->
            <div class="col-xxl-6 col-6">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

               <a href="<?=ROOT?>/admin/groups">
                <div class="card-body">
                  <h5 class="card-title">Visitors <span class=""></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-group-fill text-primary"></i>
                    </div>
                    <div class="ps-3">

                        <h6><?=$resVisitor['num'] ?? 0?></h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
 -->
                    </div>
                  </div>

                </div>
              </a>
              </div>

            </div><!-- End Visitors Card -->
            </div>

            <div class="row attendance" style="background:##f6f6fe;">          

            <!-- Attendance Card -->
            <div class=" col">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Members</h6>
                          </li>

                          <li><a class="dropdown-item" href="#"><label class="col-6">Users </label><span class="col-6 text-primary fw-bold"><?=$resUsers['num']?></span></a></li>
                          <li><a class="dropdown-item" href="#"><label class="col-6">Admin </label><span class="col-6 text-primary fw-bold"><?=$resAdmin['num']?></span></a></li>
                          <li><a class="dropdown-item" href="#"><label class="col-6">Membs. </label><span class="col-6 text-primary fw-bold"><?=$resMember['num']?></span></a></li>
                          <li><a class="dropdown-item" href="#"><label class="col-6">Elds </label><span class="col-6 text-primary fw-bold"><?=$resElder['num']?></span></a></li>
                          <li><a class="dropdown-item" href="#"><label class="col-6">Dcnss. </label><span class="col-6 text-primary fw-bold"><?=$resDeaconess['num']?></span></a></li>
                          <li><a class="dropdown-item" href="#"><label class="col-6">Dcns. </label><span class="col-6 text-primary fw-bold"><?=$resDeacon['num']?></span></a></li>
                          <li><a class="dropdown-item" href="#"><label class="col-6">Children </label><span class="col-6 text-primary fw-bold"><?=$resChild['num']?></span></a></li>
                          <li><a class="dropdown-item" href="#"><label class="col-6">Visitors </label><span class="col-6 text-primary fw-bold"><?=$resVisitor['num']?></span></a></li>
                          <li><a class="dropdown-item" href="#"><label class="col-6">Ps. & Wife </label><span class="col-6 text-primary fw-bold">2</span></a></li>
                          <li><a class="dropdown-item" href="#"><label class="col-6 fw-bolder text-danger">TOTAL </label><span class=" col-6 text-danger fw-bold" style="border-bottom:2px solid red"><?=$resAllMembers['num']?></span></a></li>
                        </ul>
                </div>                  
                <div class="card-body">
                  <h5 class="card-title">Total Registered Members <span class="">Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div>
                    <div class="ps-3">
                      

                        <h6><?=$resAllMembers['num'] ?? 0?></h6>
                     <!--  <span class="text-success small pt-1 fw-bold">8%</span><span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>

                </div>

              </div>
            </div><!-- End Admin Card -->
            </div>

            <!-- Reports -->
             <div class="">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Registered Members By Locals <span>/As @ today <?=date('jS M, Y H:ia')?></span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <?php

                  $array["Buko"] = $resBuko['num'] ? : 0;
                  $array["Cent."] = $resCentral['num'] ? : 0;
                  $array["D/S.1"] = $resDuadaso1['num'] ? : 0;
                  $array["D/S.2"] = $resDuadaso2['num'] ? : 0;
                  $array["Duna."] = $resDunamis['num'] ? : 0;
                  $array["Elsh."] = $resElshadai['num'] ? : 0;
                  $array["Eng."] = $resEnglish['num'] ? : 0;
                  $array["Glo."] = $resGlorious['num'] ? : 0;
                  $array["Jam."] = $resJamera['num'] ? : 0;
                  $array["Kab."] = $resKabile['num'] ? : 0;
                  $array["Lat. R."] = $resLatterRain['num'] ? : 0;
                  $array["M.Seat"] = $resMercySeat['num'] ? : 0;
                  $array["Nw.Jpn"] = $resNewJapan['num'] ? : 0;
                  $array["Nw.T"] = $resNewTown['num'] ? : 0;
                  $array["Roy."] = $resRoyals['num'] ? : 0;
                  $array["Shallom"] = $resShallom['num'] ? : 0;

                  $max_data = max($array) + 15;

                  $max_width = 800;
                  $max_height = 400;

                  $xgap = $max_width / (count($array) + 1);
                  $ygap = $max_height / (count($array) + 3);

                  $one_unit = $max_height / $max_data;


                  ?>



                  <svg viewbox="0 0 <?= $max_width. " ". $max_height; ?>" style="background-color: #4a7680; font-size: 12px; font-family:tahoma; font-weight: bolder; padding: 5px 10px 10px 10px; border-radius:5px;">

                    <style type="text/css">

                      @keyframes move{

                        0%{transform: rotate(-180deg);opacity: 0;}
                        100%{transform: rotate(0deg);opacity: 1;}
                      }

                      @keyframes move2{

                        0%{transform: translateY(200px);opacity: 0;}
                        100%{transform: translateY(0px);opacity: 1;}
                      }

                      circle{

                        fill: gray;
                      }

                      circle:hover{
                        fill: pink;
                        stroke-width: 5px;
                      }
                    </style>

                    <?php

                    $num = $xgap;
                    $num2 = $ygap;

                    $points = "";
                    $elements = "";
                    foreach ($array as $key => $value) {

                      $y = $max_height - ($value * $one_unit);
                      // code...
                      $elements .= "<polyline points='$num,0 $num,$max_height' style='stroke:#ffffff22;'/>";

                      $elements .= "<polyline points='0,$num2 $max_width,$num2' style='stroke:#ffffff22;'/>";

                      $elements .= "<text x='$num' y='".(12)."' style='fill:white; color:yellow; padding:5px;' title=''>$key</text>";

                      $elements .= "<text x='$num' y='".($y - 10)."' style='fill:white;'>$value</text>";

                      $elements .= "<text x='12' y='".($y)."' style='fill:white;'>$value</text>";


                      $points .= " $num,$y ";
                      echo "<polyline points='$points' style='animation: move 1.". rand(0,9)."s ease; stroke:yellow; stroke-width:2px;'/>";

                      $points = " $num,$y ";

                      $elements .= "<a href=''><circle r='5' cx='$num' cy='$y' style='animation: move 2.". rand(0,9)."s ease; stroke:lightblue; stroke-width:2px;' title='$key'/></a>";

                      $num += $xgap;
                      $num2 += $ygap;

                    }

                    echo $elements;

                    ?>

                  </svg>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

             <!-- Histogram Chart -->
             <div class="">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Water Baptism Vrs Holy Ghost Baptism <span>/Local Distribution</span></h5>


                    <div id="histogram" style="height: 450px; font-size: 8px; padding:5px all;"></div>
                    <!-- Line Chart -->

                  <?php

                    $dataPoints1 = array(

                      array("label"=> "Buko", "y"=> $resBuko['num'] ? : 0),
                      array("label"=> "Central", "y"=> $resCentral['num'] ? : 0),
                      array("label"=> "D/S.1", "y"=> $resDuadaso1['num'] ? : 0),
                      array("label"=> "D/S.2", "y"=> $resDuadaso2['num'] ? : 0),
                      array("label"=> "Dunamis", "y"=> $resDunamis['num'] ? : 0),
                      array("label"=> "Elshadai", "y"=> $resElshadai['num'] ? : 0),
                      array("label"=> "English", "y"=> $resEnglish['num'] ? : 0),
                      array("label"=> "Glorious", "y"=> $resGlorious['num'] ? : 0),
                      array("label"=> "Jamera", "y"=> $resJamera['num'] ? : 0),
                      array("label"=> "Kabile", "y"=> $resKabile['num'] ? : 0),
                      array("label"=> "Later Rain", "y"=> $resLatterRain['num'] ? : 0),
                      array("label"=> "MercySeat", "y"=> $resMercySeat['num'] ? : 0),
                      array("label"=> "New Japan", "y"=> $resNewJapan['num'] ? : 0),
                      array("label"=> "New Town", "y"=> $resNewTown['num'] ? : 0),
                      array("label"=> "Royals", "y"=> $resRoyals['num'] ? : 0),
                      array("label"=> "Shallom", "y"=> $resShallom['num'] ? : 0)
                    );

                    $dataPoints2 = array(
                                             
                     array("label"=> "Buko", "y"=> $resBukoWB['num'] ? : 0),
                      array("label"=> "Central", "y"=> $resCentralWB['num'] ? : 0),
                      array("label"=> "D/S.1", "y"=> $resDuadaso1WB['num'] ? : 0),
                      array("label"=> "D/S.2", "y"=> $resDuadaso2WB['num'] ? : 0),
                      array("label"=> "Dunamis", "y"=> $resDunamisWB['num'] ? : 0),
                      array("label"=> "Elshadai", "y"=> $resElshadaiWB['num'] ? : 0),
                      array("label"=> "English", "y"=> $resEnglishWB['num'] ? : 0),
                      array("label"=> "Glorious", "y"=> $resGloriousWB['num'] ? : 0),
                      array("label"=> "Jamera", "y"=> $resJameraWB['num'] ? : 0),
                      array("label"=> "Kabile", "y"=> $resKabileWB['num'] ? : 0),
                      array("label"=> "Later Rain", "y"=> $resLatterRainWB['num'] ? : 0),
                      array("label"=> "MercySeat", "y"=> $resMercySeatWB['num'] ? : 0),
                      array("label"=> "New Japan", "y"=> $resNewJapanWB['num'] ? : 0),
                      array("label"=> "New Town", "y"=> $resNewTownWB['num'] ? : 0),
                      array("label"=> "Royals", "y"=> $resRoyalsWB['num'] ? : 0),
                      array("label"=> "Shallom", "y"=> $resShallomWB['num'] ? : 0)
                    );

                    $dataPoints3 = array(
                                             
                      array("label"=> "Buko", "y"=> $resBukoHB['num'] ? : 0),
                      array("label"=> "Central", "y"=> $resCentralHB['num'] ? : 0),
                      array("label"=> "D/S.1", "y"=> $resDuadaso1HB['num'] ? : 0),
                      array("label"=> "D/S.2", "y"=> $resDuadaso2HB['num'] ? : 0),
                      array("label"=> "Dunamis", "y"=> $resDunamisHB['num'] ? : 0),
                      array("label"=> "Elshadai", "y"=> $resElshadaiHB['num'] ? : 0),
                      array("label"=> "English", "y"=> $resEnglishHB['num'] ? : 0),
                      array("label"=> "Glorious", "y"=> $resGloriousHB['num'] ? : 0),
                      array("label"=> "Jamera", "y"=> $resJameraHB['num'] ? : 0),
                      array("label"=> "Kabile", "y"=> $resKabileHB['num'] ? : 0),
                      array("label"=> "Later Rain", "y"=> $resLatterRainHB['num'] ? : 0),
                      array("label"=> "MercySeat", "y"=> $resMercySeatHB['num'] ? : 0),
                      array("label"=> "New Japan", "y"=> $resNewJapanHB['num'] ? : 0),
                      array("label"=> "New Town", "y"=> $resNewTownHB['num'] ? : 0),
                      array("label"=> "Royals", "y"=> $resRoyalsHB['num'] ? : 0),
                      array("label"=> "Shallom", "y"=> $resShallomHB['num'] ? : 0)
                    );
                      
                    ?>
    
                    <script>
                    window.onload = function () {
                    ??
                    var chart = new CanvasJS.Chart("histogram", {
                      animationEnabled: true,
                      theme: "light",
                      axisY:{
                        includeZero: true
                      },
                      axisX: {
                          valueFormatString: "MMM",
                          interval: 1,
                          intervalType: "month"

                      },
                      axisY: {
                          title: "Number"
                      },
                      legend:{
                        cursor: "pointer",
                        verticalAlign: "center",
                        horizontalAlign: "right",
                        itemclick: toggleDataSeries
                      },
                      data: [{
                        type: "column",
                        name: "MEMBERSHIP",                                   
                        xValueType: "string",
                        indexLabel: "{y}",
                        yValueFormatString: "0",
                        toolTipContent: "<span style='\"'color: {color};'\"'><strong>ASSEMBLY: </strong></span>{label} <br/><span style='\"'color: {color};'\"'><strong>{name}: </strong></span>{y} ",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                      },{
                        type: "column",
                        name: "WATER BAPTISM",                                   
                        xValueType: "string",
                        indexLabel: "{y}",
                        yValueFormatString: "0",
                        lineThickness: 6,
                        toolTipContent: "<span style='\"'color: {color};'\"'><strong>ASSEMBLY: </strong></span>{label} <br/><span style='\"'color: {color};'\"'><strong>{name}: </strong></span>{y} ",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                      },{
                        type: "column",
                        name: "HOLYGHOST BAPTISM",                                   
                        xValueType: "string",
                        indexLabel: "{y}",
                        yValueFormatString: "0",
                        lineThickness: 2,
                        toolTipContent: "<span style='\"'color: {color};'\"'><strong>ASSEMBLY: </strong></span>{label} <br/><span style='\"'color: {color};'\"'><strong>{name}: </strong></span>{y} ",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
                      }]
                    });
                    chart.render();
                    ??
                    function toggleDataSeries(e1){
                      if (typeof(e1.dataSeries.visible) === "undefined" || e1.dataSeries.visible) {
                        e1.dataSeries.visible = false;
                      }
                      else{
                        e1.dataSeries.visible = true;
                      }
                      chart.render();
                    }
                    ??
                    }
                    </script>    
                  <!-- End Line Chart -->
                </div>

              </div>
            </div><!-- End Histogram Chart -->

            <!-- Histogram Chart -->
             <div class="">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Water Baptism Vrs Holy Ghost Baptism <span>/Local Distribution</span></h5>


                    <div id="areaChart" style="height: 450px; font-size: 8px; padding:5px all;"></div>
                    <!-- Line Chart -->

                  <?php

                    $dataPoints1 = array(

                      array("label"=> "Buko", "y"=> $resBuko['num'] ? : 0),
                      array("label"=> "Central", "y"=> $resCentral['num'] ? : 0),
                      array("label"=> "D/S.1", "y"=> $resDuadaso1['num'] ? : 0),
                      array("label"=> "D/S.2", "y"=> $resDuadaso2['num'] ? : 0),
                      array("label"=> "Dunamis", "y"=> $resDunamis['num'] ? : 0),
                      array("label"=> "Elshadai", "y"=> $resElshadai['num'] ? : 0),
                      array("label"=> "English", "y"=> $resEnglish['num'] ? : 0),
                      array("label"=> "Glorious", "y"=> $resGlorious['num'] ? : 0),
                      array("label"=> "Jamera", "y"=> $resJamera['num'] ? : 0),
                      array("label"=> "Kabile", "y"=> $resKabile['num'] ? : 0),
                      array("label"=> "Later Rain", "y"=> $resLatterRain['num'] ? : 0),
                      array("label"=> "MercySeat", "y"=> $resMercySeat['num'] ? : 0),
                      array("label"=> "New Japan", "y"=> $resNewJapan['num'] ? : 0),
                      array("label"=> "New Town", "y"=> $resNewTown['num'] ? : 0),
                      array("label"=> "Royals", "y"=> $resRoyals['num'] ? : 0),
                      array("label"=> "Shallom", "y"=> $resShallom['num'] ? : 0)
                    );

                    $dataPoints2 = array(
                                             
                     array("label"=> "Buko", "y"=> $resBukoWB['num'] ? : 0),
                      array("label"=> "Central", "y"=> $resCentralWB['num'] ? : 0),
                      array("label"=> "D/S.1", "y"=> $resDuadaso1WB['num'] ? : 0),
                      array("label"=> "D/S.2", "y"=> $resDuadaso2WB['num'] ? : 0),
                      array("label"=> "Dunamis", "y"=> $resDunamisWB['num'] ? : 0),
                      array("label"=> "Elshadai", "y"=> $resElshadaiWB['num'] ? : 0),
                      array("label"=> "English", "y"=> $resEnglishWB['num'] ? : 0),
                      array("label"=> "Glorious", "y"=> $resGloriousWB['num'] ? : 0),
                      array("label"=> "Jamera", "y"=> $resJameraWB['num'] ? : 0),
                      array("label"=> "Kabile", "y"=> $resKabileWB['num'] ? : 0),
                      array("label"=> "Later Rain", "y"=> $resLatterRainWB['num'] ? : 0),
                      array("label"=> "MercySeat", "y"=> $resMercySeatWB['num'] ? : 0),
                      array("label"=> "New Japan", "y"=> $resNewJapanWB['num'] ? : 0),
                      array("label"=> "New Town", "y"=> $resNewTownWB['num'] ? : 0),
                      array("label"=> "Royals", "y"=> $resRoyalsWB['num'] ? : 0),
                      array("label"=> "Shallom", "y"=> $resShallomWB['num'] ? : 0)
                    );

                    $dataPoints3 = array(
                                             
                      array("label"=> "Buko", "y"=> $resBukoHB['num'] ? : 0),
                      array("label"=> "Central", "y"=> $resCentralHB['num'] ? : 0),
                      array("label"=> "D/S.1", "y"=> $resDuadaso1HB['num'] ? : 0),
                      array("label"=> "D/S.2", "y"=> $resDuadaso2HB['num'] ? : 0),
                      array("label"=> "Dunamis", "y"=> $resDunamisHB['num'] ? : 0),
                      array("label"=> "Elshadai", "y"=> $resElshadaiHB['num'] ? : 0),
                      array("label"=> "English", "y"=> $resEnglishHB['num'] ? : 0),
                      array("label"=> "Glorious", "y"=> $resGloriousHB['num'] ? : 0),
                      array("label"=> "Jamera", "y"=> $resJameraHB['num'] ? : 0),
                      array("label"=> "Kabile", "y"=> $resKabileHB['num'] ? : 0),
                      array("label"=> "Later Rain", "y"=> $resLatterRainHB['num'] ? : 0),
                      array("label"=> "MercySeat", "y"=> $resMercySeatHB['num'] ? : 0),
                      array("label"=> "New Japan", "y"=> $resNewJapanHB['num'] ? : 0),
                      array("label"=> "New Town", "y"=> $resNewTownHB['num'] ? : 0),
                      array("label"=> "Royals", "y"=> $resRoyalsHB['num'] ? : 0),
                      array("label"=> "Shallom", "y"=> $resShallomHB['num'] ? : 0)
                    );
                      
                    ?>

                    <script type="text/javascript">

                        $(function () {
                            var chart = new CanvasJS.Chart("areaChart", {
                                theme: "light2",
                                animationEnabled: true,
                                title: {
                                    text: "",
                                    fontSize: 25
                                },
                                axisX: {
                                    valueFormatString: "MMM",
                                    interval: 1,
                                    intervalType: "month"

                                },
                                axisY: {
                                    title: "Number"
                                },

                                data: [
                                {
                                    type: "line",
                                    name: "MEMBERSHIP",                                   
                                    xValueType: "string",
                                    toolTipContent: "<span style='\"'color: {#ff771d};'\"'><strong>ASSEMBLY: </strong></span>{label} <br/><span style='\"'color: {#ff771d};'\"'><strong>{name}: </strong></span>{y} ",
                                    showInLegend: true,
                                    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                                },{
                                    type: "line",
                                    name: "WATER BAPTISM",
                                    xValueType: "string",
                                    toolTipContent: "<span style='\"'color: {#2eca6a};'\"'><strong>ASSEMBLY: </strong></span>{label} <br/><span style='\"'color: {#2eca6a};'\"'><strong>{name}: </strong></span>{y} ",
                                    showInLegend: true,
                                    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                                },{
                                    type: "line",
                                    name: "HOLYGHOST BAPTISM",
                                    xValueType: "string",
                                    toolTipContent: "<span style='\"'color: {#4154f122};'\"'><strong>ASSEMBLY: </strong></span>{label} <br/><span style='\"'color: {#4154f122};'\"'><strong>{name}: </strong></span>{y} ",
                                    showInLegend: true,
                                    dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
                                },
                                ]
                            });

                            chart.render();
                        });
                    </script>  
                  <!-- End Line Chart -->
                </div>

              </div>
            </div><!-- End Histogram Chart -->

            
           
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-3">
          <div class="row d-flex border-bottom">
            <div class="col float-start" style="border-radius:0 15px 15px 0; margin-right:-15px; z-index: 11;">
              <h5 class="card-title fw-bolder">Birthdays <span>Today</span></h5>
            </div>
          <div class="col-5 d-flex my-auto py-2" style=" border-radius:0 15px 15px 0; background:whitesmoke;">
          <img src="<?=ROOT?>/assets/images/undraw_showing_support_re_5f2v.svg" style="width:80px; height: 40px;">
          <img src="<?=ROOT?>/assets/images/undraw_ride_a_bicycle_re_6tjy.svg" style="width:80px; height: 40px;">
          </div>
        </div>
        <div class="row bg-white rounded mb-4 pb-3">
           <!-- News & Updates Traffic -->

          <div class="card-body pb-1 rounded mt-3">
           <?php if($birthdaysToday['num'] < 1):?>
            <div class="news">  
              <div class="alert alert-danger alert-dismissible fade show text-center my-0 py-1" style="top:0px;" role="alert">
              <i class="bi bi-exclamation-octagon me-1 "></i>
              Sorry, you have no birthdays today!
              </div>
            </div>

          <?php else:?>

            <?php if(!empty($members)):$num = 0;?>
              <?php foreach($members as $row):?>            
            <?php
              $mydob = get_date_month_day($row->dob);
              $today = date('m d');

              $dob = $row->dob;
              $todayd = date("Y-m-d");
              $diff = date_diff(date_create($dob), date_create($todayd));
              $age = $diff->format('%Y');
              ?>
             <?php if($mydob ===$today):$num++;?>
        
            <div class="news">  
              <div class="post-item clearfix mb-2 py-1 row d-flex border-bottom px-0 rounded alert alert-secondary alert-dismissible fade show d-flex" role="alert" style="top:0px;">         
               <label class="col-1 rounded-circle pill text-light fw-bolder" style="margin-left:-2px;margin-bottom:-20px;bottom: -20px; z-index: 1;"><?=$num?></label>
                <a class="px-0" href="<?=ROOT?>/admin/notifications/<?=$num?>">
                 <?php if(!empty($row->image)):?>
                  <img src="<?=get_profile_image($row->image)?>" style="object-fit:cover; width: 80px;max-width: 80px; max-height: 80px; height: 80px; border-radius: 50%;" alt="">
                <?php elseif($row->gender ==="female" AND $age < 13):?>
                  <img src="<?=ROOT?>/assets/images/girl-avatar2.jpg" style="object-fit:cover; width: 80px;max-width: 80px; max-height: 80px; height: 80px; border-radius: 50%;" alt="">
                <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
                  <img src="<?=ROOT?>/assets/images/female-avatar.jpg" style="object-fit:cover; width: 80px;max-width: 80px; max-height: 80px; height: 80px; border-radius: 50%;" alt="">
                <?php elseif($row->gender === "male" AND $age < 13):?>
                  <img src="<?=ROOT?>/assets/images/boy-avatar2.jpg" style="object-fit:cover; width: 80px;max-width: 80px; max-height: 80px; height: 80px; border-radius: 50%;" alt="">
                  <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
                  <img src="<?=ROOT?>/assets/images/man-avatar.jpg" style="object-fit:cover; width: 80px;max-width: 80px; max-height: 80px; height: 80px; border-radius: 50%;" alt="">
                <?php endif;?>
                  <h4 class="text-danger "> <?=esc(ucfirst($row->firstname))?> @ <?=$age?></h4>
                <?php if($age > 1):?>
                <?php if($row->gender === 'male'):?>
                <p class="mb-0">Wish <?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->lastname ?? ''))?> a happy birthday.<br> Call <?=ucfirst($row->firstname)?> on <?=$row->phone?></p>
                <span class="badge bg-white mx-auto mt-0 text-danger text-wrap">He is <?=$age?> years old today.Hurray!!</span>
                <?php else:?>
                 <p class="mb-0">Wish <?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->lastname ?? ''))?> a happy birthday.<br> Call <?=ucfirst($row->firstname)?> on <?=$row->phone?>
                    </p><span class="badge bg-white mx-auto mt-0 text-danger text-wrap">She is <?=$age?> years old today.Hurray!!</span>
                <?php endif;?>

                <?php else:?>

                <?php if($row->gender === 'male'):?>
                  <p class="mb-0">Wish <?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->lastname ?? ''))?> a happy birthday.<br> Call <?=ucfirst($row->firstname)?> on <?=$row->phone?>
                    </p><span class="badge bg-white mx-auto mt-0 text-danger text-wrap">He is <?=$age?> year old today.Hurray!!</span>
                <?php else:?>
                  <p class="mb-0">Wish <?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->lastname ?? ''))?> a happy birthday. <br> Call <?=ucfirst($row->firstname)?> on <?=$row->phone?>
                    </p><span class="badge bg-white mx-auto mt-0 text-danger text-wrap">She is <?=$age?> year old today.Hurray!!</span>
                <?php endif;?>

                <?php endif;?>               
              </a>
                <button type="button" class="btn-close float-end mx-auto fw-bolder" data-bs-dismiss="alert" aria-label="Close" style="margin-top:-15px;"></button>
              </div>
              </div>

             <?php endif;?>
             <?php endforeach;?>
             <?php endif;?>
             <?php endif;?>


            </div>
          </div><!-- End News & Updates -->

          <div class="row d-flex my-0 py-1 border-bottom">
          <div class="col float-start py-0 my-0" style=" border-radius:0 15px 15px 0; margin-right:-15px; z-index: 11;">            
            <h5 class="card-title fw-bolder">Birthdays <span>This Month</span></h5>
          </div>
          <div class="col-4 d-flex my-auto py-2" style="border-radius:0 15px 15px 0;background: whitesmoke;">
          <img src="<?=ROOT?>/assets/images/undraw_summer_1wi4.svg" style="width:40px; height: 40px;">
          <img src="<?=ROOT?>/assets/images/undraw_running_wild_re_fbeb.svg" style="width:40px; height: 40px;">
          </div>
          </div>
          
          <div class="row bg-white">
           <!-- Birthdays to come -->
            <div class="card-body pb-1 rounded mt-3">

            <!----Check Birthdays to come----->           
           <?php if($birthdaysToCome['num'] < 1):?>
            <div class="news">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="top:0px;">
              <i class="bi bi-exclamation-octagon me-1"></i>
              Sorry, you have no pending birthdays this Month!
            </div>

          <?php else:?> 

            <?php if(!empty($members)):$num = 0;?>
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
             <?php if($daysMore > 0 ):$num++;?>

              <div class="news">          
              <div class="post-item clearfix mb-2 py-1 row d-flex border-bottom px-0 rounded alert alert-secondary alert-dismissible fade show d-flex" role="alert" style="top:0px;">

              <label class="col-1 text-info fw-bolder" style="margin-left:-2px;margin-bottom:-20px;bottom: -20px; z-index: 1;"><?=$num?></label>
                <a class="px-0" href="<?=ROOT?>/admin/notifications/<?=$num?>/<?=$row->firstname?>">

                 <?php if(!empty($row->image)):?>
                  <img src="<?=get_profile_image($row->image)?>" style="object-fit:cover; width: 80px;max-width: 80px; max-height: 80px; height: 80px; border-radius: 50%;" alt="">
                <?php elseif($row->gender ==="female" AND $age < 13):?>
                  <img src="<?=ROOT?>/assets/images/girl-avatar2.jpg" style="object-fit:cover; width: 80px;max-width: 80px; max-height: 80px; height: 80px; border-radius: 50%;" alt="">
                <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
                  <img src="<?=ROOT?>/assets/images/female-avatar.jpg" style="object-fit:cover; width: 80px;max-width: 80px; max-height: 80px; height: 80px; border-radius: 50%;" alt="">
                <?php elseif($row->gender === "male" AND $age < 13):?>
                  <img src="<?=ROOT?>/assets/images/boy-avatar2.jpg" style="object-fit:cover; width: 80px;max-width: 80px; max-height: 80px; height: 80px; border-radius: 50%;" alt="">
                  <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
                  <img src="<?=ROOT?>/assets/images/man-avatar.jpg" style="object-fit:cover; width: 80px;max-width: 80px; max-height: 80px; height: 80px; border-radius: 50%;" alt="">
                <?php endif;?>
                <h4 class="text-info"><?=esc(ucfirst($row->firstname))?> - <?=esc(ucfirst($row->category_id))?></h4>
                <?php if($age > 0 AND $daysMore > 1):?>
                <?php if($row->gender === 'male'):?>
                <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->lastname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                <span class="badge bg-white mx-auto mt-0 text-info text-wrap">He will be <?=$age + 1?> years old in <?=$daysMore?> days.Hurray!!</span>
                <?php else:?>
                <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->firstname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                <span class="badge bg-white mx-auto mt-0 text-info text-wrap">She will be <?=$age + 1?> years old in <?=$daysMore?> days.Hurray!!</span>
                <?php endif;?>

                <?php elseif($age > 0 AND $daysMore < 2):?>

                <?php if($row->gender === 'male'):?>
                  <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                <span class="badge bg-white mx-auto mt-0 text-info text-wrap">He will be <?=$age + 1?> years old in <?=$daysMore?> day.Hurray!!</span>
                <?php else:?>
                <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                <span class="badge bg-white mx-auto mt-0 text-info text-wrap">She will be <?=$age + 1?> years old in <?=$daysMore?> day.Hurray!!</span>
                <?php endif;?>

              <?php elseif($age < 1 AND $daysMore < 2):?>

                <?php if($row->gender === 'male'):?>
                  <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                <span class="badge bg-white mx-auto mt-0 text-info text-wrap">He will be <?=$age + 1?> year old in <?=$daysMore?> day.Hurray!!</span>
                <?php else:?>
                <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                <span class="badge bg-white mx-auto mt-0 text-info text-wrap">She will be <?=$age + 1?> year old in <?=$daysMore?> day.Hurray!!</span>
                <?php endif;?>

              <?php elseif($age < 1 AND $daysMore > 1):?>

                <?php if($row->gender === 'male'):?>
                  <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                <span class="badge bg-white mx-auto mt-0 text-info text-wrap">He will be <?=$age + 1?> year old in <?=$daysMore?> days.Hurray!!</span>
                <?php else:?>
                <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                <span class="badge bg-white mx-auto mt-0 text-info text-wrap">She will be <?=$age + 1?> year old in <?=$daysMore?> days.Hurray!!</span>
                <?php endif;?>

                <?php endif;?>               
              </a>              
                <button type="button" class="btn-close float-end mx-auto fw-bolder" data-bs-dismiss="alert" aria-label="Close" style="margin-top:-15px;"></button>
              </div>

              </div>             
             <?php endif;?>
             <?php endif;?>
             <?php endforeach;?>
             <?php endif;?>
             <?php endif;?>

              </div><!-- End sidebar recent posts-->

            </div>

           <!-- Birthdays to come -->
            <div class="card-body pb-1 bg-white rounded mt-3 mx-0">

              <div class="news mx-0 rounded">
                
                <h5 class="card-title">Role Categories<span>/General Distribution</span></h5>

                      
                    <div class="rounded" id="NwBarMSChart" style="height: 150px; font-size: 8px; padding:0px all;"></div>
                    <!-- Line Chart -->

                  <?php

                    $dataPoints = array(
                        array("y" => $resChild['num'], "legendText" => "Children", "label" => "Children"),
                        array("y" => $resVisitor['num'], "legendText" => "Visitors", "label" => "Visitors"),
                        array("y" => $resElder['num'], "legendText" => "Elders", "label" => "Elders"),
                        array("y" => $resDeacon['num'], "legendText" => "Deacons", "label" => "Deacons"),
                        array("y" => $resDeaconess['num'], "legendText" => "Deaconess", "label" => "Deaconess"),
                        array("y" => $resMember['num'], "legendText" => "Members", "label" => "Members"),
                        array("y" => $resPastor['num'], "legendText" => "Pastor", "label" => "Pastor"),
                        array("y" => $resSofomaame['num'], "legendText" => "Sofomaame", "label" => "Sofomaame")
                          );
                      
                    ?>

                    <script type="text/javascript">

                        $(function () {
                            var chart = new CanvasJS.Chart("NwBarMSChart", {
                                theme: "dark",
                                animationEnabled: true,
                                title: {
                                    text: "",
                                    fontSize: 25
                                },
                                axisX: {
                                    valueFormatString: "MMM",
                                    interval: 1,
                                    intervalType: "month"

                                },
                                axisY: {
                                    title: "Number"
                                },

                                data: [
                                {
                                    type: "column",
                                    name: "Number",                                   
                                    xValueType: "string",
                                    toolTipContent: "<span style='\"'color: {color};'\"'><strong>{label}</strong></span>: <span style='\"'color: {color};'\"'><strong>{y} </strong></span> ",
                                    showInLegend: true,
                                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                }
                                ]
                            });

                            chart.render();
                        });
                    </script>
                  <!-- End Line Chart -->

              </div><!-- End sidebar recent posts-->

            </div>

            <!-- Birthdays to come -->
            <div class="card-body pb-1 bg-white rounded mt-3 mx-0">

              <div class="news mx-0 rounded">
                
                <h5 class="card-title">Marital Status <span>/General Distribution</span></h5>

                  <!-- Line Chart -->

                    <h1></h1>
                      
                      <div id="chartContainer2" style="height: 200px; font-size: 8px; padding:0px all;"></div>

                     <?php

                        $denomiter = $resChild['num'] + $resVisitor['num'] + $resElder['num'] + $resDeacon['num'] + $resDeaconess['num'] + $resMember['num'];
                        
                        $dataPoints = array(
                        array("y" => $resSingle['num'], "legendText" => "Single", "label" => "Single"),
                        array("y" => $resMarried['num'], "legendText" => "Married", "label" => "Married"),
                        array("y" => $resDivorced['num'], "legendText" => "Divorced", "label" => "Divorced"),
                        array("y" => $resWidowed['num'], "legendText" => "Widowde", "label" => "Widowed"),
                          );
                      ?>

                      <script type="text/javascript">
                          $(function () {
                              var chart = new CanvasJS.Chart("chartContainer2", {
                                  theme: "light",                                    
                                  animationEnabled: true,

                                  title: {
                                      text: ""
                                  },
                                  legend: {
                                      verticalAlign: "center",
                                      horizontalAlign: "left",
                                      fontSize: 12,
                                      fontFamily: "Helvetica"
                                  },
                                  data: [
                                  {
                                      type: "pie",
                                      indexLabelFontFamily: "Tahoma",
                                      indexLabelFontSize: 12,
                                      indexLabel: "{label} {y}",
                                      startAngle: -90,
                                      showInLegend: false,
                        toolTipContent: "<span style='\"'color: {color};'\"'><strong>{label}</strong></span>: <span style='\"'color: {color};'\"'><strong>{y} </strong></span> ",
                                      dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                  }
                                  ]
                              });
                              chart.render();
                          });
                      </script>
                  <!-- End Line Chart -->

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

      </div>
    </div>
    </div>
    </section>


<script type="text/javascript">
  
  function get_data(text)
  {

    if(text.trim() == "")
      return
    
    if(text.trim().length < 1)
      return

    var form = new FormData();
    form.append('text',text);

    var ajax = new XMLHttpRequest();

    ajax.addEventListener('readystatechange',function(e){

      if(ajax.readyState == 4 && ajax.status == 200){

        //results are back
        handle_result(ajax.responseText);
      }
    });

    ajax.open('post','',true);
    ajax.send(form);
  }

  function handle_result(result)
  {
    //console.log(result);
    var result_div = document.querySelector(".js-results");
    var str = "";
    var strR = "";

    var num = 0;
    var obj = JSON.parse(result);

    for (var i = obj.length - 1; i >= 0; i--) { 

      num +=1;

      var totalnum = num;
     
     str += `<a href='<?=ROOT?>/admin/profile/${obj[i].id}'><div>`+ num + '. ' + obj[i].firstname + ' ' + obj[i].lastname + "<small>" + ' ('+ obj[i].role_name +') '+ "</small>" +"</div></a>";
     if(totalnum < 2){
      strR = "<center>"+"Only "+ totalnum +' Result Found!' +"</center>"  
      }else{
      strR = "<center>"+ totalnum +' Results Found!' +"</center>" 
      }
      //console.log(obj[i].firstname + ' ' + obj[i].lastname);
    }

    result_div.innerHTML = strR + str;
    if(obj.length > 0){
    show_results();
  }else{
    hide_results();
  }

  }

  function show_results()
  {
    var result_div = document.querySelector(".js-results");
    result_div.classList.remove("hide")
  }

  function hide_results()
  {
    var result_div = document.querySelector(".js-results");
    result_div.classList.add("hide")
  }

</script>

<?php $this->view('admin/admin-footer',$data) ?>
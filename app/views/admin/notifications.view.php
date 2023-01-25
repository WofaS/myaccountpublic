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
    <div class="pagetitle">
      <h1 class="text-primary">Birthday Notifications</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=ROOT?>/admin">Dashboard</a></li>
          <li class="breadcrumb-item active">Birthday Notifications</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">

        <div class="col">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered mx-auto">

                <li class="nav-item mx-auto">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link active" data-bs-toggle="tab" data-bs-target="#birthday-celebrants" id="birthday-celebrants-tab">
                  <div class="row d-flex">
                  <div class="col px-0 mx-auto">
                    <?php if($birthdaysToday['num'] < 2):?>
                      <h5 class="card-title text-primary"><span class="badge bg-danger text-white"><?=$birthdaysToday['num']?></span> Bithday Celebrant <span class=""></span></h5>
                    <?php else:?>
                      <h5 class="card-title text-primary border-bottom"><span class="badge bg-danger text-white"><?=$birthdaysToday['num']?></span> Bithday Celebrants <span class=""></span></h5>
                    <?php endif;?>
                  </div>
                
                  <div class="col-2 float-end mx-auto">
                  <img src="<?=ROOT?>/assets/images/undraw_showing_support_re_5f2v.svg" style="width:60px; height: 40px;">
                  </div>
                  </div>
                  </button>
                </li>

                <li class="nav-item mx-auto">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link " data-bs-toggle="tab" data-bs-target="#birthday-pending" id="birthday-pending-tab">
                  <div class="row d-flex mx-auto"> 

                  <?php if($birthdaysToCome['num'] > 1):?>             
                    <h5 class="card-title text-primary col-10">
                  <span class="badge bg-danger text-white"><?=$birthdaysToCome['num']?></span> Pending Bithdays <span class="">This Month</span></h5>

                  <?php else:?><h5 class="card-title text-primary col-10">
                  <span class="badge bg-danger text-white"><?=$birthdaysToCome['num']?></span> Pending Bithday <span class="">This Month</span></h5>
                <?php endif;?>
                  <div class="col-2 float-end mx-auto">
                  <img src="<?=ROOT?>/assets/images/undraw_running_wild_re_fbeb.svg" style="width:50px; height: 40px;">
                  </div>
                  </div>
                  </button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                 <!-- Profile overview -->

                <div class="tab-pane fade birthday-celebrants pt-3 show active" id="birthday-celebrants">
                  <!-- Profile Edit Form -->                  
                  <section class="section dashboard">
                    <div class="row d-flex">
                      <!-- Right side columns -->
                      <div class="container d-flex mx-auto">
                        <div class="col col-lg-6 col-md-6 col-sm-8 mx-auto rounded mb-4">
                         <!-- News & Updates Traffic -->

                        <div class="row d-flex">
                        <div class="col-7 px-0">
                          <?php if($birthdaysToday['num'] < 2):?>
                          <h5 class="card-title text-primary border-bottom"><span class="badge bg-danger text-white"></span> Bithday Celebrant <span class="">Today</span></h5>
                        <?php else:?>
                          <h5 class="card-title text-primary border-bottom"><span class="badge bg-danger text-white"></span> Bithday Celebrants <span class="">Today</span></h5>
                        <?php endif;?>
                        </div>
                      
                        <div class="col-5 float-end mx-0">
                          <img src="<?=ROOT?>/assets/images/undraw_ride_a_bicycle_re_6tjy.svg" style="width:60px; height: 40px;">
                        <img src="<?=ROOT?>/assets/images/undraw_showing_support_re_5f2v.svg" style="width:60px; height: 40px;">
                        </div>
                        </div>

                          <div class="card-body pb-1 rounded alert alert-light mt-3">
                            <?php if($birthdaysToday['num'] < 1):?>
                            <div class="news">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="top:0px;">
                              <i class="bi bi-exclamation-octagon me-1"></i>
                              Sorry, you have no birthday celebrant today!
                            </div>
                            </div>
                          <?php elseif(!empty($members)):$num = 0;?>
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
                           <?php if($mydob ===$today):$num++;?>
                            
                          <div class="news">  
                            <div class="post-item clearfix mb-2 py-1 row d-flex border-bottom px-0 rounded alert alert-danger" style="top:0px;">         
                             <label class="col-1 badge card-title mt-0 pt-0 text-danger px-0 fw-bolder" style="margin-left:-18px;margin-bottom:-20px;bottom: -20px; z-index: 1;"><?=$num?></label>
                              <a class="px-0" href="<?=ROOT?>/admin/viewusers/<?=$row->id?>">
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
                              <h4 class="text-muted "> <?=esc(ucfirst($row->firstname))?> @ <?=$age?></h4>
                              <?php if($age > 1):?>
                              <?php if($row->gender === 'male'):?>
                              <p class="mb-0">Wish <?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->lastname ?? ''))?> of <?=ucfirst($row->category_id)?> assembly a happy birthday <br> Call <?=ucfirst($row->firstname)?> on <?=$row->phone?></p>
                              <span class="badge bg-white mx-auto mt-0 text-danger text-wrap">He is <?=$age?> years old today.Hurray!!</span>
                              <?php else:?>
                               <p class="mb-0">Wish <?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->lastname ?? ''))?> of <?=ucfirst($row->category_id)?> assembly a happy birthday. <br> Call <?=ucfirst($row->firstname)?> on <?=$row->phone?>
                                  </p><span class="badge bg-white mx-auto mt-0 text-danger text-wrap">She is <?=$age?> years old today.Hurray!!</span>
                              <?php endif;?>

                              <?php else:?>

                              <?php if($row->gender === 'male'):?>
                                <p class="mb-0">Wish <?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->lastname ?? ''))?>of <?=ucfirst($row->category_id)?> assembly  a happy birthday <br> Call <?=ucfirst($row->firstname)?> on <?=$row->phone?>.
                                  </p><span class="badge bg-white mx-auto mt-0 text-danger text-wrap">He is <?=$age?> year old today.Hurray!!</span>
                              <?php else:?>
                                <p class="mb-0">Wish <?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->lastname ?? ''))?>of <?=ucfirst($row->category_id)?> assembly  a happy birthday <br> Call <?=ucfirst($row->firstname)?> on <?=$row->phone?>.
                                  </p><span class="badge bg-white mx-auto mt-0 text-danger text-wrap">She is <?=$age?> year old today.Hurray!!</span>
                              <?php endif;?>

                              <?php endif;?>               
                            </a>
                            </div>
                            </div>

                           <?php endif;?>
                           <?php endforeach;?>
                           <?php endif;?>


                        </div>
                        </div><!-- End News & Updates -->
                        
                        <div class="col-md-6 col-lg-6 col-sm-4 mx-auto float-end rounded">
                          <img src="<?=ROOT?>/assets/images/undraw_ride_a_bicycle_re_6tjy.svg"  style="width:60px; height: 40px;">
                        <img src="<?=ROOT?>/assets/images/undraw_summer_1wi4.svg" style="width:50px; height: 40px;">
                        <img src="<?=ROOT?>/assets/images/undraw_showing_support_re_5f2v.svg" style="width:100%; background:#f6f9ff;" class="p-3 rounded">
                        <img src="<?=ROOT?>/assets/images/undraw_ride_a_bicycle_re_6tjy.svg" style="width:60px; height: 40px;">
                        </div>

                    </div>
                  </div>
                </section>
                </div>

                <div class="tab-pane fade birthday-pending pt-3 show" id="birthday-pending">
                  <!-- Profile Edit Form --> 


                  <section class="section dashboard">
                    <div class="row d-flex">
                      <!-- Right side columns -->
                      <div class="container d-flex mx-auto">

                        <div class="col-md-6 col-lg-6 col-sm-4 mx-auto float-start rounded">
                        <img src="<?=ROOT?>/assets/images/undraw_showing_support_re_5f2v.svg" style="width:50px; height: 40px;">
                        <img src="<?=ROOT?>/assets/images/undraw_wait_in_line_o2aq.svg" style="width:50px; height: 40px;">
                        <img src="<?=ROOT?>/assets/images/undraw_summer_1wi4.svg" style="width:50px; height: 40px;">
                        <img src="<?=ROOT?>/assets/images/undraw_running_wild_re_fbeb.svg" style="width:50px; height: 40px;">
                        <img src="<?=ROOT?>/assets/images/undraw_ride_a_bicycle_re_6tjy.svg" style="width: 100%; background:;" class="p-3 rounded">
                        </div>

                        <div class="col col-lg-6 col-md-6 col-sm-8 mx-auto rounded mb-4 float-end">
                         <!-- News & Updates Traffic -->

                        <div class="row d-flex">
                        <div class="col-7 px-0">
                          <h5 class="card-title text-primary border-bottom"><span class="badge bg-info text-white"></span> Pending Birthdays <span class="">This Month</span></h5>
                        </div>
                      
                        <div class="col-5 float-end mx-0">
                        <img src="<?=ROOT?>/assets/images/undraw_ride_a_bicycle_re_6tjy.svg" style="width:60px; height: 40px;">
                        <img src="<?=ROOT?>/assets/images/undraw_showing_support_re_5f2v.svg" style="width:50px; height: 40px;">
                        </div>
                        </div>

                      <div class="card-body pb-1 rounded alert alert-light mt-3">

                      <?php if($birthdaysToCome['num'] < 1):?>
                      <div class="news">
                      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="top:0px;">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        Sorry, you have no pending birthdays this Month!
                      </div>
                      </div>
                            
                      <?php elseif(!empty($members)):$num = 0;?>
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
                       <?php if($daysMore > 0):$num++;?>
                            
                          <div class="news">  
                            <div class="post-item clearfix mb-2 py-1 row d-flex border-bottom px-0 rounded alert alert-secondary" style="top:0px;">         
                             <label class="col-1 badge card-title px-0 fw-bolder mt-0 pt-0" style="margin-left:-16px;margin-bottom:-20px;bottom: -20px; z-index: 1;"><?=$num?></label>
                              <a class="px-0" href="<?=ROOT?>/admin/viewusers/<?=$row->id?>">
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
                               <h4 class="text-muted"><?=esc(ucfirst($row->firstname))?> of <?=esc(ucfirst($row->category_id))?> Assembly</h4>
                          <?php if($age > 0 AND $daysMore > 1):?>
                          <?php if($row->gender === 'male'):?>
                          <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->lastname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                          <span class="badge bg-white mx-auto mt-0 text-info text-wrap">He will be <?=$age + 1?> years old in <?=$daysMore?> days.Hurray!!</span>
                          <?php else:?>
                          <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?> <?=esc(ucfirst($row->firstname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                          <span class="badge bg-white mx-auto mt-0 text-info text-wrap">She will be <?=$age + 1?> years old in <?=$daysMore?> days.Hurray!!</span>
                          <?php endif;?>

                          <?php else:?>

                          <?php if($row->gender === 'male'):?>
                            <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                          <span class="badge bg-white mx-auto mt-0 text-info text-wrap">He will be <?=$age + 1?> year old in <?=$daysMore?> day.Hurray!!</span>
                          <?php else:?>
                          <p class="mb-0"><span class="fw-bolder fst-italic"><?=ucfirst($row->role_name)?> </span><?=esc(ucfirst($row->firstname ?? ''))?>'s birthday is on <?=get_date_month2($row->dob)?>.</p>
                          <span class="badge bg-white mx-auto mt-0 text-info text-wrap">She will be <?=$age + 1?> year old in <?=$daysMore?> day.Hurray!!</span>
                          <?php endif;?>

                          <?php endif;?>               
                            </a>
                            </div>
                            </div>

                           <?php endif;?>
                           <?php endif;?>
                           <?php endforeach;?>
                           <?php endif;?>


                        </div>
                        </div><!-- End News & Updates -->
                       
                    </div>
                  </div>
                </section>
                </div>

                
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
    </section>
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

<script>
  
  
  var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab"): "#profile-overview";

  function show_tab(tab_name)
  {
    const someTabTriggerEl = document.querySelector(tab_name +"-tab");
    const tab = new bootstrap.Tab(someTabTriggerEl);

    tab.show();

  }

  function set_tab(tab_name)
  {
    tab = tab_name;
    sessionStorage.setItem("tab", tab_name);
  }

  function load_image(file)
  {

    document.querySelector(".js-filename").innerHTML = "Selected File: " + file.name;

    var mylink = window.URL.createObjectURL(file);
    document.querySelector(".js-image-preview").src = mylink;
  }

  window.onload = function(){

    show_tab(tab);
  }

  //upload functions
  function save_profile(e)
  {

    var form = e.currentTarget.form;
    var inputs = form.querySelectorAll("input,textarea,select,radio");
    var obj = {};
    var image_added = false;

    for (var i = 0; i < inputs.length; i++) {
      var key = inputs[i].name;

      if(key == 'image'){
        if(typeof inputs[i].files[0] == 'object'){
          obj[key] = inputs[i].files[0];
          image_added = true;
        }
      }else{
        obj[key] = inputs[i].value;
      }
    }
 
    //validate image
    if(image_added){

      var allowed = ['jpg','jpeg','png'];
      if(typeof obj.image == 'object'){
        var ext = obj.image.name.split(".").pop();
      }

      if(!allowed.includes(ext.toLowerCase())){
        alert("Only these file types are allowed in profile image: "+ allowed.toString(","));
        return;
      }
    }

    send_data(obj);

  }

  function send_data(obj, progbar = 'js-prog')
  {

    var prog = document.querySelector("."+progbar);
    prog.children[0].style.width = "0%";
    prog.classList.remove("hide");

    var myform = new FormData();
    for(key in obj){
      myform.append(key,obj[key]); 
    }

    var ajax = new XMLHttpRequest();

    ajax.addEventListener('readystatechange',function(){

      if(ajax.readyState == 4){

        if(ajax.status == 200){
          //everything went well
          //alert("upload complete");
          handle_result(ajax.responseText);
        }else{
          //error
          alert("an error occurred");
        }
      }
    });

    ajax.upload.addEventListener('progress',function(e){

      var percent = Math.round((e.loaded / e.total) * 100);
      prog.children[0].style.width = percent + "%";
      prog.children[0].innerHTML = "Saving.. " + percent + "%";

    });

    ajax.open('post','',true);
    ajax.send(myform);

  }

  function handle_result(result)
  {
    console.log(result);
    var obj = JSON.parse(result);
    if(typeof obj == 'object'){
      //object was created

      if(typeof obj.errors == 'object')
      {
        //we have errors
        display_errors(obj.errors);
        alert("Please correct the errors on the page");
      }else{
        //save complete
        alert("Profile saved successfully!");
        window.location.reload();

      }
    }
  }

  function display_errors(errors){

    for(key in errors){

      document.querySelector(".js-error-"+key).innerHTML = errors[key];
    }
  }

</script>


<?php $this->view('admin/admin-footer',$data) ?>
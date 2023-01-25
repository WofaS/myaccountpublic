<?php $this->view('admin/admin-header',$data) ?>


    <?php

  $categories = get_categories();
  $positions = get_positions();
  $localPositions = get_local_positions();
  $roles = get_roles();
  $maritalStatus = get_marital_status();
  
      $dob = $row->dob;
      $today = date("Y-m-d");
      $diff = date_diff(date_create($dob), date_create($today));
      $age = $diff->format('%Y years');
      $age_month = $diff->format('%Yyrs,%m months');


    $myID = $row->id;
    $queryAtt = "SELECT count(*) AS T_MY_ATT FROM register where member_id=:member_id";
    $totalAtt = query_row($queryAtt, ['member_id' => $myID]);
    $my_total_attentance = $totalAtt['T_MY_ATT'];
    
    $queryPresent = "SELECT count(*) AS T_MY_PRESENT FROM register where member_id=:member_id && status=:status";
    $totalP = query_row($queryPresent, ['member_id' => $myID,'status'=>'PRESENT']);
    $my_total_present = $totalP['T_MY_PRESENT'];

    $queryAbsent = "SELECT count(*) AS T_MY_ABSENT FROM register where member_id=:member_id && status=:status";
    $totalAbs = query_row($queryAbsent, ['member_id' => $myID,'status'=>'ABSENT']);
    $my_total_absent = $totalAbs['T_MY_ABSENT'];

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
      padding: 5px;
      display: flex;
      flex-direction: row;
     /* box-shadow: 0px 0px 10px #aaa;*/
      border-radius: 10px;
    }

    .search{
      width: 90%;
      padding: 10px;
      border-radius: 10px;
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
  
  .tabs-holder{
    display: flex;
    margin-top: 10px; 
    margin-bottom: 10px;
    justify-content: center;
    text-align: center;
    flex-wrap: wrap;
  }

  .my-tab{
    flex:1;
    border-bottom: solid 2px #ccc;
    padding-top: 10px;
    padding-bottom: 10px;
    cursor: pointer;
    user-select: none;
    min-width: 150px;

  }
  .my-tab:hover{
    color: #4154f1;
  }

  .active-tab{
    color: #4154f1;
    border-bottom: solid 2px #4154f1;
  }

  .hide{
    display: none;
  }

  .loader{
    position: relative;
    width:200px;
    height:200px;
    left: 50%;
    top: 50%;
    transform: translateX(-50%);
    opacity: 0.5;
  }

</style>

  
  <?php if(!empty($row)):?>

  <div class="page-titles">
       <div class="col-sm-6 p-md-0">
      <div class="welcome-text">
          <h4><?=$row->firstname?>'s Profile</h4>
      </div>
  </div>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=ROOT?>/admin/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item">Profile</li>
          <li class="breadcrumb-item"><?=esc(ucfirst(set_value('role',$row->role_name ?? '')))?></li>
          <li class="breadcrumb-item active"><?=esc($row->firstname)?> <?=esc($row->lastname)?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="container-fluid">
      <div class="row">
        <?php if(!empty($row)):?>

          <div class="mx-auto col-md-3">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">            
            <img src="<?=get_avatar($row->image)?>" class="w-100 rounded-circle" style="object-fit: fill; width: 90px; max-width:90px;height:90px;">
              <h4 class="text-center"><?=esc($row->firstname)?> <?=esc($row->lastname)?></h4>
              <h5><?=esc(set_value('role',$row->role_name ?? ''))?></h5>
              <h5><?=esc($row->phone )?></h5>
              <small><?=esc($row->job )?></small>
              <small><?=$age?></small>

              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="text-info mx bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="text-info mx bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="text-info mx bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="text-info mx bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

      <?php endif;?>

        <div class="col-md-9">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                
                <li class="nav-item mx-2">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link active bi bi-eye-fill" data-bs-toggle="tab" data-bs-target="#profile-view" id="profile-view-tab">View Profile</button>
                </li>

                <li class="nav-item mx-2">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link bi bi-search" data-bs-toggle="tab" data-bs-target="#search" id="search-tab">Search Members</button>
                </li>

                <li class="nav-item mx-2">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" action='search' class="nav-link bi bi-book-half" data-bs-toggle="tab" data-bs-target="#attendance" id="attendance-tab"><?=$row->firstname?>'s Attendance</button>
                </li>

                <li class="nav-item mx-2">
                  <a href="<?=ROOT?>/admin/profile_edit/<?=$row->id?>">
                    <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link bi bi-pencil">Edit Profile</button>
                  </a>
                </li>

                <li class="nav-item mx-2">
                  <a class="justify-content-right float-right" href="<?=ROOT?>/admin/make_pdf/download_profile/<?=$row->id?>">
                    <button class="nav-link bi bi-download"> Download profile</button>
                  </a>
                </li>

              </ul>

        <!-- Profile overview -->

        <!--end tabs-->

        <div oninput="something_changed(event)" >
          <div id="tabs-content">
            <!-- tabs content displayed -->

          </div>
        </div>
        <!--end div-tabs-->

                <div class="tab-content">               

                <div class="tab-pane fade profile-view pt-3 show active" id="profile-view">
                  <!-- Profile Edit Form -->   

                      <?php include views_path('admin/profile-tabs-contents/view_profile') ?>                   
                    
                </div>

                 <div class="tab-pane fade profile-edit pt-3 show" id="profile-edit">
                  <!-- Profile Edit Form -->

                  <?php include views_path('admin/profile-tabs-contents/edit_profile') ?> 

                </div>

                 <div class="tab-pane fade attendance pt-3 show" id="attendance">
                  <!-- Profile Edit Form -->

                  <?php include views_path('admin/profile-tabs-contents/attendance') ?> 

                  
                </div>

                <div class="tab-pane fade search pt-3 show" id="search">
                  <!-- Profile Edit Form -->

                  <?php include views_path('admin/profile-tabs-contents/search') ?> 
                  

                </div>
              </div>
              </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
    </section>

  <?php else:?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                That profile was not found!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  <?php endif;?>

<script>
  
  
  var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab"): "#profile-overview";

  /*function show_tab(tab_name)
  {
    const someTabTriggerEl = document.querySelector(tab_name +"-tab");
    const tab = new bootstrap.Tab(someTabTriggerEl);

    tab.show();

  }*/

  var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab"): "intended-learners";
  var dirty = false;
  var get_meta = true;

  function show_tab(tab_name)
  {
 
    var contentDiv = document.querySelector("#tabs-content");
    // show_loader(contentDiv);

    //change active tab
    var div = document.querySelector("#"+tab_name);
    var children = div.parentNode.children;
    for (var i = 0; i < children.length; i++) {
      children[i].classList.remove("active-tab");
    }

    div.classList.add("active-tab");


    send_data({
      tab_name:tab,
      data_type:"read",
    });

    disable_save_button(false);

  }

  function set_tab(tab_name)
  {
    tab = tab_name;
    sessionStorage.setItem("tab", tab_name);
  }

  function show_loader(item)
  {
    item.innerHTML = '<img class="loader" src="<?=ROOT?>/assets/images/loader2.gif">';
  }

  show_tab(tab);

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
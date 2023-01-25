<?php $this->view('admin/admin-header',$data) ?>

<?php

use model\Auth;
$categories = get_categories();
$roles = get_roles();

include('stat.inc.php'); 

?>

<div class="pagetitle">
      <h1>Groups</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=ROOT?>/admin/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Locals</li>
        </ol>
        <label class="fw-bolder badge text-secondary"><?=strtoupper('District Membership Overview')?></label>
        <ul class="breadcrumb bg-light my-0 py-0">

          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder">
              <i class="bi bi-people-fill px-2 fs-6"></i></div>Total <b class="mx-2 mb-0 text-danger"><?=$resAllMembers['num'] ?? 0?></b>
              <div class="filter col float-end">
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
          </li>

          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto"><i class="bx bx-male px-1 fs-6"></i></div>Males <b class="mx-3 text-danger"><?=$resMale['num'] ?? 0?></b>
            <div class="filter col float-end">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start"><h6>Male</h6></li>
              <li><a class="dropdown-item" href="#"><label class="col-6">Adult</label><span class="col-6  text-primary fw-bolder"><?=$resMaleAdult ?? 0?></span></a></li>
              <li class="mb-0 pb-0"><a class="dropdown-item" href="#"><label class="col-6">Child</label><span class="col-6  text-primary fw-bolder border-bottom"><?=$resMaleChild['num'] ?? 0?></span></a></li>
              <li><a class="dropdown-item" href="#"><label class="col-6 text-danger">Total</label><span class="col-6  text-danger fw-bolder" style="border-bottom:2px solid red; border-top:2px solid red;"><?=$resMale['num'] ?? 0?></span></a></li>
            </ul>              
          </div>
          </li>

          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto">
              <i class="bx bx-female px-1 fs-6"></i>
            </div>Females <b class="mx-3 text-danger"><?=$resFemale['num'] ?? 0?></b>
            <div class="filter col float-end">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Female</h6>
              </li>

              <li><a class="dropdown-item" href="#">
                <label class="col-6">Adult</label><span class="col-6 fw-bolder text-primary"><?=$resFemaleAdult ?? 0?></span></a>
              </li>
              <li class="mb-0 pb-0"><a class="dropdown-item" href="#">
                <label class="col-6">Child</label><span class="col-6  text-primary fw-bolder border-bottom text-primary"><?=$resFemaleChild['num'] ?? 0?></span></a>
              </li>
              <li><a class="dropdown-item" href="#">
                <label class="col-6 text-danger">Total</label><span class="col-6  text-danger fw-bolder" style="border-bottom:2px solid red"><?=$resFemale['num'] ?? 0?></span></a>
              </li>
              </ul>
              </div>
          </li>

          <li class="card-title mx-auto d-flex">
              <ul class="nav nav-tabs fw-bolder rounded mb-0">

                <li class="nav-item">                 
                    <label onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" class="nav-link active" data-bs-toggle="tab" data-bs-target="#visitor" id="visitor-tab" title="Visitors"><i class="bx bx-street-view text-info"></i>Visitors</label>
                </li>

                <li class="nav-item">
                  <button class="fw-bolder btn btn-outline-primary" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" data-bs-toggle="dropdown" title="View by Groups"><i class="text-info bi bi-list"></i>Groups<i class="bi bi-caret-down-fill"></i></button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      
                    
                    <li class="nav-item">                 
                        <label onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" title="Adults (36-60yrs)" class="nav-link" data-bs-toggle="tab" data-bs-target="#adult" id="adult-tab"><i class="bx bx-street-view text-info"></i>Adults</label>
                    </li>
                    <li class="nav-item">                 
                        <label onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" title="Aged (60+yrs)" class="nav-link" data-bs-toggle="tab" data-bs-target="#aged" id="aged-tab"><i class="bx bx-street-view text-info"></i>Aged</label>
                    </li>
                    <li class="nav-item">                 
                        <label onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" class="nav-link" data-bs-toggle="tab" data-bs-target="#child" id="child-tab"><i class="bx bx-street-view text-info"></i>Children</label>         
                    </li>
                      <li class="nav-item">                 
                        <label onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" class="nav-link" data-bs-toggle="tab" data-bs-target="#deacon" id="deacon-tab"><i class="bx bx-street-view text-info"></i>Deacons</label>           
                      </li>
                      <li class="nav-item">                 
                        <label onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" class="nav-link" data-bs-toggle="tab" data-bs-target="#deaconess" id="deaconess-tab"><i class="bx bx-street-view text-info"></i>Deaconesses</label>           
                      </li>
                      <li class="nav-item">                 
                        <label onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" class="nav-link" data-bs-toggle="tab" data-bs-target="#elder" id="elder-tab"><i class="bx bx-street-view text-info"></i>Elders</label>           
                      </li>
                      <li class="nav-item">                 
                        <label onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" class="nav-link" data-bs-toggle="tab" data-bs-target="#member" id="member-tab"><i class="bx bx-street-view text-info"></i>Members</label>
                    </li>
                    <li class="nav-item">                 
                        <label onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" title="Teens (13-19yrs)" class="nav-link" data-bs-toggle="tab" data-bs-target="#teen" id="teen-tab"><i class="bx bx-street-view text-info"></i>Teens</label>
                    </li>
                    <li class="nav-item">                 
                        <label onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" title="Young Adults (20-35yrs)" class="nav-link" data-bs-toggle="tab" data-bs-target="#young_adult" id="young_adult-tab"><i class="bx bx-street-view text-info"></i>Young Adults</label>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

          <li class="card-title">
            <?php if(user_can('edit_slider_images')):?> 

                <a href="<?=ROOT?>/membersignup">
                  <button class="btn btn-primary btn-md float-end" title="register new member">+ New Member</button>
                </a>
            <?php endif;?>
          </li>
        </ul>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">
      <div class="row">

        <div class="col">

          <div class="card">
            <div class="card-body">
              <!-- Bordered Tabs -->
              <div class="tab-content">
        <!-- Profile overview -->

                 <div class="tab-pane fade visitor pt-3 show active" id="visitor">
                  <!-- Profile Edit Form -->

                      <?php include views_path('admin/groups/visitor') ?>
                  <!-- End Profile Edit Form -->

                </div>
                <div class="tab-pane fade adult pt-3 show " id="adult">
                  <!-- Change Password Form -->
                    
                    <?php include views_path('admin/groups/adult') ?>

                </div>
                <div class="tab-pane fade aged pt-3 show " id="aged">
                  <!-- Change Password Form -->
                    
                    <?php include views_path('admin/groups/aged') ?>

                </div>

                <div class="tab-pane fade child pt-3 show " id="child">
                  <!-- Change Password Form -->
                    
                    <?php include views_path('admin/groups/child') ?>

                </div>
                <div class="tab-pane fade deacon pt-3 show " id="deacon">
                  <!-- Change Password Form -->
                    
                    <?php include views_path('admin/groups/deacon') ?>

                </div>
                <div class="tab-pane fade deaconess pt-3 show " id="deaconess">
                  <!-- Change Password Form -->
                    
                    <?php include views_path('admin/groups/deaconess') ?>

                </div>
                <div class="tab-pane fade elder pt-3 show " id="elder">
                  <!-- Change Password Form -->
                    
                    <?php include views_path('admin/groups/elder') ?>

                </div>
                <div class="tab-pane fade member pt-3 show " id="member">
                  <!-- Change Password Form -->
                    
                    <?php include views_path('admin/groups/member') ?>

                </div>
                <div class="tab-pane fade teen pt-3 show " id="teen">
                  <!-- Change Password Form -->
                    
                    <?php include views_path('admin/groups/teen') ?>

                </div>
                <div class="tab-pane fade young_adult pt-3 show " id="young_adult">
                  <!-- Change Password Form -->
                    
                    <?php include views_path('admin/groups/young_adult') ?>

                </div>
                                 
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
    </section>
  
<script>
  
  
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

<?php $this->view('admin/admin-footer',$data) ?>
<?php $this->view('admin/admin-header',$data) ?>

<?php

use model\Auth;
$categories = get_categories();
$positions = get_positions();

  ?>
  
   <?php include('stat.inc.php') ?>

  <div class="pagetitle">
      <h1>Leaders</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=ROOT?>/admin/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item">Members</li>
          <li class="breadcrumb-item active">Leaders</li>
        </ol>
        <label class="fw-bolder badge text-secondary"><?=strtoupper('District Leaders Overview')?></label>
        <ul class="breadcrumb bg-light my-0 py-0">

          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder">
              <i class="bi bi-people-fill"></i></div>Total<b class="mx-2 mb-0 text-danger"><?=$totalLeaders ?? 0?></b>
              <div class="filter col float-end">
              
          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto"><i class="bx bx-male"></i></div>Elders <b class="mx-3 text-danger"><?=$resElder['num'] ?? 0?></b>
            <div class="filter col float-end">
          </div>
          </li>
          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto"><i class="bx bx-male"></i></div>Deacons <b class="mx-3 text-danger"><?=$resDeacon['num'] ?? 0?></b>
            <div class="filter col float-end">
            </div>
          </li>
          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto"><i class="bx bx-female"></i></div>Dcnss <b class="mx-3 text-danger"><?=$resDeaconess['num'] ?? 0?></b>
            <div class="filter col float-end">
            </div>
          </li>
          <li class="card-title mx-auto d-flex">
            <div class="card-icon rounded-circle text-primary fw-bolder mx-auto"><i class="bx bx-female"></i></div>Memb. <b class="mx-3 text-danger"><?=$resMember['num'] ?? 0?></b>
            <div class="filter col float-end">
            </div>
          </li>

          <li class="card-title mx-auto d-flex">
              <ul class="nav nav-tabs fw-bolder border-bottom rounded mb-0">

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" class="nav-link active border " data-bs-toggle="tab" data-bs-target="#tabular-view" id="tabular-view-tab">Tabular View</button>
                </li>

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" class="nav-link border " data-bs-toggle="tab" data-bs-target="#grid-view" id="grid-view-tab">Grid View</button>
                </li>

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" class="nav-link border " data-bs-toggle="tab" data-bs-target="#leaders" id="leaders-tab">Leaders</button>
                </li>

                <li class="nav-item">
                  <button class="fw-bolder btn btn-outline-primary" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" data-bs-toggle="dropdown">Local View <i class="bi bi-caret-down-fill"></i></button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow menu-scrollBar">
                    <?php if(!empty($categories)):?>
                     <?php foreach($categories as $cat):?>
                      <li class="nav-item">                 
                        <label onclick="set_tab(this.getAttribute('data-bs-target'))" style="border-radius: 50px; padding-top: 1px; padding-bottom: 1px;" class="nav-link" data-bs-toggle="tab" data-bs-target="#<?=$cat->slug?>" id="<?=$cat->slug?>-tab"><?=$cat->category?></label>             
                      </li>
                    <?php endforeach;?>
                    <?php endif;?>
                  </ul>
                </li>
              </ul>
            </li>

          <li class="card-title">
            <?php if(user_can('edit_slider_images')):?> 

                <a href="<?=ROOT?>/membersignup">
                  <button class="btn btn-primary btn-md float-end">+ New Member</button>
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

                <div class="tab-pane fade tabular-view pt-3 show active" id="tabular-view">
                  <!-- Profile Edit Form -->

                      <?php include views_path('admin/leaders-view/tabular') ?>
                  <!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade grid-view pt-3 show" id="grid-view">
                  <!-- Profile Edit Form -->

                      <?php include views_path('admin/leaders-view/grid') ?>
                  <!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade leaders pt-3 show" id="leaders">
                  <!-- Profile Edit Form -->

                      <?php include views_path('admin/leaders-view/leaders') ?>
                  <!-- End Profile Edit Form -->

                </div>

                <?php if(!empty($categories)):?>
                 <?php foreach($categories as $cat):?>
                <div class="tab-pane fade <?=$cat->slug?> pt-3 show " id="<?=$cat->slug?>">
                  <!-- Change Password Form -->
                    
                    <?php include views_path('admin/leaders-view/'.$cat->slug) ?>

                </div>
                <?php endforeach;?>
                <?php endif;?>
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
    </section>

    <script>
  
  
  var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab"): "#profile-overview";
  var uploading = false;

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

  
  window.onload = function(){

    show_tab(tab);
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
        alert(obj.message);
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
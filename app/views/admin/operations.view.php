<?php $this->view('admin/admin-header',$data) ?>
  <?php if(!empty($row)):?>

  <div class="pagetitle">
      <h1>App Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=ROOT?>/admin/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?=ROOT?>/admin/dashboard">Extras</a></li>
          <li class="breadcrumb-item"><a href="<?=ROOT?>/admin/dashboard">App Details</a></li>
          <li class="breadcrumb-item active"><?=esc(ucfirst(set_value('role',$row->appname ?? '')))?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-md-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <?php if(!empty($row->image)):?>              
            <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded-circle" style="object-fit: fill; width: 90px; max-width:90px;height:90px;">
          <?php else:?>
            <img src="<?=get_profile_image($row->image)?>" class="rounded-circle" style="object-fit: fill; width: 90px; max-width:90px;height:90px;">
          <?php endif;?>
              <h4 class="text-center fw-bolder text-danger border-bottom"><?=esc($row->appname)?></h4>
              <h3 class="text-info"><?=esc(set_value('church_name',$row->church_name ? :''))?></h3>
              <h3><?=esc(set_value('district_name',$row->district_name ? :'')) ?></h3>
              <small class="fst-italic"><?=esc(set_value('location',$row->location ?? ''))?></small>

              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-md-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <!-- <ul class="nav nav-tabs nav-tabs-bordered">-->
        <!-- Profile overview -->

                <div class="tab-pane fade profile-edit pt-3 show active" id="profile-edit">
                  <!-- Profile Edit Form -->

                  <form method="post" enctype="multipart/form-data">

                    <div class="row mb-3 ">
                      <div class="col-6 mx-auto rounded">
                        <label class="d-flex rounded js-profile-image-input mx-auto" title="Click to Upload new profile image">
                          <input class="js-profile-image-input" onchange="load_image(this.files[0])" type="file" name="image" style="display: none;">
                          <img class="js-image-preview bg-light shadow rounded text-center my-auto" src="<?=ROOT?>/<?=$row->image?>" alt="App Logo" style="width:200px;max-width:200px;height:200px;object-fit: cover; font-size: 18px; border-radius: 50%;">
                          <div class="js-filename m-2 ">Selected File: None</div>
                        </label>
                        <div class="pt-2">
                          <label class="btn btn-primary btn-sm" title="Upload new profile image" >
                            <i class="text-white bi bi-upload"></i>
                            <input class="js-profile-image-input" onchange="load_image(this.files[0])" type="file" name="image" style="display: none;">
                          </label>

                          <?php if(!empty($errors['image'])):?>
                            <small class="js-error-image text-danger"><?=$errors['image']?></small>
                          <?php endif;?>
                        </div>
                      </div>

                    </div>                      
                      <div class="row mb-3 col-12">
                        <div class="row mb-3">
                          <label for="appname" class="col-md-4 col-lg-3 col-form-label">App Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="appname" type="text" class="form-control" id="appname" value="<?=set_value('appname',$row->appname)?>">
                          </div>

                          <?php if(!empty($errors['appname'])):?>
                            <small class="js-error-appname text-danger"><?=$errors['appname']?></small>
                          <?php endif;?>
                          <small class="js-error-appname text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="district_name" class="col-md-4 col-lg-3 col-form-label">Branch Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="district_name" type="text" class="form-control" id="district_name" value="<?=set_value('district_name',$row->district_name)?>">
                          </div>

                          <?php if(!empty($errors['district_name'])):?>
                            <small class="js-error-district_name text-danger"><?=$errors['district_name']?></small>
                          <?php endif;?>
                          <small class="js-error-district_name text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="church_name" class="col-md-4 col-lg-3 col-form-label">Company Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="church_name" type="text" class="form-control" id="church_name" value="<?=set_value('church_name',$row->church_name)?>">
                          </div>

                          <?php if(!empty($errors['church_name'])):?>
                            <small class="js-error-church_name text-danger"><?=$errors['church_name']?></small>
                          <?php endif;?>
                          <small class="js-error-church_name text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="location" class="col-md-4 col-lg-3 col-form-label">Location</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="location" type="text" class="form-control" id="location" value="<?=set_value('location',$row->location)?>">
                          </div>

                          <?php if(!empty($errors['location'])):?>
                            <small class="js-error-location text-danger"><?=$errors['location']?></small>
                          <?php endif;?>
                          <small class="js-error-location text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="email" type="text" class="form-control" id="email" value="<?=set_value('email',$row->email)?>" placeholder="enter email">
                          </div>

                          <?php if(!empty($errors['email'])):?>
                            <small class="js-error-email text-danger"><?=$errors['email']?></small>
                          <?php endif;?>
                          <small class="js-error-email text-danger"></small>
                        </div> 

                        <div class="row mb-3">
                          <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="phone" value="<?=set_value('phone',$row->phone)?>" placeholder="enter phone">
                          </div>

                          <?php if(!empty($errors['phone'])):?>
                            <small class="js-error-phone text-danger"><?=$errors['phone']?></small>
                          <?php endif;?>
                          <small class="js-error-phone text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="address_box" class="col-md-4 col-lg-3 col-form-label">Box Address</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="address_box" type="text" class="form-control" id="address_box" value="<?=set_value('address_box',$row->address_box)?>" placeholder="enter box address">
                          </div>

                          <?php if(!empty($errors['address_box'])):?>
                            <small class="js-error-address_box text-danger"><?=$errors['address_box']?></small>
                          <?php endif;?>
                          <small class="js-error-address_box text-danger"></small>
                        </div>

                        <div class="row mb-3">
                          <label for="bank_name" class="col-md-4 col-lg-3 col-form-label">Bank Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="bank_name" type="text" class="form-control" id="bank_name" value="<?=set_value('bank_name',$row->bank_name)?>" placeholder="enter bank name">
                          </div>

                          <?php if(!empty($errors['bank_name'])):?>
                            <small class="js-error-bank_name text-danger"><?=$errors['bank_name']?></small>
                          <?php endif;?>
                          <small class="js-error-bank_name text-danger"></small>
                        </div> 

                        <div class="row mb-3">
                          <label for="bank_account" class="col-md-4 col-lg-3 col-form-label">Bank account</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="bank_account" type="text" class="form-control" id="bank_account" value="<?=set_value('bank_account',$row->bank_account)?>" placeholder="enter bank account">
                          </div>

                          <?php if(!empty($errors['bank_account'])):?>
                            <small class="js-error-bank_account text-danger"><?=$errors['bank_account']?></small>
                          <?php endif;?>
                          <small class="js-error-bank_account text-danger"></small>
                        </div>                  

                    <div class="js-prog progress my-4 hide">
                      <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Saving.. 50%</div>
                    </div>
                    </div>

                    <div class="text-center">
                      <a href="<?=ROOT?>/admin/dashboard">
                        <button type="button" class="btn btn-primary  float-start">Back</button>
                      </a>
                      <button type="button" onclick="save_profile(event)" type="submit" class="btn btn-danger float-end">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
    </section>

  <?php else:?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                App details found!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

  <?php endif;?>

<script>
  
  
  var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab"): "#profile-overview";

 /* function show_tab(tab_name)
  {
    const someTabTriggerEl = document.querySelector(tab_name +"-tab");
    const tab = new bootstrap.Tab(someTabTriggerEl);

    tab.show();

  }*/

  /*function set_tab(tab_name)
  {
    tab = tab_name;
    sessionStorage.setItem("tab", tab_name);
  }*/

  function load_image(file)
  {

    document.querySelector(".js-filename").innerHTML = "Selected File: " + file.name;

    var mylink = window.URL.createObjectURL(file);
    document.querySelector(".js-image-preview").src = mylink;
  }

  window.onload = function(){

    /*show_tab(tab);*/
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
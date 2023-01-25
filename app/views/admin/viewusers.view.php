<?php $this->view('admin/admin-header',$data) ?>

<?php
  use \Model\Auth;
  $categories = get_categories();
?>

<?php

      $dob = $row->dob;
      $today = date("Y-m-d");
      $diff = date_diff(date_create($dob), date_create($today));
      $age = $diff->format('%Y,%m years');

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



<div class="container d-flex">
    <div class="col-lg-7 col-md-11 col-12 pt-4  mx-auto align-items-center shadow rounded bg-light mb-5">
      <div class=" px-3 py-2 rounded text-light bg-secondary" style="">
        <div class="row d-flex mx-0 px-0">
          <div class="col-8 my-auto">
            <center class="border-bottom fw-bolder text-center mx-auto text-light">About <?=ucfirst($row->firstname)?> <?=ucfirst($row->lastname)?></center>
            <p class="small fst-italic border-bottom"><?= ucfirst($row->firstname ).' '. ucfirst($row->lastname)?> <?='('.ucfirst($row->role_name ? :'No role').') of '.ucfirst($row->category_id). ' Assembly serves in the church as '?> <?=$row->position_id ? :$row->role_name?><?='. '.ucfirst($row->firstname). ' was born on the '.get_date($row->dob).' to '.$row->mother_name.' (Mother) and '. $row->father_name." (Father). Currently ".$row->firstname."'s occupation is ". $row->job.' and stays at '.$row->residence.' in Sampa-Jaman North District of the Bono Region, Ghana.'?></p>
          <!--  <div class="badge bg-info"><?=$age?></div> -->
          </div>
          <div class="col-4 float-end my-auto">
          <?php if(!empty($row->image)):?>
              <img src="<?=get_profile_image($row->image)?>" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
            <?php elseif($row->gender ==="female" AND $age < 13):?>
              <img src="<?=ROOT?>/assets/images/girl-avatar2.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
            <?php elseif($row->gender ==="female" AND $age > 13 OR $age === 13):?>
              <img src="<?=ROOT?>/assets/images/female.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
            <?php elseif($row->gender === "male" AND $age < 13):?>
              <img src="<?=ROOT?>/assets/images/boy-avatar2.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
              <?php elseif($row->gender === "male" AND $age > 13 OR $age === 13):?>
              <img src="<?=ROOT?>/assets/images/male.jpg" class="w-100 rounded border mx-auto" style="object-fit: fill; width: 180px; max-width:180px;height:150px; border: 2px solid black;" alt="">
            <?php endif;?>
          <div class="badge text-light bg-primary"><?=$age?></div>
        </div> 
        <br>
        
        </div>
       <div class="table table-hover bg-light text-dark mx-0 px-3 rounded mb-3 mt-2" id="profile-overview" style="font-size: 16px;">            

              <div class="row d-flex">
              <div class="row  col-lg-6 mx-0 p-2 shadow ">
            <!-- personal Details -->
                <h5 class="text-primary">Personal Details</h5><hr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label ">Name: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->firstname ? :'Not available')?> <?=esc($row->lastname ? :'Not available')?></div>
              </tr>              

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Role: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->role_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->position_id ? :'No position')?>)</span></div>
              </tr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">DOB: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->dob ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Gender: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->gender ? :'Not available')?></div>
              </tr>

               <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Contact: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->phone ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Email: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->email ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">M Status: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->marital_status_id ? :'Not available')?></div>
              </tr>
              
              <?php if($row->marital_status_id === 'Married'):?>
              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Spouse Name: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->spouse_name ? :'Not available')?>
                  <span class="fst-italic text-muted">(<?=esc($row->spouse_phone ? :'Contact Unknowm')?>)</span>
                </div>
              </tr>

              

              <?php if(!empty($row->children)):?> 
              <tr class="row">
                <strong class="col-4 col-lg-4 col-md-4 col-sm-5 label">Children </strong>
                <div class="col-8 col-lg-8 col-md-8 col-sm-7"><?=esc($row->children ? :'Not available')?></div>
              </tr>
              <?php endif;?> 
            <?php endif;?>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Residence: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->residence ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">GPS Address: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->gps_address ? :'Not available')?></div>
              </tr>

            </div>

        <!-- Other Details -->
            <div class="row  col-lg-6 mx-0 p-2 shadow ">

                <h5 class="card-title">Other Details</h5><hr>

                <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Water Baptized?: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->water_baptized ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">HolyGhost Baptized?: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->holyghost_baptized ? :'Not available')?></div>

              <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Attends Communion?: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->communicant_status ? :'Not available')?></div>
              </tr>

                <tr class="row">
                <strong class="col-lg-4 col-md-4 col-5 label">Occupation: </strong>
                <div class="col-lg-8 col-md-8 col-7"><?=esc($row->job ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-4 col-lg-4 col-md-4 col-sm-5 label ">Hometown:</strong>
                <div class="col-8 col-lg-8 col-md-8 col-sm-7 text-wrap"><?=esc($row->hometown ? :'Not available')?></div>
              </tr>

              <tr class="row">
                <strong class="col-4 col-lg-4 col-md-4 col-sm-5 label">Father:</strong>
                <div class="col-8 col-lg-8 col-md-8 col-sm-7 text-wrap"><?=esc($row->father_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->father_phone ? :'Contact Unknowm')?>)</span>
                </div>
              </tr>

              <tr class="row">
                <strong class="col-4 col-lg-4 col-md-4 col-sm-5 label">Mother:</strong>
                <div class="col-8 col-lg-8 col-md-8 col-sm-7 text-wrap"><?=esc($row->mother_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->mother_phone ? :'Contact Unknowm')?>)</span>
                </div>
              </tr>

              <tr class="row">
                <strong class="col-4 col-lg-4 col-md-4 col-sm-5 label text-wrap">Emergency Contact Person:</strong>
                <div class="col-8 col-lg-8 col-md-8 col-sm-7 text-wrap"><?=esc($row->emergecy_name ? :'Not available')?> <span class="fst-italic text-muted">(<?=esc($row->emergecy_contact ? :'Contact Unknowm')?>)</span>
                </div>
              </tr>
              
              <tr class="row">
                <strong class="col-4 col-lg-4 col-md-4 col-sm-5 label">Registered on:</strong>
                <div class="col-8 col-lg-8 col-md-8 col-sm-7 text-wrap"><?=get_date($row->date ?? '<div class="text-danger fs-5 fw-lighter">Not available</div>')?></div>
              </tr>

            </div>
            </div>
        
      </div>
    <div class="row">              
      <div class="col-6">
        <a href="<?=ROOT?>/admin/groups">
          <button type="button" class="btn btn-outline-warning col-12 float-start px-5 fw-bolder">Back</button>
        </a>
      </div>
      <div class="col-6">
        <?php if(user_can('edit_slider_images')):?>
        <a href="<?=ROOT?>/admin/profile/<?=$row->id?>">
          <label type="button" class="btn btn-primary col-12 float-end fw-bolder" style="border:1px solid gray"><i class="bi bi-pencil-square text-light"></i> Edit</label> 
        </a>
    <?php endif;?>
      </div>

      <a class="justify-content-right float-right" href="<?=ROOT?>/admin/make_pdf/download_profile      ">
        <button class="btn btn-secondary bi bi-download fw-bolder"> Download form</button>
      </a>          
    </div>
    </div>
  </div> 
</div>

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
     
     str += `<a href='<?=ROOT?>/admin/viewusers/${obj[i].id}'><div>`+ num + '. ' + obj[i].firstname + ' ' + obj[i].lastname + "<small>" + ' ('+ obj[i].role_name +') '+ "</small>" +"</div></a>";
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
<?php $this->view('admin/admin-header',$data) ?>
 
<?php

//$data = file_get_contents("php://input")
if (count($_POST) > 0) {
  echo $_POST['text']; die;
}

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
      box-shadow: 0px 0px 10px #aaa;
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


<div class="search-div">
  <form>
    <h3>Search</h3>
    <input class="search js-search" oninput="get_data(this.value)" type="text" name="query" placeholder="Type something to Search" title="Enter search" autocomplete="false" autofocus="true">
    <i class="bi bi-search text-info fw-bolder" style="font-size: 20px; margin-left: -40px;"></i>
    <div class="results js-results hide">
    <div>
      
    </div>
    </div>
    <br><br>
  </form>
  <span class="form-info">
    <h3 class="border-bottom text-info">Hint:</h3>
    <p><h5 class="fw-bolder">You may search by:</h5> Firstname, Lastname, email, phone number, local assembly or marital status</span>
</div>

</body>

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
<?php $this->view('admin/admin-header',$data) ?>

 
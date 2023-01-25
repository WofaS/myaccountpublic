
<form>
  <?php csrf()?>
	<div class="col-sm-10 mx-auto">

		<div class="container-fluid h4 text-primary my-3"><strong>Course Messages</strong></div>

			
        <div class="input-group my-5">
          <span class="input-group-text text-wrap col-lg-2 col-3">Welcome Message</span>
          <textarea  class="form-control" aria-label="With textarea" name="welcome_message"><?=$row->welcome_message?></textarea>
          <small class="error error-welcome_message w-100 text-danger"></small>
        </div>

        <div class="input-group my-5">
          <span class="input-group-text text-wrap col-lg-2 col-3 ">Congratulations Message</span>
          <textarea  class="form-control" aria-label="With textarea" name="congratulations_message"><?=$row->congratulations_message?></textarea>
          <small class="error error-congratulations_message w-100 text-danger"></small>
        </div>

</form>
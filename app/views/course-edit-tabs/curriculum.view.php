<form>

  <?php csrf() ?>
  
	<div class="col-md-10 mx-auto">

		    <div  class="container-fluid h4 text-primary my-3"><b>Training Material(s)</b></div>
 
        <div class="my-4 row mb-1 border pb-4">
          <label for="inputPassword" class="col-12 col-form-label"><b>Here’s where you add training content—like lectures, training sections, assignments, and more. <br>Click a + icon on the left to get started.</b></label>
          <small>Start putting together your activity/program by creating sections, lectures and practice (quizzes, exercises and assignments).</small>
          
          <div class="col-sm-12 js-curriculum my-4" >

          </div>
          <small class="error error-welcome_message w-100 text-danger"></small>
        </div>
        <button onclick="curriculum.add_new('js-curriculum',{placeHolder:'Enter title',name:'curriculum'})" type="button" class="btn btn-sm btn-primary js-curriculum-add">+ Add section</button>
 
 
	</div>

</form>

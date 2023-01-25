<?php 

namespace Controller;

/**
 * signup class
 */

use \Model\Auth;

class MemberSignup extends Controller
{
	
	public function index()
	{
		$data = [];

		$id = $id ?? Auth::getId();
	
		$data['errors'] = [];

		$member = new \Model\Member();
		$role = new \Model\Role();
		$marital_status = new \Model\Marital_status_model();
		$position = new \Model\Position_model();
		$data['row'] = $row = $member->first(['id'=>$id]);

		$role = $role->findAll('asc');
		$position = $position->findAll('asc');
		$marital_status = $marital_status->findAll('asc');

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{

			$folder = "uploads/images/";
			if(!file_exists($folder))
			{
				mkdir($folder,0777,true);
				file_put_contents($folder."index.php", "<?php //silence");
				file_put_contents("uploads/index.php", "<?php //silence");
			}

			if($member->validate($_POST))
			{

				$allowed = ['image/jpeg','image/png'];

				if(!empty($_FILES['image']['name'])){

					if($_FILES['image']['error'] == 0){

						if(in_array($_FILES['image']['type'], $allowed))
						{
							//everything good
							$destination = $folder.time().$_FILES['image']['name'];
							move_uploaded_file($_FILES['image']['tmp_name'], $destination);

							resize_image($destination);
							$_POST['image'] = $destination;
							if(file_exists($row->image))
							{
								unlink($row->image);
							}

						}else{
							$member->errors['image'] = "This file type is not allowed";
						}
					}else{
						$member->errors['image'] = "Could not upload image";
					}
				}

				$_POST['date'] = date("Y-m-d H:i:s");
				$_POST['id'] = $_POST['id'];
				$_POST['position'] = $_POST['position'];
				$_POST['marital_status'] = $_POST['marital_status'];

				$member->insert($_POST);
			
				//message( ucfirst($_POST['firstname'])." has been added successfuly.<br> Thank you!!");
				//redirect('admin/dashboard');
			}


			if(empty($member->errors)){
				$arr['message'] =  ucfirst($_POST['firstname'])." has been added successfuly.<br> Thank you!!";
				redirect('admin/profile/'.$id);

			}else{
				$arr['message'] = "Please correct these errors";
				$arr['errors'] = $member->errors;
			}
			die;
		}

		$data['errors'] = $member->errors;
		$data['title'] = "Signup";

		$this->view('membersignup',$data);
	}
	
}
<?php 

namespace Controller;

/**
 * adminsignup class
 */
use \Model\Auth;
class Adminsignup extends Controller
{
	
	public function index()
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}
	
		$data['errors'] = [];

		$admin = new \Model\Admin();
		$marital_status = new \Model\Marital_status_model();
		$role = new \Model\Role();
		$position = new \Model\Position_model();

		$role = $role->findAll('asc');
		$position = $position->findAll('asc');
		$marital_status = $marital_status->findAll('asc');

		//show($role[0]);die;

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{

			if($admin->validate($_POST))
			{
				
				$_POST['date'] = date("Y-m-d H:i:s");

				$_POST['position'] = $_POST['position'];
				$_POST['marital_status'] = $_POST['marital_status'];
				$_POST['password'] = password_hash('password', PASSWORD_DEFAULT);
				$_POST['slug'] = str_to_url($_POST['category_id']);

				$admin->insert($_POST);
			
				message( ucfirst($_POST['firstname'])."'s account was successfuly created. Thank you!!");
				redirect('admin/admin');
			}
		}

		$data['errors'] = $admin->errors;
		$data['title'] = "Adminsignup";

		$this->view('adminsignup',$data);
	}
	
}
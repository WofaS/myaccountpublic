<?php 

namespace Controller;

/**
 * login class
 */
use Model\Auth;
use Model\Admin;

class Login extends Controller
{
	
	public function index()
	{

		$data['errors'] = [];

		$data['title'] = "Login";
		$admin = new Admin();

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//validate
			$row = $admin->first([
				'email'=>$_POST['email']
			]);

			if($row){

				if(password_verify($_POST['password'], $row->password))
				{
					//get admin role name
					$query = "select role from roles where id = :id limit 1";
					$id = $row->role;

					$role = $admin->query($query,['id'=>$id]);
					if($role)
					{
						$row->role_name = $role[0]->role;
					}else{
						$row->role_name = '';
					}

					//authenticate
					Auth::authenticate($row);
					message('Welcome '.ucfirst(Auth::getRole_name() ? : 'Admin'). ' '.ucfirst(Auth::getFirstname() ? : 'Admin'));
					redirect('admin/dashboard');
				}
			}

			$data['errors']['email'] = "Wrong email or password";
		}

		$this->view('login',$data);
	}
	
}
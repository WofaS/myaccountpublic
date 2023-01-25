<?php

namespace Controller;

use \Model\Auth;

if(!defined("ROOT")) die ("direct script access denied");

/**
 * category class
 */

class Category extends Controller
{
	
	public function index($slug = null)
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$user = new \Model\User();
		$category = new \Model\Category();
		$id = $id ?? Auth::getId();
		$user = new \Model\User();

		$data['title'] = "Category";

		//read all users 
		$query = "SELECT u.*,cat.category,cat.slug as catslug FROM users as u join categories as cat on cat.id = u.category_id where cat.slug = :slug";
		$data['rows'] = $user->query($query,['slug'=>$slug]);
		
		//read all users order by slug value
		$query = "select * from users where disabled = 0 order by slug desc";
		$data['slug'] = $user->query($query);

		$query1 = "select * from users where id =:id order by id desc";

		$data['row'] = $row = $user->findAll('desc');

		
		if($data['rows']){
			$data['first_row'] = $data['rows'][0];
			unset($data['rows'][0]);

			$total_rows = count($data['rows']);
			$half_rows = round($total_rows / 2);

			$data['rows1'] = array_splice($data['rows'], 0,$half_rows);
			$data['rows2'] = $data['rows'];

		}


		$this->view('category',$data);
	}

	
	
}
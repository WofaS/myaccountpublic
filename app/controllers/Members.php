<?php

namespace Controller;
use \Model\Auth;


if(!defined("ROOT")) die ("direct script access denied");

/**
 * home class
 */
use \Model\Slider;

class Member extends Controller
{
	
	public function index()
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$course = new \Model\Course();
		$category = new \Model\Category();

		$id = $id ?? Auth::getId();

		$user = new \Model\User();

		$data['row'] = $row = $user->findAll('desc');
			
			
		$data['title'] = "Members";
		$data['errors'] = $user->errors;


		//red all courses 
		$data['rows'] = $course->findAll('asc');	
		
		
		//red all courses order by trending value
		$query = "select * from courses where approved = 0 order by trending desc limit 10";
		$data['trending'] = $course->query($query);
		
		if($data['rows']){
			$data['first_row'] = $data['rows'][0];
			unset($data['rows'][0]);

			$total_rows = count($data['rows']);
			$half_rows = round($total_rows / 2);

			$data['rows1'] = array_splice($data['rows'], 0,$half_rows);
			$data['rows2'] = $data['rows'];

		}

		if(isset($_GET['find']))
	 		{
	 			$find = '%' . $_GET['find'] . '%';
	 			$query = "select * from users where id = :id && (firstname like :find) && (lastname like :find) && position = :position order by id desc";
	 			$arr['find'] = $find;
	 		}

		//load slider images
		$slider = new Slider();
		$slider->order = 'asc';
		$data['images'] = $slider->where(['disabled'=>0]);

		$this->view('members',$data);
	}
	
}
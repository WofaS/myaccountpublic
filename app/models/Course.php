<?php 

namespace Model;

/**
 * courses model
 */
class Course extends Model
{
	
	public $errors = [];
	protected $table = "courses";

	protected $afterSelect = [

		'get_category',
		'get_sub_category',
		'get_user',
		'get_price',
		'get_level',
		'get_language',
	];

	protected $beforeUpdate = [];

	protected $allowedColumns = [

		 'title',
		 'description',
		 'user_id',
		 'category_id',
		 'sub_category_id',
		 'level_id',
		 'language_id',
		 'subtitle',
		 'currency_id',
		 'price_id',
		 'promo_link',
		 'welcome_message',
		 'congratulations_message',
		 'primary_subject',
		 'course_promo_video',
		 'course_promo_video_tmp',
		 'course_image',
		 'course_image_tmp',
		 'tags',
		 'date',
		 'approved',
		 'published',
		 'csrf_code',
		 'trending',
		 'comment_id',
		 'reply_id',
		 
	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['title']))
		{
			$this->errors['title'] = "A Course title is required";
		}
		
		if(empty($data['primary_subject']))
		{
			$this->errors['primary_subject'] = "A primary subject is required";
		}
		

		if(empty($data['category_id']))
		{
			$this->errors['category_id'] = "A Category is required";
		}
 
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}


	public function edit_validate($data,$id = null,$tab_name = null)
	{
		$this->errors = [];

		if($tab_name == "course-landing-page")
		{
			if(empty($data['title']))
			{
				$this->errors['title'] = "A Course title is required";
			}
			
			if(empty($data['primary_subject']))
			{
				$this->errors['primary_subject'] = "A primary subject is required";
			}
			

			if(empty($data['category_id']))
			{
				$this->errors['category_id'] = "A category is required";
			}

			if(empty($data['subtitle']))
			{
				$this->errors['subtitle'] = "A summary is required";
			}

			if(empty($data['description']))
			{
				$this->errors['description'] = "A description of the course is required";
			}

		}else
		if($tab_name == "course-messages")
		{

		}

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}

	protected function get_category($rows)
	{
		$db = new \Database();
		if(!empty($rows[0]->category_id))
		{
			foreach ($rows as $key => $row) {
				
				$query = "select * from categories where id = :id limit 1";
				$cat = $db->query($query,['id'=>$row->category_id]);
				if(!empty($cat)){

					$rows[$key]->category_row = $cat[0];
				}
			}
		}

		return $rows;
	}

	protected function get_sub_category($rows){

		return $rows;
	}

	protected function get_user($rows){

		$db = new \Database();
		if(!empty($rows[0]->user_id))
		{
			foreach ($rows as $key => $row) {
				
				$query = "select firstname, lastname, image, role from users where id = :id limit 1";
				$user = $db->query($query,['id'=>$row->user_id]);
				if(!empty($user)){

					$user[0]->name = $user[0]->firstname . ' '. $user[0]->lastname;
					$rows[$key]->user_row = $user[0];
				}
			}
		}

		return $rows;
	}

	protected function get_price($rows){

		$db = new \Database();
		if(!empty($rows[0]->price_id))
		{
			foreach ($rows as $key => $row) {
				
				$query = "select * from prices where id = :id limit 1";
				$price = $db->query($query,['id'=>$row->price_id]);
				if(!empty($price)){

					$price[0]->name = $price[0]->name . ' ($'. $price[0]->price .')';
					$rows[$key]->price_row = $price[0];
				}
			}
		}

		return $rows;
	}

	protected function get_level($rows){


		return $rows;
	}

	protected function get_language($rows){

		return $rows;
	}



}
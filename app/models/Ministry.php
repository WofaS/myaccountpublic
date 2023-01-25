<?php 

namespace Model;

/**
 * ministry model
 */
class Ministry extends Model
{
	
	public $errors = [];
	protected $table = "ministries";

	protected $allowedColumns = [

		 	'ministry',
		 	'about',
		 	'slug',
		 	'disabled',
		 
	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['ministry']))
		{
			$this->errors['ministry'] = "A ministry's name is required";
		}
 
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}


}
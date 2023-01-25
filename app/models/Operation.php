<?php 

namespace Model;

/**
 * marital_status model
 */
class Operation extends Model
{
	
	public $errors = [];
	protected $table = "operations";

	protected $allowedColumns = [

		 	'appname',
		 	'location',
		 	'phone',
		 	'email',
		 	'bank_name',
		 	'bank_account',
		 	'address_box',
		 	'image',
		 	'district_name',
		 	'area_name',
		 	'church_name',
		 	'disabled',
		 
	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['appname']))
		{
			$this->errors['appname'] = "An appname is required";
		}
		if(empty($data['location']))
		{
			$this->errors['location'] = "An location is required";
		}

		if(empty($data['district_name']))
		{
			$this->errors['district_name'] = "A district name is required";
		}
		
		if(empty($data['church_name']))
		{
			$this->errors['church_name'] = "A church name is required";
		}
 
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}


}
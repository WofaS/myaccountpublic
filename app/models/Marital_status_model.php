<?php 

namespace Model;

/**
 * marital_status model
 */
class Marital_status_model extends Model
{
	
	public $errors = [];
	protected $table = "marital_status";

	protected $allowedColumns = [

		'marital_status',
		'disabled',
		 
	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['marital_status']))
		{
			$this->errors['marital_status'] = "A marital status is required";
		}
 
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}


}
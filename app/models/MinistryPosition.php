<?php 

namespace Model;

/**
 * ministrypositions model
 */
class Ministryposition extends Model
{
	
	public $errors = [];
	protected $table = "ministrypositions";

	protected $allowedColumns = [

		'position',
		'disabled',
		 
	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['position']))
		{
			$this->errors['position'] = "A position is required";
		}
 
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}


}
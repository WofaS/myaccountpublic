<?php 

namespace Model;

/**
 * marital_status model
 */
class Position_model extends Model
{
	
	public $errors = [];
	protected $table = "positions";

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
<?php 

namespace Model;

/**
 * marital_status model
 */
class LocalPosition_model extends Model
{
	
	public $errors = [];
	protected $table = "localpositions";

	protected $allowedColumns = [

		'position',
		'disabled',
		 
	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['position']))
		{
			$this->errors['position'] = "A local position is required";
		}
 
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}


}
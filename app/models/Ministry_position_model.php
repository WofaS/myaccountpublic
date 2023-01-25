<?php 

namespace Model;

/**
 * ministry_position_model
 */
class Ministry_position_model extends Model
{
	
	public $errors = [];
	protected $table = "ministrypositions";

	protected $allowedColumns = [

		'position',
		'position2',
		'position3',
		'position4',
		'position5',
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
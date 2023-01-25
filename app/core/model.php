<?php 

namespace Model;

/**
 * main model class
 */

use \Database;

class Model extends Database
{
	
	public $order = 'asc';
	public $limit = 100;
	public $offset = 0;

	protected $table = "";

	public function insert($data)
	{

		//remove unwanted columns
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);

		$query = "insert into " . $this->table;
		$query .= " (".implode(",", $keys) .") values (:".implode(",:", $keys) .")";

		$this->query($query,$data);

	}

	public function update($id,$data)
	{

		//remove unwanted columns
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);
		$query = "update ".$this->table." set ";

		foreach ($keys as $key) {
			$query .= $key ."=:" . $key . ","; 

		}

		$query = trim($query,",");
		$query .= " where id = :id ";
		
		$data['id'] = $id;
		$this->query($query,$data);

	}

	public function findAll()
	{

		$query = "select * from ".$this->table." order by id $this->order limit $this->limit offset $this->offset";
 
		$res = $this->query($query);

		if(is_array($res))
		{
			//run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach ($this->afterSelect as $func) {
					
					$res = $this->$func($res);
				}
			}

			return $res;
		}

		return false;

	}

	public function findAllByName()
	{

		$query = "select * from ".$this->table." order by firstname,lastname,dob,role $this->order limit $this->limit offset $this->offset";
 
		$res = $this->query($query);

		if(is_array($res))
		{
			//run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach ($this->afterSelect as $func) {
					
					$res = $this->$func($res);
				}
			}

			return $res;
		}

		return false;

	}

	public function findAllByPosition()
	{

		$query = "select * from ".$this->table." order by position,id $this->order limit $this->limit offset $this->offset";
 
		$res = $this->query($query);

		if(is_array($res))
		{
			//run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach ($this->afterSelect as $func) {
					
					$res = $this->$func($res);
				}
			}

			return $res;
		}

		return false;

	}

	public function findAllByStatus()
	{

		$query = "select * from ".$this->table." order by marital_status,id $this->order limit $this->limit offset $this->offset";
 
		$res = $this->query($query);

		if(is_array($res))
		{
			//run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach ($this->afterSelect as $func) {
					
					$res = $this->$func($res);
				}
			}

			return $res;
		}

		return false;

	}

	public function findAllByRole()
	{

		$query = "select * from ".$this->table." order by role,id $this->order limit $this->limit offset $this->offset";
 
		$res = $this->query($query);

		if(is_array($res))
		{
			//run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach ($this->afterSelect as $func) {
					
					$res = $this->$func($res);
				}
			}

			return $res;
		}

		return false;

	}

	public function delete(int $id):bool
	{

		$query = "delete from ".$this->table." where id = :id limit 1";
		$this->query($query,['id'=>$id]);

		return true;

	}

	public function where($data)
	{

		$keys = array_keys($data);

		$query = "select * from ".$this->table." where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}
 
 		$query = trim($query,"&& ");
 		$query .= " order by id $this->order limit $this->limit offset $this->offset";
		$res = $this->query($query,$data);

		if(is_array($res))
		{

			//run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach ($this->afterSelect as $func) {
					
					$res = $this->$func($res);
				}
			}

			return $res;
		}

		return false;

	}

	public function whereCategory($data)
	{

		$keys = array_keys($data);

		$query = "select * from ".$this->table." where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}
 
 		$query = trim($query,"&& ");
 		$query .= " order by category $this->order limit $this->limit offset $this->offset";
		$res = $this->query($query,$data);

		if(is_array($res))
		{

			//run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach ($this->afterSelect as $func) {
					
					$res = $this->$func($res);
				}
			}

			return $res;
		}

		return false;

	}

	public function wherePosition($data)
	{

		$keys = array_keys($data);

		$query = "select * from ".$this->table." where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}
 
 		$query = trim($query,"&& ");
 		$query .= " order by position $this->order limit $this->limit offset $this->offset";
		$res = $this->query($query,$data);

		if(is_array($res))
		{

			//run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach ($this->afterSelect as $func) {
					
					$res = $this->$func($res);
				}
			}

			return $res;
		}

		return false;

	}

	public function whereRole($data)
	{

		$keys = array_keys($data);

		$query = "select * from ".$this->table." where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}
 
 		$query = trim($query,"&& ");
 		$query .= " order by role $this->order limit $this->limit offset $this->offset";
		$res = $this->query($query,$data);

		if(is_array($res))
		{

			//run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach ($this->afterSelect as $func) {
					
					$res = $this->$func($res);
				}
			}

			return $res;
		}

		return false;

	}

	public function whereMember($data)
	{

		$keys = array_keys($data);

		$query = "select * from ".$this->table." where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}
 
 		$query = trim($query,"&& ");
 		$query .= " order by firstname,lastname,dob,role,category_id $this->order limit $this->limit offset $this->offset";
		$res = $this->query($query,$data);

		if(is_array($res))
		{

			//run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach ($this->afterSelect as $func) {
					
					$res = $this->$func($res);
				}
			}

			return $res;
		}

		return false;

	}

	public function first($data)
	{

		$keys = array_keys($data);

		$query = "select * from ".$this->table." where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}
 
 		$query = trim($query,"&& ");
 		$query .= " order by id $this->order limit 1";

		$res = $this->query($query,$data);

		if(is_array($res))
		{

			//run afterSelect functions
			if(property_exists($this, 'afterSelect'))
			{
				foreach ($this->afterSelect as $func) {
					
					$res = $this->$func($res);
				}
			}

			return $res[0];
		}

		return false;

	}

	

}
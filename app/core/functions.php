<?php

use \Model\Auth;

function csrf()
{
	$code = md5(time());
	$_SESSION['csrf_code'] = $code;
	echo "<input class='js-csrf_code' name='csrf_code' type='hidden' value='$code' />";
}

function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}

function get_date($date)
{
	return date("jS M, Y",strtotime($date));
}

function get_date_month2($date)
{
	return date("jS M",strtotime($date));
}

function get_date_month_day($date)
{
	return date("m d",strtotime($date));
}

function get_date_month($date)
{
	return date("m",strtotime($date));
}

function get_date_day($date)
{
	return date("d",strtotime($date));
}

function get_date_time($date)
{
	return date("jS M, Y (H:ia)",strtotime($date));
}

function set_value($key, $default = '')
{

	if(!empty($_POST[$key]))
	{
		return $_POST[$key];
	}else
	if(!empty($default))
	{
		return $default;
	}

	return '';
}

function get_image($file)
{

	if(file_exists($file))
	{
		return ROOT . "/". $file;
	}
		return ROOT."/assets/images/no-image1.jpg";
			
}

function get_video($file)
{

	if(file_exists($file))
	{
		return ROOT . "/". $file;
	}
		return ROOT."/assets/images/running_power.png";
			
}

function get_profile_image($file)
{

	if(file_exists($file))
	{
		return ROOT . "/". $file;
	}
		return ROOT ."/assets/images/no-image.jpg";		
			
}

function get_avatar($file)
{

	if(file_exists($file))
	{
		return ROOT . "/". $file;
	}

		else{
			return ROOT ."/assets/images/noface.jpg";
		}

	}
	

function set_select($key, $value, $default = '')
{

	if(!empty($_POST[$key]))
	{
		if($value === $_POST[$key]){
			return ' selected ';
		}
	}else
	if(!empty($default))
	{
		if($value == $default){
			return ' selected ';
		}
	}

	return '';
}

function set_checked($key, $value, $default = '')
{

	if(!empty($_POST[$key]))
	{
		if($value == $_POST[$key]){
			return ' checked ';
		}
	}else
	if(!empty($default))
	{
		if($value == $default){
			return ' checked ';
		}
	}

	return '';
}

function redirect($link)
{
	header("Location: ". ROOT."/".$link);
	die;
}

function message($msg = '',$erase = false)
{

	if(!empty($msg))
	{
		$_SESSION['message'] = $msg;
	}else{

		if(!empty($_SESSION['message']))
		{
			$msg = $_SESSION['message'];
			if($erase){
				unset($_SESSION['message']);
			}
			return $msg;
		}
	}

	return false;
}

function esc($str)
{
	return nl2br(htmlspecialchars($str));
}

function str_to_url($url)
{

   $url = str_replace("'", "", $url);
   $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
   $url = trim($url, "-");
   $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
   $url = strtolower($url);
   $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
   
   return $url;
}

function resize_image($filename,$max_size = 700)
{
 
	$type = mime_content_type($filename);

	if(file_exists($filename))
	{
		switch ($type) {

			case 'image/png':
				$image = imagecreatefrompng($filename);
				break;

			case 'image/gif':
				$image = imagecreatefromgif($filename);
				break;
			
			case 'image/jpeg':
				$image = imagecreatefromjpeg($filename);
				break;
			
			default:
				$image = imagecreatefromjpeg($filename);
				break;
		}

		$src_w = imagesx($image);
		$src_h = imagesy($image);

		if($src_w > $src_h)
		{
			if($src_w < $max_size)
			{
				$max_size = $src_w;
			}

			$dst_w = $max_size;
			$dst_h = ($src_h / $src_w) * $max_size;
		}else{

			if($src_h < $max_size)
			{
				$max_size = $src_h;
			}
			$dst_w = ($src_w / $src_h) * $max_size;
			$dst_h = $max_size;
		}

		$dst_image = imagecreatetruecolor($dst_w, $dst_h);
		
		if($type == 'image/png')
		{
			imagealphablending($dst_image, false);
			imagesavealpha($dst_image, true);
		}

		imagecopyresampled($dst_image, $image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);

		imagedestroy($image);

		imagejpeg($dst_image,$filename,98);
		switch ($type) {

			case 'image/png':
				imagepng($dst_image,$filename);
				break;

			case 'image/gif':
				imagegif($dst_image,$filename);
				break;
			
			case 'image/jpeg':
				imagejpeg($dst_image,$filename,98);
				break;
			
			default:
				imagejpeg($dst_image,$filename,98);
				break;
		}

		imagedestroy($dst_image);
	}

	return $filename;
}


function views_path($path)
{

	return 	"../app/views/".$path.".view.php";
}

function get_categories($id = null)
{
	$category = new \Model\Category();
	if($id){
		$category->limit = 1;
		return $category->whereCategory(['disabled'=>0,'id'=>$id]);
	}else{

		$category->order = 'asc';
		$category->limit = 500;
		return $category->whereCategory(['disabled'=>0]);
	}
}

function get_roles($id = null)
{
	$role = new \Model\Role();
	if($id){
		$role->limit = 1;
		return $role->whereRole(['disabled'=>0,'id'=>$id]);
	}else{

		$role->order = 'asc';
		$role->limit = 200;
		return $role->whereRole(['disabled'=>0]);
	}
}

function get_members($id = null)
{
	$member = new \Model\Member();
	if($id){
		$member->limit = 1;
		return $member->whereMember(['disabled'=>0,'id'=>$id]);
	}else{

		$member->order = 'asc';
		$member->limit = 20000;
		return $member->whereMember(['disabled'=>0]);
	}
}

function get_admin($id = null)
{
	$admin = new \Model\Admin();
	if($id){
		$admin->limit = 100;
		return $admin->whereMember(['disabled'=>0,'id'=>$id]);
	}else{

		$admin->order = 'asc';
		$admin->limit = 100;
		return $admin->whereMember(['disabled'=>0]);
	}
}

function get_positions($id = null)
{
	$position = new \Model\Position_model();
	if($id){
		$position->limit = 1;
		return $position->wherePosition(['disabled'=>0,'id'=>$id]);
	}else{

		$position->order = 'asc';
		$position->limit = 200;
		return $position->wherePosition(['disabled'=>0]);
	}
}

function get_local_positions($id = null)
{
	$localposition = new \Model\LocalPosition_model();
	if($id){
		$localposition->limit = 1;
		return $localposition->wherePosition(['disabled'=>0,'id'=>$id]);
	}else{

		$localposition->order = 'asc';
		$localposition->limit = 200;
		return $localposition->wherePosition(['disabled'=>0]);
	}
}

function get_app_details($id = null)
{
	$operations = new \Model\Operation();
	if($id){
		$operations->limit = 1;
		return $operations->where(['disabled'=>0,'id'=>$id]);
	}else{

		$operations->order = 'asc';
		$operations->limit = 200;
		return $operations->where(['disabled'=>0]);
	}
}

 function number_suffix($number){
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
     if ((($number % 100) >= 11) && (($number%100) <= 13)){
      return $number. 'th';
     }else{
      return $number.$ends[$number % 10];
     }
  }

function get_marital_status($id = null)
{
	$maritalStatus = new \Model\Marital_status_model();
	if($id){
		$maritalStatus->limit = 1;
		return $maritalStatus->findAllByStatus(['disabled'=>0,'id'=>$id]);
	}else{

		$maritalStatus->order = 'asc';
		$maritalStatus->limit = 8;
		return $maritalStatus->findAllByStatus(['disabled'=>0]);
	}
}


function user_can(string $permission):bool
{

	$role = \Model\Auth::getRole();
	if(\Model\Auth::is_admin())
	{
		return true;
	}
	
	$permission = strtolower($permission);

	$db = new Database;
	if(\Model\Auth::logged_in())
	{

		$query = "select permission from permissions_map where disabled = 0 && role_id = :role";
		$myroles = $db->query($query,['role'=>$role]);

		if($myroles){
			$myroles = array_column($myroles, 'permission');
		}else{
			$myroles = [];
		}

		if(in_array($permission, $myroles))
		{
			return true;
		}
	}

	return false;
}


function get_age() 
   {

    $dob = Auth::getDob();

    $today = date("Y-m-d");
    $diff = date_diff(date_create($dob), date_create($today));
    $age = $diff->format('%y,%m years old');

    return $age;
}

function query_row(string $query, array $data = [])
{

	$string = "mysql:hostname=".DBHOST.";dbname=". DBNAME;
	$con = new PDO($string, DBUSER, DBPASS);

	$stm = $con->prepare($query);
	$stm->execute($data);

	$result = $stm->fetchAll(PDO::FETCH_ASSOC);
	if(is_array($result) && !empty($result))
	{
		return $result[0];
	}

	return false;

}

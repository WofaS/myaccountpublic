<?php 

namespace Controller;

/**
 * admin class
 */

use \Model\Auth;
use \Model\Slider;
use \Model\Member;

class Admin extends Controller
{
	
	public function index()
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$data['title'] = "Page not found";

		$this->view('admin/404',$data);
	}

public function dashboard()
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$id = $id ?? Auth::getId();

		$member = new \Model\Member();
		$data['row'] = $row = $member->findAllByName();

		if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
		{
			if (count($_POST) > 0) {

				$text = $_POST['text'];
				$text = addslashes($text);
				$query = "select * from members where firstname like '%$text%' OR lastname like '%$text%' OR category_id like '%$text%' OR slug like '%$text%' OR email like '%$text%' OR marital_status_id like '%$text%' order by firstname desc";
				$result = $member->query($query);

			  echo json_encode($result); die;
			}
		}


		$this->view('admin/dashboard',$data);
	}

	public function dashboard2()
	{
		
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		
		$id = $id ?? Auth::getId();
		$slug = $slug ?? Auth::getSlug();

		$member=[];
		$member = new \Model\Member();	
		$data = [];
		$data['id'] = $id;
		$data['title'] = "Dashboard";

		$query = 	"SELECT category_id as assembly, COUNT(id) as assemblyMembers FROM members GROUP BY assembly ";
		
		$data['row'] =$rows = $member->query($query);
		
		$data['members'] = $member->errors;


		$this->view('admin/dashboard2',$data);
	}

	public function notifications()
	{
		
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		
		$id = $id ?? Auth::getId();
		$slug = $slug ?? Auth::getSlug();

		$member=[];
		$member = new \Model\Member();
		$data['members'] = $member->findAll('asc');		
		$category = new \Model\Course();
		$category = new \Model\Category();
		$data = [];
		$data['id'] = $id;
		$data['slug'] = $slug;
		$data['title'] = "Notifications";

		//view all members	
		$data['row'] = $row = $member->findAll('asc');		

		//red all categories 
		$data['rows'] = $category->where(['disabled'=>0],'asc',100);	

		$data['row'] = $rows = $member->findAllByName('asc');	
		
		if($data['rows']){
			$data['first_row'] = $data['rows'][0];
			unset($data['rows'][0]);

			$total_rows = count($data['rows']);
			$half_rows = round($total_rows / 2);

			$data['rows1'] = array_splice($data['rows'], 0,$half_rows);
			$data['rows2'] = $data['rows'];

		}

		$data['members'] = $member->errors;	

		$this->view('admin/notifications',$data);
	}

	public function locals($slug = null,)
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}
		
		$category = new \Model\Category();
		$id = $id ?? Auth::getId();
		$position = new \Model\Position_model();
		$localposition = new \Model\LocalPosition_model();
		$member = new \Model\Member();

		$data['title'] = "Locals";

		//read all categories 
		$query = "SELECT m.*,cat.category,cat.slug as catslug FROM members as m join categories as cat on cat.slug = m.category_id where cat.slug = :slug";
		$data['rows'] =$rows = $category->query($query,['slug'=>$slug]);
		
		//read all members order by slug value
		$query = "select * from categories where slug = slug order by category asc";
		$data['slug'] = $category->query($query);

		$query1 = "select * from members where id = id order by firstname asc";

		$data['row'] = $rows = $member->findAllByName('asc');

				
		if($data['rows']){
			$data['first_row'] = $data['rows'][0];
			unset($data['rows'][0]);

			$total_rows = count($data['rows']);
			$half_rows = round($total_rows / 2);

			$data['rows1'] = array_splice($data['rows'], 0,$half_rows);
			$data['rows2'] = $data['rows'];
		} 

		$this->view('admin/locals',$data);
	}

	public function datatable($slug = null,)
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}
		
		$category = new \Model\Category();
		$id = $id ?? Auth::getId();
		$position = new \Model\Position_model();
		$localposition = new \Model\LocalPosition_model();
		$member = new \Model\Member();

		$data['title'] = "Locals";

		//read all categories 
		$query = "SELECT m.*,cat.category,cat.slug as catslug FROM members as m join categories as cat on cat.slug = m.category_id where cat.slug = :slug";
		$data['rows'] =$rows = $category->query($query,['slug'=>$slug]);
		
		//read all members order by slug value
		$query = "select * from categories where slug = slug order by category asc";
		$data['slug'] = $category->query($query);

		$query1 = "select * from members where id = id order by firstname asc";

		$data['row'] = $rows = $member->findAllByName('asc');

				
		if($data['rows']){
			$data['first_row'] = $data['rows'][0];
			unset($data['rows'][0]);

			$total_rows = count($data['rows']);
			$half_rows = round($total_rows / 2);

			$data['rows1'] = array_splice($data['rows'], 0,$half_rows);
			$data['rows2'] = $data['rows'];
		} 

		$this->view('admin/datatable',$data);
	}

	public function groups($role = null, $slug = null)
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}
		
		$category = new \Model\Category();
		$id = $id ?? Auth::getId();
		$position = new \Model\Position_model();
		$localposition = new \Model\LocalPosition_model();
		$member = new \Model\Member();

		$data['title'] = "Locals";

		//read all categories 
		$query = "SELECT m.*,cat.category,cat.slug as catslug FROM members as m join categories as cat on cat.slug = m.category_id where cat.slug = :slug";
		$data['rows'] =$rows = $category->query($query,['slug'=>$slug]);
				
		$data['rows'] =$rows = $category->query($query,['slug'=>$slug]);
		
		//read all members order by slug value
		$query = "select * from categories where slug = slug order by category asc";
		$data['slug'] = $category->query($query);

		$query1 = "select * from members where id = id order by firstname asc";

		$data['row'] = $rows = $member->findAllByName('asc');

		
		if($data['rows']){
			$data['first_row'] = $data['rows'][0];
			unset($data['rows'][0]);

			$total_rows = count($data['rows']);
			$half_rows = round($total_rows / 2);

			$data['rows1'] = array_splice($data['rows'], 0,$half_rows);
			$data['rows2'] = $data['rows'];
		} 

		$this->view('admin/groups',$data);
	}

	public function search($role = null, $slug = null)
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$id = $id ?? Auth::getId();

		$member = new \Model\Member();
		$data['row'] = $row = $member->findAllByName();

		if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
		{
			if (count($_POST) > 0) {

				$text = $_POST['text'];
				$text = addslashes($text);
				$query = "select * from members where firstname like '%$text%' OR lastname like '%$text%' OR category_id like '%$text%' OR slug like '%$text%' OR email like '%$text%' OR marital_status_id like '%$text%' order by firstname desc";
				$result = $member->query($query);

			  echo json_encode($result); die;
			}
		}
		
		$this->view('admin/search',$data);
	}

	public function mysearch($role = null, $slug = null)
	{
		

		$id = $id ?? Auth::getId();

		$member = new \Model\Member();
		$data['row'] = $row = $member->findAllByName();

		if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
		{
			if (count($_POST) > 0) {

				$text = $_POST['text'];
				$text = addslashes($text);
				$query = "select * from members where firstname like '%$text%' OR lastname like '%$text%' OR category_id like '%$text%' OR slug like '%$text%' OR email like '%$text%' OR marital_status_id like '%$text%' order by firstname desc";
				$result = $member->query($query);

			  echo json_encode($result); die;
			}
		}
		
		$this->view('admin/mysearch',$data);
	}

	public function make_pdf($action = null, $id = null, )
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}
		

		$data = [];

		$id = $id ?? Auth::getId();

		$data['action'] = $action;

		$register = new \Model\Register();
		$member = get_members($id);
		$data['row'] = $rows = $member;


		$app = get_app_details();

		$folder = 'generated_pdfs/';
		if(!file_exists($folder))
		{
			mkdir($folder,0777,true);
		}

 		require_once __DIR__ . '/../models/mpdf/autoload.php';
		
		//$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		// $fontData = $defaultFontConfig['fontdata'];

		 $mpdf = new \Mpdf\Mpdf([
		    
		//     'fontdata' => $fontData + [
		//         'roboto' => [
		//             'R' => 'Roboto-Regular.ttf',
		//             'I' => 'Roboto-Italic.ttf',
		//         ]

		//     ],
		   
		 ]);
		 

	if($action == 'download_member_form'){

		foreach($app as $app){
		$html = "


						<table>
                 <thead>
                 <tr ><th colspan='4' style=''><div style='display:flex; flex-direction:app; margin:auto;'>
		 						<img src='".get_profile_image($app->image)."' style='max-width:50px; max-height:50px; '><br>
		 							".strtoupper($app->church_name). "- ".strtoupper($app->area_name)."<br><br> <p>". strtoupper($app->district_name)."</p>
                 </th></tr>
                 
                 </thead>
                 <tr><th colspan='5' style='font-family:tahoma;'>
                 MEMBERSHIP RECORD FORM <br> <small style='font-style:italic; font-size:10px; color:red;'>Please fill this form as accurate as possible</small></th></tr>
                 </thead>
                 <hr style='stroke:10px; color:gray; height:5px; margin-left:-30px;'>
                 <tbody>
                   <tr style='margin-bottom:10px;'><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>First Name:</th><td><input style='width:200px; border-radius:5px;'></td><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Last Names:</th><td><input style='width:200px; border-radius:5px;'></td></tr>
                   <tr style='margin-bottom:10px;'><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Email:</th><td></td><input style='width:200px; border-radius:5px;'><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Phone Number:</th><td><input style='width:200px; border-radius:5px;'></td></tr>

                   <tr style='margin-bottom:10px;'>
                   		<th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>DOB(dd/mm/yyyy):</th><td><input style='width:200px; border-radius:5px;'></td>

                   		<th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Gender:</th><td colspan='4'; style='font-style:italic; font-size:10px;'>female <input type='checkbox' style='margin-left:5px;'>  male<input type='checkbox'> </td>

                   <tr style='margin-bottom:10px;'>
                   		<th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Marital status:</th><td colspan='4'; style='font-style:italic; font-size:10px;'>Single<input type='checkbox' style='margin-left:5px;'>  married<input type='checkbox'> dating <input type='checkbox' style='margin-left:5px;'> complicated <input type='checkbox' style='margin-left:5px;'> widowed <input type='checkbox' style='margin-left:5px;'>  divorced<input type='checkbox'> </td>

                   </tr>

                    <tr style='margin-bottom:10px;'>
                    	<th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Name of Spouse:</th><td><input style='width:200px; border-radius:5px;'></td><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Phone:</th><td><input style='width:200px; border-radius:5px;'></td>
                    </tr>
                    
                    <tr style='margin-bottom:10px;'>
                    	<th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Names of Children(if any):</th><td style='font-style:italic; font-weight:bolder;' colspan='3'><br>
                    	1................................................   
                    	2................................................ 
                    	3................................................ <br><br>
                    	4................................................ 
                    	5................................................ 
                    	6................................................ </td>
                    </tr>
                    
                    <tr style='margin-bottom:10px;'><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Residential Address:</th><td><input style='width:200px; border-radius:5px;'></td><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>GPS Address:</th><td><input style='width:200px; border-radius:5px;'></td></tr>

                    <tr style='margin-bottom:10px;'><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Hometown:</th><td><input style='width:200px; border-radius:5px;'></td><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Occupation:</th><td><input style='width:200px; border-radius:5px;'></td></tr>
                    
                    <tr style='margin-bottom:10px;'><th style=' font-size:10px; font-family:tahoma; border:thin solid gray;'>Baptized in water?:</th><td style='font-style:italic; font-size:10px;'>Yes  <input type='checkbox'> No  <input type='checkbox'></td>

                    <th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Holy Ghost Baptized?:</th><td style='font-style:italic; font-size:10px;'>Yes  <input type='checkbox'> No  <input type='checkbox'></td>
                    </tr>

                    <tr><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Attends Communion?:</th><td style='font-style:italic; font-size:10px;'>Yes  <input type='checkbox'> No <input type='checkbox'></td>
                    </tr>
                    
                    <tr style='margin-bottom:10px;'><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Local Assembly:</th><td><input type='text' style='width:200px; border-radius:5px;'></td><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Role:</th><td style='font-style:italic; font-size:10px;'>
                    		Child<input type='checkbox'>   
                    		Deacon<input type='checkbox'>   
                    		Deaconess<input type='checkbox'><br>  
                    		Elder<input type='checkbox'>  
                    		Member<input type='checkbox'>   
                    		Visitor<input type='checkbox'>
                    	</td>
                    </tr>
                    
                    <tr style='margin-bottom:10px;'><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Position in District:</th><td><input type='text' style='width:200px; border-radius:5px;'></td><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Position in Local:</th><td><input type='text' style='width:200px; border-radius:5px;'></td>
                    </tr>

                    <tr style='margin-bottom:10px;'><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Father's Name:</th><td><input type='text' style='width:200px; border-radius:5px;'></td><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Phone:</th><td><input type='text' style='width:200px; border-radius:5px;'></td>
                    </tr>

                    <tr style='margin-bottom:10px;'><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Mother's Name:</th><td><input type='text' style='width:200px; border-radius:5px;'></td><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Phone:</th><td><input type='text' style='width:200px; border-radius:5px;'></td></tr>

                    <tr style='margin-bottom:10px;'><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Emergency Contact Person's Name:</th><td><input type='text' style='width:200px; border-radius:5px;'></td><th style='width:50px; font-size:10px; font-family:tahoma; border:thin solid gray;'>Phone:</th><td><input type='text' style='width:200px; border-radius:5px;'></td>
                    </tr>

                    <tr style='margin-top:10px; background-color:#aaa;'></tr>                  
                 </tbody>
                 <tfoot>

                 </tfoot>
               </table>

               <tr>
               <hr style='stroke:10px; color:gray; height:5px; margin-left:-30px;'> 
                 	<td style='width:550px;'><strong style='font-weight:bolder;'>Declaration:</strong> I ................................ confirm that the above information provided is accurate. Thank you.</td>
                  </tr>

		";

	}
		$file_name = $folder.'new_member_form_'.date("dmY_His",time()).'.pdf';

}

	elseif($action == 'download_profile'){
		
		foreach($rows as $row){

			$dob = $row->dob;
      $today = date("Y-m-d");
      $diff = date_diff(date_create($dob), date_create($today));
      $age = $diff->format('%Y years');
      if ($row->gender ==='male') {
      		$title = 'he';
      	$adjective = 'his';
      }else{
      	$title = 'she';
      	$adjective = 'her';
      }

      foreach($app as $app){

      	$district = $app->district_name;
      	$church = $app->church_name;
      	$area = $app->area_name;
      	$app_name = $app->appname;
      	$address = $app->location;
      	$logo = get_avatar($app->image);

      }
				
				$html = "

						<table>
                 <thead>
                 <tr>
                 <td style='color:gray; font-size:12px; width:150px;'><img src='". $logo ."' style='max-width:20px; max-height:20px; padding:1px; justify-content:center; margin:auto;'><p style='padding-top:5px; padding-bottom:5px;'>" .ucfirst($church) .' '.$district ."<br>".' '.$row->category_id . ' Assembly ' ."</p></td>
                 </tr><br>
                 <tr >

                 <div style='display:flex; flex-direction:row; margin:auto;'>
	                 

	                 <td colspan='3';> 
	                 		<h4 style='border-bottom:2px solid gray; font-weight:bolder; text-align:center; justify-content:center; margin-bottom:10px;'>About ". ucfirst($row->firstname). ' ' . ucfirst($row->lastname). " </h4><br>
	                 	<p style='font-style:italic; color:darkblue; font-size:12px;'>
	                 		".ucfirst($row->firstname) . ' ' .ucfirst($row->lastname) . ' (' .ucfirst($row->role_name) .') worships with ' . ucfirst($row->category_id).' Assembly of the Church of Pentecost Sampa District. Born on the '. get_date($row->dob) .' to '. $row->father_name . ' (father) and '. $row->mother_name.' (mother), '. $title. ' is '. $age.' old. '. ucfirst($title) .' comes from '. $row->hometown .'. and is '. $row->marital_status_id.'. Currently, '. $title. ' stays at '. $row->residence . ' in Sampa-Jaman North District of the Bono Region, Ghana.' . " 
	                 	</p>
	                 </td>

	                 <td colspan='1'>
			 								<img src='".get_avatar($row->image) ."' style='max-width:80px; max-height:80px; width:80px; height:80px; border:2px solid #f6f9ff66; border-radius:10px; padding:1px;'>

	                 </td>
			 						</div>
                 </tr> 
                 
                 </thead>

                 <tbody>

                 <br>										                                  
                    
                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'>
                    	<th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>First Name:</th><td style=' font-style:italic;'><p>".esc(set_value('firstname',$row->firstname ? :''))."</p></td><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Last Names:</th><td style=' font-style:italic;'><p>".esc(set_value('lastname',$row->lastname ? :''))."</p></td>
                    	</tr>
										
										<tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'>
                    	<th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Email:</th><td style=' font-style:italic;'><p>".esc(set_value('email',$row->email ? :''))."</p></td><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Phone Number:</th><td style=' font-style:italic;'><p>".esc(set_value('phone',$row->phone ? :''))."</p></td>
                    	</tr>

                   <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'>
                   		<th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>DOB:</th><td style=' font-style:italic;'><p>".esc(get_date($row->dob ? :'Not available'))."</p></td>


                   		<th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Age:</th><td style='font-style:italic; margin-left:5px;'><p>".$age."</p></td>

                   <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'>

                   		<th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Gender:</th><td style='font-style:italic; margin-left:5px;'><p>".$row->gender. "</p> </td>

                   		<th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Marital status:</th><td style='font-style:italic; margin-left:5px;'><p>".$row->marital_status_id."</p></td>

                   </tr>

                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'>
                    	<th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Name of Spouse:</th><td style=' font-style:italic;'><p>".esc(set_value('spouse_name',$row->spouse_name ? :'Not available'))."</p></td><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Spouse's Contact:</th><td style=' font-style:italic;'><p>".esc(set_value('spouse_phone',$row->spouse_phone ? :'Not available'))."</p></td>
                    </tr>
                    
                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'>
                    	<th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Names of Children(if any):</th><td style='font-style:italic; font-weight:bolder;' colspan='3'><p>".esc(set_value('children',$row->children ? :'Not available'))."</p> </td>
                    </tr>
                    
                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Residential Address:</th><td style=' font-style:italic;'><p>".esc(set_value('residence',$row->residence ? :'Not available'))."</p></td><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>GPS Address:</th><td style=' font-style:italic;'><p>".esc(set_value('gps_address',$row->gps_address ? :'Not available'))."</p></td></tr>

                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Hometown:</th><td style=' font-style:italic;'><p>".esc(set_value('hometown',$row->hometown ? :'NOt available'))."</p></td><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Occupation:</th><td style=' font-style:italic;'><p>".esc(set_value('job',$row->job ? :'Not available'))."</p></td></tr>
                    
                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Baptized in water?:</th><td style='font-style:italic; margin-left:5px;'><p>".$row->water_baptized."</p></td>

                    <th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Holy Ghost Baptized?:</th><td style='font-style:italic; margin-left:5px;'><p>".$row->holyghost_baptized."</p></td>
                    </tr>

                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'>
                    	<th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Attends Communion?:</th><td style='font-style:italic; margin-left:5px;'><p>".$row->communicant_status."</p></td>
                    </tr>
                    
                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Local Assembly:</th><td style=' font-style:italic;'><p>".$row->category_id."</p></td><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Role:</th><td style='font-style:italic; margin-left:5px;'><p>".$row->role_name."</p></td>
                    </tr>
                    
                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Position in District:</th><td style=' font-style:italic;'><p>".esc($row->position_id ? :'No position')."</p></td><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Position in Local:</th><td style=' font-style:italic;'><p>".esc($row->localposition_id ? :'No position')."</p></td>
                    </tr>

                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Father's Name:</th><td style=' font-style:italic;'><p>".esc($row->father_name ? :'Not available')."</p></td><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Father's Contact:</th><td style=' font-style:italic;'><p>".esc($row->father_phone ? :'Not available')."</p></td>
                    </tr>

                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Mother's Name:</th><td style=' font-style:italic;'><p>".esc($row->mother_name ? :'Not available')."</p></td><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Mother's Contact:</th><td style=' font-style:italic;'><p>".esc($row->mother_phone ? :'Not available')."</p></td></tr>

                    <tr style='margin-bottom:10px; background-color:#f6f9ff66; border-bottom:thin gray; border-radius:5px;'><th style='width:100px; font-family:tahoma; border:thin solid gray; font-size:13px;'>Emergency Person's Name:</th><td style=' font-style:italic;'><p>".esc($row->emergecy_name ? :'Not available')."</p></td><th style='width:50px; font-family:tahoma; border:thin solid gray;'>Emergency Contact Number:</th><td style=' font-style:italic;'><p>".esc($row->emergecy_contact ? :'Not available')."</p></td>
                    </tr>

                                     
                 </tbody>
                 <tfoot>               
                      <tr style=''>
                    	<th colspan='3' ></th><td style=''><strong style'text-aling:right; color:blue; font-size: 7px;'></strong></td>
                    	</tr>

                      <tr style=''>
                    	<th colspan='3' ></th><td style='font-size:8px; font-style:italic; color:gray;'><strong style'text-aling:right; color:blue; font-size: 7px;'>Registered on: </strong>".esc(get_date($row->date ? :'Not available'))."</td>
                    </tr>                
                    <tr style=''>
                    	<th colspan='3'></th><td style='font-size:8px; font-style:italic; color:gray;'><strong style'text-aling:right; color:blue; font-size: 7px;'>Downloaded on: </strong>".esc(date('D, jS M, Y') ? :'Not available')."</td>
                    </tr>
                    <tr style=''>
                    	<th colspan='3'></th><td style='font-size:8px; font-style:italic; color:gray;'><strong style'text-aling:right; color:blue; font-size: 7px;'>Download time: </strong>".esc(date('H:i:sa') ? :'Not available')."</td>
                    </tr> 
                    <tr style=''>
                    	<th colspan='3'></th><td style='font-size:8px; font-style:italic; color:gray;'><strong style'text-aling:right; color:blue; font-size: 7px;'>Download by: </strong>".ucfirst(Auth::getFirstname() ? :'Not available'). ' '.ucfirst(Auth::getLastname() ? :'Not available')."</td>
                    </tr> 
                 </tfoot>
               </table>

		";


		$file_name = $folder.'member_profile_'.$row->firstname.' '.$row->lastname.'_'.date("dmY_His",time()).'.pdf';
		}

	}

		$mpdf->WriteHTML($html);
		

		
		$mpdf->Output($file_name);

		if(file_exists($file_name)){

			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file_name)); //Absolute URL
			ob_clean();
			flush();
			readfile($file_name); //Absolute URL
			exit();
		}


		//$this->view('admin/make_pdf',$data);
	}



	public function excel($action = null, $id = null, $slug = null, $category_id = null, $role = null, )
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$user_id = Auth::getId();
		$category = new \Model\Category();
		$member = new \Model\Member();

		$data = [];
		$data['action'] = $action;
		$data['id'] = $id;
		$data['role'] = $role;
		$data['category_id'] = $category_id;

		//read all categores 
		$query = "SELECT m.*,cat.category,cat.slug as catslug FROM members as m join categories as cat on cat.slug = m.category_id where cat.slug = :slug";
		$data['rows'] =$rows = $category->query($query,['slug'=>$slug]);
		
		//read all members order by slug value
		$query = "select * from categories where slug = slug order by category asc";
		$data['slug'] = $category->query($query);

		$data['row'] = $rows = $member->findAllByName('asc');

		

		$this->view('admin/excel',$data);
	}
	
	public function print_g($action = null, $id = null, $slug = null, $category_id = null, $role = null)
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}
		
		$category = new \Model\Category();
		$id = $id ?? Auth::getId();
		$position = new \Model\Position_model();
		$localposition = new \Model\LocalPosition_model();
		$member = new \Model\Member();
		$member = new \Model\Member();


		$data = [];
		$data['action'] = $action;
		$data['id'] = $id;
		$data['role'] = $role;
		$data['category_id'] = $category_id;

		$data['title'] = "Locals";

		//read all categories 
		$query = "SELECT m.*,cat.category,cat.slug as catslug FROM members as m join categories as cat on cat.slug = m.category_id where cat.slug = :slug";
		$data['rows'] =$rows = $category->query($query,['slug'=>$slug]);
		
		//read all members order by slug value
		$query = "select * from categories where slug = slug order by category asc";
		$data['slug'] = $category->query($query);

		$query1 = "select * from members where id = id order by firstname asc";

		$data['row'] = $rows = $member->findAllByName('asc');


		$this->view('admin/print_g',$data);
	}


	public function admin()
	{
		
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$id = $id ?? Auth::getId();
		
		$admin = new \Model\Admin();
		$category = new \Model\Category();
		$role = new \Model\Role();
				
		$data = [];
		$data['admins'] = $admin->findAllByName('asc');	
		$data['categories'] = $category->findAll('asc');	
		$data['roles'] = $role->findAll('asc');	
		$data['id'] = $id;

		//view all admins	
		$data['row'] = $row = $admin->findAllByName('asc');

				
		$data['admins'] = $admin->errors;	

		$data['title'] = "Admins";

		$this->view('admin/admin',$data);
	}

	public function leaders()
	{
		
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$id = $id ?? Auth::getId();
		
		$member = new \Model\Member();
				
		$data = [];
		$data['members'] = $member->findAll('asc');	
		$data['id'] = $id;

		//view all members	
		$data['row'] = $row = $member->findAll('asc');

				
		$data['members'] = $member->errors;	

		$data['title'] = "Members";

		$this->view('admin/leaders',$data);
	}


	public function profile($id = null)
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$data = [];

		$id = $id ?? Auth::getId();

		$register = new \Model\Register();
		$member = new \Model\Member();
		$data['row'] = $row = $member->first(['id'=>$id]);
		$myID = $row->id; 

		//$data['date'] = $date = $_GET['date'] ? $_GET['date'] : date('Y-m-d');

		//$data['event_date'] = $event_date = date("jS M, Y", strtotime($date));

		if(!empty($myID)){

		$query2 = "SELECT * FROM members AS t1 LEFT JOIN register AS t2 ON t1.id = t2.member_id WHERE t1.id=:member_id ORDER BY t1.firstname,t1.lastname ASC";

		$data['rows2'] = $rows2 = $register->query($query2, ['member_id' => $myID]);

		
		}

		$data['rows'] = $rows = $member->findAllByName();

		if($_SERVER['REQUEST_METHOD'] == "POST" && $rows)
		{
			if (count($_POST) > 0) {

				$text = $_POST['text'];
				$text = addslashes($text);
				$query = "select * from members where firstname like '%$text%' OR lastname like '%$text%' OR category_id like '%$text%' OR slug like '%$text%' OR email like '%$text%' OR marital_status_id like '%$text%' order by firstname desc";
				$result = $member->query($query);

			  echo json_encode($result); die;
			}
		}



		$data['title'] = "Profile";
		$data['errors'] = $member->errors;

		$this->view('admin/profile',$data);
	}

	public function profile_edit($id = null)
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$data = [];

		$id = $id ?? Auth::getId();

		$member = new \Model\Member();
		$data['row'] = $row = $member->first(['id'=>$id]);


		if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
		{
		
			$folder = "uploads/images/";
			if(!file_exists($folder))
			{
				mkdir($folder,0777,true);
				file_put_contents($folder."index.php", "<?php //silence");
				file_put_contents("uploads/index.php", "<?php //silence");
			}
 
 			if($member->edit_validate($_POST,$id))
 			{

				$allowed = ['image/jpeg','image/png'];

				if(!empty($_FILES['image']['name'])){

					if($_FILES['image']['error'] == 0){

						if(in_array($_FILES['image']['type'], $allowed))
						{
							//everything good
							$destination = $folder.time().$_FILES['image']['name'];
							move_uploaded_file($_FILES['image']['tmp_name'], $destination);

							resize_image($destination);
							$_POST['image'] = $destination;
							if(file_exists($row->image))
							{
								unlink($row->image);
							}

						}else{
							$member->errors['image'] = "This file type is not allowed";
						}
					}else{
						$member->errors['image'] = "Could not upload image";
					}
				}

				$_POST['slug'] = str_to_url($_POST['category_id']);
				$member->update($id,$_POST);

				//message("Profile saved successfully");
				//redirect('admin/members');
 			}

			if(empty($member->errors)){
				$arr['message'] = "Profile saved successfully";

			}else{
				$arr['message'] = "Please correct these errors";
				$arr['errors'] = $member->errors;
			}

			echo json_encode($arr);

 			die;
		}



		$data['title'] = "Profile";
		$data['errors'] = $member->errors;

		$this->view('admin/profile_edit',$data);
	}

	public function operations($id = null)
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$id = $id ?? Auth::getId();

		$operation = new \Model\Operation();
		$data['row'] = $row = $operation->first(['id'=>$id]);

		if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
		{
		
			$folder = "uploads/images/";
			if(!file_exists($folder))
			{
				mkdir($folder,0777,true);
				file_put_contents($folder."index.php", "<?php //silence");
				file_put_contents("uploads/index.php", "<?php //silence");
			}
 
 			if($operation->validate($_POST,$id))
 			{

				$allowed = ['image/jpeg','image/png'];

				if(!empty($_FILES['image']['name'])){

					if($_FILES['image']['error'] == 0){

						if(in_array($_FILES['image']['type'], $allowed))
						{
							//everything good
							$destination = $folder.time().$_FILES['image']['name'];
							move_uploaded_file($_FILES['image']['tmp_name'], $destination);

							resize_image($destination);
							$_POST['image'] = $destination;
							if(file_exists($row->image))
							{
								unlink($row->image);
							}

						}else{
							$operation->errors['image'] = "This file type is not allowed";
						}
					}else{
						$operation->errors['image'] = "Could not upload image";
					}
				}

				$operation->update($id,$_POST);
 			}

			if(empty($operation->errors)){
				$arr['message'] = "App Details saved successfully";

			}else{
				$arr['message'] = "Please correct these errors";
				$arr['errors'] = $operation->errors;
			}

			echo json_encode($arr);

 			die;
		}



		$data['title'] = "Operations";
		$data['errors'] = $operation->errors;

		$this->view('admin/operations',$data);
	}

	public function adminprofile($id = null)
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$id = $id ?? Auth::getId();

		$admin = new \Model\Admin();
		$data['row'] = $row = $admin->first(['id'=>$id]);

		if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
		{
		
			$folder = "uploads/images/";
			if(!file_exists($folder))
			{
				mkdir($folder,0777,true);
				file_put_contents($folder."index.php", "<?php //silence");
				file_put_contents("uploads/index.php", "<?php //silence");
			}
 
 			if($admin->edit_validate($_POST,$id))
 			{

				$allowed = ['image/jpeg','image/png'];

				if(!empty($_FILES['image']['name'])){

					if($_FILES['image']['error'] == 0){

						if(in_array($_FILES['image']['type'], $allowed))
						{
							//everything good
							$destination = $folder.time().$_FILES['image']['name'];
							move_uploaded_file($_FILES['image']['tmp_name'], $destination);

							resize_image($destination);
							$_POST['image'] = $destination;
							if(file_exists($row->image))
							{
								unlink($row->image);
							}

						}else{
							$admin->errors['image'] = "This file type is not allowed";
						}
					}else{
						$admin->errors['image'] = "Could not upload image";
					}
				}

				$admin->update($id,$_POST);

				//message("Profile saved successfully");
				//redirect('admin/admins');
 			}

			if(empty($admin->errors)){
				$arr['message'] = "Profile saved successfully";

			}else{
				$arr['message'] = "Please correct these errors";
				$arr['errors'] = $admin->errors;
			}

			echo json_encode($arr);

 			die;
		}



		$data['title'] = "Profile";
		$data['errors'] = $admin->errors;

		$this->view('admin/adminprofile',$data);
	}

	
	public function delete($id = null)
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$id = $id ?? Auth::getId();

		$member = new \Model\Member();

		$data['row'] = $row = $member->first(['id'=>$id]);
			
			if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
			{

				$member->delete($row->id);
				message($row->firstname." was deleted successfully");
				redirect('admin/locals');
			}

		$data['title'] = "Delete";
		$data['errors'] = $member->errors;

		$this->view('admin/delete',$data);

	}

	public function viewusers($id= null)
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$id = $id ?? Auth::getId();

		$member = new \Model\Member();

		$category = new \Model\Course();
		$category = new \Model\Category();

		//red all categories 
		$data['rows'] = $category->where(['disabled'=>0],'asc',50);
		
		
		//red all categories order by slug value
		$query = "select * from categories where disabled = 0 order by slug asc limit 50";
		$data['slug'] = $category->query($query);
		
		if($data['rows']){
			$data['first_row'] = $data['rows'][0];
			unset($data['rows'][0]);

			$total_rows = count($data['rows']);
			$half_rows = round($total_rows / 2);

			$data['rows1'] = array_splice($data['rows'], 0,$half_rows);
			$data['rows2'] = $data['rows'];

		}

		$data['row'] = $row = $member->first(['id'=>$id]);

		$member = new \Model\Member();
		$data['rows'] = $row = $member->findAllByName();

		if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
		{
			if (count($_POST) > 0) {

				$text = $_POST['text'];
				$text = addslashes($text);
				$query = "select * from members where firstname like '%$text%' OR lastname like '%$text%' OR category_id like '%$text%' OR slug like '%$text%' OR email like '%$text%' OR marital_status_id like '%$text%' order by firstname desc";
				$result = $member->query($query);

			  echo json_encode($result); die;
			}
		}
			
			
		$data['title'] = "View";
		$data['errors'] = $member->errors;

		$this->view('admin/viewusers',$data);

	}

	public function viewadmins($id= null)
	{
		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$id = $id ?? Auth::getId();

		$admin = new \Model\Admin();

		$category = new \Model\Course();
		$category = new \Model\Category();

		//red all categories 
		$data['rows'] = $category->where(['disabled'=>0],'asc',50);
		
		
		//red all categories order by slug value
		$query = "select * from categories where disabled = 0 order by slug asc limit 50";
		$data['slug'] = $category->query($query);
		
		if($data['rows']){
			$data['first_row'] = $data['rows'][0];
			unset($data['rows'][0]);

			$total_rows = count($data['rows']);
			$half_rows = round($total_rows / 2);

			$data['rows1'] = array_splice($data['rows'], 0,$half_rows);
			$data['rows2'] = $data['rows'];

		}

		$data['row'] = $row = $admin->first(['id'=>$id]);
			
			
		$data['title'] = "View";
		$data['errors'] = $admin->errors;

		$this->view('admin/viewadmins',$data);

	}

	
	public function categories($action = null, $id = null)
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$user_id = Auth::getId();
		$category = new \Model\Category();

		$data = [];
		$data['action'] = $action;
		$data['id'] = $id;

		if($action == 'add')
		{
			

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				if(user_can('add_categories'))
				{
					if($category->validate($_POST))
					{
						
						$_POST['slug'] = str_to_url($_POST['category']);
						$category->insert($_POST);
						message("Your category was successfuly created");
						redirect('admin/categories');
					}
				}else{
					$category->errors['category'] = "You are not allowed to perform this action";
				}

				$data['errors'] = $category->errors;

			}

		}
		elseif($action == 'delete')
		{

			//get category information
			$data['row'] = $row = $category->first(['id'=>$id]);
			
			if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
			{

					
				$category->delete($row->id);
				message("Your category was successfuly edited");
				redirect('admin/categories');

				$data['errors'] = $category->errors;

			}
 

		}
		elseif($action == 'edit')
		{

			//get category information
			$data['row'] = $row = $category->first(['id'=>$id]);
			
			if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
			{
				if($category->validate($_POST))
				{
					$_POST['slug'] = str_to_url($_POST['category_id']);
					$category->update($row->id, $_POST);
					message("Your category was successfuly edited");
					redirect('admin/categories');
				}

				$data['errors'] = $category->errors;

			}
 

		}else
		{

			//categories view
			$data['rows'] = $category->findAll();

		}

		$this->view('admin/categories',$data);
	}

	public function maritalstatus($action = null, $id = null)
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$user_id = Auth::getId();
		$marital_status = new \Model\Marital_status_model();

		$data = [];
		$data['action'] = $action;
		$data['id'] = $id;

		if($action == 'add')
		{
			

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				if(user_can('add_marital_status'))
				{
					if($marital_status->validate($_POST))
					{
						
						$marital_status->insert($_POST);
						message("Marital status was successfuly created");
						redirect('admin/maritalstatus');
					}
				}else{
					$marital_status->errors['marital_status'] = "You are not allowed to perform this action";
				}

				$data['errors'] = $marital_status->errors;

			}

		}
		elseif($action == 'delete')
		{

			//get marital_status information
			$data['row'] = $row = $marital_status->first(['id'=>$id]);
			
			if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
			{

					
				$marital_status->delete($row->id);
				message("Your marital status was successfuly deleted");
				redirect('admin/maritalstatus');

				$data['errors'] = $marital_status->errors;

			}
 

		}
		elseif($action == 'edit')
		{

			//get marital_status information
			$data['row'] = $row = $marital_status->first(['id'=>$id]);
			
			if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
			{
				if($marital_status->validate($_POST))
				{
					
					$marital_status->update($row->id, $_POST);
					message("Your marital_status was successfuly edited");
					redirect('admin/maritalstatus');
				}

				$data['errors'] = $marital_status->errors;

			}
 

		}else
		{

			//categories view
			$data['rows'] = $marital_status->findAll();

		}

		$this->view('admin/maritalstatus',$data);
	}

	public function districtposition($action = null, $id = null)
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$user_id = Auth::getId();
		$position = new \Model\Position_model();

		$data = [];
		$data['action'] = $action;
		$data['id'] = $id;

		if($action == 'add')
		{
			

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				if(user_can('add_position'))
				{
					if($position->validate($_POST))
					{
						
						$position->insert($_POST);
						message("Position added successfuly");
						redirect('admin/districtposition');
					}
				}else{
					$position->errors['position'] = "You are not allowed to perform this action";
				}

				$data['errors'] = $position->errors;

			}

		}
		elseif($action == 'delete')
		{

			//get position information
			$data['row'] = $row = $position->first(['id'=>$id]);
			
			if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
			{

					
				$position->delete($row->id);
				message("Position was successfuly deleted");
				redirect('admin/districtposition');

				$data['errors'] = $position->errors;

			}
 

		}
		elseif($action == 'edit')
		{

			//get position information
			$data['row'] = $row = $position->first(['id'=>$id]);
			
			if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
			{
				if($position->validate($_POST))
				{
					
					$position->update($row->id, $_POST);
					message("Position was successfuly edited");
					redirect('admin/districtposition');
				}

				$data['errors'] = $position->errors;

			}
 

		}else
		{

			//categories view
			$data['rows'] = $position->findAllByPosition();

		}

		$this->view('admin/districtposition',$data);
	}

	public function local_position($action = null, $id = null)
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$user_id = Auth::getId();
		$local_position = new \Model\LocalPosition_model();

		$data = [];
		$data['action'] = $action;
		$data['id'] = $id;

		if($action == 'add')
		{
			

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				if(user_can('add_local_position'))
				{
					if($local_position->validate($_POST))
					{
						
						$local_position->insert($_POST);
						message("Position added successfuly");
						redirect('admin/local_position');
					}
				}else{
					$local_position->errors['local_position'] = "You are not allowed to perform this action";
				}

				$data['errors'] = $local_position->errors;

			}

		}
		elseif($action == 'delete')
		{

			//get local_position information
			$data['row'] = $row = $local_position->first(['id'=>$id]);
			
			if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
			{

					
				$local_position->delete($row->id);
				message("Position was successfuly deleted");
				redirect('admin/local_position');

				$data['errors'] = $local_position->errors;

			}
 

		}
		elseif($action == 'edit')
		{

			//get local_position information
			$data['row'] = $row = $local_position->first(['id'=>$id]);
			
			if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
			{
				if($local_position->validate($_POST))
				{
					
					$local_position->update($row->id, $_POST);
					message("Position was successfuly edited");
					redirect('admin/local_position');
				}

				$data['errors'] = $local_position->errors;

			}
 

		}else
		{

			//categories view
			$data['rows'] = $local_position->findAllByPosition();

		}

		$this->view('admin/local_position',$data);
	}

	public function register_info()
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$user_id = Auth::getId();

		$errors = [];

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

		    $date = $_POST['date'];
   			if(!empty($date)){

		    redirect("admin/mark_register&date=$date");
			}
			 message("Please select Date");
			}


		$this->view('admin/register/register_info');
	}

	public function localregister_info()
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$user_id = Auth::getId();

		$errors = [];

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

		    $startdate = $_POST['startdate'];
		    $enddate = $_POST['enddate'];
   			if(!empty($date)){

		    redirect("admin/mark_register&date=$date");
			}
			 message("Please select start Date and end Date");
			}


		$this->view('admin/register/localregister_info');
	}


	public function register_edit_info()
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$user_id = Auth::getId();


		$data = [];
		$errors = [];

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

		    $date = $_POST['date'];

   			if(!empty($date)){

		    redirect("admin/edit_register&date=$date");
			}
			 message("Please select Date");
			}

		$this->view('admin/register/register_edit_info',$data);
	}

	public function register_view_info()
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$user_id = Auth::getId();


		$data = [];
		$errors = [];

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

		    $date = $_POST['date'];

   			if(!empty($date)){

		    redirect("admin/view_register&date=$date");
			}
			 message("Please select Date");
			}

		$this->view('admin/register/register_view_info',$data);
	}

	public function mark_register()
	{

		$errors = [];
		$data = [];
		$register = new \Model\Register();
		$member = new \Model\Member();

		$data['date'] = $date = $_GET['date'] ? $_GET['date'] : date('Y-m-d');

		$data['event_date'] = $event_date = date("jS M, Y", strtotime($date));

		$query = "SELECT * FROM members WHERE id NOT IN (SELECT member_id FROM register WHERE marked_on = :marked_on) AND date <= :created_on ORDER BY firstname,lastname ASC";
		$data['rows'] = $rows = $member->query($query, ['marked_on' => $date, 'created_on' => $date]);

		$query2 = "SELECT * FROM members AS t1 LEFT JOIN register AS t2 ON t1.id = t2.member_id WHERE t2.marked_on=:marked_on ORDER BY t1.firstname,t1.lastname ASC";
		$data['rows2'] = $rows2 = $register->query($query2, ['marked_on' => $date]);

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		if ($_SERVER['REQUEST_METHOD'] == "POST") {



		    $id = $_POST['member_id'];
		    $row = $member->first(['id' => $id]);

		    $_POST['name'] = $row->firstname . ' ' . $row->lastname;
		    $_POST['gender'] = $row->gender;
		    $_POST['marked_on'] = $date;
		    $_POST['marked_by'] = Auth::getFirstname(). ' '. Auth::getLastname();

		    $_POST['month'] = date('jS M, Y', strtotime($date));
		    

		//    show($_POST);die;
		    $register->insert($_POST);

		    message($row->role_name . " ". $row->firstname . ' ' . $row->lastname. " Marked Successfully");
		    Auth::setMessage($message);
		    
		    redirect("admin/mark_register&date=$date");
		}

		$this->view('admin/register/mark_register',$data);
	}

	public function edit_register()
	{

		$errors = [];
		$data = [];

		$register = new \Model\Register();
		$member = new \Model\Member();		

		$data['date'] = $date = $_GET['date'] ? $_GET['date'] : date('Y-m-d');

		$data['event_date'] = $event_date = date("jS M, Y", strtotime($date));


		$query2 = "SELECT * FROM members AS t1 LEFT JOIN register AS t2 ON t1.id = t2.member_id WHERE t2.marked_on=:marked_on ORDER BY t1.firstname,t1.lastname ASC";

		$data['rows2'] = $rows2 = $member->query($query2, ['marked_on' => $date]);

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			    $_POST['updated_on'] = date("Y-m-d H:i:s");
			    $_POST['updated_by'] = Auth::getFirstname() . ' ' . Auth::getFirstname();
			    $id = $_POST['id'];
			    $name = $row->firstname . ' ' . $row->lastname;
			    $name = $_POST['name'];
			    
			    
			    unset($_POST['id']);
			    unset($_POST['name']);


			    $register->update($id, $_POST);

			    message("Attendance Updated Successfully");

			    redirect("admin/edit_register&date=$date");
			}

		$this->view('admin/register/edit_register',$data);
	}

	public function view_register()
	{

		$errors = [];
		$data = [];

		$register = new \Model\Register();
		$member = new \Model\Member();		

		$data['date'] = $date = $_GET['date'] ? $_GET['date'] : date('Y-m-d');

		$data['event_date'] = $event_date = date("jS M, Y", strtotime($date));

		$query2 = "SELECT * FROM members AS t1 LEFT JOIN register AS t2 ON t1.id = t2.member_id WHERE t2.marked_on=:marked_on ORDER BY t1.firstname,t1.lastname ASC";

		$data['rows2'] = $rows2 = $register->query($query2, ['marked_on' => $date]);

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$this->view('admin/register/view_register',$data);
	}

	public function roles($action = null, $id = null)
	{

		if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}

		$user_id = Auth::getId();
		$role = new \Model\Role();

		$data = [];
		$data['action'] = $action;
		$data['id'] = $id;

		if($action == 'add')
		{
			

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{
				if(user_can('add_roles'))
				{
					if($role->validate($_POST))
					{
						
						$_POST['slug'] = str_to_url($_POST['role']);
						$role->insert($_POST);
						message("Role was successfuly created");
						redirect('admin/roles');
					}
				}else{
					$role->errors['role'] = "You are not allowed to perform this action";
				}

				$data['errors'] = $role->errors;

			}

		}
		elseif($action == 'delete')
		{

			//get role information
			$data['row'] = $row = $role->first(['id'=>$id]);
			
			if(user_can('delete_roles'))
				{
					if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
					{

							
						$role->delete($row->id);
						message("Role was successfuly edited");
						redirect('admin/roles');

						$data['errors'] = $role->errors;

					}}else{
					$role->errors['role'] = "You are not allowed to perform this action";
				}

				$data['errors'] = $role->errors;
 

		}
		elseif($action == 'edit')
		{

			//get role information
			$data['row'] = $row = $role->first(['id'=>$id]);
			
			if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
			{
				if($role->validate($_POST))
				{
					
					$role->update($row->id, $_POST);
					message("Role was successfuly edited");
					redirect('admin/roles');
				}

				$data['errors'] = $role->errors;

			}
 

		}else
		{

			//categories view
			$data['rows'] = $role->findAllByRole();

			if($_SERVER['REQUEST_METHOD'] == "POST")
			{

				//disable all permissions
				$query = "update permissions_map set disabled = 1 where id > 0";
				$role->query($query);

				foreach ($_POST as $key => $permission) {
					
					if(preg_match("/[0-9]+\_[0-9]+/", $key))
					{
						$role_id = preg_replace("/\_[0-9]+/", "", $key);

						$arr = [];
						$arr['role_id'] = $role_id;
						$arr['permission'] = $permission;	

						//check if record exists
						$query = "select id from permissions_map where permission = :permission && role_id = :role_id limit 1";
						$check = $role->query($query,$arr);
						if($check)
						{
							//update
							$query = "update permissions_map set disabled = 0 where permission = :permission && role_id = :role_id limit 1";
						}else
						{
							//insert into permissions table
							$query = "insert into permissions_map (role_id,permission) values (:role_id,:permission)";

						}

						$role->query($query,$arr);
					}
				}

				redirect('admin/roles');
			}

		}

		$this->view('admin/roles',$data);
	}

}
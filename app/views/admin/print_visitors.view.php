
<?php
use \Model\Auth;
$categories = get_categories();


$Sampa_District_Visitors = [
  ['Id', 'First Name', 'Last Name', 'Position', 'Age', 'DoB', 'Email Address', 'Phone Number', 'Location']
];

$id = 0;
foreach ($data['row'] as $row){

if(!empty($row->category_id) AND $row->role_name === 'visitor'){

 $id +=1;

      $dob = $row->dob;
      $today = date("Y-m-d");
      $diff = date_diff(date_create($dob), date_create($today));
      $age = $diff->format('%Y');

      $mydob = get_date_month_day($row->dob);
      $today = date('m d');
                  

    $Sampa_District_Visitors = array_merge($Sampa_District_Visitors, array(array($id, $row->firstname, $row->lastname, $row->role_name, $age, get_date($row->dob), $row->email, $row->phone, $row->residence)));
  }
}

$xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_Visitors);
$xlsx->downloadAs('Sampa_District_Visitors_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

// $xlsx->saveAs('Sampa_District_Visitors' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

echo "<pre>";
print_r($Sampa_District_Visitors . date('Ymd') . date('H.i.s'));

?>
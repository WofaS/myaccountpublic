
<?php
use \Model\Auth;
$categories = get_categories();


if($action == 'print_members')
    {     

      $Sampa_District_members = [
            ['Id', 'First Name', 'Last Name', 'Local Assembly',  'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
          ];

          $id = 0;
          foreach ($data['row'] as $row){

           $id +=1;

                $dob = $row->dob;
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dob), date_create($today));
                $age = $diff->format('%Y');

                $mydob = get_date_month_day($row->dob);
                $today = date('m d');
                            

              $Sampa_District_members = array_merge($Sampa_District_members, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));

          }

          $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_members);
          $xlsx->downloadAs('Sampa_District_members_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

          // $xlsx->saveAs('Sampa_District_members' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

          echo "<pre>";
          print_r($Sampa_District_members . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_central')
    {

      $Sampa_Central_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Central'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Central_Assembly = array_merge($Sampa_Central_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Central_Assembly);
      $xlsx->downloadAs('Sampa_Central_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Central_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Central_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_Buko')
    {

      $Sampa_Duadaso1_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Buko'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Buko_Assembly = array_merge($Sampa_Buko_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Buko_Assembly);
      $xlsx->downloadAs('Sampa_Buko_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Buko_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Buko_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_duadaso1')
    {

      $Sampa_Duadaso1_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Duadaso No.1'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Duadaso1_Assembly = array_merge($Sampa_Duadaso1_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Duadaso1_Assembly);
      $xlsx->downloadAs('Sampa_Duadaso1_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Duadaso1_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Duadaso1_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_duadaso2')
    {

      $Sampa_Duadaso2_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Duadaso No.2'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Duadaso2_Assembly = array_merge($Sampa_Duadaso2_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Duadaso2_Assembly);
      $xlsx->downloadAs('Sampa_Duadaso2_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Duadaso2_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Duadaso2_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    
    elseif($action == 'print_dunamis')
    {

      $Sampa_Dunamis_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Dunamis'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Dunamis_Assembly = array_merge($Sampa_Dunamis_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Dunamis_Assembly);
      $xlsx->downloadAs('Sampa_Dunamis_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Dunamis_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Dunamis_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_elshadai')
    {

      $Sampa_Elshadai_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Elshadai'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Elshadai_Assembly = array_merge($Sampa_Elshadai_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Elshadai_Assembly);
      $xlsx->downloadAs('Sampa_Elshadai_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Elshadai_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Elshadai_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_english')
    {

      $Sampa_English_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'English'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_English_Assembly = array_merge($Sampa_English_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_English_Assembly);
      $xlsx->downloadAs('Sampa_English_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_English_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_English_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_glorious')
    {

      $Sampa_Glorious_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Glorious'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Glorious_Assembly = array_merge($Sampa_Glorious_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Glorious_Assembly);
      $xlsx->downloadAs('Sampa_Glorious_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Glorious_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Glorious_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_jamera')
    {

      $Sampa_Jamera_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Jamera'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Jamera_Assembly = array_merge($Sampa_Jamera_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Jamera_Assembly);
      $xlsx->downloadAs('Sampa_Jamera_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Jamera_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Jamera_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_kabile')
    {

      $Sampa_Kabile_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Kabile'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Kabile_Assembly = array_merge($Sampa_Kabile_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Kabile_Assembly);
      $xlsx->downloadAs('Sampa_Kabile_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Kabile_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Kabile_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_latter_rain')
    {

      $Sampa_LatterRain_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Latter Rain'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_LatterRain_Assembly = array_merge($Sampa_LatterRain_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_LatterRain_Assembly);
      $xlsx->downloadAs('Sampa_LatterRain_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_LatterRain_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_LatterRain_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_new_japan')
    {

      $Sampa_NewJapan_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'New Japan'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_NewJapan_Assembly = array_merge($Sampa_NewJapan_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_NewJapan_Assembly);
      $xlsx->downloadAs('Sampa_NewJapan_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_NewJapan_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_NewJapan_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_new_town')
    {

      $Sampa_NewTown_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'New Town'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_NewTown_Assembly = array_merge($Sampa_NewTown_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_NewTown_Assembly);
      $xlsx->downloadAs('Sampa_NewTown_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_NewTown_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_NewTown_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_royals')
    {

      $Sampa_Royals_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Royals'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Royals_Assembly = array_merge($Sampa_Royals_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Royals_Assembly);
      $xlsx->downloadAs('Sampa_Royals_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Royals_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Royals_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_shallom')
    {

      $Sampa_Shallom_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Shallom'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Shallom_Assembly = array_merge($Sampa_Shallom_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Shallom_Assembly);
      $xlsx->downloadAs('Sampa_Shallom_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Shallom_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Shallom_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_tetelestai')
    {

      $Sampa_Tetelestai_Assembly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->category_id) AND $row->category_id === 'Tetelestai'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_Tetelestai_Assembly = array_merge($Sampa_Tetelestai_Assembly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_Tetelestai_Assembly);
      $xlsx->downloadAs('Sampa_Tetelestai_Assembly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_Tetelestai_Assembly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_Tetelestai_Assembly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_visitors')
    {

      $Sampa_District_visitors = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->role) AND $row->role_name === 'visitor'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_District_visitors = array_merge($Sampa_District_visitors, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_visitors);
      $xlsx->downloadAs('Sampa_District_visitors_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_District_visitors' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_District_visitors . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_children')
    {

      $Sampa_District_children = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->role) AND $row->role_name === 'child'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_District_children = array_merge($Sampa_District_children, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_children);
      $xlsx->downloadAs('Sampa_District_children_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_District_children' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_District_children . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_elders')
    {

      $Sampa_District_elders = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->role) AND $row->role_name === 'elder'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_District_elders = array_merge($Sampa_District_elders, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_elders);
      $xlsx->downloadAs('Sampa_District_elders_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_District_elders' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_District_elders . date('Ymd') . date('H.i.s'));
 

    }
     elseif($action == 'print_officers')
    {

      $Sampa_District_officers = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->role) AND $row->role_name === 'elder' OR $row->role_name === 'deacon' OR $row->role_name === 'deaconess'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_District_officers = array_merge($Sampa_District_officers, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_officers);
      $xlsx->downloadAs('Sampa_District_officers_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_District_officers' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_District_officers . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_deacons')
    {

      $Sampa_District_deacons = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->role) AND $row->role_name === 'deacon'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_District_deacons = array_merge($Sampa_District_deacons, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_deacons);
      $xlsx->downloadAs('Sampa_District_deacons_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_District_deacons' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_District_deacons . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_deaconesses')
    {

      $Sampa_District_deaconesses = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->role) AND $row->role_name === 'deaconess'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_District_deaconesses = array_merge($Sampa_District_deaconesses, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_deaconesses);
      $xlsx->downloadAs('Sampa_District_deaconesses_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_District_deaconesses' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_District_deaconesses . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_membersOnly')
    {

      $Sampa_District_membersOnly = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

      if(!empty($row->role) AND $row->role_name === 'member'){

       $id +=1;

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
                        

          $Sampa_District_membersOnly = array_merge($Sampa_District_membersOnly, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_membersOnly);
      $xlsx->downloadAs('Sampa_District_membersOnly_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_District_membersOnly' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_District_membersOnly . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_Teens')
    {

      $Sampa_District_Teens = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
          if($age > 12 AND $age < 20){

          $id += 1;            

          $Sampa_District_Teens = array_merge($Sampa_District_Teens, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_Teens);
      $xlsx->downloadAs('Sampa_District_Teens_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_District_Teens' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_District_Teens . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_Young_Adults')
    {

      $Sampa_District_Young_Adults = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
          if($age > 19 AND $age < 36){

          $id += 1;            

          $Sampa_District_Young_Adults = array_merge($Sampa_District_Young_Adults, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_Young_Adults);
      $xlsx->downloadAs('Sampa_District_Young_Adults_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_District_Young_Adults' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_District_Young_Adults . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_Adults')
    {

      $Sampa_District_Adults = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
          if($age > 35 AND $age < 61){

          $id += 1;            

          $Sampa_District_Adults = array_merge($Sampa_District_Adults, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_Adults);
      $xlsx->downloadAs('Sampa_District_Adults_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_District_Adults' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_District_Adults . date('Ymd') . date('H.i.s'));
 

    }
    elseif($action == 'print_Aged')
    {

      $Sampa_District_Aged = [
        ['Id', 'First Name', 'Last Name', 'Local Assembly', 'Position', 'Age', 'DoB', 'Marital Status', 'Email Address', 'Phone Number', 'Location']
      ];

      $id = 0;
      foreach ($data['row'] as $row){

            $dob = $row->dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob), date_create($today));
            $age = $diff->format('%Y');

            $mydob = get_date_month_day($row->dob);
            $today = date('m d');
          if($age > 60){

          $id += 1;            

          $Sampa_District_Aged = array_merge($Sampa_District_Aged, array(array($id, $row->firstname, $row->lastname, $row->category_id, $row->role_name, $age, get_date($row->dob), $row->marital_status_id, $row->email, $row->phone, $row->residence)));
        }
      }

      $xlsx = model\SimpleXLSXGen::fromArray($Sampa_District_Aged);
      $xlsx->downloadAs('Sampa_District_Aged_' . date('Ymd_') . date('H.i.sa').'.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('Sampa_District_Aged' . date('Ymd') . date('H.i.s').'.xlsx'); // This will save the file to your server

      echo "<pre>";
      print_r($Sampa_District_Aged . date('Ymd') . date('H.i.s'));
 

    }else
    {

      echo "<h2>Sorry, Unkonwn action!!</h2>";

    }

?>
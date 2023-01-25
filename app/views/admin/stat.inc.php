<?php

use model\Auth;
  $categories = get_categories();
  $members = get_members();

  $current_month_day=date("m-d");
  $current_month=date("m");

  $birthdays= "select count(id) as num from members where date_format(dob, '%m-%d')='{$current_month_day}'";
  $birthdaysToday = query_row($birthdays);

  $birthdays_Coming="select count(id) as num from members where date_format(dob, '%m') = '{$current_month}' AND date_format(dob, '%m-%d') > '{$current_month_day}'";
  $birthdaysToCome = query_row($birthdays_Coming);

  $current_month_day=date("m-d");
  $birthdays="select count(id) as num from members where date_format(dob, '%m-%d')='{$current_month_day}'";
  $birthdaysToday = query_row($birthdays);

  
  $queryAllMembers = "select count(id) as num from members where disabled = '0'";
  $resAllMembers = query_row($queryAllMembers);

  $querySingle = "select count(id) as num from members where marital_status_id = 'Single'";
  $resSingle = query_row($querySingle);
  
  $queryMarried = "select count(id) as num from members where marital_status_id = 'Married'";
  $resMarried = query_row($queryMarried);

  $queryWidowed = "select count(id) as num from members where marital_status_id = 'Widowed'";
  $resWidowed = query_row($queryWidowed);

  $queryDivorced = "select count(id) as num from members where marital_status_id = 'Divorced'";
  $resDivorced = query_row($queryDivorced);

  $queryMale = "select count(id) as num from members where gender = 'male'";
  $resMale = query_row($queryMale);
  
  $queryMaleChild = "select count(id) as num from members where role = '8' AND gender = 'male'";
  $resMaleChild = query_row($queryMaleChild);

  $resMaleAdult = $resMale['num'] - $resMaleChild['num'];

  $queryFemale = "select count(id) as num from members where gender = 'female'";
  $resFemale = query_row($queryFemale);

  $queryFemaleChild = "select count(id) as num from members where role = '8' AND gender = 'female'";
  $resFemaleChild = query_row($queryFemaleChild);

  $resFemaleAdult = $resFemale['num'] - $resFemaleChild['num'];

  //usrs count
  $queryUsers = "select count(id) as num from members where role = '1'";
  $resUsers = query_row($queryUsers);

  //admin count
  $queryAdmin = "select count(id) as num from admin where role = '2'";
  $resAdmin = query_row($queryAdmin);

  //child count
  $queryChild = "select count(id) as num from members where role = '8'";
  $resChild = query_row($queryChild);
  
  //visitor count
  $queryVisitor = "select count(id) as num from members where role = '9'";
  $resVisitor = query_row($queryVisitor);

  //visitor count
  $queryPastor = "select count(id) as num from members where role = '10'";
  $resPastor = query_row($queryPastor);

  //visitor count
  $querySofomaame = "select count(id) as num from members where role = '11'";
  $resSofomaame = query_row($querySofomaame);

  $queryElder = "select count(id) as num from members where role = '5'";
  $resElder = query_row($queryElder);

  $queryDeaconess = "select count(id) as num from members where role = '6'";
  $resDeaconess = query_row($queryDeaconess);

  $queryDeacon = "select count(id) as num from members where role = '7'";
  $resDeacon = query_row($queryDeacon);

  $queryMember = "select count(id) as num from members where role = '4'";
  $resMember = query_row($queryMember);

  $queryEnglish = "select count(id) as num from members where category_id = 'English'";
  $resEnglish = query_row($queryEnglish);



  $queryBuko = "select count(id) as num from members where category_id = 'Buko'";
  $resBuko = query_row($queryBuko);

  $queryCentral = "select count(id) as num from members where category_id = 'Central'";
  $resCentral = query_row($queryCentral);

  $queryDunamis = "select count(id) as num from members where category_id = 'Dunamis'";
  $resDunamis = query_row($queryDunamis);

  $queryDuadaso1 = "select count(id) as num from members where category_id = 'Duadaso No.1'";
  $resDuadaso1 = query_row($queryDuadaso1);

  $queryDuadaso2 = "select count(id) as num from members where category_id = 'Duadaso No.2'";
  $resDuadaso2 = query_row($queryDuadaso2);

  $queryElshadai = "select count(id) as num from members where category_id = 'Elshadai'";
  $resElshadai = query_row($queryElshadai);

  $queryEnglish = "select count(id) as num from members where category_id = 'English'";
  $resEnglish = query_row($queryEnglish);

  $queryGlorious = "select count(id) as num from members where category_id = 'Glorious'";
  $resGlorious = query_row($queryGlorious);

  $queryJamera = "select count(id) as num from members where category_id = 'Jamera'";
  $resJamera = query_row($queryJamera);

  $queryKabile = "select count(id) as num from members where category_id = 'Kabile'";
  $resKabile = query_row($queryKabile);

  $queryLatterRain = "select count(id) as num from members where category_id = 'Latter Rain'";
  $resLatterRain = query_row($queryLatterRain);

  $queryMercySeat = "select count(id) as num from members where category_id = 'Mercy Seat'";
  $resMercySeat = query_row($queryMercySeat);

  $queryNewJapan = "select count(id) as num from members where category_id = 'New Japan'";
  $resNewJapan = query_row($queryNewJapan);
  
  $queryNewTown = "select count(id) as num from members where category_id = 'New Town'";
  $resNewTown = query_row($queryNewTown);

  $queryRoyals = "select count(id) as num from members where category_id = 'Royals'";
  $resRoyals = query_row($queryRoyals);

  $queryShallom = "select count(id) as num from members where category_id = 'Shallom'";
  $resShallom = query_row($queryShallom);
  
  $queryEnglishHB = "select count(id) as num from members where category_id = 'English' and holyghost_baptized = 'yes'";
  $resEnglishHB = query_row($queryEnglishHB);

  $queryEnglishWB = "select count(id) as num from members where category_id = 'English' and water_baptized = 'yes'";
  $resEnglishWB = query_row($queryEnglishWB);

  $queryBukoHB = "select count(id) as num from members where category_id = 'Buko' and holyghost_baptized = 'yes'";
  $resBukoHB = query_row($queryBukoHB);

  $queryBukoWB = "select count(id) as num from members where category_id = 'Buko' and water_baptized = 'yes'";
  $resBukoWB = query_row($queryBukoWB);

  $queryCentralHB = "select count(id) as num from members where category_id = 'Central' and holyghost_baptized = 'yes'";
  $resCentralHB = query_row($queryCentralHB);

  $queryCentralWB = "select count(id) as num from members where category_id = 'Central' and water_baptized = 'yes'";
  $resCentralWB = query_row($queryCentralWB);

  $queryDuadaso1HB = "select count(id) as num from members where category_id = 'Duadaso No.1' and holyghost_baptized = 'yes'";
  $resDuadaso1HB = query_row($queryDuadaso1HB);

  $queryDuadaso1WB = "select count(id) as num from members where category_id = 'Duadaso No.1' and water_baptized = 'yes'";
  $resDuadaso1WB = query_row($queryDuadaso1WB);

  $queryDuadaso2HB = "select count(id) as num from members where category_id = 'Duadaso No.2' and holyghost_baptized = 'yes'";
  $resDuadaso2HB = query_row($queryDuadaso2HB);

  $queryDuadaso2WB = "select count(id) as num from members where category_id = 'Duadaso No.2' and water_baptized = 'yes'";
  $resDuadaso2WB = query_row($queryDuadaso2WB);

  $queryDunamisHB = "select count(id) as num from members where category_id = 'Dunamis' and holyghost_baptized = 'yes'";
  $resDunamisHB = query_row($queryDunamisHB);

  $queryDunamisWB = "select count(id) as num from members where category_id = 'Dunamis' and water_baptized = 'yes'";
  $resDunamisWB = query_row($queryDunamisWB);

  $queryElshadaiHB = "select count(id) as num from members where category_id = 'Elshadai' and holyghost_baptized = 'yes'";
  $resElshadaiHB = query_row($queryElshadaiHB);

  $queryElshadaiWB = "select count(id) as num from members where category_id = 'Elshadai' and water_baptized = 'yes'";
  $resElshadaiWB = query_row($queryElshadaiWB);

  $queryEnglishHB = "select count(id) as num from members where category_id = 'English' and holyghost_baptized = 'yes'";
  $resEnglishHB = query_row($queryEnglishHB);

  $queryEnglishWB = "select count(id) as num from members where category_id = 'English' and water_baptized = 'yes'";
  $resEnglishWB = query_row($queryEnglishWB);

  $queryGloriousHB = "select count(id) as num from members where category_id = 'Glorious' and holyghost_baptized = 'yes'";
  $resGloriousHB = query_row($queryGloriousHB);

  $queryGloriousWB = "select count(id) as num from members where category_id = 'Glorious' and water_baptized = 'yes'";
  $resGloriousWB = query_row($queryGloriousWB);

  $queryJameraHB = "select count(id) as num from members where category_id = 'Jamera' and holyghost_baptized = 'yes'";
  $resJameraHB = query_row($queryJameraHB);

  $queryJameraWB = "select count(id) as num from members where category_id = 'Jamera' and water_baptized = 'yes'";
  $resJameraWB = query_row($queryJameraWB);

  $queryKabileHB = "select count(id) as num from members where category_id = 'Kabile' and holyghost_baptized = 'yes'";
  $resKabileHB = query_row($queryKabileHB);

  $queryKabileWB = "select count(id) as num from members where category_id = 'Kabile' and water_baptized = 'yes'";
  $resKabileWB = query_row($queryKabileWB);

  $queryLatterRainHB = "select count(id) as num from members where category_id = 'Latter Rain' and holyghost_baptized = 'yes'";
  $resLatterRainHB = query_row($queryLatterRainHB);

  $queryLatterRainWB = "select count(id) as num from members where category_id = 'Latter Rain' and water_baptized = 'yes'";
  $resLatterRainWB = query_row($queryLatterRainWB);

  $queryMercySeatHB = "select count(id) as num from members where category_id = 'Mercy Seat' and holyghost_baptized = 'yes'";
  $resMercySeatHB = query_row($queryMercySeatHB);

  $queryMercySeatWB = "select count(id) as num from members where category_id = 'Mercy Seat' and water_baptized = 'yes'";
  $resMercySeatWB = query_row($queryMercySeatWB);

  $queryNewTownHB = "select count(id) as num from members where category_id = 'New Town' and holyghost_baptized = 'yes'";
  $resNewTownHB = query_row($queryNewTownHB);

  $queryNewTownWB = "select count(id) as num from members where category_id = 'New Town' and water_baptized = 'yes'";
  $resNewTownWB = query_row($queryNewTownWB);

  $queryNewJapanHB = "select count(id) as num from members where category_id = 'New Japan' and holyghost_baptized = 'yes'";
  $resNewJapanHB = query_row($queryNewJapanHB);

  $queryNewJapanWB = "select count(id) as num from members where category_id = 'New Japan' and water_baptized = 'yes'";
  $resNewJapanWB = query_row($queryNewJapanWB);

  $queryRoyalsHB = "select count(id) as num from members where category_id = 'New Japan' and holyghost_baptized = 'yes'";
  $resRoyalsHB = query_row($queryRoyalsHB);

  $queryRoyalsWB = "select count(id) as num from members where category_id = 'New Japan' and water_baptized = 'yes'";
  $resRoyalsWB = query_row($queryRoyalsWB);

  $queryRoyalsHB = "select count(id) as num from members where category_id = 'Royals' and holyghost_baptized = 'yes'";
  $resRoyalsHB = query_row($queryRoyalsHB);

  $queryRoyalsWB = "select count(id) as num from members where category_id = 'Royals' and water_baptized = 'yes'";
  $resRoyalsWB = query_row($queryRoyalsWB);

  $queryShallomHB = "select count(id) as num from members where category_id = 'Shallom' and holyghost_baptized = 'yes'";
  $resShallomHB = query_row($queryShallomHB);

  $queryShallomWB = "select count(id) as num from members where category_id = 'Shallom' and water_baptized = 'yes'";
  $resShallomWB = query_row($queryShallomWB);
  //total count
  $totalLeaders = $resElder['num'] + $resDeaconess['num'] + $resDeacon['num'] + $resMember['num'];

  //total count
  $totalOfficers = $resElder['num'] + $resDeaconess['num'] + $resDeacon['num'];

  //total count
  $total_res = $resUsers['num'] + $resAdmin['num'] + $resMember['num']+ $resElder['num']+ $resDeaconess['num']+ $resDeacon['num']+ $resChild['num']+ $resVisitor['num'];

  $registered_thismonth="select count(id) as num from members where date_format(date, '%m') = '{$current_month}' ";
  $total_Registered_This_Month = query_row($registered_thismonth);

  
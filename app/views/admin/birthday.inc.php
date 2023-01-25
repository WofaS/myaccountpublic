<?php

$current_month_day=date("m-d");
$current_year=date("Y");
$notifications=[];

$birthdayCount="select count(id) from members where date_format(dob, '%m-%d')='{$current_month_day}'";

$birthdays="select * from members where date_format(dob, '%m-%d')='{$current_month_day}' and WISH_YEAR<>'{$current_year}'";			
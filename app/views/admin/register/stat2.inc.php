<?php

                        
    $query3 = "SELECT count(*) AS T_ATT FROM register where marked_on=:marked_on";
    $t1 = query_row($query3, ['marked_on' => $date]);
    $total_attendance = $t1['T_ATT'];

    $query3a = "SELECT count(*) AS T_ATT_MALE FROM register where gender=:gender && marked_on=:marked_on";
    $t1a = query_row($query3a, ['marked_on' => $date,'gender'=>'male']);
    $total_male = $t1a['T_ATT_MALE'];

    $query3b = "SELECT count(*) AS T_ATT_FEMALE FROM register where gender=:gender && marked_on=:marked_on";
    $t1b = query_row($query3b, ['marked_on' => $date,'gender'=>'female']);
    $total_female = $t1b['T_ATT_FEMALE'];

    $query4 = "SELECT count(*) AS T_PR FROM register where marked_on=:marked_on && status=:status";
    $t2 = query_row($query4, ['marked_on' => $date,'status'=>'PRESENT']);
    $total_present = $t2['T_PR'];

    $query4a = "SELECT count(*) AS T_PR_MALE FROM register where marked_on=:marked_on && status=:status && gender=:gender";
    $t2a = query_row($query4a, ['marked_on' => $date,'status'=>'PRESENT','gender'=>'male']);
    $total_present_male = $t2a['T_PR_MALE'];

    $query4b = "SELECT count(*) AS T_PR_FEMALE FROM register where marked_on=:marked_on && status=:status && gender=:gender";
    $t2b = query_row($query4b, ['marked_on' => $date,'status'=>'PRESENT','gender'=>'female']);
    $total_present_female = $t2b['T_PR_FEMALE'];

    $query5 = "SELECT count(*) AS T_AB FROM register where marked_on=:marked_on && status=:status";
    $t3 = query_row($query5, ['marked_on' => $date,'status'=>'ABSENT']);
    $total_absent = $t3['T_AB'];

    $query5a = "SELECT count(*) AS T_AB_MALE FROM register where marked_on=:marked_on && status=:status && gender=:gender";
    $t3a = query_row($query5a, ['marked_on' => $date,'status'=>'ABSENT','gender'=>'male']);
    $total_absent_male = $t3a['T_AB_MALE'];

    $query5b = "SELECT count(*) AS T_AB_FEMALE FROM register where marked_on=:marked_on && status=:status && gender=:gender";
    $t3b = query_row($query5b, ['marked_on' => $date,'status'=>'ABSENT','gender'=>'female']);
    $total_absent_female = $t3b['T_AB_FEMALE'];

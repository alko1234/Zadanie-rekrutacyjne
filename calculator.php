<?php

header("Content-type:application/json;charset=utf-8");

$error = false;

$birthDate = $_POST['bd'];

if(!empty($birthDate)){
    $expected_benefits = $_POST['expected_benefits'];

    $today = date('y-m-d');
    $diff = date_diff(date_create($birthDate), date_create($today));
    $age = ($diff->format('%y'));

    if (empty($birthDate))
        $error = true;


    if ($age >= 18 && $age <= 40) {
        $power = 1;
    } else if ($age > 40 && $age < 120) {
        $power = pow(1.04, ($age - 40));
    } else {
        $error = true;
    };


    if ($error == false) {

        if ($age >= 18 && $age <= 40) {
            if($expected_benefits < 999 || empty($expected_benefits)){
                $data['quarter'] = 0;
                $data['half_year'] = 0;
                $data['one_time'] = 0;
                $data['calculated_age'] = $age;
            }else{
                $number = floor($expected_benefits / 1000);
                $data['response'] = "success";
                $data['quarter'] = round((225 * $power * $number * 1.07) / 4);
                $data['half_year'] = round((225 * $power * $number * 1.05) / 2);
                $data['one_time'] = round(225 * $power * $number);
                $data['calculated_age'] = $age;
            }

        } else if ($age > 40 && $age < 120) {
            if($expected_benefits < 999 || empty($expected_benefits)){
                $data['quarter'] = 0;
                $data['half_year'] = 0;
                $data['one_time'] = 0;
                $data['calculated_age'] = $age;
            }else {
                $number = floor($expected_benefits / 1000);
                $data['response'] = "success";
                $data['quarter'] = round((225 * $power * $number * 1.07) / 4);
                $data['half_year'] = round((225 * $power * $number * 1.05) / 2);
                $data['one_time'] = round(225 * $power * $number);
                $data['calculated_age'] = $age;
            }
        }

    } else {
        $data['response'] = "error";
        $data['quarter'] = 0;
        $data['half_year'] = 0;
        $data['one_time'] = 0;
        $data['calculated_age'] = $age;
    };
    echo json_encode($data);
}







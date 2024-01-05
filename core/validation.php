<?php


function vildatename($name) : ?string{
    $error=null;
    if(empty($name)){
        $error="name is required";
    }elseif(! is_string(($name) )){
        $error="name must be string";

    }

    return $error;
}
function vildatecity($city) : ?string{
    $error=null;
    if(empty($city)){
        $error="city is required";
    }elseif(! is_string(($city) )){
        $error="city must be string";

    }

    return $error;
}
function vildatemail($email){
    $error=null;
    if(empty($email)){
        $error="email is required";
    }elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
        $error="EMAIL NOT VAILD";

    }

    return $error;
}

function vildatephone($phone){
    $error=null;

    if(is_numeric($phone)){
        $phone = (int)$phone;
    }
    if(!empty($phone)){
        if(! is_int($phone)){
            $error="phone must be int";
        }elseif($phone <= 0){
            $error="phone must > 0";
        }
    }

    return $error;
}

function vildatepassword($password){
    $error=null;
    if(empty($password)){
        $error="password is required";
    }elseif(! is_string(($password))){
        $error="password must be string";

    }elseif(strlen($password)< 3 ){
        $error ="password must be between 3 && 30";
    }



    return $error;
}


function validateimage(array $image){

    $error=null;
    $toarr=explode("/",$image['type']);
    $index=$toarr[0];

    if($image['error']  != 0){
        $error="image is required";
    }elseif($index != 'image'){
        $error="type must be image";
    }

    return $error;
}





<?php
function santizeinput($input){
    return trim(htmlspecialchars(htmlentities($input)));
}


function checkerrors(array $errors) :bool{
    foreach($errors as $key => $value){
        if($value !== null){
            return false;
        }
    }
    return true;
}
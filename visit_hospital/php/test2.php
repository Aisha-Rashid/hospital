<?php
    $ID = "32456789";
    $id_length = strlen($ID);
    echo $id_length."<br>";
    $isValid = false;
    for($k = 0; $k < $id_length; $k++){
        $number = $ID[$k];
        if($k == 0)
            if($number >= 6)
                break;
        else
            if($number >= 9){
                $isValid = false;
                break;
            }else
                $isValid = true;
    }
    echo $isValid;
?>
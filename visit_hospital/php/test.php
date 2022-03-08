<?php

    $content = trim(file_get_contents("php://input"));
    /* $decoded can be used the same as you would use $_POST in $.ajax */
    $decoded = json_decode($content, true);

print_r(json_encode(['img' => $_POST['name'], 'img2' => $_FILES['img']]));

?>
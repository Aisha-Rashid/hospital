<?php
    require_once(__DIR__ . '/hospitalDB.php');
    require_once(__DIR__ . '/Pocket.php');
    $db = new DataBase();
    /* Receive the RAW post data. */
    $content = trim(file_get_contents("php://input"));
    /* $decoded can be used the same as you would use $_POST in $.ajax */
    $decoded = json_decode($content, true);
    if(!$decoded)
        $decoded = [];

    $user_logon = false;
    if(isset($_SESSION['user']))
        $user_logon = $_SESSION['user'];

    if(in_array('user',array_keys($decoded)))
        print_r(json_encode(['user' => $user_logon]));

    if(isset($_POST['create'])){

        $target = "./../Images/".basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'],$target);

        $insertArray = array(
            ['key' => 'Name', 'value' => $_POST['name']],
            ['key' => 'Age', 'value' => $_POST['age']],
            ['key' => 'Email', 'value' => $_POST['email']],
            ['key' => 'Telephone', 'value' => $_POST['telephone']],
            ['key' => 'Image', 'value' => 'http://localhost/visit_hospital/Images/'.basename($_FILES['img']['name'])],
            ['key' => 'Password', 'value' => $_POST['password']]
        );
        $insertRecord = $db->insertData('users',$insertArray);

        $feedback = ($insertRecord) ? 'Registered successfully' : 'Error with registration';
        print_r(json_encode(['feedback' => $feedback, 'success' => $insertRecord]));

    }
    if(in_array('login',array_keys($decoded))){
        $stmt = "SELECT *
                 FROM users WHERE Email = '".$decoded['email']."' AND Password = '".$decoded['password']."' OR  Telephone = '".$decoded['email']."' AND Password = '".$decoded['password']."'";

        $profileRecord = $db->getData($stmt);
        $feedback = "Invalid user";
        $name = false;
        if($profileRecord){
            $name = true;
            $feedback = "Welcome ".$profileRecord[0]['Name'];
            $_SESSION['user'] = $profileRecord[0]['Email'];
        }

        $personal = new Pocket();
        $admin = false;
        if(($decoded['email'] == $personal->admin && $decoded['password'] == $personal->password) || ($decoded['email'] == (int)$personal->contact && $decoded['password'] == $personal->password))
            $admin = true;

        print_r(json_encode(['feedback' => $feedback, 'identity' => $name, 'admin' => $admin]));
    }
    if(in_array('graph',array_keys($decoded))){
        $stmt = "SELECT *
                 FROM records";

        $foundRecord = $db->getData($stmt);
        $graphData = [];
        if($foundRecord){
            foreach($foundRecord as $foundItem){
                $TIMESTAMP = $foundItem['TIMESTAMP'];
                $time = strtotime($TIMESTAMP);
                $c_time = date("D",$time);
                $c_day = date("d",$time);
                if(in_array($c_time,array_column($graphData,"date"))){
                    $work_key = array_keys(array_column($graphData,"date"),$c_time)[0];
                    $graphData[$work_key]["count"] = (int)$graphData[array_keys(array_column($graphData,"date"),$c_time)[0]]["count"] + 1;
                    $graphData[$work_key]["day"] = $c_day;
                }else{
                    $graphData[] = array(
                        "date" => $c_time,
                        "count" => 1,
                        "day" => $c_day
                    );
                }
            }
        }

        $keys = array_column($graphData, 'day');
        array_multisort($keys, SORT_ASC, $graphData);
        print_r(json_encode($graphData));
    }


?>
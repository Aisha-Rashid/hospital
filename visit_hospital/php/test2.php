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

    if(isset($_POST['create-record'])){

        $target = "./../Images/".basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'],$target);

        $insertArray = array(
            ['key' => 'Sickness', 'value' => $_POST['sickness']],
            ['key' => 'Symptoms', 'value' => $_POST['symptoms']],
            ['key' => 'Medicine', 'value' => $_POST['medicine']],
            ['key' => 'Email', 'value' => $user_logon],
            ['key' => 'Treatment', 'value' => $_POST['treatment']],
            ['key' => 'DoctorName', 'value' => $_POST['doctor_record']],
            ['key' => 'hospitalId', 'value' => $_POST['count']],
            ['key' => 'HospitalName', 'value' => $_POST['sickness_record']]
        );
        $Records = $db->insertData('records',$insertArray);

        function obtain($Records){
            if($Records)
                return 'Registered successfully';
            elseif(($Records == "null"))
                return 'Error with hospital inputs';
            else
                return 'Error with hospital registration';
        }
        $feedback = obtain($Records);

        print_r(json_encode(['feedback' => $feedback, 'success' => $Records]));

    }


    if(isset($_POST['create-doctor'])){

        $target = "./../Images/".basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'],$target);

        $insertArray = array(
            ['key' => 'Name', 'value' => $_POST['name']],
            ['key' => 'Age', 'value' => $_POST['age']],
            ['key' => 'Telephone', 'value' => $_POST['telephone']],
            ['key' => 'Email', 'value' => $_POST['email']],
            ['key' => 'Gender', 'value' => $_POST['gender']],
            ['key' => 'hospitalId', 'value' => $_POST['count']],
            ['key' => 'HospitalName', 'value' => $_POST['hospital']],
            ['key' => 'Image', 'value' => 'http://localhost/visit_hospital/Images/'.basename($_FILES['img']['name'])]
        );
        $doctorRecord = $db->insertData('doctor',$insertArray);

        function obtain($doctorRecord){
            if($doctorRecord)
                return 'Registered successfully';
            elseif(($doctorRecord == "null"))
                return 'Error with hospital inputs';
            else
                return 'Error with hospital registration';
        }
        $feedback = obtain($doctorRecord);

        print_r(json_encode(['feedback' => $feedback, 'success' => $doctorRecord]));

    }

    if(isset($_POST['create-hospital'])){

        $target = "./../Images/".basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'],$target);

        $insertArray = array(
            ['key' => 'Name', 'value' => $_POST['name']],
            ['key' => 'Email', 'value' => $_POST['email']],
            ['key' => 'Telephone', 'value' => $_POST['telephone']],
            ['key' => 'Address', 'value' => $_POST['address']],
            ['key' => 'Image', 'value' => 'http://localhost/visit_hospital/Images/'.basename($_FILES['img']['name'])]
        );
        $hospitalRecord = $db->insertData('hospital',$insertArray);

        function obtain($hospitalRecord){
            if($hospitalRecord)
                return 'Registered successfully';
            elseif(($hospitalRecord == "null"))
                return 'Error with hospital inputs';
            else
                return 'Error with hospital registration';
        }
        $feedback = obtain($hospitalRecord);

        print_r(json_encode(['feedback' => $feedback, 'success' => $hospitalRecord]));

    }
    if(isset($_POST['create'])){

        $target = "./../Images/".basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'],$target);

        $insertArray = array(
            ['key' => 'Name', 'value' => $_POST['name']],
            ['key' => 'Age', 'value' => $_POST['age']],
            ['key' => 'Email', 'value' => $_POST['email']],
            ['key' => 'Telephone', 'value' => $_POST['telephone']],
            ['key' => 'Gender', 'value' => $_POST['gender']],
            ['key' => 'Image', 'value' => 'http://localhost/visit_hospital/Images/'.basename($_FILES['img']['name'])],
            ['key' => 'Password', 'value' => $_POST['password']]
        );
        $userRecord = $db->insertData('users',$insertArray);

        function obtain($userRecord){
            if($userRecord)
                return 'Registered successfully';
            elseif(($userRecord == "null"))
                return 'Error with hospital inputs';
            else
                return 'Error with user registration';
        }
        $feedback = obtain($userRecord);

        print_r(json_encode(['feedback' => $feedback, 'success' => $userRecord]));

    }
    if(in_array('out',array_keys($decoded))){
        session_destroy();
        session_unset();
        print_r(json_encode(['command' => true]));
    }
    if(in_array('destroy',array_keys($decoded))){

        $stmt = "DELETE FROM users WHERE Email = '$user_logon'";

        $destruction = $db->deleteData($stmt);
        print_r(json_encode(['command' => $destruction]));
    }

    if(in_array('destroy_hospital',array_keys($decoded))){

        $stmt = "DELETE FROM hospital WHERE hospitalId = '".$decoded['id']."'";

        $destruction = $db->deleteData($stmt);
        print_r(json_encode(['command' => $destruction]));
    }

    if(in_array('destroy_doctor',array_keys($decoded))){

        $stmt = "DELETE FROM doctor WHERE doctorId = '".$decoded['id']."'";

        $destruction = $db->deleteData($stmt);
        print_r(json_encode(['command' => $destruction]));
    }

    if(in_array('hospital_search',array_keys($decoded))){
         $mouse = $decoded['data'];
         $stmt = "SELECT *
                  FROM hospital WHERE Name LIKE '%$mouse%'";

         $hospital = $db->getData($stmt);

         print_r(json_encode([ 'hospital' => $hospital]));
    }

    if(in_array('hospital_name',array_keys($decoded))){
         $stmt = "SELECT *
                  FROM hospital";

         $hospitals = $db->getData($stmt);

         $data = [];
         if($hospitals)
             foreach($hospitals as $hospital)
                $data[] = [ 'id' => $hospital['hospitalId'] .','. $hospital['Name'], 'text' => $hospital['Name'] ];

         print_r(json_encode([ 'all' => $hospitals, 'select' => $data ]));
    }

    if(in_array('doctor_name',array_keys($decoded))){
         $stmt = "SELECT *
                  FROM doctor";

         $doctors = $db->getData($stmt);

         $data = [];
         if($doctors)
             foreach($doctors as $doctor)
                $data[] = [ 'id' => $doctor['doctorId'] .','. $doctor['Name'], 'text' => $doctor['Name'] ];

         print_r(json_encode([ 'all' => $doctors, 'select' => $data ]));
    }

    if(in_array('record_name',array_keys($decoded))){
         $stmt = "SELECT *
                  FROM records WHERE Email = '$user_logon'";

         $records = $db->getData($stmt);

         $data = [];
         if($records){
            foreach($records as $record){
                 $stmt = "SELECT *
                          FROM users WHERE userId = '".$record['userId']."'";

                 $doctors = $db->getData($stmt);
                 if($doctors)
                    foreach($doctors as $doctor)
                        $data[] = [ 'id' => $doctor['doctorId'], 'text' => $doctor['Name']];

                 $stmt = "SELECT *
                          FROM hospital WHERE hospitalId = '".$record['hospitalId']."'";

                 $hospitals = $db->getData($stmt);
                 if($hospitals)
                    foreach($hospitals as $hospital)
                        $data[] = [ 'id' => $hospital['hospitalId'] .','. $hospital['Name'], 'text' => $hospital['Name']];

            }
         }

        $stmt = "SELECT *
               FROM package WHERE Email = '$user_logon'";

        $package = $db->getData($stmt);
        $member = false;
        if($package)
            $member = $package['Package'];

        print_r(json_encode([ 'all' => $records, 'select' => $data, 'packages' => $member]));
    }
    if(in_array('profile',array_keys($decoded))){
         $stmt = "SELECT *
                  FROM users WHERE Email = '$user_logon'";

         $users = $db->getData($stmt);
         print_r(json_encode([ 'users' => $users]));
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

        print_r(json_encode(['feedback' => $feedback, 'identity' => $name, 'admin' => $admin, 'extra' => [$personal->admin,$personal->password]]));
    }
    if(in_array('graph',array_keys($decoded))){

        $now_table = "records";
        if($decoded['table'] == 1)
            $now_table = "doctor";
        if($decoded['table'] == 2)
            $now_table = "users";
        if($decoded['table'] == 3)
            $now_table = "hospital";
        $stmt = "SELECT *
                 FROM $now_table";

        $foundRecord = $db->getData($stmt);
        $graphData = [];
        if(($foundRecord)){
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
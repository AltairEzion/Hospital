<?php
include_once('connect.php');

//create console.log function
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

if(isset($_POST['uname'])){
    $username = $_POST['uname'];
    $passwd = $_POST['psw'];
                    
    $login = mysqli_query($con, "SELECT * FROM acc WHERE usern = '$username' AND passwd = '$passwd' ");
                    
    if(mysqli_fetch_array($login) == null){
        echo "account not found";
        header( "refresh:1;url= /wellhospital/Final_Project_UPDATE/login.php" );
    } else{
        echo "hi admin";  //dont need
        header("Location: /wellhospital/Final_Project_UPDATE/rroom.php");
    }
                    
}


if(isset($_POST['getroom'])){
    $patno = $_POST['patNo'];
    $roomno = $_POST['roomNo'];
    $stD = $_POST['admission'];
    $endD = $_POST['discharge'];

    //check length of booking
    if($stD >= $endD){
        echo "Error! please make sure <b>Booking date</b> is more than 1 day and not negative.";
        //echo $stD - $endD;
        header( "refresh:2;url= /wellhospital/Final_Project_UPDATE/room.php" );
        return;
    }
    
    $dif = round((strtotime($endD) - strtotime($stdD)) / (60 * 60 * 24));
    $count = 0; $n = $stD;
    console_log($count);
    while($count<$dif){
        $n = date("Y-m-d", strtotime($n. ' + 1 days'));
        $check = mysqli_query($con, "SELECT * FROM track WHERE (roomNo = $roomno AND (checkIn = $n OR checkOut = $n))");
        console_log($n);
        if(mysqli_fetch_array($check) == null){
            echo "This room has already been allocated at that period of time.<br>
            Please select other room or change the days.";
            header( "refresh:3;url= /wellhospital/Final_Project_UPDATE/rroom.php" );
            return; //just make sure not to contunue inserting to the DB
        }

        $count+=1;
    }





    //get usable track id ( last id + 1)
    $trackLine = mysqli_query($con,"SELECT trackId FROM track");
    $idNum = 1;
    $t = mysqli_fetch_array($trackLine);
    while($t != null){
        $t = mysqli_fetch_array($trackLine); $idNum+=1;
    }
 

    //insert value
    $sql = "INSERT INTO track (trackId,patientId,roomNo,checkIn,checkOut) VALUES ('$idNum','$patno','$roomno','$stD','$endD')";
    console_log($sql);
    mysqli_query($con,$sql);
    echo 'success';
    header( "refresh:2;url= /wellhospital/Final_Project_UPDATE/rroom.php" );
}


if(isset($_POST['reg'])){
    $pname = $_POST['name'];
    $addr = $_POST['addr'];
    $tele = $_POST['teleNo'];
    $dob = $_POST['dop'];
    $symp = $_POST['service-select']; 

    if($symp == "Disease Type"){
        echo "Please select <b>Disease Type</b>";
        header( "refresh:2;url= /wellhospital/Final_Project_UPDATE/register.php" );
        return;
    }

    //get usable id ( last id + 1)
    $pi = mysqli_query($con,"SELECT patientId FROM patient");
    $patNum = 1001;
    $p = mysqli_fetch_array($pi);
    while($p != null){
        $p = mysqli_fetch_array($pi); $patNum+=1;
    }   

    //insert value                   
    $sql = "INSERT INTO `patient`(`patientId`, `patientName`, `symptom`, `address`, `dateOfBirth`, `teleNo`) VALUES ('$patNum','$pname','$symp','$addr','$dob','$tele')";
    console_log($sql);
    mysqli_query($con,$sql);
    echo 'success';
    header( "refresh:2;url= /wellhospital/Final_Project_UPDATE/rroom.php" );
}


?>
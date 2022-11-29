<?php

echo "hi1";
include_once('connect.php');
//$con = mysqli_connect('localhost','root','root','hospital');

echo "hi2";

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

console_log($con);
// $test = 'a string here';

// console_log($test);

if(isset($_POST['submit'])){
    // if(!empty($_POST['caseId']) && ($_POST['patientNo']) && ($_POST['doctorNo'])){
    $case=$_POST['caseId'];
    $patient=$_POST['patientNo'];
    $doctor=$_POST['doctorNo'];
    echo "hi3";
    
    $sql = "INSERT INTO cases (caseId,patientNo,doctorNo) VALUES ('$case','$patient','$doctor')";
    console_log($sql);
    mysqli_query($con,$sql);
    // mysqli_query($con,"INSERT INTO case (caseId,patientNo,doctorNo) 
    // VALUES ('$case','$patient','$doctor')");
   
    echo "hi5";
    


    // if(mysqli_query($con,"INSERT INTO case (caseId,patientNo,doctorNo) 
    // VALUES('$case','$patient','$doctor')")); {
    //     echo "data saved";
    //     header("refresh:2,url=caseInput.php");
    //     echo "hi4";
    // }
    
    // }
    // else{
        // echo " please fill the blank";
    // }
}
echo "hi7";

if(isset($_POST['pull'])){
    $sql = "SELECT * FROM cases";

    console_log($sql);
    $return = mysqli_query($con,$sql);
    if (mysqli_num_rows($return) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($return)) {
          echo "<br> id: " . $row["caseId"]
          . " - Name: " . $row["patientNo"]
          . " " . $row["doctorNo"]. "<br>";
        }
      } else {
        echo "0 results";
      }
}

mysqli_close($con);
    echo "hi6";


?>
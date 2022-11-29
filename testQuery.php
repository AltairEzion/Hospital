<?php
    include_once('connect.php');


    

    echo "<a href='/wellhospital/testInp.php'>back</a>";
    echo "<table>";
    $result = mysqli_query($con,"SHOW COLUMNS FROM patients");

    echo "<table border='1'>
    <tr>";
    while($row = mysqli_fetch_array($result)){
        echo "<th>" . $row['Field'] . "</th>"; 
    }
    
    echo"</tr>";
    echo"<style>
    tr {
        height: 30px;
        width: 200px;}
        </style>";

    $no = $_POST["patNo"];
    echo $no;

    $result = mysqli_query($con,"SELECT * FROM patients WHERE patientNo = $no");
    echo "<tr>";
    $count=0;
    $row = mysqli_fetch_row($result);
    while($row[$count] !== null){
        
        echo "<td>" . $row[$count] . "</td>";
        $count+=1;
    }
    echo "</tr>";
    echo "</table>";

    mysqli_close($con);
?>
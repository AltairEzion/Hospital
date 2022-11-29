<?php

    include_once('connect.php');


    echo "<a href='/wellhospital/caseInput.php'>back</a>";
    echo "<table>";
    $result = mysqli_query($con,"SELECT * FROM cases");

    echo "<table border='1'>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    </tr>";
    echo"<style>
    td {
        height: 30px;
        width: 200px;}
        </style>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['caseId'] . "</td>";
    echo "<td>" . $row['patientNo'] . "</td>";
    echo "<td>" . $row['doctorNo'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";

    mysqli_close($con);
?>
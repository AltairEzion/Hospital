

<?php
    include_once('connect.php');  // connect.php:: <?php $con = mysqli_connect('localhost','root','root','hospital'); ? > //conmect to db 

    $result = mysqli_query($con,"SELECT patientNo FROM patients"); //get all row in patientNo column
    $row = mysqli_num_rows($result); // count number of row from output in previous line
    
    echo '
    <style>
    body {color: #f0f8ff; background-color: black;}
    </style>
    <form action="" method="post"> 
    <label for="patNo" ><b>Patient No.</b></label>
    <select id="patNo" name="patNo">
        <option value="">select patient Number</option>
    '; //css and html code, action="" since we do action in the same page

    
    $read = mysqli_fetch_array($result); //fetch array is like dequeue() in queue or pop() in stack idk, it get entire 1 row in table

    while($read !== null){ //loop until reach the end of array
        echo '<option value='.$read['patientNo'].'>'.$read['patientNo'].'</option>'; // since fetch_array get entire row, we tell it that we need only column named 'patientNo'
        $read = mysqli_fetch_array($result); //get content in next row
    };
    echo '</select>
    <button type="submit" id="find" vlaue="Choose options">Find</button>
    </form>
    ';

    //if patNo is posted
    if((isset($_POST['patNo'])) and ($_POST['patNo'] !== '') ){ //if patient No. is not selected, option value will be blank so skip query the db
        $opt = $_POST['patNo']; //store selected option into variable

        $info = mysqli_query($con,"SELECT * FROM patients WHERE patientNo = $opt"); //query row that have selected patientNo
        $colName = mysqli_query($con,"SHOW COLUMNS FROM patients"); //get column name from patients table
        $count = 0;
        $iN = mysqli_fetch_row($info); 
        while(($cName = mysqli_fetch_array($colName))){ 
            echo '<p>-'.$cName['Field'].': '.$iN[$count].'</p>'; $count +=1;   
        }
    }
    



    mysqli_close($con);
?>
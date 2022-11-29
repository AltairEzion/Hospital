<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset utf="8"/>
        <title>add case to DataBase</title>
    </head>
<body>

    <form action="new.php" method="post">
        <input type="number" name="caseId" placeholder="xxxxxx"/><br>
        <input type="number" name="patientNo" placeholder="enter here"/><br>
        <input type="number" name="doctorNo" placeholder="000000"/><br>
        <input type="submit" name="submit" value="Insert" />
        <br>
        <input type="submit" name="pull" value="see" />
    </form>

</body>
</html>
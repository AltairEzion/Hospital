<!DOCTYPE html>
 <html>
    <header>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Login Page</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    </header>

    <style>

        ul {
            list-style-type: none; /*remove the bullets*/
            /*remove browser defualt settings*/
            margin: 0; 
            padding: 0;
            overflow: hidden;
            background-color: #2D3648;
            /*fix the nav bar to the top*/
            position: fixed;
            top: 0;
            width: 100%;
        }

        li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 30px;
            text-decoration: none;
            font-family: Arial, Helvetica, sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
            line-height: 25px;
        }

        li a:hover:not(.active) {
            background-color: #29303f;
            color: rgb(230, 230, 230);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        body{
            background-color: white;
        }

        .nav_bar{
                
            position: fixed;
            z-index: 1;
        }

        /* Body */

        /* log in */

        body {font-family: Arial, Helvetica, sans-serif;}
        
        form {
            border: 3px solid #f1f1f1;
            padding: 14px 30px;
        }

        input[type=text], input[type=password], input[type=search], input[type=submit], #patNo{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }

        button {
        background-color: #2D3648;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        }

        button:hover {
        opacity: 0.9;
        }

        .imgcontainer {
        text-align: center;
        margin: 100px 0 12px 0;
        }

        img.avatar {
        width: 40%;
        border-radius: 50%;
        }

        .container {
        padding: 16px;
        }

        span.psw {
        float: right;
        padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
        }

        /* track */

        .track{
            margin: 80px 0 12px 0;
            padding: 14px 30px;

        }

        /* Footer */
        .credits{

            list-style-type: none; /*remove the bullets*/
            /*remove browser defualt settings*/
            margin: 0; 
            padding: 14px 30px;
            overflow: hidden;
            background-color: #2D3648;
            text-align: left;
            color: white;

            font-family: Arial, Helvetica, sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
        }

        .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            float: right;
            }

            /* The actual popup */
            .popup .popuptext {
            visibility: hidden;
            width: 260px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -160px;
            }

            /* Popup arrow */
            .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
            }

            /* Toggle this class - hide and show the popup */
            .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
            }

            /* Add animation (fade in the popup) */
            @-webkit-keyframes fadeIn {
            from {opacity: 0;} 
            to {opacity: 1;}
            }

            @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
            }

        

    </style>
    <body>

        <!-- Navigation -->
        <ul class="nav_bar">

            <li style="float:left; font-size: 40px; font-family: Copperplate, Papyrus, fantasy;"><a href="./index.html" style="font-size: 40px; font-family: Copperplate, Papyrus, fantasy;">Jaewhon+ Hospital</a></li>
            <li style="float:right;"><a href="#login"><u>Login</u></a></li>
            <li style="float:right;"><a href="#contact">Contact</a></li>
            <li style="float:right;"><a href="#about">About Us</a></li>
            
        </ul>

        <!-- Login -->

        <div class="row">

            <div class="col-sm-12 col-md-6">

                <form action="/action_page.php" method="post">
                    <div class="imgcontainer">
                        <img src="./img/login_icon.jpg" alt="Avatar" class="avatar">
                    </div>
                
                    <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="uname" required>
                    
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>
                        
                        <button type="submit">Login</button>
                        <label>
                            <input type="checkbox" checked="checked" name="remember"> Remember me
                        </label>
                    </div>
                    <br><br>
                
                </form>
            </div>

        <!-- Track -->

            <div class="col-sm-12 col-md-6 track">

                <h1><b>Room Status</b></h1>

                <?php
                    include_once('connect.php');
                    $result = mysqli_query($con,"SELECT patientId FROM patient"); //get all row in patientNo column
                    $row = mysqli_num_rows($result); // count number of row from output in previous line
                    $read = mysqli_fetch_array($result); //fetch array is like dequeue() in queue or pop() in stack idk, it get entire 1 row in table
                    
                    echo '<form action="" method="post">
                            <div class="container">
                                <select id="patNo" name="patNo">
                                    <option value="">select patient Number</option>
                                ';
                    while($read !== null){ //loop until reach the end of array
                        echo '<option value='.$read['patientId'].'>'.$read['patientId'].'</option>'; // since fetch_array get entire row, we tell it that we need only column named 'patientNo'
                        $read = mysqli_fetch_array($result); //get content in next row
                    };

                    echo '      </select>
                                <input type="submit" value="Search" >
                            </form>

                            

                        <br><br>
                        <hr size="2" color="#2D3648">
                        <br><br>

                        <h3><b>Result:</b></h3><br>

                        
                        <script>
                        // When the user clicks on div, open the popup
                        function myFunction() {
                            
                            var popup = document.getElementById("myPopup");
                            popup.classList.toggle("show");
                        }
                        </script>
                        
                        ';

                        //if patNo is posted
                    if((isset($_POST['patNo'])) and ($_POST['patNo'] !== '') ){ //if patient No. is not selected, option value will be blank so skip query the db
                        $opt = $_POST['patNo']; //store selected option into variable

                        $info = mysqli_query($con,"SELECT * FROM track WHERE patientId = $opt"); //query row that have selected patientNo
                        $colName = mysqli_query($con,"SHOW COLUMNS FROM track"); //get column name from patients table
                        $count = 0;
                        $iN = mysqli_fetch_row($info); 
                        while(($cName = mysqli_fetch_array($colName))){ 
                            if( $iN[$count]==null){ echo ' <p> no appointment found! </p>'; return;};
                
                            echo '<p>- '.$cName['Field'].': '.$iN[$count].'</p>'; $count +=1;   
                        
                            if( $count == 1){echo '
                                <a class="popup" onclick="myFunction()">[more detail]
                                <span class="popuptext" id="myPopup">';

                                $pinfo = mysqli_query($con,"SELECT * FROM patient WHERE patientId = $opt"); //query row that have selected patientNo
                                $pcolName = mysqli_query($con,"SHOW COLUMNS FROM patient"); //get column name from patients table
                                $pCount = 1;
                                $piN = mysqli_fetch_row($pinfo); 
                                $pcName = mysqli_fetch_array($pcolName); //remove first line ( patientId)
                                while(($pcName = mysqli_fetch_array($pcolName))){ 
                        
                                    echo $pcName['Field'].': '.$piN[$pCount].'<br>'; $pCount +=1;
                                }
                                echo '</span>
                                </a>
                                ';}
                            if( $count == 3){
                                $rno = $iN[2];
                                $ainfo = mysqli_query($con,"SELECT * FROM room WHERE roomNo = $rno"); //query row that have selected patientNo
                                $acolName = mysqli_query($con,"SHOW COLUMNS FROM room"); //get column name from patients table
                                $aiN = mysqli_fetch_row($ainfo); 
                                $acName = mysqli_fetch_array($acolName); //remove first line ( patientId)
                                $acName = mysqli_fetch_array($acolName); 
                        
                                echo '<a class="popup">' . $acName['Field'].': '.$aiN[1] . '</a>';
                                
                                }
                                
                                
                                
                                
                        }
                    }
                    
                    

                    

                ?>













            </div>
        </div>


        <!-- Footer -->

        <div class="credits">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <br>
                    Nopparat Tongam 61109010479 <br>
                    Chanitchaya Chanline 64109010157 <br>
                    Chutirat Saengyingyongwattana 64109010158 <br><br>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <br>
                    Nutnicha Kraichoke 64109010159 <br>
                    Phawin Panitkachonkul 64109010162 <br>
                    Jakkapat Phiphitpharadon 64109010446 
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4" style="text-align:right;">
                    <br><br><br>
                    <a href="#policy"><u>Term and Policy</u></a>
                </div>
            </ul>
            
        </div>
        


    </body>
    
 </html>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <title>Room Management</title>
            
            <style>

                .nav_bar{
                    
                    list-style-type: none; /*remove the bullets*/
                    /*remove browser defualt settings*/
                    margin: 0; 
                    overflow: hidden;
                    background-color: #2D3648;
                    /*fix the nav bar to the top*/
                    position: fixed;
                    top: 0;
                    width: 100%;
                    z-index: 1;

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

                .nav_bar a:hover:not(.active) {
                    background-color: #29303f;
                    color: rgb(230, 230, 230);
                }

                a {
                    text-decoration: none;
                    color: inherit;
                }

                h1{
                    color: #29303f;
                    padding: 14px 30px;
                    margin-top: 100px
                }

                form {
                    /* display: flex; */
                    align-items: center;
                    justify-content: center;
                }


                * {
                    box-sizing: border-box;
                }

                body {
                
                    height: 100%;
                    margin: 0;
                    font-family: Arial, Helvetica, sans-serif;
                    
                }

                .container {
                    perspective: 1000px;
                    margin-bottom: 30px;
                }

                .room {
                    margin: 3px;
                    padding: 5px 5px;
                    background: #2D3648;
                    color: white;
                    border-radius: 2px;
                    width: 20px;
                    height: 20px;
                    text-align: center;
                    cursor: pointer;
                    transition: all .4s ease;
                    
                }

                /*
                .rooms {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    margin-top: 30px;
                    }
                */
                
                .room.selected {
                background-color: #6feaf6;
                }

                .room.occupied, .showcase li:last-child:after {
                background-color: rgb(162, 162, 162);
                }

                .room:nth-of-type(2) {
                margin-right: 18px;
                }

                .room:nth-last-of-type(2) {
                margin-left: 18px;
                }

                .room:not(.occupied):hover {
                cursor: pointer;
                transform: scale(1.2);
                }

                .room:focus{
                    background-color: #6feaf6;
                }

                .showcase .room:not(.occupied):hover {
                cursor: default;
                transform: scale(1);
                }

                .showcase {

                    float: right;
                    text-align: right;
                    margin-right: 15px;
                    background: rgba(0, 0, 0, 0.1);
                    padding: 5px 10px;
                    border-radius: 5px;
                    color: #777;
                    list-style-type: none;
                    display: flex;
                    justify-content: space-between;
                }

                .showcase li {
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 10px;
               
        
                }

                .showcase li small {
                margin-left: 2px;
                }

                .showcase li:after{
                    /* content: ""; */
                    display: inline-block;
                    width: 16px;
                    height: 16px;
                    border-radius: 2px;
                    position: relative;
                        right: -5px;
                        top: 3px;
                }

                .row {
                display: flex;
                }

                

                p.text {
                margin: 5px 0;
                }

                p.text span {
                color: gray;
                }

                /* body{
                transform: scale(1.4);
                } */


                .status{
                    color:black;
                }

                .nav-link{
                color: white !important;
                font-weight: 500 !important;
                }


                .btn-regis{
                background-color: #2D3648;
                border: 1px solid #2D3648;
                color: white;
                padding: 14px 30px;
                border-radius: 10px;
                font-size: 1em;
                font-weight: 600;
                cursor: pointer;
                
                
                }

                #rNo, #PatNo{
                /* width: 100%; */
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
                align: center;
                }

                #dR, #sR{
                /* width: 100%; */
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
                align: center;
                float:left;
                }

                

            </style>
        </head>
        <body>

            <!-- Navigation -->

            <ul class="nav_bar">

                <li style="float:left; font-size: 40px; font-family: Copperplate, Papyrus, fantasy;"><a href="index.html" style="font-size: 40px; font-family: Copperplate, Papyrus, fantasy;">Jaewhon+ Hospital</a></li>
                <li style="float:right;"><a href="login.php"><u>Logout</u></a></li>
                
                
            </ul>

            <center>

          
            <!-- admission form -->

            <h1>Room Management</h1>  
            <form action="action.php" method="post">
                <label for="admission_date">Admission&nbsp;&nbsp;</label>
                <input type="date" min = "<?php echo date("Y-m-d"); ?>" id="admission" name="admission" required>
                &nbsp; &nbsp;to
                <label for="discharge_date">&nbsp;&nbsp;Discharge&nbsp;&nbsp;</label>
                <input type="date" min = "<?php echo date("Y-m-d"); ?>" id="discharge" name="discharge" required>
                <hr/>
                <?php
                    include_once('connect.php');
                    //room
                    $result = mysqli_query($con,"SELECT roomNo FROM room"); 
                    $row = mysqli_num_rows($result); // count number of row from output in previous line
                    $read = mysqli_fetch_array($result); //fetch array is like dequeue() in queue or pop() in stack idk, it get entire 1 row in table
                    
                    echo '
                                <select id="rNo" name="roomNo">
                                    <option value="">select Room</option>
                                ';
                    while($read !== null){ //loop until reach the end of array
                        echo '<option value='.$read['roomNo'].'>'.$read['roomNo'].'</option>'; // since fetch_array get entire row, we tell it that we need only column named 'patientNo'
                        $read = mysqli_fetch_array($result); //get content in next row
                    };

                    echo '      </select>';

                    //patient
                    $presult = mysqli_query($con,"SELECT patientId FROM patient"); 
                    $prow = mysqli_num_rows($presult); // count number of row from output in previous line
                    $pread = mysqli_fetch_array($presult); //fetch array is like dequeue() in queue or pop() in stack idk, it get entire 1 row in table
                    
                    echo '&nbsp;&nbsp;
                                <select id="PatNo" name="patNo">
                                    <option value="">select Patient</option>
                                ';
                    while($pread !== null){ //loop until reach the end of array
                        echo '<option value='.$pread['patientId'].'>'.$pread['patientId'].'</option>'; // since fetch_array get entire row, we tell it that we need only column named 'patientNo'
                        $pread = mysqli_fetch_array($presult); //get content in next row
                    };

                    echo '      </select>';

                    ?><br>
                <input type="submit" class="btn-regis" name="getroom">


              </form>



              <form action="" method="post">
                <label for="admission_date" class="row">Check Availability in this month&nbsp;&nbsp;</label>
                
                <?php
                    include_once('connect.php');
                    //room
                    $dRoom = mysqli_query($con,"SELECT roomNo FROM room"); 
                    $drow = mysqli_num_rows($dRoom); // count number of row from output in previous line
                    $dread = mysqli_fetch_array($dRoom); //fetch array is like dequeue() in queue or pop() in stack idk, it get entire 1 row in table
                    
                    echo '
                                <select id="dR" name="dR" >
                                    <option value="">select Room</option>
                                ';
                    while($dread !== null){ //loop until reach the end of array
                        echo '<option value='.$dread['roomNo'].'>'.$dread['roomNo'].'</option>'; // since fetch_array get entire row, we tell it that we need only column named 'patientNo'
                        $dread = mysqli_fetch_array($dRoom); //get content in next row
                    };

                    echo '      </select><input type="submit" id ="sR" name="sRoom"><br><br><br><br>';

                    if((isset($_POST['sRoom'])) and ($_POST['dR'] !== '') ){                   
                        $currentR = $_POST['dR'];
                        //echo $currentR;
                        $currentMonth = date('m');
                        //echo $currentMonth;
                        $ccount = 0;
                        $checkQ = mysqli_query($con, "SELECT checkIn,checkOut FROM track WHERE MONTH(checkin) = $currentMonth AND roomNo = $currentR");
                        if(mysqli_fetch_array($checkQ) == null){ 
                            echo '
                            <div class="container">';
                            for ($ccount1 = 0; $ccount1 < 5; $ccount1++){
                                echo '<div class="row">';
                                $ccount = 0; if($ccount1 == 4){$ccount=4;}
                                    while ($ccount < 7){
                                        echo '
                                            <div id="room" class="room"></div>
                                        '; $ccount++;}
                                echo'</div>';}echo '</div>';
                        } else{
                            //echo "month: ".$currentMonth."  room: ".$currentR;
                            $ccount = 0;
                            $monthQ = mysqli_query($con, "SELECT checkIn,checkOut FROM track WHERE MONTH(checkin) = $currentMonth AND roomNo = $currentR");
                            $getdate = mysqli_fetch_array($monthQ);
                            
                            while( $getdate != null){
                                $ccount++;
                                $startList[$ccount] = date('d', strtotime($getdate['checkIn']));                                
                                $endList[$ccount] = date('d', strtotime($getdate['checkOut']));
                                $getdate = mysqli_fetch_array($monthQ);
                              
                            } $listNum = $ccount;
                            while( $ccount > 0){
                                //echo '  :'. $startList[$ccount] . '  ' . $endList[$ccount] . "----   "; 
                                $different[$ccount] = $endList[$ccount] - $startList[$ccount];
                                //echo 'dif: '.$different[$ccount].'||';
                                $ccount--;
                            } $ccount = $listNum; $allocated = array();
                            //echo '<br>'.$startList[2].','.$different[2].',,'.$startList[2]+1;
                            while( $ccount > 0){
                                $ccount1 = $different[$ccount];
                                while ($ccount1 >= 0){
                                    array_push($allocated, $startList[$ccount]+$ccount1);
                                    //print_r($allocated); echo '<br>';
                                    $ccount1--;
                                }
                                $ccount--;
                            } $mon31 = array(1, 3, 5, 7, 8, 10, 12); //let's say Feb has 30 days ^.^
                            $ccount = 1;
                            if ( in_array($currentMonth, $mon31)){
                                $maxD = 31;
                            } else{ $maxD = 30;}

                            echo '<div class="container">';
                            while ( $ccount <= $maxD){
                                for ( $i = 1; $i < 6; $i++){
                                    echo '  <div class="row">';
                                    for ( $j = 1; $j < 8; $j++){
                                        if ($ccount > $maxD){ echo '    </div>  </div>'; continue;}
                                        echo '      <div id="room" class="room';
                                        if( in_array($ccount, $allocated)){
                                           echo ' occupied';}
                                        echo '"></div>';

                                        //echo ' | '.$i . ' '. $j.' '.$ccount . ' | ';
                                        $ccount++;
                                    }
                                    echo '  </div>';
                                }
                            }
                            echo '</div>';
                        }
                            
                    }

                    
                    ?>


              </form>











            
            <!-- showcase -->
            <section >
                <ul class="showcase">
                <li>
                    <div id="room" class="room"></div>
                    <small class="status">Available</small>
                </li>
                <li>
                    <div id="room" class="room occupied"></div>
                    <small class="status">Occupied</small>
                </li>
                </ul>

            </section>

              
             

            

            <a href="./register.php">
            <button class="btn-regis" style="bottom: 10%; margin-left:50; margin-left:55px;position: fixed;">
                Register
            </button>
            </a>

            </center>
            

         
        </body>
    </html>

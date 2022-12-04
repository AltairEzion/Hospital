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
                    padding: 15px 15px;
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
                    content: "";
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











            
            <!-- showcase -->
            <section>
                <ul class="showcase">
                <li>
                    <div id="room" class="room"></div>
                    <small class="status">N/A</small>
                </li>
                <li>
                    <div id="room" class="room selected"></div>
                    <small class="status">Selected</small>
                </li>
                <li>
                    <div id="room" class="room occupied"></div>
                    <small class="status">Occupied</small>
                </li>
                </ul>

            </section>

            <div class="container">

            <div class="row">
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
            </div>
            <div class="row">
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room occupied"></div>
                <div id="room" class="room occupied"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
            </div>
            <div class="row">
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room occupied"></div>
                <div id="room" class="room occupied"></div>
            </div>
            <div class="row">
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
            </div>
            <div class="row">
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room occupied"></div>
                <div id="room" class="room occupied"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
            </div>
            <div class="row">
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room"></div>
                <div id="room" class="room occupied"></div>
                <div id="room" class="room occupied"></div>
                <div id="room" class="room occupied"></div>
                <div id="room" class="room"></div>
            </div>
            </div>

            <p class="text" style="font-size: 1em;margin:0px 0px 15px 0px">
            You have selected <span id="count">0</span> rooms for a price of $<span
                id="total"
                >0</span
            >
            </p>

            <a href="./register.php">
            <button class="btn-regis">
                Register
            </button>
            </a>

            </center>
            

            <!-- <script>
            
            var count=0;
            var rooms=document.getElementsByClassName("room");
            for(var i=0;i<rooms.length;i++){
                var item=rooms[i];
                
                item.addEventListener("click",(event)=>{
                var price= document.getElementById("movie").value;

                if (!event.target.classList.contains('occupied') && !event.target.classList.contains('selected') ){
                count++;
                
                var total=count*price;
                event.target.classList.add("selected");
                document.getElementById("count").innerText=count;
                document.getElementById("total").innerText=total;
                
            var rooms=[];
            var initPos = 65;
            for (var i = 0; i < 78; i++) {
                var row = String.fromCharCode(initPos + Math.floor(i/9));
                var taken = (i%7 == 0 || i%6 == 0)? 'taken' : '';

                var aisle = (i%9 === 1)? 'aisle-right':
                            (i%9 === 7)? 'aisle-left': '';

                if(row === 'I')
                    aisle = 'aisle-top';

                rooms.push(`<div class="room ${taken} ${aisle}">${row}${i%9 + 1}</div>`);
            }
            $('.rooms').html(seats.join(''));

            $('.rooms').on('click', '.room', evt => {
                var $room= $(evt.currentTarget);

                if(!$room.hasClass('taken')) {
                    $room.toggleClass('selected');

                    var $sel = $room.parent().find('.selected');
                    var qty = $sel.length * 5.44;
                    $('.total span').text(`$${qty}`.substring(0,6));
                }
            });

            }
            })
            }
            </script> -->
        </body>
    </html>

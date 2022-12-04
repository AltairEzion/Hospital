<!DOCTYPE html>
    <html>
        <head>
            <title>Pateint Admission Register</title>

            <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        </head>
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
                overflow: hidden; /* disable scrolling*/
            }

            .nav_bar{
                    
                position: fixed;
                z-index: 1;
            }

            .appointment-area .appointment-wrap {
            border-bottom: 1px solid #eee;
            }

            .appointment-area .appointment-left h1 {
            margin-bottom: 20px;
            }

            @media (max-width: 991px) {
            .appointment-area .appointment-left h1 {
                font-size: 30px;
            }
            }

            .appointment-area .appointment-left p {
            max-width: 370px;
            }

            @media (max-width: 991px) {
            .appointment-area .appointment-left {
                padding-top: 120px;
                margin-bottom: 40px;
            }
            }

            .appointment-area .appointment-left .time-list {
            margin-top: 50px;
            }

            .appointment-area .appointment-left .time-list li {
            border-bottom: 1px solid #eee;
            font-size: 14px;
            font-weight: 400;
            color: #222;
            margin-bottom: 20px;
            padding-bottom: 20px;
            }

            .appointment-area .appointment-right {
            margin-top: -85px;
            background-color: white;
            box-shadow: 0px 10px 20px 0px rgba(153, 153, 153, 0.1);
            }

            @media (max-width: 767px) {
            .appointment-area .appointment-right {
                margin-top: 30px;
            }
            }

            .appointment-area .appointment-right .form-wrap {
            padding: 0px 40px;
            }

            @media (max-width: 413px) {
            .appointment-area .appointment-right .form-wrap {
                padding: 0px;
            }
            }

            .appointment-area .appointment-right .form-wrap .form-control {
            margin-bottom: 10px;
            border-radius: 0px;
            padding: 0.675rem 0.75rem;
            font-size: 13px;
            font-weight: 300;
            }

            .appointment-area .appointment-right .form-wrap .form-control:focus {
            box-shadow: none;
            }

            .appointment-area .appointment-right .form-wrap .current {
            margin-left: -32px;
            font-size: 13px;
            }

            .appointment-area .appointment-right .form-wrap .form-select .nice-select {
            border: 1px solid #ced4da;
            margin-bottom: 10px;
            }

            .appointment-area .appointment-right .form-wrap .form-select .nice-select .list .option {
            padding-left: 15px;
            }

            .appointment-area .appointment-right .form-wrap .primary-btn {
            width: 100%;
            margin-top: 5px;
            }

            .appointment-area .appointment-right .form-wrap textarea {
            width: 100%;
            border: 1px solid #ced4da;
            margin-bottom: 30px;
            padding: 0.675rem 0.75rem;
            font-size: 13px;
            font-weight: 300;
            }


            .primary-btn {
            background: #2D3648;
            line-height: 42px;
            padding-left: 30px;
            padding-right: 30px;
            border: none;
            color: #fff;
            display: inline-block;
            font-weight: 500;
            position: relative;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
            cursor: pointer;
            position: relative;
            border-radius: 4px;
            }

            .primary-btn:hover {
            opacity: 0.9;
            }


        </style>
        <body>

        <!-- Navigation -->
        <ul class="nav_bar">

            <li style="float:left; font-size: 40px; font-family: Copperplate, Papyrus, fantasy;"><a href="./index.html" style="font-size: 40px; font-family: Copperplate, Papyrus, fantasy;">Jaewhon+ Hospital</a></li>
            <li style="float:right;"><a href="login.php"><u>Logout</u></a></li>
            
        </ul>

        
        <center>
        <div class="col-lg-6 col-md-6 appointment-right pt-60 pb-60" style="margin: 100px 0;">
                                    
                    <form class="form-wrap" action="action.php" method="post">
                            <h1 class="pb-20 text-center mb-30">Pateint Register</h1>	<br>	
                            <input type="text" class="form-control" name="name" placeholder="Patient Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Patient Name'" required><br>
                            <!-- <input type="text" class="form-control" name="pId" placeholder="Pateint ID " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Patient ID'" ><br> -->
                            <input type="text" class="form-control" name="addr" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required><br>
                            <input type="number" class="form-control" name="teleNo" placeholder="Telephone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telephopne Number'" required><br>
                         
                            <input type="date" name="dop" class="dates form-control"  placeholder="Date of Birth" required><br>   
                            
                            <select class="form-select" id="service-select" name = "service-select" required>
                                <option data-display="Disease Type">Disease Type</option>
                                <option value="Generel Fever">Generel Fever</option>
                                <option value="Pain">Pain</option>
                                <option value="Eye problem">Eye problem</option>
                                <option value="Kidney">Kidney</option>
                                <option value="Bones">Bones</option>
                                <option value="Sexual">Sexual</option>
                                <option value="Diabetics">Diabetics</option>
                                <option value="Heart's problem">Heart's problem</option>
                                <option value="Others">Others</option>
                            </select> <br><br>
                            
                           
                            <button class="primary-btn text-uppercase" name = reg>Register</button>
                        </form>
                    </div>
                </div>
            </div>	
        </center>

        </body>
    </html>
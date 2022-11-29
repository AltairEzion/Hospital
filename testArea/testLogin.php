<!DOCTYPE html>

<html lang="en">
    <head> 
        <meta charset utf="8"/>
        <title>Login Page</title>
    </head>
<body>

<div class="container">
    <label for="uname" ><b>Username</b></label>
    <!-- <input type="text" id='uname' placeholder="Enter Username" name="uname" required> -->
    <select id="uname" name="uname" placeholder="Enter Username">
    <option value="admin">admin</option>
    <option value="user">user</option>
    <option value="guest">guest</option>
    </select>

    <label for="psw" ><b>Password</b></label>
    <input type="password" id='pwd' placeholder="Enter Password" name="psw" required>

    <button type="submit" id="loginBtn" onclick="loginFunc();">Login</button>
    
  </div>
    
    <script>

        function loginFunc() {
            var i = document.getElementById("uname").value;
            var p = document.getElementById("pwd").value;

            if(i=='admin'&&p=='admin123'){
                alert ("ur in! as admin");
                location.href = '/wellhospital/caseInput.php'; //redirect to path
            }else if(i=='user'&&p=='user123'){
                alert("ur in! as user");
            }else if(i=='guest'&&p=='guest123'){
                alert("ur in! as guest");
            }else(alert('wrong!')); 
}
        
    </script>

</body>



</html>

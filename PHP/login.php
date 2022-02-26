<?php
//  echo"Username";

if(isset($_POST["username"])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "letschatt";
    // echo"Username";
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        
    }
    $Username = $_POST['username'];
    $password = $_POST['password'];
    session_start();
    $_SESSION["id"] = $Username;
    $sql = "SELECT Username,password FROM login where Username='$Username'";
    $result = $conn->query($sql);
    if (!empty($result) && $result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) 
        {
            $safePassword=$row["password"];
            $passback = password_verify($password, $safePassword);
            if ($passback) {
              
                
            } 
            else {
                echo"Incorrect Password!";
            }
            
        }
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
<nav>
        <div class="logo">
           Letschatt
        </div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
        </label>
        <ul>
           
           <li><a href="#">ABOUT US</a></li>
           <li><a href="Register.php">Register</a></li>
           <li><a class="active" href="#">Login</a></li>
           <!-- <li><a href="#">Gallery</a></li>
           <li><a href="#">Feedback</a></li> -->
        </ul>
     </nav>
      <div class="content">
        <h1 class="topheading">Let's chatt!!!</h1>
   
        <div class="box" >
            <h2 class="secondheading">ENTER USERNAME TO CHAT</h2>
                    
            <form action="chat.php" method="post" class="input1">
                <div style="align-items: center;">
                    <input type="text" name="username" placeholder="Enter your Username" class="input topinput">
                    <input type="submit" class="submit" >
    
                </div>
    
            </form>
        </div>
        
        <br>
        <br>
        <footer style="background-color: black; color:white;text-align:center;height:80px;">
            <span ><br><div class="logo"><h4>
               COPYRIGHT @ADITYA KUMAR</h4>
             </div>
            </span>
            </footer>
    </div>
    
</body>
</html>
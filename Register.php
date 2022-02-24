<?php 
// Database configuration  
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "letschatt";  

// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  

// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}

 
// If file upload form is submitted 
$status = $statusMsg = ''; 
$FIND=0;
$checkcopy=0;
$CPASSCOPY;
$PASSCOPY;

       
if(isset($_POST["name"])){ 
        

        // Allow certain file formats 
        
        
    
            $name = $_POST['name'];
            $Username = $_POST['username'];
            $Email = $_POST['email'];
            $Phone = $_POST['Phone'];
            // $SAPID = $_POST['SAPID'];
            $Password = $_POST['password'];
            $safePassword=password_hash($Password, PASSWORD_DEFAULT);
            // $passback = password_verify($Password, $safePassword); used to check the whether 
            
            $CPASSCOPY=$Password;
            $CPassword = $_POST['cpassword'];
            $PASSCOPY=$CPassword;
            // $Tid = $_POST['Tid'];
          
            if($CPASSCOPY!==$PASSCOPY){
            
              $checkcopy=1;
            }
            else
          {    
            session_start();
            $_SESSION["id"] = $Username;
            // Insert image content into database 
                try{
                $db->query("CREATE TABLE REGISTRATIONS (name varchar(255),username varchar(255),email varchar(255),phone varchar(255))");
                }
                finally{
                $insert = $db->query("INSERT into REGISTRATIONS(name,username,email,phone) VALUES ('$name','$Username','$Email','$Phone')"); 
                $insert = $db->query("INSERT into login(Username,password) VALUES ('$Username','$safePassword')"); 
                }
                if($insert){ 
                    $FIND=1;
                }
                else{ 
                }
        
          }  
     
    
} 

// Display status message 
echo $statusMsg; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
</body>
</html>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Responsive Navigation Menu</title>
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="CSS/navbar.css">
      <link rel="stylesheet" href="CSS/register.css">

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
           <li><a class="active" href="#">Register</a></li>
           <li><a href="login.html">Login</a></li>
           <!-- <li><a href="#">Gallery</a></li>
           <li><a href="#">Feedback</a></li> -->
        </ul>
     </nav>
      <div class="content">
        <h1 class="topheading">Let's chatt!!!</h1>
   
        <div class="box" >
            <h2 class="secondheading">Register Now</h2>
                    <?php
                        if($FIND==1){
                            echo"<div style='text-align:center;color:green;font-size:30px;'>Successfully registered!!! </div>";
                        }
                    ?>
            <form action="Register.php" method="post" class="input1">
                <div style="align-items: center;">
                    <input type="text" name="name" placeholder="Enter your name" class="input topinput">
                    <input type="Phone" name="Phone" placeholder="Enter your Phone number" class="input">
                    <input type="Email" name="email" placeholder="Enter your email" class="input">
                    <input type="text" name="username" placeholder="Enter your username" class="input">
                    <input type="Password" name="password" placeholder="Set your Pasword" class="input">
                    <input type="Password" name="cpassword" placeholder="Confirm your Pasword" class="input">
                    <?php
                        if($checkcopy==1){
                            echo"<div style='text-align:center;color:red;font-size:30px;'>Password and Confirm password are same!!!! </div>";
                        }
                    ?>
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
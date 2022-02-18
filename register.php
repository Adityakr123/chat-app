
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
if(isset($_POST["submit"])){ 
        
       
         
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
                $db->query("CREATE TABLE REGISTRATIONS (name varchar(255),username varchar(255),email varchar(255),phone varchar(255))) ";
            }
            finally{
                $insert = $db->query("INSERT into REGISTRATIONS(name,username,email,phone) VALUES ('$name','$Username','$Email','$Phone')"); 
                $insert = $db->query("INSERT into login(Username,password) VALUES ('$Username','$safePassword')"); 
                if($insert){ 
                    $FIND=1;
                }
                else{ 
                }
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
    <?php

    ?>
</body>
</html>
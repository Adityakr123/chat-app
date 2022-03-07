<?php
//  echo"Username";

    $test=0;
    session_start();
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
   
    $fromname=$_SESSION["id"];
    $Username = $_POST['username'];
    $_SESSION["toname"]=$Username;
    $table=$fromname.$Username;
    $table1=$Username.$fromname;
    // echo"$table";
    $result = $conn->query("select 1 from $table LIMIT 1");
    if($result!== FALSE) {
        // echo"1";
        $_SESSION["table"]=$table;
    }
    else{
        $result1 = $conn->query("select 1 from $table1 LIMIT 1") ;
            if($result1!== FALSE) {
                $_SESSION["table"]=$table1;
            }
        else{
            // echo"3";
            $conn->query("CREATE TABLE $table (sender varchar(255),reciever varchar(255),message varchar(255),DATE DATETIME)");
            $_SESSION["table"]=$table;
        }
    }
    
   
    // $conn->query("INSERT INTO $table(sender,reciever,message,DATE) VALUES ('A', 'A', 'A', current_timestamp());");
    
    // $sql = "SELECT Username,password FROM login where Username='$Username'";
    // $result = $conn->query($sql);
    // if (!empty($result) && $result->num_rows > 0) {
    //     while($row = mysqli_fetch_assoc($result)) 
    //     {
           
              
           
    //     }
    // }

}
?>
<?php

// if( $_SESSION['submit'] == $_POST['submit'] && 
// isset($_SESSION['submit'])){
// // user double submitted 
// }
// else {
// // user submitted once
// $_SESSION['submit'] = $_POST['submit'];  
if(isset($_POST["submit"])){
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
   
    $fromname=$_SESSION["id"];
    $toname = $_SESSION["toname"];
    // echo"$fromname";
    $message = $_POST['message'];
   
    $table2=$_SESSION["table"];
    $conn->query("INSERT INTO $table2(sender,reciever,message,DATE) VALUES ('$fromname','$toname','$message', current_timestamp());");

}


// if(isset($_POST["submit"])){
//     $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "letschatt";
//     // echo"Username";
// // Create connection
//     $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
          
//     }
//     session_start();
//     $fromname=$_SESSION["id"];
//     $toname = $_SESSION["toname"];
//     // echo"$fromname";
//     $message = $_POST['message'];
//     $table2=$_SESSION["table"];
//     $conn->query("INSERT INTO $table2(sender,reciever,message,DATE) VALUES ('$fromname','$toname','$message', current_timestamp());");



// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/chatcopy.css">
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
           <li><a class="login.html"  href="#">Login</a></li>
           <!-- <li><a href="#">Gallery</a></li>
           <li><a href="#">Feedback</a></li> -->
        </ul>
     </nav>
      <div class="content">
        
   
        <div class="box " >
            <form action="chat.php" method="post" class="input1">
                <div style="align-items: center;">
                   
                    <div class="text scroll">
                    <?php
                    include 'message.php';
                    ?>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11" > <input type="text" name="message" placeholder="Message" class="input2"></div>
                          <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1" ><input type="submit" name="submit" class="submit1" placeholder="send" ></div>
                          <?php
                            $test=1;
                          
                          ?>
                         
                        </div>
                      </div>
                   
                    
                    
    
                </div>
    
            </form>
        </div>
        
        <br>
        <br>
        <!-- <footer style="background-color: black; color:white;text-align:center;height:80px;">
            <span ><br><div class="logo"><h4>
               COPYRIGHT @ADITYA KUMAR</h4>
             </div>
            </span>
            </footer> -->
      </div>
    
</body>
</html>  
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
    session_start();
    $fromname=$_SESSION["id"];
    $Username = $_POST['username'];
    $table=$fromname.$Username;
    $table1=$Username.$fromname;
    echo"$table";
    $result = $conn->query("select 1 from $table LIMIT 1");
    if($result!== FALSE) {
        echo"1";
    }
    else{
        $result1 = $conn->query("select 1 from $table1 LIMIT 1") ;
            if($result1!== FALSE) {
            
            }
        else{
            echo"3";
            $conn->query("CREATE TABLE $table (sender varchar(255),reciever varchar(255),message varchar(255),DATE DATETIME)");
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
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
    $sql = "SELECT Username,password FROM login where Username='$Username'";
    $result = $conn->query($sql);
    if (!empty($result) && $result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) 
        {
           
              echo"hello$password";
           
        }
    }

}
?>
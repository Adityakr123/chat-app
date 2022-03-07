<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "letschatt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$fromname=$_SESSION["id"];
$table2=$_SESSION["table"];
$sql = "SELECT sender, message FROM $table2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["sender"]==$fromname){
        // echo"$fromname";
        echo"<div style='text-align:right;margin-right:30px;'>". $row["message"]."<br>"."</div>";
    }
    else{
        // echo"$fromname";
        echo"<div style='text-align:left; '>". $row["message"]."<br>"."</div>";
    }
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<!-- <script>
    window.setInterval('refresh()', 10000); 	
    // Call a function every 10000 milliseconds 
    // (OR 10 seconds).

    // Refresh or reload page.
    function refresh() {
        window .location.reload();
    }
</script> -->
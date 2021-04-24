<?php
//connect to database
// MySQLi Connect to DB
$hostname='127.0.0.1';
$username='root';
$password="";
$dbname='MyBrary';
//Saving the sql connect in a variable
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// check connection
if($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}else {

    echo "Successfully Connected";

}
?>
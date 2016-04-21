<?php
include_once 'psl-config.php';   // As functions.php is not included

$conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
mysqli_set_charset($conn, 'utf8');


//$conn = mysql_connect(HOST, USER, PASSWORD,TRUE);
//mysql_selectdb(DATABASE,$conn);
//mysql_set_charset('utf8',$conn);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//    $sql = "SELECT * FROM extensions WHERE relation_id=13 AND language_id=4";
//$result = $conn->query($sql);
//
//if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        print_r($row);
//        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//    }
//} else {
//    echo "0 results";
//}
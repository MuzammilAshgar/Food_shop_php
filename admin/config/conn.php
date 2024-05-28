<?php
// here session is on all page
session_start();

$adminpage="/manage_admin.php";

$host = "localhost";
$name = "root";
$passowrd = "";
$database = "food_shop";

$conn =mysqli_connect(
"$host",
"$name",
"",
"$database"
);

if(!$conn){

header("refresh: 0; url=../index.html");
echo "<h1> error on network</h1>";
}


?>
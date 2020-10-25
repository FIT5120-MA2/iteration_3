<?php

$servername = "localhost";
$username = "bn_wordpress";
$password = "17507da303";
$dbname = "bitnami_wordpress";
$link=mysqli_connect("localhost","bn_wordpress","17507da303");
mysqli_select_db($link,$dbname);
$conn = new mysqli($servername, $username, $password, $dbname);
$output = '';
$res = array("FreezerTime"=> 0, "FridgeTime"=>0);
global $wpdb;
if (isset($_GET["Food_Product"])|| $_GET["Food_Product"]!= "") {
    $Food_Product1=$_GET["Food_Product"];
    $Food_Product= trim($Food_Product1, '"');


    $res = mysqli_query($link,"SELECT * FROM food_storage");
    $row=mysqli_fetch_array($res);


    while($row = mysqli_fetch_array($res)) {

        if($row["Food_Product"]== $_GET["Food_Product"]){
        $output = array("FreezerTime"=> $row["Freezer Storage"], "FridgeTime"=>$row["Refrigerator Storage"], "Food_Product"=>$row["Food_Product"]);
        }

    }

    echo json_encode($output);


}
else{
    echo "Please enter a food name";
}
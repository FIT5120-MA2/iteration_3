<?php
//getFoodName.php
$servername = "localhost";
$username = "bn_wordpress";
$password = "17507da303";
$dbname = "bitnami_wordpress";
$link=mysqli_connect("localhost","bn_wordpress","17507da303");
mysqli_select_db($link,$dbname);
$conn = new mysqli($servername, $username, $password, $dbname);
$output = '';
$Food_Category=$_GET["Food_Category"];

if($Food_Category != ""){
    $res = mysqli_query($link,"SELECT distinct(Food_Name) FROM food_portion_adult where Food_Category= '$Food_Category'");


    echo "<select>";
    while($row=mysqli_fetch_array($res)) {
        echo "<option>";
        echo $row["Food_Name"];
        echo "</option>";
    }
    echo "</select>";

}

?>
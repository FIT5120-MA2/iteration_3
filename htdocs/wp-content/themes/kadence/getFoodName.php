<?php
//echo "test1";
$cat_name = $_GET["Food_Category"];

//echo $cat_name;

$servername = "localhost";
$username = "bn_wordpress";
$password = "17507da303";
$dbname = "bitnami_wordpress";

$conn = new mysqli($servername, $username, $password, $dbname);


if($conn){
	//echo "DB connected12###";
	$query_str = "SELECT Food_Name FROM food_portion_adult where Food_Category ='" . $cat_name . "';";
	//echo "Queryassad: " . $query_str;
	$sql = mysqli_query($conn, "SELECT Food_Name FROM food_portion_adult where Food_Category ='" . $cat_name . "';");
	
	while ($row = $sql->fetch_assoc()){
    $foodname = $row['Food_Name'];
    //echo $foodname;
	echo "<option value='$foodname'>$foodname</option>";

}

}
else{
	echo "DB not connected";
}
	

?>


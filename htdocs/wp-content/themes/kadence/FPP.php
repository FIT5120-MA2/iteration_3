<?php /* Template Name: FPP */ ?>

<?php
$servername = "localhost";
$username = "bn_wordpress";
$password = "17507da303";
$dbname = "bitnami_wordpress";

$conn = new mysqli($servername, $username, $password, $dbname);


?>

<html>
<body>
<form method="post">
 Food Category  : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="foodCategory" id="foodCategory" onchange = "change_category()">
        <option selected="selected">Choose…</option>
<?php 
$sql = mysqli_query($conn, "SELECT distinct(Food_Category) FROM food_portion_adult");
$foodCategory= '<select name="select">';

while ($row = $sql->fetch_assoc()){
    $foodCategory = $row['Food_Category'];
    echo "<option value='$foodCategory'>$foodCategory</option>";
}

?>
</select>
<br>
<br>
<br>
Food Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="foodName" id="foodName" >
        <option selected="selected">Choose…</option>
		 

</select>
<br>
<br>
<br>

Number of Meals:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="number" id="numberOfMeals" value="0" min="0">

<br>
<br>
<br>

Number of Adults(Y18+):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="number" id="adultcount" value="0" min="0">

<br>
<br>
<br>

Number of Children(Y11-Y17):&nbsp;&nbsp
<input type="number" id="oldchildcount" value="0" min="0">

<br>
<br>
<br>

Number of Childern(Y5-Y10):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="number" id="childcount" value="0" min="0">

<br>
<br>
<br>

Number of Toddlers(Y0-Y15):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="number" id="toddlercount" value="0" min="0">

<br>
<br>
<br>

<input type="submit" value="Calculate" name="Submit1">

<?php
if(isset($_POST["Submit1"]))
{
//$sum=$_POST["str1"] + $_POST["str2"];
echo "The sum = ";

}
?>


</form>

<script type="text/javascript">
        function change_category(){
			//alert("test");
            var xmlhttp=new XMLHttpRequest();
			//var temp = "<option> one </option> <option> two</option> <option> three </option>";
            var Url = document.getElementById("foodCategory").value;
			//alert("123");
			//alert(Url);
            xmlhttp.open("GET", '/wp-content/themes/kadence/getFoodName.php?Food_Category='+Url ,true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.onload = function() {
			   console.log(xmlhttp.responseText);
			   //alert("test point 2");
			 //alert(xmlhttp.responseText);
            document.getElementById("foodName").innerHTML=xmlhttp.responseText;
			};
            xmlhttp.send(null);
			//alert(temp);
			
			//document.getElementById('foodName').options.add(new Option("one", "one"));
			//document.getElementById('foodName').options.add(new Option("two", "two"));
            
           // console.log(xmlhttp);
        }
</script>
<script type="text/javascript">
function submit(){
	alert('Submit button pressed');
  
	var mealcount = document.getElementById("numberOfMeals").value;
	alert(mealcount);
	return false; //do not submit the form
}
</script>


</body>
</html>


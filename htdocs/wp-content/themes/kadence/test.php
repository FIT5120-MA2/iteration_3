
<?php /* Template Name: test */ ?>

<?php
include_once ("~/opt/bitnami/apps/wordpress/htdocs/wp-includes");
$servername = "localhost";
$username = "bn_wordpress";
$password = "17507da303";
$dbname = "bitnami_wordpress";
$link=mysqli_connect("localhost","bn_wordpress","17507da303");
mysqli_select_db($link,$dbname);
$conn = new mysqli($servername, $username, $password, $dbname);
?>
    <form name="portionPlan" action="http://18.219.247.101/CalculatePortion.php" method="post">
        <table>
            <tr>
                <td><strong>Food Category:</strong></td>
                <td><select id="Food_Category" name = "Food_Category" onchange="showHint(this.value)">
                        <option disabled="disabled" selected="selected">Select</option>
                        <?php
                        $res=mysqli_query($link,"SELECT distinct(Food_Category) FROM food_portion_adult");
                        while($row=mysqli_fetch_array($res)) {
                            ?>
                            <option value="<?php echo $row['Food_Category']; ?>"><?php echo $row['Food_Category']; ?></option>
                            }<?php
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td><strong>Food Name:</strong></td>
                <td>
                    <div id="Food_Name">
                        <label>
                            <select>
                                <option disabled="disabled" selected="selected">Select</option>

                            </select>
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td><strong>Number of Meals:<strong><input type="number" name="numberOfMeals" value="0" min="0"></td>
            </tr>
            <tr>
                <td><strong>Adults(Y18+):</strong><input type="number" name="adults" value="0" min="0"></td>
            </tr>
            <tr>
                <td><strong>Children(Y11-Y17+):</strong><input type="number" name="child11" value="0" min="0"></td>
            </tr>
            <tr>
                <td>
                    <strong>Childern(Y5-Y10):</strong><input type="number" name="child5" value="0" min="0">
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Toddlers(Y1-Y4):</strong> <input type="number" name="child1" value="0" min="0">
                </td>
            </tr>
        </table>
        <input type="submit" value="Calculate" />
    </form>
    <script type="text/javascript">
        function showHint(str) {

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("Food_Name").innerHTML = this.responseText;
                    }
                };
            debugger;
                xmlhttp.open("GET", 'http://18.219.247.101/getFoodName.php?Food_Category=' + str, true);
                xmlhttp.send();
            console.log(xmlhttp);

}
    </script>
<?php
/*
$Food_Name= $_POST["Food_Name"];
$numberOfMeals= $_POST["numberOfMeals"];

$adults= $_POST["adults"];
$child11= $_POST["child11"];
$child5= $_POST["child5"];
$child1= $_POST["child1"];

$res_adults=mysqli_query($link,"SELECT * FROM food_portion_adult where Food_Name = '$Food_Name'");
if (mysqli_num_rows($res_adults) > 0){
    echo $Food_Name;
    echo "a";
}
else{
    echo "b";
    echo $Food_Name;
}

while ($row = $res_adults->fetch_assoc()) {
    $adultQ = $row['Quantity'];
}
if($adultQ!=""){
    echo "a";
}

$res_child11=mysqli_query($link,"SELECT older_kid_Quantity FROM food_portion_older_kids where Food_Name=$Food_Name");
while ($row = $res_child11->fetch_assoc()) {
    $child11Q = $row['older_kid_Quantity'];
}
$res_child5=mysqli_query($link,"SELECT kid_Quantity FROM food_portion_kids where Food_Name=$Food_Name");
while ($row = $res_child5->fetch_assoc()) {
    $child5Q = $row['kid_Quantity'];
}
$res_child1=mysqli_query($link,"SELECT toddler_Quantity FROM food_portion_toddlers where Food_Name=$Food_Name");
while ($row = $res_child1->fetch_assoc()) {
    $child1Q = $row['toddler_Quantity'];
}
$Total= ( $adultQ + $child11Q + $child1Q+ $child5Q) * $numberOfMeals;

if(isset($_POST["Food_Name"]))
{

    echo "Total amount of the food is ", $Total;
    echo $adultQ * $numberOfMeals," is for adults";
    echo $child11Q * $numberOfMeals," is for child(Y11-17) ";
    echo $child5Q * $numberOfMeals," is for child(Y5-10)";
    echo $child1Q * $numberOfMeals," is for tollders";

}
                            <?php
                            $res=mysqli_query($link,"SELECT distinct(Food_Name) FROM food_portion_adult");
                            while($row=mysqli_fetch_array($res)) {
                                ?>
                                <option value="<?php echo $row['Food_Name']; ?>"><?php echo $row['Food_Name']; ?></option>
                                }<?php
                            }
       function change_category(){
            var xmlhttp=new XMLHttpRequest();
            var Url = document.getElementById("Food_Category").value;
//xmlhttp.open("GET", '<?php //admin_url( 'http://18.219.247.101/2020/09/29/getfoodname/?Food_Category="+document.getElementById("Food_Category").value', 'relative' ); ?>',true);
            xmlhttp.open("GET", '/wp-content/themes/kadence/getFoodName.php?Food_Category='+Url ,true);
            xmlhttp.send(null);
            debugger;
            document.getElementById("Food_Name").innerHTML=xmlhttp.response;
             alert(xmlhttp.response);
            console.log(xmlhttp);
        }

*/


?>

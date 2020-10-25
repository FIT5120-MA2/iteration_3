<?php
$servername = "localhost";
$username = "bn_wordpress";
$password = "17507da303";
$dbname = "bitnami_wordpress";
$link=mysqli_connect("localhost","bn_wordpress","17507da303");
mysqli_select_db($link,$dbname);
$conn = new mysqli($servername, $username, $password, $dbname);
$output = '';



if(isset($_GET["Food_Name"])){
    $Food_Name=$_GET["Food_Name"];
    $numberOfMeals=$_GET["numberOfMeals"];
    $adults=$_GET["adults"];
    $child11=$_GET["child11"];
    $child5=$_GET["child5"];
    $toddlers=$_GET["toddlers"];
    $adultsWeight=0.0;
    $child11Weight=0.0;
    $child5Weight=0.0;
    $toddlersWeight=0.0;
    $adultsQuantity=0;
    $child11Quantity=0;
    $child5Quantity=0;
    $toddlersQuantity=0;
    $adultsMeasureDesc="";
    $child11MeasureDesc="";
    $child5MeasureDesc="";
    $toddlersMeasureDesc="";
    $adultres="";
    $older_kid="";
    $child="";
    $toddler="";
    $total="";

    function TestBlockHTML ($adults,$older_kid,$child,$toddler,$total) { ob_start(); ?>
    <html><head>
    <p class="output"> <?php echo ($adults) ?> <br><?php echo ($older_kid) ?><br><?php echo ($child) ?><br><?php echo ($toddler) ?><br><n><?php echo ($total) ?></p>
	</head>
    </html>

<?php
    return ob_get_clean();
}

    if($adults!=0){
        $res = mysqli_query($link,"SELECT * FROM food_portion_adult where Food_Name= '$Food_Name'");
        $row=mysqli_fetch_array($res);
        $adultsWeight=$row["Weight_grams"]*$numberOfMeals*$adults;
        $adultsQuantity=$row["Quantity"]*$numberOfMeals*$adults;
        $adultsMeasureDesc=$row["Measure_desc"];
        $adultres = "Plan for adults are " . $adultsQuantity . " (" . $adultsMeasureDesc . "), the total weight is " . $adultsWeight." grams<br>";
    }
    if($child11!=0){
        $res = mysqli_query($link,"SELECT * FROM food_portion_older_kids where Food_Name= '$Food_Name'");
        $row=mysqli_fetch_array($res);

        if($row["older_kid_Weight_grams"]!=0){
            $child11Weight=$row["older_kid_Weight_grams"]*$numberOfMeals*$child11;
            $child11Quantity=$row["older_kid_Quantity"]*$numberOfMeals*$child11;
            $child11MeasureDesc=$row["Measure_desc"];
            $older_kid = "Plan for Children(Y11-Y17+) are " . $child11Quantity . ' (' . $child11MeasureDesc . '), the total weight is '. $child11Weight." grams<br>";
        }
        else {
            $child11Quantity=0;
            $older_kid = "This food is not recommended for Children(Y11-Y17+)<br>";
        }

    }
    if($child5!=0){
        $res = mysqli_query($link,"SELECT * FROM food_portion_kids where Food_Name= '$Food_Name'");
        $row=mysqli_fetch_array($res);
        if($row["kid_Weight_grams"]!=0){
            $child5Weight=$row["kid_Weight_grams"]*$numberOfMeals*$child5;
            $child5Quantity=$row["kid_Quantity"]*$numberOfMeals*$child5;
            $child5MeasureDesc=$row["Measure_desc"];
            $child = "Plan for Children(Y5-Y10) are " . $child5Quantity. ' ('. $child5MeasureDesc. '), the total weight is '. $child5Weight." grams<br>";
        }
        else{
            $child5Quantity=0;
            $child = "This food is not recommended for Children(Y5-Y10)<br>";
        }

    }
    if($toddlers!=0){
        $res = mysqli_query($link,"SELECT * FROM food_portion_toddlers where Food_Name= '$Food_Name'");
        $row=mysqli_fetch_array($res);
        if($row["toddler_Weight_grams"]!=0){
            $toddlersWeight=$row["toddler_Weight_grams"]*$numberOfMeals*$toddlers;
            $toddlersQuantity=$row["toddler_Quantity"]*$numberOfMeals*$toddlers;
            $toddlersMeasureDesc=$row["Measure_desc"];
            $toddler = "Plan for Toddlers(Y1-Y4) are " . $toddlersQuantity . ' ('. $toddlersMeasureDesc. '), the total weight is '. $toddlersWeight." grams<br>";
        }
      else{
          $toddlersQuantity=0;
          $toddler = "This food is not recommended for Toddlers(Y1-Y4)<br>";
      }
    }
    $totalWeight=floatval($adultsWeight)+floatval($child11Weight)+floatval($child5Weight)+floatval($toddlersWeight);
    $totalQuantity=floatval($adultsQuantity)+floatval($child11Quantity)+floatval($child5Quantity)+floatval($toddlersQuantity);
    $total = "Please prepare ".$totalQuantity." (".$adultsMeasureDesc.") ".$Food_Name. " in total, which is ".$totalWeight." grams ".$Food_Name;
    echo TestBlockHTML($adultres,$older_kid,$child,$toddler,$total);

    /*echo json_encode(array('adultsQuantity'=>$adultsQuantity,'adultsMeasureDesc'=>$adultsMeasureDesc,'adultsWeight'=>$adultsWeight,
        'child11Quantity'=>$child11Quantity,'child11MeasureDesc'=>$child11MeasureDesc,'child11Weight'=>$child11Weight,
        'child5Quantity'=>$child5Quantity,'child5MeasureDesc'=>$child5MeasureDesc,'child5Weight'=>$child5Weight,
        'toddlersQuantity'=>$toddlersQuantity,'toddlersMeasureDesc'=>$toddlersMeasureDesc,'toddlersWeight'=>$toddlersWeight));*/
}
else{
    echo "nothing sent";
}
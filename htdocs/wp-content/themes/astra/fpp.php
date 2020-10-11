<?php
/* Template name : FPP */
get_header();
?>


<?php $mysql = NEW mysql('localhost:3306','bn_wordpress','17507da303','bitnami_wordpress')

$result = $mysql -> query("select distinct Food_Category from food_portion_adult ");

?>
<select name="Food_Category">
<?php 
while($rows = $result -> fetch_assoc())
{
$category_name = $rows['Food_Category']
echo "<option value = '$category_name'>$category_name</option>"
}
?>


<?php
get_footer();
?>
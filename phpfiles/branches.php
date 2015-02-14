<?php
include_once("config.php");
header('Access-Control-Allow-Origin: *');


$query = mysql_query("SELECT * from tbl_branches"); // Run your query

echo '<select name="branches">'; // Open your drop down box
echo '<option>Select Branches</option>';
// Loop through the query results, outputing the options one by one
while ($row = mysql_fetch_array($query)) {

   echo '<option value="'.$row['sql_branches_name'].'">'.$row['sql_branches_name'].'</option>';
}

echo '</select>';
?>
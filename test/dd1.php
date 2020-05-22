<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>plus2net demo scripts using JQuery</title>
</head>
<script src="../../js/jquery-1.8.1.min.js"></script>
<body>
<script>
$(document).ready(function() {
////////////
$('#t1').hide();
$('#category').change(function(){
//var st=$('#category option:selected').text();
var Cat_Id=$('#category').val();
$('#sub-category').empty(); //remove all existing options
///////
$.get('ddck.php',{'Cat_Id':Cat_Id},function(return_data){
$('#msg').text(" Number of Records found :"+return_data.no_of_records);
if(return_data.no_of_records>=1){
$('#t1').hide();
$('#sub-category').show();
$.each(return_data.data, function(key,value){
		$("#sub-category").append("<option value='" + value.Sub_id +"'>"+value.Sub_cat_name+"</option>");
	});
}else{
/// add text box and hide 2nd subcategory 
$('#sub-category').hide();
$('#t1').show();
}
}, "json");
///////
});
/////////////////////
});
</script>
<div id=msg> &nbsp;</div><br><br>
<form method=post action=dd-submit.php>
<select name=category id=category>
<option value='' selected>Select</option>
<?Php
require "../config-mysqli.php";// connection to database 
$sql="select * from main_category "; // Query to collect data 

if($stmt = $connection->query($sql)){

  echo "No of records : ".$stmt->num_rows."<br>";

  while ($row = $stmt->fetch_assoc()) {
echo "<option value=$row[Cat_Id]>$row[Cat_Name]</option>";
 }
}else{
echo $connection->error;
}
echo "</select>
<select name=sub-category id=sub-category>
</select> <input type=text name=t1 id=t1>
<input type=submit value=Submit></form><br><br>



</body>
</html>
";
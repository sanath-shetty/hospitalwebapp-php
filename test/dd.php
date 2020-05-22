<script src="../js/jquery-1.8.1.min.js"></script>
<script>
$(document).ready(function() {
////////////
$('#spec').change(function(){
//var st=$('#category option:selected').text();
var s_id=$('#spec').val();
$('#docName').empty(); //remove all existing options
///////
$.get('ddck.php',{'s_id':s_id},function(return_data){
	if(return_data.data.length>0){
		$('#msg').html( return_data.data.length + ' records Found');
$.each(return_data.data, function(key,value){
		$("#docName").append("<option value='" + value.doc_id +"'>"+value.f_name+"</option>");
	});
	}else{
	$('#msg').html('No records Found');
}
}, "json");

///////
});
/////////////////////
});
</script>
<div id=msg> &nbsp;</div><br><br>
<form method=post action=dd-submit.php>
<select name=spec id=spec>
<option value='' selected>Select</option>
<?Php
require "../connect.php";// connection to database 
$sql="select * from d_specl "; // Query to collect data 

if($stmt = $con->query($sql)){

  echo "No of records : ".$stmt->num_rows."<br>";

  while ($row = $stmt->fetch_assoc()) {
echo "<option value=$row[s_id]>$row[s_name]</option>";
 }
}else{
echo $con->error;
}

echo "</select>
<select name=docName id=docName>
</select>
<input type=submit value=Submit></form><br><br>

</body>
</html>
";
?>

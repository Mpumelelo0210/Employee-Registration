<?php


require_once("include/DB.php");
if(isset($_POST["Submit"])){
	if(!empty($_POST["EName"])&&! empty($_POST["SSN"])){
	$EName=$_POST["EName"];
	$SSN=$_POST["SSN"];
	$Dept=$_POST["Dept"];
	$Salary=$_POST["Salary"];
	$HomeAddress=$_POST["HomeAddress"];
	global $ConnectingDB;
	/*prevent sql injection*/
	$sql="INSERT INTO emp_record(ename, ssn, dept, salary, homeaddress) VALUES(:enaME, :depT, :ssN, :salarY, :homeaddresS)";
	$stmt=$ConnectingDB->prepare($sql);
	$stmt->bindValue(':enamE', $EName);
	$stmt->bindValue(':ssN', $SSN);
	$stmt->bindValue(':depT', $Dept);
	$stmt->bindValue(':salarY', $Salary);
	$stmt->bindValue(':homeaddresS', $HomeAddress);
	$stmt->execute();
	if($stmt){
		echo '<span class="success">Record Has Been Added Successfully</span>';
	}
}
	else{
				echo '<span class= "FieldInfoHeading"> Please Add atleast Name and Social Security number</span>';
	}
	// CODE...
} 

?>
<!DOCTYPE>
<html lang="en">
<head>
	<title>Insert Data Into Database</title>
	<link rel="stylesheet" href="include/style.css">
</head>
<body>
	<?php?>
	<div class"">

	<form class"" action="Insert_into_Database.php" method="post">
		<fieldset>
			<span class = "FieldInfo">Employee Name:
			
			</span>
			<br>
			<input type="text" name="EName" value"">
			<br>
			<span>	

				<span class="FieldInfo"> Social Security Number:	
				</span>
				<br>	
				<input type="text" name="SSN" value="">
				<br>	
				<span class="Fieldinfo">Department:</span>
				<br>	
				<input type="text" name="Dept" value="">
				<br>	
			<span class="Fieldinfo">Salary:</span>
			<br>	
			<input type="text" name="Salary" value"">
			<br>
			<span class="FieldInfo">Home Address:</span>
			<br>	
			<textarea name="HomeAddress" cols="80" rows="8">
				
			</textarea>	
			<br>	
			<input type="submit" name="Submit" value="Submit record">
		</fieldset>
	</form>	
	</div>
</body>
</html>
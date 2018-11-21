<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Search Courts</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600" rel="stylesheet">
	<link href="search.css" rel="stylesheet" type="text/css">
</head>
	<header>
	<?php include('nav.html');?>
	</header>
	
<body>
<main>	

<div id="background">
<h1>Search for a Court</h1>
	
	
	    <div id="form">
<form action="search.php" method="POST" enctype="multipart/form-data" class="myForm" name="myForm">
	
	<section id="search" class="normal">
<label >
	<input name="search" type="text" class="myInput" placeholder = "search..." autofocus>
</label>
</section>
	
<input type="submit" name='submit' value="Search" id="submitButton" class="submitButton">

</form>
	</div>
	
	<h3>Search Results...</h3>
	<hr>
    
<?php
if (isset($_POST['submit'])) {	
	
//load variables	
require_once('variables.php');
$search = $_POST['search'];
$searchTerms = explode(' ', $search);

foreach ($searchTerms as $temp) {
	if(!empty($temp)) {
		$searchArray[] = $temp;
	}
}//end foreach
	
	
$whereList = array();
	foreach ($searchArray as $temp) {
		$whereList[] = "name LIKE '%$temp%'";
	}//end foreach
	
$whereListLocation = array();
	foreach ($searchArray as $temp) {
		$whereListLocation[] = "location LIKE '%$temp%'";
	}//end foreach
	
	$whereClause = implode(' OR ', $whereList);
	$whereClauseLocation = implode(' OR ', $whereListLocation);
	$whereCluaseCombined = $whereClause . ' OR ' . $whereClauseLocation;
	
	
// Create connection
$conn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME);

$sql = "SELECT * FROM toolbox_pickleball";

	if(!empty($search)) {
		$sql .= " WHERE $whereCluaseCombined";
	} //end if

//talk to database
$result = mysqli_query($conn, $sql) or die ('query failed');

	function convertFormat($format){
		switch($format) {
			case 1:
				$conFormat=" AM";
				break;
			case 2:
				$conFormat=" PM";
		}//end case
		return $conFormat;
	}//end function
	
	//display what we found
	while ($row = mysqli_fetch_array($result)) {
		$fromFormat=convertFormat(substr($row[hours], 6, 1));
		$toFormat=convertFormat(substr($row[hours], 16, 1));
		$hoursReformated = substr($row[hours], 0, 5) . $fromFormat . substr(str_replace("-","to",$row[hours]),7, 9) . $toFormat;
		
		echo '<h3>';
		echo $row[name];
		echo '</h3>';
		echo '<p>';
		echo '<b>Location: </b>';
		echo strtolower($row[location]);
		echo '<br>';
		echo '<b>Hours: </b>';
		echo $hoursReformated;
		echo '</p><br><hr>';
	};
	
} //end isset
	
	$conn->close();
?>
</div>
</main>
</body>
</html>
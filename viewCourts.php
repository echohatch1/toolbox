<?php
require_once('variables.php');
	
// Create connection
$conn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME);

$sql = "SELECT * FROM toolbox_pickleball ORDER BY name ASC";

//talk to database
$result = mysqli_query($conn, $sql) or die ('query failed');


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View Courts</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600" rel="stylesheet">
	<link href="viewCourts.css" rel="stylesheet" type="text/css">
</head>
	<header>
	<?php include('nav.html');?>
	</header>
	
<body>
<main>	

<div id="background">
<h1>Pickleball Courts</h1>
    
<?php
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
	
	$conn->close();
?>
</div>
</main>
</body>
</html>
<?php
//load the variables for the form
require_once('variables.php');

$name = $_POST[name];
$location = $_POST[location];
$hoursFromHour = $_POST[hoursFromHour];
$hoursFromMinute = $_POST[hoursFromMinute];
$hoursFromFormat = $_POST[hoursFromFormat];
$hoursToHour = $_POST[hoursToHour];
$hoursToMinute = $_POST[hoursToMinute];
$hoursToFormat = $_POST[hoursToFormat];

$hours = "$hoursFromHour:$hoursFromMinute $hoursFromFormat - $hoursToHour:$hoursToMinute $hoursToFormat";

	
// Create connection
$conn = mysqli_connect(HOST,USER,PASSWORD,DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO toolbox_pickleball(name, location, hours) VALUES ('$name','$location', '$hours')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>New Court Added</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600" rel="stylesheet">
	<link href="sendData.css" rel="stylesheet" type="text/css">
</head>
<body>
<main>
<div id="background">
<h1>Succesfully added</h1>
    
<?php 
	echo $name;
	echo '<br>';
	echo $location;
	echo '<br><br>';
	echo '<a href="index.php" class="button">Go Back</a>';
?>
</div>
</main>
</body>
</html>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Add Court</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600" rel="stylesheet">
<link href="index.css" rel="stylesheet" type="text/css">
</head>
	
	<header>
	<?php include('nav.html');?>
	</header>

<body>
<main>
    <div id="form">
<form action="sendData.php" method="POST" enctype="multipart/form-data" class="myForm" name="myForm">

    <h1>Add Court</h1>
<section id="name" class="normal">
<label ><span>Court Name</span>
	<input name="name" type="text" class="myInput" required placeholder="name" autofocus>
</label>
</section>
    
<section id="location" class="normal">
<label ><span>Location (full address)</span>
	<input name="location" type="text" class="myInput" required placeholder = "location" autofocus>
</label>
</section>
	
	<hr>
    
<h4 class="marg-left">Hours</h4>
	<span class="marg-left">From</span>
<div class="time-div">	
	
<section id="hours-from-hour" class="normal">
<label >
	<select name="hoursFromHour" class="time-left" required>
		<option value="">Hour</option>
		<option value="01">1</option>
		<option value="02">2</option>
		<option value="03">3</option>
		<option value="04">4</option>
		<option value="05">5</option>
		<option value="06">6</option>
		<option value="07">7</option>
		<option value="08">8</option>
		<option value="09">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	</select>
    </label>
    </section>
	
<section id="hours-from-minute" class="normal">
<label >
	<select name="hoursFromMinute" class="time-right" required>
		<option value="">Minute</option>
		<option value="00">00</option>
		<option value="15">15</option>
		<option value="30">30</option>
		<option value="45">45</option>
	</select>
    </label>
    </section>
	
<section id="hours-from-format" class="normal">
	<label>
		<input type="radio" name="hoursFromFormat" value="1" required>AM<br>
		<input type="radio" name="hoursFromFormat" value="2">PM<br>
	</label>
	</section>
</div>
	
<span class="marg-left">To</span>
<div class="time-div">

<section id="hours-to-hour" class="normal">
<label >
	<select name="hoursToHour" class="time-left" required>
		<option value="">Hour</option>
		<option value="01">1</option>
		<option value="02">2</option>
		<option value="03">3</option>
		<option value="04">4</option>
		<option value="05">5</option>
		<option value="06">6</option>
		<option value="07">7</option>
		<option value="08">8</option>
		<option value="09">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	</select>
    </label>
    </section>
		
<section id="hours-to-minute" class="normal">
<label >
	<select name="hoursToMinute" class="time-right" required>
		<option value="">Minute</option>
		<option value="00">00</option>
		<option value="15">15</option>
		<option value="30">30</option>
		<option value="45">45</option>
	</select>
    </label>
    </section>
	
<section id="hours-to-format" class="normal">
	<label>
		<input type="radio" name="hoursToFormat" value="1" required>AM<br>
		<input type="radio" name="hoursToFormat" value="2">PM<br>
	</label>
	</section>
	
</div>
	
    

<input type="submit" value="Add Court" id="submitButton" class="submitButton">

</form>
    </div>
</main>
</body>
</html>
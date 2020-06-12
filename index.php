<?php
date_default_timezone_set("Asia/Beirut");
if(!isset($_COOKIE['countVisit'])){
	$countVisit = 1;
}
if(isset($_COOKIE['countVisit'])){
	$countVisit = $_COOKIE['countVisit'];
}
if(!isset($_COOKIE['lastVisitDate'])){
	$lastVisitDate = date("d/m/Y");
}
if(!isset($_COOKIE['lastVisitTime'])){
	$lastVisitTime = date("g:i:s a");
}
if(isset($_COOKIE['lastVisitDate'])){
	$lastVisitDate = $_COOKIE['lastVisitDate'];
}
if(isset($_COOKIE['lastVisitTime'])){
	$lastVisitTime = $_COOKIE['lastVisitTime'];
}
setcookie('countVisit', $countVisit+1, time()+604800); //1 week till it expires
setcookie('lastVisitDate', date("d/m/Y"), time()+604800 );
setcookie('lastVisitTime', date("g:i:s a"), time()+604800);
?>
<!DOCTYPE html>
<html>

<head>
 <title>Welcome</title>
 <link rel="stylesheet" href="styleSheet.css">
</head>

<body>
    <?php include('header.html'); ?>
	<h1>🩸 Welcome 🩸</h1>
	<h2>Welcome to our Blood Donation System!</h2>
	<p>Here you can register your informaton to donate blood and save a life</p>
	<p>You can also view blood donors and contact them if you need blood</p>
	<p>➡️ Click "Home" to return to the main page</p>
	<p>➡️ Click "Add Blood Donor" to register your info</p>
	<p>➡️ Click "Lists of Blood Donors" to view all donors</p>
	<p>There are 4 types of blood: 🅰️ 🅱️ 🆎 🅾️</p>
	
	<img src="images/blood3.png" class="lower_left">
	
</body>

<?php
	$timezone = date_default_timezone_get();
	echo "<p class='cookie'>";
	echo "Cookies: ";
	echo '</br>';
	echo "This is your visit number ".$countVisit;
	echo '</br>';
	echo "Last time, you were here was on 📅 ".$lastVisitDate;
	echo " at 🕒 ".$lastVisitTime;
	echo "</p>";
?>

</html>
<?php
include 'kijelentkezes.php';
//session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="with=device-width,initial scale=1.0">
    <title>ETK | Tudományos konferencia</title>
	<!-- icon beszurasa -->
	<link rel="icon" href="logo2.png" type="image/x-icon">
	<link rel="stylesheet" href="style-program.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,800;1,300;1,500&display=swap" rel="stylesheet">
	<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
</head>
<body>
	<!-------------MENU------------------>
<section class="header">
		<nav>
			<a href="weblap.html"><img src="logo5.png"></a> 
			<div class="nav-links" id="navLinks">
				<i class="fa fa-times" onclick="hideMenu()"></i>
				<ul>
						<!-- <li><a href="weblap-jelentkezes.php">BEJELENTKEZÉS</a></li> -->
						<?php
						if (isset($_SESSION['email'])):
						?>
						<li><a href="weblap.php"> FŐOLDAL</a><i></i></li>
						<li><a href="weblap-temak.php">TÉMAKÖRÖK</a></li>
						<li><a href="weblap-program.php">PROGRAM</a></li>
						<li><a href="weblap-regisztarios.php">REGISZTRÁCIÓ-néző</a></li>
						<li><a href="weblap-regisztracios1.php">REGISZTRÁCIÓ-előadó</a></li>
						<li><a href="weblap-kapcsolat.php">KAPCSOLAT</a></li>
						<li><a href="dokumentum.php">DOKUMENTUM</a></li>
							<li><span><?php echo $_SESSION['email']; ?></span></li>
							<li><a href="?kijelentkezes">Kijelentkezés</a></li>
							<!-- <li><a href="weblap-jelentkezes.php">BEJELENTKEZÉS</a></li> -->
						<?php else: ?>
							<!-- A többi menüpont itt ... -->
							<li><a href="weblap.php"> FŐOLDAL</a><i></i></li>
							<li><a href="weblap-temak.php">TÉMAKÖRÖK</a></li>
							<li><a href="weblap-program.php">PROGRAM</a></li>
							<li><a href="weblap-regisztarios.php">REGISZTRÁCIÓ-néző</a></li>
							<li><a href="weblap-regisztracios1.php">REGISZTRÁCIÓ-előadó</a></li>
							<li><a href="weblap-kapcsolat.php">KAPCSOLAT</a></li>
							<li><a href="weblap-jelentkezes.php">BEJELENTKEZÉS</a></li>
							
						<?php endif; ?>
				</ul>
			</div>
			<i class="fa fa-chevron-circle-down" onclick="showMenu()"></i>
		</nav>
<div class="text-box">
	<p id="demo"></p>
</section>

<!-------------------------------------------CALENDAR------------------------------------------------------------>

<section>
	<h2 class="heading-title"> Program </h2>
	<hr>
<div class="event-container">
	 <!--<h3 class="year">PROGRAM</h3>-->
		

	 <div class="event">
		<div class="event-left">
			<div class="event-date">
				<div class="date">10:00 - 10:30</div>
				<!--<div class="month">Aug</div>-->
			</div>
		</div>

		<div class="event-right">
			<h3 class="event-title"> Regisztráció és köszöntő</h3>
			<div class="event-description">
				Köszöntő beszéd a konferencia szervezőitől és meghívott vendégektől
			</div>
			<!--<div class="event-timing">
				<img id="img" src="nemkep1.png" alt="" /> 10:00 am
			</div>-->
		</div>
	 </div>

	 <div class="event">
		<div class="event-left">
			<div class="event-date">
				<div class="date">10:30 - 11:00</div>
				<!--<div class="month">Aug</div>-->
			</div>
		</div>

		<div class="event-right">
			<h3 class="event-title"> Plenáris előadás</h3>
			<div class="event-description">
				Az aktuális kutatási fejlemények a kiválasztott témakörökben
			</div>
			<!--<div class="event-timing">
				<img id="img" src="nemkep1.png" alt="" /> 10:00 am
			</div>-->
		</div>
	 </div>

	 <div class="event">
		<div class="event-left">
			<div class="event-date">
				<div class="date">11:00 - 12:00</div>
				<!--<div class="month">Aug</div>-->
			</div>
		</div>

		<div class="event-right">
			<h3 class="event-title"> Kávészünet és poszterprezentációk</h3>
			<div class="event-description">Kutatási projektek és aktuális kutatási fejlemények a témakörökben
			</div>
			<!--<div class="event-timing">
				<img id="img" src="nemkep1.png" alt="" /> 10:00 am
			</div>-->
		</div>
	 </div>

	 <div class="event">
		<div class="event-left">
			<div class="event-date">
				<div class="date">12:00 - 13:30</div>
				<!--<div class="month">Aug</div>-->
			</div>
		</div>

		<div class="event-right">
			<h3 class="event-title"> Szekcióülések</h3>
			<div class="event-description">
				A résztvevők prezentációkat tartanak és vitáznak a témákról
			</div>
			<!--<div class="event-timing">
				<img id="img" src="nemkep1.png" alt="" /> 10:00 am
			</div>-->
		</div>
	 </div>

	 <div class="event">
		<div class="event-left">
			<div class="event-date">
				<div class="date">13:30 - 15:00</div>
				<!--<div class="month">Aug</div>-->
			</div>
		</div>

		<div class="event-right">
			<h3 class="event-title"> Ebédszünet és poszterkiállítás</h3>
			<div class="event-description">
				Poszterkiállításon a résztvevők kötetlenül beszélgethetnek
			</div>
			<!--<div class="event-timing">
				<img id="img" src="nemkep1.png" alt="" /> 10:00 am
			</div>-->
		</div>
	 </div>

	 <div class="event">
		<div class="event-left">
			<div class="event-date">
				<div class="date">15:00 - 15:30</div>
				<!--<div class="month">Aug</div>-->
			</div>
		</div>

		<div class="event-right">
			<h3 class="event-title"> Szekcióülések folytatódnak</h3>
			<div class="event-description">
				A résztvevők prezentációkat tartanak és vitáznak a témákról
			</div>
			<!--<div class="event-timing">
				<img id="img" src="nemkep1.png" alt="" /> 10:00 am
			</div>-->
		</div>
	 </div>

	 <div class="event">
		<div class="event-left">
			<div class="event-date">
				<div class="date">16:30 - 17:00</div>
				<!--<div class="month">Aug</div>-->
			</div>
		</div>

		<div class="event-right">
			<h3 class="event-title"> Záró előadás</h3>
			<div class="event-description">
				A konferencia tapasztalatai és a további kutatási irányok
			</div>
			<!--<div class="event-timing">
				<img id="img" src="nemkep1.png" alt="" /> 10:00 am
			</div>-->
		</div>
	 </div>

	 <div class="event">
		<div class="event-left">
			<div class="event-date">
				<div class="date">17:00 - 17:30</div>
				<!--<div class="month">Aug</div>-->
			</div>
		</div>

		<div class="event-right">
			<h3 class="event-title"> Zárás és díjátadás</h3>
			<div class="event-description">
				Záró gondolatok és köszönetnyilvánítás
			</div>
			<!--<div class="event-timing">
				<img id="img" src="nemkep1.png" alt="" /> 10:00 am
			</div>-->
		</div>
	 </div>


	 
</div>	
</section>


<!-- ------------------------------MENUSOR KICSINYITETT NEZETBEN-------------------------------------->
<script>
	var navLinks = document.getElementById("navLinks")
	function showMenu(){
		navLinks.style.right = "0";
	}
	function hideMenu(){
		navLinks.style.right = "-300px";
	}

</script>

<!--
<script>
window.onscroll = () =>{
	menu.classList.remove
}
</script>
-->
</body>
</html>
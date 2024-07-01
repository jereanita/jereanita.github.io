<?php
include 'kijelentkezes.php';
//session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="sport, egészség, edzőterem, funkcionális, jóga, HIIT">
	<meta name="viewport" content="with=device-width,initial scale=1.0">
    <title>Vitality Gym | Edzőterem</title>
	<!-- icon beszurasa -->
	<link rel="icon" href="logo2.png" type="image/x-icon">
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,800;1,300;1,500&display=swap" rel="stylesheet">
	<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
	<style>
		/* body{
			background-image:url(flat-lay-notebook-assortment.jpg);
		} */
		.header{
			min-height: 100vh;
			width: 100%;
			/* background-image: url(hatteres.jpg); */
			 /* background-image: url(letöltés.jpg);  */
			 background-image: url(backgroundtop.jpg);
			/* background-image: url(frame.jpg); */
			/* opacity: 0.5; */
			background-size: cover;
			background-position:center;
			position:relative;
		}
		.nav-links ul li a{
	color:rgba(10, 114, 250, 0.824);
	text-decoration: none;
	font-size: 16px;
	font-family: serif;
	/* font-weight: bold; */
}
@media(max-width: 670px){ 
	.nav-links ul li{
		display: block;
		color: azure;
	}
	nav .fa{
		color: rgb(8, 136, 241);
	}
}
		/* .nav-links ul li a{
			color: black;
			text-decoration: none;
			font-size: 14px;
			font-family: serif;
		} */
		 .text-box{
			color:rgba(10, 114, 250, 0.824);
		 }
	</style>
</head>
<body>
	<!-------------MENU------------------>
<section class="header">
		<nav>
			<a href="weblap.php"><img src="logo5.png"></a> 
			<div class="nav-links" id="navLinks">
				<i class="fa fa-times" onclick="hideMenu()"></i>
				<ul>
				<?php
					if (isset($_SESSION['email'])):
				?>
					<li><a href="weblap.php"> FŐOLDAL</a><i></i></li>
					<li><a href="weblap-temak.php">EDZÉSFORMÁK</a></li>
					<li><a href="weblap-kapcsolat.php">KAPCSOLAT</a></li>
					<li><a href="kalendar.php">FOGLALÁS</a></li>
					<li><span><?php echo $_SESSION['email']; ?></span></li>
					<li><a href="?kijelentkezes">KIJELENTKEZÉS</a></li>
						<?php else: ?>
						<!-- A többi menüpont itt ... -->
					<li><a href="weblap.php"> FŐOLDAL</a><i></i></li>
					<li><a href="weblap-temak.php">EDZÉSFORMÁK</a></li>
					<li><a href="weblap-regisztracios1.php">REGISZTRÁCIÓ</a></li>
					<li><a href="weblap-kapcsolat.php">KAPCSOLAT</a></li>
					<li><a href="weblap-jelentkezes.php">BEJELENTKEZÉS</a></li>
				<?php endif; ?>
				</ul>
			</div>
			<i class="fa fa-chevron-circle-down" onclick="showMenu()"></i>
		</nav>
<div class="text-box">
	<h1>Vitality Gym</h1>
	<br>
	<h2>Életre kelünk minden edzéssel!</h2>
	<p id="demo"></p>
</section>

<!-------------ABOUT------------------>
<section class="services">
	<h1 class="heading-title"> A Vitality Gym</h1>
	<div class="box-container">
		<div class="box">
			<img src="kep11.png">
			<p>Ébredj fel a vitalitással: Töltsd meg életed energiával minden egyes edzéssel a Vitality Gym-ben!</p>
		</div>

		<div class="box">
			<img src="kep2.png">
			<p>Életre kelünk minden edzéssel: Tapasztald meg, hogyan növeli az egészségedet és az életerődet a Vitality Gym!</p>
		</div>

		<div class="box">
			<img src="kep3.png">
			<p>Töltsd fel magad energiával és életerővel: Fedezd fel, hogyan hozhatod ki a legtöbbet önmagadból minden nap a Vitality Gym-ben!</p>
		</div>

	</div>

</section>

<!-------------WHY------------------>
<section class="services">
<section class="why">
	<h1>Miért légy csapatunk tagja?</h1>
	<hr size="1"/> <!--width--->
	<p>Csatlakozz hozzánk, és legyél része egy támogató közösségnek! Nálunk mindig találsz motiváló edzőpartnereket és barátokat, akik segítenek céljaid elérésében. Csapatunk támogat, bátorít, és mindig melletted áll. A Vitality Gym modern, kiváló minőségű eszközökkel és felszerelésekkel rendelkezik, hogy a legjobb edzésélményt biztosítsuk számodra.</p>
<br>
<div class="btn">
<button onclick="window.location.href='weblap-regisztracios1.php'">Regisztráció</button>
</div>
<br>
<br>
</section>
</section>

<!------------------
<section class="footer">
	<h4></h4>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
</section>
------------->

<!-------------FOOTER------------------>
<section class="footer">
	<div class="footer-header">
	<!--<h4>ETK  </h4> -->
	<a href="weblap.php"><img src="logo2.png"></a>
	</div>
	<div class="contact">
		<p> <i class="fa fa-map-marker"></i> M. Kogălniceanu (Farkas) utca 1. szám, Kolozsvár, 400084, Románia</p>
		<p> <i class="fa fa-envelope"></i> etkkonfi@gmail.com</p>
		<p> <i class="fa fa-phone"></i> 0745672341</p>
	</div>
	<div class="social-media-icons">
		<a href="#"><i class="fa fa-facebook-f"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-instagram"></i></a>
	</div>
</section>




<!-- VISSZASZAMLALO
<script>
	// állítsuk be a cél dátumot (év, hónap, nap, óra, perc, másodperc)
	var countDownDate = new Date("Aug 5, 2024 15:37:25").getTime();
	
	// frissítsük a visszaszámlálást minden másodpercben
	var x = setInterval(function() {
	
	  // jelenlegi idő számítása
	  var now = new Date().getTime();
		
	   // a cél dátum és a jelenlegi idő közötti különbség kiszámítása
	  var distance = countDownDate - now;
		
	  // időegységek kiszámítása
	  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		
	  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
	  + minutes + "m " + seconds + "s ";
		 
	  if (distance < 0) {
		clearInterval(x);
		document.getElementById("demo").innerHTML = "EXPIRED";
	  }
	}, 1000);
	window.onload = countDownDate; // A countdown függvény meghívása a weboldal betöltésekor
</script> -->

<!-- MENUSOR KICSINYITETT NEZETBEN-->
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
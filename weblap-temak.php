<?php
include 'kijelentkezes.php';
//session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="with=device-width,initial scale=1.0">
    <title>Vitality Gym | Edzőterem</title>
	<!-- icon beszurasa -->
	<link rel="icon" href="logo2.png" type="image/x-icon">
	<link rel="stylesheet" href="style-temak.css">
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
			<a href="weblap.php"><img src="logo5.png"></a> 
			<div class="nav-links" id="navLinks">
				<i class="fa fa-times" onclick="hideMenu()"></i>
				<ul>
					<!-- <li><a href="weblap-jelentkezes.php">BEJELENTKEZÉS</a></li> -->
					<?php
						if (isset($_SESSION['email'])):
							?>
							<li><a href="weblap.php"> FŐOLDAL</a><i></i></li>
						<li><a href="weblap-temak.php">EDZÉSFORMÁK</a></li>
						<!-- <li><a href="weblap-program.php">PROGRAM</a></li> -->
						<!-- <li><a href="weblap-regisztarios.php">REGISZTRÁCIÓ</a></li> -->
						<!-- <li><a href="weblap-regisztracios1.php">REGISZTRÁCIÓ</a></li> -->
						<!-- <li><a href="kalendar.php">FOGLALÁS</a></li> -->
						<li><a href="weblap-kapcsolat.php">KAPCSOLAT</a></li>
						<!-- <li><a href="dokumentum.php">DOKUMENTUM</a></li> -->
						<li><a href="kalendar.php">FOGLALÁS</a></li>
							<li><span><?php echo $_SESSION['email']; ?></span></li>
							<li><a href="?kijelentkezes">KIJELENTKEZÉS</a></li>
							<!-- <li><a href="weblap-jelentkezes.php">BEJELENTKEZÉS</a></li> -->
						<?php else: ?>
							<!-- A többi menüpont itt ... -->
							<li><a href="weblap.php"> FŐOLDAL</a><i></i></li>
							<li><a href="weblap-temak.php">EDZÉSFORMÁK</a></li>
							<!-- <li><a href="weblap-program.php">PROGRAM</a></li> -->
							<!-- <li><a href="weblap-regisztarios.php">REGISZTRÁCIÓ</a></li> -->
							<li><a href="weblap-regisztracios1.php">REGISZTRÁCIÓ</a></li>
							<!-- <li><a href="kalendar.php">FOGLALÁS</a></li> -->
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



<section class="why">
	<h1>Főbb edzésformák</h1>
	<hr size="1"/> <!--width--->
	<p>Összegyűjtöttük edzőtermünk legnépszerűbb edzéstípusait, hogy mindenki könnyedén megtalálhassa a számára legmegfelelőbb mozgásformát, amely segíti a személyes céljai elérésében és a teljes testi-lelki jólét megteremtésében.</p><br>
<br>
<br>
</section>

<!------------------------------------BOOTSTRAP-------------------------------------->
<section>
<div class="container">
	<div class="main-timeline">
	
							<!-- start experience section-->
							<div class="timeline">
								<div class="icon"></div>
								<div class="date-content">
									<div class="date-outer">
										<span class="date">
												<span class="month"></span>
										<span class="year"><img id="image"src="dumbbells.png"></span>
										</span>
									</div>
								</div>
								<div class="timeline-content">
									<h5 class="title">Kettlebell</h5>
									<p class="description">
									Erősítsd izmaidat és javítsd állóképességedet a kettlebell edzésekkel, amelyek hatékonyan kombinálják az erőt és a kardiót. Ez az edzésforma kiválóan alkalmas a teljes test megdolgoztatására, mivel a dinamikus mozgások növelik az izomerőt, a robbanékonyságot és az állóképességet. A kettlebell edzések segítenek a zsírégetésben, az izomtónus javításában és az anyagcsere felgyorsításában.
								</p>
								</div>
							</div>
							<!-- end experience section-->
	
							<!-- start experience section-->
							<div class="timeline">
								<div class="icon"></div>
								<div class="date-content">
									<div class="date-outer">
										<span class="date">
												<span class="month"></span>
										<span class="year"><img id="image"src="pulse.png"></span>
										</span>
									</div>
								</div>
								<div class="timeline-content-l">
									<h5 class="title">HIIT (High-Intensity Interval Training)</h5>
									<p class="description">

									Égesd a zsírt és növeld az állóképességedet a magas intenzitású intervallum edzésekkel, amelyek gyors és hatékony eredményeket hoznak. A HIIT edzések rövid, intenzív szakaszokból állnak, amelyeket pihenőidők követnek. Ez az edzésforma ideális azoknak, akik időhiánnyal küzdenek, de szeretnék maximalizálni az edzéseik hatékonyságát. A HIIT edzések fokozzák az anyagcserét, növelik a kalóriaégetést és javítják a kardiovaszkuláris egészséget.								</p>
								</div>
							</div>
							<!-- end experience section-->
	
							<!-- start experience section-->
							<div class="timeline">
								<div class="icon"></div>
								<div class="date-content">
									<div class="date-outer">
										<span class="date">
												<span class="month"></span>
										<span class="year"><img id="image"src="yoga.png"></span>
										</span>
									</div>
								</div>
								<div class="timeline-content">
									<h5 class="title">Jóga</h5>
									<p class="description">
									Találd meg a belső egyensúlyodat és javítsd rugalmasságodat jógaóráinkon, amelyek segítenek a stressz csökkentésében és a mentális jólét növelésében. A jóga gyakorlatok célja a test és az elme harmonizálása, miközben javítják az izomzat rugalmasságát, erősségét és egyensúlyát. A légzéstechnikák és a meditáció segítenek a mentális tisztaság és a belső nyugalom elérésében, ami hozzájárul a jobb életminőséghez és a mindennapi stressz hatékonyabb kezeléséhez.
								</p>
								</div>
							</div>
							<!-- end experience section-->
	
							<!-- start experience section-->
							<div class="timeline">
								<div class="icon"></div>
								<div class="date-content">
									<div class="date-outer">
										<span class="date">
												<span class="month"></span>
										<span class="year"><img id="image"src="training.png"></span>
										</span>
									</div>
								</div>
								<div class="timeline-content-l">
									<h5 class="title">Funkcionális edzés</h5>
									<p class="description">

									Fejleszd teljes testkoordinációdat és erődet funkcionális edzéseinkkel, melyek mindennapi mozgásformákra épülnek. Ezek az edzések a mindennapi életben használt mozdulatokat imitálják, mint például emelés, hajlítás, tolás és húzás, hogy erősebbé és mozgékonyabbá válj. A funkcionális edzés célja, hogy javítsa a teljes test stabilitását, egyensúlyát és erőnlétét, ami segít a sérülések megelőzésében és a mindennapi tevékenységek könnyebb elvégzésében.								</p>
								</div>
							</div>
							<!-- end experience section-->
	
						</div>
	</div>
	<br>
</section>

<section class="why">
	<hr size="1"/> <!--width--->
	<p> Ez a részletesebb leírás segít jobban megérteni, hogy milyen előnyöket nyújtanak a különböző edzéstípusok a Vitality Gym-ben, és hogyan járulnak hozzá a tagok egészségének és jólétének javításához.</p>
<br>
</section>

<!-------------FOOTER------------------>
<!--
<section class="footer">
	<div class="footer-header">
	<!--<h4>ETK  </h4> --><!--
	<a href="weblap.html"><img src="logo2.png"></a>
	</div>
	<div class="contact">
		<p> <i class="fa fa-map-marker"></i> M. Kogălniceanu (Farkas) utca 1. szám, Kolozsvár, 400084, Románia</p>
		<p> <i class="fa fa-envelope"></i> info@etk.ro</p>
		<p> <i class="fa fa-phone"></i> 0745672341</p>
	</div>
	<div class="social-media-icons">
		<a href="#"><i class="fa fa-facebook-f"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-instagram"></i></a>
	</div>
</section>
-->


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
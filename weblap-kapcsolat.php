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
	<link rel="stylesheet" href="style-kapcsolat.css">
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

<!-------------------------------------------KAPCSOLAT------------------------------------------------>


<!------------------------------------------------------------------------------------>

<section class="location">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2732.8861310721154!2d23.587633388854982!3d46.76714090000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47490c262f3726c3%3A0xf81e049e69dfa995!2sBabe%C5%9F-Bolyai%20Tudom%C3%A1nyegyetem!5e0!3m2!1shu!2sro!4v1685356349309!5m2!1shu!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<section class="contact-us">

	<div class="row">
		<div class="contact-col">
			<div>
				<i class="fa fa-home"></i>
				<span>
					<h5>M. Kogălniceanu (Farkas) utca 1. szám </h5>
					<p>Kolozsvár, 400084, Románia</p>
				</span>
			</div>

 			<div>
				<i class="fa fa-phone"></i>
				<span>
					<h5>0745672341</h5>
					<p>Hétfőtől péntekig 8:00 és 16:00 óra között </p>
				</span>
			</div>

			<div>
				<i class="fa fa-envelope-o"></i>
				<span>
					<h5>etkkonfi@gmail.com</h5>
					<p></p>
				</span>
			</div>
			
		</div>
	<div class="contact-col">
		<form action="">
			<input type="text" placeholder="Írja be a nevét" required>
			<input type="email" placeholder="Írja be az email címét" required>
			<textarea rows="5" placeholder="Üzenet" required></textarea>
			<button class="submit-button"><b>Küldés</b></button>
		</form>
		</div>
</div>

</section>

<section>
	
	<section class="faq-section">
		<hr>
		<h2>Gyakori kérdések</h2>
		<div class="faq-item">
		  <h3 class="question">Hogyan tudok regisztrálni az oldalra?</h3>
		  <p class="answer">A regisztrációhoz kattints az "Regisztráció" gombra az oldal tetején, majd kövesd az utasításokat a regisztrációs űrlapon.</p>
		</div>
	  
		<div class="faq-item">
		  <h3 class="question">Mit tegyek, ha elfelejtettem a jelszavamat?</h3>
		  <p class="answer">Ha elfelejtetted a jelszavadat, kattints az "Elfelejtett jelszó" linkre a bejelentkezési oldalon, majd kövesd az utasításokat a jelszó visszaállításához.</p>
		</div>
	  
		<div class="faq-item">
		  <h3 class="question">Hogyan tudom módosítani a profiladataimat?</h3>
		  <p class="answer">A profiladatok módosításához jelentkezz be a fiókodba, majd keresd meg a "Profil beállítások" vagy a "Fiókbeállítások" menüt, ahol szerkesztheted a szükséges információkat.</p>
		</div>


		<hr class="hr2">
	  </section>
	  
	  

</section>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const questions = document.querySelectorAll('.question');

  questions.forEach(question => {
    question.addEventListener('click', () => {
      question.classList.toggle('active');
      const answer = question.nextElementSibling;
      answer.style.display = answer.style.display === 'none' ? 'block' : 'none';
    });
  });
});

</script>

<!------------------------------TAMOGATOK---------------------------------------->
<!-- <section>
	<h4>Támogatók<h4>
	<div class="image-container">
		<img id="img" src="bbte.jpg" alt="Első kép">
		<img id="img" src="wolter.png" alt="wolters kép">
		<img id="img" src="mol.png" alt="mol kép">
		<img id="img" src="rmd.png" alt="mol kép">
		<img id="img" src="letöltés.png" alt="mol kép">
	  </div>
</section> -->




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
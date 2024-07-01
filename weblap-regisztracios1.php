<?php
session_start();
//include 'kijelentkezes.php';

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="with=device-width,initial scale=1.0">
    <title>Vitality Gym | Edzőterem</title>
	<!-- icon beszurasa -->
	<link rel="icon" href="logo2.png" type="image/x-icon">
	<link rel="stylesheet" href="style-regisztracios.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,800;1,300;1,500&display=swap" rel="stylesheet">
	<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <style>
        .regi{
    /* background-color: rgba(12, 76, 150, 0.865); */
	background-color: rgba(223, 235, 248, 0.865);
    min-height: 100vh;
	width: 100%;
    opacity: 0.9;
}
.container{
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
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
						<!-- <li><a href="weblap-program.php">PROGRAM</a></li> -->
						<!-- <li><a href="weblap-regisztarios.php">REGISZTRÁCIÓ</a></li> -->
						<li><a href="weblap-regisztracios1.php">REGISZTRÁCIÓ</a></li>
						<!-- <li><a href="kalendar.php">FOGLALÁS</a></li> -->
						<li><a href="weblap-kapcsolat.php">KAPCSOLAT</a></li>
						<!-- <li><a href="dokumentum.php">DOKUMENTUM</a></li> -->
						<li><a href="kalendar.php">FOGLALÁS</a></li>
							<li><span><?php echo $_SESSION['email']; ?></span></li>
							<li><a href="?kijelentkezes">Kijelentkezés</a></li>
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

<section class="regi">
	<br>
	<br>
    
	<div class="container">
    <form autocomplete="off" action="weblap-regisztracios1.php" method="post" > 
            <h4>Regisztráció</h4>
            <div class="input-section">
                <label>Vezetéknév<span class="reguired-color">* </span></label>
                <input type="text" placeholder="Írja be a vezetéknevét" id="first-name-input" name="first-name-input" required/>
                <span id="first-name-error" class="hide required-color error-message">Érvénytelen bemenet</span>
                <span id="empty-first-name" class="hide required-color error-message">Nem lehet üres a mező</span>
            </div>

            <div class="input-section">
                <label>Keresztnév<span class="reguired-color">*</label>
                <input type="text" placeholder="Írja be a keresztnevét" id="last-name-input" name="last-name-input" required/>
                <span id="last-name-error" class="hide required-color error-message">Érvénytelen bemenet</span>
                <span id="empty-last-name" class="hide required-color error-message">Nem lehet üres a mező</span>
            </div>

            <div class="input-section">
                <label>Email<span class="reguired-color">*</label>
                <input type="email" placeholder="Írja be az emailcímét " id="email" name="email" required/>
                <span id="email-error" class="hide required-color error-message">Érvénytelen emailcím</span>
                <span id="empty-email" class="hide required-color error-message">Nem lehet üres a mező</span>
            </div>

            <div class="input-section">
                <label>Telefonszám<span class="reguired-color">*</label>
                <input type="text" placeholder="Írja be a telefonszámát " id="phone" name="phone" required/>
                <span id="phone-error" class="hide required-color error-message">Érvénytelen telefonszám, 10 karakterből kell állnia</span>
                <span id="empty-phone" class="hide required-color error-message">Nem lehet üres a mező</span>
            </div>

           
            <div class="input-section">
                <label>Jelszó<span class="reguired-color">*</label>
                <input type="password" placeholder="Írja be a jelszavát" id="password" name="password" required/>
                <span id="password-error" class="hide required-color error-message">Érvénytelen jelszó, legalább 8 karakterből kell állnia, és nagybetűt kell tartalmazni</span>
                <span id="empty-password" class="hide required-color error-message">Nem lehet üres a mező</span>
            </div>

            <div class="input-section">
                <label>Jelszó megerősítés<span class="reguired-color">*</label>
                <input type="password" placeholder="Ismételje meg a jelszavát" id="verify-password" required/>
                <span id="verify-password-error" class="hide required-color error-message">Érvénytelen jelszó, meg kell egyeznie a korábbival</span>
                <span id="verify-empty-password" class="hide required-color error-message">Nem lehet üres a mező</span>
            </div>



            <button id="submit-button">Regisztráció</button>
        </form>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "edzések";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $vezeteknev = $_POST["first-name-input"];
                $keresztnev = $_POST["last-name-input"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                
                $jelszo = password_hash($_POST["password"], PASSWORD_DEFAULT); // Jelszó hashelése
              

                //  előkészített állítást a SQL injection elkerülése érdekében
                $sql = "INSERT INTO felhasználó(Email, Vezeteknev, Keresztnev,   Jelszo, Telefonszam)
                        VALUES (:email, :vezeteknev, :keresztnev,  :jelszo, :phone)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':vezeteknev', $vezeteknev);
                $stmt->bindParam(':keresztnev', $keresztnev);
                $stmt->bindParam(':email', $email);
               
                $stmt->bindParam(':jelszo', $jelszo);
                $stmt->bindParam(':phone', $phone);
         

                if ($stmt->execute()) {
                    echo "<h3>Az adatokat sikeresen eltárolták az adatbázisban.</h3>";
                    echo '<script>alert("Az adatokat sikeresen eltárolták az adatbázisban.");</script>';
                    // echo "<p>Részletek:</p>";
                    // echo "<ul>";
                    // echo "<li>Vezetéknév: $vezeteknev</li>";
                    // echo "<li>Keresztnév: $keresztnev</li>";
                    // echo "<li>Email: $email</li>";
                  
                } else {
                    echo "Hoppá! Valami hiba történt. Kérjük, próbálja újra később.";
                    error_log("Hiba a lekérdezés végrehajtásakor: " . implode(" ", $stmt->errorInfo()));
                }
            }
        } catch (PDOException $e) {
            echo "Hiba a kapcsolódás során: " . $e->getMessage();
        }

        $conn = null;
        ?>
	</div>

	<script src="script1.js"></script>
	<br>
<br>
<br>
<br>
<br>
<br>
</section>



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
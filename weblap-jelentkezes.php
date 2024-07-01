<?php
//session_start();
include 'kijelentkezes.php';

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "konferencia";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
//         $jelszo = $_POST["password"];

//         if ($email === false) {
//             echo "Érvénytelen e-mail cím.";
//             // Esetleg visszatérhetsz vagy más kezelést alkalmazhatsz.
//         } else {
//             $stmt = $conn->prepare("SELECT * FROM eloado WHERE Email = :email");
//             $stmt->bindParam(':email', $email);
//             $stmt->execute();

//             $result = $stmt->fetch(PDO::FETCH_ASSOC);

//             if ($result) {
//                 $hashed_jelszo = $result["Jelszo"];
            
//                 // Naplózza a titkosított jelszót és a felhasználó által megadott jelszót
//                 //echo 'Hashed jelszo: ' . $hashed_jelszo;
//                 //echo 'Felhasználó által megadott jelszo: ' . $jelszo;

            
//                 if (password_verify($jelszo, $hashed_jelszo)) {
//                     $_SESSION["email"] = $email;
//                     // Sikeres bejelentkezés
//                     echo '<script>alert("Sikeres bejelentkezés!");</script>';
					
// 					$_SESSION["loggedin"] = true;

//                     //header("Location: http://localhost/konferencia/kezdolap.html");
//                     //exit();
//                 } else {
//                     // Sikertelen bejelentkezés: Helytelen jelszó
//                     echo '<script>alert("Sikertelen bejelentkezés: Helytelen jelszó.");</script>';
//                 }
//             } else {
//                 // Sikertelen bejelentkezés: A megadott e-mail cím nem regisztrált
//                 echo '<script>alert("Sikertelen bejelentkezés: A megadott e-mail cím nem regisztrált.");</script>';
//             }
//         }
//     }
// } catch (PDOException $e) {
//     echo "Hiba a kapcsolódás során: " . $e->getMessage();
// }

// // Kijelentkezés feldolgozása
// if (isset($_GET['kijelentkezes'])) {
//     // Munkamenet véget ér, munkamenetváltozók törlése
//     session_destroy();
//     // Átirányítás a bejelentkezési oldalra
//     header("Location: weblap.html");
//     exit();
// }
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="with=device-width,initial scale=1.0">
    <title>Vitality Gym | Edzőterem</title>
	<!-- icon beszurasa -->
	<link rel="icon" href="logo2.png" type="image/x-icon">
	<link rel="stylesheet" href="style-program.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,800;1,300;1,500&display=swap" rel="stylesheet">
	<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
	<style>
		h2{
			font-size: 35px;
	font-weight: 600;
	text-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5); /* állítsd be a megfelelő árnyékeffektust */
	margin-bottom: 50px;
	text-align: center;
	margin-top: 50px;
		}
		body {font-family: Arial, Helvetica, sans-serif;}
		form {border: 3px solid #f1f1f1;padding: 20px; /* Hozzáadott padding a form körül */
    max-width: 400px; /* Maximális szélesség a formnak */
    margin: 0 auto;}
		
		input[type=email], input[type=password] {
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		}
		
		button {
		  background-color: #046daa;
		  color: white;
		  padding: 14px 20px;
		  margin: 8px 0;
		  border: none;
		  cursor: pointer;
		  width: 100%;
		}
		
		button:hover {
		  opacity: 0.8;
		}
		
		.cancelbtn {
		  width: auto;
		  padding: 10px 18px;
		  background-color: #1f5ad0;
		}
		
		.imgcontainer {
		  text-align: center;
		  margin: 24px 0 12px 0;
		}
		
	
		
		.container {
		  padding: 16px;
		}
		
		span.psw {
		  float: right;
		  padding-top: 16px;
		}
		
		/* span.uname {
		  float: right;
		  padding-top: 16px;
		} */
		/* Change styles for span and cancel button on extra small screens */
		@media screen and (max-width: 300px) {
		  span.psw {
			 display: block;
			 float: none;
		  }
		  .cancelbtn {
			 width: 100%;
		  }
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
					<li><a href="weblap.php"> FŐOLDAL</a><i></i></li>
					<li><a href="weblap-temak.php">EDZÉSFORMÁK</a></li>
					<!-- <li><a href="weblap-program.php">PROGRAM</a></li> -->
					<!-- <li><a href="weblap-regisztarios.php">REGISZTRÁCIÓ-néző</a></li> -->
					
					<li><a href="weblap-kapcsolat.php">KAPCSOLAT</a></li>
						<!-- <li><a href="weblap-jelentkezes.php">BEJELENTKEZÉS</a></li> -->
						<?php
						if (isset($_SESSION['email'])):
						?>
						<li><a href="kalendar.php">FOGLALÁS</a></li>
							<li><span><?php echo $_SESSION['email']; ?></span></li>
							
							<li><a href="?kijelentkezes">KIJELENTKEZÉS</a></li>
							<!-- <li><a href="weblap-jelentkezes.php">BEJELENTKEZÉS</a></li> -->
						<?php else: ?>
							<!-- A többi menüpont itt ... -->
							<li><a href="weblap-regisztracios1.php">REGISZTRÁCIÓ</a></li>
						<?php endif; ?>
				</ul>
			</div>
			<i class="fa fa-chevron-circle-down" onclick="showMenu()"></i>
		</nav>
<div class="text-box">
	<p id="demo"></p>
</section>

<h2>Bejelentkezés</h2>

<form action="" method="post">
  <div class="imgcontainer">
  </div>

  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="email" placeholder="Írja be az emailt" name="email" required>

		
	<!-- <label for="uname"><b>Email</b></label>
	<input type="email" placeholder="Írja be az emailcímét " name="email" required/> -->
	


    <label for="psw"><b>Jelszó</b></label>
    <input type="password" placeholder="Írja be a jelszavát" name="password" required>
        
    <button type="submit">Bejelentkezés</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Maradjon bejelentkezve
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Mégsem</button>
    <span class="psw">Elfelejtetted a <a href="elfelejtettjelszo.php">jelszavadat?</a></span>
  </div>
</form>




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
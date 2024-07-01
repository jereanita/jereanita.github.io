<?php
// Ellenőrizzük, hogy be van-e jelentkezve az adminisztrátor
//session_start();
include 'kijelentkezes.php';
// if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
//     header("Location: login.php"); // Átirányítjuk a bejelentkezési oldalra, ha nincs bejelentkezve
//     exit;
// }

// Adatbázis kapcsolódás
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edzések";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Kapcsolódási hiba: " . $e->getMessage();
    die(); 
}

// Adatok lekérése az adatbázisból
try {
    $stmt = $conn->prepare("SELECT foglalások.idopont, foglalások.EdzesID, edzéstípus.EdzesNev, COUNT(*) AS jelentkezok_szama FROM foglalások  INNER JOIN edzés ON foglalások.EdzesID = edzés.EdzesID INNER JOIN edzéstípus ON edzéstípus.EdzesTipusID = edzés.EdzesTipusID GROUP BY foglalások.idopont, foglalások.EdzesID");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Adatbázis hiba: " . $e->getMessage();
    die(); 
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta name="viewport" content="with=device-width,initial scale=1.0">
    <title>Vitality Gym | ADMIN FELÜLET</title>
    <!-- icon beszurasa -->
    <link rel="icon" href="logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="style-kapcsolat.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,800;1,300;1,500&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.11/locale/hu.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
<section class="header">
    <nav>
      <a href="weblap.php"><img src="logo5.png"></a> 
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
        <?php
						if (isset($_SESSION['email'])):
						?>
							<li><span><?php echo $_SESSION['email']; ?></span></li>
							<li><a href="?kijelentkezes">KIJELENTKEZÉS</a></li>
							<!-- <li><a href="weblap-jelentkezes.php">BEJELENTKEZÉS</a></li> -->
						<?php else: ?>
							<!-- A többi menüpont itt ... -->
							
						<?php endif; ?>
          
        </ul>
      </div>
      <i class="fa fa-chevron-circle-down" onclick="showMenu()"></i>
    </nav>
    <div class="text-box">
      <p id="demo"></p>
  </section>
    <h1>Jelentkezők száma napok és edzések szerint</h1>
    <table>
        <thead>
            <tr>
                <th>Dátum</th>
                <th>Edzés ID</th>
                <th>Edzés neve</th>
                <th>Jelentkezők száma</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['idopont']; ?></td>
                    <td><?php echo $row['EdzesID']; ?></td>
                    <td><?php echo $row['EdzesNev']; ?></td>
                    <td><?php echo $row['jelentkezok_szama']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

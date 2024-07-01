<?php
include 'kijelentkezes.php';
// session_start();

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_SESSION['email']; 
    $edzesId = $_POST['edzesId'];
    $idopont = $_POST['idopont'];

    // Ellenőrzés, hogy az adott felhasználó már foglalt-e ugyanarra az időpontra
    $stmt = $conn->prepare("SELECT Count(*) as db FROM foglalások WHERE Email=:email AND EdzesID=:edzesId AND idopont=:idopont");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':edzesId', $edzesId);
    $stmt->bindParam(':idopont', $idopont);
    $stmt->execute();
    $db = $stmt->fetch(PDO::FETCH_ASSOC)['db'];

    if ($db > 0) {
        echo json_encode(['megtelt' => false, 'status' => 'Már lefoglaltad ezt az időpontot']);
        exit();
    }

    $stmt = $conn->prepare("SELECT Count(*) as db FROM foglalások WHERE EdzesID=:edzesId and idopont=:idopont");
    $stmt->bindParam(':edzesId', $edzesId);
    $stmt->bindParam(':idopont', $idopont);
    $stmt->execute();
    $db = $stmt->fetch(PDO::FETCH_ASSOC)['db'];

    $megtelt = false;
    if ($db > 2) {
        $megtelt = true;
    }

    if (!$megtelt) {
        $stmt = $conn->prepare("INSERT INTO foglalások (Email, EdzesID, idopont) VALUES (:email, :edzesId, :idopont)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':edzesId', $edzesId);
        $stmt->bindParam(':idopont', $idopont);

        if ($db == 2) {
            $megtelt = true;
        }
        if ($stmt->execute()) {
            echo json_encode(['megtelt' => $megtelt, 'status' => 'Foglalás megerősítve']);
        } else {
            echo json_encode(['megtelt' => false, 'status' => 'Foglalási hiba']);
        }
    } else {
        echo json_encode(['megtelt' => false, 'status' => 'A hely megtelt']);
    }
}
?>

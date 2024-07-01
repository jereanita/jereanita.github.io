<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edzések";

// Kapcsolódás az adatbázishoz
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];

    // Ellenőrizze az e-mail cím jelenlétét az adatbázisban
    $query = $conn->prepare("SELECT * FROM felhasználó WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Ellenőrizze a jelszó hosszát és karaktereit PHP oldalon
        $row = $result->fetch_assoc();
        $storedPassword = $row['Jelszo'];
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+}{"\':;?\/>.<,]).{8,}$/', $password)) {
            echo "A jelszónak legalább 8 karakter hosszúnak kell lennie, és tartalmaznia kell legalább egy kisbetűt, egy nagybetűt, egy számot és egy speciális karaktert.";
        } else {
            if ($password !== $confirmPassword) {
                echo "A két jelszó nem egyezik meg!";
            } else if (password_verify($password, $storedPassword)) {
                echo '<script>alert("A megadott jelszó megegyezik az előző jelszóval, nem lehet megváltoztatni. Kérjük, adjon meg másik jelszót!");</script>';
            } else {
                // Hasheljük a jelszót
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Frissítjük a jelszót az adatbázisban a megadott email címhez
                $updateQuery = $conn->prepare("UPDATE felhasználó SET felhasználó.Jelszo=? WHERE felhasználó.Email=?");
                $updateQuery->bind_param("ss", $hashedPassword, $email);
                if ($updateQuery->execute()) {
                    echo '<script>alert("Sikeresen megváltoztatta jelszavát!");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=weblap-jelentkezes.php">';
                    exit();
                } else {
                    echo "Hiba történt a jelszó frissítése közben: " . $conn->error;
                }
            }
        }
    } else {
        echo '<script>alert("A megadott e-mail cím nem található az adatbázisban!");</script>';
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Csere jelszó</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
</head>


<body>
    <div class="singup-box" margin-top="200px">
        <h1>Jelszó megváltoztatása</h1>
        <form id="form" action="csere.php" method="post">
           
            <label for="email">E-mail cím</label>
            <input type="text" id="email" name="email" placeholder="Írja be az e-mail címét!" onkeydown="validation()" required>
            <span id="text"></span>
        
            <label for="pass">Jelszó</label>
            <input class="password" type="password" name="password" placeholder="Jelszó" required>
        
            <label for="pass">Jelszó megerősítése </label>
            <input class= "confirmpassword" type="password" name="confirmpassword" placeholder="Jelszó megerősítése" required>
            <br><br>
            <button type="submit" class="submit">Küldés</button>
    

        </form>
    </div>


    <style>
        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
            position: relative;
            background-color: #f1f1f1; /* Háttérszín beállítása */
        }

        .singup-box {
            margin-top: 200px;
            text-align: center;
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            margin-bottom: 5px;
            font-size: 16px;
            color: #333;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            background-color: rgba(77, 67, 206, 0.8);
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            border: none;
            font-size: 16px;
        }
    </style>


<script>
    document.getElementById("form").addEventListener("submit", function(event) {
        var email = document.getElementById("email").value;
        var password = document.querySelector(".password").value;
        var confirmPassword = document.querySelector(".confirmpassword").value;

        if (!email || !password || !confirmPassword) {
            event.preventDefault();
            alert("Kérlek, töltsd ki az összes mezőt!");
        } else if (password !== confirmPassword) {
            event.preventDefault();
            alert("A két jelszó nem egyezik!");
        } else if (!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+}{"\':;?\/>.<,]).{8,}$/)) {
            event.preventDefault();
            alert("A jelszónak legalább 8 karakter hosszúnak kell lennie, és tartalmaznia kell legalább egy kisbetűt, egy nagybetűt, egy számot és egy speciális karaktert.");
        }
    });
</script>
    
</body>
</html>
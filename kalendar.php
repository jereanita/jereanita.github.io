<?php
include 'kijelentkezes.php';
//session_start();
?>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "edzések";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
        $events = $conn->query("SELECT * FROM edzés JOIN Edzéstípus ON Edzés.EdzesTipusID = Edzéstípus.EdzesTipusID")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang='hu'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitality Gym | Edzőterem</title>
    <link rel="icon" href="logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="style-kapcsolat.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,800;1,300;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.11/locale/hu.min.js"></script>
    <style>
      
      h1 {
        font-size: 25px; 
        font-weight: 600;
        text-align: center; 
        margin-top: 0px;
        margin-bottom: 20px; 
      }
      .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        padding-top: 50px;
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        /* background-color: rgba(12, 76, 150, 0.465);  */
        background-color: rgba(1, 3, 3, 0.07);
      }
      .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        border-radius: 15px;
      }
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }
      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }
      #confirmBooking {
        display: line;
        margin: 13px auto; 
        padding: 10px 20px; 
        background-color: rgba(49, 139, 176, 0.722); 
        color: white; 
        border: none; 
        border-radius: 5px; 
        cursor: pointer;
        font-size: 14px; 
        text-align: center; 
      }
      #confirmBooking:hover {
        background-color: #e57373;
      }
      #deleteBooking {
        display: line;
        margin: 5px auto; 
        padding: 10px 20px; 
        background-color: rgba(235, 76, 150, 0.467); 
        color: white; 
        border: none; 
        border-radius: 5px; 
        cursor: pointer;
        font-size: 14px; 
        text-align: center; 
      }
      #deleteBooking:hover {
        background-color: #e57373; 
      }
      .fc-event {
        font-size: 13px; 
        padding: 10px; 
        margin-bottom: 10px;
        cursor: pointer;
      }
      .fc{
        width: 80%;
        margin: auto;
      }
      .circle {
        display: inline-block;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        margin-right: 10px;
        vertical-align: middle;
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
            <?php if (isset($_SESSION['email'])): ?>
              <li><a href="weblap.php">FŐOLDAL</a></li>
              <li><a href="weblap-temak.php">EDZÉSFORMÁK</a></li>
              <li><a href="weblap-kapcsolat.php">KAPCSOLAT</a></li>
              <li><a href="kalendar.php">FOGLALÁS</a></li>
              <li><span><?php echo $_SESSION['email']; ?></span></li>
              <li><a href="?kijelentkezes">KIJELENTKEZÉS</a></li>
            <?php else: ?>
              <li><a href="weblap.php">FŐOLDAL</a></li>
              <li><a href="weblap-temak.php">EDZÉSFORMÁK</a></li>
              <li><a href="weblap-kapcsolat.php">KAPCSOLAT</a></li>
              <li><a href="weblap-jelentkezes.php">BEJELENTKEZÉS</a></li>
            <?php endif; ?>
          </ul>
        </div>
        <i class="fa fa-chevron-circle-down" onclick="showMenu()"></i>
      </nav>
      <div class="text-box">
        <p id="demo"></p>
      </div>
    </section>
    <br>
    <br>
    <h1>Válasszon egy időpontot!</h1>
    

    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <p id="modalText">Le szeretné foglalni ezt az időpontot?</p>
        <button id="confirmBooking">Foglalás</button>
        <button id="deleteBooking">Törlés</button>
      </div>
    </div>

    <?php
        $eventsArray = [];
        $currentMondayStr = date('Y-m-d', strtotime('monday this week'));
        $date = new DateTime($currentMondayStr);
        $date->modify('-1 day');
        for ($j = 0; $j < 12; $j++) {
            $week = [];
            for ($i = 0; $i < 7; $i++) {
                $date->modify('+1 day');
                array_push($week, $date->format('Y-m-d'));
            }
            foreach ($events as $row) {
                $stmt = $conn->prepare("SELECT COUNT(*) as db FROM foglalások WHERE EdzesID = :edzesId AND idopont = :idopont");
                $stmt->bindParam(':edzesId', $row["EdzesID"]);
                $stmt->bindParam(':idopont', $week[$row["Nap"] - 1]);
                $stmt->execute();
                $db = $stmt->fetch(PDO::FETCH_ASSOC)['db'];
                $color = ($db > 2) ? 'rgba(235, 76, 150, 0.467)' : 'rgba(12, 76, 150, 0.865)';
                array_push($eventsArray, [
                    "id" => $row["EdzesID"],
                    "title" => $row["EdzesNev"],
                    "start" => $week[$row["Nap"] - 1] . "T" . $row["KezdetiIdopont"],
                    "end" => $week[$row["Nap"] - 1] . "T" . $row["VegsoIdopont"],
                    "color" => $color,
                ]);
            }
        }
    ?>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridWeek',
          eventDisplay: 'block',
          firstDay: 1,
          locale: 'hu',
          buttonText: {
            today: 'Ma'
          },
          events: <?php echo json_encode($eventsArray); ?>,
          dayHeaderFormat: { 
           weekday: 'long',
           month: 'short',
           day: 'numeric',
           omitCommas: true 
        },
        
          height: 'auto', 
          eventTimeFormat: { hour: 'numeric', minute: '2-digit' },
          windowResize: function(view) {
        if (window.innerWidth < 768) {
          calendar.changeView('dayGridDay');
        } else {
          calendar.changeView('dayGridWeek');
        }
      },


          eventClick: function(info) {
            info.jsEvent.preventDefault(); // Prevent the default action

            var modal = document.getElementById("myModal");
            var modalText = document.getElementById("modalText");
            modalText.textContent = `Módosítaná a ${info.event.title} edzést, amely ${info.event.start.toLocaleString()} kezdődik? `;

            var span = document.getElementsByClassName("close")[0];
            modal.style.display = "block";

            span.onclick = function() {
              modal.style.display = "none";
            }

            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }

            document.getElementById("confirmBooking").onclick = function() {
              $.ajax({
                url: 'foglalas.php',
                type: 'POST',
                data: {
                  edzesId: info.event.id,
                  idopont: info.event.start.toISOString().split('T')[0]
                },
                success: function(response) {
                  var result = JSON.parse(response);

                 if(result.megtelt){
                  info.event.setProp("color","rgba(235, 76, 150, 0.467)");
                  calendar.refetchEvents();
                 }
                 else {
                  info.event.setProp("color", "rgba(49, 139, 176, 0.722)");
                }
                    alert(result.status);
                  modal.style.display = "none";
                },
                error: function() {
                  alert('Foglalási hiba');
                  modal.style.display = "none";
                }
              });
            }

            document.getElementById("deleteBooking").onclick = function() {
              $.ajax({
                url: 'torles.php',
                type: 'POST',
                data: {
                  edzesId: info.event.id,
                  idopont: info.event.start.toISOString().split('T')[0]
                },
                success: function(response) {
                  var result = JSON.parse(response);
                  if (result.success) {
                    alert(result.status);
                    calendar.refetchEvents();
                  } else {
                    alert('Törlési hiba');
                  }
                  modal.style.display = "none";
                },
                error: function() {
                  alert('Törlési hiba');
                  modal.style.display = "none";
                }
              });
            }
          }
        });
        calendar.render();
      });

      function hideMenu() {
        document.getElementById("navLinks").style.right = "-200px";
      }

      function showMenu() {
        document.getElementById("navLinks").style.right = "0";
      }
    </script>
    <div id='calendar'></div>
    <br>
    <br>
    <h2 style="font-size: 15px; margin-left: 20px;">
      <span class="circle" style="background-color: rgba(12, 76, 150, 0.865);"></span> Szabad helyek
    </h2>
    <h2 style="font-size: 15px; margin-left: 20px;">
      <span class="circle" style="background-color: rgba(235, 76, 150, 0.467);"></span> Megtelt
    </h2>
  </body>
</html>



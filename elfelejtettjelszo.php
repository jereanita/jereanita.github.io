<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Elfelejtett jelszó</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
</head>

<body>
  
    <div class="ujjelszo-box">
        <form id="form" action="jelszoemailkuldes.php" method="post"> 
            <label for="email">Amennyiben elfelejtette jelszavát, írja be e-mail címét!</label>
            <div class="input-container">
                <input type="text" id="email" name="email" placeholder="Írja be az e-mail címét!" required>
            </div>
            <input type="submit" value="Küldés">
        </form>
    </div>

    <style>
        body {
            margin: 500;
            font-family: 'Open Sans', sans-serif;
            position: relative; 
        }

        .ujjelszo-box {
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%, -1%);
            width: 300px;
            padding: 20px;
            z-index: 999;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .ujjelszo-box label {
            margin-top: 10px;
            margin-bottom: 5px;
            font-size: 16px;
            color: #333;
        }

        .input-container {
            display: flex;
            border-radius: 5px;
            overflow: hidden;
            width: 100%;
        }

        input[type="text"] {
            flex: 1;
            margin-top: 5px;
            margin-bottom: 15px;
            padding: 10px;
            border: none;
            box-sizing: border-box;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: rgba(77, 67, 206, 0.8);
            font-size: 16px;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }

        
    </style>
</body>
</html>

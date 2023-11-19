<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            background-size: cover;
            background-blend-mode: overlay;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .navbar {
            color: white;
            position: fixed;
            top: 0;
            width: 100%;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        a {
            padding: 10px 20px;
            background-color: black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .navbar a:hover {
            background-color: red;
        }

        .logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
        }

        .logo img {
            max-width: 100%;
            height: auto;
            width: 100px;
            margin-left: 10px;
            margin-right: 20px;
            display: block;
            margin: 0 auto;
        }

        .logout-button {
            margin-top: auto;
            text-align: center;
            display: block;
            padding: 10px 20px;
            background-color: #BA0001;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 60px;
            margin: 0 auto;
            font-weight: bold;
        }

        .admin-panel-title {
            color: #fff;
        }

        .item-container,
        .item-container2,
        .item-container3 {
            width: 100%;
            max-width: 200px;
            height: auto;
            margin: 10px;
            padding: 20px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            text-align: center;
            margin-top: 20px;
        }

        .item-container:hover,
        .item-container2:hover,
        .item-container3:hover {
            transform: scale(1.05);
        }

        @media (max-width: 700px) {
            .item-container,
            .item-container2,
            .item-container3 {
                max-width: 100%;
            }
        }

        .add-form {
            display: none;
            margin-top: 10px;
        }

        .con img,
        .con2 img,
        .con3 img {
            width: 200px;
            height: 200px;
            margin-left: 5px;
        }

        .add-button,
        .add-button2,
        .add-button3 {
            padding: 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            width: 70%;
            display: inline-block;
        }

        .add-button:hover,
        .add-button2:hover,
        .add-button3:hover {
            background-color: #1c6ea4;
        }

        .add-button3 {
            width: 40%;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo">
            <img src="../logo.png" alt="Logo">
        </div>
        <a class="logout-button" href="admin.php">Logout</a>
    </div>

    <div class="item-container">
        <div class="con">
            <img src="../add.png" alt="Image Description">
        </div>
        <a class="add-button" href="addnewitems.php">Add New Items</a>
    </div>

    <div class="item-container2">
        <div class="con2">
            <img src="../res.png" alt="Image Description">
        </div>
        <a class="add-button" href="viewreserve.php">View Reservation</a>
    </div>

    <div class="item-container3">
        <div class="con3">
            <img src="../edits.png" alt="Image Description">
        </div>
        <a class="add-button" href="edit.php">Edit</a>
    </div>

</body>

</html>
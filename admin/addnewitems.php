<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item = $_POST["item"];
    $size = isset($_POST["size"]) ? $_POST["size"] : '';
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    $targetDir = "uploads/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 5000000) { 
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    $allowedFormats = ["jpg", "jpeg", "png"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
           
            $stmt = $conn->prepare("INSERT INTO items (item, size, quantity, price, image_path) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssids", $item, $size, $quantity, $price, $targetFile);

            if ($stmt->execute()) {
                
                header("Location: addnewitems.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


$result = $conn->query("SELECT * FROM items");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
</head>
<body>
<style>
 body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
        text-align: center;
    }

    .navbar {
        color: #f4f4f4;
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
        height: 104px;
    }   

    .logo {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo img {
        width: 100px; 
        height: auto;
        margin-right: 10px; 
        margin-bottom: 10px;
    }

    .logo h1 {
        color: white;
        margin: 0;
    }

    form {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
        width: 40%;
        margin: 120px ;
        margin-left: 550px;
    }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            text-align: left;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 200px;
            padding: 10px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #BA0001;
            color: white;
        }

        img.item-image {
            max-width: 100px;
            height: auto;
        }
        a {
        display: inline-block;
        padding: 10px 20px;
        background-color:  #BA0001;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        width: 80px;
        margin-left: 55px;
        }

        a:hover {
            background-color: red;
        }

    </style>

<div class="navbar">
<div class="logo">
        <img src="../logo.png" alt="Logo">
    </div>
</div>
<form action="" method="post" enctype="multipart/form-data">

    <h1>Add New Item</h1>
    <label for="item">Item:</label>
    <input type="text" name="item" required><br>

    <label for="image">Image:</label>
    <input type="file" name="image" accept=".jpg, .jpeg, .png" required><br>

    <label for="size">Size:</label>
    <select name="size" required>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L" >L</option>
        <option value="XL">XL</option>
    </select><br>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" min="1" required><br>

    <label for="price">Price:</label>
    <input type="number" name="price" min="0" step="0.01" required><br>

    <button type="submit">Add Item</button>
</form>
<a href="adminhomepage.php">Back</a>
<hr>

<h1>Lists of Available Items</h1>
<?php

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>#</th><th>Item</th><th>Size</th><th>Quantity</th><th>Price</th><th>Image</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["item"] . "</td>";
        echo "<td>" . $row["size"] . "</td>";
        echo "<td>" . $row["quantity"] . " pcs</td>";
        echo "<td> ₱ " . $row["price"] . "</td>";
        echo "<td><img src='" . $row["image_path"] . "' width='100'></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>

</body>
</html>
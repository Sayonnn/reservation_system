<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            background-size: cover;
            background-blend-mode: overlay;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
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
        }

        .logo img {
            max-width: 100%;
            height: auto;
            width: 100px;
            margin-bottom: 10px;
        }

        .table-container {
            width: 80%; /* Adjust the width as needed */
            margin: 20px auto; /* Center the table horizontally */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .back-button {
            margin-top: 20px;
            text-align: center;
        }

        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #BA0001;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button a:hover {
            background-color: red;
        }

    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <img src="../logo.png" alt="Logo">
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Item Reserved</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Juan Dela Cruz</td>
                    <td>Polo</td>
                    <td>12 pcs</td>
                    <td>2023-01-01</td>
                    <td>Pending</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="back-button">
        <a href="adminhomepage.php">Back to Home</a>
    </div>

</body>

</html>
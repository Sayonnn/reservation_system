<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservation</title>
</head>
<body>

<style>
body {
    background: #f4f4f4;
    font-family: 'Arial', sans-serif;
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
        height: 104px;
    }

.logo img {
    max-width: 100%;
    height: auto;
    width: 100px;
    margin-bottom: 10px;
}

.admin-panel-title {
    color: white;
}

.content-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.form-container,
.back-button {
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 8px;
    width: 300px;
    margin: 10px;
    align-items: center;
    display: block;
}

.form-container h2 {
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-size: 14px;
    margin-bottom: 8px;
    text-align: center;
}

.form-group input {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-group button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    display: block;
    margin: 0 auto;
    width: 40%;
}

.result {
    margin-top: 20px;
    font-size: 18px;
}

.back-button a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #BA0001;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    width: 40%;
    text-align: center;
    align-items: center;
    display: block;
    margin: 0 auto;
}

.back-button a:hover {
    background-color: red;
}


</style>
<div class="navbar">
    <div class="logo">
        <img src="../logo.png" alt="Logo">
    </div>
    <div class="admin-panel-title">
      
    </div>
</div>

<div class="content-container">
    <div class="form-container">
        <h2>Reservation Filter</h2>
        <form action="filter_reservations.php" method="post">
            <div class="form-group">
                <label for="reservation_date">Reservation Date:</label>
                <input type="date" id="reservation_date" name="reservation_date" required>
            </div>
            <div class="form-group">
                <button type="submit">View</button>
            </div>
        </form>
        <div class="result" id="result"></div>
    </div>

    <div class="back-button">
        <a href="adminhomepage.php">Back</a>
    </div>
</div>

</body>
</html>
<?php 
session_start();
include '../include/header.php';
include '../database/connection.php' ?>


<?php
if (isset($_POST['login'])) {
    // Retrieve values from the form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sr_code = $_POST["SRcode"];

    // SQL query to check if the credentials are valid
    $query = "SELECT * FROM tbstudacc WHERE username = '{$username}' AND password = '{$password}' AND SRcode = '{$sr_code}'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Authentication successful
        $_SESSION['SRcode'] = $sr_code;
        echo "<script type='text/javascript'>alert('Login successful!'); window.location.href = 'studHome.php?srcode={$sr_code}';</script>";
    } else {
        // Authentication failed
        echo "<script type='text/javascript'>alert('Login failed. Please check your credentials.');</script>";
    }
}
?>

<header>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center align-items-center">
                <img src="../images/Batangas_State_Logo.png" class="img pt-2" id="logo" alt="BSU Logo">
                <div class="logo_label ms-2 ">Online Uniform Reservation for RGO</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
            <div class="logo_sub_label">Student Login</div>
        </div>
    </div>
</header>

<div class="container mt-5 pt-3">
    <div class="border bg-light">
        <form method="post">
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center ">
                <div class="col-auto">
                    <label for="username" class="col-form-label">Username</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="username"  name="username" class="form-control" required>
                </div>
            </div>
            <div class="row g-3 p-2 align-items-center justify-content-center ">
                <div class="col-auto">
                    <label for="password" class="col-form-label">Password</label>
                </div>
                <div class="col-auto">
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="row g-3 p-2 align-items-center justify-content-center ">
                <div class="col-auto">
                    <label for="SRcode" class="col-form-label">SR-Code</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="SRcode" name="SRcode" class="form-control" required>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center pt-1 pb-3">
                <button class="btn btn-secondary" id="login" name="login" type="submit" role="button">Login</button>
            </div>
        </form>
    </div>
</div>

<?php include '../include/footer.php'; ?>
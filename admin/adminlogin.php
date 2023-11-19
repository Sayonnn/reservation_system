<?php
include '../header.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_nt3101";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loginError = ""; // Initialize login error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, username, password FROM admin_users WHERE username = ?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    // Verify password
    if ($user && $password === "admin123") {
        // Password is correct, set session and redirect
        session_start();
        $_SESSION["admin_id"] = $user["id"];
        $_SESSION["admin_username"] = $user["username"];
        header("Location: adminhomepage.php");
        exit();
    } else {
        $loginError = "Invalid username or password";
    }
}

$conn->close();
?>


<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh; 
}


.card {
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 400px;
    align-self: center;
    margin: auto; /
}


.logo {
    text-align: center;
}

.logo-img {
    width: 200px;
    height: 200px; 
    margin-top: 10px;
}

.card-title {
    color: #495057;
}

.form-label {
    color: #495057;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
}

.btn-primary {
    background-color: #007bff;
    border: 1px solid #007bff;
    margin-bottom: 30px;
    width: 50%;
    display: block;
    align-items: center;
    margin: 0 auto;

}

.btn-primary:hover {
    background-color: #0056b3;
    border: 1px solid #0056b3;
}


</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="logo">
                <img src="../logo.png" alt="Logo" style="width: 110px; height: 100px;">
            </div>
<br>
                <h3 class="card-title text-center"><strong>Log In</strong></h3>
                <form action="admin.php" method="post">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" id="userName" name="userName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <?php if ($loginError): ?>
                        <p class="text-danger"><?php echo $loginError; ?></p>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>
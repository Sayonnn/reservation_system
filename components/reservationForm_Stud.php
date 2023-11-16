<?php
session_start();

// Check if SRcode is set in the session
if (!isset($_SESSION['SRcode'])) {
    // Redirect to login page if SRcode is not set
    header("Location: studlogin.php");
    exit();
}

include '../include/header.php';
include '../database/connection.php';

$sr_code = $_SESSION['SRcode'];
$itemID = $_GET['itemID'];
$itemName = $_GET['itemName'];
$stock = $_GET['stock'];
$size = $_GET['size'];
$price = $_GET['price'];

if (isset($_POST['confirm'])) {
    $chosenSize = $_POST['chosen_size'];
    $quantity = $_POST['quantity'];
    $Tprice = $_POST['price'];
    $resDate = $_POST['Rdate'];

    $query = "INSERT INTO tbreservedetails (itemid, itemSize, quantity, total_price, SRcode, reservation_date) VALUES ('{$itemID}','{$chosenSize}','{$quantity}','{$Tprice}','{$sr_code}','{$resDate}')";
    $reserve = mysqli_query($conn, $query);

    if (!$reserve) {
        echo "Something went wrong: " . mysqli_connect_error();
    } else {
        echo "<script type='text/javascript'>alert('Your reservation was sent to the RGO.'); window.location.href = 'studHome.php';</script>";
    }
}

?>

<header>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center align-items-center">
                <img src="../images/Batangas_State_Logo.png" class="img pt-2" id="logo" alt="BSU Logo">
                <div class="logo_label ms-2">Online Uniform Reservation for RGO</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
            <div class="logo_sub_label">Uniform Reservation Form</div>
        </div>
    </div>
</header>

<div class="container pt-3">
    <div class="border bg-light">
        <form action="" method="post">
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="SRcode" class="col-form-label">SR-Code</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="SRcode" class="form-control" value="<?php echo $sr_code ?>" readonly>
                </div>
            </div>
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="item" class="col-form-label">Item</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="item" name="item" class="form-control" value="<?php echo $itemName ?>"
                        readonly>
                </div>
            </div>
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="size" class="d-flex col-form-label justify-content-center">Sizes Available:</label>
                    <input type="text" id="size" name="size" class="form-control m-1" value="<?php echo $size ?>"
                        readonly>
                </div>
                <div class="col-auto">
                    <label for="chosen_size" class="d-flex col-form-label justify-content-center">Size:</label>
                    <input type="text" id="chosen_size" name="chosen_size" class="form-control m-1"
                        placeholder="Please specify the size." required>
                </div>
            </div>
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="quantity" class="col-form-label">Quantity</label>
                </div>
                <div class="col-auto">
                    <input type="number" id="quantity" name="quantity" class="form-control" value=1 oninput="calculatePrice(<?php echo $price; ?>)"
                        required>
                </div>
            </div>
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="stocks" class="col-form-label">Remaining Stock</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="stocks" name="stocks" class="form-control" value="<?php echo $stock ?>"
                        readonly>
                </div>
            </div>
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="Rdate" class="col-form-label">Reserve Date</label>
                </div>
                <div class="col-auto">
                    <input type="date" id="Rdate" name="Rdate" class="form-control" required>
                </div>
            </div>
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="price" class="col-form-label">Price</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="price" name="price" class="form-control" value="<?php echo $price ?>"
                        readonly>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center pt-1 pb-3">
                <button class="btn btn-danger m-2" id="confirm" name="confirm" type="submit">Confirm</button>
                <a href="studHome.php" class="btn btn-danger m-2" id="cancel" name="cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include '../include/footer.php' ?>
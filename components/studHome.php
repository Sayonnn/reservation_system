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
            <div class="logo_sub_label">Student Portal</div>
        </div>
    </div>
</header>

<div class="container">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <button class="nav-link active" aria-current="true" id="pills-home-tab"
                        onclick="changeContent('studHome_Main', 'pills-home-tab')">Home</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="pills-profile-tab"
                        onclick="changeContent('studHome_ItemList', 'pills-profile-tab')">Uniforms</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="pills-contact-tab"
                        onclick="changeContent('studHome_Logout', 'pills-contact-tab')">Log Out</button>
                </li>
            </ul>
        </div>

        <!--Main Home Section/Tab-->
        <div class="card-body" id="studHome_Main" style="display: block;">
            <table id="itemList">
                <thead>
                    <tr>
                        <th class="text-center">Reservation ID</th>
                        <th class="text-center">Reservation Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $reservationQuery = "SELECT * FROM tbreservedetails WHERE SRcode = '{$_SESSION['SRcode']}'";
                    $reservationResult = mysqli_query($conn, $reservationQuery);
                    $numReservations = mysqli_num_rows($reservationResult);
                    if ($numReservations > 0) {
                        $query = "SELECT * FROM tbreservedetails JOIN tbproductinfo ON tbreservedetails.itemid = tbproductinfo.itemid WHERE SRcode='{$_SESSION['SRcode']}'";
                        $display = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($display)) {
                            $resID = $row['reservationid'];
                            $itemName = $row['itemname'];
                            $itemPIC = $row['item_img'];
                            $base64IMG = base64_encode($itemPIC);
                            $size = $row['itemSize'];
                            $quantity = $row['quantity'];
                            $Tprice = $row['total_price'];
                            $resDate = $row['reservation_date'];

                            echo "<tr class='item'>";
                            echo "<th><div class='d-flex justify-content-center'>{$resID}</div></th>";
                            echo "<td>
                            <div class='row row-cols-3 '>
                                <div class='row'>
                                    <div class='d-flex justify-content-center align-items-center'>
                                        <img src='data:image/jpeg;base64,{$base64IMG}' alt='Item 1' class='item-image' onclick=\"openModal('{$base64IMG}')\">
                                    </div>
                                </div>
                                <div class='col'>
                                    <div class='desc d-flex justify-content-center'>Item:</div>
                                    <div class='desc d-flex justify-content-center'>Size:</div>
                                    <div class='desc d-flex justify-content-center'>Quantity:</div>
                                    <div class='desc d-flex justify-content-center'>Price:</div>
                                    <div class='desc d-flex justify-content-center'>Reserved for:</div>
                                </div>
                                <div class='col'>
                                    <div class='desc d-flex justify-content-center'>{$itemName}</div>
                                    <div class='desc d-flex justify-content-center'>{$size}</div>
                                    <div class='desc d-flex justify-content-center'>{$quantity}</div>
                                    <div class='desc d-flex justify-content-center'>{$Tprice}</div>
                                    <div class='desc d-flex justify-content-center'>{$resDate}</div>
                                </div>
                            </div>
                        </td>";
                        }
                    } else {
                        echo "You currently have no reservation.";
                    }
                    ?>
                </tbody>
            </table>
            <div id="bigPIC_container" class="modal">
                <img class="modal-content" id="bigPIC">
            </div>
        </div>

        <!--Home Page Uniform Section/Tab-->
        <div class="card-body" id="studHome_ItemList" style="display: none;">
            <table id="itemList">
                <thead>
                    <tr>
                        <th class="text-center">Item</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tbproductinfo ORDER BY itemname";
                    $display = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($display)) {
                        $itemID = $row['itemid'];
                        $itemName = $row['itemname'];
                        $itemPIC = $row['item_img'];
                        $base64IMG = base64_encode($itemPIC);
                        $size = $row['sizes'];
                        $price = $row['price'];
                        $stock = $row['stocks'];

                        echo "<tr class='item'>";
                        echo "<th><div class='d-flex justify-content-center'>{$itemName}</div></th>";
                        echo "<td>
                        <div class='row row-cols-2 '>
                            <div class='row'>
                                <div class='d-flex justify-content-center align-items-center'>
                                    <img src='data:image/jpeg;base64,{$base64IMG}' alt='Item 1' class='item-image' onclick=\"openModal('{$base64IMG}')\">
                                </div>
                            </div>
                            <div class='col'>
                                <div class='desc'>Size: {$size}</div>
                                <div class='desc'>Price: {$price}</div>
                                <div class='desc'>Stock: {$stock}</div>
                            </div>
                        </div>
                    </td>";
                        echo "<td>
                        <div class='d-flex justify-content-center'>
                        <a href='calendar.php?itemID={$itemID}&itemName={$itemName}&stock={$stock}&size={$size}&price={$price}' class='btn btn-danger reserve-button'>Reserve</a>
                        </div>
                    </td>";
                    }
                    ?>
                </tbody>
            </table>
            <div id="bigPIC_container" class="modal">
                <img class="modal-content" id="bigPIC">
            </div>
        </div>

        <!-- Log Out Section/Tab -->
        <div class="card-body" id="studHome_Logout" style="display: none;">
            <?php
            $sr = $_SESSION['SRcode'];
            $query = "SELECT * FROM tbstudinfo WHERE SRcode = ?";

            // Use prepared statement to prevent SQL injection
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $sr);
            mysqli_stmt_execute($stmt);

            // Check if the query was successful
            if ($stmt) {
                $nameFetch = mysqli_stmt_get_result($stmt);

                // Check if there is a row in the result
                if ($row = mysqli_fetch_assoc($nameFetch)) {
                    $Fname = $row['firstname'];
                    $Lname = $row['lastname'];

                    echo "<div class='d-flex justify-content-center m-2'>
                            <h3 class='text-center'>You are currently logged in as {$Fname} {$Lname}. Do you want to logout?</h3>
                        </div>";
                    echo "<div class='d-flex justify-content-center'>
                            <button type='button' name='logout' class='btn btn-danger' onclick='logoutMes()'>Logout</button>
                        </div>";
                } else {
                    echo "Error: User not found.";
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "Error in the query: " . mysqli_error($conn);
            }
            ?>
        </div>

    </div>
</div>

<?php include '../include/footer.php'; ?>
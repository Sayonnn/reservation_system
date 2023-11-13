<?php include '../include/header.php'; ?>
<?php include '../database/connection.php'; ?>

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
                    <a class="nav-link" aria-current="true" href="studHome_Main.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="studHome_ItemList.php">Uniforms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="studHome_Logout.php">Log Out</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
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
                        $itemName = $row['itemname'];
                        $itemPIC = $row['item_img'];
                        $base64IMG = base64_encode($itemPIC);
                        $size = $row['size'];
                        $price = $row['price'];
                        $stock = $row['stocks'];

                        echo "<tr class='item'>";
                        echo "<th><div class='d-flex justify-content-center'>{$itemName}</div></th>";
                        echo "<td>
                        <div class='row row-cols-2 '>
                            <div class='row'>
                                <div class='d-flex justify-content-center align-items-center'>
                                    <img src='data:image/jpeg;base64,{$base64IMG}' alt='Item 1' class='item-image' onclick=\"openModal('{$base64IMG}', '{$itemName}')\">
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
                            <a href='reservationForm_Stud.php' class='btn btn-danger reserve-button'>Reserve</a>
                        </div>
                    </td>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="myModal" class="modal">
            <img class="modal-content" id="modalImage">
            <div id="modalCaption"></div>
        </div>
    </div>
</div>

<?php include '../include/footer.php'; ?>
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

        <div class="card-body" id="studHome_Main" style="display: block;">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>

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
                            <a href='reservationForm_Stud.php' class='btn btn-danger reserve-button'>Reserve</a>
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

        <div class="card-body" id="studHome_Logout" style="display: none;">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

<?php include '../include/footer.php'; ?>
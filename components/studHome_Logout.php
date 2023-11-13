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
                    <a class="nav-link" href="studHome_Main.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="studHome_ItemList.php">Uniforms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="studHome_Logout.php">Log Out</a>
                </li>
            </ul>
</div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

<?php include '../include/footer.php'; ?>
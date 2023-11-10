<?php include '../include/header.php'; ?>

<header>
    <div class="row row-cols-3">
        <div class="col order-1 ms-5">
            <div class="d-flex justify-content-center align-items-center">
                <img src="../images/Batangas_State_Logo.png" class="img-fluid h-25 w-25 pt-3" alt="BSU Logo">
            </div>
        </div>
    </div>
</header>
<div class="container mt-5 pt-3">
    <div class="border bg-light">
        <h3 class="text-center pt-3 "><strong>Log In</strong></h3>
        <form method="post">
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center ">
                <div class="col-auto">
                    <label for="username" class="col-form-label">Username</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="username" class="form-control">
                </div>
            </div>
            <div class="row g-3 p-2 align-items-center justify-content-center ">
                <div class="col-auto">
                    <label for="password" class="col-form-label">Password</label>
                </div>
                <div class="col-auto">
                    <input type="password" id="password" class="form-control">
                </div>
            </div>
            <div class="row g-3 p-2 align-items-center justify-content-center ">
                <div class="col-auto">
                    <label for="SRcode" class="col-form-label">SR-Code</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="SRcode" class="form-control">
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center pt-1 pb-3">
                <a class="btn btn-secondary" href="studHome.php" role="button">Login</a>
            </div>
        </form>
    </div>
</div>

<?php include '../include/footer.php'; ?>
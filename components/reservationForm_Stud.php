<?php include '../include/header.php' ?>



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
                    <input type="text" id="SRcode" class="form-control">
                </div>
            </div>
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="selectItem" class="col-form-label">Item</label>
                </div>
                <div class="col-auto">
                    <div class="btn-group">
                        <select id="selectItem" class="form-select">
                            <option value="none">Choose</option>
                            <option value="Value 1">Item 1</option>
                            <option value="Value 2">Item 2</option>
                            <option value="Value 3">Item 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="selectSize" class="col-form-label">Size</label>
                </div>
                <div class="col-auto">
                    <div class="btn-group">
                        <select id="selectSize" class="form-select">
                            <option value="none">Choose</option>
                            <option value="Value 1">Size 1</option>
                            <option value="Value 2">Size 2</option>
                            <option value="Value 3">Size 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="amount" class="col-form-label">Amount</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="amount" class="form-control" value=1>
                </div>
            </div>
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="stocks" class="col-form-label">Remaining Stock</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="stocks" class="form-control" readonly>
                </div>
            </div>
            <div class="row g-3 p-2 pt-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="price" class="col-form-label">Price</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="price" class="form-control" readonly>
                </div>
            </div>
            <a class="btn btn-outline-secondary m-2">Submit</a>
            <a href="studHome_Main.php" class="btn btn-outline-secondary m-2">Back</a>
        </form>
    </div>
</div>

<?php include '../include/footer.php' ?>
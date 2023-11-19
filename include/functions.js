function openModal(base64Image) {
    // Get the modal element
    var bigPicCon = document.getElementById('bigPIC_container');

    // Set the image and caption in the modal
    var selectedImg = document.getElementById("bigPIC");
    selectedImg.src = 'data:image/jpeg;base64,' + base64Image;

    // Display the modal
    bigPicCon.style.display = "flex";

    // Close the modal when the user clicks outside the image
    bigPicCon.onclick = function () {
        bigPicCon.style.display = "none";
    };
}

function changeContent(contentId, activeButtonId) {
    // Hide all card-bodies
    document.getElementById('studHome_Main').style.display = 'none';
    document.getElementById('studHome_ItemList').style.display = 'none';
    document.getElementById('studHome_Logout').style.display = 'none';

    // Remove active class from all buttons
    document.getElementById('pills-home-tab').classList.remove('active');
    document.getElementById('pills-profile-tab').classList.remove('active');
    document.getElementById('pills-contact-tab').classList.remove('active');

    // Show the selected card-body
    document.getElementById(contentId).style.display = 'block';

    // Add active class to the clicked button
    document.getElementById(activeButtonId).classList.add('active');
}

function calculatePrice(price) {
    //var base = price;
    var quantity = parseInt(document.getElementById("quantity").value);

    if (quantity !== null && quantity > 0) {
        var total = quantity * price;
        document.getElementById("price").value = total;
    } else {
        document.getElementById("quantity").value = '';
        document.getElementById("price").value = 0;
    }
}

function logoutMes() {
    var confirmLogout = confirm("Are you sure you want to logout?");
    if (confirmLogout) {
        // Redirect to the logout page if the user clicks "OK"
        window.location.href = 'studlogin.php';
    } else {
        // Do nothing if the user clicks "Cancel"
    }
}

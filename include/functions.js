function openModal(base64Image, itemName) {
    // Get the modal element
    var modal = document.getElementById('myModal');

    // Set the image and caption in the modal
    var modalImg = document.getElementById("modalImage");
    var modalCaption = document.getElementById("modalCaption");
    modalImg.src = 'data:image/jpeg;base64,' + base64Image;
    modalCaption.innerHTML = itemName;

    // Display the modal
    modal.style.display = "flex";

    // Close the modal when the user clicks outside the image
    modal.onclick = function () {
        modal.style.display = "none";
    };
}
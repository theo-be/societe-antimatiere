document.addEventListener('DOMContentLoaded', function() {
    const decrementBtns = document.querySelectorAll('.decrement-btn');
    const incrementBtns = document.querySelectorAll('.increment-btn');
    const quantityFields = document.querySelectorAll('.quantity-field');
    const addToCartForms = document.querySelectorAll('.product form');

    decrementBtns.forEach((btn, index) => {
        btn.addEventListener('click', function() {
            let currentValue = parseInt(quantityFields[index].value);
            if (currentValue > 1) {
                currentValue--;
                quantityFields[index].value = currentValue;
            }
        });
    });

    incrementBtns.forEach((btn, index) => {
        btn.addEventListener('click', function() {
            let currentValue = parseInt(quantityFields[index].value);
            const stock = parseInt(quantityFields[index].dataset.stock); // Get stock value from dataset
            if (currentValue < stock) {
                currentValue++;
                quantityFields[index].value = currentValue;
            }
        });
    });

});



function show_stock() {
    var inputStock = document.getElementById("stock");
    var stockButton = document.querySelector(".stock-btn");


    if (inputStock && stockButton) {

        if (inputStock.type === "text") {
            inputStock.type = "hidden";

            stockButton.textContent = "Voir le stock";
        } else {

            inputStock.type = "text";

            stockButton.textContent = "Masquer le stock";
        }
    }
}

function changeImage(element) {
    var images = element.querySelectorAll('.image');
    images.forEach(function(img) {
        img.src = 'img/bin_hover.png';
    });
}

function restoreImage(element) {
    var images = element.querySelectorAll('.image');
    images.forEach(function(img) {
        img.src = 'img/bin.png';
    });
}
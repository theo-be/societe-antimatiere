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
    // Get the input element with the ID "quantite"
    var inputStock = document.getElementById("stock");
    var stockButton = document.querySelector(".stock-btn");

    // Check if the input element exists
    if (inputStock && stockButton) {
        // Check the current type of the input field
        if (inputStock.type === "text") {
            // If it's currently text, change it to hidden
            inputStock.type = "hidden";
            // Change the button text to "Voir le stock"
            stockButton.textContent = "Voir le stock";
        } else {
            // If it's not text (e.g., hidden), change it to text
            inputStock.type = "text";
            // Change the button text to "Masquer le stock"
            stockButton.textContent = "Masquer le stock";
        }
    }
}

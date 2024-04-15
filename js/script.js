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

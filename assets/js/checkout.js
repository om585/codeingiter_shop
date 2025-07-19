// assets/js/checkout.js

$(document).ready(function() {
    // Show confirmation modal when Place Order button is clicked
    $('#place-order-btn').on('click', function(e) {
        e.preventDefault();
        
        // Validate form first
        var form = $('#checkout-form');
        if (form[0].checkValidity() === false) {
            form[0].reportValidity();
            return;
        }
        
        $('#order-confirmation').modal('show');
    });
    
    // Submit form when confirmation button is clicked
    $('#confirm-order-btn').on('click', function() {
        $('#checkout-form').submit();
    });
});
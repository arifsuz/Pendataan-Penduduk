/*
 *  Document   : formsValidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */

var FormsValidation = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Form Validation */
            $('#form-validation').validate({
                errorClass: 'help-block animation-pullUp', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block').remove();
                },
                rules: {
                    'val-username': {
                        required: true,
                        minlength: 3
                    },
                    'val-email': {
                        required: true,
                        email: true
                    },
                    'val-password': {
                        required: true,
                        minlength: 5
                    },
                    'val-confirm-password': {
                        required: true,
                        equalTo: '#val-password'
                    },
                    'val-suggestions': {
                        required: true,
                        minlength: 5
                    },
                    'val-skill': {
                        required: true
                    },
                    'val-website': {
                        required: true,
                        url: true
                    },
                    'val-digits': {
                        required: true,
                        digits: true
                    },
                    'val-number': {
                        required: true,
                        number: true
                    },
                    'val-range': {
                        required: true,
                        range: [1, 5]
                    },
                    'val-terms': {
                        required: true
                    },
                    'register-terms': {
                        required: true
                    }
                },
                messages: {
                    'val-username': {
                        required: 'Masukkan username !',
                        minlength: 'Username minimal 3 karakter'
                    },
                    'val-email': 'Please enter a valid email address',
                    'val-password': {
                        required: 'Masukkan password !',
                        minlength: 'Password minimal 5 karakter !'
                    },
                    'val-confirm-password': {
                        required: 'Masukkan Password !',
                        minlength: 'Password minimal 5 karakter !',
                        equalTo: 'Verfikasi Password Salah'
                    },
                    'register-terms': {
                        required: 'Setujui Aturan!'
                    },
                    'val-suggestions': 'What can we do to become better?',
                    'val-skill': 'Please select a skill!',
                    'val-website': 'Please enter your website!',
                    'val-digits': 'Please enter only digits!',
                    'val-number': 'Masukkan Angka !',
                    'val-range': 'Please enter a number between 1 and 5!',
                    'val-terms': 'You must agree to the service terms!'
                }
            });
        }
    };
}();
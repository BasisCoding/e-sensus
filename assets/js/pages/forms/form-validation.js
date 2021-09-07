$(function () {
    $('.form_validation').validate({
        rules: {
            'checkbox': {
                required: true
            },
            'gender': {
                required: true
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    //Advanced Form Validation
    $('.form_advanced_validation').validate({
        rules: {
            'date': {
                customdate: true
            },
            'creditcard': {
                creditcard: true
            },
            'nik': {
                nik: true
            },
            'no_kk': {
                no_kk: true
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    //Custom Validations ===============================================================================
    //Date
    $.validator.addMethod('customdate', function (value, element) {
        return value.match(/^\d\d\d\d?-\d\d?-\d\d$/);
    },
        'Please enter a date in the format YYYY-MM-DD.'
    );

    //Credit card
    $.validator.addMethod('creditcard', function (value, element) {
        return value.match(/^\d\d\d\d?-\d\d\d\d?-\d\d\d\d?-\d\d\d\d$/);
    },
        'Please enter a credit card in the format XXXX-XXXX-XXXX-XXXX.'
    );
    //==================================================================================================

    // NIK dan NO KK
    $.validator.addMethod('nik', function (value, element) {
        return value.match(/^\d\d\d\d\d\d\d\d\d\d\d\d\d\d\d\d$/);
    },
        'Mohon masukan NIK dengan benar XXXXXXXXXXXXXXXX.'
    );
    
    $.validator.addMethod('no_kk', function (value, element) {
        return value.match(/^\d\d\d\d\d\d\d\d\d\d\d\d\d\d\d\d$/);
    },
        'Mohon masukan NO KK dengan benar XXXXXXXXXXXXXXXX.'
    );

    //==================================================================================================
});
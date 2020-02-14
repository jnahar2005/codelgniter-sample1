/*----------=====
    Validation Script
=====----------*/
$('#frm').validate({
    ignore: [],
    highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); 
    },
    success: function(element) {
        element.closest('.form-group').removeClass('has-error').addClass('has-success');
        element.remove();
    },rules: {
        'new_password': {
            required: true,
            minlength: 8,
            maxlength: 18,
            pwcheck: true   
        },
        'confirm_password': {
            equalTo: "#new_password",
        },
        "gender": {
            required: true,
        },
        'phone': {
            required: true,
            minlength: 10,
            maxlength: 10,
        },     
    },
    errorPlacement: function(label, element) {
        if (element.attr("name") === "gender") {
            element.closest('.genderBox').append(label);
        }else if (element.attr("type") === "checkbox") {
            element.closest('.custom-control').append(label);
        }else {
            label.insertAfter(element);
        }
    },
    messages: {
       new_password: {
            pwcheck: "Must contain at least 8 characters - including at least one uppercase letter, one number and one symbol",
            minlength: "Please enter at least {0} characters.",
            maxlength: "Please do not enter more than {0} characters.",
       },        
       phone: {
           minlength: "Please enter at least {0} numbers.",
           maxlength: "Please do not enter more than {0} numbers",
       },         
       confirm_password: {
           equalTo: "Please enter the same password again.",
       },  
    },
}); 

jQuery.validator.addMethod('zipcode', function(value, element) {
  return this.optional(element) || !!value.trim().match(/^\d{5}(?:[-\s]\d{4})?$/);
}, 'Invalid zip code');

$.validator.addMethod("pwcheck", function(value) {
    return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{8,18}$/.test(value)
});

/*----------=====
|     alertify script (custom alert, conform, promt and etc check alertify folder example)
=====----------*/
function reset () {
    $("#toggleCSS").attr("href", "<?php echo base_url();?>assets/alertify/themes/alertify.default.css");
    alertify.set({
        labels : {
            ok     : "OK",
            cancel : "Cancel"
        },
        delay : 5000,
        buttonReverse : false,
        buttonFocus   : "ok"
    });
}

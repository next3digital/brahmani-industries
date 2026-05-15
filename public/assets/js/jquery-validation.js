$(document).ready(function () {
    $("#contactForm").validate({
        rules: {
            name: {
                required: true,
                maxlength: 255
            },
            email: {
                required: true,
                email: true,
                maxlength: 191
            },
            mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            subject: {
                required: true,
                maxlength: 100
            },
            description: {
                required: true,
                maxlength: 2000
            },
            page_url: {
                required: true,
                url: true
            },
            // bot field is hidden and should validation enforce 'bot'? 
            // Backend says: 'in:bot'.
            bot: {
                required: true,
                equalTo: "#bot_field_value_check"
            }
        },
        messages: {
            name: {
                required: "Please enter your full name",
                maxlength: "Name cannot exceed 255 characters"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address",
                maxlength: "Email cannot exceed 191 characters"
            },
            mobile: {
                required: "Please enter your mobile number",
                digits: "Please enter only digits",
                minlength: "Mobile number must be 10 digits",
                maxlength: "Mobile number must be 10 digits"
            },
            subject: {
                required: "Please enter a subject",
                maxlength: "Subject cannot exceed 100 characters"
            },
            description: {
                required: "Please enter your message",
                maxlength: "Message cannot exceed 2000 characters"
            },
            page_url: {
                required: "Page URL is missing",
                url: "Invalid Page URL"
            }
        },
        errorElement: 'span',
        errorClass: 'error-message',
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        errorPlacement: function (error, element) {
            if (element.parent('.form-group').length) {
                error.insertAfter(element);
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            // Check reCAPTCHA
            var recaptcha = $("#g-recaptcha-response").val();
            if (recaptcha === "") {
                if ($("#recaptcha-error").length === 0) {
                    $(".g-recaptcha").after('<span id="recaptcha-error" class="error-message">Please complete the reCAPTCHA</span>');
                }
                return false;
            } else {
                $("#recaptcha-error").remove();
            }

            // If valid, submit
            form.submit();
        }
    });

    // Custom CSS for error messages if not already present
    // (Ideally this should go in style.css, but user asked to make 'perfect' validation here, ensuring it looks good)
    // We rely on the theme's .error-message class as seen in the blade file.
});

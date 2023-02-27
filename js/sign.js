function hidePassword(i) {
    let input = document.querySelector(`#password${i}`);
    let hide = document.querySelector(`#hide${i}`);
    let view = document.querySelector(`#view${i}`);

    if (input.type === "password") {
        input.type = 'text';
        hide.style.display = "none";
        view.style.display = null;
    } else {
        input.type = 'password';
        hide.style.display = null;
        view.style.display = "none";
    }
}

/* Login */

$("#login_btn").click(function(e) {
    e.preventDefault();
    
    $(`fieldset[name="email"]`).removeClass('error_field');
    $(`fieldset[name="password"]`).removeClass('error_field');

    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: '/vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
            password: password
        },
        success (data) {
            if (data.status) {
                $('.msg').addClass("none");
                document.location.href = ("/");
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function(field) {
                        $(`fieldset[name="${field}"]`).addClass('error_field');
                    });
                }

                $(".warning_msg").removeClass('none').text(data.massage);
            }
        }
    });

});

/* Get avatar */

let avatar = false;

$('input[name="avatar"]').change(function(e) {
    avatar = e.target.files[0];
    console.log(avatar);
});

/* SignUp */

$("#signup_btn").click(function(e) {
    e.preventDefault();

    $(`fieldset[name="firstName"]`).removeClass('error_field');
    $(`fieldset[name="lastName"]`).removeClass('error_field');
    $(`fieldset[name="email"]`).removeClass('error_field');
    $(`fieldset[name="phone"]`).removeClass('error_field');
    $(`fieldset[name="password"]`).removeClass('error_field');
    $(`fieldset[name="password_confirm"]`).removeClass('error_field');
    $(`fieldset[name="avatar"]`).removeClass('error_field');


    let firstName = $('input[name="firstName"]').val(),
        lastName = $('input[name="lastName"]').val(),
        email = $('input[name="email"]').val(),
        phone = $('input[name="phone"]').val(),
        password = $('input[name="password"]').val(),
        password_confirm = $('input[name="password_confirm"]').val(),
        checkbox = $('input[name="checkbox"]').is(':checked');


    let formData = new FormData();
    formData.append('firstName', firstName);
    formData.append('lastName', lastName);
    formData.append('email', email);
    formData.append('phone', phone);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);
    formData.append('avatar', avatar);
    formData.append('checkbox', checkbox);

    $.ajax({
        url: '/vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {
            if (data.status) {
                document.location.href = ("/pages/login.php");
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function(field) {
                        $(`fieldset[name="${field}"]`).addClass('error_field');
                    });
                    if (data.fields.includes("checkbox")) {
                        $('.sign_secondaryInputs').addClass('error_checkbox');
                    } else {
                        $('.sign_secondaryInputs').removeClass('error_checkbox');
                    }
                }

                $(".warning_msg").removeClass('none').text(data.massage);
            }
        }
    });
});

/* ForgotPass */

$("#forgot_btn").click(function(e) {
    e.preventDefault();

    $(`fieldset[name="email"]`).removeClass('error_field');

    let email = $('input[name="email"]').val();

    $.ajax({
        url: '/vendor/forgotpass.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email
        },
        success (data) {
            if (data.status) {
                $(".msg").removeClass('none').removeClass(".warning_msg").addClass("success_msg").text(data.massage);
                setTimeout(() => {
                    location.href = '/pages/login.php';
                }, "1000")

                $.ajax({
                    url: '/vendor/mail.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        email: email,
                        massage: data.letter_msg,
                        subject: data.subject
                    }
                });
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function(field) {
                        $(`fieldset[name="${field}"]`).addClass('error_field');
                    });
                }
                
                $(".warning_msg").removeClass('none').text(data.massage);
            }
        }
    });
});

/* Set Pass */

$("#setpass_btn").click(function(e) {
    e.preventDefault();

    $(`fieldset[name="password"]`).removeClass('error_field');
    $(`fieldset[name="password_confirm"]`).removeClass('error_field');
    $(".msg").removeClass(".success_msg");

    let password = $('input[name="password"]').val(),
        password_confirm = $('input[name="password_confirm"]').val(),
        change_key = $('input[name="change_key"]').val();

    $.ajax({
        url: '/vendor/setpass.php',
        type: 'POST',
        dataType: 'json',
        data: {
            password: password,
            password_confirm: password_confirm,
            change_key: change_key
        },
        success (data) {
            if (data.status) {
                $(".msg").removeClass('none').removeClass(".warning_msg").addClass("success_msg").text(data.massage);
                setTimeout(() => {
                    location.href = '/pages/login.php';
                }, "1000")
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function(field) {
                        $(`fieldset[name="${field}"]`).addClass('error_field');
                    });
                }

                $(".warning_msg").removeClass('none').text(data.massage);
            }
        }
    });
});
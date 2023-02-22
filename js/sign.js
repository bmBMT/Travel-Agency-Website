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
                    if ('checkbox' in data.fields) {
                        console.log('true');
                    }
                }

                $(".warning_msg").removeClass('none').text(data.massage);
            }
        }
    });
});
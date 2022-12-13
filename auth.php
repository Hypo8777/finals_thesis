<?php
session_start();

if (isset($_SESSION['user'])) {
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/auth.css">
    <script src="assets/js/lib/jquery-3.6.0.min.js"></script>
    <script src="assets/js/lib/sweetalert.min.js"></script>
    <title>Authentication</title>
</head>

<body>
    <div class="container">
        <section class="section_login">
            <h1>Smart Water Level Monitoring System</h1>
            <h3>Login</h3>
            <div class="inputs">
                <div class="input_field">
                    <label for="loginUsername">Username</label>
                    <input type="text" name="" id="loginUsername" required>
                </div>
                <div class="input_field">
                    <label for="loginPassword">Password</label>
                    <input type="password" name="" id="loginPassword" required>
                </div>
                <div class="toggle_field">
                    <input type="checkbox" name="" id="togglepass">
                    <label for="togglepass">Show Password</label>
                </div>
            </div>
            <div class="actions">
                <button id="login_ua">Login as User/Admin</button>
                <button id="login_g">Login as Guest</button>
            </div>
        </section>
    </div>
    <script>
        $('#loginUsername').on('input', () => {
            $('#loginUsername').val($('#loginUsername').val().replace(/\s+/g, ''));
        });
        $('#loginPassword').on('input', () => {
            $('#loginPassword').val($('#loginPassword').val().replace(/\s+/g, ''));
        });


        const togglepass = document.getElementById('togglepass');
        var inputPassword = document.getElementById('loginPassword');
        togglepass.addEventListener('change', () => {
            if (inputPassword.type !== "password") {
                inputPassword.type = "password";
            } else {
                inputPassword.type = "text";
            }
        });


        $('#login_ua').on('click', () => {
            const myInputs = {
                username: $('#loginUsername').val(),
                password: $('#loginPassword').val()
            }
            $.ajax({
                type: "POST",
                url: "php/controller/UserAuthentication.php",
                data: myInputs,
                // dataType: "dataType",
                success: async function(response) {
                    // console.log(await response)
                    const r = JSON.parse(await response);
                    if (r.status !== 0) {
                        swal("Login", r.msg, {
                            icon: "success",
                            button: false,
                            closeOnEsc: true
                        })
                        setTimeout(() => {
                            // window.close;
                            // window.open(r.goto);
                            window.location.replace(r.goto);
                        }, 1000);
                    } else {
                        swal("Login", r.msg, {
                            icon: "error",
                            button: false,
                            closeOnEsc: true
                        })
                    }
                }
            });
        })
        $('#login_g').on('click', () => {
            $.ajax({
                type: "GET",
                url: "php/controller/UserAuthentication.php",
                success: async function(response) {
                    const g = JSON.parse(await response);
                    swal("Login", g.msg, {
                        icon: "success",
                        button: false,
                        closeOnEsc: true
                    })
                    setTimeout(() => {
                        window.location.replace(g.goto);
                        // window.close;
                        // window.open(g.goto);
                    }, 1000);
                }
            });
        });
    </script>
</body>

</html>
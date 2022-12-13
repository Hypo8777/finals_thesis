<?php

session_start();

if (!isset($_GET['device'])) {
    header("location:../");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/index.css">
    <script src="../assets/js/lib/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/lib/chart.min.js"></script>
    <script src="../assets/js/lib/sweetalert.min.js"></script>
    <title>Edit Device</title>
</head>

<body>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1em;
            height: 100vh;
            width: 100vw;
        }

        .container form {
            padding: 1em;
            border-radius: 5px;
            width: 300px;
            display: flex;
            justify-content: stretch;
            align-items: stretch;
            flex-direction: column;
            gap: 1em;
            font-size: 1.1rem;
            width: 500px;
        }

        .inputs {
            display: flex;
            flex-direction: column;
            justify-content: stretch;
            align-items: stretch;
            gap: 1em;
        }

        .inputs .input_field {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        input,
        select {
            padding: .5em;
            border-bottom: 2px solid royalblue;
            font-size: 1.1rem;
            letter-spacing: 1.1px;
        }

        label {
            width: fit-content;
            font-size: 12px;
            font-weight: bold;
        }

        input:read-only {
            background-color: cornflowerblue;
            color: white;
        }

        button {
            padding: 1em;
            font-size: 1rem;
            font-weight: bold;
            background-color: royalblue;
            color: white;
        }

        button:hover {
            background-color: cornflowerblue;
        }

        @media only screen and (max-width: 600px) {
            .container form {
                width: 90vw;
            }
        }
    </style>
    <div class="container">
        <h1>Edit Device</h1>
        <form id="updateDevice" method="post">
            <h3>Device Information</h3>
            <div class="inputs">
                <div class="input_field">
                    <label for="">Date Added</label>
                    <input type="text" name="" id="" value="<?php echo $_GET['date_added']; ?>" readonly>
                </div>
                <div class="input_field">
                    <label for="">Device</label>
                    <input type="text" name="" id="device" value="<?php echo $_GET['device']; ?>" readonly>
                </div>
                <div class="input_field">
                    <label for="">Location</label>
                    <input type="text" name="" id="location" value="<?php echo $_GET['location']; ?>">
                </div>
                <div class="input_field">
                    <label for="">Device Status</label>
                    <select name="" id="is_active">
                        <?php
                        if ($_GET['is_active'] == 1) {
                        ?>
                            <option value="1">Online</option>
                            <option value="0">Offline</option>
                        <?php
                        } else {
                        ?>
                            <option value="0">Offline</option>
                            <option value="1">Online</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <button type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        var updateDevice = document.getElementById('updateDevice');
        updateDevice.addEventListener('submit', (e) => {
            e.preventDefault();
            console.log(document.getElementById('device').value);
            $.ajax({
                type: "POST",
                url: "../php/controller/edit_data.php",
                data: {
                    device: document.getElementById('device').value,
                    location: document.getElementById('location').value,
                    is_active: document.getElementById('is_active').value
                },
                success: async function(response) {
                    var data = JSON.parse(response);
                    if (data.status !== 0) {
                        swal("Update", data.msg, {
                            icon: "success",
                            button: false,
                            closeOnEsc: true
                        });
                        setTimeout(() => {
                            window.location.replace(data.goto);
                        }, 1000);
                    } else {
                        swal("Update", data.msg, {
                            icon: "error",
                            button: false,
                            closeOnEsc: true
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical"
    data-boxed-layout="boxed" data-card="shadow">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKK CorporateConnect</title>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png">

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-image: url('<?= base_url('images/background.jpg') ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body data-sidebartype="full" class="bg-light">

    <!-- Preloader -->
    <div class="preloader" style="display: none;">
        <img src="../assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid">
    </div>
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-4 col-lg-3">
            <div class="bg-white p-4 rounded shadow">
                <div class="text-center mb-4">
                    <img src="<?= base_url('images/logo_umt.png') ?>" class="dark-logo mb-3" alt="Logo-Dark"
                        style="max-height: 60px;">
                    <br>
                    <h2 class="fs-5 fw-bold">Welcome <br>to <br>PKK CorporateConnect</h2>
                    <p class="text-muted">Your Applicant Dashboard</p>
                </div>
                <form action="<?php echo module_url('login_user') ?>" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            <button class="btn btn-secondary" type="button" onclick="togglePassword()">
                                <span class="iconify" data-icon="mdi:eye-outline"></span>
                            </button>
                        </div>
                    </div>
                    <script>
                        function togglePassword() {
                            const passwordInput = document.getElementById('exampleInputPassword1');
                            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                            passwordInput.setAttribute('type', type);
                        }
                    </script>
                    <div class="d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary py-2 mb-3 col-md-3">Sign In</button>
                    </div>
                    <div class="text-center">
                        <p class="mb-0">New to PKK CorporateConnect</p>
                        <a class="text-primary fw-semibold text-decoration-none"
                            href="<?= module_url('permohonan/register') ?>">Create an
                            account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Import JS Files -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../assets/js/theme/app.init.js"></script>
    <script src="../assets/js/theme/theme.js"></script>
    <script src="../assets/js/theme/app.min.js"></script>
    <script src="../assets/js/theme/sidebarmenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

</body>

</html>
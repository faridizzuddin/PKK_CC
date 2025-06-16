<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical"
    data-boxed-layout="boxed" data-card="shadow">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png">

    <!-- Core Css -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Monster Bootstrap Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body data-sidebartype="full">
    <div id="main-wrapper">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-5 col-xxl-4">
                        <div class="container">

                            <div class="authentication-login min-vh-100 bg-body row justify-content-center">
                                <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4 mt-5">
                                    <h2 class="mb-1 fs-7 fw-bolder">Welcome to PKK CorporateConnect</h2>
                                    <p class="mb-7">Enter Your Dashboard</p>
                                    <div class="position-relative text-center my-4">
                                        <p
                                            class="mb-0 fs-6 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">
                                            Sign up here</p>
                                    </div>
                                    <form action="<?php echo module_url('permohonan/daftar') ?>" method="post">
                                        <div class="mb-3">
                                            <label for="nameInput" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                aria-describedby="textHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="emailInput" name="email"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-4">
                                            <label for="phoneNumber" class="form-label">No Telefon</label>
                                            <input type="text" class="form-control" id="phoneNumber" name="no_tel">
                                        </div>
                                        <div class="mb-4">
                                            <label for="passwordInput" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="passwordInput"
                                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,}$"
                                                    title="Password must contain at least 8 characters, including uppercase and lowercase letters, numbers, and special characters."
                                                    oninput="validatePassword()" name="password" required>
                                                <button class="btn btn-secondary" type="button"
                                                    onclick="togglePassword()">
                                                    <span class="iconify" data-icon="mdi:eye-outline"></span>
                                                </button>
                                            </div>
                                            <ul id="password-requirements" class="list-unstyled mt-2">
                                                <li id="length"><span class="me-2 iconify"
                                                        data-icon="mdi:close-circle-outline"></span>At least 8
                                                    characters
                                                </li>
                                                <li id="uppercase"><span class="me-2 iconify"
                                                        data-icon="mdi:close-circle-outline"></span>At least one
                                                    uppercase
                                                    letter</li>
                                                <li id="lowercase"><span class="me-2 iconify"
                                                        data-icon="mdi:close-circle-outline"></span>At least one
                                                    lowercase
                                                    letter</li>
                                                <li id="number"><span class="me-2 iconify"
                                                        data-icon="mdi:close-circle-outline"></span>At least one number
                                                </li>
                                                <li id="special"><span class="me-2 iconify"
                                                        data-icon="mdi:close-circle-outline"></span>At least one special
                                                    character</li>
                                            </ul>
                                        </div>
                                        <div class="mb-4">
                                            <label for="confirmPasswordInput" class="form-label">Re-enter
                                                Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="confirmPasswordInput"
                                                    name="confirm_password" required>
                                                <button class="btn btn-secondary" type="button"
                                                    onclick="toggleConfirmPassword()">
                                                    <span class="iconify" data-icon="mdi:eye-outline"></span>
                                                </button>
                                            </div>
                                            <div id="password-match-error" class="text-danger mt-2"
                                                style="display: none;">
                                                Passwords do not match.
                                            </div>
                                        </div>

                                        <script>
                                            function toggleConfirmPassword() {
                                                const confirmPasswordInput = document.getElementById('confirmPasswordInput');
                                                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                                confirmPasswordInput.setAttribute('type', type);
                                            }

                                            document.getElementById('confirmPasswordInput').addEventListener('input', function () {
                                                const password = document.getElementById('passwordInput').value;
                                                const confirmPassword = this.value;
                                                const errorDiv = document.getElementById('password-match-error');

                                                if (password !== confirmPassword) {
                                                    errorDiv.style.display = 'block';
                                                } else {
                                                    errorDiv.style.display = 'none';
                                                }
                                            });
                                        </script>

                                        <script>
                                            function togglePassword() {
                                                const passwordInput = document.getElementById('passwordInput');
                                                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                                passwordInput.setAttribute('type', type);
                                            }
                                        </script>

                                        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign
                                            Up</button>
                                        <div class="d-flex align-items-center">
                                            <p class="fs-6 mb-0 text-dark">Already have an Account?</p>
                                            <a class="text-primary fw-medium ms-2 text-decoration-none"
                                                href="<?= module_url('register/login') ?>">Sign
                                                In</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7 col-xxl-8 d-none d-xl-block">
                        <div class="d-none d-xl-flex align-items-center justify-content-center vh-100">
                            <img src="<?= base_url('images/logo_umt.png') ?>" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function validatePassword() {
                    // Get the password value from the input field
                    const password = document.getElementById('passwordInput').value;

                    // Object with keys as the id of the requirement and value as a boolean
                    // indicating whether the password fulfills the requirement
                    const checks = {
                        length: password.length >= 8,
                        uppercase: /[A-Z]/.test(password),
                        lowercase: /[a-z]/.test(password),
                        number: /\d/.test(password),
                        special: /[!@#$%^&*]/.test(password)
                    };

                    // Loop through the object and update the HTML accordingly
                    Object.entries(checks).forEach(([id, passed]) => {
                        const item = document.getElementById(id);
                        const icon = item.querySelector('.iconify');

                        // If the requirement is fulfilled, hide the list item
                        if (passed) {
                            item.style.display = "none";
                        } else { // If the requirement is not fulfilled, show the list item
                            item.style.display = "list-item";
                            // Update the icon and text color to indicate failure
                            icon.setAttribute('data-icon', 'mdi:close-circle-outline');
                            item.classList.add('text-danger');
                            item.classList.remove('text-success');
                            icon.classList.add('text-danger');
                            icon.classList.remove('text-success');
                        }
                    });
                }
            </script>


            <style>
                #password-requirements li {
                    transition: color 0.3s ease;
                }

                .iconify {
                    transition: color 0.3s ease;
                    font-size: 1.2rem;
                }
            </style>
        </div>
    </div>

    <!-- Import Js Files -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../assets/js/theme/app.init.js"></script>
    <script src="../assets/js/theme/theme.js"></script>
    <script src="../assets/js/theme/app.min.js"></script>
    <script src="../assets/js/theme/sidebarmenu.js"></script>

    <!-- Iconify for icons -->
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>
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
    <!-- Preloader -->
    <!-- <div class="preloader" style="display: none;">
        <img src="../assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid">
    </div> -->
    <div id="main-wrapper" class="mb-4">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-5 col-xxl-4">
                        <div class="authentication-login min-vh-100 bg-body row justify-content-center">
                            <div class="col-12">
                                <a href="../main/index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                                    <img src="../assets/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark">
                                    <img src="../assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light"
                                        style="display: none;">
                                </a>
                            </div>
                            <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                                <h2 class="mb-1 fs-7 fw-bolder">Welcome to PKK CorporateConnect</h2>
                                <p class="mb-7">Your Admin Dashboard</p>
                                <!-- <div class="row">
                                    <div class="col-6 mb-2 mb-sm-0">
                                        <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8"
                                            href="javascript:void(0)" role="button">
                                            <img src="../assets/images/svgs/google-icon.svg" alt=""
                                                class="img-fluid me-2" width="18" height="18">
                                            <span class="flex-shrink-0">with Google</span>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8"
                                            href="javascript:void(0)" role="button">
                                            <img src="../assets/images/svgs/facebook-icon.svg" alt=""
                                                class="img-fluid me-2" width="18" height="18">
                                            <span class="flex-shrink-0">with FB</span>
                                        </a>
                                    </div>
                                </div> -->
                                <div class="position-relative text-center my-4">
                                    <p
                                        class="mb-0 fs-6 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">
                                        or sign
                                        Up
                                        with</p>
                                    <!-- <span
                                        class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span> -->
                                </div>
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputtext"
                                            aria-describedby="textHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <a href="./authentication-login.html"
                                        class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</a>
                                    <div class="d-flex align-items-center">
                                        <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                                        <a class="text-primary fw-medium ms-2" href="./authentication-login.html">Sign
                                            In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-xxl-8 d-none d-xl-block">
                        <div class="d-none d-xl-flex align-items-center justify-content-center h-100">
                            <img src="../assets/images/backgrounds/user-login.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function handleColorTheme(e) {
                    $("html").attr("data-color-theme", e);
                    $(e).prop("checked", !0);
                }
            </script>
            <button
                class="btn btn-info p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
                type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
                <iconify-icon icon="solar:settings-linear" class="fs-7"></iconify-icon>
            </button>

            <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                    <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
                        Settings
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body h-n80" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: -16px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                                    <div class="simplebar-content" style="padding: 16px;">
                                        <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

                                        <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                            <input type="radio" class="btn-check light-layout" name="theme-layout"
                                                id="light-layout" autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary" for="light-layout">
                                                <iconify-icon icon="solar:sun-2-bold"
                                                    class="icon fs-7 me-2"></iconify-icon>Light</label>

                                            <input type="radio" class="btn-check dark-layout" name="theme-layout"
                                                id="dark-layout" autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary" for="dark-layout"><iconify-icon
                                                    icon="solar:moon-linear"
                                                    class="icon fs-7 me-2"></iconify-icon>Dark</label>
                                        </div>

                                        <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
                                        <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                            <input type="radio" class="btn-check" name="direction-l" id="ltr-layout"
                                                autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary" for="ltr-layout">
                                                <iconify-icon icon="solar:align-left-linear"
                                                    class="icon fs-7 me-2"></iconify-icon>LTR</label>

                                            <input type="radio" class="btn-check" name="direction-l" id="rtl-layout"
                                                autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary" for="rtl-layout"><iconify-icon
                                                    icon="solar:align-right-linear"
                                                    class="icon fs-7 me-2"></iconify-icon>RTL</label>
                                        </div>

                                        <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

                                        <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete"
                                            role="group">
                                            <input type="radio" class="btn-check" name="color-theme-layout"
                                                id="Blue_Theme" autocomplete="off">
                                            <label
                                                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                                                onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="BLUE_THEME">
                                                <div
                                                    class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                                                    <iconify-icon icon="tabler:check"
                                                        class="text-white d-flex icon fs-5"></iconify-icon>
                                                </div>
                                            </label>

                                            <input type="radio" class="btn-check" name="color-theme-layout"
                                                id="Aqua_Theme" autocomplete="off">
                                            <label
                                                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                                                onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="AQUA_THEME">
                                                <div
                                                    class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                                                    <iconify-icon icon="tabler:check"
                                                        class="text-white d-flex icon fs-5"></iconify-icon>
                                                </div>
                                            </label>

                                            <input type="radio" class="btn-check" name="color-theme-layout"
                                                id="Purple_Theme" autocomplete="off">
                                            <label
                                                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                                                onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="PURPLE_THEME">
                                                <div
                                                    class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                                                    <iconify-icon icon="tabler:check"
                                                        class="text-white d-flex icon fs-5"></iconify-icon>
                                                </div>
                                            </label>

                                            <input type="radio" class="btn-check" name="color-theme-layout"
                                                id="green-theme-layout" autocomplete="off">
                                            <label
                                                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                                                onclick="handleColorTheme('Green_Theme')" for="green-theme-layout"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="GREEN_THEME">
                                                <div
                                                    class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                                                    <iconify-icon icon="tabler:check"
                                                        class="text-white d-flex icon fs-5"></iconify-icon>
                                                </div>
                                            </label>

                                            <input type="radio" class="btn-check" name="color-theme-layout"
                                                id="cyan-theme-layout" autocomplete="off">
                                            <label
                                                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                                                onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="CYAN_THEME">
                                                <div
                                                    class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                                                    <iconify-icon icon="tabler:check"
                                                        class="text-white d-flex icon fs-5"></iconify-icon>
                                                </div>
                                            </label>

                                            <input type="radio" class="btn-check" name="color-theme-layout"
                                                id="orange-theme-layout" autocomplete="off">
                                            <label
                                                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                                                onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="ORANGE_THEME">
                                                <div
                                                    class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                                                    <iconify-icon icon="tabler:check"
                                                        class="text-white d-flex icon fs-5"></iconify-icon>
                                                </div>
                                            </label>
                                        </div>

                                        <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
                                        <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                            <div>
                                                <input type="radio" class="btn-check" name="page-layout"
                                                    id="vertical-layout" autocomplete="off">
                                                <label class="btn p-9 btn-outline-primary"
                                                    for="vertical-layout"><iconify-icon
                                                        icon="solar:sidebar-minimalistic-linear"
                                                        class="icon fs-7 me-2"></iconify-icon>Vertical</label>
                                            </div>
                                            <div>
                                                <input type="radio" class="btn-check" name="page-layout"
                                                    id="horizontal-layout" autocomplete="off">
                                                <label class="btn p-9 btn-outline-primary"
                                                    for="horizontal-layout"><iconify-icon
                                                        icon="solar:airbuds-case-minimalistic-linear"
                                                        class="icon fs-7 me-2"></iconify-icon>Horizontal</label>
                                            </div>
                                        </div>

                                        <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

                                        <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                            <input type="radio" class="btn-check" name="layout" id="boxed-layout"
                                                autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary" for="boxed-layout"><iconify-icon
                                                    icon="solar:align-horizonta-spacing-linear"
                                                    class="icon fs-7 me-2"></iconify-icon>Boxed</label>

                                            <input type="radio" class="btn-check" name="layout" id="full-layout"
                                                autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary" for="full-layout"><iconify-icon
                                                    icon="solar:align-vertical-spacing-linear"
                                                    class="icon fs-7 me-2"></iconify-icon>Full</label>
                                        </div>

                                        <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
                                        <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                            <a href="javascript:void(0)" class="fullsidebar">
                                                <input type="radio" class="btn-check" name="sidebar-type"
                                                    id="full-sidebar" autocomplete="off">
                                                <label class="btn p-9 btn-outline-primary"
                                                    for="full-sidebar"><iconify-icon icon="solar:mirror-left-linear"
                                                        class="icon fs-7 me-2"></iconify-icon>Full</label>
                                            </a>
                                            <div>
                                                <input type="radio" class="btn-check " name="sidebar-type"
                                                    id="mini-sidebar" autocomplete="off">
                                                <label class="btn p-9 btn-outline-primary"
                                                    for="mini-sidebar"><iconify-icon icon="solar:mirror-right-linear"
                                                        class="icon fs-7 me-2"></iconify-icon>Collapse</label>
                                            </div>
                                        </div>

                                        <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

                                        <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                            <input type="radio" class="btn-check" name="card-layout"
                                                id="card-with-border" autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary"
                                                for="card-with-border"><iconify-icon
                                                    icon="solar:quit-full-screen-square-linear"
                                                    class="icon fs-7 me-2"></iconify-icon>Border</label>

                                            <input type="radio" class="btn-check" name="card-layout"
                                                id="card-without-border" autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary"
                                                for="card-without-border"><iconify-icon
                                                    icon="solar:minimize-square-2-linear"
                                                    class="icon fs-7 me-2"></iconify-icon>Shadow</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 330px; height: 1087px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar"
                            style="width: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar"
                            style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../assets/js/theme/app.init.js"></script>
    <script src="../assets/js/theme/theme.js"></script>
    <script src="../assets/js/theme/app.min.js"></script>
    <script src="../assets/js/theme/sidebarmenu.js"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>


</body>

</html>
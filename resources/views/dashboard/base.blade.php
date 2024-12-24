<!DOCTYPE html>
<!-- Template Name: DashCode - HTML, React, Vue, Tailwind Admin Dashboard Template Author: Codeshaper Website: https://codeshaper.net Contact: support@codeshaperbd.net Like: https://www.facebook.com/Codeshaperbd Purchase: https://themeforest.net/item/dashcode-admin-dashboard-template/42600453 License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project. -->
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Dashcode - HTML Template</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/favicon.svg') }}">
    <!-- BEGIN: Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- END: Google Font -->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/SimpleBar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!-- END: Theme CSS-->
    <script src="{{ asset('assets/js/settings.js') }}" sync></script>
</head>

<body class=" font-inter dashcode-app" id="body_class">
    <!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
    <main class="app-wrapper">
        <!-- BEGIN: Sidebar -->
        <!-- BEGIN: Sidebar -->
        <x-dashboard.sidebare></x-dashboard.sidebare>
        <!-- End: Sidebar -->
        <!-- End: Sidebar -->
        <!-- BEGIN: Settings -->

        <x-dashboard.settings></x-dashboard.settings>

        <!-- End: Settings -->
        <div class="flex flex-col justify-between min-h-screen">
            <div>
                <!-- BEGIN: Header -->
                <!-- BEGIN: Header -->
                <x-dashboard.header></x-dashboard.header>
                <!-- END: Header -->
                <!-- END: Header -->
                <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]"
                    id="content_wrapper">
                    <div class="page-content">
                        <div class="transition-all duration-150 container-fluid" id="page_layout">
                            <div id="content_layout">




                                <!-- BEGIN: Breadcrumb -->
                                <x-dashboard.breadcrumb></x-dashboard.breadcrumb>
                                <!-- END: BreadCrumb -->

                                <div class=" space-y-5">
                                    @yield("content")
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BEGIN: Footer For Desktop and tab -->
            <x-dashboard.footer></x-dashboard.footer>
            <!-- END: Footer For Desktop and tab -->
            <x-dashboard.navbottom></x-dashboard.navbottom>
        </div>
    </main>
    <!-- scripts -->
    <!-- Core Js -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/tw-elements-1.0.0-alpha13.min.js"></script>
    <script src="assets/js/SimpleBar.js"></script>
    <script src="assets/js/iconify.js"></script>
    <!-- Jquery Plugins -->

    <!-- app js -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>

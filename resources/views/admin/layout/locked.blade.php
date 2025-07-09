<!DOCTYPE html>
<html lang="en" class="h-100">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Central Medical Care</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="/uploads/settings/2024/03/22/202403221135341389796679_settings.png">
        <link href="/assets/css/main.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    </head>

    <body class="h-100">
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center align-items-center"><!-- height: 20%; -->
                    <div class="col-md-6">
                        <div class="text-center">
                            <a href="{{ route('admin.dashboard.index') }}"><img width="100%" src="/assets/images/central_logo-full.png" alt=""></a>
                        </div>
                    </div>
                </div>
                @yield('contents')
            </div>
        </div>


        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="/assets/js/vue.app.js"></script>
        <script src="/assets/vendor/global/global.min.js"></script>
        <script src="/assets/js/custom.min.js"></script>
        <script src="/assets/js/deznav-init.js"></script>

    </body>

</html>

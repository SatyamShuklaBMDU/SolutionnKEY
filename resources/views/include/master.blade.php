<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <title>Solution Key</title>
    <style>
        .content-wrapper {
            width: 80%;
            float: right;
        }

        .header_iner {
            padding: 2px !important;
            margin-left: 19% !important;
        }

        .align-items-center {
            align-items: center !important;
        }

        .footer_part {
            padding-bottom: 0px !important;
            padding-top: 0px !important;
            position: fixed !important;
        }
    </style>
    @include('include.head')
    @yield('style-area')

<body>
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include('include.header')
        <div class="page-body-wrapper">
            @include('include.sidebar')
            <div class="page-body">
                @yield('content-area')
            </div>
        </div>
        @include('include.footer')
    </div>
    @yield('script-area')
    @include('include.foot')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.has-arrow').click(function() {
                $(this).next('.submenu').slideToggle();
            });
        });
    </script>
</body>

</html>

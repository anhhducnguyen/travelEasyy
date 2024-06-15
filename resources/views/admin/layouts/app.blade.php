<!-- admin.layouts.app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Travel Easy Admin</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo_mini.png') }}" />
</head>
<body>
    <div class="container-scroller">
        @include('admin.layouts.sidebar')
        <div class="container-fluid page-body-wrapper">
        @include('admin.layouts.header')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content') <!-- Đây là vị trí nội dung từ các view khác sẽ được bổ sung vào -->
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard_2.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard_1.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/js/address.js') }}"></script>
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/clearForm.js') }}"></script>   
</body>
</html>

<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="text-dark order-2 order-md-1">
            <a class="text-dark-75 text-hover-info"><span class="text-muted font-weight-bold mr-2">2025©</span> {{ \DB::table('system_settings')->first()->application_name; }} </a>
        </div>
        <div class="nav nav-dark">
            <a class="nav-link text-hover-info">
                Application Version {{ \DB::table('system_settings')->first()->application_version; }} - Laravel 12
            </a>
        </div>
    </div>
</div>
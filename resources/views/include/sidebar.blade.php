<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <div class="space">
                <a href="#"><span style="width:20px;"><img src="{{ asset('img/logo.jpg') }}"></span></a>
            </div>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="mm-active">
                <a href="{{route('dashboard')}}">
                    <div class="icon">
                        <i class="fa fa-home" style="color:#033496;"></i>
                    </div>
                    <span style="font-size:15px;color:#033496;"><b>Dashboard</b></span>
                </a>
            </li>
            @if(auth()->check() && auth()->user()->hasPermission('usermanagement'))
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <i class="fa fa-address-card" style="font-size: 22px; color:#033496;"></i>
                    <span style="font-size: 15px; color: #033496"><b>User Management</b></span>
                </a>
                <ul>
                    <li><a href="{{ route('add-users') }} "><span style="color: #033496;">Add Accounts</span></a></li>
                </ul>
                <ul>
                    <li><a href="{{ route('all-users') }} "><span style="color: #033496;">All Accounts</span></a></li>
                </ul>
            </li>
            @endif
            @if(auth()->check() && auth()->user()->hasPermission('servicemanagement'))
            <li class>
                <a class="has-arrow" href="{{ route('service') }}" aria-expanded="false">
                    <i class="fa fa-address-book" style="color: #033496;"></i>
                    <span style="font-size: 13px;color: #033496;"><b>Service Management</b></span>
                </a>
                <ul>
                    <li><a href="{{ route('service') }}"><span style="color: #033496;"> All Services</span></a></li>
                </ul>
                <ul>
                    <li><a href="{{ route('service-create') }}"><span style="color: #033496;">Add Services</span></a></li>
                </ul>
            </li>
            @endif
            @if(auth()->check() && auth()->user()->hasPermission('professionalmanagement'))
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <i class="fa fa-folder-open" style="color: #033496;"></i>
                    <span style="font-size: 12px; color: #033496"><b>Professional Management</b></span>
                </a>
                <ul>
                    <li><a href="pr.html"><span style="color: #033496;">Professionals</span></a></li>
                </ul>
            </li>
            @endif
            @if(auth()->check() && auth()->user()->hasPermission('customermanagement'))
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <i class="fa fa-users" style="color: #033496;"></i>
                    <span style="font-size: 13px; color: #033496"><b>Customer Management</b></span>
                </a>
                <ul>
                    <li><a href="{{route('customer-show')}}"><span style="color: #033496;"> Details</span></a></li>
                </ul>
            </li>
            @endif
            @if(auth()->check() && auth()->user()->hasPermission('booking'))
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <i class="fa fa-user-circle" style="color: #033496;"></i>
                    <span style="font-size: 13px;color: #033496"><b>Booking & Scheduling:</b></span>
                </a>
                <ul>
                    <li><a href="booking.html"><span style="color: #033496;"> Bookings</span></a>
                    </li>
                </ul>
            </li>
            @endif
            @if(auth()->check() && auth()->user()->hasPermission('payment'))
            <li class="mm-active">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <i class="fa fa-google-wallet" style="color: #033496;"></i>
                    <span style="font-size: 14px; color: #033496"><b>Payment & Invoicing</b></span>
                </a>
                <ul>
                    <li><a href="#"><span style="color: #033496;"> Payments</span></a></li>
                </ul>
            </li>
            @endif
            @if(auth()->check() && auth()->user()->hasPermission('feedback'))
            <li>
                <a href="{{ route('feedback') }}">
                    <i class="fa fa-exclamation" style="color: #033496;"></i>
                    <span style="font-size: 14px;color: #033496"><b>Feedback & Reviews</b></span>
                </a>
            </li>
            @endif
            @if(auth()->check() && auth()->user()->hasPermission('complaint'))
            <li>
                <a href="{{ route('complaint') }}">
                    <i class="fa fa-exclamation" style="color: #033496;"></i>
                    <span style="font-size: 14px;color: #033496"><b>Complaints</b></span>
                </a>
            </li>
            @endif
            @if(auth()->check() && auth()->user()->hasPermission('analytic'))
            <li>
                <a href="#">
                    <i class="fa fa-arrows" style="color: #033496;"></i>
                    <span style="font-size: 14px;color: #033496"><b>Analytics & Reporting</b></span>
                </a>
            </li>
            @endif
        </ul>
    </nav>
</ul>

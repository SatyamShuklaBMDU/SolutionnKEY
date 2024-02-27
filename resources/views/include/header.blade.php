<div class="header_iner d-flex justify-content-between align-items-center">
    <div class="sidebar_icon d-lg-none">
        <i class="ti-menu"></i>
    </div>
    <div class="serach_field-area">
        <div class="search_inner">
            <form action="#">
                <div class="search_field">
                    <input type="text" placeholder="Search here...">
                </div>
                <button type="submit"><img src="{{ asset('img/icon/icon_search.svg') }}" alt></button>
            </form>
        </div>
    </div>
    <div class="header_right d-flex justify-content-between align-items-center">
        <div class="header_notification_warp d-flex align-items-center">
            <li>
                <a href="#"> <img src="{{ asset('img/icon/bell.svg') }}" alt> </a>
            </li>
            <li>
                <a href="#"> <img src="{{ asset('img/icon/msg.svg') }}" alt> </a>
            </li>
        </div>
        <div class="profile_info">
            <img src="{{ asset('img/client_img.png') }}" alt="#">
            <div class="profile_info_iner">
                <p>Welcome Admin!</p>
                <h5>Solutions key</h5>
                <div class="profile_info_details">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                        <i class="ti-shift-left"></i>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="sidebar">
        <a class="menu-item @if($page == 'home') active @endif" href="{{route('index')}}" >
            <span><i class="uil uil-home"></i></span>
            <h3>Home</h3>
        </a>
        <a class="menu-item @if($page == 'campaign') active @endif" href="{{route('campaign')}}" >
            <span><i class="uil uil-compass"></i></span>
            <h3>Campaign</h3>
        </a>
        <a class="menu-item @if($page == 'explore') active @endif" href="{{route('explorepage')}}">
            <span><i class="uil uil-compass"></i></span>
            <h3>Explore</h3>
        </a>
        <a class="menu-item @if($page == 'activity') active @endif"  href="{{route('activity')}}">
            <span><i class="uil uil-compass"></i></span>
            <h3>Activity</h3>
        </a>
        <a class="menu-item @if($page == 'notification') active @endif"  id="notifications" href="{{route('notification')}}">
            <span><i class="uil uil-bell"><small class="notification-count">9+</small></i></span>
            <h3>Notification</h3>
            <!--------------- NOTIFICATION POPUP --------------->
            {{-- <div class="notifications-popup">
                <div>
                    <div class="profile-photo">
                        <img src="{{asset('images/profile-2.jpg')}}"">
                    </div>
                    <div class="notification-body">
                        <b>Keke Benjamin</b> accepted your friend request
                        <small class="text-muted">2 Days Ago</small>
                    </div>
                </div>
                <div>
                    <div class="profile-photo">
                        <img src="{{asset('images/profile-3.jpg')}}">
                    </div>
                    <div class="notification-body">
                        <b>John Doe</b> commented on your post
                        <small class="text-muted">1 Hour Ago</small>
                    </div>
                </div>
                <div>
                    <div class="profile-photo">
                        <img src="{{asset('images/profile-4.jpg')}}">
                    </div>
                    <div class="notification-body">
                        <b>Marry Oppong</b> and <b>283 Others</b> liked your post
                        <small class="text-muted">4 Minutes Ago</small>
                    </div>
                </div>
                <div>
                    <div class="profile-photo">
                        <img src="{{asset('images/profile-5.jpg')}}">
                    </div>
                    <div class="notification-body">
                        <b>Doris Y. Lartey</b> commented on a post you are tagged in
                        <small class="text-muted">2 Days Ago</small>
                    </div>
                </div>
                <div>
                    <div class="profile-photo">
                        <img src="{{asset('images/profile-6.jpg')}}">
                    </div>
                    <div class="notification-body">
                        <b>Keyley Jenner</b> commented on a post you are tagged in
                        <small class="text-muted">1 Hour Ago</small>
                    </div>
                </div>
                <div>
                    <div class="profile-photo">
                        <img src="{{asset('images/profile-7.jpg')}}">
                    </div>
                    <div class="notification-body">
                        <b>Jane Doe</b> commented on your post
                        <small class="text-muted">1 Hour Ago</small>
                    </div>
                </div>
            </div> --}}
            <!--------------- END NOTIFICATION POPUP --------------->
        </a>
        <a class="menu-item @if($page == 'trending') active @endif" id="messages-notifications" href="{{route('trending')}}">
            <span><i class="uil uil-envelope-alt"><small class="notification-count">6</small></i></span>
            <h3>Trending</h3>
        </a>
        <a class="menu-item @if($page == 'settings') active @endif" href="{{route('setting')}}">
            <span><i class="uil uil-bookmark"></i></span>
            <h3>Setting</h3>
        </a>
        <a class="menu-item" >
            <span><i class="uil uil-chart-line"></i></span>
            <h3>Analytics</h3>
        </a>
    </div>
</div>

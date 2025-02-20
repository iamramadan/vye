<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @auth
        @php
        $username = Auth::user()->username
        @endphp
        @endauth
    @section('page-title')
            my social media site
    @show</title>
    <style>


    </style>
    @livewireStyles
        @stack('links')
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <!-- IconScout CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
    <nav>
        <div class="container">
            <h2 class="logo">
               <a href="{{route('index')}}">Vie</a>
            </h2>
            <div class="search-bar">
                {{-- <i class="uil uil-search"></i> --}}
                <form action="{{route('search')}}" method="POST">
                    @csrf
                    <input type="search" name="keyword" placeholder="Search for creators, inspirations, and projects">
                </form>
            </div>
            <div class="create">
                @auth

                <label class="btn btn-primary createBtn">Create</label>
                {{-- <form action="{{route('logout')}}" method='post'> @csrf <button class="btn btn-primary createBtn">Logout</button></form> --}}
                @endauth
                @guest
                <a class="btn btn-primary" href="{{route('sign-up')}}" >Sign Up</a>
                <a class="btn btn-primary" href="{{route('sign-in')}}">Sign In</a>
                @endguest
                @if (count($profile) == 1)

                <a href="{{route('profile.index')}}" class="profile-photo">
                    <img src="{{asset('storage/files/'.$profile[0]->profile_image)}}" alt="">
                </a>
                @else
                <a href="{{route('profile.index')}}" class="profile-photo">
                    <img src="" alt="">
                </a>
                @endif
            </div>
        </div>
    </nav>

    <!-------------------------------- MAIN ----------------------------------->
    <main>
        <div class="container">
            <!----------------- LEFT -------------------->
            <div class="left">
                @auth
                <a class="profile" href="{{route('profile.index')}}">
                    <div class="profile-photo">
                        @if (count($profile) == 1)
                    <img src="{{asset('storage/files/'.$profile[0]->profile_image)}}" alt="">
                @else
                    <img src="" alt="">
                @endif
                    </div>
                    <div class="handle">
                        <h4>{{$username}}</h4>
                        <p class="text-muted">
                            {{'@'.$username}}
                        </p>
                    </div>
                </a>
                @endauth
            @section('sidebar')

            {{-- <div class="sidebar">
                <a class="menu-item active" href="{{route('index')}}">
                    <span><i class="uil uil-home"></i></span>
                    <h3>Home</h3>
                </a>
                <a class="menu-item">
                    <span><i class="uil uil-compass"></i></span>
                    <h3>Campaign</h3>
                </a>
                <a class="menu-item">
                    <span><i class="uil uil-compass"></i></span>
                    <h3>Explore</h3>
                </a>
                <a class="menu-item">
                    <span><i class="uil uil-compass"></i></span>
                    <h3>Activity</h3>
                </a>
                <a class="menu-item"  id="notifications">
                    <span><i class="uil uil-bell"><small class="notification-count">9+</small></i></span>
                    <h3>Notification</h3>
                    <!--------------- NOTIFICATION POPUP --------------->
                    <div class="notifications-popup">
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
                    </div>
                    <!--------------- END NOTIFICATION POPUP --------------->
                </a>
                <a class="menu-item" id="messages-notifications">
                    <span><i class="uil uil-envelope-alt"><small class="notification-count">6</small></i></span>
                    <h3>Trending</h3>
                </a>
                <a class="menu-item">
                    <span><i class="uil uil-bookmark"></i></span>
                    <h3>Setting</h3>
                </a>
                <a class="menu-item">
                    <span><i class="uil uil-chart-line"></i></span>
                    <h3>Analytics</h3>
                </a>
                <a class="menu-item" id="popup">
                    <span><i class="uil uil-palette"></i></span>
                    <h3>Theme</h3>
                </a>
                <a class="menu-item">
                    <span><i class="uil uil-setting"></i></span>
                    <h3>Setting</h3>
                </a>
            </div> --}}
            @livewire('frontpage',['page'=>$page])
            @show
                <!----------------- SIDEBAR -------------------->
                <!----------------- END OF SIDEBAR -------------------->
            </div>

            <!----------------- MIDDLE -------------------->
            @yield('main')
             <!----------------- END OF MIDDLE -------------------->

            <!----------------- RIGHT -------------------->
            @yield('left-bar')
            <!----------------- END OF RIGHT -------------------->
        </div>
    </main>
    <!----------------- THEME CUSTOMIZATION -------------------->
    @livewire('feedmodal')
    @stack('modal')
    @livewire('creatormodal')
    <script src="https://releases.flowplayer.org/7.2.7/flowplayer.min.js"></script>
    <script>
    const mod = document.getElementById("create-modal");
    const modalContent = document.querySelector(".content");
    const createBtn = document.querySelector(".createBtn");
    const closeBtn = document.getElementsByClassName("closeBtn");

    createBtn.onclick = function() {
        mod.style.display = "block";
    }

    window.onclick = function(event) {
        if (event.target == mod) {
            mod.style.display = "none";
        }
    }

    
    </script>
   @livewireScripts

    <script src="{{asset('js/index.js')}}"></script>
    <script>
            $('.image').dropify();
    </script>
    @stack('scripts')

</body>
</html>

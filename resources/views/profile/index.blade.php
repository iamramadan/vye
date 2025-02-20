    @auth
    @php
    $username = Auth::user()->username
@endphp
    @endauth
    {{-- @dd($profile) --}}
@extends('layout.main')
    @section('page-title','profile')
    @push('links')
    <style>
        .grid-item { width: 200px; }
        .media-item {
        position: relative;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background: #fafafa;
    }
    .w-100{
        width: 100%;
        object-fit: cover;
    }
    .media-item img, .media-item video, .media-item audio {
        width: 100%;
        height: 30vh;
        display: block;
        object-fit: cover;
    }

    .media-item .media-type {
        position: absolute;
        bottom: 5px;
        right: 5px;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        font-size: 12px;
        padding: 2px 6px;
        border-radius: 4px;
    }
    </style>
<link rel="stylesheet" href="{{asset('profile/style.css')}}">
    @endpush
</head>
<body>
    @section('main')
    <div class="profile-container">
        <header>
            {{-- @dd($content) --}}
            <div class="profile-pic-container">
                <div class="profile-pic">
                    @if (count($profile))
                    <img src="{{asset('storage/files'.'/'.$profile[0]->profile_image)}}" alt="Profile Picture" id="profileImage">
                    @else
                    <img src="https://picsum.photos/150" alt="Profile Picture" id="profileImage">
                    @endif
                </div>
                <button class="updateBtn">Update</button>
            </div>
            <div class="profile-info">
                <h1 class="username">{{ucwords($username)}}</h1>
                @if(count($profile) != 0)
                <p class="bio">{{$profile[0]->bio}}</p>
                @else
                <p class="bio">none</p>
                @endif
                <div class="stats">
                    <div><span class="stat-number">{{count($content)}}</span> posts</div>
                    <div><span class="stat-number">300</span> followers</div>
                    <div><span class="stat-number">180</span> following</div>
                </div>
            </div>

        </header>
        {{-- @dd($campaigns) --}}
        @livewire('profiledisplay', ['content' => $content,'campaign'=> $campaigns])
        {{-- <div class=" flex">
            <h4>Post</h4>
            <h4>Campaigns</h4>
            <h4>Activity</h4>
        </div>

        <section class="gallery">
            @foreach ($content as $content)
            @php
                $filetype = explode('.',$content->fileName);
                $p= explode(' ',$content->description);
                $post = $content->id;
            @endphp
            @if ($filetype[1] != 'mp4')
            <a href="{{route('feed',['thepage'=>'profile','name'=>Auth::user()->username])}}#{{$post}}" class="gallery-item" ><x-image name="{{$content->fileName}}" alt="{{$content->description}}"/></a>
            @else
            <a class="gallery-item" href="{{route('feed',['thepage'=>'profile','name'=>Auth::user()->username])}}#{{$post}}"  ><video src="{{asset('storage/files/'.$content->fileName)}}"style="object-fit:cover;
                                    width: 100%;
                                    height: 100%;" no-controls></video></a>
            @endif

            @endforeach

        </section> --}}
    </div>
    @endsection
@push('modal')
<div id="modal" class="profile-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form id="form" action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container" style="width:340px;">
                <small>optional</small>
                <input name="profile_image" type="file" class="dropify" data-height="100" />
              </div>
            <div style="margin-top: 10px">
                <label for="bio" >Your bio        <small style="font-weight: 100;">optional</small></label>
                <textarea  rows="4" id="bio" style="width:340px; border: rgb(224, 213, 213) 2px solid;" name="bio" class=""></textarea>
            </div>
            <button type="submit" class="btn my-1 btn-primary">Submit</button>
        </form>
    </div>
</div>
@endpush
@push('scripts')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script>
    $('.grid').masonry({
  // options
  itemSelector: '.grid-item',
  columnWidth: 100
});
</script>
    <script>
        $('.dropify').dropify();
    </script>
    <script src="{{asset('js/app.js')}}"></script>
@endpush

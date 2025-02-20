@extends('layout.main')
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
            <button class="btn btn-primary">Follow</button>
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

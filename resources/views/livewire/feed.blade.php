<div>

    <div class="middle" >
        {{-- @livewire('selectcampaign') --}}
        <!----------------- STORIES -------------------->
        @if ($page != 'profilefeed')
        <div class="stories">
            <div class="story">
                <div class="profile-photo" style="background:url('{{asset('/images/profile-8.jpg')}}')">
                    <img src="{{asset('images/profile-8.jpg')}}">
                </div>
                <p class="name">Your Story</p>
            </div>
            <div class="story">
                <div class="profile-photo">
                    <img src="{{asset('images/profile-9.jpg')}}">
                </div>
                <p class="name">Lila James</p>
            </div>
            <div class="story">
                <div class="profile-photo">
                    <img src="{{asset('images/profile-10.jpg')}}">
                </div>
                {{-- <img src="{{asset('images/profile-10.jpg')}}"> --}}
                <p class="name">Winnie Haley</p>
            </div>
            <div class="story">
                <div class="profile-photo">
                    <img src="{{asset('images/profile-11.jpg')}}">
                </div>
                <p class="name">Daniel Bale</p>
            </div>
            <div class="story">
                <div class="profile-photo">
                    <img src="{{asset('images/profile-12.jpg')}}">
                </div>
                <p class="name">Jane Doe</p>
            </div>
            <div class="story">
                <div class="profile-photo">
                    <img src="{{asset('images/profile-13.jpg')}}">
                </div>
                <p class="name">Tina White</p>
            </div>
        </div>
        @endif

       <!----------------- END OF STORIES -------------------->
       {{-- <form action="" class="create-post">
           <div class="profile-photo">
               <img src="{{asset('images/profile-1.jpg')}}">
           </div>
           <input type="text" placeholder="What's on your mind, Diana ?" id="create-post">
           <input type="submit" value="Post" class="btn btn-primary">
       </form> --}}
       <!----------------- FEEDS -------------------->
       <div class="feeds">
           <!----------------- FEED 1 -------------------->
           @foreach ($campaigncontent as $content)
           @php
               $d = explode(' ',$content->description)
           @endphp
           <div class="feed" id={{$content->id}}>
            <div class="head">
                <div class="user">
                    <div class="profile-photo">
                        <x-image name="{{getvalue($content->contestants_id,'profile_image','profile')}}"/>
                    </div>
                    <div class="info">
                        <h3>{{getvalue($content->contestants_id,'username')}}</h3>
                        <small>Dubai, 15 Minutes Ago</small>
                    </div>
                </div>
                <span class="edit">
                    <i class="uil uil-ellipsis-h"></i>
                </span>
            </div>
        @php
        $filetype = explode('.',$content->fileName)
        @endphp
            @if($filetype[1] != 'mp4')
            <div class="photo" style="max-height:500px; object-fit: fill;">
                <x-image name="{{$content->fileName}}" class="w-100" />
            </div>
                {{-- @if ($page == 'profilefeed')
                @else
                <div class="photo" style="max-height:500px; object-fit: fill;" wire:click="tomodal({{$content->id}})" >
                    <x-image name="{{$content->fileName}}"/>
                </div>
                @endif --}}

            @else
            <div >
                <video src="{{asset('storage/files/'.$content->fileName)}} " class="video"
                    style=" width: 100%;
                max-height:500px;
                object-fit: fill;
                border-radius: 1rem;
                margin-top: 10px;"
                controls></video>
                {{-- @if ($page == 'profilefeed')
                @else
                <video src="{{asset('storage/files/'.$content->fileName)}} " class="video"  wire:click="tomodal({{$content->id}})"
                    style=" width: 100%;
                max-height:500px;
                object-fit: fill;
                border-radius: 1rem;
                margin-top: 10px;"
                controls></video>
                @endif --}}

            </div>
            @endif

            <div class="action-buttons">
                <div class="interaction-buttons">
                    <span><i class="uil uil-heart"></i></span>
                    <span><i class="uil uil-comment-dots"></i></span>
                    <span><i class="uil uil-share-alt"></i></span>
                </div>
                <div class="bookmark">
                    <span><i class="uil uil-bookmark-full"></i></span>
                </div>
            </div>

            <div class="liked-by">
                <span><img src="{{asset('images/profile-10.jpg')}}"></span>
                <span><img src="{{asset('images/profile-4.jpg')}}"></span>
                <span><img src="{{asset('images/profile-15.jpg')}}"></span>
                <p>Liked by <b>Ernest Achiever</b> and <b>2, 323 others</b></p>
            </div>

            <div class="caption">
                <p><b>{{getvalue($content->contestants_id,'username')}}</b>  {{$content->description}}
                </p>
            </div>
            @if ($page == 'profilefeed')

            <div class="comments text-muted" style="cursor: pointer" >
                View Post Details
            </div>
            @else
            <div class="comments text-muted" style="cursor: pointer" wire:click="tomodal({{$content->id}})" onclick="pause()">
                View Post Details
            </div>
            @endif
        </div>
        {{-- {!!$comment!!} --}}

        {{-- <input type="text" wire:model="campaignid" value=""> --}}
        {{-- <input type="text" wire:model="user_id" value="{{Auth::user()->id}}"> --}}
        {{-- comment --}}

        {{-- <form wire:submit.prevent="createcomment({{findcampaign($content->contestants_id)}})" class="create-post">
            <input type="text" wire:model="comment" placeholder="comment on this post" id="create-post">
            <input type="submit" class="btn btn-primary">
        </form> --}}


           @endforeach
           <!----------------- END OF FEED 1 -------------------->

           <!----------------- FEED 2 -------------------->

           <!----------------- END OF FEED 7 -------------------->
       </div>
       <!----------------- END OF FEEDS -------------------->
    </div>
</div>

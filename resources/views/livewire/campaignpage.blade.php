<div>
    <div class="profile-container">
        <header>
            <x-image name="{{$campaign[0]->campaign_logo}}" wh="width: 400px; height: 400px;"/>
        </header>
        <h2>{{$campaign[0]->name}}</h2>
        <div class="option">
            <li wire:click="recent" @if ($display == 'recent')
            style="font-weight: bolder"
            @endif>Recent</li>
            {{-- <li>Content</li> --}}
            <li wire:click="polls"@if ($display == 'polls')
            style="font-weight: bolder"
            @endif>Polls</li>
            <li wire:click="details" @if ($display == 'details')
            style="font-weight: bolder"
            @endif>About</li>
            <li><a href="{{route('campaign.admin.index',['name'=>$campaign[0]->name])}}" style="text-decoration: none;color:rgb(41, 40, 40);">Admin Panel</a></li>
            <li>For you</li>
            @if ($creator == Auth::user()->username)
            <button class="popBtn" id="modalbtn">+</button>
            @else
            <li><form action=""><button id="" class="btn btn-primary">Join</button></form></li>
            @endif
        </div>
        @switch($display)
            @case('recent')
            <h2 style="margin-left: 5vw">Recent Posts</h2>
            <section class="photo-grid content-section">
                {{-- @dd($content) --}}
                <a href="{{route('post.create',str_replace(' ','-',$campaign[0]->name))}}" title="create post for campaign" class="photo" ><x-image name="pluscopy.png"/></a>
                @foreach ($content as $con)
                <a class="photo"  ><x-image name="{{$con->fileName}}"/></a>
                @endforeach
                {{-- <div class="photo"><img src="https://picsum.photos/306" alt="Photo 6"></div>
                <div class="photo"><img src="https://picsum.photos/308" alt="Photo 6"></div>
                <div class="photo"><img src="https://picsum.photos/309" alt="Photo 6"></div>
                <div class="photo"><img src="https://picsum.photos/310" alt="Photo 6"></div> --}}
                </section>
                @break
            @case('polls')
            <h2>Polls</h2>
            @if (count($polls) == 0)
                <span>No polls <code style="color: rgb(108, 108, 223); transform: rotate(180deg);"> :( </code></span>
            @endif
                <ul>
                    @foreach ($polls as $poll)
                        <li style="margin-top: 2vh">
                            <a style="text-decoration: none;" href="{{route('poll.index',['campaign'=>$campaign[0]->name,'name'=>$poll->name])}}">
                                <span style="color: rgb(108, 108, 223);"><b style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">::{{$poll->name}}</b></span>
                            </a>
                        </li>
                        {{-- <li style="margin-top: 1vh;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 2.5vh;">{{$poll->about}}.</li> --}}
                    @endforeach
                </ul>
                @break
            @case('details')
                {{-- <u>io</u> --}}
                <h3 style="margin-top: 3vh">{{$campaign[0]->name}}</h3>
                <p>{{$campaign[0]->description}}</p>
            @break
            @default

        @endswitch

    </div>
</div>

<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class=" flex">
        <h4 wire:click="show('post')" @if ($show == 'post') style="font-weight: bold" @endif>Post</h4>
        <h4 wire:click="show('campaigns')" @if ($show == 'campaigns') style="font-weight: bold" @endif>Campaigns</h4>
        <h4 wire:click="show('activity')" @if ($show == 'activity') style="font-weight: bold" @endif>Activity</h4>
        {{-- <h6>{{$show}}</h6> --}}
    </div>

    @switch($show)
        @case('post')
        <section class="gallery">
            @foreach ($content as $content)
            @php
                $filetype = explode('.',$content->fileName);
                // $p= explode(' ',$content->description);
                $post = $content->id;
            @endphp
            @if ($filetype[1] != 'mp4')
            <a href="{{route('feed',['thepage'=>'profile','name'=>Auth::user()->username])}}#{{$post}}" class="gallery-item media-item" >
                <x-image name="{{$content->fileName}}" alt="{{$content->description}}" />
                    <div class="media-type">image</div>
                </a>
            @else
            <a class="gallery-item media-item" href="{{route('feed',['thepage'=>'profile','name'=>Auth::user()->username])}}#{{$post}}"  >
                <video src="{{asset('storage/files/'.$content->fileName)}}" style="object-fit:cover;width: 100%;height: 100%;" title="Video-{{$content->description}}"  no-controls>
                </video>
                <div class="media-type">Video</div>
            </a>
            @endif

            @endforeach
        </section>
            @break
        @case('campaigns')
        <section class="campaign-grid">
            @foreach ($campaign as $cam)

            <a class="campaign-card media-item" href="{{route('campaign.index',$cam->name)}}">
                <img src="{{asset('storage/files/'.$cam->campaign_logo)}}" alt="" class="card-img">
                <h4 class="media-type">{{$cam->name}}</h4>
            </a>
            @endforeach
        </section>

            @break
        @case('activity')

            @break
        @default

    @endswitch

</div>

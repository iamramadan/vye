@extends('layout.main')
@push('links')
<style>
    /* General Page Styling */
    /* body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    } */

    .profile-container {
        /* max-width: 800px; */
        width: 60vw;
        height: fit-content;
        margin: 20px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .profile-header {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #ddd;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }

    .profile-header img {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        margin-right: 20px;
        border: 2px solid #ddd;
    }

    .profile-header .profile-info {
        display: flex;
        flex-direction: column;
    }

    .profile-header .profile-info h2 {
        margin: 0;
        color: #333;
    }

    .profile-header .profile-info p {
        margin: 5px 0;
        color: #666;
    }

    .media-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
    }

    .media-item {
        position: relative;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background: #fafafa;
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

    .footer {
        margin-top: 20px;
        text-align: center;
        color: #777;
    }
</style>
@endpush
@php
    $properties = getcampaignsandpoll($contestant[0]->poll_id);
@endphp
@section('main')
<div class="profile-container">
    <div class="profile-header">
       <x-image name="{{getvalue($contestant[0]->id,'profile_image','profile')}}"/>
        {{-- @dd(getvalue(contestant($contestant[0]->id,'id'),'profile_image','profile')) --}}
        <div class="profile-info">
            <h2>{{contestant($contestant[0]->id,'username')}}</h2>
            <p><strong>Campaign ::  {{$properties[0]}}</strong> </p>
            <p><strong>Poll ::  {{$properties[1]}}</strong> </p>
            <p><strong>contestant_Id:</strong> {{$contestant[0]->id}}</p>
        </div>
    </div>
    <div class="media-grid">
        {{-- @dd($contestant) --}}
        @foreach ($contestant[0]->campaigncontent as $content)
        @php
            $c = explode('.',$content->fileName);
            $type= $c[1];
        @endphp
       @switch($type)
           @case('mp4')
           <div class="media-item">
            <video src="{{asset('storage/files/'.$content->fileName)}}" no-controls></video>
            <div class="media-type">Video</div>
        </div>
               @break
           @case('mkv')
           <div class="media-item">
            <video src="{{asset('storage/files/'.$content->fileName)}}" no-controls></video>
            <div class="media-type">Video</div>
        </div>
               @break
           @default
           <div class="media-item">
                <x-image name="{{$content->fileName}}"/>
                <div class="media-type">Image</div>
            </div>
       @endswitch

        @endforeach
        {{-- <div class="media-item">
            <video src="https://via.placeholder.com/150" controls></video>
            <div class="media-type">Video</div>
        </div>
        <div class="media-item">
            <audio src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" controls></audio>
            <div class="media-type">Audio</div>
        </div> --}}
    </div>
</div>
@endsection

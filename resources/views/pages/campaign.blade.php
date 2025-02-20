@extends('layout.main')
@push('links')
    <link rel="stylesheet" href="{{asset('pages/campaign.css')}}">
@endpush
@section('main')
<div class="container-card">
    <h3 class="h3">For you</h3>
    <div class="small-card">

        @foreach ($foryou as $campaign)
        @if ($campaign->name != 'TRASH')
        <a href="{{route('campaign.index',['name'=>$campaign->name])}}" class="card">
            <div class="card-image-container">
                <x-image name="{{$campaign->campaign_logo}}"/>
                <div class="overlay">
                    <div class="reel-icon">&#9658;</div>
                </div>
            </div>
            <div class="card-content">
                <h2 class="card-title">{{$campaign->name}}</h2>
                <p class="card-description">{{$campaign->description}}</p>
                <div class="card-links">
                    <span></span>
                </div>
            </div>
        </a>
        @endif
        @endforeach
    </div>
</div>
@endsection

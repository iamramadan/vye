@extends('layout.main')
{{-- @dd($creator) --}}
@push('links')
<link rel="stylesheet" href="{{asset('explore/style.css')}}">
@endpush
@section('main')
    {{-- <div class="profile-container">
        <header>
            <x-image name="{{$campaign[0]->campaign_logo}}" wh="width: 400px; height: 400px;"/>
        </header>
        <div class="option">
            <li>Polls</li>
            <li>Recent</li>
            <li>About</li>
            @if ($creator == Auth::user()->username)
            <button class="popBtn" id="modalbtn">+</button>
            @else
            <li><form action=""><button id="">Join</button></form></li>
            @endif
        </div>
        <section class="photo-grid">
        <div class="photo"><img src="https://picsum.photos/305" alt="Photo 6"></div>
        <div class="photo"><img src="https://picsum.photos/306" alt="Photo 6"></div>
        <div class="photo"><img src="https://picsum.photos/307" alt="Photo 6"></div>
        <div class="photo"><img src="https://picsum.photos/308" alt="Photo 6"></div>
        <div class="photo"><img src="https://picsum.photos/309" alt="Photo 6"></div>
        <div class="photo"><img src="https://picsum.photos/310" alt="Photo 6"></div>
        </section>
    </div> --}}
    @livewire('campaignpage',['content'=>$content,'campaign'=>$campaign,'creator'=>$creator,'polls'=>$polls])
@endsection
@push('modal')
<div id="modals" class="modal" style="display: none">
    <div class="modal-content">
    <div style="display: flex;">
        <span class="close">&times;</span>
        <span class='m-1'>
            <svg width="40px" height="20px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="ic_fluent_poll_24_filled" fill="#212121" fill-rule="nonzero">
                        <path d="M11.7518706,1.99956021 C13.2716867,1.99956021 14.5037411,3.23161462 14.5037411,4.75143076 L14.5037411,19.2499651 C14.5037411,20.7697812 13.2716867,22.0018356 11.7518706,22.0018356 C10.2320544,22.0018356 9,20.7697812 9,19.2499651 L9,4.75143076 C9,3.23161462 10.2320544,1.99956021 11.7518706,1.99956021 Z M18.7518706,6.99956021 C20.2716867,6.99956021 21.5037411,8.23161462 21.5037411,9.75143076 L21.5037411,19.2499651 C21.5037411,20.7697812 20.2716867,22.0018356 18.7518706,22.0018356 C17.2320544,22.0018356 16,20.7697812 16,19.2499651 L16,9.75143076 C16,8.23161462 17.2320544,6.99956021 18.7518706,6.99956021 Z M4.75187055,11.9995602 C6.27168669,11.9995602 7.5037411,13.2316146 7.5037411,14.7514308 L7.5037411,19.2499651 C7.5037411,20.7697812 6.27168669,22.0018356 4.75187055,22.0018356 C3.23205441,22.0018356 2,20.7697812 2,19.2499651 L2,14.7514308 C2,13.2316146 3.23205441,11.9995602 4.75187055,11.9995602 Z" id="🎨-Color">

            </path>
                    </g>
                </g>
            </svg>
        </span>
    </div>
    <h2 class="down">create new poll</h2>
    <x-form class="block" :action="route('poll.create',$campaign[0]->id)">
        <x-input name="name" placeholder="name of the poll" class="input"/>
        <x-input name="about" placeholder="describe your poll" class="input"/>
        <select name="poll_type" id="">
            <option value="0">singleprefrence</option>
            <option value="1">multiprefrence</option>
        </select>
        <button type="submit" class="btn btn-primary">Create</button>
    </x-form>
        <!-- <h2>Update Profile Image Shape</h2> -->
    </div>
</div>
@endpush
    @push('scripts')
    <script>
    document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("modals");
    const modalbtn = document.getElementById("modalbtn");
    const closeBtn = document.getElementsByClassName("close")[0];
    const shapeButtons = document.querySelectorAll(".shape-btn");
    const profileImage = document.getElementById("profileImage");

    modalbtn.onclick = function() {
        modal.style.display = "block";
    }

    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

    </script>
    @endpush


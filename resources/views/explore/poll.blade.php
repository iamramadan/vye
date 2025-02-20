@extends('layout.main')
@push('links')
    <link rel="stylesheet" href="{{asset('explore/poll.css')}}">
@endpush
@section('main')

<div class="middle">
    {{-- <div class="main">
        <div class="header">
            <h2>MY POLLS</h2>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias exercitationem eum consequuntur laboriosam incidunt, mollitia aspernatur. Non, dicta ipsum explicabo neque tempora soluta, totam, repellat nesciunt facilis officiis a beatae?</p>
        </div>
        <div class="contestants">
            <div class="each">
                <div>
                    <span class="name">Bella</span>   <span>+234</span>
                    <div class="full-vw poll-bar" style="width: 20vh; background-color: blue;"></div>
                </div>
                <div>
                    <span class="name">Bella</span>   <span>+234</span>
                    <div class="full-vw poll-bar" style="width: 10vh; background-color: rgb(185, 147, 22);"></div>
                </div>
                <div>
                    <span class="name">Bella</span>   <span>+234</span>
                    <div class="full-vw poll-bar" style="width: 10vh; background-color: rgb(236, 126, 126);"></div>
                </div>
                <div>
                    <span class="name">Bella</span>   <span>+234</span>
                    <div class="full-vw poll-bar" style="width: 12vh; background-color: rgb(87, 87, 134);"></div>
                </div>
                <div>
                    <span class="name">Bella</span>   <span>+234</span>
                    <div class="full-vw poll-bar" style="width: 10vh; background-color: rgba(87, 216, 109, 0.801);"></div>
                </div>
                <div>
                    <span class="name">Bella</span>   <span>+234</span>
                    <div class="full-vw poll-bar" style="width: 19vh; background-color: rgb(173, 173, 236);"></div>
                </div>
                <div>
                    <span class="name">Bella</span>   <span>+234</span>
                    <div class="full-vw poll-bar" style="width: 20vh; background-color: rgb(179, 91, 19);"></div>
                </div>
                <div>
                    <span class="name">Bella</span>   <span>+234</span>
                    <div class="full-vw poll-bar" style="width: 25vh; background-color: rgb(13, 13, 32);"></div>
                </div>
                <div>
                    <span class="name">Bella</span>   <span>+234</span>
                    <div class="full-vw poll-bar" style="width: 40vh; background-color: rgb(35, 124, 109);"></div>
                </div>

            </div>
        </div>
</div> --}}
<div class="poll-section">
    <h2 class="poll-title">{{$poll[0]->name}}</h2>
    <p class="poll-description">{{$poll[0]->about}}</p>
    {{-- @dd($contestants) --}}
    @if (count($contestants))
    @foreach($contestants as $contestant)

    {{-- <div class="contestant">
      <div class="contestant-info">
        {{$contestant->id}}
        <h3>{{contestant($contestant->user_id,'username')}}</h3>
        <p class="votes">Votes: <span id="js-votes">1,500</span></p>
      </div>
      <button class="vote-button " id="js-vote" onclick="vote('js')">
        <i class="heart-icon"></i> Vote
      </button>
    </div> --}}
    @livewire('contestants', ['contestant' => $contestant])
    @endforeach
    @else
    <p>no contestant</p>
    @endif


  </div>


</div>
@endsection
@section('left-bar')
<div class="containers">
    <div class="grid-container">
      <!-- Post 1 -->
      <div class="grid-item">
        <img src="https://via.placeholder.com/300x200" alt="Image/Video/File">
        <div class="description">Image/Video/File description goes here.</div>
      </div>

      <!-- Post 2 -->
      <div class="grid-item">
        <video controls>
          <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
        </video>
        <div class="description">Another description for a video or file here.</div>
      </div>

      <!-- Add more posts -->
    </div>
  </div>

@endsection
@push('scripts')
{{-- <script>

    let votes = {
        js: 1500,
        python: 2100,
        rust: 950
      };

      function vote(contestant) {
        votes[contestant]++;
        document.getElementById(contestant + '-votes').innerText = votes[contestant];

        Add 'active' class for the bounce effect
        const button = document.getElementById(contestant + '-vote');
        button.classList.add('active');

        Remove 'active' class after animation
        setTimeout(() => {
          button.classList.remove('active');
        }, 600);
      }
</script> --}}

@endpush

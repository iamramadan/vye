<div>
    <div class="contestant">
        <div class="contestant-info">
          {{-- {{$contestant->id}} --}}
          <a href=""><h3 style="color: rgb(97, 97, 231)">{{'@'.contestant($contestant->user_id,'username')}}</h3></a>
          <a class="votes">backers: <span id="js-votes">{{$votes}}</span></a>
        </div>
        @if ($votes == 0)

        <button class="vote-button " id="js-vote" wire:click="back({{Auth::user()->id}},{{$contestant->id}})">
          Back
        </button>
        @else
        <button class="vote-button" style="background: white;color:blue;" id="js-vote" wire:click="back({{Auth::user()->id}},{{$contestant->id}})">
            unback
          </button>
        @endif
      </div>
</div>

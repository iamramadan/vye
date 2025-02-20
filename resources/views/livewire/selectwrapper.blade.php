<div>
   @if ($identifier == 0)

   <div class="middle" style="width: 60vw;">
       <ul class="navbar">
           <li ><a wire:click="created">Created</a></li>
           <li ><a wire:click="activity">Activity</a></li>
       </ul>
       {{-- <button wire:click="Activity" class="btn btn-primary">Activity</button> --}}
       @foreach ($campaign as $item)
       <div class="campaign-card" wire:click="setid({{$item->id}})" style="cursor: pointer">
           <x-image name="{{$item->campaign_logo}}"/>
           <div class="card-content">
               <h3>{{$item->name}}</h3>
               <p>{{$item->description}}</p>
           </div>
       </div>
       @endforeach
   </div>
   @else
   @livewire('selectpoll', ['id' => $identifier])
   @endif
</div>

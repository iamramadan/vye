<div>
<div style="padding: 1rem; background: white; border-radius: 1rem;">
    <form action="{{route('post.completepost')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        {{-- <input type="file"  name="image">
         --}}
         <div style="display: flex; flex-direction: column;gap: 3vh;">
            <label for="image">Add Image</label>
             <input type="file" name="image" id="image">
             <label for="description">Description</label>
            <textarea type="text" style="border: 1.5px solid rgb(77, 77, 143);"  name="description" id="description"></textarea>
         </div>
        <input type="hidden" value="{{$poll_id}}" name='poll_id'>
        {{-- <input type="hidden" value="{{$campaign_id}}" name='campaign_id'> --}}
        @if (count($polls) == 0)
        @php
            echo"No poll under this campaign";
        @endphp
        @endif
        <div class="search-bar" style="margin-top: 2vh;margin-bottom: 2vh; border: 2px solid rgb(92, 101, 184);">
            {{-- <i class="uil uil-search"></i> --}}
                <input type="search" name="keyword" placeholder="Search for polls "> 
        </div>
        <div style="max-height: 35vh;overflow-y: scroll;">
            @foreach ($polls as $item)
                <div class="poll-card" @if($poll_id == $item->id) style="border: rgb(27, 25, 25) 1px solid" @endif wire:click="set_poll_id({{$item->id}})">
                    <div class="card-content">
                        <h4 style="color: rgb(63, 63, 222)">::{{$item->name}}</h4>
                        <p>{{$item->about}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <form action="http://127.0.0.1:8000/posts/create" method="POST" class="btn btn-primary"></form> --}}
        <button type="submit" class="btn btn-primary">Post</button>
        <label class="btn btn-primary" wire:click="resetid">Back</label>
    </form>
</div>
</div>

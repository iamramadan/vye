<div>
    <form wire:submit.prevent="createcomment({{findcampaign($content->contestants_id)}})" class="create-post">
        {{-- <input type="text" wire:model="campaignid" value=""> --}}
        {{-- <input type="text" wire:model="user_id" value="{{Auth::user()->id}}"> --}}
        <input type="text" wire:model="comment" placeholder="comment on this post" id="create-post">
        <input type="submit" class="btn btn-primary">
    </form>
</div>

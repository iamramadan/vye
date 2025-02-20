
<div>
    @if (count($content) > 0)
    @php
        $content = $content[0];
    @endphp
    <div class="modal modal-closable @if(!$content) d-none @endif" id="custom-modal" >
        @php
        $filetype = explode('.',$content->fileName)
        @endphp
        <div class="custom-modal ">
            <div class="modal-content">
                <div class="image-header">
                    @if($filetype[1] != 'mp4')
            <div class="photo" style="max-height:500px; width: 40vw; object-fit: fill;" onclick="openThemeModal()" >
                <x-image name="{{$content->fileName}}"/>
            </div>
            @else
            <div style="min-width: 30vw;">
               <video src="{{asset('storage/files/'.$content->fileName)}} " class="video modal-video" onclick="openThemeModal()"
                style=" width: 100%;
            height: 500px;
            object-fit:fill;
            "
            controls></video>
            </div>
            @endif
                </div>
                <div  style="width: 22vw">

                    <div class="description" style="border-radius: 0%">
                        <p>{{$content->description}}</p>
                    </div>
                    <form wire:submit.prevent="createcomment({{findcampaign($content->contestants_id)}})" class="create-post">
                        {{-- <input type="text" wire:model="campaignid" value=""> --}}
                        {{-- <input type="text" wire:model="user_id" value="{{Auth::user()->id}}"> --}}
                        <textarea type="text" wire:model="comment" placeholder="comment on this post" id="create-post" style="height: 60px"></textarea>
                        <input type="submit" class="btn btn-primary" style="border-radius: 0;width:100%;">
                    </form>
                    <div class="comments-section" >
                        <div class="message" style="display: flex; justify-content:space-evenly;">
                            <div class="profile-photo">
                                <img src="{{asset('images/profile-3.jpg')}}">
                                <div class="active"></div>
                            </div>
                            <div class="message-body">
                                <h5>Keylie Hadid</h5>
                                <p class="text-bold">i love it</p>
                            </div>
                        </div>
                        <div class="message" style="display: flex; justify-content:space-evenly;">
                            <div class="profile-photo">
                                <img src="{{asset('images/profile-3.jpg')}}">
                                <div class="active"></div>
                            </div>
                            <div class="message-body">
                                <h5>Keylie Hadid</h5>
                                <p class="text-bold">i love it</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
</div>

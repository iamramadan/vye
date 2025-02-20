<div>
    <div id="create-modal" class="createModal d-none @if($status != 'open') d-none @endif">
        <span class="closeBtn" wire:click="close">&times;</span>
        <div class="content">
            <a class="d-flex modal-item" href="{{route('campaign.createpage')}}">
                <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="50px" height="50px" viewBox="0 0 32 32" xml:space="preserve">
                    <style type="text/css">
                        .bentblocks_een{fill:#0B1719;}
                    </style>
                    <path class="bentblocks_een" d="M24,15v2h-7v7h-2v-7H8v-2h7V8h2v7H24z M24.485,24.485c-4.686,4.686-12.284,4.686-16.971,0
                    c-4.686-4.686-4.686-12.284,0-16.971c4.687-4.686,12.284-4.686,16.971,0C29.172,12.201,29.172,19.799,24.485,24.485z M23.071,8.929
                    c-3.842-3.842-10.167-3.975-14.142,0c-3.899,3.899-3.899,10.243,0,14.142c3.975,3.975,10.301,3.841,14.142,0
                    C26.97,19.172,26.97,12.828,23.071,8.929z"/>
                </svg>
                <span style="color: black">Create Campaign</span>
            </a>
            <a class="d-flex"  style="cursor: pointer" href="{{route('post.select')}}">
                    <svg width="50px" height="50px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="create-note" class="icon glyph"><path d="M20.71,3.29a2.91,2.91,0,0,0-2.2-.84,3.25,3.25,0,0,0-2.17,1L9.46,10.29s0,0,0,0a.62.62,0,0,0-.11.17,1,1,0,0,0-.1.18l0,0L8,14.72A1,1,0,0,0,9,16a.9.9,0,0,0,.28,0l4-1.17,0,0,.18-.1a.62.62,0,0,0,.17-.11l0,0,6.87-6.88a3.25,3.25,0,0,0,1-2.17A2.91,2.91,0,0,0,20.71,3.29Z"></path><path d="M20,22H4a2,2,0,0,1-2-2V4A2,2,0,0,1,4,2h8a1,1,0,0,1,0,2H4V20H20V12a1,1,0,0,1,2,0v8A2,2,0,0,1,20,22Z" style="fill:#231f20"></path></svg>
                    <span>Participate</span>
            </a>
        </div>
    </div>
</div>

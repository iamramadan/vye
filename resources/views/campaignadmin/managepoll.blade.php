@extends('layout.main')
@push('links')
<style>
    /* General Styling */
    /* body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 20px;
    } */

    .poll-container {
        width: 60vw;
        max-width: 800px;
        height: fit-content;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .poll {
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
    }

    .poll-header {
        background:  hsl(252, 75%, 60%);
        color: white;
        padding: 10px 15px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .poll-header h3 {
        margin: 0;
        font-size: 18px;
    }

    .accordion-icon {
        font-size: 18px;
        transition: transform 0.3s ease;
    }

    .accordion-icon.rotate {
        transform: rotate(180deg);
    }

    .poll-description {
        display: none;
        padding: 15px;
        border-top: 1px solid #ddd;
        font-size: 14px;
        color: #333;
    }

    .poll-buttons {
        display: flex;
        gap: 10px;
        padding: 15px;
        border-top: 1px solid #ddd;
        background: #f1f1f1;
    }

    .poll-buttons button{
        padding: 10px 15px;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-delete {
        background: #ff4d4d;
        color: white;
    }

    .btn-update {
        padding-top: 3px;
        border-radius: 10%; 
        background: #f0ad4e;
        color: white;
    }

    .btn-manage {
        background: #007bff;
        color: white;
    }

    .btn-delete:hover {
        background: #e63939;
    }

    .btn-update:hover {
        background: #ec9a34;
    }

    .btn-manage:hover {
        background: #0056b3;
    }
    .header-card{
        padding: 1rem;
        background: #ffffff;
        height: fit-content;
        border-radius: 1rem;
    }
    .body-card{
        display: flex;
        flex-direction: column;
        gap: 1vh;
    }
</style>
@endpush
@section('main')
<div class="body-card">
    <div class="header-card">
        <h2>{{ucwords($campaign[0]->name)}}</h2>
    </div>
    <div class="poll-container">
        <!-- Sample Poll -->
        @if (count($poll) == 0)
            <h2>No polls created under this campaign</h2>
        @endif
        @foreach ($poll as $pol)
    
        <div class="poll">
            <div class="poll-header" onclick="toggleAccordion(this)">
                <h3>{{$pol->name}}</h3>
                <span class="accordion-icon">&#9660;</span>
            </div>
            <div class="poll-description">
                <p>{{$pol->about}}</p>
            </div>
            <div class="poll-buttons">
                <form action="{{route('poll.trash')}}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name='id' value="{{$pol->id}}">
                    <button class="btn-delete">Trash</button>
                </form>
            <a class="btn-update" href="{{route('campaign.admin.updatepollpage',['campaign'=>$campaign[0]->name,'poll'=>$pol->name])}}">Update</a>
                <a class="btn btn-primary" href="{{route('campaign.admin.managecontestant',['campaign'=>$campaign[0]->name,'poll'=>$pol->name])}}">Manage Contestants</a>
            </div>
        </div>
        {{-- @livewire('paginator', ['page' => $page]) --}}
        @endforeach
        <!-- Duplicate the above block for multiple polls -->
    </div>
</div>
@endsection
@push('scripts')
    <script>
        function toggleAccordion(header) {
            const description = header.nextElementSibling;
            const icon = header.querySelector('.accordion-icon');

            if (description.style.display === "block") {
                description.style.display = "none";
                icon.classList.remove('rotate');
            } else {
                description.style.display = "block";
                icon.classList.add('rotate');
            }
        }
    </script>
@endpush

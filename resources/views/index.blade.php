@extends('layout.main')
@push('links')
<style>
    /* Scoped styles for the side-card only */
    .side-card-container {
        display: flex;
        justify-content: center;
        position: fixed;helper
        padding: 1rem;
    }

    /* Side Card Container */
    .side-card {
        /* max-width: 30vw ; */
        width: 100%;
        max-height: 100%;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column; /* Stack items vertically */
        /* overflow-y: scroll; */
    }

    /* Side Card Image/Video Slider */
    .side-card .slider {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .side-card .slider input {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        opacity: 0;
    }

    .side-card .slider-images {
        display: flex;
        transition: transform 0.3s ease;
    }

    .side-card .slider-images img,
    .side-card .slider-images video {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    /* Side Card Body (Text, Badges, Buttons, Comment) */
    .side-card .side-card-body {
        padding: 15px;
        display: flex;
        flex-direction: column; /* Stack content vertically */
        gap: 15px; /* Space between elements */
    }

    .side-card .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        display: flex;
        /* outline: auto; */
        /* justify-content: spac; */
        gap: 1vw;
    }
    .side-card .card-title h3{
        margin-top: 1vh;
    }

    .side-card .badges {
        display: flex;
        gap: 10px;
    }

    .side-card .badge {
        background-color: #3490dc;
        color: white;
        padding: 2px 4px;
        font-size: 0.75rem;
        border-radius: 20px;
        text-transform: uppercase;
    }

    .side-card .buttons {
        display: flex;
        gap: 10px;
    }

    .side-card .button {
        padding: 8px 15px;
        background-color: #38b2ac;
        color: white;
        font-size: 0.875rem;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .side-card .button:hover {
        background-color: #319795;
    }

    /* Comment Section */
    .side-card .comment-form {
        margin-top: 15px;
    }

    .side-card .comment-form textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #e2e8f0;
        border-radius: 5px;
        font-size: 0.875rem;
        outline: none;
        resize: none;
    }

    /* Slider Controls */
    .side-card .slider-buttons {
        position: absolute;
        top: 50%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        transform: translateY(-50%);
        z-index: 1;
    }

    .side-card .slider-buttons button {
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .side-card .slider-buttons button:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Hide checkboxes */
    .side-card .slider-input {
        display: none;
    }

    .side-card .slider-input:checked + .slider-images {
        transform: translateX(-100%);
    }
    /* Comment Section */
.comment-section {
    margin-top: 15px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.comment-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #e2e8f0;
    border-radius: 5px;
    font-size: 0.875rem;
    outline: none;
    resize: none;
    min-height: 50px;
}

.submit-btn {
    padding: 10px 15px;
    background-color: #38b2ac;
    color: white;
    border: none;
    font-size: 0.875rem;
    border-radius: 5px;
    cursor: pointer;
    align-self: flex-start;
    transition: background-color 0.3s;
}

.submit-btn:hover {
    background-color: #319795;
}

/* Comment Snippets */
.comment-snippets {
    display: flex;
    flex-direction: column;
    gap: 8px;
    /* overflow: scroll; */
}

.comment-snippet {
    background-color: #f7fafc;
    padding: 8px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.comment-snippet p {
    margin: 0;
    font-size: 0.875rem;
    color: #333;
}

.comment-snippet strong {
    color: #3490dc;
}
/* Profile Image Container */
.profile-container h3{
    font-size: 4vh;
    /* display: flex;
    justify-content: center;
    align-items: center; */
}

/* Profile Image Styling */
.profile-img {
    width: 3vw;  /* Width 2vw */
    height: 3vw; /* Height 2vh */
    object-fit: cover;  /* Ensures the image covers the rounded container */
    border-radius: 50%;  /* Makes the image circular */
    /* border: 2px solid #ffffff;  Optional: Adds a border around the profile image */
    /* border: 2px solid #0e0d0d; */
}
@media screen and (max-width:500px){
    .side-card-container {
        display: none;
    }
}
</style>
@endpush
{{-- @livewire('frontpage', ['campaigncontent' => $campaigncontent]) --}}
{{-- @section('sidebar')
@livewire('frontpage')
@endsection --}}
@section('main')

@livewire('feed', ['campaigncontent' => $campaigncontent,'page'=>'home'])
@endsection
@section('left-bar')
<div class="right">

    @livewire('homesidebar')

</div>
@endsection
@push('scripts')
    <script>
        function isVideoInView(video) {
            const rect = video.getBoundingClientRect();
            return rect.top >= 0 && rect.bottom <= window.innerHeight;
        }

        // Get the video element
        const video = document.querySelectorAll('.video');

        // Listen for the scroll event
        window.addEventListener('scroll', () => {
            video.forEach(element => {
                if (!isVideoInView(element)) {
                    element.pause();  // Pause the video if it's not in view
                }
            });
        });
        let pause = () =>{
            const video = document.querySelectorAll('video')
            video.forEach(element => {
                element.pause();  // Pause the video if it's not in view
            });
        }

    </script>
@endpush

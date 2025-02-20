@extends('layout.main')
@section('page-title',$page)
@section('main')
    @livewire('feed', ['campaigncontent' => $content,'page'=>$page])
@endsection
@push('scripts')
    <script>
        const video = document.querySelectorAll('.video');
        function isVideoInView(video) {
            const rect = video.getBoundingClientRect();
            return rect.top >= 0 && rect.bottom <= window.innerHeight;
        }

        // Get the video element

        // Listen for the scroll event
        window.addEventListener('scroll', () => {
            video.forEach(element => {
                if (!isVideoInView(element)) {
                    element.pause();  // Pause the video if it's not in view
                }
            });
        });

    </script>
@endpush

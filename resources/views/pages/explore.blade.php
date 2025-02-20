@extends('layout.main')
@push('links')
<link rel="stylesheet" href="{{asset('pages/explore.css')}}">
@endpush
@section('main')
<div class="main">
        <h2 class="header">Explore</h2>
        <p><b>Content we think you will like.</b></p>
        <section class="gallery" id="gallery">
            <!-- Gallery items with images -->
            <div class="gallery-item">
                <img src="https://picsum.photos/308" alt="Image 1">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/334" alt="Image 2">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/323" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/333" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/393" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/993" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/643" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/913" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/393" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/353" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/398" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/392" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/593" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/999" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/303" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/193" alt="Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://picsum.photos/330" alt="Image 3">
            </div>
            <!-- Add more gallery items as needed -->
        </section>
    </div>
@endsection

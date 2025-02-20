@extends('layout.main')
@push('links')
<link rel="stylesheet" href="{{asset('select/style.css')}}">
@endpush
@section('main')

<livewire:selectwrapper >

@endsection
@push('scripts')
    <script>
        const links = document.querySelectorAll('.navbar a');
        links.forEach(link => {
            link.addEventListener('click', () => {
                links.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
            });
        });
    </script>
@endpush

@extends('layout.main')
@push('links')
<link rel="stylesheet" href="{{asset('form/style.css')}}">
@endpush

@section('main')
<div class="middle">
    {{-- <input type="file"> --}}
    <h2>Create a new Campaign</h2>
    <x-form :action="route('campaign.create')" enctype="multipart/form-data">
        <x-input type="text" name="name" placeholder="Name of the campaign eg.g ...."/>
        <x-input type="file" name="campaign-logo" placeholder="campaign_logo" class="dropify" />
        <x-textarea name="description" placeholder="tell us about your campaign" />
        <button type="submit" class="btn btn-primary">Create</button>
    </x-form>
</div>
@endsection
@push('scripts')
<script>
    $('.dropify').dropify();
</script>
@endpush

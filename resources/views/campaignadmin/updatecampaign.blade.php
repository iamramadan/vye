@extends('layout.main')
@push('links')
<link rel="stylesheet" href="{{asset('form/style.css')}}">
@endpush

@section('main')
<div class="middle">
    {{-- <input type="file"> --}}
    <h2>update campaign</h2>
    <x-form :action="route('campaign.admin.update')" enctype="multipart/form-data">
        @method('PUT')
        <x-image name='{{$campaign[0]->campaign_logo}}'/>
        <x-input type="text" name="name" value="{{$campaign[0]->name}}" placeholder="Name of the campaign eg.g ...."/>
        <x-input type="file" name="campaign_logo" placeholder="campaign_logo" class="dropify" />
        <x-input type="hidden" name="id" value="{{$campaign[0]->id}}"/>
        <x-textarea name="description" placeholder="tell us about your campaign" value="{{$campaign[0]->description}}" />
        <button type="submit" class="btn btn-primary">Create</button>
    </x-form>
</div>
@endsection
@push('scripts')
<script>
    $('.dropify').dropify();
</script>
@endpush
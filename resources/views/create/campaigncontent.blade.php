@extends('layout.main')
@section('main')
<div class="middle">
    <form action="{{route('post.createpost')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$id}}" name="campaign_id">
        <div>
            <label for="description">Description</label>
            <textarea id="description" class="description" name="description" rows="4" cols="50" placeholder="Write your post here..."></textarea>
        </div>
        <div>
            <label for="image">Upload Image</label>
            <input type="file" id="image" name="image" class="dropify" />
        </div>
        <div style=" margin: 10px;">
            <label for="poll">Poll</label>
            <select name="poll" id="#poll" style="padding: .5rem;border:none;border-radius:1rem;">
                @foreach ($polls as $item)
                <option>{{$item}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection
@push('scripts')
<script>
     $(document).ready(function(){
            // Initialize Dropify
            $('.dropify').dropify();
        });
</script>
@endpush

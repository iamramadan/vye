@extends('layout.main')
@push('links')
<style>
    .poll-container{
        width: 50vw;
        height: fit-content;
        padding: 1rem;
        display: block;
        background-color: #fdfdfd;
        border-radius: .5rem;
    }
    .title-bar{
        height: 10vh;
        align-content: center;
        display: flex;
        justify-content: space-between;
        padding: 5%;
        width: 100%;
        border-bottom: 2px rgb(182, 176, 176) solid;
        margin-bottom: 1vh;
    }
    .poll-card{
        margin-top: 2vh;
        height: 10vh;
        width: 90%;
        padding: 3%;
        border-radius: 1rem;
        background-color: #ffffff;
        box-shadow: 1px 2px 3px rgb(189, 184, 184);
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        margin-left: 5%;
    }
    .poll-card h2{
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-weight: 300;
    }
    .poll-card button{
        padding: 1vh;
        background-color: rgb(94, 94, 236);
        color: white;
        height: 5vh;
        border-radius: 2rem;
        cursor: pointer;
    }
    .poll-card button:hover{
         color: rgb(94, 94, 236); 
        background-color: white;
        border: rgb(94, 94, 236) 1px solid;
    }
</style>
@endpush
@section('main')
    <div class="poll-container">
        <div class="title-bar">
            <h2>{{$campaign[0]->name}}</h2>
            <span><b>{{count($polls)}}</b> {{Str::plural('poll',count($polls))}} deleted</span>
        </div>
        @foreach ($polls as $item)     
        <div class="poll-card">
            <h2>{{fromtrash($item->deleted_poll,'name')}}</h2>
            <form action="{{route('campaign.admin.pollretrieve')}}" method="POST">
                @csrf
                <input type="hidden" name="campaigns_id" value="{{$campaign[0]->id}}">
                <input type="hidden" name="poll_id" value="{{$item->deleted_poll}}">
                <button type="submit">Retrieve</button>
            </form>
        </div>
        @endforeach
    </div>
@endsection
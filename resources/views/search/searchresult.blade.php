@extends('layout.main')
@section('main')
<div class="middle">
    <div style="display: flex;justify-content: space-between;" >
        <a>Campaign</a>
        <a>Account</a>
    </div>
    @if (count($campaigns) == 0)
    <h2>No result found</h2>
    @else
    <h2>Results for "{{$keyword}}"</h2>
    @endif
    @foreach ($campaigns as $item)
    @if ($item->name != 'TRASH')

    <div style="width: 100%; height: 25vh;
    justify-content: space-evenly;
    background: white; padding: 1rem;
    margin-bottom: 3vh; border-radius: 1rem;">
        <h3>{{$item->name}}</h3>
        <p>{{$item->description}}</p>
        <hr>
        <br>
        <a href="{{route('campaign.index',$item->name)}}" class="btn btn-primary">view</a>
    </div>
    @endif

    @endforeach
</div>

@endsection

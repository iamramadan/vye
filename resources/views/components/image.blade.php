@props(['name'=>'','alt'=>'','wh'=>'' ,'class'=>'' ])
<img src="{{asset('storage/files/'.$name)}}" class="{{$class}}" {{$wh}} alt='{{$alt}}'>

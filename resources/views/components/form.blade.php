@props(['method'=>'post','action'=>'','enctype'=>'','class'=>'form'])
<form action="{{$action}}" method="{{$method}}" enctype="{{$enctype}}" class="{{$class}}">
    @csrf
    {{$slot}}
</form>

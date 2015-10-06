@extends('app')

@section('content')


    <div class="panel panel-info">
        <div class="panel-heading">Events</div>

        <ul class="list-group">
            @foreach($events as $event)
                 <li class="list-group-item">{{ $event->description }}</li>
            @endforeach
        </ul>

    </div>



@stop
@extends('app')

@section('content')

    @if(isset($roles) && count($roles))
        <div class="panel panel-info">
            <div class="panel-heading">My roles</div>

            <ul class="list-group">
                @foreach($roles as $role)
                     <li class="list-group-item">{{ $role->description }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($deadlines) && count($deadlines))
        <div class="panel panel-info">
            <div class="panel-heading">My deadlines</div>

            <table class="table">
             <tbody>
                @foreach($deadlines as $deadline)
                     <tr class="{{($deadline->completed?"success":"warning")}}">
                        <td class="col-md-6">{{ $deadline->description }}</td>
                        <td class="col-md-5">{{ $deadline->due_timestamp->format('Y-M-d H:i:s') }} ({{ $deadline->due_timestamp->diffForHumans() }}) </td>
                        <td class="text-right">{{ ($deadline->completed?'Complete':'Open')}}</td></tr>
                @endforeach
            </tbody>
            </table>
        </div>
    @endif

@stop
@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Meals</div>

                <div class="panel-body">

                    @if (!$meals->isEmpty())

                        <ul class="list-group">
                            @foreach ($meals as $meal)
                                <li class="list-group-item headForm">
                                    <a href="{{ url('/meals/'. $meal->id) }}">{{ $meal->name  }}</a>
                                    <span class="pull-right">
                                        {{ date('D g a, F d, Y', strtotime($meal->created_at)) }}
                                    </span>
                                </li>
                                <br/>
                            @endforeach
                        </ul>

                    @else

                        <h5>You have no meals <a href="/meals/create">Create One Now!</a></h5>

                    @endif

                </div>
            </div>
        </div>
    </div>
@stop
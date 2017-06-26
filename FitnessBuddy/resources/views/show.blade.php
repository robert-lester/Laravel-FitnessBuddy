@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h2>{{ $meals->name }}
                            <span class="timeForm">{{ date('D, F d, Y, T', strtotime($meals->created_at)) }}</span>
                        </h2>

                        <span class="label label-pill label-primary">
                            {{ $meals->calories() . 'g' . ' Cal' }}
                        </span>
                            &nbsp;
                        <span class="label label-pill label-primary">
                            {{ $meals->proteins() . 'g'. ' Protein' }}
                        </span>
                            &nbsp;
                        <span class="label label-pill label-primary">
                            {{ $meals->carbs() . 'g' . ' Carbs' }}
                        </span>
                            &nbsp;
                        <span class="label label-pill label-primary">
                            {{ $meals->fats() . 'g' . ' Fat' }}
                        </span>
                            &nbsp;

                    </div>

                    <div class="panel-body">

                        <form action="/meals/{{ $meals->id }}/foods" method="POST">
                            <fieldset class="form-group">
                                <label for="name" >Food Name</label>
                                <input name="name"
                                       type="text"
                                       class="form-control"
                                       placeholder="Food Name"
                                       required>
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="protein" >Protein</label>
                                <input name="protein"
                                       type="number"
                                       class="form-control"
                                       placeholder="Protein/g"
                                       required>
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="carbohydrates" >Carbohydrates</label>
                                <input name="carbohydrates"
                                       type="number"
                                       class="form-control"
                                       placeholder="Carbohydrates/g"
                                       required>
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="fat" >Fat</label>
                                <input name="fat"
                                       type="number"
                                       class="form-control"
                                       placeholder="Fat/g"
                                       required>
                            </fieldset>

                            <button class="btn btn-primary">Submit</button>

                            {{ csrf_field() }}
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Food</h2>
                    </div>

                    <div class="panel-body">

                        @if ($meals)

                            <ul class="list-group">
                                @foreach ($meals->foods as $food)
                                    <li class="list-group-item headForm">
                                        {{ $food->name  }}

                                        <span class="pull-right">
                                            {{ 'Protein: ' . $food->protein . 'g'}}
                                            &nbsp;
                                            {{ 'Carbs: ' . $food->carbohydrates . 'g' }}
                                            &nbsp;
                                            {{ 'Fat: ' . $food->fat . 'g' }}
                                        </span>
                                    </li>
                                    <br/>
                                @endforeach
                            </ul>

                        @else

                            <h5>You have no food</h5>

                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
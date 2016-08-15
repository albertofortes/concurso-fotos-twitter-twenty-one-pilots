@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Concursantes</div>

                <div class="panel-body">

                  <!-- if there are creation errors, they will show here -->
                  @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      {{ Html::ul($errors->all()) }}
                    </div>
                  @endif

                  {{ Form::open(array('url' => 'contestants', 'files' => 'true')) }}

                    <div class="form-group">
                      {{ Form::label('name', 'Nombre') }}
                      {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                      {{ Form::label('surname', 'Apellidos') }}
                      {{ Form::text('surname', Input::old('surname'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                      {{ Form::label('email', 'Email') }}
                      {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                      {{ Form::label('phone', 'Teléfono') }}
                      {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                      {{ Form::label('twitter_user', 'Usuario de twitter (Sin el @)') }}
                      {{ Form::text('twitter_user', Input::old('twitter_user'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                      {{ Form::label('ticket_image', 'Imagen del ticket') }}
                      {{ Form::text('ticket_image', Input::old('ticket_image'), array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                      {{ Form::label('contest_image', 'Imagen con el CD') }}
                      {{ Form::text('contest_image', Input::old('contest_image'), array('class' => 'form-control')) }}
                    </div>

                    <p>
                      {{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
                    </p>

                  {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

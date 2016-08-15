@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Concursantes
        <small>crear nuevo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/admin/contestants') }}">Concursantes</a></li>
        <li class="active">Crear concursante</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

          <div class="col-xs-12">

            <div class="box box-primary">

              <div class="box-header with-border">
                <h3 class="box-title">Nuevo usuario</h3>
              </div>

              <div class="box-body">

                <!-- if there are creation errors, they will show here -->
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    {{ Html::ul($errors->all()) }}
                  </div>
                @endif

                {{ Form::open(array('url' => 'admin/contestants', 'files' => 'true')) }}

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

                    <!--<div class="form-group">
                      {{ Form::label('ticket_image', 'Imagen del ticket') }}
                      {{ Form::text('ticket_image', Input::old('ticket_image'), array('class' => 'form-control')) }}
                    </div>-->

                    <div class="form-group">
                      {{ Form::label('ticket_image', 'Imagen del ticket') }}
                      {{ Form::file('ticket_image', null) }}
                    </div>

                    <div class="form-group">
                      {{ Form::label('contest_image', 'Foto para el concurso') }}
                      {{ Form::file('contest_image', null) }}
                    </div>

                  <p>
                    {{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
                    <a href="{{ URL::to('admin/contestants/') }}" class="btn btn-link">Volver</a>
                  </p>

                {{ Form::close() }}

              </div>

            </div>

          </div>

      </div>

    </section>

</div>
@endsection

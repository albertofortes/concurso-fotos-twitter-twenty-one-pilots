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
        <li class="active">Editar concursante</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

          <div class="col-xs-12">

            <div class="box box-primary">

              <div class="box-header with-border">
                <h3 class="box-title">Editar: {{ $contestant->name }}</h3>
              </div>

              <div class="box-body">

                <!-- if there are creation errors, they will show here -->
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    {{ Html::ul($errors->all()) }}
                  </div>
                @endif

                {{ Form::model($contestant, array('route' => array('admin.contestants.update', $contestant->id), 'method' => 'PUT')) }}

                  <div class="form-group">
                    {{ Form::label('name', 'Nombre') }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                  </div>

                  <div class="form-group">
                    {{ Form::label('surname', 'Apllidos') }}
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
                      {{ Form::label('status', 'Estatus') }}
                      {{ Form::select('status', array('Sin determinar' => 'Sin determinar', 'Preseleccionado' => 'Preseleccionado', 'Finalista' => 'Finalista'), Input::old('status'), array('class' => 'form-control')) }}
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

@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Usuarios
        <small>Ver todos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/admin/users') }}">Usuarios</a></li>
        <li class="active">Editar usuario</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

          <div class="col-xs-12">

            <div class="box box-primary">

              <div class="box-header with-border">
                <h3 class="box-title">Editar: {{ $user->name }}</h3>
              </div>

              <div class="box-body">

                <!-- if there are creation errors, they will show here -->
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    {{ Html::ul($errors->all()) }}
                  </div>
                @endif

                {{ Form::model($user, array('route' => array('admin.users.update', $user->id), 'method' => 'PUT')) }}

                  <div class="form-group">
                    {{ Form::label('name', 'Nombre de usuario') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                  </div>

                  <div class="form-group">
                    {{ Form::label('first_name', 'Nombre de pila') }}
                    {{ Form::text('first_name', null, array('class' => 'form-control')) }}
                  </div>

                  <div class="form-group">
                    {{ Form::label('last_name', 'Apellidos') }}
                    {{ Form::text('last_name', null, array('class' => 'form-control')) }}
                  </div>

                  <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', null, array('class' => 'form-control')) }}
                  </div>

                  <div class="form-group">
                    {{ Form::label('role', 'Rol') }}
                    {{ Form::select('role', $roles, $user->role->id, array('class' => 'form-control')) }}
                  </div>

                  <div class="form-group">
                    {{ Form::label('password', 'Cambiar contraseña') }}
                    {{ Form::password('password', array('class' => 'form-control')) }}
                  </div>

                  <div class="form-group">
                    {{ Form::label('password_confirmation', 'Repetir contraseña nueva') }}
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                  </div>

                  <p>
                    {{ Form::submit('Editar', array('class' => 'btn btn-success')) }}
                    <a href="{{ URL::to('admin/users/') }}" class="btn btn-link">Volver</a>
                  </p>

                {{ Form::close() }}

              </div>

            </div>

          </div>

      </div>

    </section>

</div>
@endsection

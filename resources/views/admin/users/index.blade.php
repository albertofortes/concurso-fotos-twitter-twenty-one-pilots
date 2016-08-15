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
        <li class="active">Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

          <div class="col-xs-12">

            <div class="box">

              <div class="box-header">
                <h3 class="box-title">Usuarios</h3>
              </div>

              <div class="box-body">

                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th width="25">Gravatar</th>
                      <th>Usuario</th>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Email</th>
                      <th>Rol</th>
                      @if ( Auth::user()->role_id == 1 )
                        <th></th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td class="text-center"><img src="{{ Gravatar::src($user->email, 25) }}" class="img-rounded" alt="User Image"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        @if ( Auth::user()->role_id == 1 )
                          <td class="text-center">
                            <div class="btn-group">
                              <button type="button" class="btn btn-primary btn-sm">Acciones</button>
                              <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a href="{{ URL::to('admin/users/' . $user->id . '/edit') }}">Editar</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="text-danger"><a data-id="{{ $user->id }}" data-toggle="modal" data-target="#removeUser" class="open-remove-user-dialog"><span aria-hidden="true" class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
                              </ul>
                            </div>
                          </td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>

          </div>

      </div>

    </section>

</div>

<!-- Modal -->
<div class="modal fade" id="removeUser" tabindex="-1" role="dialog" aria-labelledby="removeUser">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Borrar usuario</h4>
      </div>
      <div class="modal-body">
        <p><strong>¿Estás seguro de que quieres eliminar este usuario?</strong></p>
        <p>Esta acción no se puede deshacer.</p>
      </div>
      <div class="modal-footer" id="removeActions">
        <a class="btn btn-default" data-dismiss="modal">Cerrar</a>
      </div>
    </div>
  </div>
</div>

@endsection

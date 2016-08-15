@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Concursantes
        <small>Ver todos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Concursantes</li>
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

              <div class="btn-group" style="margin: 0 0 0 10px;">
                <button type="button" class="btn btn-sm">Filtrar por estatus</button>
                <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="{{ URL::to('admin/contestants/') }}">Todos</a></li>
                  <li><a href="{{ URL::to('admin/contestants?filter=Preseleccionado') }}">Preseleccionadps</a></li>
                  <li><a href="{{ URL::to('admin/contestants?filter=Finalista') }}">Finalistas</a></li>
                </ul>
              </div>

              <div class="box-body">

                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                @if ( count($contestants) > 0 )
                  <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Estatus</th>
                          <th>Nombre y apellidos</th>
                          <th>Teléfono</th>
                          <th>Email</th>
                          <th>Twitter</th>
                          <th>Ticket</th>
                          <th>Imagen concurso</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($contestants as $contestant)
                          <tr>
                            <td>
                              @if ($contestant->status == 'Preseleccionado')
                                <span class="label label-warning">
                              @elseif ($contestant->status == 'Finalista')
                                <span class="label label-success">
                              @else
                                <span class="label label-primary">
                              @endif
                              {{ $contestant->status }}</span>
                            </td>
                            <td>{{ $contestant->name }} {{ $contestant->surname }}</td>
                            <td>{{ $contestant->phone }}</td>
                            <td>{{ $contestant->email }}</td>
                            <td>{{ $contestant->twitter_user }}</td>
                            <td><img src="{{ URL::to('/' . $contestant->ticket_image) }}" class="img-rounded" style="width: 75px;" /></td>
                            <td><img src="{{ URL::to('/' . $contestant->contest_image) }}" class="img-rounded" style="width: 75px;" /></td>
                            <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary btn-sm">Acciones</button>
                                  <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('admin/contestants/' . $contestant->id) }}"><span aria-hidden="true" class="glyphicon glyphicon-eye-open"></span> Ver concursante</a></li>
                                    <li><a href="{{ URL::to('admin/contestants/' . $contestant->id . '/edit') }}"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span> Editar</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ URL::to('admin/contestants/' . $contestant->id . '/status/1') }}" style="color: #E08E0B">Marcar como preseleccionado</a></li>
                                    <li><a href="{{ URL::to('admin/contestants/' . $contestant->id . '/status/2') }}" style="color: #008D4C">Marcar como finalista</a></li>
                                    <li><a href="{{ URL::to('admin/contestants/' . $contestant->id . '/status/0') }}" style="color: #367FA9">Marcar como sin determinar</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="text-danger"><a data-id="{{ $contestant->id }}" data-toggle="modal" data-target="#removeContestant" class="open-remove-contestant-dialog"><span aria-hidden="true" class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
                                  </ul>
                                </div>
                            </td>

                          </tr>
                        @endforeach
                      </tbody>
                  </table>

                  {{ $contestants->links() }}

                  @else
                    <div class="alert alert-warning">Aún no tenemos ningún concursante.</div>
                  @endif

              </div>

            </div>

          </div>

      </div>

    </section>

</div>

<!-- Modal -->
<div class="modal fade" id="removeContestant" tabindex="-1" role="dialog" aria-labelledby="removeContestant">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Borrar concursante</h4>
      </div>
      <div class="modal-body">
        <p><strong>¿Estás seguro de que quieres eliminar este concursante?</strong></p>
        <p>Esta acción no se puede deshacer.</p>
      </div>
      <div class="modal-footer" id="removeActions">
        <a class="btn btn-default" data-dismiss="modal">Cerrar</a>
      </div>
    </div>
  </div>
</div>

@endsection

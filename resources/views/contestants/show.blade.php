@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Concursante
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/admin/contestants') }}">Concursantes</a></li>
        <li class="active">{{ $contestant->name }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

          <div class="col-lg-12">

            <div class="box {{ $status['box'] }}">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ Gravatar::src($contestant->email, 130) }}" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $contestant->name }} {{ $contestant->surname }} <a href="{{ URL::to('admin/contestants/' . $contestant->id . '/edit') }}"><small style="color: #367FA9"><span aria-hidden="true" class="glyphicon glyphicon-edit"></span> Editar</small></a></h3>

                <p class="text-muted text-center"><strong class="label  {{ $status['label'] }}">{{ $contestant->status }}</strong></p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Nombre</b> <span class="pull-right">{{ $contestant->name }}</span>
                  </li>
                  <li class="list-group-item">
                    <b>Apellidos</b> <span class="pull-right">{{ $contestant->surname }}</span>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a href="mailto:{{ $contestant->email }}" class="pull-right">{{ $contestant->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Teléfono</b> <span class="pull-right">{{ $contestant->phone }}</span>
                  </li>
                  <li class="list-group-item">
                    <b>Usuario de Twitter</b> <a href="https://twitter.com/{{ $contestant->twitter_user }}" target="blank" class="pull-right" title="Ver usuario en Twitter">&#64;{{ $contestant->twitter_user }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Concursó el</b> <span class="pull-right">
                      <?php echo date("j\/m\/Y", strtotime($contestant->created_at)); ?>
                    </span>
                  </li>
                  <li class="list-group-item">
                    <b>Ticket de compra</b> <a href="#" class="open-see-contestant-ticket pull-right" data-toggle="modal" data-target="#contestantTicketModal" data-ticketsrc="{{ URL::to('/' . $contestant->ticket_image) }}">Ver ticket <span aria-hidden="true" class="glyphicon glyphicon-eye-open"></span></a>
                  </li>
                  <li class="list-group-item">
                    <b>Imagen del concurso:</b>
                    <img src="{{ URL::to('/' . $contestant->contest_image) }}" class="img-rounded" style="width: 100%; margin: 15px 0;" />
                  </li>
                </ul>

                <a href="{{ url('/admin/contestants/photos') }}" class="btn btn-primary btn-block"><b><span aria-hidden="true" class="glyphicon glyphicon-arrow-left"></span> Volver al listado de concursantes</b></a>
              </div>
              <!-- /.box-body -->
            </div>

          </div>

      </div>

    </section>

    <!-- Modal -->
    <div class="modal fade" id="contestantTicketModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ticket de compra</h4>
          </div>
          <div class="modal-body" id="ticketImg"></div>
        </div>
      </div>
    </div>

</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Todas las fotos del concurso
        <small>Click en la imagen para ver detalle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/admin/contestants') }}">Concursantes</a></li>
        <li class="active">Todas las fotos a concurso</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-lg-12">
          @if ( count($photos) > 0 )
            <div class="masonry-grid">
              @foreach ($photos as $photo)
                <div class="grid-sizer"></div>
                <div class="gutter-sizer"></div>
                <div class="grid-item">
                  <a href="{{ URL::to('admin/contestants/' . $photo->id) }}" title="Ver detalle del concursante">
                    <img alt="Photo" src="{{ URL::to('/' . $photo->contest_image) }}" class="img-responsive">
                  </a>
                </div>
              @endforeach
            </div>

            {{ $photos->links() }}

          @else

            <div class="alert alert-warning">Aún no tenemos ningún concursante.</div>

          @endif

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

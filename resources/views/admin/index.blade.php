@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-lg-4">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $aContestants['all'] }}</h3>

              <p>Concursantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/contestants/photos') }}" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $aContestants['preselected'] }}</h3>

              <p>Preseleccionados</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/contestants/preselected') }}" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $aContestants['finalists'] }}</h3>

              <p>Finalistas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/contestants/finalists') }}" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>

    </section>

</div>
@endsection

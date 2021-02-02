@extends('layouts.dashboard.dashboard')
@section('content')


    <section class="content-header">
      <h1>
        Dashboard
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{$countTercero ?? 0}}</h3>
              <p>Terceros Del Sistema</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <a href="{!! URL('tercero') !!}" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$countPredios ?? 0}}</h3>
              <p>Predios Del Sistema</p>
            </div>
            <div class="icon">
              <i class="fa fa-home"></i>
            </div>
            <a href="{!! URL('predio') !!}" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$countOrdenesVenta ?? 0}}</h3>
              <p>Ordenes de Venta Del Sistema</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-o"></i>
            </div>
            <a href="{!! URL('ordenes_venta') !!}" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3>{{$countRecibos ?? 0}}</h3>
              <p>Recibos de Caja Del Sistema</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-o"></i>
            </div>
            <a href="{!! URL('recibo_caja') !!}" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
  </section>


@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function () {

});
</script>
@endsection
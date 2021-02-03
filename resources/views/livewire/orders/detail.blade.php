@extends('layouts.dashboard.dashboard')
@section('content')
<section class="content">
	<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> {{ config('app.name', 'Laravel') }}
            <small class="pull-right">Date: {{$date}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Desde:
          <address>
            <strong>Evertec, Inc.</strong><br>
            Telefono: (804) 123-5432<br>
            Email: info@evertec.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Para:
          <address>
            <strong>{{$order->customer_name}}</strong><br>
            Telefono: {{$order->customer_mobile}}<br>
            Email: {{$order->customer_email}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #{{$order->reference}}</b><br>
          <br>
          <b>Order ID: </b> {{$order->id}}<br>
          <b>Fecha de Pago: </b> {{$date}}<br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Cantidad</th>
              <th>Producto</th>
              <th>Total</th>
              <th>Estado</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>{{$order->quantity}}</td>
              <td>Nevera</td>
              <td>{{$order->total_price}}</td>
              <td>{{$order->status}}</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-xs-6">
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td>${{$order->total_price_format}}</td>
              </tr>
              <tr>
                <th>Tax (0%)</th>
                <td>$0</td>
              </tr>
              <tr>
                <th>Envio:</th>
                <td>$0</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>${{$order->total_price_format}}</td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row no-print">
        <div class="col-xs-12">
          <form method="GET" action="{{ route('order.payment', $order->id) }}" >
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Pagar
            </button>
          </form>
        </div>
      </div>
    </section>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
    });
</script>
@endsection
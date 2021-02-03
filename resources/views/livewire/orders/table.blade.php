<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">Listado de Ordenes</h3>
		          <div class="box-tools">
	                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
	                  <input type="text" wire:model="search" class="form-control pull-right" placeholder="Buscar">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  </div>
	                </div>
	              </div>
		        </div>
		        <!-- /.box-header -->
		        <div class="box-body table-responsive">
		            <table id="table" class="table table-bordered table-striped">
		                <thead>
		                    <tr>
		                        <th>ID</th>
		                        <th>Ver Orden</th>
		                        <th>Nombre</th>
		                        <th>Email</th>
		                        <th>Celular</th>
		                        <th>Cantidad</th>
		                        <th>Total</th>
		                        <th>Estado</th>
		                        <th>Fecha Orden</th>
		                        <th>Usuario</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($orders as $order)
		            		<tr>
		            			<td>{{$order->id}}</td>
		            			<td>
		            				<a href="{{ URL::route('order.show',$order->id) }}" class="btn btn-primary fa fa-eye"></a>
		            			</td>
		            			<td>{{$order->customer_name}}</td>
		            			<td>{{$order->customer_email}}</td>
		            			<td>{{$order->customer_mobile}}</td>
		            			<td>{{$order->quantity}}</td>
		            			<td>{{$order->total_price_format}}</td>
		            			<td><span class="label label-{{$order->label}}">{{$order->status}}</span></td>
		            			<td>{{$order->created_at}}</td>
		            			<td>{{$order->user->username}}</td>
		            		</tr>
		                	@endforeach
		                </tbody>
		                <tfoot>
		                    <tr>
		                        <th>ID</th>
		                        <th>Nombre</th>
		                        <th>Email</th>
		                        <th>Celular</th>
		                        <th>Cantidad</th>
		                        <th>Total</th>
		                        <th>Estado</th>
		                        <th>Fecha Orden</th>
		                        <th>Usuario</th>
		                    </tr>
		                </tfoot>
		            </table>
		        </div>
		        <div class="box-footer">
		        	{{ $orders->links('layouts.pagination') }}
		        </div>
		    </div>
		</div>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="https://picsum.photos/128/128" alt="User profile picture">

              <h3 class="profile-username text-center">{{$product}}</h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Precio Unitario</b> <a class="pull-right">{{$price}}</a>
                </li>
                <li class="list-group-item">
                  <b>Stock</b> <a class="pull-right">3456</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
		<div class="col-md-9">
			<div class="box box-primary">
		        <div class="box-header with-border">
		          <h3 class="box-title">Nueva Orden</h3>
		        </div>
		        <!-- /.box-header -->
		        <div class="box-body">
		        	<form class="form-horizontal">
		        		{{-- Nombre --}}
		        		<div class="form-group">
	              	<label for="customer_name" class="col-sm-2 control-label">Nombres</label>
			              <div class="col-sm-10 {{ $errors->has('customer_name') ? ' has-error' : '' }}">
			                <input type="text" class="form-control" wire:model="customer_name" placeholder="Jhon Doe">
			                @error('customer_name')
					        			<span class="help-block">{{$message}}</span>
					        		@enderror
			              </div>
	              </div>
	              {{-- Email --}}
	              <div class="form-group">
	              	<label for="customer_email" class="col-sm-2 control-label">Email</label>
			              <div class="col-sm-10 {{ $errors->has('customer_email') ? ' has-error' : '' }}">
			                <input type="email" class="form-control" wire:model="customer_email" placeholder="jhon@mailing.com">
			                @error('customer_email')
					        			<span class="help-block">{{$message}}</span>
					        		@enderror
			              </div>
	              </div>
	              {{-- Mobile --}}
	              <div class="form-group">
	              	<label for="customer_mobile" class="col-sm-2 control-label">Celular</label>
			              <div class="col-sm-10 {{ $errors->has('customer_mobile') ? ' has-error' : '' }}">
			                <input type="text" class="form-control" wire:model="customer_mobile" placeholder="3132640099">
			                @error('customer_mobile')
					        			<span class="help-block">{{$message}}</span>
					        		@enderror
			              </div>
	              </div>
	              {{-- quantity --}}
	              <div class="form-group">
	              	<label for="quantity" class="col-sm-2 control-label">Cantidad</label>
			              <div class="col-sm-10 {{ $errors->has('quantity') ? ' has-error' : '' }}">
			                <input type="number" class="form-control" wire:model="quantity" wire:change="calculatePrice">
			                @error('quantity')
					        			<span class="help-block">{{$message}}</span>
					        		@enderror
			              </div>
	              </div>
	              {{-- Total price --}}
	              <div class="form-group">
	              	<label for="total_price" class="col-sm-2 control-label">Precio Total</label>
			              <div class="col-sm-10 {{ $errors->has('total_price') ? ' has-error' : '' }}">
			                <input type="email" class="form-control" wire:model="total_price" readonly="readonly">
			                @error('total_price')
					        			<span class="help-block">{{$message}}</span>
					        		@enderror
			              </div>
	              </div>
		        	</form>
				</div>
				<div class="box-footer">
					<button wire:click="guardar" class="btn btn-primary">Guardar</button>
				</div>
		    </div>
		</div>
	</div>
</section>
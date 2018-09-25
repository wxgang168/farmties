@extends('layouts.dashboard')
@section('header')
	<div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
	<h3 class="content-header-title mb-0 d-inline-block">Basket</h3>
	<div class="row breadcrumbs-top d-inline-block">
	  <div class="breadcrumb-wrapper col-12">
	    <ol class="breadcrumb">
	      <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a>
	      </li>
	      <li class="breadcrumb-item active">Basket
	      </li>
	    </ol>
	  </div>
	</div>
	</div>
	<div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
	<div class="btn-group float-md-right">
		<form action="{{ route('orders.store') }}" method="POST">
			@csrf
			
			<input type="hidden" name="transID" value="{{ getToken(8) }}">
			<button type="submit" class="btn-gradient-secondary btn-sm white">Buy Stocks</button>
		</form>
	</div>
	</div>
@stop
@section('extra-plus')
<div class="content-detached content-left">
@stop
@section('content')

<div id="wallet">
    <div class="wallet-table-th d-none d-md-block">
        <div class="row">
            <div class="col-md-4 col-12 py-1">
                <p class="mt-0 text-capitalize">Commodity</p>
            </div>
            <div class="col-md-3 col-12 py-1 text-center">
                <p class="mt-0 text-capitalize">Latest Price</p>
            </div>
            <div class="col-md-3 col-12 py-1 text-center">
                <p class="mt-0 text-capitalize">Subtotal</p>
            </div>
            <div class="col-md-2 col-12 py-1 text-center">
                <p class="mt-0 text-capitalize">Modify</p>
            </div>
        </div>
    </div>
    <!-- BTC -->
    @foreach($cartItems as $cartItem)
    <section class="card pull-up">
        <div class="card-content">
            <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-4 col-12 py-1">
                            <div class="media">
                                <div class="cir-img" style="width: 25%; margin-right: 15px; height: 50px; overflow: hidden; border-radius: 50%;">
                                	<img src="{{ asset('images/commodities/'.$cartItem->options->image) }}" alt="" class="img-fluid" style="text-align: center;">
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 text-capitalize">{{ $cartItem->name }}</h5>
                                    <p class="text-muted mb-0 font-small-3 wallet-address">No. of MT: {{ $cartItem->qty }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12 py-1 text-center">
                            <h6>{{ nairafy($cartItem->price) }}</h6>
                            <p class="text-muted mb-0 font-small-3">fixed</p>
                        </div>
                        <div class="col-md-3 col-12 py-1 text-center">
                            <h6>{{ nairafy($cartItem->subtotal) }}</h6>
                            <p class="text-muted mb-0 font-small-3">fixed</p>
                        </div>
                        <div class="col-md-2 col-12 py-1 text-center">
                            <a href="#" class="line-height-3" onclick="removeRow('{{ $cartItem->rowId }}')">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    <!--/ BTC -->
</div>
@stop
@section('extras')
</div>
<div class="sidebar-detached sidebar-right" ="">
	<div class="sidebar">
		<div id="wallet-sidebar" class="sidebar-content">
			<div class="row">
				<p class="py-1 text-capitalize col-12">Amount Payable</p>
			</div>
			<div class="card">
				<div class="card-header">
					<h6 class="card-title text-center">Cost</h6>            
				</div>
				<div class="card-content collapse show">
					<div class="card-body">
						<div class="text-center row clearfix mb-2">
							<div class="col-12">
								<i class="icon-layers font-large-3 bg-warning bg-glow white rounded-circle p-3 d-inline-block"></i>
							</div>
						</div>
						<h3 class="text-center">NGN {{ Cart::total() }}</h3>
					</div>
					<div class="table-responsive">
						<table class="table table-de mb-0">                    
							<tbody>
								<tr>
									<td><strong>VAT 5%</strong></td>
									<td>NGN {{ Cart::tax() }}</td>
								</tr>
								<tr>
									<td><strong>SUBTITLE</strong></td>
									<td>NGN {{ Cart::subtotal() }}</td>                        
								</tr>
                     
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('scripts')
<script>
	var token = '{{ csrf_token() }}';
</script>
@stop